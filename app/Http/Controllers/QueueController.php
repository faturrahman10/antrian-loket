<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Queue;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class QueueController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();
        $queues = Queue::whereDate('tanggal', $today)->orderBy('nomor')->get();

        return view('queue.dashboard', compact('queues'));
    }

    public function store()
    {
        $today = now()->toDateString();
        return DB::transaction(function () use ($today) {
            $last = Queue::whereDate('tanggal', $today)->orderByDesc('nomor')->first();
            $nextNumber = ($last ? $last->nomor : 0) + 1;

            Queue::create([
                'tanggal' => $today,
                'nomor' => $nextNumber,
                'status' => 'menunggu',
            ]);
            return redirect()
                ->back()
                ->with('success', 'Antrian #' . $nextNumber . ' berhasil dibuat');
        });
    }

    public function show(Loket $loket)
    {
        $today = now()->toDateString();

        $queues = Queue::where('loket_id', $loket->id)->whereDate('tanggal', $today)->orderBy('nomor')->get();

        return view('queue.index', compact('loket', 'queues'));
    }

    public function take(Loket $loket)
    {
        $today = now()->toDateString();
        $queue = Queue::whereNull('loket_id')->whereDate('tanggal', $today)->orderBy('nomor')->first();

        if (!$queue) {
            return back()->with('error', 'Tidak ada antrian menunggu');
        }
        $queue->update([
            'loket_id' => $loket->id,
            'status' => 'dipanggil',
            'dipanggil_pada' => now(),
        ]);

        event(new \App\Events\QueueUpdated($queue));

        return back()->with('success', 'antrian #' . $queue->nomor . ' sedang dipanggil di loket ' . $loket->nama);
    }

    public function finish(Queue $queue)
    {
        $queue->update(['status' => 'selesai']);
        return back()->with('success', 'Antrian #' . $queue->nomor . ' selesai');

        event(new \App\Events\QueueUpdated($queue));
    }

    public function skip(Queue $queue)
    {
        $queue->update(['status' => 'dilewati']);
        return back()->with('success', 'Antrian #' . $queue->nomor . ' dilewati');

        event(new \App\Events\QueueUpdated($queue));
    }

    public function display()
    {
        return view('queue.display');
    }
}

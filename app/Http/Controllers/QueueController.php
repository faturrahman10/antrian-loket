<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use App\Models\Queue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class QueueController extends Controller
{
    public function dashboard()
    {
        $lokets = Loket::all();
        return view('queue.dashboard', compact('lokets'));
    }

    public function show(Loket $loket)
    {
        $queues = Queue::where('loket_id', $loket->id)->whereDate('created_at', Carbon::today())->orderBy('nomor')->get();

        return view('queue.index', compact('loket', 'queues'));
    }

    public function store(Loket $loket)
    {
        Queue::createNextForLoket($loket->id);

        return back()->with('success', 'Nomor antrian baru berhasil diambil.');
    }

    public function call(Queue $queue)
    {
        if ($queue->status === 'menunggu') {
            $queue->update([
                'status' => 'dipanggil',
                'dipanggil_pada' => now(),
            ]);
        }

        return back()->with('success', "Nomor {$queue->nomor} dipanggil.");
    }

    public function finish(Queue $queue)
    {
        if ($queue->status === 'dipanggil') {
            $queue->update(['status' => 'selesai']);
            return back()->with('success', 'Nomor ' . $queue->nomor . ' selesai.');
        }

        return back()->with('error', 'Nomor ini belum dipanggil.');
    }

    public function skip(Queue $queue)
    {
        if (in_array($queue->status, ['menunggu', 'dipanggil'])) {
            $queue->update(['status' => 'dilewati']);
            return back()->with('success', 'Nomor ' . $queue->nomor . ' dilewati.');
        }

        return back()->with('error', 'Nomor ini tidak bisa dilewati.');
    }
}

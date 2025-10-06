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
        $today = Carbon::today();
        $queues = Queue::whereDate('tanggal', $today)->orderBy('nomor')->get();

        return view('queue.dashboard', compact('queues'));
    }

    public function store(Loket $loket)
    {
        $today = Carbon::today();
        $last = Queue::whereDate('tanggal', $today)->orderByDesc('nomor')->first();
        $nextNumber = $last ? $last->nomor + 1 : 1;

        Queue::create([
            'nomor' => $nextNumber,
            'status' => 'menunggu',
            'tanggal' => $today,
            'loket_id' => null,
        ]);

        return redirect()->route('queue.dashboard')->with('success', 'nomor antrian baru ditambahkan');
    }

    public function show(Loket $loket)
    {
        $today = now()->toDateString();

        $queues = Queue::where('loket_id', $loket->id)->whereDate('tanggal', $today)->orderBy('nomor')->get();

        return view('queueu.index', compact('loket', 'queues'));
    }

    public function take(Loket $loket)
    {
        $today = now()->toDateString();
        $queue = Queue::whereNull('loket_id')->whereDate('tanggal', $today)->orderBy('nomor')->first();

        if(!$queue) {
            return back()->with('error', 'Tidak ada antrian menunggu');
        }
        $queue->upddate([
            'loket_id' => $loket->id,
            'status' => 'dipanggil',
            'dipanggil_pada' => now(),
        ]);

        return back()->with('success', 'antrian #'.$queue->nomor.' sedang dipanggil di loket '.$loket->nama);
    }

    public function finish(Queue $queue)
    {
        $queue->update(['status' => 'selesai']);
        return back()->with('success', 'Antrian #'.$queue->nomor.' selesai');
    }

    public function skip(Queue $queue)
    {
        $queue->update(['status' => 'dilewati']);
        return back()->with('success', 'Antrian #'.$queue->nomor.' dilewati');
    }
}

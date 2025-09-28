<?php

namespace App\Http\Controllers;
use App\Models\Loket;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $lokets = Loket::with(['queues' => function($q){
            $q->where('tanggal', now()->toDateString())->orderBy('nomor');
        }])->get();

        return view('queue.index', compact('lokets'));
    }
}

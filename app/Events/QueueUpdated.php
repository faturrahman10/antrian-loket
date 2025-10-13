<?php

namespace App\Events;

use App\Models\Queue;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class QueueUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $queue;

    public function __construct(Queue $queue)
    {
        $this->queue = $queue->load('loket');
        Log::info('📡 Event QueueUpdated terkirim', ['queue' => $this->queue]);
    }

    public function broadcastOn()
    {
        return new Channel('queues');
    }

    public function broadcastAs()
    {
        return 'QueueUpdated';
    }

    public function broadcastWith(): array
    {
        return [
            'queue' => [
                'id' => $this->queue->id,
                'nomor' => $this->queue->nomor,
                'status' => $this->queue->status,
                'loket' => $this->queue->loket
                    ? [
                        'id' => $this->queue->loket->id,
                        'nama' => $this->queue->loket->nama,
                    ]
                    : null,
            ],
        ];
    }
}

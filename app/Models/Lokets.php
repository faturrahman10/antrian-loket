<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokets extends Model
{
    use HasFactory;

    protected $fillable = ['nama', ['keterangan']];

    public function queues()
    {
        return $this->hasMany(Queue::class);
    }

    public function currentCalled()
    {
        return $this->queue()
            ->where('tanggal', now()->toDateString())
            ->whrere('status', 'dipanggil')
            ->orderByDescending('dipanggil_pada')
            ->first();
    }
}

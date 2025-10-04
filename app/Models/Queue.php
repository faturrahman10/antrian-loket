<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Queue extends Model
{
    protected $fillable = ['loket_id', 'tanggal', 'nomor', 'status', 'dipanggil_pada'];
    protected $casts = ['tanggal' => 'date', 'dipanggil_pada' => 'datetime'];

    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }
}

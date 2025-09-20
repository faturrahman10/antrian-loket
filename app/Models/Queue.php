<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = ['loket_id', 'tanggal', 'nomor', 'status', 'dipanggil_pada'];
    protected $casts = ['tanggal' => 'date', 'dipanggil_pada' => 'datetime'];

    public function loket() {
        return $this->belongsTo(Loket::class);
    }

    public static function createNextForLoket(int $loketId): self {
        $today = now()->toDateString();

        return DB::transaction(function() use ($loketId, $today){
            $last = self::where('loket_id', $loketId)->where('tanggal', $today)->orderByDesc('nomor')->first();

            $nextNumber = ($last ? $last->nomor : 0) + 1;

            return self::create([
                'loket_id' => $loketId,
                'tanggal' => $today,
                'nomor' => $nextNumber,
                'status' => 'menunggu',
            ]);
        });
    }
}

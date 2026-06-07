<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class LaporanKerusakan extends Model
{

    use SoftDeletes;

    protected $table = 'laporan_kerusakan';

    protected $fillable = [
        'fasilitas_id',
        'pelapor',
        'judul_laporan',
        'deskripsi_kerusakan',
        'foto',
        'status',
        'tanggal_lapor',
    ];

    public function fasilitas(): BelongsTo
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Fasilitas extends Model
{

    use SoftDeletes;

    protected $table = 'fasilitas';

    protected $fillable = [
        'kategori_fasilitas_id',
        'kode_fasilitas',
        'nama_fasilitas',
        'lokasi',
        'kondisi',
        'deskripsi',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriFasilitas::class, 'kategori_fasilitas_id');
    }
    public function laporanKerusakan(): HasMany
    {
        return $this->hasMany(LaporanKerusakan::class);
    }
}

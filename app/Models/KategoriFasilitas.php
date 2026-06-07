<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriFasilitas extends Model
{
    use SoftDeletes;


    protected $table ='kategori_fasilitas';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function fasilitas(): HasMany
    {
        return $this->hasMany(Fasilitas::class);
    }
}

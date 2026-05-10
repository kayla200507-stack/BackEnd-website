<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_lowongan')]
#[Fillable(['id_kategori', 'judul_lowongan', 'deskripsi', 'lokasi', 'tipe_magang', 'durasi', 'kuota', 'deadline', 'status_lowongan'])]
class Lowongan extends Model
{
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriLowongan::class, 'id_kategori', 'id_kategori');
    }
}

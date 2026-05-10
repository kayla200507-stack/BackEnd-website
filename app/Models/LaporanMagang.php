<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_laporan')]
#[Fillable(['id_magang', 'judul_laporan', 'file_laporan', 'tanggal_upload', 'status_review'])]
class LaporanMagang extends Model
{
    public function magang(): BelongsTo
    {
        return $this->belongsTo(MahasiswaMagang::class, 'id_magang', 'id_magang');
    }
}

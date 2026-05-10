<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_penilaian_dosen')]
#[Fillable(['id_magang', 'nilai_laporan', 'nilai_logbook', 'nilai_akhir', 'catatan'])]
class PenilaianDosen extends Model
{
    public function magang(): BelongsTo
    {
        return $this->belongsTo(MahasiswaMagang::class, 'id_magang', 'id_magang');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_logbook')]
#[Fillable(['id_magang', 'tanggal', 'kegiatan', 'kendala', 'status_validasi'])]
class Logbook extends Model
{
    public function magang(): BelongsTo
    {
        return $this->belongsTo(MahasiswaMagang::class, 'id_magang', 'id_magang');
    }
}

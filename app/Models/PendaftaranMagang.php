<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_pendaftaran')]
#[Fillable(['id_mahasiswa', 'id_lowongan', 'tanggal_daftar', 'status_pendaftaran', 'cv_file', 'surat_pengantar', 'transkrip_nilai', 'catatan'])]
class PendaftaranMagang extends Model
{
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id_lowongan');
    }
}

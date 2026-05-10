<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_wawancara')]
#[Fillable(['id_pendaftaran', 'tanggal_wawancara', 'lokasi_wawancara', 'metode', 'catatan'])]
class JadwalWawancara extends Model
{
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(PendaftaranMagang::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

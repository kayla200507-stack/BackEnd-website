<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_dokumen')]
#[Fillable(['id_lowongan', 'nama_dokumen'])]
class DokumenPersyaratan extends Model
{
    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id_lowongan');
    }
}

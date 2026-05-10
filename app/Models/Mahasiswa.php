<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Table(key: 'id_mahasiswa')]
#[Fillable(['id_user', 'nim', 'jurusan', 'program_studi', 'semester', 'angkatan', 'alamat', 'cv', 'status_magang'])]
class Mahasiswa extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}

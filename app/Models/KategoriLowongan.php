<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table(key: 'id_kategori')]
#[Fillable(['nama_kategori'])]
class KategoriLowongan extends Model
{
}

<?php

namespace App\Services;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PengumumanService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return Pengumuman::orderBy('tanggal_publish', 'desc')
            ->filter($request, 
                searchableColumns: ['judul', 'isi_pengumuman']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function create(array $data): Pengumuman
    {
        return Pengumuman::create($data);
    }
}

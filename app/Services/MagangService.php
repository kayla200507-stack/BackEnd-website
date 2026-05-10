<?php

namespace App\Services;

use App\Models\MahasiswaMagang;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MagangService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return MahasiswaMagang::with(['mahasiswa.user', 'dosen.user'])
            ->filter($request, 
                filterableColumns: ['id_mahasiswa', 'id_dosen', 'status_magang']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function findById(int $id): ?MahasiswaMagang
    {
        return MahasiswaMagang::with(['mahasiswa.user', 'dosen.user'])->find($id);
    }

    public function create(array $data): MahasiswaMagang
    {
        return MahasiswaMagang::create($data);
    }
}

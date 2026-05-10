<?php

namespace App\Services;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DosenService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return Dosen::with('user')
            ->filter($request, 
                searchableColumns: ['nip', 'fakultas', 'bidang_keahlian']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function findById(int $id): ?Dosen
    {
        return Dosen::with('user')->find($id);
    }

    public function create(array $data): Dosen
    {
        return Dosen::create($data);
    }
}

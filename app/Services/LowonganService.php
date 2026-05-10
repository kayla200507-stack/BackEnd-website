<?php

namespace App\Services;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LowonganService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return Lowongan::with('kategori')
            ->filter($request, 
                searchableColumns: ['judul_lowongan', 'lokasi'],
                filterableColumns: ['id_kategori', 'tipe_magang', 'status_lowongan']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function findById(int $id): ?Lowongan
    {
        return Lowongan::with('kategori')->find($id);
    }

    public function create(array $data): Lowongan
    {
        return Lowongan::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $lowongan = Lowongan::find($id);
        return $lowongan ? $lowongan->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $lowongan = Lowongan::find($id);
        return $lowongan ? $lowongan->delete() : false;
    }
}

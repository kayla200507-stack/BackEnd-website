<?php

namespace App\Services;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class MahasiswaService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return Mahasiswa::with('user')
            ->filter($request, 
                searchableColumns: ['nim', 'jurusan', 'program_studi'],
                filterableColumns: ['semester', 'angkatan', 'status_magang']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function findById(int $id): ?Mahasiswa
    {
        return Mahasiswa::with('user')->find($id);
    }

    public function create(array $data): Mahasiswa
    {
        return Mahasiswa::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $mahasiswa = Mahasiswa::find($id);
        return $mahasiswa ? $mahasiswa->update($data) : false;
    }

    public function delete(int $id): bool
    {
        $mahasiswa = Mahasiswa::find($id);
        return $mahasiswa ? $mahasiswa->delete() : false;
    }
}

<?php

namespace App\Services;

use App\Models\PendaftaranMagang;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PendaftaranService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return PendaftaranMagang::with(['mahasiswa.user', 'lowongan'])
            ->filter($request, 
                filterableColumns: ['id_mahasiswa', 'id_lowongan', 'status_pendaftaran']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function findById(int $id): ?PendaftaranMagang
    {
        return PendaftaranMagang::with(['mahasiswa.user', 'lowongan'])->find($id);
    }

    public function create(array $data): PendaftaranMagang
    {
        return PendaftaranMagang::create($data);
    }

    public function updateStatus(int $id, string $status): bool
    {
        $pendaftaran = PendaftaranMagang::find($id);
        return $pendaftaran ? $pendaftaran->update(['status_pendaftaran' => $status]) : false;
    }
}

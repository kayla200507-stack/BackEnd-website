<?php

namespace App\Services;

use App\Models\LaporanMagang;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LaporanService
{
    public function getByMagang(int $idMagang, Request $request): LengthAwarePaginator
    {
        return LaporanMagang::where('id_magang', $idMagang)
            ->orderBy('tanggal_upload', 'desc')
            ->paginate($request->get('per_page', 10));
    }

    public function upload(array $data): LaporanMagang
    {
        return LaporanMagang::create($data);
    }

    public function review(int $id, string $status): bool
    {
        $laporan = LaporanMagang::find($id);
        return $laporan ? $laporan->update(['status_review' => $status]) : false;
    }
}

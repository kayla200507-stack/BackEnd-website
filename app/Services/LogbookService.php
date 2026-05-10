<?php

namespace App\Services;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class LogbookService
{
    public function getByMagang(int $idMagang, Request $request): LengthAwarePaginator
    {
        return Logbook::where('id_magang', $idMagang)
            ->orderBy('tanggal', 'desc')
            ->paginate($request->get('per_page', 10));
    }

    public function create(array $data): Logbook
    {
        return Logbook::create($data);
    }

    public function validate(int $id, string $status): bool
    {
        $logbook = Logbook::find($id);
        return $logbook ? $logbook->update(['status_validasi' => $status]) : false;
    }
}

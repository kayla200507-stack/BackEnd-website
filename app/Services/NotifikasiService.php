<?php

namespace App\Services;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NotifikasiService
{
    public function getUserNotifications(int $idUser, Request $request): LengthAwarePaginator
    {
        return Notifikasi::where('id_user', $idUser)
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page', 10));
    }

    public function send(int $idUser, string $judul, string $pesan): Notifikasi
    {
        return Notifikasi::create([
            'id_user' => $idUser,
            'judul' => $judul,
            'pesan' => $pesan,
            'status_baca' => 'belum'
        ]);
    }

    public function markAsRead(int $id): bool
    {
        $notif = Notifikasi::find($id);
        return $notif ? $notif->update(['status_baca' => 'sudah']) : false;
    }
}

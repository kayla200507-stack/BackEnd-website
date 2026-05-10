<?php

namespace App\Http\Controllers;

use App\Http\Requests\Notifikasi\StoreNotifikasiRequest;
use App\Services\NotifikasiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends BaseApiController
{
    protected NotifikasiService $notifikasiService;

    public function __construct(NotifikasiService $notifikasiService)
    {
        $this->notifikasiService = $notifikasiService;
    }

    public function index(Request $request): JsonResponse
    {
        $idUser = Auth::guard('api')->id();
        return $this->paginate($this->notifikasiService->getUserNotifications($idUser, $request), 'Notifications retrieved successfully');
    }

    public function markAsRead(int $id): JsonResponse
    {
        $updated = $this->notifikasiService->markAsRead($id);
        return $updated ? $this->success(null, 'Notification marked as read') : $this->error('Failed to mark notification', 400);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pendaftaran\StorePendaftaranRequest;
use App\Http\Requests\Pendaftaran\UpdateStatusRequest;
use App\Services\PendaftaranService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PendaftaranController extends BaseApiController
{
    protected PendaftaranService $pendaftaranService;

    public function __construct(PendaftaranService $pendaftaranService)
    {
        $this->pendaftaranService = $pendaftaranService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->pendaftaranService->getAll($request), 'Pendaftaran retrieved successfully');
    }

    public function store(StorePendaftaranRequest $request): JsonResponse
    {
        $pendaftaran = $this->pendaftaranService->create($request->validated());
        return $this->success($pendaftaran, 'Pendaftaran created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $pendaftaran = $this->pendaftaranService->findById($id);
        return $pendaftaran ? $this->success($pendaftaran) : $this->error('Pendaftaran not found', 404);
    }

    public function updateStatus(UpdateStatusRequest $request, int $id): JsonResponse
    {
        $updated = $this->pendaftaranService->updateStatus($id, $request->status_pendaftaran);
        return $updated ? $this->success(null, 'Status updated successfully') : $this->error('Failed to update status', 400);
    }
}

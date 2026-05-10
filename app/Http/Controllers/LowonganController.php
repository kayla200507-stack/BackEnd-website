<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lowongan\StoreLowonganRequest;
use App\Http\Requests\Lowongan\UpdateLowonganRequest;
use App\Services\LowonganService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LowonganController extends BaseApiController
{
    protected LowonganService $lowonganService;

    public function __construct(LowonganService $lowonganService)
    {
        $this->lowonganService = $lowonganService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->lowonganService->getAll($request), 'Lowongan retrieved successfully');
    }

    public function store(StoreLowonganRequest $request): JsonResponse
    {
        $lowongan = $this->lowonganService->create($request->validated());
        return $this->success($lowongan, 'Lowongan created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $lowongan = $this->lowonganService->findById($id);
        return $lowongan ? $this->success($lowongan) : $this->error('Lowongan not found', 404);
    }

    public function update(UpdateLowonganRequest $request, int $id): JsonResponse
    {
        $updated = $this->lowonganService->update($id, $request->validated());
        return $updated ? $this->success(null, 'Lowongan updated successfully') : $this->error('Failed to update Lowongan', 400);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->lowonganService->delete($id);
        return $deleted ? $this->success(null, 'Lowongan deleted successfully') : $this->error('Failed to delete Lowongan', 400);
    }
}

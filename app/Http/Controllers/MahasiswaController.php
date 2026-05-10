<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mahasiswa\StoreMahasiswaRequest;
use App\Http\Requests\Mahasiswa\UpdateMahasiswaRequest;
use App\Services\MahasiswaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MahasiswaController extends BaseApiController
{
    protected MahasiswaService $mahasiswaService;

    public function __construct(MahasiswaService $mahasiswaService)
    {
        $this->mahasiswaService = $mahasiswaService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->mahasiswaService->getAll($request), 'Mahasiswa retrieved successfully');
    }

    public function store(StoreMahasiswaRequest $request): JsonResponse
    {
        $mahasiswa = $this->mahasiswaService->create($request->validated());
        return $this->success($mahasiswa, 'Mahasiswa created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $mahasiswa = $this->mahasiswaService->findById($id);
        return $mahasiswa ? $this->success($mahasiswa) : $this->error('Mahasiswa not found', 404);
    }

    public function update(UpdateMahasiswaRequest $request, int $id): JsonResponse
    {
        $updated = $this->mahasiswaService->update($id, $request->validated());
        return $updated ? $this->success(null, 'Mahasiswa updated successfully') : $this->error('Failed to update Mahasiswa', 400);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->mahasiswaService->delete($id);
        return $deleted ? $this->success(null, 'Mahasiswa deleted successfully') : $this->error('Failed to delete Mahasiswa', 400);
    }
}

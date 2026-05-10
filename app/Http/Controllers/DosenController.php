<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dosen\StoreDosenRequest;
use App\Http\Requests\Dosen\UpdateDosenRequest;
use App\Services\DosenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DosenController extends BaseApiController
{
    protected DosenService $dosenService;

    public function __construct(DosenService $dosenService)
    {
        $this->dosenService = $dosenService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->dosenService->getAll($request), 'Dosen retrieved successfully');
    }

    public function store(StoreDosenRequest $request): JsonResponse
    {
        $dosen = $this->dosenService->create($request->validated());
        return $this->success($dosen, 'Dosen created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $dosen = $this->dosenService->findById($id);
        return $dosen ? $this->success($dosen) : $this->error('Dosen not found', 404);
    }

    public function update(UpdateDosenRequest $request, int $id): JsonResponse
    {
        // Add update logic to DosenService if needed, using the same pattern as Mahasiswa
        return $this->error('Update not implemented yet', 501);
    }
}

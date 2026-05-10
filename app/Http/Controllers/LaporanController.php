<?php

namespace App\Http\Controllers;

use App\Http\Requests\Laporan\StoreLaporanRequest;
use App\Http\Requests\Laporan\UpdateStatusRequest;
use App\Services\LaporanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LaporanController extends BaseApiController
{
    protected LaporanService $laporanService;

    public function __construct(LaporanService $laporanService)
    {
        $this->laporanService = $laporanService;
    }

    public function index(Request $request, int $idMagang): JsonResponse
    {
        return $this->paginate($this->laporanService->getByMagang($idMagang, $request), 'Laporan retrieved successfully');
    }

    public function store(StoreLaporanRequest $request): JsonResponse
    {
        $laporan = $this->laporanService->upload($request->validated());
        return $this->success($laporan, 'Laporan uploaded successfully', 201);
    }

    public function review(UpdateStatusRequest $request, int $id): JsonResponse
    {
        $updated = $this->laporanService->review($id, $request->status_review);
        return $updated ? $this->success(null, 'Laporan reviewed successfully') : $this->error('Failed to review laporan', 400);
    }
}

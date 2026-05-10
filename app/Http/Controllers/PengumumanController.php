<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pengumuman\StorePengumumanRequest;
use App\Services\PengumumanService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PengumumanController extends BaseApiController
{
    protected PengumumanService $pengumumanService;

    public function __construct(PengumumanService $pengumumanService)
    {
        $this->pengumumanService = $pengumumanService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->pengumumanService->getAll($request), 'Pengumuman retrieved successfully');
    }

    public function store(StorePengumumanRequest $request): JsonResponse
    {
        $pengumuman = $this->pengumumanService->create($request->validated());
        return $this->success($pengumuman, 'Pengumuman created successfully', 201);
    }
}

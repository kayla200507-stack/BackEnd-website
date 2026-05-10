<?php

namespace App\Http\Controllers;

use App\Http\Requests\Magang\StoreMagangRequest;
use App\Services\MagangService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MagangController extends BaseApiController
{
    protected MagangService $magangService;

    public function __construct(MagangService $magangService)
    {
        $this->magangService = $magangService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->magangService->getAll($request), 'Data magang retrieved successfully');
    }

    public function store(StoreMagangRequest $request): JsonResponse
    {
        $magang = $this->magangService->create($request->validated());
        return $this->success($magang, 'Data magang created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $magang = $this->magangService->findById($id);
        return $magang ? $this->success($magang) : $this->error('Data magang not found', 404);
    }
}

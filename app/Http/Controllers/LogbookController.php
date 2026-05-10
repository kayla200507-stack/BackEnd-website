<?php

namespace App\Http\Controllers;

use App\Http\Requests\Logbook\StoreLogbookRequest;
use App\Http\Requests\Logbook\UpdateStatusRequest;
use App\Services\LogbookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogbookController extends BaseApiController
{
    protected LogbookService $logbookService;

    public function __construct(LogbookService $logbookService)
    {
        $this->logbookService = $logbookService;
    }

    public function index(Request $request, int $idMagang): JsonResponse
    {
        return $this->paginate($this->logbookService->getByMagang($idMagang, $request), 'Logbooks retrieved successfully');
    }

    public function store(StoreLogbookRequest $request): JsonResponse
    {
        $logbook = $this->logbookService->create($request->validated());
        return $this->success($logbook, 'Logbook created successfully', 201);
    }

    public function validateLogbook(UpdateStatusRequest $request, int $id): JsonResponse
    {
        $updated = $this->logbookService->validate($id, $request->status_validasi);
        return $updated ? $this->success(null, 'Logbook validated successfully') : $this->error('Failed to validate logbook', 400);
    }
}

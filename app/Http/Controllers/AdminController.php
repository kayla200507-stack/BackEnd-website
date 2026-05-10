<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreAdminRequest;
use App\Services\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends BaseApiController
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request): JsonResponse
    {
        return $this->paginate($this->adminService->getAll($request), 'Admin retrieved successfully');
    }

    public function store(StoreAdminRequest $request): JsonResponse
    {
        $admin = $this->adminService->create($request->validated());
        return $this->success($admin, 'Admin created successfully', 201);
    }

    public function show(int $id): JsonResponse
    {
        $admin = $this->adminService->findById($id);
        return $admin ? $this->success($admin) : $this->error('Admin not found', 404);
    }
}

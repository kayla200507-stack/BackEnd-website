<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminService
{
    public function getAll(Request $request): LengthAwarePaginator
    {
        return Admin::with('user')
            ->filter($request, 
                searchableColumns: ['jabatan']
            )
            ->paginate($request->get('per_page', 10));
    }

    public function findById(int $id): ?Admin
    {
        return Admin::with('user')->find($id);
    }

    public function create(array $data): Admin
    {
        return Admin::create($data);
    }
}

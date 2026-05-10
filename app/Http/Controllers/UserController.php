<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request): JsonResponse
    {
        $users = User::filter(
            $request,
            searchableColumns: ['name', 'email'],
            filterableColumns: ['email', 'role'],
            sortableColumns: ['name', 'email', 'created_at']
        )->paginate($request->get('per_page', 10));

        return $this->paginate($users, 'Users retrieved successfully');
    }
}

<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait CanFilter
{
    /**
     * Scope a query to apply search, filters, and sorting.
     *
     * @param Builder $query
     * @param Request $request
     * @param array $searchableColumns
     * @param array $filterableColumns
     * @param array $sortableColumns
     * @return Builder
     */
    public function scopeFilter(
        Builder $query,
        Request $request,
        array $searchableColumns = [],
        array $filterableColumns = [],
        array $sortableColumns = []
    ): Builder {
        // Search
        if ($request->has('search') && !empty($searchableColumns)) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            });
        }

        // Filters (exact matches)
        foreach ($filterableColumns as $column) {
            if ($request->has($column)) {
                $query->where($column, $request->get($column));
            }
        }

        // Sort
        $sortColumn = $request->get('sort_by', 'id');
        $sortDirection = $request->get('sort_dir', 'desc');

        if (in_array($sortColumn, $sortableColumns) || $sortColumn === 'id') {
            $query->orderBy($sortColumn, $sortDirection);
        }

        return $query;
    }
}

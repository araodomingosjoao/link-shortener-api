<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkAccessResource;
use App\Models\LinkAccess;
use Illuminate\Http\Request;

class LinkAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = LinkAccess::query();
        // Busca textual
        if ($request->has('ip')) {
            $searchTerm = $request->input('ip');
            $query->where('ip', 'like', "%$searchTerm%");
        }
        if ($request->has('user_agent')) {
            $searchTerm = $request->input('user_agent');
            $query->where('user_agent', 'like', "%$searchTerm%");
        }
        // Ordenação
        if ($request->has('sort_by') && $request->has('sort_direction')) {
            $sortBy = $request->input('sort_by');
            $sortDirection = $request->input('sort_direction');
            $query->orderBy($sortBy, $sortDirection);
        }

        $access = $query->paginate(2);

        return response()->json($access);
    }
}

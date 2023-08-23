<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Models\LinkAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $query = Link::query();
        // Busca textual
        if ($request->has('original_url')) {
            $searchTerm = $request->input('original_url');
            $query->where('original_url', 'like', "%$searchTerm%");
        }
        if ($request->has('slug')) {
            $searchTerm = $request->input('slug');
            $query->where('slug', 'like', "%$searchTerm%");
        }
        // Ordenação
        if ($request->has('sort_by') && $request->has('sort_direction')) {
            $sortBy = $request->input('sort_by');
            $sortDirection = $request->input('sort_direction');
            $query->orderBy($sortBy, $sortDirection);
        }
        $links = $query->paginate(10);
        return response()->json($links);
    }

    public function store(CreateLinkRequest $request)
    {
        $data = $request->validated();

        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = substr(md5(microtime()), rand(0, 26), 6);
        }

        $link = Link::create($data);
        return response()->json($link, 201);
    }

    public function show($id)
    {
        $link = Link::findOrFail($id);
        return response()->json(LinkResource::make($link));
    }

    public function update(UpdateLinkRequest $request, $id)
    {
        $data = $request->validated();

        $link = Link::findOrFail($id);
        $link->update($data);
        return response()->json($link, 200);
    }

    public function destroy($id)
    {
        $link = Link::findOrFail($id);
        $link->delete();
        return response()->json(null, 204);
    }

    public function redirectToOriginal($slug)
    {
        $link = Link::where('slug', $slug)->first();

        if ($link) {
            $accessData = [
                'link_id' => $link->id,
                'ip' => request()->ip(),
                'user_agent' => request()->header('User-Agent'),
            ];
            LinkAccess::create($accessData);

            $link->increment('access_count');

            return Redirect::away($link->original_url);
        }

        return response()->json(['message' => 'Link not found'], 404);
    }
}

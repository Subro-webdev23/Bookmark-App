<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;


class LinkController extends Controller
{
     // GET: /api/links
    public function index()
    {
        return Link::all();
    }
    // POST: /api/links
    public function store(Request $request)
    {
        try {
            $link = Link::create(
                $request->only(['title','url','category','note','status'])
            );

            return response($link, 201);
        } catch (\Exception $e) {
            return response([
                'error' => $e->getMessage()
            ], 500);
        }
    }  


    // GET: /api/links/{id}
    public function show($id)
    {
        $link = Link::findOrFail($id);

        return response($link, 200);
    }

    // PUT: /api/links/{id}
    public function update(Request $request, $id)
    {
        $link = Link::findOrFail($id);

        $request->validate([
            'title'    => 'required|string',
            'url'      => 'required|url',
            'category' => 'required|string',
        ]);

        $link->update($request->all());

        return response([
            'message' => 'Bookmark updated successfully',
            'data' => $link
        ], 200);
    }

    // DELETE: /api/links/{id}
    public function destroy($id)
    {
        $link = Link::findOrFail($id);
        $link->delete();

        return response([
            'message' => 'Bookmark deleted successfully'
        ], 200);
    }

    // PATCH: /api/links/{id}/archive
    public function archive($id)
    {
        $link = Link::findOrFail($id);
        $link->update(['status' => 'archived']);

        return response([
            'message' => 'Bookmark archived successfully'
        ], 200);
    }

}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        try {
            $data = $request->validated();

            Tag::create($data);

            return redirect()->route('tag.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('tag.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);

        return view('dashboard.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, $id)
    {
        try {
            $tag = Tag::findOrFail($id);

            $data = $request->validated();

            $tag->update($data);

            return redirect()->route('tag.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('tag.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();

            return redirect()->route('tag.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('tag.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}

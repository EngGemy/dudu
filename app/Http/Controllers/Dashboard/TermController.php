<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TermRequest;
use App\Models\Terms\Term;

class TermController extends Controller
{
    public function index()
    {
        $term = Term::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.term.index', compact('term'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.term.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TermRequest $request)
    {
        try {
            $data = $request->validated();

            Term::create($data);

            return redirect()->route('term.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('term.index')->with(['error' => 'There is a problem, try later']);
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
        $term = Term::findOrFail($id);

        return view('dashboard.term.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TermRequest $request, $id)
    {
        try {
            $term = Term::findOrFail($id);

            $data = $request->validated();

            $term->update($data);

            return redirect()->route('term.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('term.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $term = Term::findOrFail($id);
            $term->delete();

            return redirect()->route('term.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('term.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}

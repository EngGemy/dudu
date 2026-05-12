<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrivacyRequest;
use App\Models\Privacy\Privacy;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy = Privacy::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.privacy.index', compact('privacy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.privacy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrivacyRequest $request)
    {
        try {
            $data = $request->validated();

            Privacy::create($data);

            return redirect()->route('privacy.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('privacy.index')->with(['error' => 'There is a problem, try later']);
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
        $privacy = Privacy::findOrFail($id);

        return view('dashboard.privacy.edit', compact('privacy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrivacyRequest $request, $id)
    {
        try {
            $privacy = Privacy::findOrFail($id);

            $data = $request->validated();

            $privacy->update($data);

            return redirect()->route('privacy.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('privacy.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $privacy = Privacy::findOrFail($id);
            $privacy->delete();

            return redirect()->route('privacy.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('privacy.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}

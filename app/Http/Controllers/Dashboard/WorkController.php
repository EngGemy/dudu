<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use App\Models\Work\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.work.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.work.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkRequest $request)
    {
        try {
            $data = $request->validated();

            unset($data['image']);
            $data['image'] = uploadimage('work', $request->image);
            Work::updateOrCreate(
                ['status' => $data['status']],
                $data
            );

            return redirect()->route('work.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('work.index')->with(['error' => 'There is a problem, try later']);
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
        $work = Work::findOrFail($id);

        return view('dashboard.work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkRequest $request, $id)
    {
        try {
            $work = Work::findOrFail($id);
            $old_image = $work->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('work', $request->image);
                delete_photo(asset('/assets/images/work/'.$old_image));
            }

            $work->update($data);

            return redirect()->route('special_offer.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('special_offer.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $work = Work::findOrFail($id);
            $work->delete();

            return redirect()->route('work.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('work.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}

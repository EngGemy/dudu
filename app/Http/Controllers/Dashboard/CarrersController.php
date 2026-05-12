<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarrersRequest;
use App\Models\Career\Career;

class CarrersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarrersRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['image']);
            $data['image'] = uploadimage('career', $request->image);
            $data = $this->injectTranslations($data, ['title', 'slug', 'description', 'meta_title', 'meta_description']);
            Career::updateOrCreate(
                ['status' => $data['status']],
                $data
            );

            return redirect()->route('careers.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('careers.index')->with(['error' => 'There is a problem, try later']);
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
        $career = Career::findOrFail($id);

        return view('dashboard.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarrersRequest $request, $id)
    {
        try {
            $career = Career::findOrFail($id);
            $old_image = $career->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('career', $request->image);
                delete_photo(asset('/assets/images/career/'.$old_image));
            }

            $data = $this->injectTranslations($data, ['title', 'slug', 'description', 'meta_title', 'meta_description']);
            $career->fill($data)->save();

            return redirect()->route('careers.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('careers.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $career = Career::findOrFail($id);
            $career->delete();

            return redirect()->route('careers.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('careers.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    private function injectTranslations(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            $values = $data[$field] ?? [];
            unset($data[$field]);
            foreach ($values as $locale => $value) {
                if (! isset($data[$locale])) {
                    $data[$locale] = [];
                }
                $data[$locale][$field] = $value;
            }
        }

        return $data;
    }
}

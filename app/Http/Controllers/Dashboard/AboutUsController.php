<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\aboutUs\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_us = AboutUs::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.about_us.index', compact('about_us'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutUsRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['image']);
            $data['image'] = uploadimage('about_us', $request->image);
            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            AboutUs::updateOrCreate(
                ['status' => $data['status']],
                $data
            );

            return redirect()->route('about_us.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('about_us.index')->with(['error' => 'There is a problem, try later']);
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
        $about_us = AboutUs::findOrFail($id);

        return view('dashboard.about_us.edit', compact('about_us'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUsRequest $request, $id)
    {
        try {
            $about_us = AboutUs::findOrFail($id);
            $old_image = $about_us->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('about_us', $request->image);
                delete_photo(asset('/assets/images/about_us/'.$old_image));
            }

            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            $about_us->fill($data)->save();

            return redirect()->route('about_us.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('about_us.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $about_us = AboutUs::findOrFail($id);
            $about_us->delete();

            return redirect()->route('about_us.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('about_us.index')->with(['error' => 'There is a problem, try later']);
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

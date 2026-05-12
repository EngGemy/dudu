<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['image']);
            $data['image'] = uploadimage('slider', $request->image);
            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            Slider::updateOrCreate(
                ['status' => $data['status']],
                $data
            );

            return redirect()->route('slider.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('slider.index')->with(['error' => 'There is a problem, try later']);
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
        $slider = Slider::findOrFail($id);

        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, $id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $old_image = $slider->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('slider', $request->image);
                //            delete_photo(asset('/assets/images/slider/'.$old_image));
            }

            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            $slider->fill($data)->save();

            return redirect()->route('slider.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('slider.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete();

            return redirect()->route('slider.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('slider.index')->with(['error' => 'There is a problem, try later']);
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

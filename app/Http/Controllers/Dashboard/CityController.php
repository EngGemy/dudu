<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id', 'Desc')->get();

        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('dashboard.cities.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.en.required' => 'The English name is required',
        ]);

        try {
            $data = $request->except('image');
            $data['image'] = uploadimage('cities', $request->image);
            $data = $this->injectTranslations($data, ['name']);

            City::create($data);

            return redirect()->route('cities.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('cities.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $city = City::find($id);

        return view('dashboard.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.en.required' => 'The English name is required',
        ]);

        try {
            $city = City::findOrFail($id);

            $data = $request->except('image');
            if ($request->hasFile('image')) {
                $data['image'] = uploadimage('cities', $request->image);
            }

            $data = $this->injectTranslations($data, ['name']);
            $city->update($data);

            return redirect()->route('cities.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('cities.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->city_translations()->delete();
            $city->delete();

            return redirect()->route('cities.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('cities.index')->with(['error' => 'There is a problem, try later']);
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

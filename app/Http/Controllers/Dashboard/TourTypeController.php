<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TourType;
use Illuminate\Http\Request;

class TourTypeController extends Controller
{
    public function index()
    {
        $types = TourType::orderBy('id', 'Desc')->get();

        return view('dashboard.tour_types.index', compact('types'));
    }

    public function create()
    {
        return view('dashboard.tour_types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        try {
            $data = $this->injectTranslations($request->all(), ['name']);
            $type = new TourType();
            $type->fill($data)->save();

            return redirect()->route('tour_type.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tour_type.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $type = TourType::find($id);

        return view('dashboard.tour_types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        try {
            $type = TourType::findOrFail($id);
            $data = $this->injectTranslations($request->all(), ['name']);
            $type->fill($data)->save();

            return redirect()->route('tour_type.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tour_type.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $type = TourType::findOrFail($id);
            $type->tour_type_translations()->delete();
            $type->delete();

            return redirect()->route('tour_type.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tour_type.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    private function injectTranslations(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            $values = $data[$field] ?? [];
            unset($data[$field]);
            if (! is_array($values)) {
                continue;
            }
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

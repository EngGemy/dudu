<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TourGroup;
use Illuminate\Http\Request;

class TourGroupController extends Controller
{
    public function index()
    {
        $groups = TourGroup::orderBy('id', 'Desc')->get();

        return view('dashboard.tour_groups.index', compact('groups'));
    }

    public function create()
    {
        return view('dashboard.tour_groups.create');
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
            $group = new TourGroup();
            $group->fill($data)->save();

            return redirect()->route('tour_group.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tour_group.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $group = TourGroup::find($id);

        return view('dashboard.tour_groups.edit', compact('group'));
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
            $group = TourGroup::findOrFail($id);
            $data = $this->injectTranslations($request->all(), ['name']);
            $group->fill($data)->save();

            return redirect()->route('tour_group.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tour_group.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $group = TourGroup::findOrFail($id);
            $group->tour_group_translations()->delete();
            $group->delete();

            return redirect()->route('tour_group.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tour_group.index')->with(['error' => 'There is a problem, try later']);
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

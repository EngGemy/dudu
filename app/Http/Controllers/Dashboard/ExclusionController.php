<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Exclusion;
use Illuminate\Http\Request;

class ExclusionController extends Controller
{
    public function index()
    {
        $exclusions = Exclusion::orderBy('id', 'Desc')->get();

        return view('dashboard.exclusions.index', compact('exclusions'));
    }

    public function create()
    {
        return view('dashboard.exclusions.create');
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
            $exclusion = new Exclusion();
            $exclusion->fill($data)->save();

            return redirect()->route('exclusions.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('exclusions.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $exclusion = Exclusion::find($id);

        return view('dashboard.exclusions.edit', compact('exclusion'));
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
            $exclusion = Exclusion::findOrFail($id);
            $data = $this->injectTranslations($request->all(), ['name']);
            $exclusion->fill($data)->save();

            return redirect()->route('exclusions.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('exclusions.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $exclusion = Exclusion::findOrFail($id);
            $exclusion->exclusion_translations()->delete();
            $exclusion->delete();

            return redirect()->route('exclusions.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('exclusions.index')->with(['error' => 'There is a problem, try later']);
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

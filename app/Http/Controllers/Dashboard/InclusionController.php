<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Inclusion;
use Illuminate\Http\Request;

class InclusionController extends Controller
{
    public function index()
    {
        $inclusions = Inclusion::orderBy('id', 'Desc')->get();

        return view('dashboard.inclusions.index', compact('inclusions'));
    }

    public function create()
    {
        return view('dashboard.inclusions.create');
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
            $inclusion = new Inclusion();
            $inclusion->fill($data)->save();

            return redirect()->route('inclusions.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('inclusions.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $inclusion = Inclusion::find($id);

        return view('dashboard.inclusions.edit', compact('inclusion'));
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
            $inclusion = Inclusion::findOrFail($id);
            $data = $this->injectTranslations($request->all(), ['name']);
            $inclusion->fill($data)->save();

            return redirect()->route('inclusions.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('inclusions.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $inclusion = Inclusion::findOrFail($id);
            $inclusion->inclusion_translations()->delete();
            $inclusion->delete();

            return redirect()->route('inclusions.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('inclusions.index')->with(['error' => 'There is a problem, try later']);
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

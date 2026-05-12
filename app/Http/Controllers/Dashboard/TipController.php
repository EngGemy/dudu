<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index()
    {
        $tips = Tip::orderBy('id', 'Desc')->get();

        return view('dashboard.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('dashboard.tips.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'name.en.required' => 'The English name is required.',
            'image.required' => 'The Image is required.',
        ]);

        try {
            $data = $this->injectTranslations($request->except('image'), ['name']);
            $tip = new Tip();
            $tip->fill($data);
            $tip->image = uploadimage('tips', $request->image);
            $tip->save();

            return redirect()->route('tips.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tips.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function edit($id)
    {
        $tip = Tip::find($id);

        return view('dashboard.tips.edit', compact('tip'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'name.en.required' => 'The English name is required.',
        ]);

        try {
            $tip = Tip::findOrFail($id);
            $data = $this->injectTranslations($request->except('image'), ['name']);
            $tip->fill($data);
            if ($request->hasFile('image')) {
                $tip->image = uploadimage('tips', $request->image);
            }
            $tip->save();

            return redirect()->route('tips.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tips.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $tip = Tip::findOrFail($id);
            $tip->tip_translations()->delete();
            $tip->delete();

            return redirect()->route('tips.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tips.index')->with(['error' => 'There is a problem, try later']);
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

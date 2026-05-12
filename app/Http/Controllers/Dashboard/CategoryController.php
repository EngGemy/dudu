<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'Desc')->get();

        return view('dashboard.categories.index', compact('categories'));

    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'Desc')->parent()->get();

        return view('dashboard.categories.create', compact('categories'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
        ], [
            'name.en.required' => 'The English name is required',
        ]);
        try {

            if (! $request->has('is_active')) {
                $request->request->add(['is_active' => 0]);
            } else {
                $request->request->add(['is_active' => 1]);
            }

            $data = $this->injectTranslations($request->all(), ['name']);
            $category = Category::create($data);

            return redirect()->route('categories.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('categories.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::where('id', '!=', $category->id)->orderBy('created_at', 'Desc')->parent()->get();

        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
        ], [
            'name.en.required' => 'The English name is required',
        ]);
        try {
            $category = Category::findOrFail($id);

            if (! $request->has('is_active')) {
                $request->request->add(['is_active' => 0]);
            } else {
                $request->request->add(['is_active' => 1]);
            }

            $data = $this->injectTranslations($request->all(), ['name']);
            $category->fill($data)->save();

            return redirect()->route('categories.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->category_translations()->delete();
            $category->childrens()->delete();

            $category->delete();

            return redirect()->route('categories.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with(['error' => 'There is a problem, try later']);
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

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\Blog\BlogCategory;
use App\Models\Category;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'Desc')->get();

        return view('dashboard.blog_categories.index', compact('categories'));

    }

    public function create()
    {
        $categories = Category::orderBy('created_at', 'Desc')->parent()->get();

        return view('dashboard.blog_categories.create', compact('categories'));

    }

    public function store(BlogCategoryRequest $request)
    {

        try {
            $data = $request->validated();
            unset($data['image']);
            $data['image'] = uploadimage('blog_categories', $request->image);
            BlogCategory::create($data);

            return redirect()->route('blog_categories.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('blog_categories.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    public function edit($id)
    {
        $category = BlogCategory::find($id);
        $categories = BlogCategory::where('id', '!=', $category->id)->orderBy('created_at', 'Desc')->parent()->get();

        return view('dashboard.blog_categories.edit', compact('category', 'categories'));
    }

    public function update(BlogCategoryRequest $request, $id)
    {
        try {
            $blog = BlogCategory::findOrFail($id);
            $old_image = $blog->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('blog_categories', $request->image);
                delete_photo(asset('/assets/images/blog_categories/'.$old_image));
            }

            $blog->update($data);

            return redirect()->route('blog_categories.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('blog_categories.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $category = BlogCategory::findOrFail($id);

            $category->delete();

            return redirect()->route('blog_categories.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('blog_categories.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}

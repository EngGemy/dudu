<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogSubHead;
use App\Models\Tag\Tag;
use App\Models\Tour;
use App\Models\TravelService\TravelService;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tours = Tour::all();
        $tags = Tag::all();
        $services = TravelService::get();

        return view('dashboard.blogs.create', compact('tours', 'tags', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['image']);
            $data['image'] = uploadimage('blogs', $request->image);
            $data = $this->injectTranslations($data, ['title', 'description', 'head', 'meta_title', 'meta_description']);

            $blog = Blog::create($data);

            if ($request->has('tours')) {
                $blog->tours()->attach($request->tours);
            }

            if ($request->has('services')) {
                $blog->services()->attach($request->services);
            }

            if ($request->has('tags')) {
                $blog->tags()->attach($request->tags);
            }

            $sub_head = new BlogSubHead();
            $sub_head->blog_id = $blog->id;
            $sub_head->name = json_encode($request->subheaders);
            $sub_head->save();

            return redirect()->route('blogs.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('blogs.index')->with(['error' => 'There is a problem, try later']);
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
        $blog = Blog::findOrFail($id);
        $tours = Tour::all();
        $tags = Tag::all();
        $services = TravelService::get();

        $sub_headers_json = BlogSubHead::query()->where('blog_id', $id)->first();

        $sub_headers = json_decode($sub_headers_json?->name, true) ?? [];

        return view('dashboard.blogs.edit', compact('blog', 'tours', 'tags', 'sub_headers', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $old_image = $blog->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('blogs', $request->image);
            }

            $data = $this->injectTranslations($data, ['title', 'description', 'head', 'meta_title', 'meta_description']);
            $blog->update($data);

            if ($request->has('tours')) {
                $blog->tours()->sync($request->tours);
            }

            if ($request->has('services')) {
                $blog->services()->sync($request->services);
            }

            if ($request->has('tags')) {
                $blog->tags()->sync($request->tags);
            }

            $sub_head = BlogSubHead::where('blog_id', $id)->first();
            if (! $sub_head) {
                $sub_head = new BlogSubHead();
                $sub_head->blog_id = $id;
            }
            $sub_head->name = json_encode($request->subheaders);
            $sub_head->save();

            return redirect()->route('blogs.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('blogs.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->blog_translations()->delete();
            $blog->delete();

            return redirect()->route('blogs.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('blogs.index')->with(['error' => 'There is a problem, try later']);
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

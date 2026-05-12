<?php

namespace App\Http\Controllers\Website;

use App\Enum\BlogCategory;
use App\Enum\SliderStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendFeedbackRequest;
use App\Models\aboutUs\AboutUs;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogSubHead;
use App\Models\BlogPragraph\BlogPragraph;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Models\Message;
use App\Models\Nationality\Nationality;
use App\Models\Slider\Slider;
use App\Models\Tag\Tag;
use App\Models\Tip;
use App\Models\Tour;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $tips = Tip::query()->orderBy('id', 'desc')->get();
        $blogs = Blog::query()->orderBy('id', 'desc')->paginate(5);
        $blog_tips = Blog::query()->where('category', BlogCategory::tips->value)->get();
        $count_blogs = Blog::query()->count();
        $slider = Slider::query()->where('status', SliderStatus::Blog->value)->first();
        $tags = Tag::query()->get();
        $about = AboutUs::query()->orderBy('id', 'desc')->first();
        $hotels = Hotel::query()->orderBy('id')->get();
        $cities = City::query()->orderBy('id', 'desc')->get();

        $tours = Tour::where('publish', 1)->orderBy('id', 'desc')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.blogs', compact('tips', 'nationalities', 'tours', 'cities', 'blogs', 'blog_tips', 'count_blogs', 'slider', 'tags', 'about', 'hotels'));

    }

    public function show($slug)
    {

        $blog_preview = Blog::query()->with('galleries', 'comments')->whereTranslation('slug', $slug)->first();
        if (! $blog_preview) {
            abort(404);
        }

        $category_blogs = Blog::query()->where('category', $blog_preview->category)->where('id', '!=', $blog_preview->id)->get();
        $blog_pragraph = BlogPragraph::query()->where('blog_id', $blog_preview->id)->take(2)->orderBy('id', 'desc')->get();
        $sub_header = BlogSubHead::query()->where('blog_id', $blog_preview->id)->take(2)->orderBy('id', 'desc')->first();
        $sub_header_json = json_decode($sub_header?->name, true) ?? [];
        $blogs = Blog::query()->take(10)->orderBy('id', 'desc')->get();
        $cities = City::query()->get();
        $about = AboutUs::query()->orderBy('id', 'desc')->first();
        $hotels = Hotel::query()->orderBy('id')->get();

        $tours = $blog_preview->tours()
            ->with('galleries', 'tour_comments')
            ->where('publish', 1)
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $tags = Tag::query()->get();
        $blog_tags = $blog_preview->tags()->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.new-blog-preview', compact('blog_preview', 'nationalities', 'tours', 'tags', 'blog_tags', 'category_blogs', 'blog_pragraph', 'sub_header_json', 'blogs', 'cities', 'about', 'hotels'));

    }

    public function tag_blogs($tag_name)
    {
        $tag = Tag::query()->whereTranslationLike('name', $tag_name)->first();
        if (! $tag) {
            abort(404);
        }

        $tag_blogs = $tag->blogs()->take(4)->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.tag_blogs', compact('tag', 'nationalities', 'tag_blogs'));

    }

    public function search_blogs(Request $request)
    {
        $search = $request->search;
        $searchValue = $request->query('search');
        $search_blogs = Blog::query()->whereTranslationLike('title', '%'.$search.'%')->get();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.search_blogs', compact('search_blogs', 'nationalities', 'searchValue'));
    }

    public function send_feedback(SendFeedbackRequest $request)
    {
        $data = $request->validated();
        Message::create($data);

        return response()->json([
            'status' => 'success',
            'res' => 'Message Created Successfully',

        ]);

    }

    public function blog_destination()
    {
        $blog_destinations = Blog::query()->take(10)->orderBy('id', 'desc')->get();
        $tags = Tag::query()->get();
        $about = AboutUs::query()->orderBy('id', 'desc')->first();

        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.blogs-destination', compact('blog_destinations', 'nationalities', 'tags', 'about'));

    }

    public function blog_interest()
    {
        $blog_interest = Blog::query()->take(10)->orderBy('id', 'desc')->get();
        $tags = Tag::query()->get();
        $about = AboutUs::query()->orderBy('id', 'desc')->first();
        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.blogs-interest', compact('blog_interest', 'nationalities', 'tags', 'about'));

    }

    public function trending_now()
    {
        $trending_now = Blog::query()->take(10)->orderBy('id', 'desc')->get();
        $tags = Tag::query()->get();
        $about = AboutUs::query()->orderBy('id', 'desc')->first();

        $nationalities = Nationality::query()->orderBy('id', 'desc')->take(5)->get();

        return view('front.blogs-trending', compact('trending_now', 'nationalities', 'tags', 'about'));

    }
}

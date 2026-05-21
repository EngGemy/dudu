<?php

namespace App\Models\Blog;

use App\Models\BlogGallary;
use App\Models\Tag\Tag;
use App\Models\Tour;
use App\Models\TravelService\TravelService;
use App\Search\SearchableTranslated;
use App\Support\Seo\HasSeoMetadata;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, HasSeoMetadata, SearchableTranslated, Translatable;

    protected function searchIndexBase(): string
    {
        return 'blogs';
    }

    protected function searchType(): string
    {
        return 'blog';
    }

    protected function searchUrl(): string
    {
        $t = $this->translations->firstWhere('locale', $this->currentSearchLocale ?? app()->getLocale()) ?? $this->translations->first();

        return url('/blogs/'.($t->slug ?? $this->id));
    }

    protected function searchImage(): ?string
    {
        return $this->image_url ?: null;
    }

    public $translatedAttributes = ['title', 'description', 'slug', 'head', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'blog_id';

    protected $fillable = ['image', 'category', 'meta_img'];

    protected $appends = ['image_url'];

    public function getFormattedDate()
    {
        return Carbon::parse($this->created_at)->format('d F, Y'); // like 28 May, 2024
    }

    public function getUpdatedDate()
    {
        return Carbon::parse($this->updated_at)->format('d F, Y');
    }

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/blogs/'.$this->image);

        }
    }

    public function blog_translations()
    {
        return $this->hasMany(BlogTranslation::class, 'blog_id');
    }

    public static function booted()
    {
        static::deleted(function ($blog) {
            $blog->blog_translations()->delete();
            delete_photo($blog->image_url);

        });
    }

    public function galleries()
    {
        return $this->hasMany(BlogGallary::class, 'blog_id');
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id');
    }

    public function getBlogCommentsCount()
    {
        return $this->comments->count();
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'blog_tours', 'blog_id', 'tour_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }

    public function services()
    {
        return $this->belongsToMany(TravelService::class, 'blog_services', 'blog_id', 'service_id');
    }

    public function type_category_blog($type)
    {

        $data = match ($type) {
            0 => 'Tips',
            1 => 'Destination',
            2 => 'Interest',
            3 => 'Trading',

            default => null,

        };

        return $data;
    }

    public function blog_subheaders()
    {
        return $this->hasMany(BlogSubHead::class, 'blog_id');

    }
}

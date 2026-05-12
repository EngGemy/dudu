<?php

namespace App\Models;

use App\Models\Blog\Blog;
use App\Models\Hotel\Hotel;
use App\Models\TravelService\TravelService;
use App\Search\SearchableTranslated;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tour extends Model
{
    use HasSlug, SearchableTranslated, Translatable;

    protected function searchIndexBase(): string
    {
        return 'tours';
    }

    protected function searchType(): string
    {
        return 'tour';
    }

    protected function searchUrl(): string
    {
        return url('/tour/'.$this->slug);
    }

    protected function searchImage(): ?string
    {
        return $this->photo ?: null;
    }

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $fillable = ['slug', 'is_active', 'category_id', 'price', 'price_offer', 'reviews', 'rate', 'photo', 'long_address', 'lat_address', 'publish', 'meta_img'];

    public $translatedAttributes = ['name', 'description', 'tip_info', 'meta_title', 'meta_description'];

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/tours/'.$value) : '';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function tour_translations()
    {
        return $this->hasMany(TourTranslation::class, 'tour_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'tour_id');
    }

    public function comments()
    {
        return $this->hasMany(TourComment::class, 'tour_id');
    }

    public function tour_highlights()
    {
        return $this->hasMany(TourHighlight::class, 'tour_id');
    }

    public function tour_comments()
    {
        return $this->hasMany(TourComment::class, 'tour_id');
    }

    public function tour_iterations()
    {
        return $this->hasMany(TourIteration::class, 'tour_id');
    }

    public function tour_tips()
    {
        return $this->hasOne(TourTip::class, 'tour_id');
    }

    public function tour_overviews()
    {
        return $this->hasOne(TourOverview::class, 'tour_id');
    }

    public function tour_features()
    {
        return $this->hasOne(TourFeature::class, 'tour_id');
    }

    public function tour_exclusions()
    {
        return $this->hasOne(TourExclusion::class, 'tour_id');
    }

    public function tour_inclusions()
    {
        return $this->hasOne(TourInclusion::class, 'tour_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_tours');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tour_type()
    {
        return $this->hasOne(TourType::class, 'tour_id');
    }

    public function overview_values($type)
    {
        if ($this->tour_overviews && $this->tour_overviews->translate(app()->getLocale(), true)->values ?? '') {
            $values = json_decode($this->tour_overviews->translate(app()->getLocale(), true)->values ?? '');
            $location_from = null;
            $location_to = null;

            if (isset($values->location_from)) {
                $city_from = City::find($values->location_from);
                if ($city_from) {
                    $location_from = $city_from->translate(app()->getLocale(), true)->name ?? '';
                }
            }

            if (isset($values->location_to)) {
                $city_to = City::find($values->location_to);
                if ($city_to) {
                    $location_to = $city_to->translate(app()->getLocale(), true)->name ?? '';
                }
            }
            $data = match ($type) {
                'days' => $values->days ?? null,
                'nights' => $values->nights ?? null,
                'cancellation' => $values->cancellation ?? null,
                'availability' => $values->availability ?? null,
                'type' => TourType::findOrFail($values->tour_type)->name ?? null,
                'group' => TourGroup::findOrFail($values->tour_group)->name ?? null,
                'location_from' => $location_from ?? null,
                'location_to' => $location_to ?? null,
                default => null,
            };

            return $data;
        }

        return null;
    }

    public function include_values()
    {
        if ($this->tour_inclusions) {
            $values = json_decode($this->tour_inclusions->values) ?? [];
            $vals = [];
            foreach ($values as $v) {
                array_push($vals, Inclusion::findOrFail($v)->translate(app()->getLocale(), true)->name ?? '');
            }

            return $vals;
        }

        return [];
    }

    public function tour_tips_values()
    {
        if ($this->tour_tips) {
            $values = json_decode($this->tour_tips->values) ?? [];
            $vals = [];
            foreach ($values as $v) {
                array_push($vals, Tip::findOrFail($v)->translate(app()->getLocale(), true)->name ?? '');
            }

            return $vals;
        }

        return [];
    }

    public function tour_featues_values()
    {
        if ($this->tour_features) {
            $values = json_decode($this->tour_features->translate(app()->getLocale(), true)->values ?? '[]') ?? [];

            return $values;
        }

        return [];
    }

    public function exclude_values()
    {
        if ($this->tour_exclusions) {
            $values = json_decode($this->tour_exclusions->values) ?? [];
            $vals = [];
            foreach ($values as $v) {
                array_push($vals, Exclusion::findOrFail($v)->translate(app()->getLocale(), true)->name ?? '');
            }

            return $vals;
        }

        return [];
    }

    public function getDiscountPercentage()
    {
        return (int) ((($this->price - $this->price_offer) / $this->price) * 100);
    }

    public function getPrice()
    {
        return ($this->price_offer != null) ? $this->price_offer : $this->price;

    }

    public function services()
    {
        return $this->belongsToMany(TravelService::class, 'tour_service', 'tour_id', 'service_id');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($hall) { // before delete() method call this
            $hall->services()->detach();
        });
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['category_id'] ?? false, function ($query, $categoryId) {
            $category = Category::find($categoryId);
            $categories_id = [];
            $categories_id = $category->childrens->pluck('id')->toArray();
            array_push($categories_id, $category->id);
            if ($category->parent_id != null) {
                array_push($categories_id, $category->parent_id);
            }
            $query->whereIn('category_id', $categories_id);
        });
        $query->when($filters['rate'] ?? false, function ($query, $rate) {
            $query->where('category_id', $rate);
        });
        $query->when($filters['location_from'] ?? false, function ($query, $locationFrom) {
            $query->whereHas('overview', function ($query) use ($locationFrom) {
                $query->whereJsonContains('location_from', $locationFrom);
            });
        });
        $query->when($filters['availability'] ?? false, function ($query, $availability) {
            $query->whereHas('overview', function ($query) use ($availability) {
                $query->whereJsonContains('availability', $availability);
            });
        });

        $query->when($filters['location_to'] ?? false, function ($query, $locationTo) {
            $query->whereHas('overview', function ($query) use ($locationTo) {
                $query->whereJsonContains('location_to', $locationTo);
            });
        });
        $query->when($filters['days'] ?? false, function ($query, $day) {
            $query->whereHas('overview', function ($query) use ($day) {
                $query->whereJsonContains('days', $day);
            });
        });

        $query->when($filters['group_size'] ?? false, function ($query, $groupSize) {
            $query->whereHas('overview', function ($query) use ($groupSize) {
                $query->whereJsonContains('tour_group', $groupSize);
            });
        });

        $query->when($filters['tour_type'] ?? false, function ($query, $tourType) {
            $query->whereHas('overview', function ($query) use ($tourType) {
                $query->whereJsonContains('tour_type', $tourType);
            });
        });
        $query->when($filters['discount'] ?? false, function ($query, $discount) {
            $query->whereRaw('((`price` - `price_offer`) / `price`) * 100 >= ?', [$discount]);
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tours', 'tour_id', 'blog_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}

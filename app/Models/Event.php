<?php

namespace App\Models;

use App\Search\SearchableTranslated;
use App\Support\Seo\HasSeoMetadata;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasSeoMetadata, HasSlug, SearchableTranslated, Translatable;

    protected function searchIndexBase(): string
    {
        return 'events';
    }

    protected function searchType(): string
    {
        return 'event';
    }

    protected function searchUrl(): string
    {
        return url('/event_details/'.$this->slug);
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

    protected $fillable = ['slug', 'is_active', 'photo', 'meta_img'];

    public $translatedAttributes = ['name', 'description', 'meta_title', 'meta_description'];

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/events/'.$value) : '';
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
    public function event_translations()
    {
        return $this->hasMany(EventTranslation::class, 'event_id');
    }

    public function galleries()
    {
        return $this->hasMany(EventGallery::class, 'event_id');
    }

    public function information()
    {
        return $this->hasMany(EventInformation::class, 'event_id');
    }

    public function event_iterations()
    {
        return $this->hasMany(EventIteration::class, 'event_id');
    }

    public function event_overviews()
    {
        return $this->hasOne(EventOverview::class, 'event_id');
    }

    public function event_exclusions()
    {
        return $this->hasOne(EventExclusion::class, 'event_id');
    }

    public function event_inclusions()
    {
        return $this->hasOne(EventInclusion::class, 'event_id');
    }

    public function overview_values($type)
    {
        $overviewTranslation = $this->event_overviews?->translate(app()->getLocale(), true);

        if ($overviewTranslation?->values) {
            $values = json_decode($overviewTranslation->values ?? '');
            $locations = [];

            if (isset($values->locations)) {
                foreach (json_decode($values->locations) ?: [] as $loc) {
                    $city = City::find($loc);
                    array_push($locations, $city?->translate(app()->getLocale(), true)?->name ?? '');
                }

            }

            $data = match ($type) {
                'locations' => $locations ?? null,
                'start_date' => $values->start_date ?? null,
                'cancellation' => $values->cancellation ?? null,
                'end_date' => $values->end_date ?? null,
                'statues' => $values->statues ?? null,
                'website' => $values->website ?? null,
                'email' => $values->email ?? null,
                'phone' => $values->phone ?? null,

                default => null,
            };

            return $data;
        }

        return $type === 'locations' ? [] : null;
    }

    public function exclude_values()
    {
        if ($this->event_exclusions && ($this->event_exclusions->translate(app()->getLocale(), true)->values ?? '')) {
            $values = json_decode($this->event_exclusions->translate(app()->getLocale(), true)->values ?? '[]') ?? [];
            $vals = [];
            foreach ($values as $v) {
                array_push($vals, $v);
            }

            return $vals;
        }

        return [];
    }

    public function include_values()
    {
        if ($this->event_inclusions && ($this->event_inclusions->translate(app()->getLocale(), true)->values ?? '')) {
            $values = json_decode($this->event_inclusions->translate(app()->getLocale(), true)->values ?? '[]') ?? [];
            $vals = [];
            foreach ($values as $v) {
                array_push($vals, $v);
            }

            return $vals;
        }

        return [];
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
}

<?php

namespace App\Models\TravelService;

use App\Models\Blog\Blog;
use App\Models\Tour;
use App\Search\SearchableTranslated;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelService extends Model
{
    use HasFactory, SearchableTranslated, Translatable;

    protected function searchIndexBase(): string
    {
        return 'services';
    }

    protected function searchType(): string
    {
        return 'service';
    }

    protected function searchUrl(): string
    {
        $t = $this->translations->firstWhere('locale', $this->currentSearchLocale ?? app()->getLocale()) ?? $this->translations->first();

        return url('/services/'.($t->slug ?? $this->id));
    }

    protected function searchImage(): ?string
    {
        return $this->image_url ?: null;
    }

    public $translatedAttributes = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'travel_services_id';

    protected $fillable = ['main_image', 'icon', 'status', 'meta_img'];

    protected $appends = ['image_url', 'icon_url'];

    public function getImageUrlAttribute()
    {

        if ($this->main_image) {
            return asset('/assets/images/travel_services_images/'.$this->main_image);

        }
    }

    public function travel_services_translations()
    {
        return $this->hasMany(TravelServiceTranslation::class, 'travel_services_id');
    }

    public function getIconUrlAttribute()
    {

        if ($this->icon) {
            return asset('/assets/images/travel_services_icons/'.$this->icon);
        }
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_service', 'service_id', 'tour_id');
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_services', 'service_id', 'blog_id');
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            0 => 'Accommodation',
            1 => 'Transportation',
            2 => 'Flight_Reservation',
            3 => 'Visa_Formalities',
            4 => 'Tour_Guidance',
            default => null,

        };

        return $data;
    }
}

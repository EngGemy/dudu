<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug,Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $fillable = ['parent_id', 'slug', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $translatedAttributes = ['name'];

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
    public function category_translations()
    {
        return $this->hasMany(CategoryTranslation::class, 'category_id');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'categories_tours');
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }

    public function getActive()
    {
        return $this->is_active == 0 ? 'Not Active' : 'Active';
    }

    public function _parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    //get all childrens=
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

<?php

namespace App;

use App\Http\Traits\Image;
use App\Http\Traits\ModelBasicTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable, ModelBasicTrait, Image;

    protected $fillable = ['title', 'description', 'meta_title', 'meta_description', 'meta_keywords'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_categories',
            'category_id',
            'product_id'
        );
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        $this->removeImage('categories', 'image');
        $this->delete();
    }

}

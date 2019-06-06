<?php

namespace App;

use App\Http\Traits\{Image, ModelBasicTrait};
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App
 */
class Service extends Model
{
    use ModelBasicTrait, Image, Sluggable;

    protected $fillable = ['title', 'content', 'description', 'meta_title', 'meta_description', 'meta_keywords'];

    public function sluggable(): array
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
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(
            Project::class,
            'project_services',
            'service_id',
            'project_id'
        );
    }

    /**
     * Удаляем услугу
     *
     */
    public function remove()
    {
        $this->removeImage('services', 'logo');
        $this->delete();
    }

}

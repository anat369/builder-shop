<?php

namespace App;

use App\Http\Traits\Image;
use App\Http\Traits\ModelBasicTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{
    use ModelBasicTrait, Sluggable, Image;

    protected $fillable = ['title',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'date',
        'address',
        'customer',
    ];

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
    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'project_services',
            'project_id',
            'service_id'
        );
    }

    /**
     * Удаляем проект
     *
     */
    public function remove()
    {
        for ($number = 0; $number <= 7; $number++)
        {
            $this->removeImage('projects', 'image_' . $number);
        }

        $this->delete();
    }

    /**
     * @param $ids
     */
    public function setServices($ids)
    {
        if ($ids == null)
        {
            return;
        }
// используем для связи стандартный метод laravel sync
        $this->services()->sync($ids);
    }


    /**
     * @return string
     */
    public function getServicesTitles()
    {
        return (!$this->services->isEmpty())
            ?   implode(', ', $this->services->pluck('title')->all())
            : 'Нет услуги';
    }


}

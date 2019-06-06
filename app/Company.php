<?php

namespace App;

use App\Http\Traits\Image;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\ModelBasicTrait;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use ModelBasicTrait, Image;

    protected $fillable =['title',
                        'description',
                        'content',
                        'address',
                        'phone',
                        'email',
                        'work_time',
                        'instagram',
                        'meta_title',
                        'meta_description',
                        'meta_keywords',
    ];

    /**
     * @param $price_list
     */
    public  function uploadPriceList($price_list)
    {
        if ('price_list' == $price_list or null == $price_list)
        {
            return;
        }
        $this->removePriceList();
// формируем название картинки, используя рандом из 10 символов
        $filename = 'price_list_' . date('Y-h-d') . '.' . $price_list->extension();
// загружаем полученную картинку в папку uploads
        $price_list->storeAs('uploads/companies/', $filename);
        $this->price_list = $filename;
        $this->save();
    }

    /**
     * @return string
     */
    public function getPriceList()
    {
        if ('price_list' == $this->price_list or null == $this->price_list)
        {
            return '#';
        }
        return '/uploads/companies/' . $this->price_list;
    }

    /**
     * var string $price_list
     */
    public function removePriceList()
    {
        if (null !== $this->price_list)
        {
// используя стандартный класс laravel Storage удаляем картинку,
// если она была раньше загружена
            Storage::delete('uploads/companies/' . $this->price_list);
        }
    }
}

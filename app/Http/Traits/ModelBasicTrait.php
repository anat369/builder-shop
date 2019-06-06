<?php

namespace App\Http\Traits;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

trait ModelBasicTrait
{

    public static function add($fields)
    {
        $example = new static;
        $example->fill($fields);
        $example->save();

        return $example;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

//    public  function uploadLogo($logo, $folder_name)
//    {
//        if (null == $logo) {
//            return;
//        }
//        $this->removeLogo($folder_name);
//// формируем название картинки, используя рандом из 8 символов
//        $filename = str_random(8) . '.' . $logo->extension();
//// загружаем полученную картинку в папку uploads
//        $logo->storeAs('uploads/' .$folder_name. '/', $filename);
//        $this->logo = $filename;
//        $this->save();
//    }
//
//    public function getLogo($folder_name)
//    {
//        if (null == $this->logo)
//        {
//            return '/images/no-image.png';
//        }
//        return '/uploads/'. $folder_name .'/' . $this->logo;
//    }
//
//    public function removeLogo($folder_name)
//    {
//        if (null != $this->logo)
//        {
//// используя стандартный класс laravel Storage удаляем картинку,
//// если она была раньше загружена
//            Storage::delete('uploads/'. $folder_name .'/' . $this->logo);
//        }
//    }
}
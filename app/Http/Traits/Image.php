<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait Image
{

    /**
     * @param $image
     * @param $folder_name
     * @param string $table_field
     */
    public  function uploadImage($image, $folder_name, $table_field = ' ')
    {
        if (null == $image) {
            return;
        }
        $this->removeImage($folder_name);
// формируем название картинки, используя рандом из 8 символов
        $filename = str_random(8) . '.' . $image->extension();
// загружаем полученную картинку в папку uploads
        $image->storeAs('uploads/' .$folder_name. '/', $filename);
        $this->{$table_field} = $filename;
        $this->save();
    }

    /**
     * @param $folder_name
     * @param string $table_field
     * @return string
     */
    public function getImage($folder_name, $table_field = ' ')
    {
        if (null == $this->{$table_field})
        {
            return '/images/no-image.png';
        }
        return '/uploads/'. $folder_name .'/' . $this->{$table_field};
    }

    /**
     * @param $folder_name
     * @param string $table_field
     */
    public function removeImage($folder_name, $table_field = ' ')
    {
        if (null != $this->{$table_field})
        {
// используя стандартный класс laravel Storage удаляем картинку,
// если она была раньше загружена
            Storage::delete('uploads/'. $folder_name .'/' . $this->{$table_field});
        }
    }

}
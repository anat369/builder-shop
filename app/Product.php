<?php

namespace App;

use App\Http\Traits\{Image, ModelBasicTrait};
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    use ModelBasicTrait, Sluggable, Image;

    protected $fillable =['title',
        'description',
        'price',
        'status',
        'availability',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'item_number',
        'country_id',
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
     * Товар может принадлежать нескольким категориям
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'product_categories',
            'product_id',
            'category_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(
            Order::class,
            'order_products',
            'product_id',
            'order_id'
        );
    }

    /**
     * Удаляем товар
     *
     */
    public function remove()
    {
        $this->removeImage('products', 'image_0');
        $this->removeImage('products', 'image_1');
        $this->removeImage('products', 'image_2');
        $this->removeImage('products', 'image_3');
        $this->removeImage('products', 'image_4');
        $this->delete();
    }

    /**
     * @param $ids
     */
    public function setCategories($ids)
    {
        if ($ids == null)
        {
            return;
        }
// используем для связи стандартный метод laravel sync
        $this->categories()->sync($ids);
    }


    /**
     * @return string
     */
    public function getCategoriesTitles()
    {
        return (!$this->categories->isEmpty())
            ?   implode(', ', $this->categories->pluck('title')->all())
            : 'Нет категории';
    }

    /**
     * @param $q
     * @return mixed
     */
    public static function search($q){
        $query = mb_strtolower($q, 'UTF-8');
        $array = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($array as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                    {
                        $query[] = $word . "*";
                        break;
                    }
                case ($len > 3 && $len <= 6):
                    {
                        $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 6 && $len <= 9):
                    {
                        $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 9):
                    {
                        $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $products = Product::whereRaw(
            "MATCH(title,description) AGAINST(? IN BOOLEAN MODE)", // title, description - поля, по которым нужно искать
            $qQeury)->paginate(12) ;
        return $products;
    }
}

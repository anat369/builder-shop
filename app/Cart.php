<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    public $productsInCart = [];
    public $totalPrice = 0;

    public static function addProduct(int $id)
    {

        $product = Product::find($id);

        $productsInCart = [];

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (session()->get('products')) {
            // То заполним наш массив товарами
            $productsInCart = session()->get('products');
        }

        // Проверяем есть ли уже такой товар в корзине
        if (array_key_exists($id, $productsInCart)) {
            // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
            $productsInCart[$id]['quantity'] ++;
        } else {
            // Если нет, добавляем id нового товара в корзину с количеством 1
            $productsInCart[$id]['quantity'] = 1;
            $productsInCart[$id]['price'] = $product->price;
        }

        Session::put('products', $productsInCart);

        return self::countProductsInCart();
    }


    /**
     * @return string
     */
    public static function countProductsInCart()
    {
        $countProducts = 0;
        // Проверка наличия товаров в корзине
        if (session()->get('products')) {
            foreach (session()->get('products') as $product) {
                $countProducts += $product['quantity'];
            }
        }

        return Cart::declension(['товар', 'товара', 'товаров'], $countProducts);
    }

    /**
     * @return bool
     */
    public function getProducts()
    {
        return session()->get('products') ?: false;
    }

    /**
     * @param $products
     * @return float|int
     */
    public function getTotalPrice($products)
    {
        if ($products) {
            foreach ($products as $product) {
                $this->totalPrice += $product['quantity'] * $product['price'];
            }
        }

        return $this->totalPrice;
    }

    /**
     * @param int $id
     */
    public function deleteProducts(int $id)
    {
        $this->productsInCart = Cart::getProducts();
        unset($this->productsInCart[$id]);
        Session::put('products', $this->productsInCart);
    }

    /**
     * @param array $titles
     * @param int $number
     * @return string
     */
    public static function declension(array $titles, int $number)
    {
        $cases = [2, 0, 1, 1, 1, 2];

        return $number. ' '. $titles[($number%100 > 4 && $number%100 < 20) ? 2: $cases[min($number%10, 5)]];
    }


}

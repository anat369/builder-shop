<?php

namespace App\Http\Controllers;

use App\{Cart, Category, Product};
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.products', [
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }

    public function show($slug)
    {
        return view('pages.product', [
            'product' => Product::where('slug', $slug)->firstOrFail()
        ]);
    }

    public function categoryPage($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = $category->products()->paginate(4);

        return view('pages.category', [
            'products'  =>  $products,
            'categories' => Category::all(),
            'category' => $category,
        ]);
    }

    public function addProductInCart(Request $request)
    {
        $cart = new Cart();

        return $cart->addProduct($request->product_id);
    }

    public function deleteProductInCart(Request $request)
    {
        $cart = new Cart();

        $cart->deleteProducts($request->product_id);

        return Cart::countProductsInCart();
    }

    public function showCart()
    {
        $products = [];

        $cart = new Cart();

        $productsInCart = $cart->getProducts();

        if ($productsInCart) {
            foreach ($productsInCart as $key => $value) {
                $products[$key] = Product::find($key);
                $products[$key]['count'] = $value;
            }
        }

        $totalPrice = $cart->getTotalPrice($productsInCart);

        return view('pages.cart', [
            'products' => $products,
            'totalPrice' => $totalPrice,
        ]);

    }
}

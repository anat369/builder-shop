<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\{Cart, Product, Order, User};

use Illuminate\Support\Facades\{DB, Session};

class CartController extends Controller
{
    public function index()
    {
        $products = [];

        $totalPrice = 0;

        $cart = new Cart();
        $productsInCart = $cart->getProducts();

//        dd($productsInCart);
        // Получим идентификаторы и количество товаров в корзине
        if ($productsInCart) {
            foreach ($productsInCart as $key => $value) {
                $products[$key] = Product::find($key);
                $products[$key]['count'] = $value['quantity'];
                $products[$key]['price'] = $value['price'];
            }
        }

        $totalPrice = $cart->getTotalPrice($productsInCart);

        return view('pages.cart', [
            'products' => $products,
            'totalPrice' => $totalPrice,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function order(Request $request)
    {

//        dd($request->session()->get('products'));
        if (!Auth::check()) {
            $this->validate($request, [
                'name' => 'required|max:250',
                'phone' => 'required|max:250',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'message' => 'max:2000',
            ]);
            $user = User::add($request->all());
            $user->generatePassword($request->get('password'));
            $user_id = $user->id;
        } else {
            $this->validate($request, [
                'message' => 'max:2000',
            ]);
            $user_id = Auth::user()->id;
        }

        $order = Order::add([
            'user_id' => $user_id,
            'message' => $request->message,
        ]);

        $order_id = $order->id;

        foreach ($request->session()->get('products') as $key => $value) {
            DB::table('order_products')->insert([
                'product_id' => $key,
                'order_id' => $order_id,
                'quantity' => $value['quantity'],
                'price' => $value['price']
            ]);
        }

        Session::forget('products');

        return redirect()->back()->with('status', 'Ваш заказ принят, наш менеджер с вами свяжется!');
    }

    public function orders()
    {
        $orders = Order::all()->where('user_id', '=', Auth::user()->id);

        foreach ($orders as $order) {
            $order->items = json_decode($order->items);
            foreach ($order->items as $item) {
                $items[] = Item::find($item);
            }
        }


        return view('pages.orders',[
            'orders' => $orders,
        ]);
    }
}

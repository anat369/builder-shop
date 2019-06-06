<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Company;
use App\Project;
use App\Service;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'company' => Company::latest()->first(),
            'latestProject' => Project::orderBy('id', 'desc')->take(3)->get(),
            'services' => Service::orderBy('id', 'desc')->take(3)->get(),
        ]);
    }

    public function contactPage()
    {
        return view('pages.contact',[
            'company' => Company::latest()->first(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function contactForm(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:250',
            'message' => 'required|max:800',
            'email' => 'required|email',
        ]);

        $phone = preg_replace("/[^,.0-9]/", '', $request->get('phone'));

        DB::table('messages')->insert([
            'name' => $request->get('name'),
            'phone' => $phone,
            'email' => $request->get('email'),
            'message' => $request->get('message'),
        ]);

        return redirect()->back()->with('status', 'Сообщение успешно отправлено!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signupForm(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'captcha' => 'required|captcha',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        return redirect('/');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginForm(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email',
            'password'	=>	'required'
        ]);

// используем метод класса Auth attempt,
// который делает запрос в базу и проверяет - есть ли там
// такой пользователь
// если все в порядке, то заходим под данными пользователя
// и перенаправляем на главную, иначе отправляем пользователя
// назад и показываем сообщение об ошибке
        if(Auth::attempt([
            'email'	=>	$request->get('email'),
            'password'	=>	$request->get('password')
        ])) {
            return redirect('/');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль, попробуйте еще раз');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

//    public function addCart(Request $request)
//    {
//        $cart = new Cart();
//        return $cart->addItems($request->itemId);
//    }

    public function addCart(Request $request)
    {
        $countProducts = Cart::addProduct($request->itemId);

        return $countProducts;
    }

    public function deleteCart(Request $request)
    {
        $cart = new Cart();
        $cart->deleteProducts($request->product_id);
        return $cart->countProductsInCart();
    }

}

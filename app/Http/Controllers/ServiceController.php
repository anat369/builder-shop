<?php

namespace App\Http\Controllers;

use App\{Order, Service, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        return view('pages.services', [
            'services' => Service::all()
        ]);
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('pages.service', [
            'service' => $service,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function order(Request $request)
    {
        if (!Auth::check()) {
        $this->validate($request, [
            'service_id' => 'required|integer',
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
                'service_id' => 'required|integer',
                'message' => 'max:2000',
            ]);
            $user_id = Auth::user()->id;
        }

        $order = Order::add([
            'user_id' => $user_id,
            'message' => $request->message,
        ]);

        $order->setService($request->service_id);

        return redirect()->back()->with('status', 'Ваш заказ принят, спасибо! Наш менеджер свяжется с вами в ближайшее время!');
    }

}

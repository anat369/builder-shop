<?php

namespace App\Http\Controllers\Admin;

use App\OrderService;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:1000',
            'content' => 'required|max:5000',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
            'logo' => 'nullable|image'
        ]);

        $service = Service::add($request->all());
        $service->uploadImage($request->file('logo'), 'services', 'logo');
        return redirect()->route('services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.services.edit', [
            'service' => Service::find($id)
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:1000',
            'content' => 'required|max:5000',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
            'logo' => 'nullable|image'
        ]);

        $service = Service::find($id);
        $service->edit($request->all());
        $service->uploadImage($request->file('logo'), 'services', 'logo');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->remove();

        return redirect()->route('services.index');
    }

    public function orders()
    {
        return view('admin.services.orders', [
            'orders' => OrderService::all()
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editOrder(int $id)
    {

        $orderService = OrderService::find($id);
        if (0 == $orderService->status) {
            $orderService->status = 1;
            $orderService->save();
        }

        return view('admin.services.order-edit', [
            'orderService' => $orderService,
        ]);
    }

    public function deleteOrder( int $id)
    {
        OrderService::find($id)->remove();
        return redirect()->route('admin.services.orders');
    }
}

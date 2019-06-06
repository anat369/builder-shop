<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function serviceOrders()
    {
        $orders = Order::getOrderServices();

        return view('admin.orders.service-orders', [
            'orders' => $orders,
        ]);
    }

    public function productOrders()
    {
        $orders = Order::getOrderProducts();

        return view('admin.orders.product-orders', [
            'orders' => $orders,
        ]);
    }

    public function editOrderProduct(int $order_id)
    {
        $order = Order::getEditOrderProduct($order_id);

        return view('admin.orders.product-order-edit', [
            'order' => $order,
        ]);
    }

    public function editOrderService(int $order_id)
    {
        $order = Order::getEditOrderService($order_id);
        return view('admin.orders.service-order-edit',[
            'order' => $order[0],
        ]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\ModelBasicTrait;
use Illuminate\Support\Facades\DB;

/**
 * Class Order
 * @package App
 */
class Order extends Model
{
    use ModelBasicTrait;

    protected $fillable = ['user_id', 'message'];

    /**
     * У одного заказа может быть только один заказчик
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_products',
            'order_id',
            'product_id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function service()
    {
        return $this->belongsToMany(
            Service::class,
            'order_services',
            'order_id',
            'service_id'
        );
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getOrderServices()
    {
         return DB::table('orders')
            ->join('order_services', 'orders.id', '=', 'order_services.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('services', 'order_services.service_id', '=', 'services.id')
            ->select('orders.id', 'orders.user_id',
                'orders.message', 'orders.status', 'orders.created_at',
                'order_services.service_id','users.name', 'users.email',
                'users.phone', 'services.title', 'services.slug')->get();
    }

    /**
     * @param int $order_id
     * @return \Illuminate\Support\Collection
     */
    public static function getEditOrderService( int $order_id)
    {
        return DB::table('orders')
            ->where('orders.id', '=', $order_id)
            ->join('order_services', 'orders.id', '=', 'order_services.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('services', 'order_services.service_id', '=', 'services.id')
            ->select('orders.id', 'orders.user_id',
                'orders.message', 'orders.status', 'orders.created_at',
                'order_services.service_id','users.name', 'users.email',
                'users.phone', 'services.title', 'services.slug')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getOrderProducts()
    {
        $orders =  DB::table('orders')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->select('orders.id', 'orders.user_id', 'orders.message',
                'orders.status', 'orders.created_at','users.name', 'users.email', 'users.phone')
            ->distinct()->get();

        return $orders;
    }

    /**
     * @param int $order_id
     * @return \Illuminate\Support\Collection
     */
    public static function getEditOrderProduct( int $order_id)
    {
        return DB::table('orders')
            ->where('orders.id', '=', $order_id)
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->select('orders.id', 'orders.user_id',
                'orders.message', 'orders.status', 'orders.created_at',
                'order_products.product_id', 'order_products.quantity', 'order_products.price',
                'products.title', 'products.slug',
                'users.name', 'users.email', 'users.phone')
            ->get();
    }

    /**
     * @param $id
     */
    public function setService($id)
    {
        if (null == $id) {
            return;
        }
        $this->service()->sync($id);
    }

    /**
     * @param array $array
     */
    public function setProducts( array $array)
    {
        if (null == $array) {
            return;
        }
        $this->products()->sync($array);
    }


    /**
     * Удаляем заказ
     *
     */
    public function remove()
    {
        $this->delete();
    }

    /**
     * @return int
     */
    public static function countNewOrderServices()
    {
        $orders = DB::table('orders')->where('status', '0')
            ->join('order_services', 'orders.id', '=', 'order_services.order_id')
            ->select('orders.id')->get();

        return count($orders);
    }

    /**
     * @return int
     */
    public static function countNewOrderProducts()
    {
        $orders = DB::table('orders')->where('status', '0')
            ->join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->select('orders.id')
            ->distinct()->get();

        return count($orders);

    }
}

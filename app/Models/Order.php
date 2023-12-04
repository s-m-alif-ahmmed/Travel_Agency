<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    private static $order;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    public function packagePrice()
    {
        return $this->belongsTo(PackagePrice::class, 'price_id');
    }



//    public function order()
//    {
//        return $this->belongsTo(Order::class, 'id', 'order_id');
//    }

    public static function statusOrder($id) {
        self::$order = Order::find($id);
        if (self::$order->order_status == 1){
            self::$order->order_status = 0;
        }else{
            self::$order->order_status = 1;
        }
        self::$order->save();
    }

    public static function deleteOrder($id)
    {
        Order::find($id)->delete();
    }
}

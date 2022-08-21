<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    function orderConfirm(Request $request)
    {
        $dishnamesArray = $request->dishname;
        $dishquanttiyArray = $request->dishquantity;
        $dishpriceArray = $request->dishprice;

        $data = new Order();
        $data->dishname = implode(",", $dishnamesArray);
        $data->quantity = implode(",", $dishquanttiyArray);
        $data->price = implode(",", $dishpriceArray);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->customer_id = Auth::user()->user_id;
        $data->restaurant_id = $request->restaurant_id;

        Cart::where('user_id', Auth::user()->user_id)->delete();

        $data->save();
        //dd(gettype($data->dishname));
        return back()->with('sms', 'Order Sent');
    }
    public function showOrders()
    {
        $orders = DB::table('orders')->where('restaurant_id', Auth::user()->user_id)->get();
        return view('restaurant.orders.manageOrders', ['orders' => $orders]);
    }

    public function approveOrder($order_id)
    {
        Order::where('order_id', $order_id)->update(array('order_status' => 1));
        return back();
    }

    public function show_customer_orders()
    {
        $orders = DB::table('orders')->where('customer_id', Auth::user()->user_id)->get();
        $restaurant_id = $orders[0]->restaurant_id;
        $restaurant = User::where('user_id', $restaurant_id)->pluck('name')->first();
        return view('customer.previous_Orders', ['orders' => $orders, 'restaurant_name' => $restaurant]);
    }


    public function bill($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        return view('bill', ['order' => $order]);
    }
}

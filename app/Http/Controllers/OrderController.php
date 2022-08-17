<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Dish;
use App\Models\Order;
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

        $data->save();
        //dd(gettype($data->dishname));
        return back();
    }
    public function showOrders()
    {
        $orders = DB::table('orders')->where('restaurant_id', Auth::user()->user_id)->get();
        return view('restaurant.orders.manageOrders', ['orders' => $orders]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public function index()
    {
        return view('restaurant.menu.addDish');
    }

    public function checkRestaurant(Dish $dish)
    {
        if ($dish->restaurant_id == Auth::user()->user_id) {
            return True;
        }
    }
    public function save_dish_table(Request $request)
    {
        $imgName = $request->file("dish_image");
        $image = $imgName->getClientOriginalName();
        $directory = 'adminDashboardSourceFiles/dish_img/';
        $imgUrl = $directory . $image;
        $imgName->move($directory, $image);

        $dish = new Dish();
        $dish->dish_name = $request->dish_name;
        $dish->dish_detail = $request->dish_detail;
        $dish->dish_image = $imgUrl;
        $dish->dish_status = $request->dish_status;
        $dish->dish_price = $request->dish_price;
        $dish->restaurant_id = Auth::user()->user_id;
        $dish->save();

        return back()->with('sms', 'Data Saved');
    }

    public function manage_dish()
    {
        $dishes = DB::table('dishes')->where('restaurant_id', Auth::user()->user_id)->get();
        return view('restaurant.menu.manageDish', ['dishes' => $dishes]);
    }

    public function dish_delete($dish_id)
    {
        $dish = Dish::find($dish_id);
        $dish->delete();
        return back();
    }

    public function dish_edit($dish_id)
    {
        $dish = Dish::find($dish_id);
        return view('restaurant.menu.edit', compact('dish'));
    }

    public function dish_update(Request $request, $dish_id)
    {
        $dish = Dish::find($dish_id);

        if ($request->dish_image != '') {
            $path = 'adminDashboardSourceFiles\dish_img';

            if ($dish->dish_image != " "  && $dish->dish_image != null) {
                $dish_image_old = $dish->dish_image;
                unlink($dish_image_old);
            }

            $dish_image = $request->dish_image;
            $filename = $dish_image->getClientOriginalName();
            $dish_image->move($path, $filename);
            $dish_image = $path . $dish_image;
            $dish->update(['dish_image' => $filename]);
        }

        $dish->dish_name =  $request->get('dish_name');
        $dish->dish_detail =  $request->get('dish_detail');
        $dish->dish_status =  $request->get('dish_status');
        $dish->dish_price =  $request->get('dish_price');
        $dish->save();
        return back()->with('sms', 'Updated Data');
    }

    public function show_dishes($user_id)
    {
        $dishes = Dish::where('restaurant_id', $user_id)->get();
        return view('dish_menu', compact('dishes'));
    }

    public function show_dish_detail($dish_id)
    {
        $dish = Dish::find($dish_id);
        return view('detail', ['Dish' => $dish]);
    }

    public function search(Request $request)
    {
        return $request->input();
    }

    public function addcart(Request $request, $dish_id)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->user_id;
            $dish_id = $dish_id;
            $quantity = $request->quantity;

            $cart = new cart;
            $cart->user_id = $user_id;
            $cart->dish_id = $dish_id;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $user_id)
    {

        $count = cart::where('user_id', $user_id)->count();
        $data = cart::where('user_id', $user_id)->join('dishes', 'carts.dish_id', '=', 'dishes.dish_id')->get();
        return view('customer.showCart', compact('count', 'data'));
    }

    public function dish_cart_delete($cart_id)
    {
        $data = cart::where('cart_id', $cart_id);
        $data->delete();
        return back();
    }
}

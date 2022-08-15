<?php

namespace App\Http\Controllers;

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
        return view('restaurant.menu.dish_edit', compact('dish'));
    }


    public function dish_update(Request $request, Dish $dish)
    {
        $dish->dish_name = $request->dish_name;
        $dish->dish_detail = $dish->dish_detail;
        $dish->dish_status = $dish->dish_status;
        $dish->dish_price = $dish->dish_price;
        $dish->dish_image = $dish->dish_image;

        $dish->save();
        return back()->with('sms', 'Updated Data');
    }
}

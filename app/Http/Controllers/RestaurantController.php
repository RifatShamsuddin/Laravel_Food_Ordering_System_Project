<?php

namespace App\Http\Controllers;

use App\Models\User;



class RestaurantController extends Controller
{
    function showRestaurants()
    {
        $restaurants = User::inRandomOrder()->where('user_type', 1)->get();
        return view('customer.showRestaurants', compact('restaurants'));
    }
}

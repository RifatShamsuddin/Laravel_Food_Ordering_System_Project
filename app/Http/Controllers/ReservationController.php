<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservations()
    {
        $reservations = DB::table('reservations')->where('restaurant_id', Auth::user()->user_id)->get();
        return view('restaurant.reservations.manageReservations', ['reservations' => $reservations]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function showReservations()
    {
        $reservations = DB::table('reservations')->where('restaurant_id', Auth::user()->user_id)->get();
        return view('restaurant.reservations.manageReservations', ['reservations' => $reservations]);
    }

    public function showReservationForm($data)
    {
        $restaurant_id = $data;
        return view('customer.showReservationForm', compact('restaurant_id'));
    }
    public function saveReservation(Request $request)
    {
        $data = new Reservation();
        $data->reservation_name = $request->reservation_name;
        $data->reservation_details = $request->reservation_details;
        $data->reservation_date = $request->reservation_date;
        $data->customer_id = Auth::user()->user_id;
        $data->restaurant_id = $request->restaurant_id_;
        $reservation_status = 0;
        $data->reservation_status = $reservation_status;
        $data->save();
        return view('welcome');
    }
    public function approveReservation($reservation_id)
    {
        Reservation::where('reservation_id', $reservation_id)->update(array('reservation_status' => 1));
        return back();
    }

    public function customerReservation()
    {
        $reservation = DB::table('reservations')->where('customer_id', Auth::user()->user_id)->get();
        $restaurant_id = $reservation[0]->restaurant_id;
        $restaurant = User::where('user_id', $restaurant_id)->pluck('name')->first();
        return view('customer.customerReservation', ['reservations' => $reservation, 'restaurant_name' => $restaurant]);
    }
}

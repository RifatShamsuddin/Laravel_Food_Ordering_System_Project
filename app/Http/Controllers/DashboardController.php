<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 0) {
            return view('admin.dashboard');
        }
        if (Auth::user()->user_type == 1) {
            return view('restaurant.dashboard');
        }
        if (Auth::user()->user_type == 2) {
            return view('customer.dashboard');
        }
    }
    public function home()
    {
        return view('welcome');
    }
}

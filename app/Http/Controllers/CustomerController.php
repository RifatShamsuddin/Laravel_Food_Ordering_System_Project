<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function cartDish()
    {
        $user_id = Auth::user()->user_id;
    }
}

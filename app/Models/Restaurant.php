<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Restaurant extends User
{
    use Notifiable;
    protected $guard = 'restaurant';
}

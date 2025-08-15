<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    function create() {
        return view('auth.signup');
    }
}

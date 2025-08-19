<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        //$cars = Car::get();
        //$cars = Car::where('published_at', '!=', null)->get();
        //$cars = Car::where('published_at', '!=', null)->orderBy('published_at')->get();

        //dump($cars);

        $car = Car::find(1);
        dd($car->features);
        

        return view('home.index');
    }
}

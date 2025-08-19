<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        //$cars = Car::get();
        //$cars = Car::where('published_at', '!=', null)->get();
        //$cars = Car::where('published_at', '!=', null)->orderBy('published_at')->get();

        //dump($cars);

        $car = Car::where('id', 2)->get();
        //echo($car->carType);

        //$carType = CarType::find(2);
        //$cars = Car::whereBelongsTo($carType)->get();
        //dd($cars);
        $images = CarImage::whereBelongsTo($car)->get();
        dd($car->images);

        return view('home.index');
    }
}

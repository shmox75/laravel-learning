<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        //$cars = Car::get();
        //$cars = Car::where('published_at', '!=', null)->get();
        //$cars = Car::where('published_at', '!=', null)->orderBy('published_at')->get();

        //dump($cars);

        //$car = Car::where('id', '=', 2)->first();
        //dd($car);

        //$carType = CarType::find(2);
        //$cars = Car::whereBelongsTo($carType)->get();
        //dd($cars);
        //$images = CarImage::whereBelongsTo($car)->get();
        //dd($car->images()->get());
        //$image = $car->images()->first();
        //dd($image->car);

        //$car = Car::find(1);
        //dd($car->favoredUsers);
        //$user = User::find(1);
        //$user->favoriteCars()->attach([1, 2]);
        //$user->favoriteCars()->detach([1]);
        //$user->favoriteCars()->sync([2]);
        //dd($user->favoriteCars);
        //$makers = Maker::factory()->count(10)->create();
        //dd($makers);
        /*User::factory()
            ->count(10)
            ->sequence(fn (Sequence $sequence) => ['name' => 'Name ' . $sequence->index])
            ->create([
            
        ]);*/

        /*User::factory()
            ->count(5)
            ->sequence([
                'email_verified_at' => null
            ])
            ->create();*/

        /*Maker::factory()
            ->count(5)
            ->hasModels(5)
            ->create();*/

        User::factory()
        ->has(Car::factory()->count(5), 'favoriteCars')
        ->create();



        return view('home.index');
    }
}

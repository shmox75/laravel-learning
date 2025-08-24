<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Database\Factories\StateFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CarType::factory()->count(10)->sequence(
            ['name' => 'Sedan'],
            ['name' => 'Hatchback'],
            ['name' => 'SUV'],
            ['name' => 'Pickup truck'],
            ['name' => 'Minivan'],
            ['name' => 'Coupe'],
            ['name' => 'Convertible'],
            ['name' => 'Van'],
            ['name' => 'Wagon'],
            ['name' => 'Other'],
        )
        ->create();

        FuelType::factory()->count(7)->sequence(
            ['name' => 'Gasoline'],
            ['name' => 'Diesel'],
            ['name' => 'Electric'],
            ['name' => 'Hybrid'],
            ['name' => 'Plug-in Hybrid'],
            ['name' => 'Hydrogen'],
            ['name' => 'Other']
        )
        ->create();

        $states = [
            "California" => ["Los Angeles", "San Francisco", "San Diego", "Sacramento"],
            "Texas" => ["Houston", "Dallas", "Austin", "San Antonio"],
            "Florida" => ["Miami", "Orlando", "Tampa", "Jacksonville"],
            "New York" => ["New York City", "Buffalo", "Rochester", "Albany"],
            "Illinois" => ["Chicago", "Springfield", "Naperville", "Peoria"],
            "Ohio" => ["Columbus", "Cleveland", "Cincinnati", "Toledo"],
            "Pennsylvania" => ["Philadelphia", "Pittsburgh", "Allentown", "Harrisburg"],
            "Georgia" => ["Atlanta", "Savannah", "Augusta", "Macon"],
            "Michigan" => ["Detroit", "Grand Rapids", "Ann Arbor", "Lansing"],
            "Arizona" => ["Phoenix", "Tucson", "Mesa", "Scottsdale"]
        ];

        foreach($states as $state => $cities) {
            State::factory()
            ->state(['name' => $state])
            ->has(
                City::factory()
                ->count(count($cities))
                ->sequence(...array_map(fn($city) => ['name' => $city], $cities))                
            )
            ->create();
        }

        $carMakers = [
            "Toyota" => ["Corolla", "Camry", "RAV4", "Hilux"],
            "Honda" => ["Civic", "Accord", "CR-V", "Jazz"],
            "Ford" => ["Fiesta", "Focus", "Mustang", "Explorer"],
            "Chevrolet" => ["Spark", "Malibu", "Camaro", "Tahoe"],
            "BMW" => ["3 Series", "5 Series", "X3", "X5"],
            "Mercedes-Benz" => ["C-Class", "E-Class", "GLC", "S-Class"],
            "Audi" => ["A3", "A4", "Q5", "Q7"],
            "Volkswagen" => ["Golf", "Passat", "Tiguan", "Jetta"],
            "Nissan" => ["Altima", "Sentra", "Qashqai", "X-Trail"],
            "Hyundai" => ["Elantra", "Sonata", "Tucson", "Santa Fe"]
        ];

        foreach($carMakers as $maker => $models) {
            Maker::factory()
             ->state(['name' => $maker])
             ->has(
                Model::factory()
                ->count(count($models))
                ->sequence(...array_map(fn($model) => ['name' => $model], $models))
             )
             ->create();
        }

        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                ->count(5)
                ->has(
                    CarImage::factory()
                    ->count(3)
                    ->sequence(fn($sequence) => ['position' => $sequence->index + 1]),
                    'images'
                )
                ->has(
                    CarFeatures::factory(),
                    'features'
                )
            )
            ->create();
    }
}

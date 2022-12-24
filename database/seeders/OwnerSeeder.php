<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Manufacturer;
use App\Models\Car;
use App\Models\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Owner::factory()
        ->times(3)
        ->create();

        foreach(Car::all() as $car)
        {
            $owners = Owner::inRandomOrder()->take(rand(1,3))->pluck('id');
            $car->owners()->attach($owners);
        }

    }
}

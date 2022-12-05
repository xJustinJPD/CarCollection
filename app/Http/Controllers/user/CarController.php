<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // authenticates that this car is owned by the user using the software

        

        $cars = Car::where('user_id',Auth::id())->latest('updated_at')->paginate(5);
        $cars->each(function($car){

        });

        $user = Auth::user();

        $user->authorizeRoles('user');

        $cars = Car::paginate(5);

        $cars = Car::with('manufacturer')->get();

        // returns the index.blade.php view with the cars variables included in the transaction

        return view ('user.cars.index')->with('cars', $cars);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // verifies the car is of the user and then returns the show.blde.php view bringing the car object clicked on by the user
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $user = Auth::user();
        $user->authorizeRoles('user');


        return view ('user.cars.show')->with('car', $car);
    }
}





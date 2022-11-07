<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $cars = Car::where('user_id',Auth::id())->latest('updated_at')->paginate(5);
        $cars->each(function($car){

        });

        return view ('cars.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|max:120',
            'model' => 'required|max:120',
            'colour' => 'required|max:120',
            'desc' => 'required|max:500'
        ]);

        $car = new Car([
            'user_id' => Auth::id(),
            'make' => $request->make,
            'model'=> $request->model,
            'colour'=> $request->colour,
            'desc'=> $request->desc
        ]);

        $car->save();

        return to_route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view ('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view ('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'make' => 'required|max:120',
            'model' => 'required|max:120',
            'colour' => 'required|max:120',
            'desc' => 'required|max:500'
        ]);

        $car->update([
            'make'=> $request -> make,
            'model' => $request -> model,
            'colour' => $request -> colour,
            'desc' => $request -> desc
         ]);

         return to_route('cars.show', $car)->with('success', 'Car updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $car->delete();

        return to_route('cars.index');
    }
}

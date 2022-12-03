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

        // authenticates that this car is owned by the user using the software

        $cars = Car::where('user_id',Auth::id())->latest('updated_at')->paginate(5);
        $cars->each(function($car){

        });

        // returns the index.blade.php view with the cars variables included in the transaction

        return view ('cars.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // returns the create.blade.php view

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

        // validates each field used by the car object, defining parameters for validation is on the right side

        $request->validate([
            'make' => 'required|max:120',
            'model' => 'required|max:120',
            'colour' => 'required|max:120',
            'desc' => 'required|max:500',
            'car_image' => 'file|image'
        ]);

        // stores the car image file inside the $car_image variable

        $car_image = $request->file('car_image');
        $extension = $car_image->getClientOriginalExtension();

        // creates a filename for the image that is unique based on the make input field and the date of creation
        $filename = date('Y-m-d-His') . '_' . $request->input('make') . '.' . $extension;

        // stores the car image inside the public/images folder to be accessed later
        $path = $car_image->storeAs('public/images', $filename);



        // creates the car variable as a version of the car object and sets the parameters for this object

        $car = new Car([
            'user_id' => Auth::id(),
            'make' => $request->make,
            'model'=> $request->model,
            'colour'=> $request->colour,
            'car_image' => $filename,
            'desc'=> $request->desc
        ]);

        // saves the car
        $car->save();

        

        // returns the index.blade.php view
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
        // verifies the car is of the user and then returns the show.blde.php view bringing the car object clicked on by the user
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
        // same thing as show but this time the edit.blade.php view
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
        // verification of user and car
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // validating each field
        $request->validate([
            'make' => 'required|max:120',
            'model' => 'required|max:120',
            'colour' => 'required|max:120',
            'desc' => 'required|max:500'
        ]);

        // defining that inputting each of these values will update its specified value in the database/object
        $car->update([
            'make'=> $request -> make,
            'model' => $request -> model,
            'colour' => $request -> colour,
            'desc' => $request -> desc
        ]);

        //  giving us the show.blade.php view along with a success tag saying that the update was completed
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

        // validation of user and car
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // deleting the car object specified
        $car->delete();

        // returning the index view with a successful delete messge
        return to_route('cars.index')->with('success', 'Car deleted successfully.');
    }
}

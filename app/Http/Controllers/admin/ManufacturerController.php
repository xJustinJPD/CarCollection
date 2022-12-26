<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $user->authorizeRoles('admin');

        $manufacturers = Manufacturer::all();

        $manufacturers = Manufacturer::paginate(2);

        return view ('admin.manufacturers.index')->with('manufacturers', $manufacturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                // returns the create.blade.php view
                $user = Auth::user();
                $user->authorizeRoles('admin');
        
                $manufacturers = Manufacturer::all();
        
                return view ('admin.manufacturers.create')->with('manufacturers',$manufacturers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // validates each field used by the manufacturer object, defining parameters for validation is on the right side

                $request->validate([
                    'name' => 'required|max:120',
                    'address' => 'required|max:400',

                ]);

                // creates the manufacturer variable as a version of the manufacturer object and sets the parameters for this object
        
                $manufacturer = new Manufacturer([
                    'name' => $request->name,
                    'address'=> $request->address,

                ]);
        
                // saves the manufacturer
                $manufacturer->save();
        
                $user = Auth::user();
                $user->authorizeRoles('admin');
        
                
        
                // returns the index.blade.php view
                return to_route('admin.manufacturers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        $user = Auth::user();

        $user->authorizeRoles('admin');

        if(!Auth::id()) {
            return abort(403);
        }

        return view ('admin.manufacturers.show')->with('manufacturer',$manufacturer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view ('admin.manufacturers.edit')->with('manufacturer', $manufacturer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacturer $manufacturer)
    {  

                // validating each field
                $request->validate([
                    'name' => 'required|max:120',
                    'address' => 'required|max:400',
                ]);
        
                // defining that inputting each of these values will update its specified value in the database/object
                $manufacturer->update([
                    'name'=> $request -> name,
                    'address' => $request -> address,
                
                ]);
        
                $user = Auth::user();
                $user->authorizeRoles('admin');
        
                //  giving us the show.blade.php view along with a success tag saying that the update was completed
                return to_route('admin.manufacturers.show', $manufacturer)->with('success', 'Manufacturer updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {

                // deleting the manufacturer object specified
                $manufacturer->delete();
        
                $user = Auth::user();
                $user->authorizeRoles('admin');
        
                // returning the index view with a successful delete messge
                return to_route('admin.manufacturers.index')->with('success', 'Manufacturer deleted successfully.');
    }
}

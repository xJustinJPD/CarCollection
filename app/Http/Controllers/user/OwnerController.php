<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $user->authorizeRoles('user');

        $owners = Owner::all();

        $owners = Owner::paginate(2);

        return view ('user.owners.index')->with('owners', $owners);
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
                        $user->authorizeRoles('user');
                
                        $owners = Owner::all();
                
                        return view ('user.owners.create')->with('owners',$owners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                        // validates each field used by the owner object, defining parameters for validation is on the right side

                        $request->validate([
                            'name' => 'required|max:120',
                            'address' => 'required|max:400',
        
                        ]);
        
                        // creates the owner variable as a version of the owner object and sets the parameters for this object
                
                        $owner = new Owner([
                            'name' => $request->name,
                            'address'=> $request->address,
        
                        ]);
                
                        // saves the owner
                        $owner->save();
                
                        $user = Auth::user();
                        $user->authorizeRoles('user');
                
                        
                
                        // returns the index.blade.php view
                        return to_route('user.owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        $user = Auth::user();

        $user->authorizeRoles('user');

        if(!Auth::id()) {
            return abort(403);
        }

        return view ('user.owners.show')->with('owner',$owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        $user = Auth::user();
        $user->authorizeRoles('user');

        return view ('user.owners.edit')->with('owner', $owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
                        // validating each field
                        $request->validate([
                            'name' => 'required|max:120',
                            'address' => 'required|max:400',
                        ]);
                
                        // defining that inputting each of these values will update its specified value in the database/object
                        $owner->update([
                            'name'=> $request -> name,
                            'address' => $request -> address,
                        
                        ]);
                
                        $user = Auth::user();
                        $user->authorizeRoles('user');
                
                        //  giving us the show.blade.php view along with a success tag saying that the update was completed
                        return to_route('user.owners.show', $owner)->with('success', 'Owner updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
                        // deleting the owner object specified
                        $owner->delete();
        
                        $user = Auth::user();
                        $user->authorizeRoles('user');
                
                        // returning the index view with a successful delete messge
                        return to_route('user.owners.index')->with('success', 'Owner deleted successfully.');
    }
}

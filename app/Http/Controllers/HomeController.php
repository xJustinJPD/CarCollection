<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manufacturer;
use App\Http\Controllers\admin\ManufacturerController;

class HomeController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {

        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.cars.index';
        }
        else if ($user->hasRole('user')){
            $home = 'user.cars.index';
        }
        return redirect()->route($home);
    }

    public function manufacturerIndex (Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.manufacturers.index';
        }
        else if ($user->hasRole('user')){
            $home = 'user.manufacturers.index';
        }
        return redirect()->route($home);
    }
}

?>
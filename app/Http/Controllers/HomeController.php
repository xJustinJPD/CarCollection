<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{   
    
    // Create controller instance

    public function __construct()
    {
        $this->middleware('auth');
    }


    // Show app dashboard

    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.books.index';
        }
        else if ($user->hasRole('user')){
            $home = 'user.books.index';
        }
        return redirect()->route($home);

    }


    
}

?>
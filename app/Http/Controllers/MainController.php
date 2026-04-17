<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        $image = null;

        if (Auth::check()) {
            $user = Auth::user();
            $image = $user->image;
        }

        return view('home', [
            'image' => $image,
        ]);
    }
}

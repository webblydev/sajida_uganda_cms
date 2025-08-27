<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        dd('Home');
        return view('home');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');

        return view('clear-cache');
    }


}

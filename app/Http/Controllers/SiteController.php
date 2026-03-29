<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $home = Home::first();

         return view('index', ['services' => $services, 'home' => $home]);
    }
}

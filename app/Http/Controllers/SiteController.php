<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $services = Service::whereNull('parent_id')->get();
        $home = Home::first();

         return view('site.index', ['services' => $services, 'home' => $home]);
    }
}

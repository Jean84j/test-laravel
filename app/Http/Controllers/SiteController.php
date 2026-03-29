<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $services = Service::all();

         return view('index', ['services' => $services]);
    }
}

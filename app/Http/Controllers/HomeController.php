<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Shows the main dashboard of the Mini CMS.
     * This is the actual home page of the project ("/").
     */
    public function index()
    {
        return view('welcome'); // Make sure the view exists: resources/views/welcome.blade.php
    }
}

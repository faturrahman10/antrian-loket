<?php

namespace App\Http\Controllers;
use App\Models\Loket;

use Illuminate\Http\Request;

class LoketController extends Controller
{
    public function index() {
        $lokets = Loket::all();
        
        return view('loket.dashboard', compact('lokets'));
    }
}

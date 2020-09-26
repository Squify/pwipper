<?php

namespace App\Http\Controllers;

use App\Pweep;
use Illuminate\Http\Request;

class PweepController extends Controller
{

    //Display all the pweeps
    public function index()
    {
        $pweeps = Pweep::all();
        return view('home')->with('pweeps', $pweeps);
    }
}

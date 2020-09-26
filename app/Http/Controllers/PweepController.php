<?php

namespace App\Http\Controllers;

use App\Pweep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PweepController extends Controller
{

    //Display all the pweeps
    public function index()
    {
        $pweeps = Pweep::orderBy('created_at', 'desc')->get();
        return view('home')->with('pweeps', $pweeps);
    }

    //Delete pweep
    public function remove($id)
    {
        $pweep = Pweep::findOrFail($id);
        $pweep->delete($id);
        return back();
    }
}

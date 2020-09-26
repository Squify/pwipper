<?php


namespace App\Http\Controllers;


use App\Pweep;

class PweepController
{

    /**
     * View of home with all posts
     * @return \Illuminate\Contracts\View\Factory\Illuminate\View\View
     */
    public function index()
    {
        $pweeps = Pweep::orderBy('created_at', 'DESC')->get();
        return view('homepage')->with('pweeps', $pweeps);
    }
}

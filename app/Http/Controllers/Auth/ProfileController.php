<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('auth/profile')->with('user', $user);
    }
}

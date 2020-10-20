<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Mail\CreationMail;
use App\Notification;
use App\Pweep;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id', 'asc')
            ->get()
            ->all();
        return view('administration/user-list')->with([
            'users' => $users,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     */
    public function create(Request $data)
    {
        $isAdmin = false;
        if ($data['isAdmin'] == "admin") {
            $isAdmin = true;
        }
        $user = User::create([
            'name' => $data['name'],
            'pseudo' => $data['pseudo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => $isAdmin,
        ]);

        Mail::to($data['email'])->send(new CreationMail($user));
        return $this->users();
    }

    public function pweeps()
    {
        $pweeps = Pweep::orderBy('id', 'asc')
            ->get()
            ->all();
        return view('administration/pweep-list')->with([
            'pweeps' => $pweeps,
        ]);
    }

    public function notifications()
    {
        $notifications = Notification::orderBy('id', 'asc')
            ->get()
            ->all();
        return view('administration/notification-list')->with([
            'notifications' => $notifications,
        ]);
    }
}

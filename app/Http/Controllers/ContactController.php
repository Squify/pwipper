<?php

namespace App\Http\Controllers;

use App\Pweep;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
        public function index()
        {
            return view('components/contact');
        }

        public function email(Request $request)
        {
            Mail::to('contact@pwipper.com')->send(new ContactMail($request->all()));
            return view('emails/confirm');
        }
}

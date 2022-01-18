<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "nullable",
            "phone" => "nullable",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required"
        ]);

        Mail::to(setting("site.email"))->send(new ContactMail(
            $request->only(["name" , "phone" , "email" , "subject" , "message"])
        ));

        return back()->with("success_message", __("Your email was sent successfully"));
    }
}

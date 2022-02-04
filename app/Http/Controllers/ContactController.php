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

        $to = setting("site.contact_email") ?? setting("site.main_email");

        Mail::to($to)->send(new ContactMail(
            $request->only(["name", "phone", "email", "subject", "message"])
        ));

        return back()->with("success_message", __("Your email was sent successfully"));
    }
}

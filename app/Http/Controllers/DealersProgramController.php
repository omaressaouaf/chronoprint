<?php

namespace App\Http\Controllers;

use App\Mail\DealersProgramMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DealersProgramController extends Controller
{
    public function index()
    {
        return view("dealers-program");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "company" => "nullable",
            "phone" => "nullable",
            "message" => "required"
        ]);

        $to = setting("site.contact_email") ?? setting("site.main_email");

        Mail::to($to)->send(new DealersProgramMail(
            $request->only(["name", "email", "company", "phone", "message"])
        ));

        return back()->with("success_message", __("Your request was sent successfully"));
    }
}

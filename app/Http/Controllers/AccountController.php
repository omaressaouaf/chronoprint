<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function profile()
    {
        return view("account.profile");
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'required',
        ]);

        /** @var \App\Models\User */
        $authUser =  auth()->user();
        $authUser->update(request()->only(['name', 'email', 'phone']));

        return back()->with('success_message', __('Updated successfully'));
    }

    public function password()
    {
        return view('account.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
        ]);

        /** @var \App\Models\User */
        $authUser =  auth()->user();
        $authUser->password = Hash::make($request->new_password);
        $authUser->save();

        return back()->with('success_message', __('Updated successfully'));
    }

    public function addresses()
    {
        /** @var \App\Models\User */
        $authUser =  auth()->user();

        return view("account.addresses", [
            "addresses" => $authUser->addresses()->latest()->get()
        ]);
    }

    public function destroyAddress(Address $address)
    {
        $this->authorize("delete_address", $address);

        $address->delete();

        return back();
    }
}

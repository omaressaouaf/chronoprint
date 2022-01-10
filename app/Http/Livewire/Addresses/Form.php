<?php

namespace App\Http\Livewire\Addresses;

use Livewire\Component;

class Form extends Component
{
    public string $name = "";

    public string $phone = "";

    public string $email = "";

    public string $city = "Casablanca";

    public string $zip = "";

    public string $line = "";

    protected $rules = [
        "name" => "required",
        "phone" => "required",
        "email" => "nullable|email",
        "city" => "required",
        "zip" => "nullable|numeric",
        "line" => "required"
    ];

    public function render()
    {
        return view('livewire.addresses.form');
    }

    /**
     * Adds an address
     *
     * @return void
     */
    public function addAddress(): void
    {
        $this->validate();

        /**
         * @var App\Models\User
         */
        $authUser = auth()->user();
        $address = $authUser->addresses()->create([
            "name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "city" => strtolower($this->city),
            "zip" => $this->zip,
            "line" => $this->line
        ]);

        session()->flash("success_message", __("Address added successfully"));

        $this->emit("addressAdded", $address);
    }
}

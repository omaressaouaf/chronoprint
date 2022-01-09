<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AccountLayout extends Component
{
    public function __construct(public string $title)
    {
    }

    public function render()
    {
        return view('layouts.account');
    }
}

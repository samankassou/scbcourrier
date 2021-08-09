<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Couriers extends Component
{
    public function render()
    {
        return view('livewire.admin.couriers')->extends('layouts.admin', ['title' => "Couriers"]);
    }
}

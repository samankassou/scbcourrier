<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Recipients extends Component
{
    public function render()
    {
        return view('livewire.admin.recipients')
            ->extends('layouts.admin', ['title' => "Recipients"])
            ->section('main');
    }
}

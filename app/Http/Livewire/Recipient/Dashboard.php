<?php

namespace App\Http\Livewire\Recipient;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.recipient.dashboard')
            ->extends('layouts.admin', ['title' => "Dashboard"])
            ->section('main');
    }
}

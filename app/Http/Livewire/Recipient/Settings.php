<?php

namespace App\Http\Livewire\Recipient;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        return view('livewire.recipient.settings')
            ->extends('layouts.admin', ['title' => "Settings"])
            ->section('main');
    }
}

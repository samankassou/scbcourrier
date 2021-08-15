<?php

namespace App\Http\Livewire\Writer;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.writer.dashboard')
            ->extends('layouts.admin', ['title' => "Dashboard"])
            ->section('main');
    }
}

<?php

namespace App\Http\Livewire\Recipient;

use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;


    public function render()
    {
        $couriers = auth()->user()->couriers()->paginate(10);
        return view('livewire.recipient.couriers', compact('couriers'))
            ->extends('layouts.admin', ['title' => "Couriers"])
            ->section('main');
    }
}

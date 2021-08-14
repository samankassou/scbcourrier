<?php

namespace App\Http\Livewire\Recipient;

use App\Models\Courier;
use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;


    public function render()
    {
        $couriers = auth()->user()->couriers()->latest()->paginate(10);
        $status = ['En cours', 'Traité', 'Rejeté'];
        return view('livewire.recipient.couriers', compact('couriers', 'status'))
            ->extends('layouts.admin', ['title' => "Couriers"])
            ->section('main');
    }

    public function updateCourierStatus($courierId, $value)
    {
        Courier::find($courierId)->update(['status' => $value]);
        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Courier;
use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;

    protected $listeners = [
        'courierAdded' => '$refresh',
        'courierUpdated' => '$refresh',
        'courierDeleted' => '$refresh',
    ];

    public function mount()
    {
        //$this->couriers = Courier::paginate(10);
    }
    public function render()
    {
        $couriers = Courier::latest()->paginate(10);
        $status = ['En cours', 'Traité', 'Rejeté'];
        return view('livewire.admin.couriers', compact('couriers', 'status'))
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

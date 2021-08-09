<?php

namespace App\Http\Livewire\Admin;

use App\Models\Courier;
use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;

    public function mount()
    {
        //$this->couriers = Courier::paginate(10);
    }
    public function render()
    {
        $couriers = Courier::paginate(10);
        return view('livewire.admin.couriers', compact('couriers'))
            ->extends('layouts.admin', ['title' => "Couriers"])
            ->section('main');
    }
}

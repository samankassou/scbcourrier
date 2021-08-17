<?php

namespace App\Http\Livewire\Manager\Couriers;

use App\Models\Courier;
use Livewire\Component;

class Show extends Component
{
    public $courier;

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
    }

    public function render()
    {
        $title = "Courrier '" . $this->courier->code . "' du " . $this->courier->date->format('d/m/Y');
        return view('livewire.manager.couriers.show')
            ->extends('layouts.admin', ['title' => $title])
            ->section('main');
    }
}

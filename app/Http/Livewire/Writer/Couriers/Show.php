<?php

namespace App\Http\Livewire\Writer\Couriers;

use App\Models\Courier;
use Livewire\Component;

class Show extends Component
{
    public $courier;

    protected $listeners = [
        'courierUpdated' => '$refresh',
        'courierDeleted' => 'redirectToList',
    ];

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
    }

    public function render()
    {
        $title = "Courrier '" . $this->courier->code . "' du " . $this->courier->date->format('d/m/Y');
        return view('livewire.writer.couriers.show')
            ->extends('layouts.admin', ['title' => $title])
            ->section('main');
    }

    public function redirectToList()
    {
        $this->redirectRoute('writer.couriers');
    }
}

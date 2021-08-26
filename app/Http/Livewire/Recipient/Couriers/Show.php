<?php

namespace App\Http\Livewire\Recipient\Couriers;

use App\Models\Courier;
use Livewire\Component;

class Show extends Component
{
    public $courier;
    public $recipient;
    public $state;

    protected $listeners = [
        'courierUpdated' => '$refresh',
    ];

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
        $this->recipient = $courier->recipient_id;
        $this->state     = $courier->status;
    }

    public function render()
    {
        $title = "Courrier '" . $this->courier->code . "' du " . $this->courier->date->format('d/m/Y');
        $status = [
            'assigned', 'pending', 'processed',
        ];
        return view('livewire.recipient.couriers.show', compact('status'))
            ->extends('layouts.admin', ['title' => $title])
            ->section('main');
    }

    public function updateStatus()
    {
        $this->courier->update(['status' => $this->state]);
        $this->emit("success", __("Success:"), __("Courier updated!"));
    }
}

<?php

namespace App\Http\Livewire\Manager\Couriers;

use App\Models\User;
use App\Models\Courier;
use Livewire\Component;

class Show extends Component
{
    public $courier;
    public $recipient;

    protected $listeners = [
        'courierUpdated' => '$refresh',
        'courierDeleted' => 'redirectToList',
    ];

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
        $this->recipient = $courier->recipient_id;
    }

    public function render()
    {
        $title = "Courrier '" . $this->courier->code . "' du " . $this->courier->date->format('d/m/Y');
        $recipients = User::activeRecipients()->get();
        return view('livewire.manager.couriers.show', compact('recipients'))
            ->extends('layouts.admin', ['title' => $title])
            ->section('main');
    }

    public function selectRecipient()
    {
        if ($this->recipient) {
            $this->courier->update([
                'recipient_id' => $this->recipient,
                'status' => 'assigned'
            ]);
        } else {
            $this->courier->update([
                'recipient_id' => null,
            ]);
        }
        $this->state = $this->courier->status;
        $this->courier->refresh();
        $this->emit("success", __("Success:"), __("Courier updated!"));
    }

    public function redirectToList()
    {
        $this->redirectRoute('manager.couriers');
    }
}

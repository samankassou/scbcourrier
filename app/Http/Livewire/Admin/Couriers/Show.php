<?php

namespace App\Http\Livewire\Admin\Couriers;

use App\Models\User;
use App\Models\Courier;
use Livewire\Component;

class Show extends Component
{
    public $courier;
    public $recipient;
    public $state;

    protected $listeners = [
        'courierUpdated' => '$refresh',
        'courierDeleted' => 'redirectToList',
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
        $recipients = User::activeRecipients()->get();
        $status = [
            'new', 'assigned', 'pending', 'processed', 'rejected'
        ];
        return view('livewire.admin.couriers.show', compact('recipients', 'status'))
            ->extends('layouts.admin', ['title' => $title])
            ->section('main');
    }

    public function redirectToList()
    {
        $this->redirectRoute('admin.couriers');
    }
}

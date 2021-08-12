<?php

namespace App\Http\Livewire\Admin\Couriers;

use App\Models\Courier;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $date;
    public $code;
    public $sender;
    public $object;
    public $recipient;
    public $comments;
    public $state;

    protected $rules = [
        'date'      => 'required|date',
        'code'      => 'required',
        'sender'    => 'required',
        'object'    => 'required',
        'recipient' => 'nullable|exists:users,id',
    ];

    public function render()
    {
        $recipients = User::activeRecipients()->get();
        $status = [
            'En cours', 'Traité', 'Rejeté'
        ];
        return view('livewire.admin.couriers.create', compact('recipients', 'status'));
    }

    public function save()
    {
        $this->validate();

        Courier::create([
            'date'         => $this->date,
            'code'         => $this->code,
            'sender'       => $this->sender,
            'object'       => $this->object,
            'recipient_id' => $this->recipient,
            'comments'     => $this->comments,
            'status'       => $this->state,
        ]);

        $this->emit("courierAdded");
        $this->emit("success", __("Success:"), __("Courier saved!"));
        $this->closeModal();
    }
}

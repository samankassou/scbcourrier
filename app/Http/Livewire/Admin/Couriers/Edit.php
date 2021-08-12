<?php

namespace App\Http\Livewire\Admin\Couriers;

use App\Models\User;
use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $courier;
    public $date;
    public $code;
    public $sender;
    public $object;
    public $recipient;
    public $comments;
    public $state;

    public function mount(Courier $courier)
    {
        $this->courier   = $courier;
        $this->date      = optional($courier->date)->format('Y-m-d');
        $this->code      = $courier->code;
        $this->sender    = $courier->sender;
        $this->object    = $courier->object;
        $this->recipient = $courier->recipient_id;
        $this->comments  = $courier->comments;
        $this->state     = $courier->status;
    }

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
        return view('livewire.admin.couriers.edit', compact('recipients', 'status'));
    }

    public function save()
    {
        $this->validate();
        $this->courier->update([
            'date'         => $this->date,
            'code'         => $this->code,
            'sender'       => $this->sender,
            'object'       => $this->object,
            'comments'     => $this->comments,
            'status'       => $this->state,
        ]);

        if ($this->recipient) {
            $this->courier->update([
                'recipient_id' => $this->recipient
            ]);
        }

        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
        $this->closeModal();
    }
}

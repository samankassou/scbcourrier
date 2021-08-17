<?php

namespace App\Http\Livewire\Manager\Couriers;

use App\Models\User;
use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $courier;
    public $recipient;
    public $comments;

    public function mount(Courier $courier)
    {
        $this->courier   = $courier;
        $this->recipient = $courier->recipient_id;
        $this->comments  = $courier->comments;
    }

    protected $rules = [
        'recipient' => 'nullable|exists:users,id',
    ];

    public function render()
    {
        $recipients = User::activeRecipients()->get();
        $status = [
            'En cours', 'Traité', 'Rejeté'
        ];
        return view('livewire.manager.couriers.edit', compact('recipients', 'status'));
    }

    public function save()
    {
        $this->validate();
        $this->courier->update([
            'comments'     => $this->comments,
        ]);

        $this->recipient = $this->recipient ?? null;

        $this->courier->update([
            'recipient_id' => $this->recipient
        ]);

        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}

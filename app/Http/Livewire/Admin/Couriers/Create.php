<?php

namespace App\Http\Livewire\Admin\Couriers;

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
        'date'   => 'required|date',
        'code'   => 'required',
        'sender' => 'required',
        'object' => 'required',
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
        dd("ok");
    }
}

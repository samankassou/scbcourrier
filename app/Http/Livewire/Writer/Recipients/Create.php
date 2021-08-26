<?php

namespace App\Http\Livewire\Writer\Recipients;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $email;
    public $name;

    protected $rules = [
        'email' => 'required|email|unique:users',
        'name' => 'required',
    ];

    public function render()
    {
        return view('livewire.writer.recipients.create');
    }

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt("scb123"),
        ]);

        $user->assign('recipient');

        $this->emit("recipientAdded");
        $this->emit("success", __("Success:"), __("Recipient saved!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}

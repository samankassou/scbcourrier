<?php

namespace App\Http\Livewire\Admin\Recipients;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $recipient;
    public $email;
    public $name;

    public function mount(User $user)
    {
        $this->recipient = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function rules()
    {
        return
            [
                'email' => 'required|email|unique:users,email,' . $this->recipient->id,
                'name' => 'required'
            ];
    }

    public function render()
    {
        return view('livewire.admin.recipients.edit');
    }

    public function save()
    {
        $this->validate();
        $this->recipient->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        $this->emit("recipientUpdated");
        $this->emit("success", __("Success:"), __("Recipient updated!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}

<?php

namespace App\Http\Livewire\Writer\Recipients;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $recipient;

    public function mount(User $user)
    {
        $this->recipient = $user;
    }

    public function render()
    {
        return view('livewire.writer.recipients.delete');
    }

    public function delete()
    {
        $this->recipient->delete();

        $this->emit("recipientDeleted");
        $this->emit("success", __("Success:"), __("Recipient deleted!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}

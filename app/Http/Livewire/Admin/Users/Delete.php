<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.admin.users.delete');
    }

    public function delete()
    {
        $this->user->delete();

        $this->emit("userDeleted");
        $this->emit("success", __("Success:"), __("User deleted!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}

<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $user;
    public $email;
    public $name;
    public $role;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoles()->toArray()[0];
    }

    protected $rules = [
        'email' => 'required|email|unique:users',
        'name' => 'required',
        'role' => 'required|exists:roles,name',
    ];

    public function render()
    {
        $roles = DB::table('roles')
            ->select('name', 'title')
            ->get()
            ->toArray();

        return view('livewire.admin.users.edit', compact('roles'));
    }

    public function save()
    {
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $role = $this->user->getRoles()->toArray()[0];
        $this->user->retract($role);
        $this->user->assign($this->role);

        $this->emit("userUpdated");
        $this->emit("success", __("Success:"), __("User updated!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}

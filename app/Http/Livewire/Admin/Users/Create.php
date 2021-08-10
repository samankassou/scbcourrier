<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $email;
    public $name;
    public $role;

    public function mount()
    {
        $this->roles = DB::table('roles')
            ->select('name', 'title')
            ->get()
            ->toArray();
    }
    protected $rules = [
        'email' => 'required|email|unique:users',
        'name' => 'required',
    ];

    public function render()
    {
        $roles = DB::table('roles')
            ->select('name', 'title')
            ->get()
            ->toArray();
        return view('livewire.admin.users.create', [
            'roles' => $roles
        ]);
    }

    public function save()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt("scb123"),
        ]);

        $user->assign($this->role);

        $this->emit("userAdded");
        $this->emit("success", __("Success:"), __("User saved!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}

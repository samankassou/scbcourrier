<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    protected $listeners = [
        'userAdded' => '$refresh',
        'userDeleted' => '$refresh'
    ];

    public function render()
    {
        $users = User::with('roles')->paginate(10);
        return view('livewire.admin.users', [
            'users' => $users
        ])
            ->extends('layouts.admin', ['title' => "Users"])
            ->section('main');
    }

    public function toggleUserStatus($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();
        $message = $user->status ? "User account enabled" : "User account disabled";
        $this->emit("success", __("Success:"), __($message));
    }
}

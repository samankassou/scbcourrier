<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.users', [
            'users' => $users
        ])
            ->extends('layouts.admin', ['title' => "Users"])
            ->section('main');
    }
}

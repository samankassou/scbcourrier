<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserSettings extends Component
{
    public $primaryId;
    public $name;
    public $email;
    public $oldPassword;
    public $password;
    public $password_confirmation;

    protected function validationAttributes()
    {

        return [
            'oldPassword' => __('Password'),
            'password' => __('New Password')
        ];
    }

    public function mount()
    {
        $this->primaryId = auth()->user()->id;
        $this->name      = auth()->user()->name;
        $this->email     = auth()->user()->email;
    }

    public function render()
    {
        return view('livewire.user-settings')
            ->extends('layouts.admin', ['title' => "Settings"])
            ->section('main');
    }

    public function saveInfos()
    {
        $this->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->primaryId),
            ],
        ]);

        $user = User::find($this->primaryId);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->emit("success", __("Success:"), __("Informations updated!"));
    }

    public function changePassword()
    {
        $this->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed'
        ]);


        $user = User::find($this->primaryId);
        if (Hash::check($this->oldPassword, $user->password)) {
            $user->update([
                'password' => bcrypt($this->password),
            ]);

            $this->reset(['oldPassword', 'password', 'password_confirmation']);
            $this->emit("success", __("Success:"), __("Password updated!"));
        } else {
            $this->reset(['oldPassword', 'password', 'password_confirmation']);
            throw ValidationException::withMessages([
                'oldPassword' => __('validation.password')
            ]);
        }
    }
}

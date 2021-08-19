<?php

namespace App\Http\Livewire\Admin;

use App\Models\Courier;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data['totalCouriers'] = Courier::count();
        $data['totalProcessedCouriers'] = Courier::processed()->count();
        $data['totalPendingCouriers'] = Courier::pending()->count();
        $data['totalRejectedCouriers'] = Courier::rejected()->count();
        return view('livewire.admin.dashboard', $data)
            ->extends('layouts.admin', ['title' => "Dashboard"])
            ->section('main');
    }
}

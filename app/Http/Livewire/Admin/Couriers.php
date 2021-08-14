<?php

namespace App\Http\Livewire\Admin;

use App\Models\Courier;
use Livewire\Component;
use Livewire\WithPagination;

class Couriers extends Component
{
    use WithPagination;

    public $search;

    protected $listeners = [
        'courierAdded' => '$refresh',
        'courierUpdated' => '$refresh',
        'courierDeleted' => '$refresh',
    ];

    public function mount()
    {
        //$this->couriers = Courier::paginate(10);
    }
    public function render()
    {
        $couriers = $this->getCouriers();
        $status = ['En cours', 'Traité', 'Rejeté'];
        return view('livewire.admin.couriers', compact('couriers', 'status'))
            ->extends('layouts.admin', ['title' => "Couriers"])
            ->section('main');
    }

    public function getCouriers()
    {
        $query = Courier::query();
        $search = '%' . $this->search . '%';
        $query->where('code', 'LIKE', $search);
        $query->orWhere('sender', 'LIKE', $search);
        $query->orWhere('object', 'LIKE', $search);
        $query->orWhere('status', 'LIKE', $search);
        $query->orWhere('comments', 'LIKE', $search);
        $query->orWhereDay('date', $this->search);
        $query->orWhereMonth('date', $this->search);
        $query->orWhereYear('date', $this->search);
        $query->orWhereDate('date', $this->search);
        $query->orWhereHas('recipient', function ($query) use ($search) {
            $query->where('name', 'LIKE', $search);
            $query->orWhere('email', 'LIKE', $search);
        });
        return $query->latest()->paginate(10);
    }

    public function updateCourierStatus($courierId, $value)
    {
        Courier::find($courierId)->update(['status' => $value]);
        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
    }
}

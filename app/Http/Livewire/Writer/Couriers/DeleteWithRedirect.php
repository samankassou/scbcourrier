<?php

namespace App\Http\Livewire\Writer\Couriers;

use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class DeleteWithRedirect extends ModalComponent
{
    public $courier;

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
    }

    public function render()
    {
        return view('livewire.writer.couriers.delete-with-redirect');
    }

    public function delete()
    {
        $this->courier->delete();
        session()->flash('alert', __("Success:"));
        session()->flash('message', __("Courier deleted!"));
        $this->redirectRoute('writer.couriers');
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}

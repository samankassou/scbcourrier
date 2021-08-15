<?php

namespace App\Http\Livewire\Writer\Couriers;

use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $courier;

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
    }

    public function render()
    {
        return view('livewire.writer.couriers.delete');
    }

    public function delete()
    {
        $this->courier->delete();

        $this->emit("courierDeleted");
        $this->emit("success", __("Success:"), __("Courier deleted!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}

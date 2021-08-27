<?php

namespace App\Http\Livewire\Recipient\Couriers;

use App\Models\Courier;
use LivewireUI\Modal\ModalComponent;

class Reject extends ModalComponent
{
    public $courier;
    public $note;

    protected $listeners = [
        'courierUpdated' => '$refresh',
    ];

    protected $rules = ['note' => 'required'];
    protected $validationAttributes = ['note' => 'Motif'];

    public function mount(Courier $courier)
    {
        $this->courier = $courier;
    }

    public function render()
    {
        return view('livewire.recipient.couriers.reject');
    }

    public function reject()
    {
        $this->validate();
        $this->courier->update(['status' => 'rejected']);
        $this->courier->notes()->create([
            'text' => $this->note
        ]);

        $this->emit("courierUpdated");
        $this->emit("success", __("Success:"), __("Courier updated!"));
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}

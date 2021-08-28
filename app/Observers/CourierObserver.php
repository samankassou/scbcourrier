<?php

namespace App\Observers;

use App\Models\Courier;

class CourierObserver
{
    /**
     * Handle the Courier "creating" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function creating(Courier $courier)
    {
        $courier->created_by = auth()->user()->id;
    }

    /**
     * Handle the Courier "created" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function created(Courier $courier)
    {
        //$courier->created_by = auth()->user()->id;
    }

    /**
     * Handle the Courier "updating" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function updating(Courier $courier)
    {
        $courier->updated_by = auth()->user()->id;
    }

    /**
     * Handle the Courier "updated" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function updated(Courier $courier)
    {
        //$courier->updated_by = auth()->user()->id;
    }

    /**
     * Handle the Courier "deleting" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function deleting(Courier $courier)
    {
        $courier->deleted_by = auth()->user()->id;
        $courier->save();
        $courier->notes()->delete();
    }

    /**
     * Handle the Courier "deleted" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function deleted(Courier $courier)
    {
        //$courier->deleted_by = auth()->user()->id;
    }

    /**
     * Handle the Courier "restored" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function restored(Courier $courier)
    {
        $courier->restored_by = auth()->user()->id;
        $courier->restored_at = now();
        $courier->save();
    }

    /**
     * Handle the Courier "force deleted" event.
     *
     * @param  \App\Models\Courier  $courier
     * @return void
     */
    public function forceDeleted(Courier $courier)
    {
        //
    }
}

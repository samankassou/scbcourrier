<?php

declare(strict_types=1);

namespace App\Charts\Admin\Couriers;

use App\Models\Courier;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class Daily extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $totalProcessedCouriers = Courier::processed()->count();
        $totalPendingCouriers = Courier::pending()->count();
        $totalRejectedCouriers = Courier::rejected()->count();
        return Chartisan::build()
            ->labels(['Traités', 'En cours', 'Rejetés'])
            ->dataset('Courriers', [$totalProcessedCouriers, $totalPendingCouriers, $totalRejectedCouriers]);
    }
}

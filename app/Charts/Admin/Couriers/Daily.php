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
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directive. If null, the chart
     * name will be used
     */
    public ?string $routeName = 'admin.couriers.daily';

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $totalNewCouriers = Courier::new()->count();
        $totalAssignedCouriers = Courier::assigned()->count();
        $totalPendingCouriers = Courier::pending()->count();
        $totalProcessedCouriers = Courier::processed()->count();
        $totalRejectedCouriers = Courier::rejected()->count();
        return Chartisan::build()
            ->labels([
                'Nouveaux',
                'Attribués',
                'En cours',
                'Traités',
                'Rejetés'
            ])
            ->dataset('Courriers', [
                $totalNewCouriers,
                $totalAssignedCouriers,
                $totalPendingCouriers,
                $totalProcessedCouriers,
                $totalRejectedCouriers
            ]);
    }
}

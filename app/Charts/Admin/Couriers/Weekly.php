<?php

declare(strict_types=1);

namespace App\Charts\Admin\Couriers;

use App\Models\Courier;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class Weekly extends BaseChart
{
    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directive. If null, the chart
     * name will be used
     */
    public ?string $routeName = 'admin.couriers.weekly';

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $data = [];
        $lastWeek = today()->subDay(7);
        for ($i = 1; $i <= 7; $i++) {
            $lastWeek = $lastWeek->addDay();
            $data['labels'][] = $lastWeek->translatedFormat('D');

            $data['new_count'][] = Courier::where('status', 'new')
                ->whereDate('date', $lastWeek)->count();

            $data['assigned_count'][] = Courier::where('status', 'assigned')
                ->whereDate('date', $lastWeek)->count();

            $data['pending_count'][] = Courier::where('status', 'pending')
                ->whereDate('date', $lastWeek)->count();

            $data['processed_count'][] = Courier::where('status', 'processed')
                ->whereDate('date', $lastWeek)->count();

            $data['rejected_count'][] = Courier::where('status', 'rejected')
                ->whereDate('date', $lastWeek)->count();
        }
        return Chartisan::build()
            ->labels($data['labels'])
            ->dataset(__('Nouveaux couriers'), $data['new_count'])
            ->dataset(__('Couriers assignés'), $data['assigned_count'])
            ->dataset(__('Couriers en cours'), $data['pending_count'])
            ->dataset(__('Couriers traités'), $data['processed_count'])
            ->dataset(__('Couriers rejetés'), $data['rejected_count']);
    }
}

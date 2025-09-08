<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Driver;

class DriverDashboardController extends Controller
{
    
        public function showDashboard()
        {
            $driver = Auth::guard('driver')->user();
            $reviews = \App\Models\Review::where('driver_id', $driver->id)->with('customer')->get();
            $serviceRequestIds = \App\Models\Review::where('driver_id', $driver->id)->pluck('service_request_id');
            $payments = \App\Models\Payment::whereIn('service_request_id', $serviceRequestIds)->get()->keyBy('service_request_id');

            $pendingRequestsCount = \App\Models\DriverAssignment::where('driver_id', $driver->id)
                ->where('assignment_status', 'pending')
                ->count();

            return view('driver.dashboard', [
                'driver' => $driver,
                'reviews' => $reviews,
                'payments' => $payments,
                'pendingRequestsCount' => $pendingRequestsCount,
            ]);
        }
    public function assignments()
    {
        $driver = Auth::guard('driver')->user();
        $assignments = \App\Models\DriverAssignment::where('driver_id', $driver->id)
            ->where('assignment_status', 'pending')
            ->with('serviceRequest')
            ->get();

        return view('driver.assignments', compact('assignments'));
    }
}

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
    /**
     * Show the driver dashboard.
     */
    // public function index()
    // {
    //     // Use the 'driver' guard to retrieve the authenticated driver user
    //     $driver = Auth::guard('driver')->user();

    //     return view('driver.dashboard', [
    //         'driver' => $driver,
    //     ]);
    // }
        public function showDashboard()
        {
            $driver = \Illuminate\Support\Facades\Auth::guard('driver')->user();
            $reviews = \App\Models\Review::where('driver_id', $driver->id)->with('customer')->get();
            $serviceRequestIds = \App\Models\Review::where('driver_id', $driver->id)->pluck('service_request_id');
            $payments = \App\Models\Payment::whereIn('service_request_id', $serviceRequestIds)->get()->keyBy('service_request_id');

        return view('driver.dashboard', [
            'driver' => $driver,
            'reviews' => $reviews,
            'payments' => $payments,
        ]);
    }
    public function assignments()
    {
        $assignments = \App\Models\DriverAssignment::where('driver_id', auth()->id())
            ->where('assignment_status', 'pending')
            ->with('serviceRequest')
            ->get();

        return view('driver.assignments', compact('assignments'));
    }
}

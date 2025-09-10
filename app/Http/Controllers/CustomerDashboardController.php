<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequest;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function cancelledRequests()
    {
        $cancelledRequests = ServiceRequest::where('customer_id', auth()->id())
            ->where('status', 'cancelled')
            ->get();

        return view('customer.cancelled_requests', compact('cancelledRequests'));
    }
}

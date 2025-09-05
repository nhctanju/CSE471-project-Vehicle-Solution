<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class PaymentController extends Controller
{
    // Download PDF invoice for a payment
    public function downloadInvoice($id)
    {
        $payment = Payment::findOrFail($id);
    $pdf = Pdf::loadView('payments.invoice', compact('payment'));
        return $pdf->download('invoice_'.$payment->id.'.pdf');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'service_request_id' => 'required|integer|exists:service_requests,id',
            'payment_method' => 'required|in:credit_card,debit_card,wallet,cash',
            'amount' => 'required|numeric',
            'status' => 'required|in:pending,completed,failed',
            'invoice_path' => 'nullable|string',
        ]);

        $data['customer_id'] = Auth::id();

        $payment = Payment::create($data);

        return redirect()->route('customer.dashboard')->with('success', 'Payment created successfully.');
    }

    // List payments for logged in customer
    public function index()
    {
        $payments = Payment::where('customer_id', Auth::id())->get();
        return view('payments.create', compact('payments'));
    }

    // Show payment information for a specific customer
    public function info()
    {
        $payments = Payment::where('customer_id', Auth::id())->get();

        return view('payments.info', compact('payments'));
    }
}

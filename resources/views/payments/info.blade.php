<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Payment Information</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Service Request ID</th>
            <th>Payment Method</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Invoice</th>
            <th>Download Invoice</th> <!-- Added a header for the button column -->
        </tr>
        </thead>
        <tbody>
        @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->service_request_id }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->status }}</td>
                <td>
                    @if ($payment->invoice_path)
                        <a href="{{ asset($payment->invoice_path) }}" target="_blank">View Invoice</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <!-- Fixed: Moved the download button inside the foreach loop where $payment is defined -->
                    <a href="{{ route('payments.invoice', ['id' => $payment->id]) }}" class="btn btn-primary">Download Invoice</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

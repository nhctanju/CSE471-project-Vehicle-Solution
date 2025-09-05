<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Invoice</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .heading { font-size: 24px; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        .details th, .details td { padding: 5px 10px; }
        .total { font-size: 18px; font-weight: bold; }
    </style>
</head>
<body>
<div class="invoice-box">
    <div class="heading">Payment Invoice</div>
    <table class="details">
        <tr>
            <th>Payment ID:</th>
            <td>{{ $payment->id }}</td>
        </tr>
        <tr>
            <th>Customer ID:</th>
            <td>{{ $payment->customer_id }}</td>
        </tr>
        <tr>
            <th>Service Request ID:</th>
            <td>{{ $payment->service_request_id }}</td>
        </tr>
        <tr>
            <th>Payment Method:</th>
            <td>{{ $payment->payment_method }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $payment->status }}</td>
        </tr>
        <tr>
            <th>Date:</th>
            <td>{{ $payment->created_at }}</td>
        </tr>
        <tr>
            <th>Invoice Path:</th>
            <td>{{ $payment->invoice_path }}</td>
        </tr>
    </table>
    <div class="total">Amount: {{ $payment->amount }} BDT</div>
</div>
</body>
</html>

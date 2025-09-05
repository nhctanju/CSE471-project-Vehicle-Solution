<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            padding: 40px;
            color: #333;
            text-align: center;
            image-rendering: optimizeQuality;
            background-image: url(https://www.gosite.com/hubfs/2023%20Blogs/10%20Best%20Auto%20Repair%20Websites/best%20websites%20blog%20image%20auto%20repair.jpg);
        }
        .container {
            max-width: 480px;
            margin: auto;
            padding: 40px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
        }
        h1 {
            margin-bottom: 24px;
        }
        a.servicing-request {
            display: inline-block;
            margin-top: 20px;
            font-size: 20px;
            padding: 14px 28px;
            background-color: #1d72b8;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        a.servicing-request:hover {
            background-color: #155d8b;
        }
        a.driver-request {
            display: inline-block;
            margin-top: 20px;
            font-size: 20px;
            padding: 14px 28px;
            background-color: #1d72b8;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        a.driver-request:hover {
            background-color: #155d8b;
        }
        a.payment-request {
            display: inline-block;
            margin-top: 20px;
            font-size: 20px;
            padding: 14px 28px;
            background-color: #1d72b8;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        a.payment-request:hover {
            background-color: #155d8b;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session()->has('status'))
            <div style="color: green; font-weight: bold;">
                {{ session('status') }}
            </div>
            
            <a href="{{ route('reviews.index') }}">Leave a Review</a>
        @endif
        <h1>Welcome, {{ auth()->guard('customer')->user()->name }}!</h1>
        <p>Manage your account and requests below.</p>
        <a href="{{ route('service_requests.create') }}" class="servicing-request">Servicing Request</a>
        <a href="{{ route('driver-assignments.create') }}" class="driver-request">Request a Driver</a>
        <a href ="{{route('payments.info')}}" class="payment-request"><button>Payment Information</button></a>
        <a href ="{{route('payments.index')}}" class="payment-request"><button>Pay dues</button></a>
    </div>
</body>
</html>

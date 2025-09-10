<!DOCTYPE html>
<html>
<head>
    <title>Cancelled Service Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
            color: #222;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fafafa;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 20px;
            text-align: left;
        }
        h2 {
            color: #333;
            font-size: 1.5em;
        }
        a.back-btn {
            display: inline-block;
            margin-top: 16px;
            background: #eee;
            color: #222;
            border-radius: 3px;
            padding: 6px 14px;
            text-decoration: none;
            border: 1px solid #ccc;
        }
        ul {
            padding-left: 18px;
        }
        li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Cancelled Service Requests</h2>
    <p>Total: <strong>{{ $cancelledRequests->count() }}</strong></p>
    @if($cancelledRequests->count())
        <ul>
            @foreach($cancelledRequests as $req)
                <li>
                    <strong>Reason:</strong> {{ $req->cancellation_reason ?? 'No reason provided' }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No cancelled requests found.</p>
    @endif
    <a href="{{ route('customer.dashboard') }}" class="back-btn">Back to Dashboard</a>
</div>
</body>
</html>
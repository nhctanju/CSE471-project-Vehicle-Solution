
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #308be66b;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #721d1dff;
            border-radius: 10px;
            box-shadow: 0 4px 16px #e0e0e0;
            padding: 32px 24px;
        }
        .driver-info {
            background: #add1d1ff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px #e0e0e0;
        }
        .review-card {
            background: #fff;
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 16px;
            box-shadow: 0 1px 4px #f0f0f0;
        }
        .review-header {
            font-weight: bold;
            color: #333;
        }
        .payment-amount {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="driver-info">
            <h2>Driver: {{ $driver->name }}</h2>
            <p>ID: {{ $driver->id }}</p>
        </div>

        @if($reviews->isEmpty())
            <p>No reviews found for this driver.</p>
        @else
            @foreach($reviews as $review)
                <div class="review-card">
                    <div class="review-header">
                        Review by: {{ $review->customer->name ?? 'Unknown Customer' }}
                    </div>
                    <div>
                        Rating: {{ $review->rating }} / 5
                    </div>
                    <div>
                        "{{ $review->review_text }}"
                    </div>
                
                </div>
            @endforeach
        @endif
        <div class="payment-amount">
            <h3>Payments Received</h3>
            @forelse($payments as $serviceRequestId => $payment)
                <div class="review-card">
                    <div class="review-header">
                        Service Request ID: {{ $serviceRequestId }}
                    </div>
                    <div>
                        Payment Amount: {{ $payment->amount ?? 'N/A' }}
                    </div>
                    <div style="font-size:12px; color:#888;">
                        <strong>Debug:</strong> {{ json_encode($payment) }}
                    </div>
                </div>
            @empty
                <div>No payments received yet.</div>
            @endforelse
        </div>
    </div>
    <div>
        @if (session()->has('status'))
            <div style="color: green; font-weight: bold;">
                {{ session('status') }}
            </div>
        @endif
        <h3>New Notifications</h3>
        @php $notifications = auth('driver')->user()->unreadNotifications; @endphp
        @if($notifications->isEmpty())
            <p>No new notifications.</p>
            Check for requests.
            <a href="{{ route('driver.assignments') }}">View Requests</a>
        @else
            <ul>
            @foreach(auth('driver')->user()->unreadNotifications as $notification)
                <div>
                    {{ $notification->data['message'] ?? 'No message' }}
                    <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                        @csrf
                        <button type="submit">Mark as read</button>
                    </form>
                </div>
            @endforeach
            </ul>
        @endif
    </div>

</body>
</html>
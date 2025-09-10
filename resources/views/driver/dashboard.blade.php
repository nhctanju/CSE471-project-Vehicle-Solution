<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Driver Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4a90e2 0%, #74b9ff 100%);
            margin: 0;
            padding: 0;
            color: #1e2f56;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
            box-sizing: border-box;
        }
        .container {
            max-width: 720px;
            width: 90%;
            background: #f0f5ffcc;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 33, 102, 0.15);
            padding: 32px 28px;
            box-sizing: border-box;
        }
        .driver-info {
            background: #dbe9ff;
            padding: 24px 28px;
            border-radius: 10px;
            margin-bottom: 36px;
            box-shadow: 0 3px 12px rgba(74, 144, 226, 0.3);
            color: #1a237e;
        }
        .driver-info h2 {
            margin: 0 0 8px 0;
            font-size: 1.9em;
            font-weight: 700;
            letter-spacing: 0.02em;
        }
        .driver-info p {
            margin: 0;
            font-size: 1.1em;
            font-weight: 600;
        }
        .review-card {
            background: white;
            border-radius: 10px;
            margin-bottom: 22px;
            padding: 20px 24px;
            box-shadow: 0 2px 10px #acc8ff80;
            color: #2c3e7c;
            line-height: 1.5;
        }
        .review-header {
            font-weight: 700;
            font-size: 1.15em;
            margin-bottom: 8px;
            color: #3457d5;
        }
        .payment-amount h3 {
            margin-top: 40px;
            font-size: 1.6em;
            font-weight: 700;
            color: #2a4898;
            border-bottom: 3px solid #4a90e2;
            padding-bottom: 6px;
            margin-bottom: 20px;
        }
        .payment-amount {
            margin-top: 10px;
            color: #207a35;
            font-weight: 600;
        }
        .payment-amount div {
            font-size: 1em;
        }
        .notifications {
            margin-top: 40px;
            background: #dbe9ffcc;
            padding: 24px 28px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(74, 144, 226, 0.2);
            color: #1a237e;
            max-width: 720px;
            width: 90%;
            box-sizing: border-box;
        }
        .notifications h3 {
            margin-top: 0;
            font-weight: 700;
            color: #3457d5;
            font-size: 1.5em;
            border-bottom: 3px solid #4a90e2;
            padding-bottom: 6px;
            margin-bottom: 18px;
        }
        .notification-item {
            background: white;
            border-radius: 8px;
            margin-bottom: 15px;
            padding: 16px 20px;
            box-shadow: 0 1px 8px #acc8ff80;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #2c3e7c;
        }
        .notification-item form {
            margin: 0;
        }
        .notification-item button {
            background-color: #4a90e2;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.9em;
            cursor: pointer;
            transition: background-color 0.25s ease;
        }
        .notification-item button:hover {
            background-color: #2f65c6;
        }
        .status-message {
            color: #27632a;
            font-weight: 700;
            margin-bottom: 24px;
            padding: 8px 12px;
            background: #dff0d8;
            border-radius: 6px;
            box-shadow: 0 1px 8px #b4d8a6;
        }
        a.view-requests-link {
            color: #355fc7;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            margin-left: 6px;
        }
        a.view-requests-link:hover {
            color: #1537a6;
            text-decoration: underline;
        }
        p.no-notifications {
            font-style: italic;
            color: #2a3e75;
            margin: 0 0 8px 0;
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
            @forelse($payments as $serviceRequestId => $payment)
                @if ($loop->first)
                    <h3>Payments Received</h3>
                @endif
                <div class="review-card">
                    <div class="review-header">
                        Service Request ID: {{ $serviceRequestId }}
                    </div>
                    <div>
                        Payment Amount: {{ $payment->amount ?? 'N/A' }}
                    </div>
                </div>
            @empty
                <div>No payments received yet.</div>
            @endforelse
        </div>
    </div>

    <div class="notifications">
        @if (session()->has('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <h3>New Notifications</h3>
        @php $notifications = auth('driver')->user()->unreadNotifications; @endphp
        @if($notifications->isEmpty())
            <p class="no-notifications">No new notifications.</p>
            
            <p>Check for requests. 
    <a class="view-requests-link" href="{{ route('driver.assignments') }}">
        View Requests ({{ $pendingRequestsCount }})
    </a>
</p>
            
        @else
            <ul style="padding-left: 0; list-style: none;">
                @foreach($notifications as $notification)
                    <li class="notification-item">
                        <span>{{ $notification->data['message'] ?? 'No message' }}</span>
                        <form method="POST" action="{{ route('notifications.read', $notification->id) }}">
                            @csrf
                            <button type="submit">Mark as read</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</body>
</html>

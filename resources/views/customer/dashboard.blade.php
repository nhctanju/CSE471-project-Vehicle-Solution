<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1571091718767-212dceb569a0?auto=format&fit=crop&w=1350&q=80');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            margin: 0;
            min-height: 100vh;
            color: #53324d;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-color: rgba(255, 230, 240, 0.75);
            backdrop-filter: blur(7px);
            z-index: 0;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 480px;
            margin: 60px auto;
            padding: 40px;
            background: rgba(255, 245, 250, 0.9);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(166, 62, 96, 0.35);
            text-align: center;
        }
        h1 {
            margin-bottom: 24px;
            font-size: 2.4rem;
            font-weight: 700;
            color: #7a2a44;
            text-shadow: 0 1px 3px rgba(255, 255, 255, 0.85);
            user-select: none;
        }
        p {
            font-size: 1.1rem;
            color: #6d2b44;
            margin-bottom: 36px;
            user-select: none;
        }
        a.servicing-request,
        a.driver-request,
        a.payment-request {
            display: inline-block;
            margin: 15px 10px 0;
            font-size: 1.3rem;
            padding: 14px 28px;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 700;
            user-select: none;
            letter-spacing: 0.02em;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }
        a.servicing-request {
            background: #d42b61;
            box-shadow: 0 6px 12px rgba(212, 43, 97, 0.6);
        }
        a.servicing-request:hover,
        a.servicing-request:focus-visible {
            background: #a4244a;
            box-shadow: 0 8px 18px rgba(164, 36, 74, 0.8);
            outline: none;
        }
        a.driver-request {
            background: #2e75d6;
            box-shadow: 0 6px 12px rgba(46, 117, 214, 0.6);
        }
        a.driver-request:hover,
        a.driver-request:focus-visible {
            background: #265bac;
            box-shadow: 0 8px 18px rgba(38, 91, 172, 0.8);
            outline: none;
        }
        a.payment-request button {
            font-size: 1.3rem;
            font-weight: 700;
            color: white;
            background: linear-gradient(45deg, #d42b61, #2e75d6);
            border: none;
            border-radius: 8px;
            padding: 14px 32px;
            cursor: pointer;
            box-shadow: 0 6px 14px rgba(212, 43, 97, 0.6), 0 6px 14px rgba(46, 117, 214, 0.6);
            transition: background 0.4s ease, box-shadow 0.4s ease;
            user-select: none;
        }
        a.payment-request button:hover,
        a.payment-request button:focus-visible {
            background: linear-gradient(45deg, #a42548, #265bac);
            box-shadow: 0 8px 20px rgba(164, 36, 72, 0.8), 0 8px 20px rgba(38, 91, 172, 0.8);
            outline: none;
        }
        a ~ * {
            user-select: none;
        }
        a {
            cursor: pointer;
        }
        @media (max-width: 520px) {
            .container {
                margin: 40px 20px;
                padding: 30px 20px;
            }
            h1 {
                font-size: 2rem;
            }
            a.servicing-request,
            a.driver-request,
            a.payment-request button {
                font-size: 1.1rem;
                padding: 12px 24px;
                margin: 12px 6px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session()->has('status'))
            <div style="color: green; font-weight: 700; margin-bottom: 24px;">
                {{ session('status') }}
            </div>
            <a href="{{ route('reviews.index') }}" class="servicing-request">Leave a Review</a>
        @endif


        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>Manage your account and requests below.</p>


        <a href="{{ route('service_requests.create') }}" class="servicing-request">Servicing Request</a>
        <a href="{{ route('driver-assignments.create') }}" class="driver-request">Request a Driver</a>
        <a href="{{ route('payments.info') }}" class="payment-request"><button>Payment Information</button></a>
        <a href="{{ route('payments.index') }}" class="payment-request"><button>Pay Dues</button></a>
    </div>
</body>
</html>

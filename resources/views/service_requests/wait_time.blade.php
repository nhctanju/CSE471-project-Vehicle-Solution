<!DOCTYPE html>
<html lang="en">
<head>
    <title>Estimated Wait Time</title>
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css" />
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #a63e60;
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 240, 246, 0.3);
            z-index: -1;
        }
        .container {
            background: rgba(255, 255, 255, 0.92);
            max-width: 480px;
            width: 100%;
            padding: 40px 45px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(166, 62, 96, 0.25);
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
            text-align: center;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .container:hover {
            box-shadow: 0 12px 36px rgba(166, 62, 96, 0.35);
        }
        h1 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 2.5rem;
            color: #83334c;
            border-bottom: 3px solid #e9a0ad;
            padding-bottom: 12px;
            letter-spacing: 1.1px;
            user-select: none;
            text-shadow: 0 1px 3px rgba(255, 255, 255, 0.9);
        }
        p {
            font-weight: 600;
            font-size: 1.15rem;
            margin-bottom: 1.5rem;
            color: #6e2f42;
            user-select: none;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
        }
        p strong {
            color: #83334c;
        }
        #countdown {
            font-size: 3.5rem;
            color: #9c486d;
            font-weight: 800;
            margin: 2rem 0;
            padding: 20px;
            background-color: rgba(255, 245, 248, 0.95);
            border: 2px solid #e9a0ad;
            border-radius: 16px;
            box-shadow: inset 0 2px 4px rgb(0 0 0 / 0.05), 0 4px 12px rgba(156, 72, 109, 0.2);
            user-select: none;
            letter-spacing: 2px;
            backdrop-filter: blur(8px);
        }
        a {
            color: #85394f;
            text-decoration: underline;
            font-weight: 700;
            font-size: 1.1rem;
            transition: color 0.3s ease;
            display: inline-block;
            margin: 1.5rem 0;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
        }
        a:hover, a:focus-visible {
            color: #b6506a;
            outline: none;
        }
        form {
            background: rgba(255, 245, 248, 0.95);
            padding: 30px;
            border-radius: 12px;
            margin-top: 2rem;
            border: 2px solid rgba(240, 194, 208, 0.8);
            box-shadow: inset 0 2px 4px rgb(0 0 0 / 0.05), 0 4px 12px rgba(156, 72, 109, 0.15);
            text-align: left;
            backdrop-filter: blur(8px);
        }
        label {
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.05rem;
            color: #85394f;
        }
        textarea {
            width: 100%;
            min-height: 120px;
            padding: 14px 16px;
            font-size: 1rem;
            border: 2px solid #e9a0ad;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.98);
            color: #6f3a4e;
            font-family: inherit;
            box-sizing: border-box;
            margin-bottom: 20px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: inset 0 2px 4px rgb(0 0 0 / 0.05);
            line-height: 1.6;
            resize: vertical;
        }
        textarea:focus {
            outline: none;
            border-color: #b6506a;
            background-color: rgba(255, 231, 236, 0.98);
            box-shadow: 0 0 8px rgba(182, 80, 106, 0.4);
        }
        button {
            background-color: #9c486d;
            border: none;
            color: #fff;
            font-weight: 700;
            font-size: 1.25rem;
            padding: 14px 0;
            width: 100%;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(156, 72, 109, 0.5);
            user-select: none;
        }
        button:hover, button:focus-visible {
            background-color: #7e3d57;
            box-shadow: 0 6px 18px rgba(126, 61, 87, 0.65);
        }
        .error-container {
            background-color: rgba(248, 215, 218, 0.95);
            border: 2px solid #c94a62;
            border-radius: 12px;
            color: #842029;
            padding: 18px 24px;
            margin-top: 20px;
            font-weight: 700;
            text-align: left;
            user-select: none;
            box-shadow: inset 0 2px 4px rgb(0 0 0 / 0.1);
        }
        @media (max-width: 520px) {
            .container {
                padding: 30px 25px;
                border-radius: 14px;
            }
            h1 {
                font-size: 1.8rem;
            }
            #countdown {
                font-size: 2.8rem;
                padding: 15px;
            }
            button {
                font-size: 1.1rem;
                padding: 12px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Estimated Wait Time</h1>

        <p>Service Request ID: <strong>{{ $serviceRequest->id }}</strong></p>
        <p>Estimated wait: <strong>{{ $serviceRequest->duration_minutes }} minutes</strong></p>
        
        <div id="countdown"></div>
        
        <a href="{{ route('service_requests.centre', $serviceRequest->id) }}">See Details In Centre</a>

        <form method="POST" action="{{ route('service_requests.cancel', $serviceRequest->id) }}">
            @csrf
            <label for="cancellation_reason">Reason for Cancellation:</label>
            <textarea name="cancellation_reason" id="cancellation_reason" placeholder="Please provide a reason for cancellation..." required></textarea>
            
            @if ($errors->has('cancellation_reason'))
                <div class="error-container">{{ $errors->first('cancellation_reason') }}</div>
            @endif
            
            <button type="submit">Cancel Service Request</button>
        </form>
    </div>

    <script>
        let totalSeconds = {{ $waitInSeconds }};

        function updateCountdown() {
            if (totalSeconds <= 0) {
                document.getElementById('countdown').innerHTML = "Time's up!";
                clearInterval(timerInterval);
                return;
            }

            let minutes = Math.floor(totalSeconds / 60);
            let seconds = totalSeconds % 60;

            document.getElementById('countdown').innerHTML = minutes + "m " + (seconds < 10 ? "0" : "") + seconds + "s";

            totalSeconds--;
        }

        updateCountdown();
        let timerInterval = setInterval(updateCountdown, 1000);
    </script>
</body>
</html>

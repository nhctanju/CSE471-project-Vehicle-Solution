<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Driver</title>
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css" />
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1e40af;
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
            background: rgba(240, 246, 255, 0.3);
            z-index: -1;
        }
        form {
            background: rgba(255, 255, 255, 0.92);
            max-width: 480px;
            width: 100%;
            padding: 40px 45px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(30, 64, 175, 0.25);
            box-sizing: border-box;
            transition: box-shadow 0.3s ease;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        form:hover, form:focus-within {
            box-shadow: 0 12px 36px rgba(30, 64, 175, 0.35);
        }
        h2 {
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 2.5rem;
            color: #1e3a8a;
            border-bottom: 3px solid #93c5fd;
            padding-bottom: 12px;
            letter-spacing: 1.1px;
            user-select: none;
            text-align: center;
            text-shadow: 0 1px 3px rgba(255, 255, 255, 0.9);
        }
        label {
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 1.05rem;
            color: #1e40af;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8);
        }
        select {
            width: 100%;
            padding: 14px 16px;
            font-size: 1rem;
            border: 2px solid #93c5fd;
            border-radius: 10px;
            background-color: rgba(239, 246, 255, 0.95);
            color: #1e3a8a;
            font-family: inherit;
            box-sizing: border-box;
            margin-bottom: 28px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: inset 0 2px 4px rgb(0 0 0 / 0.05);
            line-height: 1.4;
            backdrop-filter: blur(8px);
        }
        select:focus {
            outline: none;
            border-color: #3b82f6;
            background-color: rgba(219, 234, 254, 0.95);
            box-shadow: 0 0 8px rgba(59, 130, 246, 0.4);
        }
        select:hover {
            border-color: #3b82f6;
        }
        button {
            background-color: #2563eb;
            border: none;
            color: #fff;
            font-weight: 700;
            font-size: 1.25rem;
            padding: 14px 0;
            width: 100%;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.5);
            user-select: none;
        }
        button:hover, button:focus-visible {
            background-color: #1d4ed8;
            box-shadow: 0 6px 18px rgba(29, 78, 216, 0.65);
        }
        .error-container {
            background-color: rgba(254, 242, 242, 0.95);
            border: 2px solid #ef4444;
            border-radius: 12px;
            color: #dc2626;
            padding: 18px 24px;
            margin-top: 28px;
            font-weight: 700;
            text-align: left;
            user-select: none;
            box-shadow: inset 0 2px 4px rgb(0 0 0 / 0.1);
            backdrop-filter: blur(8px);
        }
        .error-container ul {
            margin: 0;
            padding-left: 24px;
        }
        .error-container li {
            margin-bottom: 10px;
        }
        @media (max-width: 520px) {
            form {
                padding: 30px 25px;
                border-radius: 14px;
            }
            h2 {
                font-size: 1.8rem;
            }
            button {
                font-size: 1.1rem;
                padding: 12px 0;
            }
        }
    </style>
</head>
<body>
    <form action="{{ route('driver-assignments.store') }}" method="POST">
        <h2>Request a Driver</h2>
        @csrf
        
        <label for="service_request_id">Service Request:</label>
        <select name="service_request_id" id="service_request_id" required>
            <option value="">-- Select a Service Request --</option>
            @foreach($serviceRequests as $request)
                <option value="{{ $request->id }}">Request #{{ $request->id }} - {{ $request->description ?? 'Service Request' }}</option>
            @endforeach
        </select>

        <button type="submit">Send Request to All Drivers</button>

        @if ($errors->any())
            <div class="error-container" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</body>
</html>

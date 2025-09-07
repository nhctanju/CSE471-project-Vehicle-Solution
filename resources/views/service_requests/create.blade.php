<!DOCTYPE html>
<html lang="en">
<head>
    <title>Place a Service Request</title>
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1502877338535-766e1452684a?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #a63e60;
            padding: 50px 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        form {
            background: rgba(255, 240, 246, 0.9);
            max-width: 480px;
            width: 100%;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(166, 62, 96, 0.15);
            box-sizing: border-box;
        }
        h2 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #83334c;
            border-bottom: 2px solid #e9a0ad;
            padding-bottom: 10px;
            letter-spacing: 1px;
            text-shadow: 0 1px 3px rgba(255, 255, 255, 0.85);
        }
        p.welcome {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: #6e2f42;
            text-shadow: 0 1px 2px rgba(255, 255, 255, 0.75);
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 1rem;
            color: #85394f;
        }
        select, textarea {
            width: 100%;
            padding: 12px 15px;
            font-size: 1rem;
            border: 1.5px solid #e9a0ad;
            border-radius: 6px;
            background-color: #fff5f8;
            color: #6f3a4e;
            font-family: inherit;
            box-sizing: border-box;
            margin-bottom: 20px;
            transition: border-color 0.2s ease;
            box-shadow: inset 2px 2px 6px #f6d6dc;
        }
        select:focus, textarea:focus {
            outline: none;
            border-color: #b6506a;
            background-color: #ffe7ec;
            box-shadow: 0 0 6px #fbb6cc;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        button {
            background-color: #9c486d;
            border: none;
            color: #fff;
            font-weight: 700;
            font-size: 1.15rem;
            padding: 12px 0;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.25s ease;
            box-shadow: 0 4px 12px rgba(156, 72, 109, 0.6);
        }
        button:hover {
            background-color: #7e3d57;
            box-shadow: 0 6px 18px rgba(126, 61, 87, 0.8);
        }
        .error-container {
            background-color: #f8d7da;
            border: 1.5px solid #c94a62;
            border-radius: 8px;
            color: #842029;
            padding: 15px 20px;
            margin-top: 20px;
            font-weight: 600;
            text-align: left;
        }
        .error-container ul {
            margin: 0;
            padding-left: 20px;
        }
        .error-container li {
            margin-bottom: 6px;
        }
        .login-prompt {
            font-size: 1.1rem;
            color: #6e2f42;
            text-align: center;
        }
        .login-prompt a {
            color: #85394f;
            text-decoration: underline;
            font-weight: 600;
        }
        .login-prompt a:hover {
            color: #b6506a;
        }
        @media (max-width: 520px) {
            form {
                padding: 25px 20px;
                border-radius: 10px;
            }
            h2 {
                font-size: 1.6rem;
            }
            button {
                font-size: 1rem;
                padding: 10px 0;
            }
        }
    </style>
</head>
<body>
    @auth('customer')
        <form method="POST" action="{{ route('service_requests.store') }}">
            <h2>Place a Service Request</h2>
            <p class="welcome">Welcome, {{ auth()->guard('customer')->user()->name }}!</p>
            @csrf

            <label for="service_type">Servicing Type:</label>
            <select name="service_type" id="service_type" required>
                <option value="">-- Select --</option>
                <option value="center" {{ old('service_type') == 'center' ? 'selected' : '' }}>At Servicing Center</option>
                <option value="place" {{ old('service_type') == 'place' ? 'selected' : '' }}>At My Place</option>
            </select>

            <label for="instructions">Servicing Instructions / Notes (optional):</label>
            <textarea name="instructions" id="instructions" rows="4" cols="50" placeholder="Write any details here...">{{ old('instructions') }}</textarea>

            <button type="submit">Submit Request</button>

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
    @else
        <div class="login-prompt">
            You must <a href="{{ route('customer.login') }}">log in</a> as a customer to place a service request.
        </div>
    @endauth
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Driver Assignments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #1a237e;
            margin: 20px;
        }
        h2 {
            color: #283593;
            border-bottom: 2px solid #3f51b5;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .assignment {
            background-color: #e8eaf6;
            border: 1px solid #c5cae9;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 6px rgba(63, 81, 181, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .assignment p {
            margin: 0;
            font-size: 1.1em;
            font-weight: 600;
        }
        form {
            display: inline;
            margin-left: 10px;
        }
        button {
            background-color: #3f51b5;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #283593;
        }
        button.decline {
            background-color: #f44336;
        }
        button.decline:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h2>Pending Service Requests</h2>
    @foreach($assignments as $assignment)
        <div class="assignment">
            <p>Request #{{ $assignment->service_request_id }}</p>
            <div>
                <form action="{{ route('driver-assignments.accept', $assignment->id) }}" method="POST">
                    @csrf
                    <button type="submit">Accept</button>
                </form>
                <form action="{{ route('driver-assignments.decline', $assignment->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="decline">Decline</button>
                </form>
            </div>
        </div>
    @endforeach
</body>
</html>

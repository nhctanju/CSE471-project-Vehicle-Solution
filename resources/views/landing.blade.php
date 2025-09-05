<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Solution - Welcome</title>
    <style>
        /* Import Instrument Sans font */
        @import url('https://fonts.bunny.net/css?family=instrument-sans:400,500,600');
        
        /* Tailwind CSS equivalent styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #f9fafb;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .bg-white {
            background-color: #fff;
        }
        
        .bg-gray-50 {
            background-color: #f9fafb;
        }
        
        .bg-gray-800 {
            background-color: #1f2937;
        }
        
        .bg-red-500 {
            background-color: #ef4444;
        }
        
        .bg-red-600 {
            background-color: #dc2626;
        }
        
        .bg-blue-500 {
            background-color: #3b82f6;
        }
        
        .bg-blue-600 {
            background-color: #2563eb;
        }
        
        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        
        .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        .flex {
            display: flex;
        }
        
        .flex-1 {
            flex: 1 1 0%;
        }
        
        .flex-col {
            flex-direction: column;
        }
        
        .items-center {
            align-items: center;
        }
        
        .justify-between {
            justify-content: space-between;
        }
        
        .justify-center {
            justify-content: center;
        }
        
        .font-sans {
            font-family: 'Instrument Sans', sans-serif;
        }
        
        .font-medium {
            font-weight: 500;
        }
        
        .font-semibold {
            font-weight: 600;
        }
        
        .font-bold {
            font-weight: 700;
        }
        
        .text-2xl {
            font-size: 1.5rem;
        }
        
        .text-3xl {
            font-size: 1.875rem;
        }
        
        .text-lg {
            font-size: 1.125rem;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-left {
            text-align: left;
        }
        
        .text-red-600 {
            color: #dc2626;
        }
        
        .text-gray-700 {
            color: #374151;
        }
        
        .text-gray-200 {
            color: #e5e7eb;
        }
        
        .text-gray-600 {
            color: #4b5563;
        }
        
        .text-white {
            color: #fff;
        }
        
        .p-6 {
            padding: 1.5rem;
        }
        
        .p-8 {
            padding: 2rem;
        }
        
        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        
        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        
        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .mb-2 {
            margin-bottom: 0.5rem;
        }
        
        .mb-4 {
            margin-bottom: 1rem;
        }
        
        .mb-6 {
            margin-bottom: 1.5rem;
        }
        
        .mt-8 {
            margin-top: 2rem;
        }
        
        .mb-8 {
            margin-bottom: 2rem;
        }
        
        .space-x-4 > * + * {
            margin-left: 1rem;
        }
        
        .rounded-lg {
            border-radius: 0.5rem;
        }
        
        .list-disc {
            list-style-type: disc;
        }
        
        .list-inside {
            list-style-position: inside;
        }
        
        .transition {
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
        
        .hover\:text-red-600:hover {
            color: #dc2626;
        }
        
        .hover\:bg-red-600:hover {
            background-color: #dc2626;
        }
        
        .hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }
        
        .max-w-2xl {
            max-width: 42rem;
        }
        
        .max-w-md {
            max-width: 28rem;
        }
        
        .w-full {
            width: 100%;
        }
        
        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }
        
        .gap-6 {
            gap: 1.5rem;
        }
        
        /* Custom responsive styles */
        @media (min-width: 768px) {
            .md\:flex-row {
                flex-direction: row;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col justify-between font-sans" style = "background-image: url('https://t4.ftcdn.net/jpg/03/08/44/53/360_F_308445331_ZZinysRse5xOZacNTnoQqG24TAy7ftZ5.jpg');">
    <header class="bg-white shadow p-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-red-600">Vehicle Solution</h1>
        <nav class="space-x-4">
            <a href="/login" class="text-gray-700 hover:text-red-600 font-medium">Login as Customer</a>
            <a href="{{route('driver.login') }}" class="text-gray-700 hover:text-red-600 font-medium">Log in as Driver</a>
        </nav>
    </header>
    <main class="flex-1 flex flex-col items-center justify-center px-4">
        <div class="max-w-2xl w-full bg-white rounded-lg shadow-lg p-8 mt-8 mb-8">
            <h2 class="text-3xl font-semibold text-center text-red-600 mb-4">Welcome to Vehicle Solution</h2>
            <p class="text-gray-700 text-center mb-6">
                Vehicle Solution is your one-stop platform for connecting customers with reliable drivers for all your transportation needs. Whether you are looking to book a ride, manage your trips, or earn as a driver, our platform is designed to make your experience seamless, safe, and efficient.
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center mb-6">
                <a href="/register/customer" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-lg text-center transition">Customer Registration</a>
                <a href="/register/driver" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg text-center transition">Driver Registration</a>
            </div>
            <div class="text-center text-gray-600">
                <h3 class="text-lg font-semibold mb-2">Why Choose Us?</h3>
                <ul class="list-disc list-inside text-left mx-auto max-w-md">
                    <li>Easy and fast registration for both customers and drivers</li>
                    <li>Secure and reliable ride booking system</li>
                    <li>Transparent payment and review process</li>
                    <li>24/7 customer support</li>
                </ul>
            </div>
        </div>
    </main>
    <footer class="bg-gray-800 text-gray-200 py-6 text-center">
        <div class="mb-2">&copy; 2025 Vehicle Solution. All rights reserved.</div>
        <div>Contact: support@vehiclesolution.com | Phone: +880 2934589</div>
    </footer>
</body>
</html>
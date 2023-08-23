<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="username" name="username" id="username" class="mt-1 p-2 w-full border rounded">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded">
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">Login</button>
            </div>
        </form>
        
        <p class="text-sm text-center text-gray-500">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a></p>
    </div>

</body>
</html>

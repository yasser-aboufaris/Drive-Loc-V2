<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../../src/output.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">

    <!-- Background Text (Optional, removed for a more professional look) -->
    <div class="absol!ute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-transparent text-6xl font-extrabold bg-clip-text opacity-10">
        Rent Your Ride
    </div>

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-lg space-y-6 z-10">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">
            Log In to Your Account
        </h2>

        <form action="#" method="POST" class="space-y-5">
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="mt-2 w-full p-4 bg-gray-50 border-2 border-gray-300 rounded-xl text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 transition-all duration-300 hover:border-blue-400 hover:ring-blue-400"
                    placeholder="youremail@example.com">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-lg font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-2 w-full p-4 bg-gray-50 border-2 border-gray-300 rounded-xl text-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500 transition-all duration-300 hover:border-blue-400 hover:ring-blue-400"
                    placeholder="Enter your password">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-4 bg-blue-600 text-white text-lg font-semibold rounded-2xl transition-all duration-300 hover:scale-105 hover:bg-blue-700 hover:shadow-xl">
                Log In
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-lg text-gray-600">Don't have an account? <a href="signup.html"
                    class="text-blue-600 font-semibold hover:text-blue-700"><a href="login.php">Sign Up</a></p>
        </div>
    </div>

</body>

</html>

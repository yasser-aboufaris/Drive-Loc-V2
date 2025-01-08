<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">
            <!-- Logo -->
            <a href="#" class="text-white flex items-center space-x-2 px-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <span class="text-2xl font-extrabold">Dashboard</span>
            </a>

            <!-- Nav Links -->
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    Home
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    Analytics
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    Users
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow-lg">
                <div class="container mx-auto">
                    <div class="flex items-center justify-between p-4">
                        <!-- Updated Menu Button -->
                        <button id="menu-btn" class="flex items-center space-x-2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50 md:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <span class="font-medium">Menu</span>
                        </button>
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-800">John Doe</span>
                            <img class="w-8 h-8 rounded-full" src="/api/placeholder/32/32" alt="Profile">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="container mx-auto p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Users</h3>
                        <p class="text-3xl font-bold text-gray-800">1,482</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Revenue</h3>
                        <p class="text-3xl font-bold text-gray-800">$42,582</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Active Projects</h3>
                        <p class="text-3xl font-bold text-gray-800">24</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Pending Tasks</h3>
                        <p class="text-3xl font-bold text-gray-800">8</p>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h2>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 border-b">
                            <div class="flex-1">
                                <h4 class="text-lg font-medium">New user registration</h4>
                                <p class="text-gray-600">Jane Smith completed registration</p>
                            </div>
                            <span class="text-sm text-gray-500">2 hours ago</span>
                        </div>
                        <div class="flex items-center p-4 border-b">
                            <div class="flex-1">
                                <h4 class="text-lg font-medium">Project update</h4>
                                <p class="text-gray-600">Website redesign phase 1 completed</p>
                            </div>
                            <span class="text-sm text-gray-500">4 hours ago</span>
                        </div>
                        <div class="flex items-center p-4">
                            <div class="flex-1">
                                <h4 class="text-lg font-medium">Server maintenance</h4>
                                <p class="text-gray-600">Scheduled maintenance completed</p>
                            </div>
                            <span class="text-sm text-gray-500">6 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
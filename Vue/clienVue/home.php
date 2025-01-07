<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
    <body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600">AutoSpace</a>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-blue-600">Sign In</button>
                    <button class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Share Your Ride</button>
                </div>
            </div>
        </div>
    </nav>
 

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">   <?php
echo '<div>' . $_SESSION['role'] . '</div>';


?></h1>
            <p class="text-lg md:text-xl text-blue-100">Your destination for car reviews, automotive news, and enthusiast stories.</p>
        </div>
    </header>


    <!-- Featured Posts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-bold mb-8">Featured Reviews</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Featured Post Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="/api/placeholder/400/200" alt="BMW M3 Review" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-blue-600 mb-2">Performance Cars • 8 min read</div>
                    <h3 class="text-xl font-semibold mb-2">2025 BMW M3 Competition Review</h3>
                    <p class="text-gray-600 mb-4">An in-depth look at BMW's latest M3 Competition and how it redefines driving excellence...</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Mark Thompson</p>
                            <p class="text-sm text-gray-500">Senior Car Reviewer</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Featured Posts -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="/api/placeholder/400/200" alt="Electric Vehicle Review" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-green-600 mb-2">Electric Vehicles • 10 min read</div>
                    <h3 class="text-xl font-semibold mb-2">Tesla Model 3 vs Polestar 2</h3>
                    <p class="text-gray-600 mb-4">Comparing two of the most popular electric sedans in the market...</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Sarah Chen</p>
                            <p class="text-sm text-gray-500">EV Specialist</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="/api/placeholder/400/200" alt="Classic Car Feature" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="text-sm text-purple-600 mb-2">Classics • 7 min read</div>
                    <h3 class="text-xl font-semibold mb-2">Restoring a '67 Mustang</h3>
                    <p class="text-gray-600 mb-4">A journey through the restoration of an American classic...</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Robert Miller</p>
                            <p class="text-sm text-gray-500">Classic Car Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Posts -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Latest Reviews</h2>
        <div class="flex space-x-2">
            <button class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                All Cars
            </button>
            <button class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                Performance
            </button>
            <button class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                Electric
            </button>
        </div>
    </div>

    <!-- Stacked Posts -->
    <div class="space-y-8">
        <!-- Latest Post Item -->
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center gap-6">
                <img src="/api/placeholder/200/200" alt="Porsche Review" class="w-32 h-32 rounded-lg object-cover">
                <div>
                    <div class="text-sm text-blue-600 mb-2">Performance • 12 min read</div>
                    <h3 class="text-xl font-semibold mb-2">2025 Porsche 911 GT3 RS Track Test</h3>
                    <p class="text-gray-600 mb-4">Taking Porsche's latest track weapon to its limits at the Nürburgring...</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">James Wilson</p>
                            <p class="text-sm text-gray-500">Track Day Specialist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Latest Posts -->
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-300">
            <div class="flex items-center gap-6">
                <img src="/api/placeholder/200/200" alt="SUV Comparison" class="w-32 h-32 rounded-lg object-cover">
                <div>
                    <div class="text-sm text-green-600 mb-2">SUVs • 9 min read</div>
                    <h3 class="text-xl font-semibold mb-2">Family SUV Showdown: X5 vs GLE vs XC90</h3>
                    <p class="text-gray-600 mb-4">Comparing the best luxury family SUVs in the market...</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full">
                        <div class="ml-3">
                            <p class="text-sm font-medium">Emma Davis</p>
                            <p class="text-sm text-gray-500">Family Car Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-12">
        <button class="px-6 py-3 rounded-lg border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-medium">
            Load More Reviews
        </button>
    </div>
</div>

    
    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-sm">
            <div>
                <h3 class="font-semibold text-gray-800 uppercase">Categories</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Performance Cars</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Electric Vehicles</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Classic Cars</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 uppercase">Resources</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Buyer's Guides</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Maintenance Tips</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Car Specs</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 uppercase">Legal</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Privacy</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Terms</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Cookie Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 uppercase">Follow Us</h3>
                <ul class="mt-2 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Instagram</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">YouTube</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">Facebook</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-6 border-t border-gray-200 pt-4 text-center text-gray-500 text-xs">
            <p>© 2025 AutoSpace. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
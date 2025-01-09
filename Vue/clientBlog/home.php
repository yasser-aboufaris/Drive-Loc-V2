<?php 
include "../../classes/conn.php";
include "../../classes/themes.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Literary Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-stone-50 to-stone-100">
    <!-- Ornate Header -->
    <header class="relative bg-white border-b border-stone-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-16 text-center">
            <!-- Decorative Lines -->
            <div class="absolute left-1/2 transform -translate-x-1/2 top-6 w-64 h-px bg-gradient-to-r from-transparent via-stone-400 to-transparent"></div>
            <div class="absolute left-1/2 transform -translate-x-1/2 bottom-6 w-64 h-px bg-gradient-to-r from-transparent via-stone-400 to-transparent"></div>
            
  
        </div>
    </header>

<?php
$theme = new themes($conn);
$cat = $theme->read();?>
    <main class="max-w-7xl mx-auto px-4 py-16">
        <!-- Theme Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Category Cards -->
            <?php
            foreach($cat as $row){
            ?>
            <div class="group">
                <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-stone-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="p-8 relative">
                        <!-- Decorative accent line -->
                        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-gradient-to-r from-transparent via-blue-500 to-transparent"></div>
                        
                        <!-- Line with enhanced design -->
                        <div class="mt-6 flex items-center justify-center gap-4">
                            <div class="h-px w-12 bg-gradient-to-r from-blue-500 to-purple-500"></div>
                            <div class="h-2 w-2 rounded-full bg-purple-500"></div>
                            <div class="h-px w-12 bg-gradient-to-l from-blue-500 to-purple-500"></div>
                        </div>
                        
                        <!-- Title -->
                        <h2 class="mt-6 text-2xl font-serif font-semibold text-gray-800 text-center">
                            Discover <?php echo $row['theme'] ?>
                        </h2>
                        
                        <!-- Description -->
                        <p class="mt-6 text-gray-600 leading-relaxed text-lg">
                            <?php echo $row['description'] ?>
                        </p>
                        
                        <!-- Enhanced button -->
                        <a href="postsByTheme.php?id=<?php echo $row['id_theme'] ?>" class="mt-8 block">
                            <button class="w-full group/btn inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl font-medium transition-all duration-300 hover:from-blue-700 hover:to-purple-700 hover:shadow-lg hover:shadow-blue-500/20">
                                Explore Collection
                                <svg class="w-4 h-4 transform transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>

        <!-- Decorative Divider -->
        <div class="my-20 flex items-center justify-center">
            <div class="w-40 h-px bg-gradient-to-r from-transparent via-stone-400 to-transparent"></div>
            <div class="mx-6 text-stone-400 text-2xl">✦</div>
            <div class="w-40 h-px bg-gradient-to-r from-transparent via-stone-400 to-transparent"></div>
        </div>

        <!-- Featured Quote -->

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-stone-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="text-center">
                <p class="text-stone-600 font-serif text-lg">The cars Haven</p>
                <p class="mt-2 text-stone-500 text-sm">Est. MMXXV</p>
            </div>
        </div>
    </footer>
</body>
</html>
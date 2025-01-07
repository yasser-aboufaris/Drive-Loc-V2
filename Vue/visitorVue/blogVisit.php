<?php
include("../../classes/conn.php");
include("../../classes/posts.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header/Name Bar -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-900">Your Cars Blog</h1>
            <p class="mt-2 text-gray-600">Exploring the world of technology</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid gap-6">
            <?php
            $posts = new Posts($conn);
            $read = $posts->getAllPosts();
            foreach ($read as $post) {
            ?>
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold hover:text-blue-600 cursor-pointer">
                            <?php echo $post['title']; ?>
                        </h2>
                        <div class="text-sm text-gray-500 mt-1">
                            January 7, 2025 • John Doe
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700">
                                <?php echo $post['description']; ?>
                            </p>
                            <a href="readMore.php?id=<?php echo $post['id_post']; ?>">
                            <button class="mt-4 text-blue-600 hover:text-blue-800">
                                Read more →
                            </button></a>
                        </div>
                    </div>
                </div>
            <?php
            }?>
            

            
        </div>
    </main>
</body>
</html>
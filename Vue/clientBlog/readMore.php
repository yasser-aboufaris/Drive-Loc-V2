<?php
// Include required files
require_once "../../classes/conn.php";
require_once "../../classes/posts.php";
$id = $_GET['id'];
$posts = new Posts(pdo: $conn);
$read = $posts->ReadMore($id);

// print_r("</pre>");
// print_r($read);
// print_r("</pre>") ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Cars 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen bg-gray-50">
    <!-- Header/Name Bar -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-900">My Tech Blog</h1>
            <p class="mt-2 text-gray-600">Exploring the world of technology</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl mx-auto px-4 py-8">
        <article class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-8">
                <!-- Back Button -->
                <a href="./blogVisit.php" class="text-blue-600 hover:text-blue-800 mb-6 inline-block">
                    ← Back to all posts
                </a>

                <!-- Post Header -->
                <h1 class="text-3xl font-bold text-gray-900 mt-4">
                    <?php echo $read['title']; ?>
                </h1>

                <!-- Preview Text -->
                <p class="text-gray-600 mt-2 text-sm italic">
                <?php echo $read['description']; ?> </p>

                <!-- Post Content -->
                <div class="mt-6 prose max-w-none">
                    <p class="text-gray-700 leading-relaxed">
                    <?php echo $read['content']; ?>    
                    </p>
                </div>

                <!-- Post Meta -->
                <div class="mt-8 pt-4 border-t border-gray-200 text-sm text-gray-500">
                    Post ID: 5 • Status: Accepted
                </div>
            </div>
        </article>
    </main>
</body>
</html>
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



        <section class="mt-8 bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900">Leave a Comment</h2>
                <form action="add_comment.php" method="POST" class="mt-6 space-y-6">
                    <!-- Hidden input for post ID -->
                    <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                    
                    <!-- Name Input -->
                

                    <!-- Comment Input -->
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                        <textarea 
                            name="comment" 
                            id="comment" 
                            rows="4" 
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            placeholder="Share your thoughts..."
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit"
                            class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
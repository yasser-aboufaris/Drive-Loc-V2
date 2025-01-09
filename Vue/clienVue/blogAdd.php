<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-purple-100 py-8 px-4">

<div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-xl border-2 border-gray-200">
    <h2 class="text-3xl font-extrabold text-center text-blue-600 mb-8">Create a New Post</h2>
    
    <form action="/path/to/your/backend.php" method="POST">
        <!-- User ID -->
        <div class="mb-6">
            <label for="id_user" class="block text-lg font-semibold text-gray-700 mb-2">User ID</label>
            <input type="number" name="id_user" id="id_user" class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-md" required>
        </div>

        <!-- Title -->
        <div class="mb-6">
            <label for="title" class="block text-lg font-semibold text-gray-700 mb-2">Title</label>
            <input type="text" name="title" id="title" class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-md" required>
        </div>

        <!-- Content -->
        <div class="mb-6">
            <label for="content" class="block text-lg font-semibold text-gray-700 mb-2">Content</label>
            <textarea name="content" id="content" rows="5" class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-md" required></textarea>
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-lg font-semibold text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full px-5 py-3 bg-gray-50 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-md"></textarea>
        </div>

        <!-- Tags (Checkboxes) -->
        <div class="mb-6">
            <label class="block text-lg font-semibold text-gray-700 mb-2">Tags</label>
            <div class="flex flex-wrap gap-4">

              <?php 
              foreach(){?>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="tags[]" value="1" class="form-checkbox text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <span class="ml-2 text-gray-700">Tag 1</span>
                </label>
²
                <!-- Add more tags as needed -->
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 text-center">
            <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-all duration-300 ease-in-out">Create Post</button>
        </div>
    </form>
</div>

</body>
</html>

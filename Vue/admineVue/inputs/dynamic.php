<?php
include "../../../classes/categories.php";
include "../../../classes/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Stylish Form</title>
    <link rel="stylesheet" href="../../../src/output.css">
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="max-w-lg w-full bg-white shadow-2xl rounded-lg p-8">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 tracking-wide">✨ ADD CARS</h1>
        <form action="your_backend_script.php" method="POST" id="dynamicForm" class="space-y-6 max-w-xl mx-auto">
        <?php
            $conn = new Connection();
            $read = new Categories($conn);
    
            ?>
<div class="relative">
    <label for="category" class="block text-lg font-semibold text-white mb-2 tracking-wide">Category</label>
    <select id="category" name="category"
        class="w-full px-6 py-4 border-2 border-gray-300 rounded-xl shadow-xl focus:outline-none focus:ring-4 focus:ring-indigo-400 focus:border-indigo-600 text-gray-800 bg-gradient-to-r from-indigo-50 via-indigo-100 to-indigo-200 hover:bg-indigo-300 transition duration-300 ease-in-out">
        <option value="" disabled selected class="text-gray-500">Select a category</option>
        <?php
        foreach ($read->read() as $result) {
            echo '<option value="' . $result['id'] . '">' . $result['categorie'] . '</option>';
        }
        ?>
    </select>
    <div class="absolute top-0 right-0 bottom-0 left-0 pointer-events-none bg-gradient-to-t from-indigo-600 to-transparent rounded-xl opacity-20"></div>
</div>


            <!-- Car Model Field -->
            <div>
                <label for="carModel" class="block text-sm font-medium text-gray-700 mb-1">Car Model</label>
                <input type="text" id="carModel" name="model"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                    placeholder="Enter the car model" required />
            </div>

            <!-- Description Field -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                    rows="3" placeholder="Enter a description of the car" required></textarea>
            </div>

            <!-- Image URL Field -->
            <div>
                <label for="imageUrl" class="block text-sm font-medium text-gray-700 mb-1">Image URL</label>
                <input type="url" id="imageUrl" name="image_url"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                    placeholder="Enter the image URL" required />
            </div>

            <!-- Category Field -->
        

            <div id="adding"></div>

            <!-- Buttons -->
            <div class="flex items-center justify-between" id="buttons">
                <button type="button" id="addField"
                    class="flex items-center justify-center bg-gradient-to-r from-green-400 to-green-500 hover:from-green-500 hover:to-green-600 text-white font-medium py-2 px-5 rounded-lg shadow-md transform transition hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Field
                </button>
                <button type="submit"
                    class="flex items-center justify-center bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 text-white font-medium py-2 px-5 rounded-lg shadow-md transform transition hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M5 10a5 5 0 1010 0 5 5 0 00-10 0z" />
                    </svg>
                    Submit
                </button>
            </div>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>
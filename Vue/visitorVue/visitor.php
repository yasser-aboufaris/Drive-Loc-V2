<?php
// Include required files
require_once "../../classes/conn.php";
require_once "../../classes/cars.php";
require_once "../../classes/categories.php";
$car = new Cars($conn);

$read = new Categories($conn);

// Initialize car object

// Get public car listings (we'll create this method in the Cars class)
$cars = $car->read();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Drive & Loc - Browse Cars</title>
</head>

<body>
    <!-- Navigation remains the same -->
    <nav class="bg-gray-900 text-white">
        <!-- First Navbar -->
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#"
                class="text-2xl font-bold text-blue-400 hover:text-blue-500 transition duration-200 ease-in-out">Drive &
                Loc</a>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-blue-400 transition duration-200">Cars</a></li>
                <li><a href="#" class="hover:text-blue-400 transition duration-200">About Us</a></li>
                <li><a href="#" class="hover:text-blue-400 transition duration-200">Contact</a></li>
            </ul>
            <div class="flex space-x-4">
                <a href="register.php"
                    class="text-white bg-gray-800 border-2 border-blue-400 hover:bg-blue-400 hover:text-gray-900 hover:border-blue-500 px-6 py-2 rounded-md shadow-md transition duration-200 ease-in-out">Register</a>
                <a href="login.php"
                    class="bg-gradient-to-r from-blue-500 to-blue-600 text-white hover:from-blue-600 hover:to-blue-700 px-6 py-2 rounded-md shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out">Login</a>
            </div>
        </div>

        <script>
            function showCars(str) {
                console.log(str);
                if (str == "") {
                    document.getElementById("cars").innerHTML = "";
                    return;
                } else {
                    document.getElementById("cars").innerHTML = "";

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("cars").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "readByCategorie.php?q=" + str, true);
                    xmlhttp.send();
                }
            }

        </script>






        <!-- Second Navbar with Search Bar and Category Dropdown -->
        <div class="bg-gray-800 text-white py-4 px-6">
            <div class="container mx-auto flex justify-between items-center space-x-4">
                <!-- Search Bar -->
                <div class="w-1/2">
                    <input type="text" placeholder="Search for cars..."
                        class="w-full py-2 px-4 rounded-md bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <!-- Dropdown -->
                <div class="w-1/3">
                    <select id="category" name="category" onchange="showCars(this.value)"
                        class="w-full py-2 px-4 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 ease-in-out">
                        <option value="" disabled selected class="text-gray-400">Select a category</option>
                        <?php
                        foreach ($read->read() as $result) {
                            echo '<option value="' . $result['id'] . '">' . $result['categorie'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </nav>








    <!-- Car Display Section -->
    <div class="container mx-auto px-6 py-8">
    <div class="flex flex-wrap gap-3 categorie"></div>
        <div class="flex flex-wrap gap-3" id="cars">
            <?php foreach ($cars as $car): ?>
                <div
                    class="max-w-sm bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl m-4">
                    <div class="relative">
                        <img class="w-full h-56 object-cover"
                            src="<?php echo htmlspecialchars($car['image_url'] ?? 'default-car.jpg'); ?>"
                            alt="<?php echo htmlspecialchars($car['model']); ?>">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>

                    <div class="p-6 space-y-4">
                        <h3
                            class="text-2xl font-bold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
                            <?php echo htmlspecialchars($car['model']); ?>
                        </h3>

                        <p class="text-black text-sm leading-relaxed">
                            <?php echo htmlspecialchars($car['description']); ?>
                        </p>

                        <!-- Login prompt for non-registered users -->
                        <a href="login.php" class="block">
                            <button
                                class="w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:from-indigo-600 hover:via-purple-600 hover:to-pink-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                                Login to Book
                            </button>
                        </a>
                    </div>

                    <div class="h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>
<?php
require_once "../../classes/conn.php";
require_once "../../classes/cars.php";
$categorie = intval($_GET['q']);



$car = new Cars($conn);

$data=$car->readCategorie($categorie);


foreach ($data as $car): ?>
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
<?php endforeach;
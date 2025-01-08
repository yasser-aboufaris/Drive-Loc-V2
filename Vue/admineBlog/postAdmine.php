<?php 
include "../../classes/posts.php";
include "../../classes/themes.php"; 
include "../../classes/conn.php"; 

// Create reservation instance
$posts = new Posts($conn);

// Get all reservations
$allposts = $posts->getAllPosts();


// Handle actions if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept']) && isset($_POST['id'])) {
        $reservation->accept($_POST['id']);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    if (isset($_POST['delete']) && isset($_POST['id'])) {
        $reservation->delete($_POST['id']);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Calculate statistics
$totalposts = count($allposts);
$acceptedposts = count(array_filter($allposts, function($r) {
    return $r['status'] === 'accepted';
}));
$pendingposts = count(array_filter($allposts, function($r) {
    return $r['status'] === 'waiting';
}));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white h-screen p-5 fixed">
            <h2 class="text-2xl font-bold mb-5">Car Rental Admin</h2>
            <ul>
                <li class="mb-4"><a href="#" class="hover:text-gray-400">Dashboard</a></li>
                <li class="mb-4"><a href="#" class="hover:text-gray-400">Reservations</a></li>
                <li class="mb-4"><a href="#" class="hover:text-gray-400">Users</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-10">
            <h1 class="text-3xl font-bold mb-8">Reservations Dashboard</h1>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-3 gap-5 mb-10">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Total posts</h3>
                    <p class="text-3xl"><?php echo $totalposts; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Accepted posts</h3>
                    <p class="text-3xl text-green-600"><?php echo $acceptedposts; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Pending posts</h3>
                    <p class="text-3xl text-yellow-600"><?php echo $pendingposts; ?></p>
                </div>
            </div>

            <!-- Reservations Table -->
            <div class="bg-white rounded-lg shadow p-4 max-w-5xl mx-auto">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-3">
        <h3 class="text-lg font-semibold text-gray-800">Recent posts</h3>
        <div class="flex gap-2 text-xs">
            <span class="flex items-center px-2 py-0.5 rounded-full bg-green-50 text-green-700">
                <div class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></div>
                Active
            </span>
            <span class="flex items-center px-2 py-0.5 rounded-full bg-yellow-50 text-yellow-700">
                <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5"></div>
                Pending
            </span>
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto rounded-md border border-gray-100">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">ID</th>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Car</th>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Client</th>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Desc</th>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Theme</th>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Status</th>
                    <th class="px-3 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100 text-sm">
                <?php foreach($allposts as $res): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-3 py-2 whitespace-nowrap font-medium text-gray-900"><?php echo htmlspecialchars($res['id_post']); ?></td>
                    <td class="px-3 py-2 whitespace-nowrap text-gray-600"><?php echo htmlspecialchars($res['id_theme']); ?></td>
                    <td class="px-3 py-2 whitespace-nowrap text-gray-600"><?php echo htmlspecialchars($res['id_user']); ?></td>
                    <td class="px-3 py-2 whitespace-nowrap text-gray-600"><?php echo htmlspecialchars($res['description']); ?></td>
                    <td class="px-3 py-2 whitespace-nowrap text-gray-600"><?php echo htmlspecialchars($res['id_user']); ?></td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        <span class="inline-flex px-2 py-0.5 rounded-full text-xs font-medium <?php echo $res['status'] === 'accepted' ? 'bg-green-50 text-green-700' : 'bg-yellow-50 text-yellow-700'; ?>">
                            <?php echo htmlspecialchars($res['status']); ?>
                        </span>
                    </td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        <div class="flex gap-1">
                            <?php if($res['status'] === 'waiting'): ?>
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?php echo $res['id_post']; ?>">
                                <button type="submit" name="accept" class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-green-500 text-white hover:bg-green-600 focus:ring-2 focus:ring-offset-1 focus:ring-green-500">
                                    Accept
                                </button>
                            </form>
                            <?php endif; ?>
                            <form method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                <input type="hidden" name="id" value="<?php echo $res['id_post']; ?>">
                                <button type="submit" name="delete" class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-red-500 text-white hover:bg-red-600 focus:ring-2 focus:ring-offset-1 focus:ring-red-500">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
        </div>
    </div>
</body>
</html>
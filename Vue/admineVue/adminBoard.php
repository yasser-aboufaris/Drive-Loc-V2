<?php 
include "../../classes/reservation.php"; 
include "../../classes/conn.php"; 

// Create reservation instance
$reservation = new Reservation($conn);

// Get all reservations
$allReservations = $reservation->getAllReservations();


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
$totalReservations = count($allReservations);
$acceptedReservations = count(array_filter($allReservations, function($r) {
    return $r['status'] === 'accepted';
}));
$pendingReservations = count(array_filter($allReservations, function($r) {
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
                    <h3 class="text-xl font-semibold mb-4">Total Reservations</h3>
                    <p class="text-3xl"><?php echo $totalReservations; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Accepted Reservations</h3>
                    <p class="text-3xl text-green-600"><?php echo $acceptedReservations; ?></p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Pending Reservations</h3>
                    <p class="text-3xl text-yellow-600"><?php echo $pendingReservations; ?></p>
                </div>
            </div>

            <!-- Reservations Table -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Recent Reservations</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left">ID</th>
                                <th class="py-3 px-4 text-left">Car ID</th>
                                <th class="py-3 px-4 text-left">Client ID</th>
                                <th class="py-3 px-4 text-left">Start Date</th>
                                <th class="py-3 px-4 text-left">End Date</th>
                                <th class="py-3 px-4 text-left">Status</th>
                                <th class="py-3 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($allReservations as $res): ?>
                            <tr class="border-t">
                                <td class="py-3 px-4"><?php echo htmlspecialchars($res['id_reservation']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($res['id_car']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($res['id_client']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($res['start_day']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($res['end_day']); ?></td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded-full text-sm <?php echo $res['status'] === 'accepted' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                                        <?php echo htmlspecialchars($res['status']); ?>
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <?php if($res['status'] === 'waiting'): ?>
                                        <form method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?php echo $res['id_reservation']; ?>">
                                            <button type="submit" name="accept" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                                Accept
                                            </button>
                                        </form>
                                        <?php endif; ?>
                                        <form method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                            <input type="hidden" name="id" value="<?php echo $res['id_reservation']; ?>">
                                            <button type="submit" name="delete" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
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
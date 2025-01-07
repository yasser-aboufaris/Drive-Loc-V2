<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Dashboard Wrapper -->
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white">
      <div class="p-4">
        <h1 class="text-2xl font-bold">Admin Dashboard</h1>
      </div>
      <nav class="mt-6">
        <ul>
          <li class="mb-2">
            <a href="#" class="block p-3 rounded-lg hover:bg-blue-800">Users</a>
          </li>
          <li class="mb-2">
            <a href="#" class="block p-3 rounded-lg hover:bg-blue-800">Reports</a>
          </li>
          <li class="mb-2">
            <a href="#" class="block p-3 rounded-lg hover:bg-blue-800">Settings</a>
          </li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <h2 class="text-2xl font-semibold text-gray-700 mb-6">User Management</h2>

      <!-- User Table -->
      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-gray-200">
              <th class="p-4 border-b">ID</th>
              <th class="p-4 border-b">Name</th>
              <th class="p-4 border-b">Email</th>
              <th class="p-4 border-b">Date</th>
              <th class="p-4 border-b">Status</th>
              <th class="p-4 border-b">Actions</th>
            </tr>
          </thead>
          <tbody id="user-table">
            <!-- Dynamic User Rows -->
            <tr>
              <td class="p-4 border-b">1</td>
              <td class="p-4 border-b">John Doe</td>
              <td class="p-4 border-b">johndoe@example.com</td>
              <td class="p-4 border-b">2025-01-05</td>
              <td class="p-4 border-b text-green-600">Pending</td>
              <td class="p-4 border-b">
                <button class="bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-green-600">Accept</button>
                <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

</body>
</html>

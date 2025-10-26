<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel | Volunteering Website</title>
  <link rel="stylesheet" href="dist/output.css">
</head>
<body class="bg-gray-50 text-gray-900">
  <main class="max-w-7xl mx-auto px-4 py-8" role="main">
    <h1 class="text-3xl font-bold text-blue-700 mb-4">Admin Panel</h1>
    <p class="text-gray-700">Manage users, approve organizations, and monitor site activity here.</p>
  </main>
</body>
</html>

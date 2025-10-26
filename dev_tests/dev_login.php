<?php
// ⚠️ DEV-ONLY LOGIN (DO NOT USE IN PRODUCTION)
session_start();
include('php/db_connect.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check plain text password
        if (!empty($user['dev_plain']) && $password === $user['dev_plain']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid password (DEV login).";
        }
    } else {
        $error = "No user found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dev Login (Insecure)</title>
  <link rel="stylesheet" href="dist/output.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-red-600">⚠️ Dev Login (Insecure)</h2>

    <?php if (!empty($error)): ?>
      <div class="bg-red-100 text-red-700 p-3 mb-4 rounded text-center">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-4">
        <label for="email" class="block text-gray-700 mb-1">Email</label>
        <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700 mb-1">Password</label>
        <input type="password" name="password" id="password" class="w-full p-2 border rounded" required>
      </div>
      <button class="bg-red-600 text-white w-full py-2 rounded hover:bg-red-700">
        Dev Login
      </button>
    </form>
  </div>
</body>
</html>

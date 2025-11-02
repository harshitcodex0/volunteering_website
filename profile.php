<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

// Example data (can be replaced with database values)
$user = [
  "name" => isset($_SESSION['user_name']) ? $_SESSION['user_name'] : "John Doe",
  "email" => "johndoe@example.com",
  "role" => "Volunteer",
  "joined" => "March 2025",
  "location" => "Manipal, Karnataka, India",
  "bio" => "Passionate about community service and helping others. Believes in teamwork, empathy, and positive impact."
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>VolunTribe - Profile</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- Header -->
  <header class="header fixed top-0 w-full bg-white shadow-md z-50">
    <nav class="nav container mx-auto flex justify-between items-center px-6 py-4">
      <a href="index.php" class="text-2xl font-bold text-blue-700">VolunTribe</a>

      <div class="hidden md:flex space-x-6">
        <a href="index.php" class="text-gray-700 hover:text-blue-600">Home</a>
        <a href="about.php" class="text-gray-700 hover:text-blue-600">About</a>
        <a href="event.php" class="text-gray-700 hover:text-blue-600">Events</a>
        <a href="gallery.php" class="text-gray-700 hover:text-blue-600">Gallery</a>
        <a href="contact.php" class="text-gray-700 hover:text-blue-600">Contact</a>
      </div>

      <div class="relative">
        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=100&h=100&fit=crop"
             alt="Profile"
             class="w-10 h-10 rounded-full border-2 border-blue-600 cursor-pointer object-cover"
             id="profile-toggle">

        <div id="dropdown-menu"
             class="absolute right-0 mt-3 w-48 bg-white rounded-lg shadow-lg hidden opacity-0 scale-95 transform transition-all duration-200 origin-top-right">
          <a href="profile.php" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class='bx bx-user text-blue-600'></i> <span>Profile</span>
          </a>
          <a href="logout.php" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
            <i class='bx bx-log-out text-blue-600'></i> <span>Logout</span>
          </a>
        </div>
      </div>
    </nav>
  </header>

  <!-- Profile Section -->
  <section class="pt-28 pb-20">
    <div class="container mx-auto px-6 max-w-5xl">
      <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <!-- Top Banner -->
        <div class="h-48 bg-gradient-to-r from-indigo-500 to-blue-600"></div>

        <!-- Profile Card -->
        <div class="px-6 pb-10 -mt-16 flex flex-col items-center">
          <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=150&h=150&fit=crop"
               alt="User Profile"
               class="w-32 h-32 rounded-full border-4 border-white shadow-md object-cover mb-4">

          <h2 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($user['name']); ?></h2>
          <p class="text-gray-500"><?= htmlspecialchars($user['email']); ?></p>
          <p class="text-indigo-600 font-medium mt-1"><?= htmlspecialchars($user['role']); ?></p>

          <!-- Info Grid -->
          <div class="grid sm:grid-cols-2 gap-6 mt-8 w-full max-w-3xl text-center">
            <div class="p-4 rounded-xl bg-gray-100 shadow-sm">
              <i class='bx bx-map text-indigo-600 text-2xl'></i>
              <h4 class="text-sm font-semibold mt-2 text-gray-700">Location</h4>
              <p class="text-gray-500 text-sm"><?= htmlspecialchars($user['location']); ?></p>
            </div>
            <div class="p-4 rounded-xl bg-gray-100 shadow-sm">
              <i class='bx bx-calendar text-indigo-600 text-2xl'></i>
              <h4 class="text-sm font-semibold mt-2 text-gray-700">Joined</h4>
              <p class="text-gray-500 text-sm"><?= htmlspecialchars($user['joined']); ?></p>
            </div>
          </div>

          <!-- Bio Section -->
          <div class="mt-8 max-w-3xl text-center">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">About Me</h3>
            <p class="text-gray-600 leading-relaxed"><?= htmlspecialchars($user['bio']); ?></p>
          </div>

          <!-- Buttons -->
          <div class="mt-8 flex flex-col gap-3 w-48">
            <button class="bg-indigo-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-indigo-700 transition shadow-md">
              Edit Profile
            </button>

            <!-- Logout Button -->
            <form action="logout.php" method="POST">
              <button type="submit"
                class="w-full bg-red-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-red-700 transition shadow-md">
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-100 py-10 mt-10">
    <div class="container mx-auto px-6 text-center text-gray-600 text-sm">
      <p>© 2025 VolunTribe. All rights reserved.</p>
      <div class="flex justify-center gap-4 mt-3">
        <a href="#" class="hover:text-blue-600"><i class="bx bxl-twitter text-lg"></i></a>
        <a href="#" class="hover:text-blue-600"><i class="bx bxl-instagram text-lg"></i></a>
        <a href="#" class="hover:text-blue-600"><i class="bx bxl-facebook text-lg"></i></a>
      </div>
    </div>
  </footer>

  <!-- JS -->
  <script>
    const profileToggle = document.getElementById("profile-toggle");
    const dropdownMenu = document.getElementById("dropdown-menu");
    if (profileToggle && dropdownMenu) {
      profileToggle.addEventListener("click", (e) => {
        e.stopPropagation();
        dropdownMenu.classList.toggle("hidden");
        dropdownMenu.classList.toggle("opacity-0");
        dropdownMenu.classList.toggle("scale-95");
      });
      document.addEventListener("click", (e) => {
        if (!profileToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
          dropdownMenu.classList.add("hidden", "opacity-0", "scale-95");
        }
      });
    }
  </script>
</body>
</html>

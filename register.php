<?php
include('php/db_connect.php');
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $confirm = trim($_POST['confirm']);

  if ($password !== $confirm) {
    $message = "❌ Passwords do not match.";
  } else {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $email); $stmt->execute(); $res = $stmt->get_result(); if
($res->num_rows > 0) { $message = "⚠️ Email already registered."; } else { $stmt
= $conn->prepare("INSERT INTO users (name,email,password,role) VALUES
(?,?,?,'user')"); $stmt->bind_param("sss", $name, $email, $password); if
($stmt->execute()) { $message = "✅ Registration successful! You can now log
in."; } else { $message = "❌ Something went wrong. Try again."; } } } } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | Volunteering Website</title>
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="dist/styles.css" />
  </head>
  <body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <main role="main" class="w-full flex items-center justify-center p-4">
      <!-- registration container -->
      <section
        class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl w-full p-5 items-center"
        aria-labelledby="register-heading"
      >
        <!-- form -->
        <div class="md:w-1/2 px-8 md:px-16">
          <h1 id="register-heading" class="font-bold text-2xl text-[#002D74]">
            Create Account
          </h1>
          <p class="text-xs mt-2 text-[#002D74]">
            Join us today and start making a difference!
          </p>

          <?php if (!empty($message)): ?>
          <div
            role="alert"
            class="bg-yellow-100 text-gray-800 p-3 mt-4 mb-4 rounded text-center font-medium"
          >
            <?= htmlspecialchars($message) ?>
          </div>
          <?php endif; ?>

          <form
            method="POST"
            class="flex flex-col gap-4 mt-6"
            aria-label="Registration form"
            novalidate
          >
            <!-- Full Name -->
            <div class="inputGroup">
              <input
                id="name"
                name="name"
                type="text"
                required
                autocomplete="name"
                aria-required="true"
              />
              <label for="name">Full Name</label>
            </div>

            <!-- Email -->
            <div class="inputGroup">
              <input
                id="email"
                name="email"
                type="email"
                required
                autocomplete="email"
                aria-required="true"
              />
              <label for="email">Email</label>
            </div>

            <!-- Password -->
            <div class="inputGroup">
              <input
                id="password"
                name="password"
                type="password"
                required
                autocomplete="new-password"
                aria-required="true"
              />
              <label for="password">Password</label>
            </div>

            <!-- Confirm Password -->
            <div class="inputGroup">
              <input
                id="confirm"
                name="confirm"
                type="password"
                required
                autocomplete="new-password"
                aria-required="true"
              />
              <label for="confirm">Confirm Password</label>
            </div>

            <button type="submit" class="animated-button">
              <svg
                viewBox="0 0 24 24"
                class="arr-2"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
              </svg>
              <span class="text">Register</span>
              <span class="circle"></span>
              <svg
                viewBox="0 0 24 24"
                class="arr-1"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
              </svg>
            </button>
          </form>

          <div
            class="mt-6 grid grid-cols-3 items-center text-gray-400"
            aria-hidden="true"
          >
            <hr class="border-gray-400" />
            <p class="text-center text-sm">OR</p>
            <hr class="border-gray-400" />
          </div>

          <div
            class="mt-3 text-xs flex justify-between items-center text-[#002D74]"
          >
            <p>Already have an account?</p>
            <a
              href="login.php"
              class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300 focus:ring-2 focus:ring-offset-2 focus:ring-[#002D74]"
            >
              Login
            </a>
          </div>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2">
          <img
            src="./src/images/loginimg.jpg"
            alt="Volunteers working together"
            class="rounded-2xl w-full h-full object-cover"
          />
        </div>
      </section>
    </main>
  </body>
</html>

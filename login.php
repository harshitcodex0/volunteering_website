<?php
session_start();
include('php/db_connect.php');

$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Plain-text password comparison (for local demo).
        // If your DB stores hashed passwords, replace the line below with password_verify().
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Volunteering Website</title>
    <link rel="stylesheet" href="dist/output.css" />
    <link rel="stylesheet" href="dist/styles.css" />
  </head>
  <body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <main role="main" class="w-full flex items-center justify-center p-4">
      <!-- login container -->
      <section
        class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl w-full p-5 items-center"
        aria-labelledby="login-heading"
      >
        <!-- form -->
        <div class="md:w-1/2 px-8 md:px-16">
          <h1 id="login-heading" class="font-bold text-2xl text-[#003153]">
            Login
          </h1>
          <p class="text-xs mt-2 text-[#003153]">
            If you are already a member, easily log in
          </p>

          <?php if (!empty($error)): ?>
          <div
            role="alert"
            class="bg-red-100 text-red-700 p-3 mt-4 mb-4 rounded text-center font-medium"
          >
            <span class="sr-only">Error:</span>
            <?= htmlspecialchars($error) ?>
          </div>
          <?php endif; ?>

          <form
            action=""
            method="POST"
            class="flex flex-col gap-4 mt-6"
            aria-label="Login form"
          >
            <!-- <label for="email" class="sr-only">Email</label>
          <input id="email" name="email" type="email" placeholder="Email" required
                 class="p-2 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#003153]"
                 autocomplete="username" aria-required="true"> -->

            <div class="inputGroup">
              <input
                id="email"
                name="email"
                type="email"
                required
                autocomplete="username"
                aria-required="true"
              />
              <label for="email">Email</label>
            </div>

            <div class="relative">
              <div class="inputGroup">
                <input
                  id="password"
                  name="password"
                  type="password"
                  required
                  autocomplete="current-password"
                  aria-required="true"
                />
                <label for="password">Password</label>
              </div>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="gray"
                class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2"
                viewBox="0 0 16 16"
                aria-hidden="true"
              >
                <path
                  d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"
                />
                <path
                  d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"
                />
              </svg>
            </div>

            <!-- <button type="submit"
                  class="bg-[#003153] rounded-xl text-white py-2 hover:scale-105 duration-300 focus:ring-2 focus:ring-offset-2 focus:ring-[#003153]"
                  aria-label="Login button">
            Login
          </button>
 -->

            <button class="animated-button">
              <svg
                viewBox="0 0 24 24"
                class="arr-2"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"
                ></path>
              </svg>
              <span class="text">Login</span>
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
            class="mt-3 text-xs flex justify-between items-center text-[#003153]"
          >
            <p>Don't have an account?</p>
            <a
              href="register.php"
              class="py-2 px-5 bg-white border rounded-xl hover:scale-110 duration-300 focus:ring-2 focus:ring-offset-2 focus:ring-[#003153]"
            >
              Register
            </a>
          </div>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2">
          <img
            src="./src/images/loginimg.jpg"
            alt="People volunteering together"
            class="rounded-2xl w-full h-full object-cover"
          />
        </div>
      </section>
    </main>
  </body>
</html>

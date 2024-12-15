<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';


if (isset($_SESSION["full_name"])) {
    header("Location: index.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: users/index.php");
    exit;
}


$users = new Users();

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $users->login($email, $password);

    if (gettype($result) == "string") {
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `{$result}`,
            });
            });
            </script>";
    } else {
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() { 
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Anda berhasil Login!',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(() => {
                window.location.href = 'index.php'
                },2000)
            });
            </script>";
    }
}


?>


<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Windmill Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./../assets/css/tailwind.output.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="./../assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div
            class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <!-- Image Section -->
                <div class="h-32 md:h-auto md:w-1/2">
                    <img
                        aria-hidden="true"
                        class="object-cover w-full h-full dark:hidden"
                        src="./../assets/img/login-office.jpeg"
                        alt="Office" />
                    <img
                        aria-hidden="true"
                        class="hidden object-cover w-full h-full dark:block"
                        src="./../assets/img/login-office-dark.jpeg"
                        alt="Office" />
                </div>
                <!-- Form Section -->
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Login
                        </h1>
                        <form action="" method="post">
                            <!-- Email -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input
                                    type="email"
                                    name="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="example@email.com"
                                    required />
                            </label>
                            <!-- Password -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input
                                    type="password"
                                    name="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="••••••••"
                                    required />
                            </label>
                            <!-- Submit Button -->
                            <button
                                name="submit"
                                type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Log in
                            </button>
                        </form>

                        <!-- Register Link -->
                        <p class="mt-1">
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="register.php">
                                Create account
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
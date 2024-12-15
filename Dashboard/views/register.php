<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

$users = new Users();

if (isset($_POST["submit"])) {
    $datas = [
        "post" => $_POST,
        "files" => $_FILES,
    ];

    $result = $users->register($datas);

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
                    title: 'Yeay Anda Berhasil Registrasi',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(() => {
                window.location.href = 'login.php'
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
    <title>Register - Windmill Dashboard</title>
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
                        src="./../assets/img/register-office.jpeg"
                        alt="Office" />
                    <img
                        aria-hidden="true"
                        class="hidden object-cover w-full h-full dark:block"
                        src="./../assets/img/login-office.jpeg"
                        alt="Office" />
                </div>
                <!-- Form Section -->
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Create Account
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- Full Name -->
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                                <input
                                    type="text"
                                    name="full_name"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="John Doe"
                                    required />
                            </label>
                            <!-- Email -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input
                                    type="email"
                                    name="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="example@email.com"
                                    required />
                            </label>
                            <!-- Phone Number -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Phone Number</span>
                                <input
                                    type="tel"
                                    name="phone"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="+62 812-3456-7890"
                                    required />
                            </label>
                            <!-- Gender -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Gender</span>
                                <select
                                    name="gender"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select p-3">
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Role</span>
                                <select
                                    name="role"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select p-3">
                                    <option value="author">Author</option>
                                    <option value="user">User</option>
                                </select>
                            </label>
                            <!-- Job -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Pekerjaan</span>
                                <input
                                    type="text"
                                    name="job"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="Masukan Pekerjaan Anda"
                                    required />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Gender</span>
                                <select
                                    name="gender"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-select p-3">
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </select>
                            </label>
                            <!-- Bio -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Bio</span>
                                <textarea
                                    name="bio"
                                    rows="4"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-textarea p-3"
                                    placeholder="Tell us a little about yourself..."
                                    required></textarea>
                            </label>
                            <!-- Avatar -->
                            <div>
                                <label
                                    for="file_upload"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Upload Avatar
                                </label>
                                <div class="mt-2 flex items-center">
                                    <label
                                        for="file_upload"
                                        class="flex items-center justify-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-lg shadow-md cursor-pointer hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 mr-2"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                fill-rule="evenodd"
                                                d="M4 3a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V3zm3 0a1 1 0 000 2h6a1 1 0 100-2H7zM5 16h10v1a1 1 0 01-1 1H6a1 1 0 01-1-1v-1zm2-8a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Pilih File
                                    </label>
                                    <input
                                        id="file_upload"
                                        name="avatar"
                                        type="file"
                                        class="hidden">
                                    <span id="file_name" class="ml-3 text-sm text-gray-600 dark:text-gray-400">
                                        Tidak ada file yang dipilih
                                    </span>
                                </div>
                            </div>
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
                            <!-- Confirm Password -->
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                                <input
                                    type="password"
                                    name="confirm_password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input p-3"
                                    placeholder="••••••••"
                                    required />
                            </label>
                            <!-- Submit Button -->
                            <button
                                name="submit"
                                type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Register
                            </button>
                        </form>
                        <!-- Login Link -->
                        <p class="mt-4">
                            <a
                                class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="login.php">
                                Already have an account? Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const fileInput = document.getElementById('file_upload');
        const fileName = document.getElementById('file_name');

        fileInput.addEventListener('change', () => {
            fileName.textContent = fileInput.files[0].name
            if (fileInput == String) {
                fileName.textContent = "Tidak ada file yang dipilih"
            }
        });
    </script>
</body>

</html>
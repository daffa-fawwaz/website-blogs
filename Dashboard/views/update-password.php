<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}
$users = new Users();
$id = $_SESSION["id_user"];

if (isset($_POST["submit"])) {
    $old_pass = $_POST["old_pass"];
    $new_pass = $_POST["new_pass"];
    $confirm_pass = $_POST["confirm_pass"];

    $result = $users->update_pass($id, $new_pass, $old_pass, $confirm_pass);

    if (gettype($result) == "string") {
        echo "<script>alert(`{$result}`);
        </script>";
    } else {
        echo "<script>alert('Password Berhasil Diubah');
        </script>";
    }
}

?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Kategori - Windmill Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../assets/css/tailwind.output.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="../assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }">


        <!-- Sidebar -->
        <?php include('../layouts/sidebar.php') ?>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <?php include('../layouts/header.php') ?>

            <!-- Main Section -->
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto">
                    <!-- Page Title -->
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Ganti Password
                    </h2>

                    <!-- Form Section -->
                    <div class="flex flex-wrap items-center justify-between gap-6">
                        <!-- Illustration Section -->
                        <div class="w-full md:w-[40%]">
                            <img src="../assets/img/login-office.jpeg" alt="Ganti Password" class="w-full h-auto rounded-lg shadow-md" />
                        </div>

                        <!-- Form Section -->
                        <div class="w-full md:w-[55%]">
                            <form action="" method="post" class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800">
                                <!-- Current Password -->
                                <div class="space-y-4">
                                    <div>
                                        <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Password Saat Ini
                                        </label>
                                        <input type="password" id="current_password" name="old_pass" required placeholder="Masukkan password saat ini"
                                            class="mt-1 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>

                                    <!-- New Password -->
                                    <div>
                                        <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Password Baru
                                        </label>
                                        <input type="password" id="new_password" name="new_pass" required placeholder="Masukkan password baru"
                                            class="mt-1 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>

                                    <!-- Confirm New Password -->
                                    <div>
                                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Konfirmasi Password Baru
                                        </label>
                                        <input type="password" id="confirm_password" name="confirm_pass" required placeholder="Konfirmasi password baru"
                                            class="mt-1 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button name="submit" type="submit"
                                    class="mt-6 w-full px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Ganti Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
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

        function logout(event) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "p-3 bg-green-500 text-white ml-2",
                    cancelButton: "p-3 bg-red-500 text-white mr-3"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Apakah anda mau Logout??",
                text: "Klik YES jika ingin logout",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, of course!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        text: "Anda Berhasil Logout",
                        icon: "success"
                    });
                    setTimeout(() => {
                        window.location.href = 'logout.php';
                    }, 1200)
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Anda Gagal Logout",
                        icon: "error"
                    });
                }
            });
        }
    </script>
</body>



</html>
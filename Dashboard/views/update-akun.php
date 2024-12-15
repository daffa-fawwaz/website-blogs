<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Users.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["id_user"];


$user = new Users();
$user_find = $user->find($user_id);

if (isset($_POST["submit"])) {
    $datas = [
        "files" => $_FILES,
        "post" => $_POST
    ];

    $result = $user->update($user_id, $datas);
    if ($result) {
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Akun Berhasil Diubah',
                    showConfirmButton: false,
                    timer: 2000
                });
            });
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en" :class="{ 'theme-dark': dark }" x-data="data()">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Akun</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="../assets/js/init-alpine.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php include('../layouts/sidebar.php') ?>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <?php include('../layouts/header.php') ?>

            <!-- Main Section -->
            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <!-- Page Title -->
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Edit Profil
                    </h2>

                    <!-- Edit Profile Form -->
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800 p-6">
                        <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                            <!-- Avatar -->
                            <div class="flex flex-col items-center">
                                <img id="avatarPreview" class="w-24 h-24 rounded-full" src="./../public/img/users/<?= $user_find[0]["avatar"] ?>" alt="Avatar">
                                <label
                                    for="avatar"
                                    class="mt-4 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 cursor-pointer">
                                    Ganti Foto
                                </label>
                                <input id="avatar" type="file" name="avatar" class="hidden" accept="image/*" onchange="previewAvatar(event)">
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Nama Lengkap
                                </label>
                                <input
                                    id="full_name"
                                    type="text"
                                    name="full_name"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                    value="<?= $user_find[0]["full_name"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Email
                                </label>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    placeholder="Masukkan email"
                                    required
                                    value="<?= $user_find[0]["email"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    No HP
                                </label>
                                <input
                                    id="phone"
                                    type="text"
                                    name="phone"
                                    placeholder="Masukkan nomor HP"
                                    required
                                    value="<?= $user_find[0]["phone"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Job -->
                            <div>
                                <label for="job" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Pekerjaan
                                </label>
                                <input
                                    id="job"
                                    type="text"
                                    name="job"
                                    placeholder="Masukkan pekerjaan anda"
                                    required
                                    value="<?= $user_find[0]["job"] ?>"
                                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            </div>

                            <!-- Bio -->
                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                    Bio
                                </label>
                                <textarea
                                    id="bio"
                                    name="bio"
                                    placeholder="Ceritakan tentang dirimu"
                                    class="mt-1 block w-full h-40 px-4 py-2 text-sm border border-gray-300 rounded-md dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-300 focus:ring-opacity-50"><?= $user_find[0]["bio"] ?></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button
                                name="submit"
                                type="submit"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('avatarPreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

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
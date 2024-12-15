<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Posts.php';
require_once __DIR__ . '/../Model/kategori.php';
require_once __DIR__ . '/../Model/Users.php';
require_once __DIR__ . '/../Model/Tags.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}


$id = $_GET["id"];
$posts = new Posts();
$posts_find = $posts->find($id);
$users = new Users();
$users_all = $users->all();
$category = new Kategori();
$category_all = $category->all();
$tags = new Tags();
$tags_all = $tags->all();

if (isset($_POST["submit"])) {
    $datas = [
        "post" => $_POST,
        "files" => $_FILES
    ];


    $posts = $posts->update($id, $datas);

    if ($posts) {
        echo "<script type='text/javascript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Posts berhasil diubah!',
                    showConfirmButton: false,
                    timer: 2000
                });
                setTimeout(() => {
                window.location.href = 'index-posts.php'
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
                        Tambah Kategori
                    </h2>

                    <!-- Form Section -->
                    <div class="flex flex-wrap items-center justify-between gap-6">
                        <!-- Image Section -->
                        <div class="w-full md:w-[40%]">
                            <img
                                src="../assets/img/kategori.png"
                                alt="Ilustrasi Kategori"
                                class="w-full h-auto rounded-lg shadow-md" />
                        </div>

                        <!-- Form Section -->
                        <div class="w-full md:w-[55%]">
                            <form
                                action=""
                                method="post"
                                class="bg-white p-6 rounded-lg shadow-md dark:bg-gray-800" enctype="multipart/form-data">


                                <!-- Input Group -->
                                <div class="space-y-4">
                                    <!-- Nama Kategori -->
                                    <div>
                                        <label
                                            for="title"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Judul
                                        </label>
                                        <input
                                            type="text"
                                            id="title"
                                            name="title"
                                            value="<?= $posts_find[0]["title"] ?>"
                                            placeholder="Masukkan judul"
                                            required
                                            class="mt-1 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>

                                    <!-- Total Artikel -->
                                    <div>
                                        <label
                                            for="content"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Konten
                                        </label>
                                        <textarea
                                            id="content"
                                            name="content"
                                            placeholder="Masukkan konten"
                                            required
                                            class="mt-1 h-52 block w-full px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40"><?= $posts_find[0]["content"] ?></textarea>
                                    </div>
                                    <div>
                                        <label
                                            for="file_upload"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Upload Gambar
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
                                                name="attachment"
                                                value="<?= $posts_find[0]["attachment"] ?>"
                                                type="file"
                                                class="hidden">

                                            <span id="file_name" class="ml-3 text-sm text-gray-600 dark:text-gray-400">
                                                <?= $posts_find[0]["attachment"] ?>
                                            </span>
                                        </div>
                                    </div>


                                    <div class="mt-4">
                                        <label
                                            for="category_select"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Pilih Author
                                        </label>
                                        <select
                                            id="category_select"
                                            name="user_id"
                                            required
                                            class="mt-1 block w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                            <?php foreach ($users_all as $users): ?>
                                                <option value="<?= $users["id_user"] ?>" <?php echo ($users["id_user"] == $posts_find[0]["user_id"]) ? ' selected="selected"' : '' ?>><?= $users["full_name"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mt-4">
                                        <label
                                            for="category_select"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                            Pilih Kategori
                                        </label>
                                        <select
                                            id="category_select"
                                            name="category_id"
                                            required
                                            class="mt-1 block w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-md text-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40">
                                            <?php foreach ($category_all as $category): ?>
                                                <option value="<?= $category["id_category"] ?>" <?php echo ($category["id_category"] == $posts_find[0]["category_id"]) ? 'selected="selected"' : '' ?>><?= $category["name_category"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                                <label for="tags" class="mt-5 block text-sm font-medium text-gray-700 dark:text-gray-200">Masukan Tags</label>
                                <select id="tags" name="tag_id_pivot[]" multiple="multiple" data-hs-select='{
                                        "placeholder": "Select multiple options...",
                                        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                        "toggleCountText": "selected",
                                        "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }' class="hidden">

                                    <?php foreach ($tags_all as $tags): ?>
                                        <option value="<?= $tags["id_tag"] ?>"><?= $tags["name_tag"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- Submit Button -->
                                <button
                                    name="submit"
                                    type="submit"
                                    class="mt-6 w-full px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Tambah
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./../node_modules/preline/dist/preline.js"></script>
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
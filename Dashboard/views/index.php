<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Kategori.php';
require_once __DIR__ . '/../Model/Posts.php';
require_once __DIR__ . '/../Model/Tags.php';
require_once __DIR__ . '/../Model/Users.php';
require_once __DIR__ . '/../Model/Blogs.php';

if (!isset($_SESSION["full_name"])) {
    header("Location: login.php");
    exit;
}



$category = new Kategori();
$posts = new Posts();
$posts_all = $posts->all();
$tags = new Tags();
$users = new Users();
$user_author = $users->author_all();
$blogs = new Blogs();
$limit = 5;
$halamanAktif = (isset($_GET["page"]) ? $_GET["page"] : 1);
$startData = ($limit * $halamanAktif) - $limit;
$lenght = count($posts->all());
$countPage = ceil($lenght / $limit);
$blogs_all = $blogs->all_with_tags($startData, $limit);

$nama_kategori = $category->all();
$label_kategori = array_map(function ($kategori) {
    return $kategori['name_category'];
}, $nama_kategori);

$jumlah_kategori = [];

foreach ($label_kategori as $label) {
    $jumlah_kategori[] = count($category->count_cat($label));
}


$no = 1;

?>




<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HSI Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./../assets/css/tailwind.output.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>
    <script src="./../assets/js/init-alpine.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        defer></script>
    <script src="./../assets/js/charts-lines.js" defer></script>
    <!-- <script src="./../assets/js/charts-bars.js" defer></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="./../assets/js/theme.js"></script>


</head>


<body>
    <div
        class="flex h-screen bg-gray-50 dark:bg-gray-900"
        :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- sidebar -->
        <?php include('../layouts/sidebar.php') ?>

        <div class="flex flex-col flex-1 w-full">
            <!-- HEADER START -->
            <?php include('../layouts/header.php') ?>
            <!-- HEADER END -->
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2
                        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Dashboard
                    </h2>

                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Total Kategori
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?= count($category->all()) ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Total Posts
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?= count($posts->all()) ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Total Tags
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?= count($tags->all()) ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Total Author
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?= count($user_author) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Kategori</th>
                                        <th class="px-4 py-3">Judul</th>
                                        <th class="px-4 py-3">Author</th>
                                        <th class="px-4 py-3">Tags</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php $no = 1 + $startData ?>
                                    <?php foreach ($blogs_all as $blogs): ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3"><?= $no ?></td>
                                            <td class="px-4 py-3">
                                                <?= $blogs["name_category"] ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $blogs["title"] ?>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <?= $blogs["author"] ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $blogs["tags"] ?>
                                            </td>
                                        </tr>
                                        <?php $no++ ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <div
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing <?= count($blogs_all) ?>
                            </span>
                            <span class="col-span-2"></span>
                            <!-- Pagination -->
                            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                <nav aria-label="Table navigation">
                                    <ul class="inline-flex items-center">
                                        <li>
                                            <?php if ($halamanAktif > 1): ?>

                                                <a href="?page=<?= $halamanAktif - 1 ?>">
                                                    <button
                                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Previous">
                                                        <svg
                                                            class="w-4 h-4 fill-current"
                                                            aria-hidden="true"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"
                                                                fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </a>
                                            <?php else: ?>
                                                <a href="">
                                                    <button
                                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Previous">
                                                        <svg
                                                            class="w-4 h-4 fill-current"
                                                            aria-hidden="true"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"
                                                                fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                        <?php for ($i = 1; $i <= $countPage; $i++): ?>
                                            <?php if ($i == $halamanAktif): ?>
                                                <a href="?page=<?= $i ?>">
                                                    <button
                                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 focus:shadow-outline-purple">
                                                        <?= $i ?>
                                                    </button>
                                                </a>
                                            <?php else: ?>
                                                <a href="?page=<?= $i ?>">
                                                    <button
                                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple ">
                                                        <?= $i ?>
                                                    </button>
                                                </a>
                                            <?php endif; ?>
                                            <li>
                                            </li>
                                        <?php endfor; ?>
                                        <li>
                                            <?php if ($halamanAktif < $countPage): ?>
                                                <a href="?page=<?= $halamanAktif + 1 ?>">
                                                    <button
                                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Next">
                                                        <svg
                                                            class="w-4 h-4 fill-current"
                                                            aria-hidden="true"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd"
                                                                fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </a>
                                            <?php else: ?>
                                                <a href="">
                                                    <button
                                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Next">
                                                        <svg
                                                            class="w-4 h-4 fill-current"
                                                            aria-hidden="true"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd"
                                                                fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </nav>
                            </span>
                        </div>
                    </div>


                    <div
                        class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mt-10">
                        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                            Bars
                        </h4>
                        <canvas id="bars"></canvas>
                        <div
                            class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                            <!-- Chart legend -->
                            <div class="flex items-center">
                                <span
                                    class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                                <span>Posts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const ctx = document.getElementById('bars').getContext('2d');
            const barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($label_kategori) ?>,
                    datasets: [{
                        label: 'Posts',
                        data: <?= json_encode($jumlah_kategori) ?>,
                        backgroundColor: [
                            '#1E90FF', '#00BFFF', '#87CEFA', '#4682B4', '#5F9EA0', '#6495ED', '#7B68EE'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 5
                            }
                        }]
                    },
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: 'Posts Category'
                    }
                }
            });
        });
    </script>
    <script>
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

        function alert(e) {
            e.preventDefault();
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Anda Tidak Memiliki Akses",
            });
        }
    </script>
</body>

</html>
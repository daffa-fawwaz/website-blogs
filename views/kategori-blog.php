<?php
require_once __DIR__ . '/../Dashboard/Model/Model.php';
require_once __DIR__ . '/../Dashboard/Model/Users.php';
require_once __DIR__ . '/../Dashboard/Model/Tags.php';
require_once __DIR__ . '/../Dashboard/Model/Kategori.php';
require_once __DIR__ . '/../Dashboard/Model/Blogs.php';
require_once __DIR__ . '/../Model/Blogs_new.php';

$cat = $_GET["cat"];
$blog_cat = new Blogs_new;
$blogs = $blog_cat->all_cat($cat);
$blogs_new = $blog_cat->all_new(4);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="./output.css" rel="stylesheet"> -->
    <title>Document</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php include('../layouts/navbar.php') ?>
    <section id="search-blog" class="w-full h-full fixed z-50 bg-[#104870] translate-y-full transition-all duration-200 ease-in-out-">
        <div id="close-search" class="absolute top-5 right-5 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" viewBox="0 0 256 256">
                <path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
            </svg>
        </div>
        <div class="flex justify-center items-center h-full">
            <form action="" method="get" class="relative w-[700px]">
                <!-- Icon Search -->
                <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 256 256">
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                </div>

                <input
                    type="text"
                    name="keyword"
                    placeholder="Ketikan Judul Artikel Lalu Enter"
                    class="pl-10 pr-4 py-4 w-full text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-[#ffffff44] placeholder-gray-600">
            </form>
        </div>
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-center flex items-center gap-8">
            <div class="w-44 h-[2px] bg-yellow-500 mx-auto"></div>
            <div class="flex items-center">
                <div class="w-16">
                    <img src="./../img/White Logo 1.png" alt="Logo HSI" class="w-full" />
                </div>
                <h3 class="text-white font-semibold text-xl mt-2 ml-2">HSI NEWS</h3>
            </div>
            <div class="w-44 h-[2px] bg-yellow-500 mx-auto mt-2"></div>
        </div>

        <!-- Form Pencarian -->
        <div class="flex justify-center items-center h-full">
            <form action="" method="get" class="relative w-[700px]">
                <!-- Icon Search -->
                <div class="absolute top-1/2 left-3 transform -translate-y-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                    </svg>
                </div>

                <!-- Input Field -->
                <input
                    type="text"
                    name="keyword"
                    placeholder="Ketikan Judul Artikel Lalu Enter"
                    class="pl-10 pr-4 py-4 w-full text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-[#ffffff44] placeholder-gray-600">
            </form>
        </div>
    </section>

    <div class="h-16 lg:h-32"></div>

    <section class="w-full mt-16">
        <div
            class="container lg:w-[1180px] mx-auto p-4 flex gap-12 flex-col lg:flex-row lg:justify-evenly">
            <div class="flex flex-col flex-grow">
                <div class="title mt-5">
                    <h1 class="text-xl font-bold text-slate-800 mt-5"><?= $cat ?></h1>
                </div>
                <?php foreach ($blogs as $blog): ?>
                    <?php $created_at = date('d F Y', strtotime($blog["created_at"])); ?>
                    <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
                        <div class="content flex lg:flex-row flex-col mt-5 gap-6 pb-8 border-b">
                            <div class="img lg:w-64 w-full flex justify-center">
                                <img src="../Dashboard/public/img/konten/<?= $blog["attachment"] ?>" alt="" class="w-full">
                            </div>

                            <div class="desc flex flex-col lg:w-[470px] w-full">
                                <h2 class="text-sm text-[#104870]"><?= $blog["name_category"] ?></h2>
                                <p class="title font-bold text-lg text-[#104870]"><?= $blog["title"] ?></p>
                                <span class="font-semibold mt-2 text-sm text-[#6d6d6dc4]"><?= $created_at ?></span>
                                <p class="line-clamp-3 mt-2"><?= $blog["content"] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <!-- SIDE NEWS -->
            <div class="flex flex-col">
                <!-- BERITA TERBARU -->
                <div class="flex flex-col mt-5">
                    <h3 class="text-xl font-bold text-slate-800 mt-5">
                        Berita Terbaru
                    </h3>
                    <div class="flex flex-col mt-5 gap-7 lg:w-72">
                        <?php foreach ($blogs_new as $blog): ?>
                            <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
                                <div class="flex flex-col">
                                    <p class="text-blue-800 font-medium">
                                        <?= $blog["title"] ?>
                                    </p>
                                    <p class="line-clamp-2 text-sm font-normal text-blue-800"><?= $blog["content"] ?></p>
                                    <p class="text-sm text-slate-600 0 mt-1">6 September 2024</p>
                                    <hr class="mt-2 border-slate-500" />
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <?php include('../layouts/footer.php') ?>

    <script src="./../js/mobile.js"></script>
    <script src="./../js/lang.js"></script>
    <script src="./../js/nav.js"></script>
    <script>
        const btnSearchBlog = document.getElementById("btn-search-blog");
        const closeSearch = document.getElementById("close-search");
        const searchSection = document.getElementById("search-blog");

        btnSearchBlog.addEventListener("click", () => {
            searchSection.classList.remove("translate-y-full");
            searchSection.classList.add("translate-y-0");
        });

        closeSearch.addEventListener("click", () => {
            searchSection.classList.remove("translate-y-0");
            searchSection.classList.add("translate-y-full");
        });
    </script>
</body>

</html>
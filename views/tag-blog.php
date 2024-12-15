<?php
require_once __DIR__ . '/../Dashboard/Model/Model.php';
require_once __DIR__ . '/../Dashboard/Model/Users.php';
require_once __DIR__ . '/../Dashboard/Model/Tags.php';
require_once __DIR__ . '/../Dashboard/Model/Kategori.php';
require_once __DIR__ . '/../Dashboard/Model/Blogs.php';
require_once __DIR__ . '/../Model/Blogs_new.php';

$tag = $_GET["tag"];
$blogs_tag = new Blogs_new;
$blog_tag = $blogs_tag->find_tags($tag);
$blogs_new = $blogs_tag->all_new(4);



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

    <div class="h-16 lg:h-32"></div>

    <section class="w-full mt-16">
        <div
            class="container lg:w-[1180px] mx-auto p-4 flex gap-12 flex-col lg:flex-row lg:justify-evenly">
            <div class="flex flex-col flex-grow">
                <div class="title mt-5">
                    <h1 class="text-xl font-bold text-slate-800 mt-5"><?= $tag ?></h1>
                </div>
                <?php foreach ($blog_tag as $blog): ?>
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

    <script src="js/script.js"></script>
</body>

</html>
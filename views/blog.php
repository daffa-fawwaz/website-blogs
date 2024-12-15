<?php
require_once __DIR__ . '/../Model/Blogs_new.php';

$id = $_GET["id"];
$cat = $_GET["cat"];

$blogs = new Blogs_new();
$blogs_cat = $blogs->all_cat($cat);
$blog = $blogs->find_blog($id);
$blogs_new = $blogs->all_new(4);
$created_at = date('d F Y', strtotime($blog[0]["created_at"]));

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
      class="container mx-auto p-4 flex flex-col lg:flex-row lg:justify-evenly">
      <div class="lg:w-[65%]">
        <p class="text-xs lg:text-lg text-slate-700">
          Berita
          <span class="text-[#FAFF00] font-bold">></span> Liputan/Berita
        </p>
        <h3 class="text-xl md:text-4xl font-bold text-slate-800 mt-5">
          <?= $blog[0]["title"] ?>
        </h3>
        <div class="flex gap-4 items-center mt-4">
          <div class="flex items-center gap-2">
            <div class="w-5 h-5">
              <img src="./../img/time.png" alt="" />
            </div>
            <p class="text-xs lg:text-lg text-slate-700"><?= $created_at ?></p>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-5 h-5">
              <img src="./../img/user.png" alt="" />
            </div>
            <p class="text-xs lg:text-lg text-slate-700">
              Oleh : <?= $blog[0]["full_name"] ?>
            </p>
          </div>
        </div>
        <div class="w-full mt-2">
          <img class="w-full" src="./../Dashboard/public/img/konten/<?= $blog[0]["attachment"] ?>" alt="" />
        </div>
        <div class="flex flex-col gap-5 mt-5">
          <p class="text-slate-900">
            <?= $blog[0]["content"] ?>
          </p>
          <p class="mt-3 text-slate-900">Penulis : <?= $blog[0]["full_name"] ?></p>
        </div>
        <div class="flex flex-wrap gap-2 items-center mt-7">
          <p class="text-slate-600">TAGS :</p>
          <?php $tags = explode(",", $blog[0]['name_tag']); ?>
          <?php foreach ($tags as $tag): ?>
            <a href="tag-blog.php?tag=<?= $tag ?>">
              <p
                class="bg-blue-200 px-2 py-1 text-sm cursor-pointer text-blue-700">
                <?= $tag ?>
              </p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <hr />

      <!-- SIDE NEWS -->
      <div class="flex flex-col">
        <!-- BERITA TERBARU -->
        <div class="flex flex-col mt-5">
          <h3 class="text-xl font-bold text-slate-800 mt-5">
            Berita Terbaru
          </h3>
          <div class="flex flex-col mt-5 gap-7 lg:w-72">
            <?php foreach ($blogs_new as $blog): ?>
              <?php $created_at = date('d F Y', strtotime($blog["created_at"])) ?>
              <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
                <div class="flex flex-col">
                  <p class="text-blue-800 font-medium">
                    <?= $blog["title"] ?>
                  </p>
                  <p class="line-clamp-2 text-sm font-normal text-blue-800"><?= $blog["content"] ?></p>
                  <p class="text-sm text-slate-600 0 mt-1"><?= $created_at ?></p>
                  <hr class="mt-2 border-slate-500" />
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- AGENDA TERBARU -->
        <div class="flex flex-col md:mt-5 mt-8">
          <h3 class="text-xl font-bold text-slate-800 mt-5">
            Berita Terkait
          </h3>
          <div class="flex flex-col gap-8 mt-5 lg:w-72">
            <?php foreach ($blogs_cat as $blog): ?>
              <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
                <div
                  class="flex border-b pb-2 border-slate-400 items-center gap-5 cursor-pointer">
                  <div
                    class="flex flex-col border-r border-slate-400 pr-3 items-center">
                    <p class="text-xl font-bold text-blue-800">17</p>
                    <p class="text-lg text-slate-500 font-semibold">SEP</p>
                  </div>
                  <div class="text-blue-800 font-medium">
                    <p><?= $blog["title"] ?></p>
                    <p class="line-clamp-2 text-sm font-normal"><?= $blog["content"] ?></p>
                  </div>
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
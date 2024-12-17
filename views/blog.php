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
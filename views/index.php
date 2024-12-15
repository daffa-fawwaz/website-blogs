<?php
require_once __DIR__ . '/../Dashboard/Model/Model.php';
require_once __DIR__ . '/../Dashboard/Model/Users.php';
require_once __DIR__ . '/../Dashboard/Model/Tags.php';
require_once __DIR__ . '/../Dashboard/Model/Kategori.php';
require_once __DIR__ . '/../Dashboard/Model/Blogs.php';
require_once __DIR__ . '/../Model/Blogs_new.php';

$users = new Users();
$users = $users->all();
$blogs = new Tags();
$blogs = $blogs->all_blog();
$kategori = new Kategori();
$kategori = $kategori->all();
$blogs = new Blogs();
$blogs_all = $blogs->all_with_tags();
$blogs_news = new Blogs_new;
$blogs_new = $blogs_news->all_new(3, 1);
$blogs_new_one = $blogs_news->all_new(1);


?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link href="./src/output.css" rel="stylesheet" /> -->
  <link
    href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"
    rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="img/Logo-HSI-IDN-fix-2.png" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <title>Berita | HSI</title>
  <style>
    .scroll {
      scrollbar-width: none;
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <?php include('../layouts/navbar.php') ?>

  <div class="h-16 lg:h-32"></div>

  <section class="w-full mt-16">
    <div class="container lg:w-[1180px] mx-auto p-4 flex flex-col">
      <div
        id="controls-carousel"
        class="relative w-full"
        data-carousel="slide">
        <!-- Carousel wrapper -->
        <div
          class="relative h-[510px] md:h-[560px] lg:h-[600px] flex bg-[#104870] flex-col-reverse overflow-hidden rounded-lg">
          <!-- Item 1 -->
          <?php foreach ($blogs_all as $blog): ?>
            <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
              <div
                class="hidden duration-700 group ease-in-out"
                data-carousel-item>
                <img
                  src="./../Dashboard/public/img/konten/<?= $blog["attachment"] ?>"
                  class="absolute block w-full lg:h-[400px] -translate-x-1/2 -translate-y-1/2 top-[18%] sm:top-[20%] lg:top-[27%] left-1/2 group-hover:scale-105 object-cover transition-transform"
                  alt="..." />

                <div
                  class="flex flex-col w-full absolute sm:mt-0 top-[70%] sm:top-[80%] md:top-[80%] lg:top-[78%] left-1/2 -translate-x-1/2 -translate-y-1/2 p-3 lg:p-5">
                  <p class="mt-2 text-yellow-500 lg:mt-4">Liputan/Berita</p>
                  <h3
                    class="mt-2 text-2xl w-80 sm:w-96 font-semibold text-white lg:text-4xl lg:w-[700px]">
                    <?= $blog["title"] ?>
                  </h3>
                  <p class="mt-2 text-white font-thin lg:w-[700px] line-clamp-3">
                    <?= $blog["content"] ?>
                  </p>
                </div>
                <div
                  class="hidden md:block absolute bottom-5 right-7 w-36 h-36 opacity-20">
                  <img src="./../img/White Logo 1.png" alt="" />
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
        <!-- Slider controls -->
        <button
          type="button"
          class="absolute -top-36 lg:-top-24 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-prev>
          <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/60 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg
              class="w-4 h-4 text-gray-800 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10">
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
          </span>
        </button>
        <button
          type="button"
          class="absolute -top-36 lg:-top-24 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
          data-carousel-next>
          <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/60 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg
              class="w-4 h-4 text-gray-800 rtl:rotate-180"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 6 10">
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
          </span>
        </button>
      </div>
    </div>
  </section>

  <section class="w-full mt-4">
    <div class="container mx-auto p-4 flex flex-col lg:w-[1180px]">

      <div class="flex items-center gap-3 justify-between">
        <div class="flex items-center w-96">
          <h3
            class="text-2xl w-[45%] lg:w-[100%] font-semibold text-[#104870] lg:text-4xl">
            Berita Terbaru
          </h3>
          <div class="h-[2px] w-[55%] bg-yellow-500 lg:ml-3"></div>
        </div>

        <div
          class="hidden lg:flex items-center gap-1 border-b-2 border-[#104870] pb-2">
          <a class="text-[#104870] font-semibold" href="">LIHAT SEMUA</a>
          <div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="#104870"
              viewBox="0 0 256 256">
              <path
                d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path>
            </svg>
          </div>
        </div>

      </div>


      <?php foreach ($blogs_new_one as $blog): ?>
        <?php $created_at = date('d F Y', strtotime($blog["created_at"])) ?>
        <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
          <div class="bg-white rounded shadow mt-2">
            <div class="flex flex-col w-full lg:flex-row lg:gap-6">
              <div class="w-full overflow-hidden rounded lg:w-[50%]">
                <img
                  src="./../Dashboard/public/img/konten/<?= $blog["attachment"] ?>"
                  alt=""
                  class="w-full hover:scale-110 rounded-t transition-transform" />
              </div>
              <div class="flex flex-col p-3 lg:w-[50%]">
                <p class="mt-2 text-[#104870] lg:mt-4 font-semibold">
                  Liputan/Berita
                </p>
                <h3
                  class="mt-2 line-clamp-2 sm:w-[500px] text-xl font-semibold text-[#104870] lg:text-2xl">
                  <?= $blog["title"] ?>
                </h3>
                <p class="text-sm mt-2 text-gray-600"><?= $created_at ?></p>
                <p class="invisible lg:visible  text-gray-800 mt-2 line-clamp-3">
                  <?= $blog["content"] ?>
                </p>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
      <div class="md:flex md:gap-3 lg:gap-4">
        <?php foreach ($blogs_new as $blog): ?>
          <?php $created_at = date('d F Y', strtotime($blog["created_at"])) ?>
          <a href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>">
            <div class="flex mt-4 gap-4 bg-white shadow md:flex-col ">
              <div class="w-60 lg:w-full overflow-hidden">
                <img
                  src="./../Dashboard/public/img/konten/<?= $blog["attachment"] ?>"
                  alt=""
                  class="h-[80%] md:w-full md:h-[100%] hover:scale-110 transition-transform" />
              </div>
              <div class="flex flex-col pb-3 lg:px-3">
                <p class="mt-2 text-[#104870]"><?= $blog["name_category"] ?></p>
                <p class="text-base font-semibold text-[#104870] lg:text-xl">
                  <?= $blog["title"] ?>
                </p>
                <p class="text-xs mt-2 text-gray-600"><?= $created_at ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="w-full mt-16">
    <div class="container mx-auto p-4 flex flex-col lg:w-[1180px]">
      <div class="lg:flex items-center">
        <h3
          class="text-2xl w-[45%] font-semibold text-[#104870] lg:text-4xl lg:w-[14%]">
          Kategori
        </h3>
        <div class="h-[2px] w-full bg-yellow-500 mt-3 lg:w-[15%]"></div>
      </div>
      <input class="peer hidden" type="checkbox" id="check-kategori" />
      <div
        id="kategori"
        class="flex flex-col p-4 h-16 peer-checked:h-[650px] overflow-hidden transition-all duration-200 ease-in-out lg:h-full lg:flex-row lg:items-center lg:flex-wrap lg:gap-5">
        <div class="flex w-full justify-between items-center lg:hidden">
          <p class="text-lg font-semibold text-[#104870] lg:text-2xl">
            Kategori List
          </p>
          <label for="check-kategori">
            <div class="cursor-pointer" id="btn-kategori">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="25"
                height="25"
                fill="#104870"
                viewBox="0 0 256 256">
                <path
                  d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path>
              </svg>
            </div>
          </label>
        </div>
        <?php foreach ($kategori as $kategori): ?>
          <a href="kategori-blog.php?cat=<?= $kategori["name_category"] ?>">
            <div
              class="py-2 border-t mt-7 border-slate-300 lg:mt-2 lg:w-[350px] lg:border-none lg:bg-white lg:shadow lg:p-3 group hover:bg-[#104870] cursor-pointer">
              <p
                class="text-lg font-semibold text-[#104870] lg:text-xl group-hover:text-white">
                <?= $kategori["name_category"] ?>
              </p>
              <p
                class="text-base text-gray-500 lg:text-xl group-hover:text-gray-300">
                <?= count($blogs_news->all_cat($kategori["name_category"])); ?> Artikel Total
              </p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="w-full bg-[#104870] mt-16">
    <div class="container mx-auto p-4 lg:w-[1180px]">
      <!-- Header Section -->
      <div class="flex items-center mb-6">
        <h3 class="text-2xl font-semibold text-white lg:text-4xl">
          Top Author
        </h3>
        <div class="h-[2px] bg-yellow-500 ml-4 w-[20%]"></div>
      </div>

      <div class="scroll flex overflow-x-auto space-x-4 py-4">
        <!-- Card 1 -->
        <?php foreach ($users as $user): ?>
          <div
            class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 w-64 flex-shrink-0">
            <img
              class="w-24 h-24 lg:w-36 lg:h-36 rounded-full"
              src="./../Dashboard/public/img/users/<?= $user["avatar"] ?>"
              alt="John Doe" />
            <h4 class="text-xl mt-4 font-bold text-[#104870]"><?= $user["full_name"] ?></h4>
            <p class="text-sm text-gray-700"><?= $user["job"] ?></p>
            <a
              href="author.php?id=<?= $user["id_user"] ?>"
              class="mt-4 bg-[#104870] text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300">
              Detail
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include('../layouts/footer.php') ?>


  <script src="./../js/script.js"></script>
  <script src="./../js/nav.js"></script>
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
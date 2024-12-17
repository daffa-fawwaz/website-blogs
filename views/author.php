<?php
require_once __DIR__ . '/../Dashboard/Model/Model.php';;
require_once __DIR__ . '/../Dashboard/Model/Users.php';
require_once __DIR__ . '/../Dashboard/Model/Kategori.php';
require_once __DIR__ . '/../Model/Blogs_new.php';

$id = $_GET["id"];
$users = new Users();
$users = $users->find($id);
$blog_users = new Blogs_new();
$blog_user = $blog_users->all_blog_user($id)



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

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
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

        <input
          type="text"
          name="keyword"
          placeholder="Ketikan Judul Artikel Lalu Enter"
          class="pl-10 pr-4 py-4 w-full text-black rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-[#ffffff44] placeholder-gray-600">
      </form>
    </div>
  </section>

  <div class="h-28"></div>

  <section class="w-full mt-16">
    <div
      class="contianer mx-auto p-4 flex flex-col lg:flex-row-reverse lg:w-[1180px] lg:items-center lg:justify-between">
      <div class="flex items-center justify-center mt-3 lg:w-[30%]">
        <img src="../Dashboard/public/img/users/<?= $users[0]["avatar"] ?>" alt="" class="w-full" />
      </div>
      <div class="flex flex-col lg:mt-6 lg:w-[60%]">
        <div class="flex flex-col mt-4">
          <h3 class="text-2xl font-semibold text-[#104870] lg:text-4xl">
            <?= $users[0]["full_name"] ?>
          </h3>
          <p class="mt-2">
            <?= $users[0]["bio"] ?>
          </p>
        </div>
        <div class="flex flex-col">
          <h3 class="text-2xl text-[#104870] font-semibold mt-4 lg:text-4xl">
            Role
          </h3>
          <ul class="list-disc px-5 mt-2">
            <li><?= $users[0]["job"] ?></li>
          </ul>
        </div>
        <div class="mt-4">
          <h3>Joined Since : 31 August 2005</h3>
        </div>
      </div>
    </div>
  </section>

  <section class="w-full mt-10">
    <div class="container mx-auto p-4 lg:w-[1180px]">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-[#104870]">
          Artikel yang Sudah Ditulis
        </h2>
        <p class="text-gray-600 text-sm mt-2">
          Temukan berbagai artikel menarik yang telah ditulis oleh kami. Klik
          untuk membaca lebih lanjut!
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:flex lg:flex-wrap lg:justify-evenly gap-6">
        <!-- Card 1 -->
        <?php foreach ($blog_user as $blog): ?>
          <div
            class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 lg:w-[500px]">
            <img
              src="./../Dashboard/public/img/konten/<?= $blog["attachment"] ?>"
              alt="Gambar Artikel"
              class="w-full h-40 object-cover" />
            <div class="p-4">
              <h3 class="text-lg font-semibold text-[#104870]">
                <?= $blog["title"] ?>
              </h3>
              <p class="text-sm mt-2 text-gray-700 leading-relaxed line-clamp-1">
                <?= $blog["content"] ?>
              </p>
              <a
                href="blog.php?id=<?= $blog["id_posts"] ?>&cat=<?= $blog["name_category"] ?>"
                class="mt-4 inline-block text-white bg-[#104870] hover:bg-blue-700 font-semibold py-2 px-4 rounded transition-all duration-300">
                Read More
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include('../layouts/footer.php') ?>

  <script src="./../js/mobile.js"></script>
  <script src="./../js/lang.js"></script>
  <script src="./../js/nav.js"></script>
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
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
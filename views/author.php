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

  <script src="./../js/script.js"></script>
  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <style>
    .scroll {
      scrollbar-width: none;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <?php include('./../layouts/navbar.php') ?>
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
    <div class="container mx-auto p-4 flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:w-[1180px]">
      <!-- Contact Details -->
      <div class="flex flex-col space-y-3 lg:w-1/2">
        <h3 class="text-4xl font-semibold text-[#104870]">Kontak</h3>
        <h3 class="text-xl font-semibold text-[#104870] mt-6">HSI NEWS</h3>
        <div class="h-[2px] w-[28%] bg-yellow-500 mt-3"></div>
        <p class="text-gray-600">Jl. R. M. Said No.74C, RT.02/RW.04, Ketelan, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57132</p>
        <p class="text-gray-600">E: infohsi@hsi.ac.id</p>
        <p class="text-gray-600">T: +62 (274) 123 456</p>
        <p class="text-gray-600">F: +62 (274) 123456</p>
        <p class="text-gray-600">WA: +62 274 123 456</p>
      </div>

      <!-- Google Maps -->
      <div class="flex justify-center w-full">
        <!-- Mobile Map View -->
        <div class="lg:hidden w-full mt-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15820.477807298705!2d110.83223160583992!3d-7.561953099999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17623e8aa3cd%3A0x96a4fbfefc3c9d83!2sBackOffice%20HSI%20Solo!5e0!3m2!1sid!2sid!4v1731650974984!5m2!1sid!2sid" width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Desktop Map View -->
        <div class="hidden lg:block w-full mt-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15820.477807298705!2d110.83223160583992!3d-7.561953099999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17623e8aa3cd%3A0x96a4fbfefc3c9d83!2sBackOffice%20HSI%20Solo!5e0!3m2!1sid!2sid!4v1731650974984!5m2!1sid!2sid" width="95%" height="400" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
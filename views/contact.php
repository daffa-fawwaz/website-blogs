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
  <script src="js/script.js"></script>
</body>

</html>
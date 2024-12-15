<?php
require_once __DIR__ . '/../Dashboard/Model/Model.php';
require_once __DIR__ . '/../Model/Blogs_new.php';

$contacts_all = new Blogs_new();
$contacts = $contacts_all->contacts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-50">
    <!-- NAVBAR -->
    <?php include('../layouts/navbar.php') ?>
    <div class="h-16 lg:h-32"></div>
    <!-- CONTENT -->
    <main class="container mx-auto p-6 mt-16 mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Profile Photo -->
            <div class="flex justify-center">
                <img
                    src="../img/6610.png"
                    alt="Profile Photo"
                    class="rounded-full shadow-xl w-72 h-72 lg:w-96 lg:h-96 object-cover">
            </div>

            <!-- Contact Details -->
            <div class="space-y-6">
                <h2 class="text-4xl font-semibold text-[#104870]">Get in Touch</h2>
                <div class="h-[3px] w-24 bg-yellow-500"></div>

                <?php foreach ($contacts as $contact): ?>
                    <div class="space-y-2">
                        <p class="text-lg font-medium text-gray-700">Name: <span class="font-normal"><?= $contact["name"] ?></span></p>
                        <p class="text-lg font-medium text-gray-700">Address: <span class="font-normal"><?= $contact["address"] ?></span></p>
                        <p class="text-lg font-medium text-gray-700">WhatsApp: <a href="https://wa.me/085895080043" class="text-blue-600 hover:underline" target="_blank"><?= $contact["whatsapp"] ?></a></p>
                        <p class="text-lg font-medium text-gray-700">Email: <a href="mailto:daffafawwaz532@gmail.com" class="text-blue-600 hover:underline"><?= $contact["email"] ?></a></p>
                        <p class="text-lg font-medium text-gray-700">Telegram: <a href="https://t.me/dffawwaz" class="text-blue-600 hover:underline" target="_blank"><?= $contact["telegram"] ?></a></p>
                        <p class="text-lg font-medium text-gray-700">Instagram: <a href="https://instagram.com/dffawwaz" class="text-blue-600 hover:underline" target="_blank"><?= $contact["instagram"] ?></a></p>
                        <p class="text-lg font-medium text-gray-700">YouTube: <a href="https://youtube.com/channel/UC123456789" class="text-blue-600 hover:underline" target="_blank"><?= $contact["youtube"] ?></a></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include('../layouts/footer.php') ?>
</body>

</html>
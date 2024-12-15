<?php
require_once __DIR__ . '/../Model/Model.php';
require_once __DIR__ . '/../Model/Posts.php';

$keyword = $_GET["cari"];
$posts = new Posts();
$post_all = "";

$limit = 5;
$halamanAktif = (isset($_GET["page"]) ? $_GET["page"] : 1);
$startData = ($limit * $halamanAktif) - $limit;
if (isset($keyword) && $keyword) {
    $lenght = count($posts->search($keyword));
} else {
    $lenght = count($posts->all());
}



$countPage = ceil($lenght / $limit);

if (isset($keyword)) {
    if (isset($_SESSION["author"])) {
        $posts_all = $posts->search_id($_SESSION["id_user"], $keyword);
    } elseif (isset($_SESSION["admin"])) {
        $posts_admin = $posts->search($keyword, $startData, $limit);
    } else {
        $posts_user = $posts->search($keyword, $startData, $limit);
    }
} else {
    $posts_all = $posts->all_id($_SESSION["id_user"]);
}

$count = $posts->all();
?>


<div id="container">
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Gambar</th>
                <th class="px-4 py-3">Author</th>
                <th class="px-4 py-3">kategori</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>

        <!-- TABEL USER START -->
        <?php if (isset($_SESSION["user"])): ?>
            <?php $no = 1 + $startData ?>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($posts_user as $posts): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm"><?= $no ?></td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["title"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <img class="w-10" src="./../public/img/konten/<?= $posts["attachment"] ?>" alt="">
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["full_name"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["name_category"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">Anda Tidak Memiliki Akses</td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing <?= $limit ?> of <?= count($count) ?>
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <?php if ($halamanAktif > 1): ?>
                                    <a href="?page=<?= $halamanAktif - 1 ?>">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Previous">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Previous">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </li>
                            <?php for ($i = 1; $i <= $countPage; $i++): ?>
                                <?php if ($i == $halamanAktif): ?>
                                    <a href="?page=<?= $i ?>">
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 focus:shadow-outline-purple">
                                            <?= $i ?>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="?page=<?= $i ?>">
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple ">
                                            <?= $i ?>
                                        </button>
                                    </a>
                                <?php endif; ?>
                                <li>
                                </li>
                            <?php endfor; ?>
                            <li>
                                <?php if ($halamanAktif < $countPage): ?>
                                    <a href="?page=<?= $halamanAktif + 1 ?>">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div>
        <?php endif; ?>
        <!-- TABEL USER END -->

        <!-- TABEL ADMIN START -->
        <?php if (isset($_SESSION["admin"])): ?>
            <?php $no = 1 + $startData ?>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($posts_admin as $posts): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm"><?= $no ?></td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["title"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <img class="w-10" src="./../public/img/konten/<?= $posts["attachment"] ?>" alt="">
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["full_name"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["name_category"] ?>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <div onclick="kontenDetail('<?= $posts['content'] ?>')" class="info w-5 h-5 cursor-pointer">
                                    <img src="../assets/img/info.png" alt="" class="w-full h-full">
                                </div>
                                <a href="update-posts.php?id=<?= $posts['id_posts'] ?>">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                </a>
                                <button onclick="confirmDelete(event, '<?= $posts['id_posts'] ?>')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing <?= $limit ?> of <?= count($count) ?>
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <?php if ($halamanAktif > 1): ?>
                                    <a href="?page=<?= $halamanAktif - 1 ?>">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Previous">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Previous">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </li>
                            <?php for ($i = 1; $i <= $countPage; $i++): ?>
                                <?php if ($i == $halamanAktif): ?>
                                    <a href="?page=<?= $i ?>">
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 focus:shadow-outline-purple">
                                            <?= $i ?>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="?page=<?= $i ?>">
                                        <button
                                            class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple ">
                                            <?= $i ?>
                                        </button>
                                    </a>
                                <?php endif; ?>
                                <li>
                                </li>
                            <?php endfor; ?>
                            <li>
                                <?php if ($halamanAktif < $countPage): ?>
                                    <a href="?page=<?= $halamanAktif + 1 ?>">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php else: ?>
                                    <a href="">
                                        <button
                                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                            aria-label="Next">
                                            <svg
                                                class="w-4 h-4 fill-current"
                                                aria-hidden="true"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"
                                                    fill-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div>
        <?php endif; ?>
        <!-- TABEL ADMIN END -->

        <!-- TABEL AUTHOR START -->
        <?php if (isset($_SESSION["author"])): ?>
            <?php $no = 1 ?>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php foreach ($posts_all as $posts): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3 text-sm"><?= $no ?></td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["title"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <img class="w-10" src="./../public/img/konten/<?= $posts["attachment"] ?>" alt="">
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["author_name"] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $posts["name_category"] ?>
                        </td>


                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">

                                <div onclick="kontenDetail('<?= $posts['content'] ?>')" class="info w-5 h-5 cursor-pointer">
                                    <img src="../assets/img/info.png" alt="" class="w-full h-full">
                                </div>
                                <a href="update-posts.php?id=<?= $posts['id_posts'] ?>">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg
                                            class="w-5 h-5"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                </a>


                                <button onclick="confirmDelete(event, '<?= $posts['id_posts'] ?>')"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete">
                                    <svg
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    <?php $no++ ?>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
        <!-- TABEL AUTHOR END -->
    </table>
</div>
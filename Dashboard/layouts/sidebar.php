<aside class="hidden md:block w-64 bg-white dark:bg-gray-800">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="index.php">HSI NEWS</a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a
                    class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="index.php">
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <!-- Dropdown Kategori -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <span class="ml-4">Kategori</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-kategori.php">Kategori</a>
                        </li>
                        <?php if (isset($_SESSION["user"])): ?>
                            <div></div>
                        <?php else: ?>
                            <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                                <a href="create-kategori.php">Tambah Kategori</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </template>
            </li>

            <!-- Dropdown Posts -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Posts</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-posts.php">Posts</a>
                        </li>
                        <?php if (isset($_SESSION["user"])): ?>
                            <div></div>
                        <?php else: ?>
                            <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                                <a href="create-posts.php">Tambah Posts</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Tags</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-tags.php">Tags</a>
                        </li>
                        <?php if (isset($_SESSION["user"])): ?>
                            <div></div>
                        <?php else: ?>
                            <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                                <a href="create-tags.php">Tambah Tags</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </template>
            </li>



            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Akun</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="akun.php">Akun</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="update-password.php">Change Password</a>
                        </li>
                    </ul>
                </template>
            </li>

        </ul>
    </div>
</aside>

<!-- Mobile sidebar -->
<!-- Backdrop -->
<div
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20"
    @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#">
            HSI NEWS
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a
                    class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="index.html">
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <!-- Dropdown Kategori -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                        <span class="ml-4">Kategori</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-kategori.php">Kategori</a>
                        </li>
                        <?php if (isset($_SESSION["user"])): ?>
                            <div></div>
                        <?php else: ?>
                            <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                                <a href="create-kategori.php">Tambah Kategori</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </template>
            </li>

            <!-- Dropdown Posts -->
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Posts</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-posts.php">Posts</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="create-posts.php">Tambah Posts</a>
                        </li>
                    </ul>
                </template>
            </li>
            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Tags</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="index-tags.php">Tags</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="create-tags.php">Tambah Tags</a>
                        </li>
                    </ul>
                </template>
            </li>

            <li class="relative px-6 py-3" x-data="{ isOpen: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    @click="isOpen = !isOpen"
                    aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <div class="w-5 h-5 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256" class="w-full fill-current">
                                <path d="M88,96a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,96Zm8,40h64a8,8,0,0,0,0-16H96a8,8,0,0,0,0,16Zm32,16H96a8,8,0,0,0,0,16h32a8,8,0,0,0,0-16ZM224,48V156.69A15.86,15.86,0,0,1,219.31,168L168,219.31A15.86,15.86,0,0,1,156.69,224H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32H208A16,16,0,0,1,224,48ZM48,208H152V160a8,8,0,0,1,8-8h48V48H48Zm120-40v28.7L196.69,168Z"></path>
                            </svg>
                        </div>
                        <span class="ml-4">Tags</span>
                    </span>
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isOpen">
                    <ul
                        class="mt-2 space-y-2 text-sm font-medium text-gray-500 bg-gray-50 rounded-md shadow-inner dark:bg-gray-900 dark:text-gray-400">
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="akun.php">Akun</a>
                        </li>
                        <li class="px-4 py-2 hover:text-gray-800 dark:hover:text-gray-200">
                            <a href="update-password.php">Ganti Password</a>
                        </li>
                    </ul>
                </template>
            </li>

        </ul>

    </div>
</aside>
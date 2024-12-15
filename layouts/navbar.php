  <nav class="w-full bg-[#104870] fixed z-40">
      <div class="container mx-auto p-4 flex flex-col lg:w-[1180px]">
          <div class="flex justify-between">
              <div class="flex items-center gap-4">
                  <div id="btn-nav-mobile" class="lg:hidden cursor-pointer">
                      <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="25"
                          height="25"
                          fill="#ffffff"
                          viewBox="0 0 256 256">
                          <path
                              d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path>
                      </svg>
                  </div>
                  <a href="index.php">
                      <div class="w-16">
                          <img src="./../img/White Logo 1.png" alt="" class="w-full" />
                      </div>
                  </a>
                  <h3 class="text-white font-semibold text-xl">HSI NEWS</h3>
              </div>
              <div class="flex items-center justify-center gap-4">
                  <div class="hidden lg:flex items-center justify-center gap-4">
                      <div class="w-5">
                          <img src="./../img/instagram.png" alt="" class="w-full" />
                      </div>
                      <div class="w-5">
                          <img src="./../img/facebook.png" alt="" class="w-full" />
                      </div>
                      <div class="w-5">
                          <img src="./../img/tik-tok.png" alt="" class="w-full" />
                      </div>
                      <div class="w-5">
                          <img src="./../img/linkedin.png" alt="" class="w-full" />
                      </div>
                      <div class="w-[1px] h-9 bg-white"></div>
                  </div>
                  <div class="flex gap-1 items-center relative">
                      <div id="country" class="w-6">
                          <img src="./../img/indonesia.png" alt="" class="w-full" />
                      </div>
                      <p id="text-country" class="text-white font-semibold ml-1">ID</p>
                      <div id="set-lang" class="cursor-pointer">
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="20"
                              height="20"
                              fill="#ffffff"
                              viewBox="0 0 256 256">
                              <path
                                  d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
                          </svg>
                      </div>

                      <label for="check-lang">
                          <div
                              id="lang"
                              class="opacity-0 w-16 h-8 flex items-center justify-center gap-1 p-1 bg-white absolute top-8 right-10">
                              <div class="cursor-pointer">
                                  <input id="check-lang" type="checkbox" class="hidden" />
                                  <svg
                                      xmlns="http://www.w3.org/2000/svg"
                                      width="23"
                                      height="23"
                                      fill="#000000"
                                      viewBox="0 0 256 256">
                                      <path
                                          d="M128,24h0A104,104,0,1,0,232,128,104.12,104.12,0,0,0,128,24Zm88,104a87.61,87.61,0,0,1-3.33,24H174.16a157.44,157.44,0,0,0,0-48h38.51A87.61,87.61,0,0,1,216,128ZM102,168H154a115.11,115.11,0,0,1-26,45A115.27,115.27,0,0,1,102,168Zm-3.9-16a140.84,140.84,0,0,1,0-48h59.88a140.84,140.84,0,0,1,0,48ZM40,128a87.61,87.61,0,0,1,3.33-24H81.84a157.44,157.44,0,0,0,0,48H43.33A87.61,87.61,0,0,1,40,128ZM154,88H102a115.11,115.11,0,0,1,26-45A115.27,115.27,0,0,1,154,88Zm52.33,0H170.71a135.28,135.28,0,0,0-22.3-45.6A88.29,88.29,0,0,1,206.37,88ZM107.59,42.4A135.28,135.28,0,0,0,85.29,88H49.63A88.29,88.29,0,0,1,107.59,42.4ZM49.63,168H85.29a135.28,135.28,0,0,0,22.3,45.6A88.29,88.29,0,0,1,49.63,168Zm98.78,45.6a135.28,135.28,0,0,0,22.3-45.6h35.66A88.29,88.29,0,0,1,148.41,213.6Z"></path>
                                  </svg>
                              </div>
                              <p
                                  id="format-lang"
                                  class="text-sm font-semibold cursor-pointer">
                                  EN
                              </p>
                          </div>
                      </label>
                      <div id="btn-search" class="ml-2">
                          <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="23"
                              height="23"
                              fill="#ffffff"
                              viewBox="0 0 256 256">
                              <path
                                  d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                          </svg>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div
          id="nav-home"
          class="hidden lg:block w-full border-t mt-3 border-yellow-500 bg-[#1A2C43]">
          <div class="container mx-auto p-3 flex justify-between lg:w-[1180px]">
              <div class="flex">
                  <ul class="flex items-center gap-8">
                      <li id="home" class="text-lg text-white font-semibold">
                          <a href="index.php">Home</a>
                      </li>
                      <li class="hidden-nav text-lg text-white font-semibold">
                          <a href="profile.php">Profile</a>
                      </li>
                      <li class="hidden-nav text-lg text-white font-semibold">
                          <a href="contact.php">Contact</a>
                      </li>
                  </ul>
              </div>
              <div
                  id="search"
                  class="opacity-0 w-60 h-8 bg-white rounded-full flex relative">
                  <div class="absolute top-[7px] left-2">
                      <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="18"
                          height="18"
                          fill="#000000"
                          viewBox="0 0 256 256"
                          class="opacity-50">
                          <path
                              d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                      </svg>
                  </div>
                  <input
                      placeholder="Temukan Berita"
                      class="w-full rounded-full pl-7"
                      type="text" />
                  <div id="btn-close-search" class="absolute right-2 top-[7px]">
                      <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="20"
                          height="20"
                          fill="#000000"
                          viewBox="0 0 256 256">
                          <path
                              d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                      </svg>
                  </div>
              </div>
          </div>
          <div
              id="layout-navbar"
              class="w-full h-full fixed z-[35] backdrop-blur bg-white/30 hidden">
              <div class="w-full bg-[#104870] absolute top-0">
                  <div class="w-[1180px] mx-auto flex flex-col p-4 mt-4">
                      <ul class="flex flex-col gap-4">
                          <li class="text-white text-lg font-semibold">
                              <a href="">Berita Terkini</a>
                          </li>
                          <li class="text-white text-lg font-semibold">
                              <a href="">Berita Terbaru</a>
                          </li>
                          <li class="text-white text-lg font-semibold">
                              <a href="">Top Author</a>
                          </li>
                          <li class="text-white text-lg font-semibold mb-4">
                              <a href="">Kontak Kami</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </nav>

  <div
      id="layout"
      class="w-full h-full bg-[#00000093] transition-all duration-200 ease-in-out opacity-0 fixed -z-20"></div>
  <aside
      id="nav-mobile"
      class="fixed z-50 w-full -translate-x-full h-full transition-all duration-200 ease-in-out">
      <div class="container w-72 h-full bg-[#104870]">
          <div class="flex flex-col p-2 relative">
              <div id="close-navbar" class="absolute cursor-pointer right-2">
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="32"
                      height="32"
                      viewBox="0 0 256 256"
                      class="fill-white">
                      <path
                          d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path>
                  </svg>
              </div>
              <div class="flex items-center gap-4">
                  <img src="./../img/White Logo 1.png" alt="" class="w-14" />
                  <h3 class="text-white font-semibold text-xl">HSI NEWS</h3>
              </div>
              <div class="absolute left-2 mt-1">
                  <div class="w-11 h-11">
                      <img src="./image/logo-idn 1.png" alt="" />
                  </div>
              </div>
              <ul
                  class="mt-16 flex flex-col gap-7 text-left ml-5 text-white font-semibold">
                  <li class="hover:text-blue-500">
                      <a href="#">Home</a>
                  </li>
                  <li class="hover:text-blue-500">
                      <a href="tentang-kami.php">Blog</a>
                  </li>
                  <li class="hover:text-blue-500"><a href="#jurusan">Penulis</a></li>
                  <li class="hover:text-blue-500">
                      <a href="#ekskul">Tentang Kami</a>
                  </li>
                  <li class="hover:text-blue-500">
                      <a href="berita.php">Berita</a>
                  </li>
                  <li class="hover:text-blue-500">
                      <a href="#dokumentasi">Dokumentasi</a>
                  </li>
                  <li class="hover:text-blue-500">
                      <input
                          type="checkbox"
                          class="peer sr-only opacity-0"
                          id="toggle-mobile" />
                  </li>
              </ul>
          </div>
      </div>
  </aside>
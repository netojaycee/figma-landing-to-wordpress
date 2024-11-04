<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?> <!-- Required for WordPress to load necessary head elements and styles -->
</head>

<body <?php body_class('max-w-7xl mx-auto'); ?>>

  <div class="bg-red-500 w-full py-4 hidden md:block">
    <span class="flex items-center justify-center gap-5">
      <a href="#" class="font-[700] text-white text-sm hover:underline">Home</a>
      <a href="#" class="font-[700] text-white text-sm hover:underline">Live Update</a>
      <a href="#" class="font-[700] text-white text-sm hover:underline">Election 2023</a>
      <a href="#" class="font-[700] text-white text-sm hover:underline">Videos</a>
      <a href="#" class="font-[700] text-white text-sm hover:underline">Return To Punch Home Page</a>
    </span>
  </div>
  <div class="flex items-center md:justify-center w-full justify-between py-4 md:shadow-none bottom-shadow px-3">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-head.png" class="md:w-auto w-[80%]" alt="logo-head" />
    <i id="hamburger" class="fa-solid fa-bars md:hidden text-xl cursor-pointer"></i>
  </div>

  <!-- Sidebar for Mobile -->
  <div id="sidebar" class="fixed top-0 right-0 z-10 w-64 h-full bg-gray-800 text-white transform translate-x-full transition-transform duration-700 ease-in-out">
    <div class="flex justify-end p-4">
      <i id="closeSidebar" class="fa-solid fa-times text-xl cursor-pointer"></i>
    </div>
    <nav class="flex flex-col items-start space-y-4 px-4">
      <a href="#" class="hover:underline">Home</a>
      <a href="#" class="hover:underline">Live Update</a>
      <a href="#" class="hover:underline">Election 2023</a>
      <a href="#" class="hover:underline">Videos</a>
      <a href="#" class="hover:underline">Return To Punch Home Page</a>
    </nav>
  </div>

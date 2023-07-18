<?php

add_theme_support("post-thumbnails");

add_theme_support("title-tag");

add_theme_support("custom-logo");

function register_assets()
{
  wp_enqueue_script("jquery");

  wp_enqueue_script(
    "repranJS",
    get_template_directory_uri() . "/js/script.js",
    ["jquery"],
    "1.0",
    true
  );

  wp_enqueue_style("repranCSS", get_stylesheet_uri(), [], "1.0");
}
add_action("wp_enqueue_scripts", "register_assets");

register_nav_menus([
  "main" => "Menu principal",
  "footer" => "Menu footer",
  "pathos" => "Liste des pathologies",
]);

require get_template_directory() . "/docu-query.php";

function new_excerpt_lenght($length) {
  return 50;
};
add_filter('excerpt_length', 'new_excerpt_lenght');
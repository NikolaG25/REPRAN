<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
  <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="header">
      <div class="header__toggle">
      <?php 
      $custom_logo = the_custom_logo(  );
      $logo = wp_get_attachment_image_src( $custom_logo , 'full' );
      $logo_url = $logo[0];
    ?> 
        <div
          class="nav-toggle"
          onclick='document.documentElement.classList.toggle("menu-open")'
        >
          <div class="nav-toggle-bar"></div>
        </div>
      </div>
      <div class="header__menu">
        <div class="header__navLogo">
            <?php 
              $custom_logo = the_custom_logo(  );
              $logo = wp_get_attachment_image_src( $custom_logo , 'full' );
              $logo_url = $logo[0];
            ?> 
          <nav class="header__nav">
              <?php wp_nav_menu( array( 
                  'theme_location' => 'main',
                  'container' => 'ul',
                  'menu_class' => 'header__list',
          ) ); ?>
          </nav>
        </div>
        <?php
          $args = [
            'post_type' => "logos_header",
            "posts_per_page" => 1
          ];

          $query = new WP_Query($args);

          if ($query->have_posts()) :
            while ($query->have_posts()) :
              $query->the_post();            
            
        ?>
        <a class="header__logoMSA" href="https://www.msa.fr/lfp" target="_blank" ><?php the_post_thumbnail(  ) ?></a>
        <?php

       endwhile; endif; wp_reset_postdata(  ) ?>

      </div>
    </header>
    <?php wp_body_open(); ?>
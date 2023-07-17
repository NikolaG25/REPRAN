<?php get_header(); ?>

<main class="pathologies">
    <?php
    $args = [
      "post_type" => "pathologies",
      "numberposts" => 4,
      "orderby" => "date",
      "order" => "DESC",
      "post_status" => "publish",
    ];
    $query = get_posts($args);
    foreach ($query as $post):
      setup_postdata($post); ?>
      <section class="pathologies__item">
          <a class="pathologies__link" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail(); ?>

            <div class="pathologies__background"></div>
            <h2 class="pathologies__name">
            <?php the_title(); ?>
            </h2>
          </a>
      </section>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
    </main>

<?php get_footer(); ?>

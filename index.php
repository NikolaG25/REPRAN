<?php get_header(); ?>

<main class="index">
<h1 class="siteHeading">
    Actualités
	</h1>
    <div class="listNews">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
              the_post(); ?>
            <div class="cardNews">
        <?php the_post_thumbnail(); ?>

        <div class="cardNews__zoneTxt">
          <h3><?php the_title(); ?></h3>
          <p>
          <?php the_excerpt(); ?>
          </p>
        </div>

        <button class="cardNews__button button -darkBlue">
          <a href="<?php the_permalink(); ?>">Voir l'actu</a>
        </button>
      </div>
            <?php
            endwhile; ?>
        <?php endif; ?>
    </div>

</main>

<?php get_footer(); ?>

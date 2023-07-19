<?php get_header(); ?>

<main class="pathologie">
      <section class="hero">
        <h1 class="hero__name"><?php echo the_title(); ?></h1>
        <?php the_post_thumbnail(); ?>


        <div class="hero__desc">
          <h2 class="desc__title">Qu'est-ce que c'est ?</h2>
          <?php $descPatho = get_field("desc_patho"); ?>
          <p>
            <?php echo $descPatho; ?>
          </p>
          
        </div>
      </section>
      <section class="sector">
        <h2 class="sector__title">Secteurs les plus touchés</h2>
        <ul class="sector__list">
        <?php
        $sectors = get_field("secteurs");
        if ($sectors):
          foreach ($sectors as $post):
            setup_postdata($post); ?>
          <li class="sector__item"><?php echo the_title(); ?></li>
          <?php
          endforeach;
        endif;
        wp_reset_postdata();
        ?>
        </ul>
      </section>
      <section class="symptomes">
        <?php $txtSym = get_field("texte_explicatif"); ?>
        <h2 class="symptomes__title">Symptômes</h2>
        <div class="symptomes__zoneDesc">
          <p class="symptomes__desc">
            <?php echo $txtSym; ?>
          </p>

        </div>

        <ul class="symptomes__list">
            <?php
            $relation_field = get_field("symptomes");
            if ($relation_field):
              foreach ($relation_field as $post):
                setup_postdata($post); ?>
                <li class="symptomes__item"><?php echo the_title(); ?></li>

          <?php
              endforeach;
            endif;
            wp_reset_postdata();
            ?>
        </ul>
      </section>
      <section class="declan-prev">
        <div class="declan">
          <h2 class="declan__title">Déclencheurs</h2>
          <ul class="declan__list">
          <?php
          $declen = get_field("declencheurs");
          if ($declen):
            foreach ($declen as $post):
              setup_postdata($post); ?>
                <li class="declan__item h3"><?php echo the_title(); ?></li>

          <?php
            endforeach;
          endif;
          wp_reset_postdata();
          ?>
          </ul>
        </div>
        <div class="prev">
          <h2 class="prev__title">Prévention</h2>
          <ul class="prev__list">
          <?php
          $prev = get_field("prevention");
          if ($prev):
            foreach ($prev as $post):
              setup_postdata($post); ?>
                <li class="prev__item h3"><?php echo the_title(); ?></li>

          <?php
            endforeach;
          endif;
          wp_reset_postdata();
          ?>
          </ul>
        </div>
      </section>
      <section class="docuPatho">
        <?php 
          $linkDocu = get_field('link_docu');
        ?>
        <a href="<?php echo $linkDocu ?>" class="docuPatho__item h3">En savoir plus</a>
      </section>
      <section class="singleActu">
    <div class="content">
          <?php
          if (have_posts()) :
          while (have_posts()) : the_post();
              the_content();
          endwhile;
          endif;
          ?>  
      </div>
    </section>
</main>

<?php get_footer(); ?>

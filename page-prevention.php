<?php get_header(); ?>

<main class="mainPrevention">
      <section class="hero">
        <h1 class="hero__name">
        <?php echo the_title(); ?>
        </h1>
        <?php the_post_thumbnail(); ?>


        <div class="hero__desc">
            <?php
            $titlePage = get_field("title_desc_prev");
            $descPage = get_field("desc_prev");
            ?>
          <h2 class="desc__title"><?php echo $titlePage; ?></h2>
          <p>
          <?php echo $descPage; ?>
          </p>
          
        </div>
      </section>
      <section class="prevCol">
        <div class="prevCol__content">
            <?php
            $titlePrevCol = get_field("title_prev_col");
            $contentPrevCol = get_field("content_prev_col");
            $imagePrevCol = get_field("image_prev_col");
            ?>
          <h2><?php echo $titlePrevCol; ?></h2>
          <p>
          <?php echo $contentPrevCol; ?>
          </p>
          
        </div>
        <img
          src="<?php echo $imagePrevCol["url"]; ?>"
          alt="<?php echo $imagePrevCol["alt"]; ?>"
          class="prevCol__img"
        />
      </section>
      <section class="mesuresCol">
        <h2>
          Quelques exemples de mesures de prévention dans différents métiers
          d'élevage
        </h2>
        <div class="mesuresCol__div">
          <div class="mesuresCol__zoneTitle">
            <?php
            $args = [
              "numberposts" => -1,
              "post_type" => "metiers_elevage",
              "post_status" => "publish",
            ];
            $metier = get_posts($args);
            foreach ($metier as $post):
              setup_postdata($post); ?>
            <h4 class="mesuresCol__title">
            <?php the_title(); ?>
            </h4>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
          </div>
          <div class="mesuresCol__zoneContent">
            <?php
            $args = [
              "numberposts" => -1,
              "post_type" => "metiers_elevage",
              "post_status" => "publish",
            ];
            $metier = get_posts($args);
            foreach ($metier as $post):
              setup_postdata($post); ?>
            <div class="mesuresCol__content">
              <h3 class="mesuresCol__contentTitle">
              <?php the_title(); ?>
              </h3>
              <?php the_content(); ?>

            </div>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
          </div>
        </div>
      </section>
      <section class="prevIndiv">
      <?php
      $zone1 = get_field("prevention_individuelle_1");
      $zone2 = get_field("prevention_individuelle_2");
      $zone3 = get_field("prevention_individuelle_3");

      $title1 = $zone1["nom_prevention"];
      $icone1 = $zone1["icone_prevention"];

      $title2 = $zone2["nom_prevention"];
      $icone2 = $zone2["icone_prevention"];

      $title3 = $zone3["nom_prevention"];
      $icone3 = $zone3["icone_prevention"];
      ?>
        
        <div class="prevIndiv__item">
            
          <div class="prevIndiv__iconZone">
          <img
            src="<?php echo $icone1; ?>"
            alt="Icone de masque ffp"
            class="prevIndiv__img"
            />
          </div>
          <h3 class="prevIndiv__title">
          <?php echo $title1; ?>

          </h3>
        </div>
        <div class="prevIndiv__item">
        
        <div class="prevIndiv__iconZone">
        <img
            src="<?php echo $icone2; ?>"
              class="prevIndiv__img"
              alt="Icone de masque à cartouche"

            />
          </div>
          <h3 class="prevIndiv__title">
          <?php echo $title2; ?>

          </h3>
        </div>
        <div class="prevIndiv__item">
          <div class="prevIndiv__iconZone">
            <img
            src="<?php echo $icone3; ?>"
            alt="Icone de masque à cartouche"
              class="prevIndiv__img"
            />
          </div>
          <h3 class="prevIndiv__title">
          <?php echo $title3; ?>

          </h3>
        </div>
      </section>
      <section class="danger-risk">
        <h2>Du danger au risque</h2>
        <p>
          Pour passer du danger au risque de PAPPA, il faut que deux choses
          soient réunies : un danger et une exposition
        </p>

        <div class="danger-risk__schema">
          <div class="danger-risk__danger">
            <h2 class="danger-risk__title">
              Danger <br />
              (Polluants, inhalables)
            </h2>
            <img src="<?php echo get_template_directory_uri(); ?>/img/icones/Arrow.svg" alt="Flèche" class="arrow" />
            <div class="eval-prev eval">
              <h2 class="eval-prev__title">Évaluer</h2>
              <div class="eval-prev__content">
                <p>
                  Nature du polluant : poussières allergisantes, irritantes,
                  toxicité
                </p>
                <p>Process générant des polluants</p>
              </div>
            </div>
            <div class="eval-prev">
              <h2 class="eval-prev__title">Prévenir</h2>
              <div class="eval-prev__content">
                <p>
                  Supprimer ou substituer : Choix des produits, technique de
                  stockage, séchage (foins, etc...)
                </p>
                <p>Surveillance sanitaire</p>
              </div>
            </div>
          </div>

          <div class="sign">
            <p class="h3">+</p>
          </div>
          <div class="danger-risk__expo">
            <h2 class="danger-risk__title">
              Exposition <br />
              Inhalation
            </h2>
            <img src="<?php echo get_template_directory_uri(); ?>/img/icones/Arrow.svg" alt="Flèche" class="arrow" />
            <div class="eval-prev eval">
              <h2 class="eval-prev__title">Évaluer</h2>
              <div class="eval-prev__content">
                <p>
                  Activités et conditions de travail avec une exposition aux
                  polluants ?
                </p>
                <p>Quantité, confinement, ventilation</p>
              </div>
            </div>
            <div class="eval-prev">
              <h2 class="eval-prev__title">Prévenir</h2>
              <div class="eval-prev__content">
                <p>Aménagements, aération des locaux</p>
                <p>Organisation du travail</p>
                <p>Choix des techniques</p>
                <p>Équipements de protection</p>
              </div>
            </div>
          </div>

          <div class="sign">
            <p class="h3">=</p>
          </div>

          <h2 class="eval-prev__title risk">Risque de PAPPA</h2>
        </div>
      </section>
      <section class="principes-prev">
        <h2>Les 9 principes généraux en prévention</h2>
        <ul class="principes-prev__list">
          <?php
          $principe_1 = get_field("principe_1");
          $principe_2 = get_field("principe_2");
          $principe_3 = get_field("principe_3");
          $principe_4 = get_field("principe_4");
          $principe_5 = get_field("principe_5");
          $principe_6 = get_field("principe_6");
          $principe_7 = get_field("principe_7");
          $principe_8 = get_field("principe_8");
          $principe_9 = get_field("principe_9");
          ?>
          <li class="cardPrincipe">
            <p class="statText">01</p>
            <h3><?php echo $principe_1; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">02</p>
            <h3><?php echo $principe_2; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">03</p>
            <h3><?php echo $principe_3; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">04</p>
            <h3><?php echo $principe_4; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">05</p>
            <h3><?php echo $principe_5; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">06</p>
            <h3><?php echo $principe_6; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">07</p>
            <h3><?php echo $principe_7; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">08</p>
            <h3><?php echo $principe_8; ?></h3>
          </li>
          <li class="cardPrincipe">
            <p class="statText">09</p>
            <h3><?php echo $principe_9; ?></h3>
          </li>
        </ul>
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
<script>
    prevCol();
</script>
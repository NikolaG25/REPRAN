<?php get_header(); ?>
<main>
  <div class="heroIndex">
        

      <?php
      $bigTitle = get_field("big_title");
      $subTitle = get_field("sub_title");
      $desc = get_field("description");
      $discover = get_field("discover");
      $phraseM_A = get_field("phrase_msa_asept");
      $logos = get_field("logos");
      if ($logos):
        while (have_rows("logos")):

          the_row();
          $logoMSA = get_sub_field("logo_msa");
          $logoASEPT = get_sub_field("logo_asept");
          ?>
        <h1 class="heroIndex__bigTitle bigTitle"><?php echo $bigTitle; ?></h1>
        <h2 class="heroIndex__Title">
        <?php echo $subTitle; ?>
        </h2>
        <h3>
        <?php echo $desc; ?>

        </h3>
        <button class="heroIndex__button button -orange">
          <a href="<?php echo $discover; ?>">Nous découvrir</a>
        </button>
        <div class="msa-asept">
          <h4><?php echo $phraseM_A; ?></h4>
          <div class="msa-asept__logos">
            <a href="https://www.msa.fr/lfp" target="_blank" rel="noopener noreferrer"><img src="<?php echo $logoMSA["url"]; ?>" alt="<?php echo $logoMSA["alt"]; ?>" /></a>
            <a href="https://asept.org" target="_blank" rel="noopener noreferrer"><img src="<?php echo $logoASEPT["url"]; ?>" alt="<?php echo $logoASEPT["alt"]; ?>" /></a>
          </div>
        </div>
        <?php
        endwhile;
      endif;
      ?> 
  
        <!-- <span class="circle circle__big -blue"> </span>
        <span class="circle circle__medium -orange"> </span>
        <span class="circle circle__small -lightBlue"> </span> -->

  </div>
  <section class="presentation">
      <?php
      $titleRepran = get_field("title_zone_repran");

      $zone1 = get_field("zone_contenu_1");
      $zone2 = get_field("zone_contenu_2");
      $zone3 = get_field("zone_contenu_3");
      $image1 = get_field("image_1");
      $image2 = get_field("image_2");

      if ($zone1):
        while (have_rows("zone_contenu_1")):
          the_row();
          $title1 = get_sub_field("title");
          $content1 = get_sub_field("contenu");
        endwhile;
      endif;
      if ($zone2):
        while (have_rows("zone_contenu_2")):
          the_row();
          $title2 = get_sub_field("title");
          $content2 = get_sub_field("contenu");
        endwhile;
      endif;
      if ($zone3):
        while (have_rows("zone_contenu_3")):
          the_row();
          $title3 = get_sub_field("title");
          $content3 = get_sub_field("contenu");
        endwhile;
      endif;
      ?>
        <h2 class="presentation__title pres-grid-1">Le REPRAN</h2>
        <article class="presentation__part pres-grid-2">
          <h3><?php echo $title1; ?></h3>
          <p>
          <?php echo $content1; ?>

          </p>
          
        </article>

        <article class="presentation__part pres-grid-3">
        <h3><?php echo $title2; ?></h3>
        <p>
        <?php echo $content2; ?>
        </p>
        </article>
        <article class="presentation__part pres-grid-4">
        <h3><?php echo $title3; ?></h3>
          <p>
          <?php echo $content3; ?>

          </p>
        </article>
        <?php 
        $linkREPRAN = get_field("link_repran");
        $otherLink = get_field("autre_lien");
        $otherLinkLabel = get_field("other_link_label");
        
        ?>
        <div class="presentation__buttonList pres-grid-5">
          <button class="presentation__button button -white">
            <a href="<?php echo $linkREPRAN ?>">En savoir plus</a>
          </button>
          <?php if ($otherLink): ?>
          <button class="presentation__button button -white">
            <a href="<?php echo $otherLink ?>"><?php echo $otherLinkLabel ?></a>
          </button>
          <?php endif;?>
        </div>
        
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/formes/Vector-1.svg"
          alt="Forme vectorielle"
          class="presentation__stroke pres-grid-6"
        />
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/formes/Vector-2.svg"
          alt="Forme vectorielle"
          class="presentation__stroke pres-grid-7"
        />
        <img
          src="<?php echo $image1["url"]; ?>"
          class="presentation__img pres-grid-8"
          alt="<?php echo $image1["alt"]; ?>"
        />
        <img
        src="<?php echo $image2["url"]; ?>"
          class="presentation__img pres-grid-9"
          alt="<?php echo $image2["alt"]; ?>"

        />
        
  </section>
  <section class="monthNumber">
        <?php
        $monthNumber = get_field("the_number");
        $theLabel = get_field("number_label");
        ?>
        <h2>Le nombre du mois</h2>
        <p class="monthNumber__number bigTitle"><?php echo $monthNumber; ?></p>
        <h2 class="monthNumber__label">
        <?php echo $theLabel; ?>
        </h2>
        
  </section>
  <section>
      <?php
      $stat1 = get_field("statistique_1");
      $stat2 = get_field("statistique_2");
      $stat3 = get_field("statistique_3");
      $lienStat = get_field("lien_stat_msa");

      if ($stat1):
        while (have_rows("statistique_1")):
          the_row();
          $icone1 = get_sub_field("icone_stat");
          $label1 = get_sub_field("stat_label");
          $theStat1 = get_sub_field("the_stat");
        endwhile;
      endif;

      if ($stat2):
        while (have_rows("statistique_2")):
          the_row();
          $icone2 = get_sub_field("icone_stat");
          $label2 = get_sub_field("stat_label");
          $theStat2 = get_sub_field("the_stat");
        endwhile;
      endif;

      if ($stat3):
        while (have_rows("statistique_3")):
          the_row();
          $icone3 = get_sub_field("icone_stat");
          $label3 = get_sub_field("stat_label");
          $theStat3 = get_sub_field("the_stat");
        endwhile;
      endif;
      ?>
      <div class="stats">
        <div class="stats__stat">
          <div class="stats__iconZone">
            <span class="circleStat circle"></span>
            <img
              src="<?php echo $icone1["url"]; ?>"
              alt="<?php echo $icone1["alt"]; ?>"
              class="stats__icon icon"
            />
          </div>
          <h3 class="stats__title"><?php echo $label1; ?></h3>
          <p class="stats__number statText"><?php echo $theStat1; ?></p>
        </div>
        <div class="stats__stat">
          <div class="stats__iconZone">
            <span class="circleStat circle"></span>
            <img
              src="<?php echo $icone2["url"]; ?>"
              alt="<?php echo $icone2["alt"]; ?>"
              class="stats__icon icon"
            />
          </div>
          <h3 class="stats__title"><?php echo $label2; ?></h3>
          <p class="stats__number statText"><?php echo $theStat2; ?></p>
        </div>
        <div class="stats__stat">
          <div class="stats__iconZone">
            <span class="circleStat circle"></span>
            <img
              src="<?php echo $icone3["url"]; ?>"
              alt="<?php echo $icone3["alt"]; ?>"
              class="stats__icon icon"
            />
          </div>
          <h3 class="stats__title"><?php echo $label3; ?></h3>
          <p class="stats__number statText"><?php echo $theStat3; ?></p>
        </div>
      </div>
        
        <button class="button -darkBlue btnStat">
          <a target="_blank" href="<?php echo $lienStat; ?>">Voir plus de statistiques</a>
        </button>
  </section>
  <section class="prevention">
    <?php
    $titlePrev = get_field("titre_prev");
    $contentPrev = get_field("contenu_prev");
    $imagePrev = get_field("image_prev");
    $linkPrev = get_field("lien_prev");
    ?>
        <img
          src="<?php echo $imagePrev["url"]; ?>"
          alt="<?php echo $imagePrev["alt"]; ?>"
          class="prevention__img"
        />
        <div class="prevention__content">
          <h2><?php echo $titlePrev; ?></h2>
          <p>
          <?php echo $contentPrev; ?>
          </p>
          <button class="button -white">
            <a href="<?php echo $linkPrev; ?>">Voir plus</a>
          </button>
        </div>
  </section>
  <section class="news">
    <div class="backgroundRect"></div>
    <h2>Les actualités du REPRAN</h2>
    <div class="listNews">
      <?php
      $args = [
        "numberposts" => 3,
        "orderby" => "date",
        "order" => "DESC",
        "post_type" => "post",
        "post_status" => "publish",
      ];
      $recent_posts = get_posts($args);
      foreach ($recent_posts as $post):
        setup_postdata($post); ?>
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
      endforeach;
      wp_reset_postdata();
      ?>
          </div>
        <button class="button -darkBlue allNews">
          <a href="#">Voir toutes les actus</a>
        </button>
  </section>
  <section class="pathologiesAccueil">
    <?php
    $menu_items = wp_get_nav_menu_items("Pathologies");
    $imgPatho = get_field("image_pathologie");

    $titlesPatho = array_map(function ($menu_item) {
      return $menu_item->title;
    }, $menu_items);

    $linkPatho = array_map(function ($menu_url) {
      return $menu_url->url;
    }, $menu_items);
    ?>
        <img class="grid-1" src="<?php echo $imgPatho[
          "url"
        ]; ?>" alt="<?php echo $imgPatho["alt"]; ?>" />
        <div class="listPathos">
          <h2 class="grid-2">Les différentes pathologies</h2>
          <div class="listPathos__content">
            <div class="listPathos__item grid-3">
              <div class="listPathos__nameZone">
                <h3 class="listPathos__name"><?php echo $titlesPatho[0]; ?></h3>
              </div>
              <button class="button -darkBlue">
                <a href="<?php echo $linkPatho[0]; ?>">Voir plus</a>
              </button>
            </div>
            <div class="listPathos__item grid-4">
              <div class="listPathos__nameZone">
                <h3 class="listPathos__name">
                <?php echo $titlesPatho[1]; ?>
                </h3>
              </div>
              <button class="button -darkBlue">
                <a href="<?php echo $linkPatho[1]; ?>">Voir plus</a>
              </button>
            </div>
            <div class="listPathos__item grid-5">
              <div class="listPathos__nameZone">
                <h3 class="listPathos__name">
                <?php echo $titlesPatho[2]; ?>
                </h3>
              </div>
              <button class="button -darkBlue">
                <a href="<?php echo $linkPatho[2]; ?>">Voir plus</a>
              </button>
            </div>
            <div class="listPathos__item grid-6">
              <div class="listPathos__nameZone">
                <h3 class="listPathos__name">
                <?php echo $titlesPatho[3]; ?>
                </h3>
              </div>
              <button class="button -darkBlue">
                <a href="<?php echo $linkPatho[3]; ?>">Voir plus</a>
              </button>
            </div>
          </div>
        </div>
  </section>
  <!-- <section class="msa">
        <h2>Les MSA en France</h2>
        <div class="msa__content">
          <img src="<?php echo get_template_directory_uri(); ?>/img/carte_france.png" alt="Carte de la France" />
          <div class="listContact">
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
            <div class="cardContact">
              <h4 class="cardContact__name">MSA BFC</h4>
              <div class="cardContact__content">
                <p>Adresse : 4 Rue de la Paix</p>
                <p>Téléphone : 03 00 00 00 00</p>
                <p>Adresse mail : msabfc@franchecomte.msa.fr</p>
                <button class="button -darkBlue">
                  <a href="#">Voir les actus</a>
                </button>
              </div>
            </div>
          </div>
        </div>
  </section> -->
  <section class="temoignages">
    
        <div class="temoignages__zone">
          <div>
            <h2>Les témoignages</h2>
            <div class="temoignages__carrousel">
              <div class="temoignages__list">
              <?php
              $args2 = [
                "post_type" => "temoignages",
                "posts_per_page" => -1,
              ];

              $tems = get_posts($args2);
              foreach ($tems as $tem):

                setup_postdata($tem);
                $titleTem = $tem->post_title;
                $contentTem = $tem->post_content;
                ?>
                <div class="temoignages__item">
                  <h3 class="temoignages__itemTitle"><?php echo $titleTem; ?></h3>
                  <p class="temoignages__itemDesc">
                  <?php echo $contentTem; ?>
                  </p>
                </div>

                <?php
              endforeach;
              wp_reset_postdata();
              ?>
              </div>
            </div>
          </div>

          <div class="temoignages__index">
            <button><img
              src="<?php echo get_template_directory_uri(); ?>/img/icones/arrow_tem.svg"
              alt="Précédent"
              class="arrow_tem prev"
            />
            </button>
            
            <div class="circles">
              <?php
              $args2 = [
                "post_type" => "temoignages",
                "posts_per_page" => -1,
              ];

              $tems = get_posts($args2);

              foreach ($tems as $tem): ?>
              <div class="circle"></div>
              <?php endforeach;
              ?>

            </div>
            <button><img
              src="<?php echo get_template_directory_uri(); ?>/img/icones/arrow_tem.svg"
              alt="Suivant"
              class="arrow_tem next"
            /></button>
            
          </div>
        </div>
        <?php $imageTem = get_field("image_temoignage"); ?>
        <img
          src="<?php echo $imageTem["url"]; ?>"
          alt="<?php echo $imageTem["alt"]; ?>"
          class="temoignages__img"
        />

        
  </section>
</main>

<?php get_footer(); ?>
<script>
        carrousel();
    </script>
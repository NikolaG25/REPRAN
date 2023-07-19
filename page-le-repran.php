<?php get_header(); ?>

<main class="reseau">
<section class="hero">
        <h1 class="hero__name"><?php echo the_title(); ?></h1>
        <?php the_post_thumbnail(); ?>


        <div class="hero__desc">
        <?php
        $descREPRAN = get_field("desc_repran");
        $titleREPRAN = get_field("title_repran");
        ?>

          <h2 class="desc__title"><?php echo $titleREPRAN; ?></h2>
          <p>
            <?php echo $descREPRAN; ?>
          </p>
          
        </div>
      </section>
      <section class="members">
        <div class="members__section">
          <h2>La coordination nationale</h2>
          <ul class="members__list">
            <?php
            $i = [
              "post_type" => "members",
              "tax_query" => [
                [
                  "taxonomy" => "membre",
                  "field" => "slug",
                  "terms" => "coordination-nationale",
                ],
              ],
            ];
            $coor = get_posts($i);
            foreach ($coor as $post):
              setup_postdata($post); ?>
          
            <li class="members__member">
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title(); ?>"
                class="members__image"
              />
              <h3 class="members__name"><?php the_title(); ?></h3>
            </li>
            <?php
            endforeach;
            ?>
           
          </ul>
        </div>
        <div class="members__section">
          <h2>Les membres du réseau</h2>
          <ul class="members__list">
            <?php
            $j = [
              "post_type" => "members",
              "tax_query" => [
                [
                  "taxonomy" => "membre",
                  "field" => "slug",
                  "terms" => "membres-du-reseau",
                ],
              ],
            ];
            $mem = get_posts($j);
            foreach ($mem as $post):
              setup_postdata($post); ?>
          
            <li class="members__member">
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title(); ?>"
                class="members__image"
              />
              <h3 class="members__name"><?php the_title(); ?></h3>
            </li>
            <?php
            endforeach;
            ?>
           
          </ul>
        </div>        
        <div class="members__section">
          <h2>Nos experts</h2>
          <ul class="members__list">
            <?php
            $k = [
              "post_type" => "members",
              "tax_query" => [
                [
                  "taxonomy" => "membre",
                  "field" => "slug",
                  "terms" => "experts",
                ],
              ],
            ];
            $exp = get_posts($k);
            foreach ($exp as $post):
              setup_postdata($post); ?>
          
            <li class="members__member">
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title(); ?>"
                class="members__image"
              />
              <h3 class="members__name"><?php the_title(); ?></h3>
            </li>
            <?php
            endforeach;
            ?>
           
          </ul>
        </div>
      </section>

      <section class="objectifsSection">
        <h2>Les objectifs du REPRAN</h2>
        <ul class="objectifs">
            <?php
            $args = [
              "post_type" => "objectifs_repran",
              "numberposts" => -1,
              "post_status" => "publish",
            ];
            $query = get_posts($args);
            foreach ($query as $post):
              setup_postdata($post); ?>
          <li class="objectifs__item">
            <div class="objectifs__iconZone">
            <?php the_post_thumbnail(); ?>

            </div>

            <h3 class="objectifs__title">
            <?php the_title(); ?>
            </h3>
          </li>
           <?php
            endforeach;
            wp_reset_postdata();
            ?>         
        </ul>
      </section>
      <section class="call-fonct">
        <?php
        $titleCall = get_field("title_call");
        $contentCall = get_field("content_call");
        $imageCall = get_field("image_call");

        $titleFonct = get_field("title_fonct");
        $contentFonct = get_field("content_fonct");
        $imageFonct = get_field("image_fonct");
        ?>
        <div class="call">
          <img src="<?php echo $imageCall[
            "url"
          ]; ?>" alt="<?php echo $imageCall["alt"]; ?>" class="call__img" />
          <div class="call__content">
            <h2 class="call__title"><?php echo $titleCall; ?></h2>
            <p>
            <?php echo $contentCall; ?>
            </p>
        
          </div>
        </div>
        <div class="fonct">
          <div class="fonct__content">
            <h2 class="fonct__title"><?php echo $titleFonct; ?></h2>
            <p>
            <?php echo $contentFonct; ?>
            </p>
            
          </div>
          <img src="<?php echo $imageFonct[
            "url"
          ]; ?>" alt="<?php echo $imageFonct["alt"]; ?>" class="fonct__img" />
        </div>
      </section>
      <section class="social">
        <h2>Nos réseaux sociaux</h2>
        <div class="socialMedia">
          <div class="socialMedia__webinaires">
            <h2>Nos webinaires</h2>
            <div class="socialMedia__listVideo">
            <iframe class="youtubeIframe" width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLtLtQuozCI1079FrHvgLSa2henK_IXCNR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>

          <div class="socialMedia__twitter">
            <h2>Twitter</h2>
            <div class="socialMedia__listTweet">
            <a class="twitter-timeline" href="https://twitter.com/L_ThinkTank"  data-chrome="noheader nofooter noborders transparent" data-dnt="true">Tweets par le REPRAN</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>            
            </div>
        </div>
      </section>
      <section class="actors">
        <h2>Les acteurs du réseau</h2>
        <div class="actors__container">
          <h3>Professionnels MSA</h3>
          <ul class="actors__list">
            <?php
            $a = [
              "post_type" => "acteurs",
              "tax_query" => [
                [
                  "taxonomy" => "type-acteur",
                  "field" => "slug",
                  "terms" => "professionnels-msa",
                ],
              ],
            ];
            $proMSA = get_posts($a);
            foreach ($proMSA as $post):
              setup_postdata($post); ?>
            <li class="cardActor">
              <h4 class="cardActor__name">
                <?php the_title(); ?>
              </h4>

                <?php the_content(); ?>

              <div class="cardActor__button">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icones/fleche.svg" alt="Voir plus" />
              </div>
            </li>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
          </ul>
        </div>
        <div class="actors__container">
          <h3>Professionnels CHU</h3>
          <ul class="actors__list">
          <?php
          $b = [
            "post_type" => "acteurs",
            "tax_query" => [
              [
                "taxonomy" => "type-acteur",
                "field" => "slug",
                "terms" => "professionnels-chu",
              ],
            ],
          ];
          $proCHU = get_posts($b);
          foreach ($proCHU as $post):
            setup_postdata($post); ?>
            <li class="cardActor">
              <h4 class="cardActor__name">
                <?php the_title(); ?>
              </h4>

                <?php the_content(); ?>

              <div class="cardActor__button">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icones/fleche.svg" alt="Voir plus" />
              </div>
            </li>
            <?php
          endforeach;
          wp_reset_postdata();
          ?>
          </ul>
        </div>
        <div class="actors__container">
          <h3>Autres professionnels</h3>
          <ul class="actors__list">
          <?php
          $c = [
            "post_type" => "acteurs",
            "tax_query" => [
              [
                "taxonomy" => "type-acteur",
                "field" => "slug",
                "terms" => "autres-professionnels",
              ],
            ],
          ];
          $proAutre = get_posts($c);
          foreach ($proAutre as $post):
            setup_postdata($post); ?>
            <li class="cardActor">
              <h4 class="cardActor__name">
                <?php the_title(); ?>
              </h4>

                <?php the_content(); ?>


              <div class="cardActor__button">
                <img src="<?php echo get_template_directory_uri(); ?>/img/icones/fleche.svg" alt="Voir plus" />
              </div>
            </li>
            <?php
          endforeach;
          wp_reset_postdata();
          ?>
          </ul>
        </div>
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
    actor();
  </script>
<?php get_header(); ?>

<main class="documentation" style="margin-top: 75px;">
<form action="#" method="POST" id="filter">
  <div class="docu_type docu_filter_div">
  <?php $termsType = get_terms(["taxonomy" => "type-de-document"]);
    $termsTypeAr = [];
    foreach ($termsType as $termType) {
      $termsTypeAr[] = $termType->term_id;
    } 
    
    ?>
    <input type="radio" value="all_types" id="all_types" name="type_docu_filters"  ><label for="all_types">Tous les types</label>
    <?php if ($terms = get_terms(["taxonomy" => "type-de-document"])):
      foreach ($terms as $term):
        echo '<input type="radio" id="' .
          $term->term_id .
          '" value="' .
          $term->term_id .
          '" name="type_docu_filters" class="type_filters"/><label for="' .
          $term->term_id .
          '">' .
          $term->name .
          "</label>";
      endforeach;
    endif; ?>

  </div>
  
  <div class="docu_pathos docu_filter_div">
    <?php $termsPatho = get_terms(["taxonomy" => "pathologie-document"]);
    $pa = get_taxonomy( "pathologie-document" );
    $termsPathoAr = [];
    foreach ($termsPatho as $termPatho) {
      $termsPathoAr[] = $termPatho->term_id;
    } 
    
    ?>

    <input type="radio" value="all_pathos" id="all_pathos" name="pathos_docu_filters"><label for="all_pathos">Toutes les pathologies</label>
    <?php if ($terms = get_terms(["taxonomy" => "pathologie-document", 'hide_empty' => false])):
      foreach ($terms as $term):
        echo '<input type="radio" id="' .
          $term->term_id .
          '" value="' .
          $term->term_id .
          '" name="pathos_docu_filters" class="pathos_filters"/><label for="' .
          $term->term_id .
          '">' .
          $term->name .
          "</label>";
      endforeach;
    endif; ?>


  </div>
  
  <input id="load_more" type="hidden" name="action" value="ccdocufilter" />


</form>

        
<?php 

$paged = get_query_var("paged") ? get_query_var("paged") : 1;
$args = [
  "post_type" => "documents",
  "posts_per_page" => -1,
  "paged" => $paged,
];
$query = new WP_Query($args);
?>
			<?php if ($query->have_posts()): ?>
		    <div id="docu_wrap">
			      <?php while ($query->have_posts()):

            $query->the_post();
            $taxonomies = ["pathologie-document", "type-de-document"];
            $termsArray = wp_get_object_terms($post->ID, $taxonomies, [
              "orderby" => "term_order",
            ]);
            $termsString = "";
            foreach ($termsArray as $term) {
              $termsString .= $term->slug . " ";
            }
            ?>

          <div class="cardDocu">
          <?php 
            $authors = get_field('auteurs');
            $color = get_field('color_doc');

            $type = "";

            foreach ($termsArray as $x) {
              if ($x->taxonomy === "type-de-document") {
                $type = $x->name;
              }
            }
          ?>
          <?php 
            if ($color === "Orange"):
            ?>
            <h3 class="cardDocu__header -orange"><?php echo $type ?></h3>
          <?php endif; ?>      
          <?php 
            if ($color === "Bleu foncé"):
            ?>
            <h3 class="cardDocu__header -darkBlue"><?php echo $type?></h3>
          <?php endif; ?>      
          <?php 
            if ($color === "Bleu clair"):
            ?>
            <h3 class="cardDocu__header -lightBlue"><?php echo $type?></h3>
          <?php endif; ?>
          <div class="cardDocu__content">
            <h4 class="bold">
            <?php echo the_title(); ?>
            </h4>
            <p>
            <?php echo $authors ?>
            </p>
          </div>
          <?php 
            $linkDocu = get_field('lien');
            $linkFile = get_field('fichier');
            $format = get_field('format_du_document');

            $link = "";
            if ($linkDocu && $format === "Lien") {
              $link = $linkDocu;
            } else {
              $link = $linkFile;
            }
            ?>
          <?php
            if ($color === "Orange"):
              ?>
            <button class="button -orange">
              <a target="_blank" href="<?php echo $link ?>">Voir le document</a>
            </button>
          <?php endif; ?>      
          <?php 
            if ($color === "Bleu foncé"):
              ?>
            <button class="button -darkBlue">
              <a target="_blank" href="<?php echo $link ?>">Voir le document</a>
            </button>
          <?php endif; ?>      
          <?php 
            if ($color === "Bleu clair"):
              ?>
            <button class="button -lightBlue">
              <a target="_blank" href="<?php echo $link ?>">Voir le document</a>
            </button>
          <?php endif; ?>
        </div>
      <?php
        endwhile;endif ?>
  </div>  

</main>

<script>
	var posts_myajax = '<?php echo serialize($query->query_vars); ?>',
    current_page_myajax = 1,
    max_page_myajax = <?php echo $query->max_num_pages; ?>
</script>

<?php get_footer(); ?>
<script src="<?php bloginfo("template_url"); ?>/js/load-more.js"></script>

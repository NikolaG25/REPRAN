<?php


add_action("wp_ajax_ccdocufilter", "cc_docu_filter_function");
add_action("wp_ajax_nopriv_ccdocufilter", "cc_docu_filter_function");

function cc_docu_filter_function()
{
  if (
    isset($_POST["type_docu_filters"]) ||
    isset($_POST["pathos_docu_filters"])
  ) {
    $args = [
      "post_type" => "documents",
      "posts_per_page" => -1,
      "tax_query" => [
        "relation" => "OR",
        [
          "taxonomy" => "pathologie-document",
          "field" => "term_id",
          "terms" => $_POST["pathos_docu_filters"],
        ],
        [
          "taxonomy" => "type-de-document",
          "field" => "term_id",
          "terms" => $_POST["type_docu_filters"],
        ],
      ],
    ];
  }
  if (
    isset($_POST["type_docu_filters"]) &&
    isset($_POST["pathos_docu_filters"])
  ) {
    $args = [
      "post_type" => "documents",
      "posts_per_page" => -1,
      "tax_query" => [
        "relation" => "AND",
        [
          "taxonomy" => "pathologie-document",
          "field" => "term_id",
          "terms" => $_POST["pathos_docu_filters"],
        ],
        [
          "taxonomy" => "type-de-document",
          "field" => "term_id",
          "terms" => $_POST["type_docu_filters"],
        ],
      ],
    ];
  }

  if (
    (isset($_POST["type_docu_filters"]) &&
      $_POST["type_docu_filters"] == "all_types") ||
    (isset($_POST["pathos_docu_filters"]) &&
      $_POST["pathos_docu_filters"] == "all_pathos")
  ) {
    $termsType = get_terms(["taxonomy" => "type-de-document"]);
    $termsTypeAr = [];
    foreach ($termsType as $termType) {
      $termsTypeAr[] = $termType->term_id;
    }
    $termsPatho = get_terms(["taxonomy" => "pathologie-document"]);
    $termsPathoAr = [];
    foreach ($termsPatho as $termPatho) {
      $termsPathoAr[] = $termPatho->term_id;
    }
    $args = [
      "post_type" => "documents",
      "posts_per_page" => -1,
      "tax_query" => [
        "relation" => "OR",
        [
          "taxonomy" => "pathologie-document",
          "field" => "term_id",
          "terms" => $termsPathoAr,
        ],
        [
          "taxonomy" => "type-de-document",
          "field" => "term_id",
          "terms" => $termsTypeAr,
        ],
      ],
    ];
  }



  if (
    (isset($_POST["type_docu_filters"]) &&
      $_POST["type_docu_filters"] == "all_types") &&
    (isset($_POST["pathos_docu_filters"]))
  ) {
    $termsType = get_terms(["taxonomy" => "type-de-document"]);
    $termsTypeAr = [];
    foreach ($termsType as $termType) {
      $termsTypeAr[] = $termType->term_id;
    }
    $args = [
      "post_type" => "documents",
      "posts_per_page" => -1,
      "tax_query" => [
        "relation" => "AND",
        [
          "taxonomy" => "pathologie-document",
          "field" => "term_id",
          "terms" => $_POST["pathos_docu_filters"],
        ],
        [
          "taxonomy" => "type-de-document",
          "field" => "term_id",
          "terms" => $termsTypeAr,
        ],
      ],
    ];
  }

  if (
    isset($_POST["type_docu_filters"]) &&
       
    (isset($_POST["pathos_docu_filters"]) &&
      $_POST["pathos_docu_filters"] == "all_pathos")
  ) {
  
    $termsPatho = get_terms(["taxonomy" => "pathologie-document"]);
    $termsPathoAr = [];
    foreach ($termsPatho as $termPatho) {
      $termsPathoAr[] = $termPatho->term_id;
    }
    $args = [
      "post_type" => "documents",
      "posts_per_page" => -1,
      "tax_query" => [
        "relation" => "AND",
        [
          "taxonomy" => "pathologie-document",
          "field" => "term_id",
          "terms" => $termsPathoAr,
        ],
        [
          "taxonomy" => "type-de-document",
          "field" => "term_id",
          "terms" => $_POST["type_docu_filters"],
        ],
      ],
    ];
  }

  if (
    (isset($_POST["type_docu_filters"]) &&
      $_POST["type_docu_filters"] == "all_types") &&
    (isset($_POST["pathos_docu_filters"]) &&
      $_POST["pathos_docu_filters"] == "all_pathos")
  ) {
    $termsType = get_terms(["taxonomy" => "type-de-document"]);
    $termsTypeAr = [];
    foreach ($termsType as $termType) {
      $termsTypeAr[] = $termType->term_id;
    }
    $termsPatho = get_terms(["taxonomy" => "pathologie-document"]);
    $termsPathoAr = [];
    foreach ($termsPatho as $termPatho) {
      $termsPathoAr[] = $termPatho->term_id;
    }
    $args = [
      "post_type" => "documents",
      "posts_per_page" => -1,
      "tax_query" => [
        "relation" => "AND",
        [
          "taxonomy" => "pathologie-document",
          "field" => "term_id",
          "terms" => $termsPathoAr,
        ],
        [
          "taxonomy" => "type-de-document",
          "field" => "term_id",
          "terms" => $termsTypeAr,
        ],
      ],
    ];
  }

  $query = new WP_Query($args);
  if ($query->have_posts()):
    ob_start();
    while ($query->have_posts()):

      $query->the_post();

      $taxonomies = get_object_taxonomies(["post_type" => "documents"]);
      $termsArray = get_the_terms($post->ID, $taxonomies);
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
    endwhile;
    $posts_html = ob_get_contents();
    ob_end_clean();
  else:
    $posts_html = "<p>Aucun résultat.</p>";
  endif;
  echo json_encode([
    "posts" => json_encode($query->query_vars),
    "max_page" => $query->max_num_pages,
    "found_posts" => $query->found_posts,
    "content" => $posts_html,
  ]);
  die();
}

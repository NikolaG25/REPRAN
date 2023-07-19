<?php get_header(); ?>



<main class="singleActu">
	<h1 class="siteHeading">
    <?php the_title(); ?>
	</h1>
    <div class="content">
        <?php
        if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        endif;
        ?>  
    </div>

</main>
<?php get_footer(); ?>
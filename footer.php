        <button class=scroll-top><img
              src="<?php echo get_template_directory_uri(); ?>/img/icones/arrow_tem.svg"
              alt="Remonter en haut de la page"
              class="scroll-top__arrow"
            /></button>
        <footer class="footer">
            <?php 

                $menu_id = "26";

                $mail = get_field("mail", "nav_menu_".$menu_id);
                $tel = get_field("num_tel", "nav_menu_".$menu_id);
                $adre = get_field("adresse", "nav_menu_".$menu_id);
                $mentions = get_field("mentions_legales", "nav_menu_".$menu_id);
                $access = get_field("accessibilite", "nav_menu_".$menu_id);
                $linkAccess = get_field("link_access", "nav_menu_".$menu_id);
                $cookie = get_field("cookie","nav_menu_".$menu_id);
                $conf = get_field("conf","nav_menu_".$menu_id);
            ?>
            <?php 
                $custom_logo = the_custom_logo(  );
                $logo = wp_get_attachment_image_src( $custom_logo , 'full' );
            ?> 
            <div class="footer__contact">
                <h2 class="footer__title">Contact</h2>
                <ul class="footer__contactList">
                    <li class="footer__contactItem"><p>Adresse mail : </p><a href="mailto:<?php echo $mail ?>"><?php echo $mail ?></a></li>
                    <li class="footer__contactItem"><p>N° de téléphone : </p><a href="tel:+33<?php echo $tel ?>"><?php echo $tel ?></a></li>
                    <li class="footer__contactItem"><p>Adresse : <?php echo $adre ?></p></li>
                </ul>
            </div>
            <div class="footer__nav">
                <h2 class="footer__title">Navigation</h2>
            <?php wp_nav_menu( array( 
                  'theme_location' => 'footer',
                  'container' => 'ul',
                  'menu_class' => 'footer__navList',
          ) ); ?>
            </div>
            <div class="footer__infos">
                <h2 class="footer__title">Infos pratiques</h2>
                <ul class="footer__infosList">
                    <li class="footer__infosItem"><a href="<?php echo $mentions  ?>">Mentions légales</a></li>
                    <li class="footer__infosItem"><a href="<?php echo $cookie  ?>">Politique des cookies</a></li>
                    <li class="footer__infosItem"><a href="<?php echo $conf  ?>">Politique de confidentialité</a></li>
                    <li class="footer__infosItem"><p>Accessibilité : </p><a href="<?php echo $linkAccess ?>" target="_blank" rel="noopener noreferrer"><?php echo $access ?></a></li>
                    <li class="footer__infosItem"><a href="mailto:<?php echo $mail ?>">Un problème à signaler ?</a></li>
                </ul>
            </div>
        </footer>
    <?php wp_footer(); ?>
    </body>
    <script src="<?php bloginfo("template_url"); ?>/js/scroll-top.js"></script>
</html>
<?php
/**
 * Theme Footer
 * 
 * @package Nittambuwa
 */
?>
        </div> <!-- content -->
    <footer style="background-color:<?php echo get_theme_mod('city_menu_color'); ?>;" class="relative  shadow flex justify-between text-white p-2 pb-2 ">
        <?php
        // get footer sidebar
        if (is_active_sidebar('footer-sidebar')) {
            dynamic_sidebar('footer-sidebar');
        }
        ?>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>
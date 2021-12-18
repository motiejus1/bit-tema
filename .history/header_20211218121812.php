<header class="site-header">
    

    <div class="site-logo">
        <img src="<?php echo get_site_ ?>" />
    </div>

    <p class="site-title">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
        </a>
    </p>
    <p class="site-description">
        <?php bloginfo('description'); ?> 
    </p>
    <?php 
        wp_nav_menu(array(
            'theme_location'=> 'menu-1'
        ));
    ?>
</header>
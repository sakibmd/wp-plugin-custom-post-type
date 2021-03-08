<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header();?>

<div class="wrap">
	<?php if (is_home() && !is_front_page()): ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title();?></h1>
		</header>
	<?php else: ?>
	<header class="page-header">
		<h2 class="page-title"><?php _e('Posts', 'twentyseventeen');?></h2>
	</header>
	<?php endif;?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <h1 class="text-center font-weight-bold"> <?php _e('Custom Post List', 'twentyseventeen')?> </h1>
            <hr>




			<?php

$_p = new WP_Query(array(
    'post_type' => 'book',
    'post__not_in' => array(43,44)
));

if ($_p->have_posts()):

    // Start the Loop.
    while ($_p->have_posts()):
        $_p->the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that
         * will be used instead.
         */
        get_template_part('template-parts/post/content', get_post_format());

    endwhile;
    wp_reset_query();

    the_posts_pagination(
        array(
            'prev_text' => twentyseventeen_get_svg(array('icon' => 'arrow-left')) . '<span class="screen-reader-text">' . __('Previous page', 'twentyseventeen') . '</span>',
            'next_text' => '<span class="screen-reader-text">' . __('Next page', 'twentyseventeen') . '</span>' . twentyseventeen_get_svg(array('icon' => 'arrow-right')),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentyseventeen') . ' </span>',
        )
    );

else:

    get_template_part('template-parts/post/content', 'none');

endif;
?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar();?>
</div><!-- .wrap -->

<?php
get_footer();

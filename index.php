<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage fbceldon
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<?php get_template_part( 'template-parts/banner' ); ?>
<section class="content">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="entry">
	            <?php the_content(); ?>
            </div>
        <?php endwhile; else : ?>
 	        <p><?php esc_html_e( 'Sorry, no content matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

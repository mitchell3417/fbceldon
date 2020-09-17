<?php
/**
 * Template Name: About Page
 */

get_header(); ?>

<?php get_template_part( 'template-parts/banner' ); ?>
<!-- The loop -->
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

<!-- Staff -->
<section class="content">
    <div class="container container--staff">
        <h2 class="text--center">Our Staff</h2>
        <div class="staff flex">
            <?php
            // check if the flexible content field has rows of data
            if( have_rows('staff_flex') ):

                 // loop through the rows of data
                while ( have_rows('staff_flex') ) : the_row();

                    if( get_row_layout() == 'ministerial_staff' ):
                        $image = get_sub_field('image');?>

                        <div class="ministerial-staff col--12">
                            <div class="staff__image">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" target="<?php echo $image['target']; ?>">
                            </div>
                            <div class="staff__text">
                                <h5><?php the_sub_field('name'); ?></h5>
                                <p><small class="staff__title"><?php the_sub_field('title'); ?></small></p>
                                <p><small><?php the_sub_field('email'); ?></small></p>
                            </div>
                        </div>
                        <div class="staff__bio col--12">
                            <p><?php the_sub_field('bio'); ?></p>
                        </div>

                    <?php elseif( get_row_layout() == 'support_staff' ):
                        $image = get_sub_field('image'); ?>

                        <div class="support-staff col--12 col__md--6">
                            <div class="staff__image">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" target="<?php echo $image['target']; ?>">
                            </div>
                            <div class="staff__text">
                                <h5><?php the_sub_field('name'); ?></h5>
                                <p><small><?php the_sub_field('title'); ?></small></p>
                                <p><small><?php the_sub_field('email'); ?></small></p>
                            </div>

                        </div>

                    <?php endif;

                endwhile;

            else :

                // no layouts found

            endif;
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>

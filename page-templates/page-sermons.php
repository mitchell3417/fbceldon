<?php
/* Template Name: Sermons Home */
?>

<?php get_header(); ?>

<?php get_template_part( 'template-parts/banner' ); ?>

<main class="sermons">
    <!-- SECTION INTRO PARAGRAPH -->
    <?php if(!empty(get_field('intro'))) : ?>
        <section class="section section--text section--intro-paragraph">
            <div class="container">
                <div class="text__content col col--12 col__md--8">
                    <?php the_field('intro'); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    //ARGUMENTS FOR CUSTOM WP QUERY
    $args = array(
    	'posts_per_page'   => 12,
    	'post_type'        => 'sermons',
    );
    $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    //CUSTOM WP QUERY FOR SERMONS
    $the_query = new WP_Query( $args );
    // Pagination fix
    $temp_query = $wp_query;
    $wp_query   = NULL;
    $wp_query   = $the_query;
    //FIRE UP THE LOOP
    if( $the_query->have_posts() ):
    //VARIABLES FOR SERMONS POST TYPE
    $video = get_field('video_link');
    $video_url = get_field('video_link', FALSE, FALSE);
    $video_thumb_url = get_video_thumbnail_uri($video_url);
    $date = $date = get_field('date', false, false);
    $date = new DateTime($date);
    ?>
        <!-- SECTION SERMON LISTINGS -->
        <section class="section section--sermon-listings background">
            <div class="background-overlay">
                <div class="container">
                    <div class="staff-primary__content flex">
                        <!-- HEADING -->
                            <div class="section__title col col--12 text--center">
                                <h1>Recent Messages</h1>
                                <h5>Our Latest Sermons</h5>
                            </div>

                        <div  class="heading-text__text col col--12 flex flex-between">
                            <?php
                            // THE LOOP
                            while( $the_query->have_posts() ) : $the_query->the_post();
                            get_template_part( 'template-parts/listing-sermon', '3-column' );
                            endwhile; //END OF THE LOOP ?>
                        </div>
                    </div>
                <hr></hr>
                <!-- PAGINATION -->
                <div class="nav--pagination">
                    <?php the_posts_pagination( array(
                    	'mid_size'  => 2,
                    	'prev_text' => __( 'Prev Page', 'crosspoint' ),
                    	'next_text' => __( 'Next Page', 'crosspoint' ),
                    ) ); ?>
                </div>
                </div>
            </div>
        </section><!-- end section--sermon-listings -->
        <?php
    endif;
    // Reset main query object
    $wp_query = NULL;
    $wp_query = $temp_query; ?>


</main>

<?php get_footer(); ?>

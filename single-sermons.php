<?php get_header(); ?>

<main>

    <?php
    if( have_posts() ): while( have_posts() ) : the_post();
    // VARIABLES
    $video = get_field('video_link');
    $audio = get_field('audio_file');
    $audio_url = $audio['url'];
    $date = $date = get_field('date', false, false);
    $date = new DateTime($date);
    $speakers = get_field( 'preacher' );
    ?>

        <!-- VIDEO AND AUDIO OF SERMON -->
        <section class="section section--sermon-video background">
            <div class="background-overlay">
                <div class="container">
                    <div class="sermon__content">
                        <!-- VIDEO -->
                        <div class="sermon__video video-container<?php if (empty($video)) {echo ' display-none';} ?>">
                            <?php echo $video; ?>
                        </div>
                        <!-- AUDIO -->
                        <div class="sermon__audio<?php if (!empty($video)) {echo ' display-none';} ?>">
                            <?php echo do_shortcode("[audio src='$audio_url']"); ?>
                        </div>
                        <!-- TITLE -->
                        <div class="sermon__info flex flex--between flex--middle">
                            <h1><?php the_title(); ?></h1>
                            <?php if (!empty($video) && !empty($audio_url)): ?>
                                <div class="sermon__buttons">
                                    <button class="sermon__watch active" type="button">Watch
                                    <button class="sermon__listen" type="button">Listen
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- SPEAKER -->
                        <div class="flex flex--between">
                            <?php if (!empty($speakers)): ?>
                                <div class="">
                                    <h6 class="alt">Preacher</h6>
                                    <p>
                                        <?php if ( $speakers && ! is_wp_error( $speakers ) ) :
                                            echo $speakers;
                                        endif; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <!-- DATE -->
                            <?php if (!empty($date)): ?>
                                <div class="">
                                    <h6 class="alt">Date</h6>
                                    <p><?php echo $date->format('F j, Y'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- NEXT and PREVIOUS SERMONS -->
                        <div class="flex flex--between">
                            <?php if (!empty(get_previous_post())) : ?>
                            <div class="">
                                <h6 class="alt">Previous Sermon</h6>
                                <p><?php previous_post_link('%link') ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty(get_next_post())) : ?>
                            <div class="">
                                <h6 class="alt">Next Sermon</h6>
                                <p><?php next_post_link('%link'); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- end section--sermon-video -->

        <!-- DESCRIPTION AND SHARE -->
        <section class="section section--sermon-description background">
            <div class="container">
                <div class="sermon-description flex">
                    <!-- LONG SERMON DESCRIPTION -->
                    <?php if ( !empty(get_field('long_description')) || !empty(get_field('short_description')) ): ?>
                        <p class="col col--12 col__md--8"><?php if ( !empty(get_field('long_description')) ) {the_field( 'long_description' );} else {the_field( 'short_description' );} ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php endwhile; //END THE LOOP?>

    <?php endif; ?>

    <?php //GET THE QUERY FOR ALL SERMONS IN CURRENT SERIES
    $args = array(
        'posts_per_page'        => 3,
        'post_type'             => 'sermons',
        'post_status'           => 'publish',
        'date_query' => array(
            array(
                'column'            => 'post_date',
            ),
        ),
    );
    $the_query = new WP_Query( $args );
    //FIRE UP THE LOOP
    if( $the_query->have_posts() ):  ?>

        <!-- OTHER SERMONS -->
        <section class="section section--other-sermons background">
            <div class="container">
                <div class="heading">
                    <h1 class="text--center">Recent Sermons</h1>
                    <h5 class="text--center"></h5>
                </div>
                <div class="sermon-series flex">
                    <?php
                    while( $the_query->have_posts() ) : $the_query->the_post();
                        get_template_part( 'template-parts/listing-sermon', '3-column' );
                    endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; wp_reset_query(); ?>
</main>

<?php get_footer(); ?>

<div class="container current-sermon">
    <h2 style="text-align: center;">Latest Sermon</h2>
    <div class="video sermon">
        <?php
        $args = array(
            'posts_per_page'        => 1,
            'post_type'             => 'sermons',
            'post_status'           => 'publish',
        );
        $query = new WP_Query( $args );
        // The Loop!
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
            // get iframe HTML
            $post_id = $post->id;
            $url = get_field('video_link', $post_id);
            print_r($url);
            // get the video id
            parse_str( parse_url( $url, PHP_URL_QUERY ), $src );
        endwhile;
        endif;
        ?>
        <iframe width="800" height="450" type="text/html" src="https://www.youtube.com/watch?<?php echo $src['v']; ?>?fs=1&modestbranding=0&max-results=1&controls=1&showinfo=0&rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

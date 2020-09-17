<?php
//VARIABLES
$video = get_field('video_link');
$video_url = get_field('video_link', FALSE, FALSE);
$video_thumb_url = get_video_thumbnail_uri($video_url);
$date = get_field('date', false, false);
$date = new DateTime($date);
$speakers = get_field( 'preacher' );
?>
    <div  class="recent-sermons__sermons col col--12 col__md--4">
        <div class="recent-sermons__thumbnail">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $video_thumb_url; ?>"/>
            </a>
            <a href="<?php the_permalink(); ?>">
                <div class="play-button"></div>
            </a>
        </div>
        <small><?php
        if(!empty($date)){echo $date->format('F j, Y');}
        if(!empty($speakers) && !empty($date)){echo ' | ';}
        if(!empty($speakers)){echo $speakers;}
        ?></small>
        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p><?php the_field('short_description') ?></p>
    </div>

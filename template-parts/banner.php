<?php
// Banner height
$h = '18em'; //default height
if (is_front_page()) { $h = '44em'; } //front page height

//Background image url
$bkgd_imgs = array();
    if (!empty(rwmb_meta('fbc_page_banner_img'))) {

        $bkgd_imgs = rwmb_meta('fbc_page_banner_img', array(
            'size' => 'original',
            'limit' => 1,
        ) );

        $bkgd_img_url = $bkgd_imgs[0][url];

    } elseif (!empty(rwmb_meta('fbc_default_banner_img', array('object_type' => 'setting'), 'fbc_options'))) {

        $bkgd_imgs = rwmb_meta('fbc_default_banner_img', array(
            'object_type' => 'setting',
            'size' => 'original',
            'limit' => 1,
        ), 'fbc_options');

        $bkgd_img_url = $bkgd_imgs[0]['url'];

    } else {
        $bkgd_img_url = '#';
    }
?>

<section class="banner" style="background-image: url('<?php echo $bkgd_img_url; ?>'); height: <?php echo $h ?>;">
    <div class="container content-container">
        <?php if (is_front_page()) :?>
            <h1>We're Saving a Seat for You</h1>
            <p>We are followers of Jesus Christ who seek to honor God through worship, introducing our friends to Jesus, growing in personal discipleship, and reaching out to the world in Christian love. Wherever you are on your journey we're saving a seat for <strong>YOU!</strong></p>
            <a href="#wte" class="button banner-button">What to Expect</a>
        <?php else : ?>
            <h1><?php echo get_the_title(); ?></h1>
        <?php endif; ?>
    </div>
</section>

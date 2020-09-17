<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "content--primary" div.
 *
 * @package WordPress
 * @subpackage Maryville
 * @since Maryville 1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!-- Google Chrome Frame for IE -->
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- google fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700|Roboto+Slab:100,300,400,700" media="screen">

  <!-- wordpress head functions -->
  <?php wp_head(); ?>
  <!-- end of wordpress head -->

  <!-- icons & favicons -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Google site verification -->
  <meta name="google-site-verification" content="NSssOY3Q7rKKVCZ7ZeghIdJzBlbWywXLX87C3koxBiE" />

  <!-- Default Social Images -->
  <meta name="twitter:image:src" content="<?php echo get_stylesheet_directory_uri(); ?>/images/img-social.png">
  <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/img-social.png" />

  <!-- Google Analytics -->
  <?php
    $google_analytics_id = esc_html( get_option( 'options_google_analytics_id' ) );
    if ($google_analytics_id): ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?php echo $google_analytics_id; ?>', 'auto');
      ga('send', 'pageview');
    </script>
  <?php endif ?>
  <meta name="google-site-verification" content="eU0e2yEJ5nMi-Il2oKEctIUlZwf_-P4DhCO3iL8rI7U" />

  <!-- Other Header Scripts -->
  <?php
    $header_scripts = get_option( 'options_header_scripts' );

    if ($header_scripts):
      echo $header_scripts;
    endif
  ?>
</head>

<?php
//Grabbing metabox information
$h_logo = array();
$logo_url = '#';
$logo_alt = 'First Baptist Church of Eldon Logo';

if (!empty(rwmb_meta('fbc_header_logo', array('object_type' => 'setting'), 'fbc_options'))) {
    $h_logo = rwmb_meta('fbc_header_logo', array(
        'object_type' => 'setting',
        'size' => 'original',
        'limit' => 1,
    ), 'fbc_options');
    $logo_url = $h_logo[0][url];
    $logo_alt = $h_logo[0][alt];
} else {
    $logo_url = get_template_directory_uri() . '/images/logo/fbc-full-logo-white.png';
}
?>


<body <?php body_class(); ?>>
    <?php date_default_timezone_set("America/Chicago");
    if (date('N') == 7 && date('Hi') >= 1050 && date('Hi') < 1200):?>
        <div class="stream-alert flex flex--center">
            <a href="https://www.youtube.com/channel/UC3v1Ut-NyWx8a90spxiNSUQ" target="_blank">CLICK HERE to watch the sermon live. It usually begins around 11:20 CST/CDT</a>
        </div>

    <?php endif; ?>
    <nav id="right-nav" role="navigation" class="right-nav">
        <?php wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'container' => false,
            'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="menu-item close-menu"><a><span class="dashicons dashicons-no-alt"></span>Close navigaion menu</a></li>%3$s</li></ul>',
        ) );?>
    </nav>
<header id="masthead" class="header header--primary" role="banner">
    <div class="container">
        <div class="header-flex flex flex--between flex--middle">
            <div class="header__logo">
                <?php if ( $logo_url != '#' ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo_url ?>" alt="<?php echo $logo_alt ?>"></a>
                <?php else: ?>
                    <h2 class="header-site-title"><?php bloginfo( 'name' ); ?></h2>
                <?php endif; ?>
            </div>
            <div>
                <a id="menu-trigger" alt="Toggle Menu" class="flex flex--between">
                    <span>Menu</span>
                    <span class="dashicons dashicons-menu"></span>
                </a>
            </div>
        </div>
    </div>
</header>

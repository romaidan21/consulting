<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-16CFPGSFTB"></script> -->
    <!-- <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-16CFPGSFTB');
    </script> -->
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="<?php bloginfo('html_type');?>"
          charset="<?php bloginfo('charset');?>">
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php get_template_part('templates/preloader');?>

<header style="opacity: 0">
    <div class="header">
        <div class="header__logo">
            <?php if (is_front_page()) {?>
                <a href="#welcome">
                    <?php svg_embed('logo.svg')?>
                </a>
            <?php } else {?>
                <a href="<?php echo home_url() ?>">
                    <?php svg_embed('logo.svg')?>
                </a>
            <?php }?>
        </div>
        <div class="nav">

            <?php $url = 'full-menu';
if (is_front_page()) {
    $url = 'top_menu';
}
?>

                <div class="header__nav">
                    <a href="" style="display:none;"></a>
                    <?php
$top_menu = [
    'theme_location' => $url,
    'container' => false,
    'echo' => false,
    'items_wrap' => '%3$s',
];
echo strip_tags(wp_nav_menu($top_menu), '<a>');
?>
                </div>

                <div class="click-sec">
                    <span></span>
                    <span></span>
                    <span></span>
                    <?php svg_embed('close.svg');?>
                </div>

<!--            --><?php //} ?>
            <?php lang_switch();?>

        </div>
    </div>
</header>
<main style="opacity: 0">
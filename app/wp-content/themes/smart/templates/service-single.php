

<section class="welcome service-page">
    <div class="welcome__text">
        <h1 class="before"><?php the_title() ?></h1>
        <?php the_content(); ?>

        <?php $faqs = get_field('question-block');
        if ($faqs) : ?>
            <div class="faq">
                <?php foreach ($faqs as $faq) : ?>
                    <div class="question">
                        <h2><?php echo $faq['s-question']; ?></h2>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>


    </div>
    <div class="welcome__icon">
        <?php the_post_thumbnail(); ?>
    </div>
</section>


<?php $content = get_field('s-content');
if ($content) { ?>
    <?php foreach ($content as $cont) : ?>
        <section class="service-content">
            <span class="i-bg i-bg-1"></span>
            <span class="i-bg i-bg-2"></span>
            <span class="i-bg i-bg-3"></span>
            <span class="i-bg i-bg-4"></span>
            <span class="s-icon s-icon-1"></span>
            <span class="s-icon s-icon-2"></span>
            <div class="title">
                <span class="icons"></span>
                <h2><?php echo $cont['ser-title']; ?>
                    <span><?php echo file_get_contents($cont['ser-icon']); ?></span>
                </h2>
                <p class="desc">
                    <?php echo $cont['ser-desc']; ?>
                </p>
            </div>
            <?php $lists = $cont['ser-lists'];
            if ($lists) : ?>
                <div class="service-content__lists">
                    <?php foreach ($lists as $l) : ?>
                        <div class="list">
                            <span class="i">
                                <?php if ($l['select']) { ?>
                                    <?php echo file_get_contents($l['icon']); ?>
                                <?php } else { ?>
                                    <?php svg_embed('ok.svg'); ?>
                                <?php } ?>
                            </span>
                            <p><?php echo $l['list']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>
<?php } ?>


<?php $features = get_field('features');
if ($features) : ?>
    <section class="feature">
        <h1 class="before"><?php the_field('features-title'); ?></h1>

        <?php foreach ($features as $f) : ?>
            <div class="list">
                <span class="i">
                    <img src="<?php assets(); ?>/img/money.svg" alt="">
                </span>
                <p><?php echo $f['feature']; ?></p>
            </div>
        <?php endforeach; ?>
        <span class="i-bg i-bg-1"></span>
        <span class="i-bg i-bg-2"></span>
        <span class="s-icon s-icon-1"></span>
        <span class="s-icon s-icon-2"></span>
    </section>

<?php endif; ?>


<section id="form" class="form">
    <?php echo do_shortcode('[contact-form-7 id="5"]'); ?>
    <span class="s-icon"></span>
    
    <div class="sent-pop-up">
        <div class="content">
            <h1> <?php _e('Дякуємо', 'smart');?></h1>
            <p> <?php _e('Незабаром сконтактуємося з Вами!', 'smart');?></p>
            
            <div class="close">
                <?php svg_embed('close.svg');?>
            </div>
        </div>

    </div>
</section>


<?php get_header();?>

<section class="welcome">
	<span class="background gradient"></span>

  <div class="text_block">
  <h1>Консалтинг в сфері права та бухгалтерського обліку</h1>
      <button class="button" data-open-pop-up>
    <?php _e('Зв’язатися з нами', 'smart');?>
  </button>

</div>

 <div class="image">
	<img src="<?php assets()?>/img/temp/home_bg.png" alt="">
</div>

</section>
<!--
<section id="services" class="services">

  <div class="title">
    <span class="icons el-1 el-2 el-3 el-4">
      <?php svg_embed('icons.svg');?>
    </span>
    <h1><?php the_field('s2-title');?></h1>
  </div>
    <a href=""></a>

  <?php $services1 = get_field('s2-services-1');if ($services1): $s1num = 1;?>
																																	  <div id="search" class="service service-1">
																																	    <div class="title">
																																	      <span class="icons el-1">
																																	        <?php svg_embed('icons.svg');?>
																																	      </span>
																																	      <h2><?php the_field('s2-subtitle-1');?></h2>
																																	    </div>
																																	    <span class="ico ico-1"></span>
																																	    <span class="ico ico-2"></span>
																																	    <span class="ico ico-3"></span>
																																	    <div class="container">
																																	      <?php foreach ($services1 as $s): ?>
																																	      <div class="service-type s-<?php echo $s1num; ?>">
																																	        <div class="i">
																																	          <img src="<?php echo $s['icon']; ?>">
																																	        </div>
																																	        <p class="service-type__title"><?php echo $s['title']; ?></p>
																																	        <a href="<?php echo $s['link']; ?>" class="button white"><?php _e('Дізнатись більше', 'smart');?></a>
																																	        <div class="service-type__bg">
																																	          <img src="<?php assets();?>/img/s1-fr.svg" alt="">
																																	        </div>
																																	      </div>
																																	      <?php $s1num++;endforeach;?>
    </div>
  </div>
  <?php endif;?>

  <?php $services2 = get_field('s2-services-2');if ($services2): $s2num = 1;?>
																																	  <div class="service service-2">
																																	    <div class="title">
																																	      <span class="icons el-2">
																																	        <?php svg_embed('icons.svg');?>
																																	      </span>
																																	      <h2><?php the_field('s2-subtitle-2');?></h2>
																																	    </div>
																																	    <span class="ico ico-1"></span>
																																	    <span class="ico ico-2"></span>
																																	    <span class="ico ico-3"></span>
																																	    <div class="container">
																																	      <?php foreach ($services2 as $s): ?>
																																	      <div class="service-type s-<?php echo $s2num; ?>">
																																	        <div class="i">
																																	            <img src="<?php echo $s['icon']; ?>">
																																	        </div>
																																	        <p class="service-type__title"><?php echo $s['title']; ?></p>
																																	        <a href="<?php echo $s['link']; ?>" class="button white"><?php _e('Дізнатись більше', 'smart');?></a>
																																	        <div class="service-type__bg">
																																	          <img src="<?php assets();?>/img/s2-fr.svg" alt="">
																																	        </div>
																																	      </div>
																																	      <?php $s2num++;endforeach;?>
    </div>
  </div>
  <?php endif;?>

  <?php $services3 = get_field('s2-services-3');if ($services3): $s3num = 1;?>
																																	  <div class="service service-3">
																																	    <div class="title">
																																	      <span class="icons el-3">
																																	        <?php svg_embed('icons.svg');?>
																																	      </span>
																																	      <h2><?php the_field('s2-subtitle-3');?></h2>
																																	    </div>
																																	    <span class="ico ico-1"></span>
																																	    <span class="ico ico-2"></span>
																																	    <span class="ico ico-3"></span>
																																	    <div class="container">
																																	      <?php foreach ($services3 as $s): ?>
																																	      <div class="service-type s-<?php echo $s3num; ?>">
																																	        <div class="i">
																																	          <img src="<?php echo $s['icon']; ?>" alt="">
																																	        </div>
																																	        <p class="service-type__title"><?php echo $s['title']; ?></p>
																																	        <a href="<?php echo $s['link']; ?>" class="button white"><?php _e('Дізнатись більше', 'smart');?></a>
																																	        <div class="service-type__bg">
																																	          <img src="<?php assets();?>/img/s3-fr.svg" alt="">
																																	        </div>
																																	      </div>
																																	      <?php $s3num++;endforeach;?>
    </div>
  </div>
  <?php endif;?>

  <?php $services4 = get_field('s2-services-4');if ($services4): $s4num = 1;?>
																																	  <div class="service service-4">
																																	    <div class="title">
																																	      <span class="icons el-4">
																																	        <?php svg_embed('icons.svg');?>
																																	      </span>
																																	      <h2><?php the_field('s2-subtitle-4');?></h2>
																																	    </div>
																																	    <span class="ico ico-1"></span>
																																	    <span class="ico ico-2"></span>
																																	    <span class="ico ico-3"></span>
																																	    <div class="container">
																																	      <?php foreach ($services4 as $s): ?>
																																	      <div class="service-type s-<?php echo $s4num; ?>">
																																	        <div class="i">
																																	          <img src="<?php echo $s['icon']; ?>" alt="">
																																	        </div>
																																	        <p class="service-type__title"><?php echo $s['title']; ?></p>
																																	        <a href="<?php echo $s['link']; ?>" class="button white"><?php _e('Дізнатись більше', 'smart');?></a>
																																	        <div class="service-type__bg">
																																	          <img src="<?php assets();?>/img/s4-fr.svg" alt="">
																																	        </div>
																																	      </div>
																																	      <?php $s4num++;endforeach;?>
    </div>
  </div>
  <?php endif;?>

</section>

<section id="experience" class="our-experience">
  <div class="title">
    <h1 class="before"><?php the_field('s3-title');?></h1>
    <p class="desc"><?php the_field('s3-subtitle');?></p>
  </div>
  <?php $exps = get_field('s3-exp');if ($exps): ?>
  <?php foreach ($exps as $exp): ?>

  <div class="experience">
    <div class="experience__title click-sec">
      <h3>
        <span> <?php echo file_get_contents($exp['icon']); ?></span>
        <?php echo $exp['title']; ?>
      </h3>
      <p><?php echo $exp['desc']; ?></p>
    </div>
    <?php $list = $exp['list'];if ($list): ?>
    <div class="experience__desc">
      <ul>
        <?php foreach ($list as $l): ?>
        <li>
            <span class="l-arr">
                <?php svg_embed('tick-r.svg');?>
            </span>
            <?php echo $l['list-text']; ?>
        </li>
        <?php endforeach;?>
      </ul>
    </div>
    <?php endif;?>
  </div>
  <?php endforeach;?>
  <?php endif;?>


</section>

<section id="faq" class="faq">
  <div class="title">
    <h1 class="before"><?php the_field('s4-title');?></h1>
  </div>
  <?php $faqs = get_field('s4-faq');if ($faqs): $f = 1;?>
																																	  <?php foreach ($faqs as $faq): ?>
																																	  <div class="question">
																																	    <h2 class="click-sec"><?php echo $faq['question']; ?></h2>
																																	    <div class="answer">
																																	      <p><?php echo $faq['answer']; ?></p>
																																	    </div>
																																	  </div>
																																	  <?php $f++;endforeach;?>
  <?php endif;?>
</section> -->

<?php get_footer();?>
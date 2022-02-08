<footer id="contacts">
  <section class="footer">
    <h1 class="before"><?php bloginfo('name');?></h1>
    <div class="contacts">
      <a href="https://www.google.com.ua/maps/place/<?php the_field('address', 6);?>" class="addr" target="_blank"><?php the_field('address', 6);?> 79000</a>
      <div>
        <?php $tel = get_field('phone', 6);if ($tel): ?>
        <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $tel); ?>" class="tel">
          <?php echo $tel; ?>
        </a>
        <?php endif;?>
        <?php $email = get_field('email', 6); if($email) : ?>
        <a class="email" href="mailto:<?php echo antispambot($email, 1); ?>">
          <?php echo $email; ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</footer>
</main>
<?php wp_footer();?>
</body>
</html>
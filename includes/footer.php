<!-- FOOTER ELEMENTS -->

<div class="footer-wrap">
<div class="container">
  <div class="footer">
  <div class="row">
    <div class="four columns">
      <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
        <?php dynamic_sidebar( 'footer-left' ); ?>
      <?php endif; ?>
    </div>
    <div class="four columns">
      <?php if ( is_active_sidebar( 'footer-middle' ) ) : ?>
        <?php dynamic_sidebar( 'footer-middle' ); ?>
      <?php endif; ?>      
    </div>
    <div class="four columns">
      <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
        <?php dynamic_sidebar( 'footer-right' ); ?>
      <?php endif; ?>      
    </div>
  </div>
  </div>
</div>

<div class="bottom-credits">
<div class="container">
  <div class="row">
    <span class="u-pull-left"><?php bloginfo('name'); ?> - <?php echo date('Y'); ?></span>
    <span class="u-pull-right"><?php if (get_option('buso_use_footer_link') == 1) : ?><!--<?php else : ?><?php endif; ?>Theme By <a href="http://www.bloggingtools.com" rel="nofollow">Nicole Koch</a><?php if (get_option('buso_use_footer_link') == 1) : ?>--><?php else : ?><?php endif; ?></span>
  </div>
</div>
</div>
</div>

<a href="contactme.php" target="_blank">Nicole Koch <a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a> ~ <a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a></small></p>


</div> <!--/head-to-foot-wrap-->






<!-- FONT -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">

<?php wp_footer(); ?>

</body>
</html>
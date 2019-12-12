<?php get_header(); ?>

  <!-- PRIMARY LAYOUT -->
  <div class="main-and-sidebar">  
  <div class="container main-container">
    <div class="row">
    <div class="main-left">
      
      <?php if (get_option('buso_use_cat_descrip') == 1) : ?><!--<?php else : ?><?php endif; ?>
      <div class="main-wrap descrip-wrap">
              <div class="post-wrap descrip-wrap">
                   <h2><?php single_cat_title(''); ?></h2>
                   <?php echo category_description(); ?>
              </div>
      </div>
      <?php if (get_option('buso_use_cat_descrip') == 1) : ?>--><?php else : ?><?php endif; ?>

      <div class="main-wrap">
              <div class="post-wrap">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p>Posted in <?php the_category( ', ' ); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br />
                 <?php the_tags(); ?></p>
              <?php if ( has_post_thumbnail() ) { ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
              <?php } ?>
              <p><?php the_excerpt(); ?></p>
         <?php endwhile; ?>
              <div class="pagination-wrapper">    
                  <?php echo paginate_links( $args ); ?>
              </div>
         <?php else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.', 'buso-lightning' ); ?></p>
         <?php endif; ?>
           </div>
      </div>


    </div> <!-- main-left -->

<?php get_sidebar(); ?>
  </div> <!-- row -->
  </div> <!-- container -->
  </div> <!-- main-and-sidebar -->
<?php get_footer(); ?>
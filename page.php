<?php get_header(); ?>

  <!-- PRIMARY LAYOUT -->

  <div class="main-and-sidebar">  
  <div class="container main-container">
    <div class="row">
    <div class="main-left">
      
      <div class="main-wrap">
              <div class="post-wrap" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <h1><?php the_title(); ?></h1>
              <p>Posted on <?php the_time( get_option( 'date_format' ) ); ?></p>
              <p><?php the_content(); ?></p>
         <?php endwhile; else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.', 'buso-lightning' ); ?></p>
         <?php endif; ?>
           </div>

    <?php comments_template(); ?>

      </div> <!-- main-wrap -->

    </div> <!-- main-left -->

<?php get_sidebar(); ?>
  </div> <!-- row -->
  </div> <!-- container -->
  </div> <!-- main-and-sidebar -->
<?php get_footer(); ?>
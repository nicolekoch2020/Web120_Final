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
              <p>Posted in <?php the_category( ', ' ); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br />
                 <?php the_tags(); ?></p>
              <?php if (get_option('buso_show_post_image') == 1) { ?>
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
              <?php } ?> 
              <p><?php the_content(); ?></p>
         <?php endwhile; else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.', 'buso-lightning' ); ?></p>
         <?php endif; ?>
           </div>

        <?php wp_link_pages(); ?>

        <?php comments_template(); ?>

      </div> <!-- main-wrap -->

    </div> <!-- main-left -->

<?php get_sidebar(); ?>
  </div> <!-- row -->
  </div> <!-- container -->
  </div> <!-- main-and-sidebar -->
<?php get_footer(); ?>
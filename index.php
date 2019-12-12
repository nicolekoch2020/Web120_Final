<?php include "includes/header.php";?>
	
  <!-- PRIMARY LAYOUT -->
  
  <div class="main-and-sidebar">  
  <div class="container main-container">
    <div class="row">
    <div class="main-left">
      
      <div class="main-wrap">
              <div class="post-wrap" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p>Posted in <?php the_category( ', ' ); ?> on <?php the_time( get_option( 'date_format' ) ); ?><br />
                 <?php the_tags(); ?></p>
              <?php if ( has_post_thumbnail() ) { ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
              <?php } ?>
              <?php the_excerpt(); ?>
         <?php endwhile; ?>
              <div class="pagination-wrapper">    
                  <?php echo paginate_links(); ?>
              </div>
         <?php else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.', 'Search Again :) ' ); ?></p>
         <?php endif; ?>
           </div>
      </div>


    </div> <!-- /main-left -->

<?php get_sidebar(); ?>
  </div> <!-- row -->
  </div> <!-- container -->
  </div> <!-- main-and-sidebar -->

<?php include "includes/footer.php";?>


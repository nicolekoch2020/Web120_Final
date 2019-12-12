<?php get_header(); ?>

  <!-- PRIMARY LAYOUT -->
  <div class="main-and-sidebar">  
  <div class="container main-container">
    <div class="row">
    <div class="main-left">
      
      <div class="main-wrap">
              <div class="post-wrap">
                <h1>404 Error - Page Not Found</h1> 
                <p>The page you've requested cannot be found.</p>
                <p>Please refine your search, try a link from the sidebar, or visit our <a href="<?php echo get_home_url(); ?>">homepage</a>.</p>
             </div>

      </div> <!-- main-wrap -->

    </div> <!-- main-left -->

<?php get_sidebar(); ?>
  </div> <!-- row -->
  </div> <!-- container -->
  </div> <!-- main-and-sidebar -->
<?php get_footer(); ?>
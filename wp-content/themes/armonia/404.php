<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Armonia
 */
get_header();
?>

  <div class="blog-with-sidebar">
    <div class="row">

      <div class="secondary-section col-12 col-md-5 col-lg-4 order-md-2">
              <div class="blog-sidebar">
          <?php get_sidebar('page'); ?>
        </div>
      </div>

      <div class="primary-section col-12 col-md-7 col-lg-8 order-md-1">

      	<main id="primary" class="site-main">
      		<div class="error-404">
                <div class="row align-items-center">
                  <div class="col-12 col-md-12">
                    <div class="error-404__content">
                      <h2><?php esc_html_e( '404 Not Found', 'armonia' ); ?></h2>
                      <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'armonia' ); ?></p>
                      <?php get_search_form(); ?>
      				          <a class="btn" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Go back to home', 'armonia' ); ?></a>
                    </div>
                  </div>
                </div>
              </div>
      	</main><!-- #main -->
      </div>

    </div>
  </div>
<?php
get_footer();
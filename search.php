<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage wpbootstrap
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col col-lg-8 clearfix" role="main">
				
					<div class="page-header"><h1><span><?php esc_html_e( 'Search Results for','wpbootstrap' ); ?>:</span> <?php echo esc_attr( get_search_query() ); ?></h1></div>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
						
						<header>
							
							<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<p class="meta"><?php esc_html_e( 'Posted', 'wpbootstrap' ); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(); ?></time> <?php esc_html_e( 'by', 'wpbootstrap'); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php esc_html_e( 'filed under', 'wpbootstrap' ); ?> <?php the_category( ', ' ); ?>.</p>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_excerpt('<span class="read-more">' . __( 'Read more on','wpbootstrap') . ' "'.the_title( '', '', false ).'" &raquo;</span>'); ?>
					
						</section> <!-- end article section -->
						
						<footer>
					
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if ( function_exists( 'wp_bootstrap_page_navi' ) ) { // if expirimental feature is active. ?>
						
						<?php wp_bootstrap_page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link( esc_html_e( '&laquo; Older Entries', 'wpbootstrap' ) ) ?></li>
								<li class="next-link"><?php previous_posts_link( esc_html_e( 'Newer Entries &raquo;', 'wpbootstrap' ) ) ?></li>
							</ul>
						</nav>
					<?php } ?>			
					
					<?php else : ?>
					
					<!-- this area shows up if there are no results -->
					
					<article id="post-not-found">
						<header>
							<h1><?php esc_html_e( 'Not Found', 'wpbootstrap' ); ?></h1>
						</header>
						<section class="post_content">
							<p><?php esc_html_e( 'Sorry, but the requested resource was not found on this site.', 'wpbootstrap' ); ?></p>
						</section>
						<footer>
						</footer>
					</article>
					
					<?php endif; ?>

				</div> <!-- end #main -->

				<?php get_sidebar(); // sidebar 1 ?>

			</div> <!-- end #content -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage {%= title_capitalize %}
 * @author {%= author %}
 * @link {%= author_uri %}
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) { ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) {
							single_cat_title();
						}
						elseif ( is_tag() ) {
							single_tag_title();
						}
						elseif ( is_author() ) {
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', '{%= prefix %}' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						}
						elseif ( is_day() ) {
							printf( __( 'Day: %s', '{%= prefix %}' ), '<span>' . get_the_date() . '</span>' );
						}
						elseif ( is_month() ) {
							printf( __( 'Month: %s', '{%= prefix %}' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
						}
						elseif ( is_year() ) {
							printf( __( 'Year: %s', '{%= prefix %}' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
						}
						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
							_e( 'Asides', '{%= prefix %}' );
						}
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
							_e( 'Images', '{%= prefix %}');
						}
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
							_e( 'Videos', '{%= prefix %}' );
						}
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
							_e( 'Quotes', '{%= prefix %}' );
						}
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
							_e( 'Links', '{%= prefix %}' );
						}
						else {
							_e( 'Archives', '{%= prefix %}' );
						}	?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( !empty( $term_description ) ) {
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					}
				?>
			</header><!-- .page-header -->

			<?php
				while ( have_posts() ) {
					the_post();

					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				}

				{%= prefix %}_paging_nav();
			}
			else {
				get_template_part( 'content', 'none' );
			} ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();

<?php
/**
 * The template for displaying search forms in our theme.
 *
 * @package WordPress
 * @subpackage Hfhkfk
 * @author hjvjhvjhjh
 * @link jhfjhfjh
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'cfjfkfuyr' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'cfjfkfuyr' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_x( 'Search for:', 'label', 'cfjfkfuyr' ); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'cfjfkfuyr' ); ?>">
</form>

<?php
/**
 * Search Form template
 *
 * @package EDUCAMB
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" class="search-form">
    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search here', 'educamb' ); ?>" required="">
    <button type="submit"><i class="icon-zoom"></i></button>
</form>
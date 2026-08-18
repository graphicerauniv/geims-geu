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

<input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'What do you want to learn?', 'educamb' ); ?>" required="">
<button type="button">
    <i class="icon-zoom"></i>
</button>
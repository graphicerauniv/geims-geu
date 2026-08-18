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

<form method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <fieldset>
        <input type="search" name="s" value="<?php echo get_search_query(); ?>"
            placeholder="<?php echo esc_attr__( 'What You Want?...', 'educamb' ); ?>" required="">
        <button type="submit">
            <i class="icon-zoom"></i>
        </button>
    </fieldset>
</form>
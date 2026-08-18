<?php
/**
 * Template for displaying enrolled course view nav menu
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php do_action('tutor_course/single/enrolled/nav/before'); ?>
<ul class="tabs-button-box clearfix">
    <?php
		foreach ( $course_nav_item as $nav_key => $nav_item ) {
		/**
		 * Apply filters to show default active tab
		 */
		$default_active_key = apply_filters( 'tutor_default_topics_active_tab', 'info' );
	?>
    <li data-tab="#description<?php echo $nav_key; ?>" class="tab-btn-item <?php echo $nav_key == $default_active_key ? ' active-btn-item' : ''; ?>">
        <h3><?php echo $nav_item['title']; ?></h3>
    </li>
    <?php }?>
</ul>
<?php do_action('tutor_course/single/enrolled/nav/after'); ?>

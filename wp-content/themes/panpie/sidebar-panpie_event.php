<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<div class="col-lg-4 col-md-12 fixed-bar-coloum">
	<aside class="sidebar-widget-area">
		<?php
			if ( is_active_sidebar( 'event-sidebar' ) ) dynamic_sidebar( 'event-sidebar' );
		?>
	</aside>
</div>
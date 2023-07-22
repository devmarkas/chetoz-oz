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
			if ( PanpieTheme::$sidebar ) {
				if ( is_active_sidebar( PanpieTheme::$sidebar ) ) dynamic_sidebar( PanpieTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' );
			}
		?>
	</aside>
</div>
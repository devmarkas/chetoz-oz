<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie;
?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php echo PanpieTheme::$options['wc_block_layouts']; if ( (PanpieTheme::$options['wc_archive_layouts'] == 'panpiestyle' ) && (PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle2' ) ) { echo 'masum'; } ?>
			<?php Helper::left_sidebar();?>
			<div class="<?php Helper::the_layout_class();?>">
				<div class="main-content">
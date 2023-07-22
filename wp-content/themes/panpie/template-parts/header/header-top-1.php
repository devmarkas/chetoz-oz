<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$panpie_socials = PanpieTheme_Helper::socials();
?>
<div id="tophead" class="header-top-bar align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<div class="tophead-left">
				<div class="address">
				<i class="fas fa-map-marker-alt"></i><?php $header_location = PanpieTheme::$options['header_location'];
					if ( !empty( $header_location ) ){ echo esc_html( $header_location ); } else { esc_html_e( 'Location', 'panpie' ); } ?>: <?php if ( PanpieTheme::$options['address'] ) { ?><?php echo wp_kses( PanpieTheme::$options['address'] , 'alltext_allow' );?><?php } ?></div>
				<div class="email">
				<i class="far fa-envelope"></i><?php $header_mailus_txt = PanpieTheme::$options['header_mailus_txt'];
					if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'E-mail Us', 'panpie' ); } ?>: <a href="mailto:<?php echo esc_attr( PanpieTheme::$options['email'] );?>"><?php echo wp_kses( PanpieTheme::$options['email'] , 'alltext_allow' );?></a></div>
			</div>
			<div class="tophead-right">
				<?php if ( PanpieTheme::$options['online_button'] == '1' ) { ?>
					<div class="header-button">
						<a target="_self" href="<?php echo esc_url( PanpieTheme::$options['online_button_link']  );?>"><i class="far fa-file-alt"></i><?php echo esc_html( PanpieTheme::$options['online_button_text'] );?></a>
					</div>
				<?php } ?>
				<?php if ( $panpie_socials ) { ?>
					<ul class="tophead-social">
						<?php foreach ( $panpie_socials as $panpie_social ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $panpie_social['url'] );?>"><i class="fab <?php echo esc_attr( $panpie_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
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
				<div class="email">
				<i class="far fa-envelope"></i><?php $header_mailus_txt = PanpieTheme::$options['header_mailus_txt'];
					if ( !empty( $header_mailus_txt ) ){ echo esc_html( $header_mailus_txt ); } else { esc_html_e( 'E-mail', 'panpie' ); } ?>: <a href="mailto:<?php echo esc_attr( PanpieTheme::$options['email'] );?>"><?php echo wp_kses( PanpieTheme::$options['email'] , 'alltext_allow' );?></a></div>
				<div class="isono">
				<i class="fas fa-phone-alt"></i><?php $header_hotline_txt = PanpieTheme::$options['header_hotline_txt'];
					if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'ISO No', 'panpie' ); } ?>: <a href="mailto:<?php echo esc_attr( PanpieTheme::$options['phone'] );?>"><?php echo wp_kses( PanpieTheme::$options['phone'] , 'alltext_allow' );?></a></div>
			</div>
			<div class="tophead-right">
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


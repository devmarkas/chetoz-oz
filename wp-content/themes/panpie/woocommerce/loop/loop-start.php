<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
if ( isset(  $_GET["archive"] !== 2 )) {
	$get_archive = '';
	} else {
	$get_archive = $_GET["archive"];
}*/
?>


<?php if ( PanpieTheme::$options['wc_block_layouts'] == 'regular' ) { ?>

<ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">

<?php } else if ( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle' ) { ?>

<div class="row row-cols-xl-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> row-cols-lg-3 row-cols-md-2  <?php if($_GET["archive"] != 2 ){ ?> featuredContainer <?php } ?>">

<?php } else if ( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle2' ) { ?>

<div class="row row-cols-xl-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> row-cols-lg-3 row-cols-md-2 featuredContainer">

<?php } else if ( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle3' ) { ?>

<div class="row row-cols-xl-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> row-cols-lg-3 row-cols-md-2 featuredContainer">

<?php } else if ( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle4' ) { ?>

<div class="row row-cols-xl-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> row-cols-md-2 featuredContainer">

<?php } ?>

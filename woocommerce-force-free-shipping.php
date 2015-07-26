<?php
/**
 * Plugin Name: WooCommerce Force Free Shipping
 * Plugin URI: https://vendidero.de
 * Description: Automatically select and force free shipping if available during WooCommerce checkout.
 * Author: Vendidero
 * Author URI: https://vendidero.de
 * Version: 0.1.0
 */

add_filter( 'woocommerce_package_rates', 'woocommerce_afs_filter_free_shipping', 50 );

function woocommerce_afs_filter_free_shipping( $rates ) {

	if ( ( is_checkout() || is_cart() || ( is_ajax() && isset( $_POST[ 'action' ] ) && 'woocommerce_update_order_review' === $_POST[ 'action' ] ) ) && isset( $rates['free_shipping'] ) ) {

		foreach ( $rates as $key => $value ) {
			if ( 'free_shipping' !== $key )
				unset( $rates[ $key ] );
		}

	}

	return $rates;

}

?>
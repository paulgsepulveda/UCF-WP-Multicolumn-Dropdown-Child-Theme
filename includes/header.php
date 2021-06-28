<?php

function register_all_menus() {

    // settings
    $headerPrefix = 'header-menu';
    $maxMenuSlots = 7;

    $main_menus = [];
    for ($i = 1; $i <= $maxMenuSlots; $i++){
        $main_menus[$headerPrefix . '-' . $i] = __( "Main Header - Slot {$i}" );
    }
    register_nav_menus($main_menus);

}

add_action( 'init', 'register_all_menus');

/**
 * Overrides original to remove mainsite fallback since the old header slot will not be filled.
 */
if ( !function_exists( 'ucfwp_get_nav_type' ) ) {
	function ucfwp_get_nav_type() {
		$nav_type = '';

		// Fall back to the ucf.edu primary navigation if a
		// header menu is not set. REMOVED TO ACCOMODATE HEADER CHANGE
		// if ( ! has_nav_menu( 'header-menu' ) ) {
		// 	$nav_type = 'mainsite';
		// }

		return apply_filters( 'ucfwp_get_nav_type', $nav_type );
	}
}

/**
 * Generates a COM-style multi-column dropdown for the specified menu slot
 *
 * @param string $location		Theme location key slug from get_registered_nav_menus() result array
 * @return void
 */
function generate_dropdown_menu($location) {
    if (strpos(strtolower($location), 'header-menu' . '-') !== false) {
                    
        // location is a header menu (slug starts with 'header-menu-' (note the last dash; we don't want a menu called exactly 'header-menu')
        $nav_menu = array(

            'theme_location'  => $location,
            'depth'           => 3,
            'container'       => 'div',
            'container_class' => 'com-submenu-l1',
            'container_id'    => $location,
            'menu_class'      => 'nav navbar-nav ml-md-auto multi-column',
            'fallback_cb'     => 'bs4Navwalker::fallback',
            'walker'          => new bs4Navwalker_com()

        );
        wp_nav_menu( $nav_menu );
    }
}
<?php
namespace MyProject\Theme;

define( 'MULTICOLUMN_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once MULTICOLUMN_THEME_DIR . 'includes/config.php';
include_once MULTICOLUMN_THEME_DIR . 'includes/meta.php';

// Add other includes to this file as needed.
include_once MULTICOLUMN_THEME_DIR . 'includes/header.php';
include_once MULTICOLUMN_THEME_DIR . 'includes/wp-bs-navwalker.php';

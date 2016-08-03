<?php
class F6_TOPBAR_MENU_WALKER extends Walker_Nav_Menu
{   
    /*
     * Add vertical menu class and submenu data attribute to sub menus
     */
     
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
    }
}

//Optional fallback
function f6_topbar_menu_fallback($args)
{
    /*
     * Instantiate new Page Walker class instead of applying a filter to the
     * "wp_page_menu" function in the event there are multiple active menus in theme.
     */
     
    $walker_page = new Walker_Page();
    $fallback = $walker_page->walk(get_pages(), 0);
    $fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);
    
    echo '<ul class="dropdown menu data-dropdown-menu">'.$fallback.'</ul>';
}

?>

<?php
//Register Menu
function _register_menu() {
    register_nav_menu( 'topbar-menu', __( 'Top Bar Menu','textdomain' ) );
}

//Add Menu to theme setup hook
add_action( 'after_setup_theme', '_theme_setup' );

function _theme_setup()
{
    add_action( 'init', '_register_menu' );
        
    //Theme Support
    add_theme_support( 'menus' );
}

?>
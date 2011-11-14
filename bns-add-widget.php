<?php
/*
Plugin Name: BNS Add Widget
Plugin URI: http://buynowshop.com/plugins/bns-add-widget
Description: Add a widget area to the footer of any theme.
Version: 0.4
Author: Edward Caissie
Author URI: http://edwardcaissie.com/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/**
 * BNS Add Widget plugin
 *
 * Add a widget area to the footer of any theme
 *
 * @package     BNS_Add_Widget
 * @link        http://buynowshop.com/plugins/bns-add-widget/
 * @link        https://github.com/Cais/bns-add-widget/
 * @link        http://wordpress.org/extend/plugins/bns-add-widget/
 * @version     0.4
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2010-2011, Edward Caissie
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.
 *
 * You may NOT assume that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to:
 *
 *      Free Software Foundation, Inc.
 *      51 Franklin St, Fifth Floor
 *      Boston, MA  02110-1301  USA
 *
 * The license for this software can also likely be found here:
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Last revised November 14, 2011
 */

global $wp_version;
$exit_message = 'BNS Add Widget requires WordPress version 2.2 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please Update!</a>';
if (version_compare($wp_version, "2.2", "<")) { /* for *_sidebar functions */
    exit ($exit_message);
}

/**
 * BNS Add Widget TextDomain
 * Make plugin text available for translation (i18n)
 *
 * @package:    BNS_Add_Widget
 * @since:      0.4
 *
 * Note: Translation files are expected to be found in the plugin root folder / directory.
 * `bns-aw` is being used in place of `bns-add-widget`
 *
 * Last revised November 12, 2011
 */
load_plugin_textdomain( 'bns-aw' );
// End: BNS Add Widget TextDomain

/* Hook BNS Widget into 'init' */
add_action( 'init', 'add_BNS_Add_Widget_Code' );
function add_BNS_Add_Widget_Code() {
        register_sidebar( array(
                               'name' => __( 'BNS Add Widget', 'bns-aw' ),
                               'id' => 'bns-add-widget',
                               'before_widget' => '<div class="bns-add-widget"><div id="%1$s" class="widget %2$s">',
                               'after_widget' => '</div><!-- #%1$s .widget .%2$s --></div><!-- .bns-add-widget -->',
                               'before_title' => '<h2 class="bns-add-widget-title">',
                               'after_title' => '</h2>',
                          ) );
}

/* Hook BNS Widget into wp_footer */
add_action('wp_footer', 'add_BNS_Widget_to_Footer');
function add_BNS_Widget_to_Footer() {
        if ( dynamic_sidebar( 'bns-add-widget' ) ) : else : ?>
            <span align="center">You are using the <a href="http://buynowshop.com/plugins/bns-add-widget/">BNS Add Widget</a> plugin! Thank You!</span>
        <?php endif;
}
?>
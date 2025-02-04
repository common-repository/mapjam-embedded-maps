<?php
/**
 * Plugin Name: MapJam Embedded Maps
 * Plugin URI: http://mapjam.com
 * Description: Use a shortcode to easily embed a MapJam map on your WordPress site.
 * Version: 1.1
 * Author: MapJam, Inc.
 * Author URI: http://mapjam.com
 */

/******************* CONTENTS ******************************/
/*

        1.0 ADD SETTINGS LINK
        
        3.0 OPTIONS PAGE
        
        2.0 SHORTCODE FUNCTION
        
        
*/
/************************************************************/


/* 1.0 ADD SETTINGS LINK */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'mj_add_action_links' );


function mj_add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'admin.php?page=mapjam-embedded-maps/options.php' ) . '">Settings</a>',
 );
return array_merge( $links, $mylinks );
}





/* 2.0 OPTIONS PAGE */
include( plugin_dir_path( __FILE__ ) . '/options.php');




/* 3.0 SHORTCODE FUNCTION */
function mapjam_embed($atts){
    $id = $atts['id'];

    if(isset($atts['lat'])) {
        $latlong = "&map_lat_lng=";
        $latlong .= $atts['lat']; 
        if(isset($atts['long'])) {
            $latlong .= "%2C";
            $latlong .= $atts['long'];  
        }
        else { 
            $latlong = "";
        }
    }
    else { 
        $latlong = "";    
    }

    if(isset($atts['zoom'])){
        $zoom = $atts['zoom'];
    }
    else {
        $zoom = get_option('mj_zoom');
    }
    if($zoom != "") { $zooms = "&zoom=". $zoom ; } else { $zooms = ""; }


    if(isset($atts['width'])){
        $width = $atts['width'];
        $widthtype = "px";
    }
    else {
        if(get_option('mj_width') != "") {
            $width = get_option('mj_width');
            $widthtype = get_option('mj_width_type');
        }
        else {
            $width = "100";
            $widthtype = "%";
        }
       
    }

    if(isset($atts['height'])){
        $height = $atts['height'];
    }
    else {
        if(get_option('mj_height') != "") {
            $height = get_option('mj_height');
        }
        else {
            $height = "600";
        }
        
    }

    if(isset($atts['cluster'])){
        $cluster = "&disableClusteringAtZoom=";
        $cluster .= $atts['cluster'];
    }
    else {
        $cluster = "&disableClusteringAtZoom=1";
    }

    if(get_option('mj_content_card') == 1) {
        $content_card = '&hide_card=false';
    }
    else {
        $content_card = '&hide_card=true';
    }




    $output = '<iframe content_card="' . get_option('mj_content_card') . '" frameborder="0" id="mapjam-iframe" src="//embeds.mapjam.com/v2/map-embed.html?platform=wp&app_url=http://mapjam.com/&map_id='. $id .'&container=mapjam-1&domain=mapjam.com'. $zooms . $latlong . $cluster . $content_card .'" style="width: ' . $width . $widthtype .'; height: ' . $height . 'px;"></iframe>';


    return $output;

}
add_shortcode('mapjam', 'mapjam_embed');


?>
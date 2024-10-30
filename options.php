<?php 

add_action( 'admin_menu', 'mapjam_plugin_menu' );

function mapjam_plugin_menu() {
	//add_options_page( 'MapJam Options', 'MapJam Options', 'manage_options', 'mapjam-options', 'mapjam_plugin_options' );
    	//create new top-level menu
	add_menu_page('MapJam Options', 'MapJam Options', 'administrator', __FILE__, 'mapjam_plugin_options',plugins_url('/images/touch.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'mj_register_mysettings' );

}



function mj_register_mysettings() {
	//register our settings
	register_setting( 'mapjam-group', 'mj_width' );
	register_setting( 'mapjam-group', 'mj_width_type' );
	register_setting( 'mapjam-group', 'mj_height' );
    register_setting( 'mapjam-group', 'mj_zoom' );
	register_setting( 'mapjam-group', 'mj_content_card');    
}





function mapjam_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	} ?>    

    
<div class="wrap">
    
    <h2>MapJam Default Options</h2>
    <h3>Step by Step installation instructions</h3>
    <ol>
        <li>Create a MapJam Map on <a target='_blank' href='http://mapjam.com/?src=wp'>MapJam.com</a></li>
        <li>Find your Map ID. Look at the map URL to find yours. It will look like this: MapJam.com/yourMapID</li>
        <li>In a page or blog post, include the shortcode. For example: [mapjam id="yourMapID"]</li>
    </ol>

    <h3>Settings</h3>
    <p>Use the options below to set default settings for your maps.</p>
    <p>These settings can be overriden on individual pages by using the auto-generated shortcode from <a href="http://mapjam.com" target="_blank">MapJam's Embed function</a>.</p>
    
    <form method="post" action="options.php"> 
      <?php settings_fields( 'mapjam-group' ); ?>
    <?php do_settings_sections( 'mapjam-group' ); ?>
    
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Content Card</th>
        <?php 
        if(get_option('mj_content_card') != ""){ 
            $checked = "checked"; 
        }
        else { 
            $checked = "";
        }
        ?>
        <td>
            <input type="checkbox" name="mj_content_card" value="1" <?php echo $checked; ?>/>
        </td>
       
        </tr>

        <tr valign="top">
        <th scope="row">Width</th>
        <td><input type="text" name="mj_width" value="<?php echo esc_attr( get_option('mj_width') ); ?>" />
        
        <select name="mj_width_type" id="mj_width_type">
            <?php if(get_option('mj_width_type') == 'px') { $px = "selected"; $pct = ""; } else { $pct = "selected"; $px = ""; } ?>
         
            <option value="%" <?php echo $pct; ?>>%</option>
            <option value="px" <?php echo $px; ?>>px</option>
        </select>
        </td>
       
        </tr>
         
        <tr valign="top">
        <th scope="row">Height</th>
        <td><input type="text" name="mj_height" value="<?php echo esc_attr( get_option('mj_height') ); ?>" /> px</td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Zoom</th>
        <td><select name="mj_zoom">
            <?php 
            $zoom = get_option('mj_zoom');
                if ($zoom == "") { $nozoom = "selected"; } else { $nozoom = ""; }
                echo '<option value="" '. $nozoom . '>Same as Map</option>';
                for( $i= 1 ; $i <= 18 ; $i++ ) {
                    if($i == $zoom) { $sel = "selected"; } else { $sel = ""; }
                    echo '<option value="'. $i .'" '. $sel .'>'. $i .'</option>';
                }
            
            
            ?>
            
           
        </select></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>
    </form>
    
</div>


<?php } ?>
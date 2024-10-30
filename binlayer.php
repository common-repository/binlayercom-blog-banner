<?php

/*
Plugin Name: Binlayer.com Blog-Banner
Description: Binlayer.com Adcode Widget
Author: blog-it-technik.de
Version: 1.0
Author URI: http://www.blog-it-technik.de/
License: GPLv2 or later

*/



class BannerBinlayerWidget extends WP_Widget {
	function BannerBinlayerWidget() {
		parent::__construct( false, 'Binlayer Banner' );
	}
	function getFields(){
		return array(
			'publisherid'=>'60221',
		);
	}
	function widget( $args, $instance ) {



$publisherid = $instance['publisherid'];
$r = '<script type="text/javascript" src="http://view.binlayer.com/view-';
$r .= $publisherid;
$r .= '.js"></script>';

echo $r;

	}

	function update( $new_instance, $old_instance ) {
		// Save widget options
		$instance = $old_instance;
                foreach ( (array) $this->getFields() as $field => $field_value ) {
                        $instance[$field] = strip_tags($new_instance[$field]);
                }
                return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
	        $instance = wp_parse_args( (array) $instance, $this->getFields() );
                foreach ( (array) $this->getFields() as $field => $field_value ) {
                        ${$field} = esc_attr( $instance[$field] );
                }
	?>
        	<p>
Registrieren Sie sich bei binlayer.com</a><br />

                        <label for="<?php echo $this->get_field_id('publisherid'); ?>">
				<b>Publisher ID:</b><br />
geben Sie hier die ID aus dem Werbecode ein: 
&lt;script type="text/javascript" src="http://view.binlayer.com/view-<b>60221</b>.js"&gt;&lt/script&gt;

                                <input class="widefat" type="text" id="<?php echo $this->get_field_id('publisherid'); ?>" 
					name="<?php echo $this->get_field_name('publisherid'); ?>" value="<?php echo $publisherid; ?>" />
                        </label>
                </p>
	<?php
	}
}

function myplugin_register_widgets() {
	register_widget( 'BannerBinlayerWidget' );
}

add_action( 'widgets_init', 'myplugin_register_widgets' );

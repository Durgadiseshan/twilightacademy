<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class QuiklearnTheme_Contact_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'quiklearn_contact', // Base ID
            esc_html__( 'Quiklearn : Contact', 'quiklearn-core' ), // Name
            array( 'description' => esc_html__( 'Contact Widget', 'quiklearn-core' ) ) // Args
            );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}
		?>
		<div class="contact-address">
			<?php	
			if( !empty( $instance['sub-title'] ) ){
				?><h4><?php echo esc_html( $instance['sub-title'] ); ?></h4><?php
			}  		 
			if( !empty( $instance['phone'] ) ){
				?><a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><i class="icon-quiklearn-phone"></i><?php echo esc_html( $instance['phone'] ); ?></a><?php
			}
			?>
		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['sub-title']   = ( ! empty( $new_instance['sub-title'] ) ) ? sanitize_text_field( $new_instance['sub-title'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'Contact Address' , 'quiklearn-core' ),
			'sub-title'		=> '',
			'phone'   		=> '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'quiklearn-core' ),
				'type'  => 'text',
			),
			'sub-title'   => array(
				'label' => esc_html__( 'Sub Title', 'quiklearn-core' ),
				'type'  => 'text',
			),      
			'phone'     => array(
				'label' => esc_html__( 'Phone Number', 'quiklearn-core' ),
				'type'  => 'text',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}
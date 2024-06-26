<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class QuiklearnTheme_Address_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'quiklearn_address', // Base ID
            esc_html__( 'Quiklearn : Address Info', 'quiklearn-core' ), // Name
            array( 'description' => esc_html__( 'Address Widget', 'quiklearn-core' ) ) // Args
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
		<?php if( !empty( $instance['description'] ) ) { ?><p class="rtin-des"><?php echo wp_kses_post( $instance['description'] ); ?></p><?php } ?>
		<ul class="corporate-address">
			<?php	
			if( !empty( $instance['address'] ) ){
				?><li><i class="icon-quiklearn-location"></i><span><?php echo esc_html( $instance['address'] ); ?></span></li><?php
			}   		 
			if( !empty( $instance['phone'] ) ){
				?><li><i class="icon-quiklearn-phone"></i><span><a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></span></li><?php
			}   
			if( !empty( $instance['email'] ) ){
				?><li><i class="icon-quiklearn-message"></i><span><a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></span></li><?php
			} 
			if( !empty( $instance['fax'] ) ){
				?><li><i class="fa-solid fa-fax"></i><span><?php echo esc_html( $instance['fax'] ); ?></span></li><?php
			}  
			?>
		</ul>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? sanitize_text_field( $new_instance['address'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		$instance['fax']       = ( ! empty( $new_instance['fax'] ) ) ? sanitize_text_field( $new_instance['fax'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'Corporate Office' , 'quiklearn-core' ),
			'description'	=> '',
			'address'		=> '',
			'phone'   		=> '',
			'email'   		=> '',
			'fax'     		=> ''  
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'quiklearn-core' ),
				'type'  => 'text',
			),
			'description' => array(
				'label'   => esc_html__( 'Description', 'quiklearn-core' ),
				'type'    => 'textarea',
			),
			'address'   => array(
				'label' => esc_html__( 'Address', 'quiklearn-core' ),
				'type'  => 'text',
			),      
			'phone'     => array(
				'label' => esc_html__( 'Phone Number', 'quiklearn-core' ),
				'type'  => 'text',
			),      
			'email'     => array(
				'label' => esc_html__( 'Email', 'quiklearn-core' ),
				'type'  => 'text',
			),      
			'fax'       => array(
				'label' => esc_html__( 'Fax', 'quiklearn-core' ),
				'type'  => 'text',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}
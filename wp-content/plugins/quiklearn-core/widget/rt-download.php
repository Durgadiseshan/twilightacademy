<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class QuiklearnTheme_Download_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'quiklearn_download', // Base ID
            esc_html__( 'Quiklearn: Download', 'quiklearn-core' ), // Name
            array( 'description' => esc_html__( 'Quiklearn: Download Widget', 'quiklearn-core' )) );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			$html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}

		echo wp_kses_post( $html );
		?>
		<div class="download-list">
			<h4 class="item-list"><i class="icon-quiklearn-pdf"></i><a class="link" download href="<?php echo esc_url( $instance['download_url1'] ); ?>"><?php echo esc_html( $instance['pdf_title'] ); ?></a>
			</h4>
			<h4 class="item-list"><i class="icon-quiklearn-docs"></i><a class="link" download href="<?php echo esc_url( $instance['download_url2'] ); ?>"><?php echo esc_html( $instance['doc_title'] ); ?></a>
			</h4>
		</div>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance                  = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['pdf_title']   = ( ! empty( $new_instance['pdf_title'] ) ) ? wp_kses_post( $new_instance['pdf_title'] ) : '';
		$instance['doc_title']   = ( ! empty( $new_instance['doc_title'] ) ) ? wp_kses_post( $new_instance['doc_title'] ) : '';
		$instance['download_url1']   = ( ! empty( $new_instance['download_url1'] ) ) ? wp_kses_post( $new_instance['download_url1'] ) : '';
		$instance['download_url2']   = ( ! empty( $new_instance['download_url2'] ) ) ? wp_kses_post( $new_instance['download_url2'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'       	=> '',
			'pdf_title' 	=> '',
			'doc_title' 	=> '',
			'download_url1' 	=> '',
			'download_url2' 	=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'       => array(
				'label'   => esc_html__( 'Title', 'quiklearn-core' ),
				'type'    => 'text',
			),
			'pdf_title'       => array(
				'label'   => esc_html__( 'PDF Title', 'quiklearn-core' ),
				'type'    => 'text',
			),
			'download_url1'    => array(
				'label'    => esc_html__( 'Download URL', 'quiklearn-core' ),
				'type'     => 'url',
			),
			'doc_title'       => array(
				'label'   => esc_html__( 'DOC Title', 'quiklearn-core' ),
				'type'    => 'text',
			),
			'download_url2'    => array(
				'label'    => esc_html__( 'Download URL', 'quiklearn-core' ),
				'type'     => 'url',
			),
		);

		RT_Widget_Fields::display( $fields, $instance, $this );
	}
}
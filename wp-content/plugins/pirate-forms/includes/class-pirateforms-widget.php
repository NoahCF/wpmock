<?php

/**
 * Template for new WordPress widget
 *
 * @see WP_Widget::widget()
 */
// @codingStandardsIgnoreStart
class pirate_forms_contact_widget extends WP_Widget {
	// @codingStandardsIgnoreEnd

	/**
	 *  Widget constructor
	 */
	public function __construct() {
		parent::__construct(
			'pirate_forms_contact_widget',
			__( 'Pirate Forms', 'pirate-forms' ),
			array(
				'classname'   => __FUNCTION__,
				'description' => __( 'Pirate Forms', 'pirate-forms' ),
			)
		);
	}

	/**
	 *  Register the widget
	 */
	public static function register_widget() {
		register_widget( 'pirate_forms_contact_widget' );
	}

	/**
	 * Widget logic and display
	 */
	function widget( $args, $instance ) {
		// Pulling out all settings
		$args     = wp_parse_args(
			$args, array(
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			)
		);
		$instance = wp_parse_args(
			$instance, array(
				'pirate_forms_widget_title'   => 'Pirate Forms',
				'pirate_forms_widget_subtext' => 'Pirate Forms',
			)
		);
		// Output all wrappers
		echo $args['before_widget'] . '<div class="pirate-forms-contact-widget">';
		if ( ! empty( $instance['pirate_forms_widget_title'] ) ) {
			echo $args['before_title'] . $instance['pirate_forms_widget_title'] . $args['after_title'];
		}
		if ( ! empty( $instance['pirate_forms_widget_subtext'] ) ) {
			echo wpautop( stripslashes( $instance['pirate_forms_widget_subtext'] ) );
		}

		$attributes = array( 'from' => 'widget' );
		if ( isset( $instance['pirate_forms_widget_ajax'] ) && $instance['pirate_forms_widget_ajax'] ) {
			$attributes['ajax'] = 'yes';
		}

		$attributes = apply_filters( 'pirate_forms_widget_attributes', $attributes, $instance );

		$shortcode = '[pirate_forms';
		foreach ( $attributes as $k => $v ) {
			$shortcode .= " $k='$v'";
		}
		$shortcode .= ']';
		echo do_shortcode( $shortcode );
		echo '<div class="pirate_forms_clearfix"></div>';
		echo '</div>' . $args['after_widget'];

	}

	/**
	 * Used to update widget settings
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		// Storing widget title as inputted option or category name
		$instance['pirate_forms_widget_title']   = apply_filters( 'widget_title', sanitize_text_field( $new_instance['pirate_forms_widget_title'] ) );
		$instance['pirate_forms_widget_subtext'] = $new_instance['pirate_forms_widget_subtext'];
		$instance['pirate_forms_widget_ajax'] = ( isset( $new_instance['pirate_forms_widget_ajax'] ) ) ? (bool) $new_instance['pirate_forms_widget_ajax'] : false;

		$instance = apply_filters( 'pirate_forms_widget_update', $instance, $new_instance );

		return $instance;
	}

	/**
	 * Used to generate the widget admin view
	 *
	 * @return string|void
	 */
	function form( $instance ) {
		$pirate_forms_widget_title   = ! empty( $instance['pirate_forms_widget_title'] ) ? $instance['pirate_forms_widget_title'] : __( 'Title', 'pirate-forms' );
		$pirate_forms_widget_subtext = ! empty( $instance['pirate_forms_widget_subtext'] ) ? $instance['pirate_forms_widget_subtext'] : __( 'Text above form', 'pirate-forms' );
		$pirate_forms_widget_ajax   = ! empty( $instance['pirate_forms_widget_ajax'] ) && intval( $instance['pirate_forms_widget_ajax'] ) === 1 ? 'checked' : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'pirate_forms_widget_title' ); ?>"><?php _e( 'Title:', 'pirate-forms' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'pirate_forms_widget_title' ); ?>"
				   name="<?php echo $this->get_field_name( 'pirate_forms_widget_title' ); ?>" type="text"
				   value="<?php echo esc_attr( $pirate_forms_widget_title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pirate_forms_widget_subtext' ); ?>"><?php _e( 'Subtext:', 'pirate-forms' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'pirate_forms_widget_subtext' ); ?>"
					  name="<?php echo $this->get_field_name( 'pirate_forms_widget_subtext' ); ?>"><?php echo esc_attr( $pirate_forms_widget_subtext ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pirate_forms_widget_ajax' ); ?>"><?php _e( 'Submit form using Ajax:', 'pirate-forms' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'pirate_forms_widget_ajax' ); ?>" name="<?php echo $this->get_field_name( 'pirate_forms_widget_ajax' ); ?>" value="1" <?php echo $pirate_forms_widget_ajax; ?>>
		</p>
		<?php
		echo apply_filters( 'pirate_forms_widget_form', sprintf( '<p>%s</p>', sprintf( __( 'Need more forms ? Check our <a href="%s" target="_blank">extended</a> version for more features', 'pirate-forms' ), PIRATEFORMS_USELL_LINK ) ), $instance, $this );
	}
}

<?php
/**
 * The template for adding Custom Sidebars and Widgets
 *
 * @package catchresponsive
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */

if ( ! defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_widgets_init() {
	//Primary Sidebar
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'catch-responsive-pro' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		'description'	=> __( 'This is the primary sidebar if you are using a two column site layout option.', 'catch-responsive-pro' ),
	) );

	$footer_sidebar_number = 4; //Number of footer sidebars

	for( $i=1; $i <= $footer_sidebar_number; $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Area %d', 'catch-responsive-pro' ), $i ),
			'id'            => sprintf( 'footer-%d', $i ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
			'description'	=> sprintf( __( 'Footer %d widget area.', 'catch-responsive-pro' ), $i ),
		) );
	}

	//Header Right
	register_sidebar( array(
		'name'          => __( 'Header Right', 'catch-responsive-pro' ),
		'id'            => 'header-right',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		'description'	=> __( 'This is the header right widget area. It typically appears on the right of the site title or logo. This widget area is not equipped to display any widget, and works best with a custom menu assigned as header right menu, a search form, social icons widget or possibly a text widget.', 'catch-responsive-pro' ),
	) );

	//Featured Widget Content
	register_sidebar( array(
		'name'          => __( 'Featured Widget Content', 'catch-responsive-pro' ),
		'id'            => 'featured-widget-content',
		'before_widget' => '<section id="%1$s" class="hentry widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- #widget-default-search -->',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		'description'	=> __( 'This is the Featured Widget Content. Enable it by going to Appearance => Customize => Featured Widget Content Options => Enable Featured content Widget Content on', 'catch-responsive-pro' ),
	) );

	//Promotion Headline Left
	register_sidebar( array(
		'name'          => __( 'Promotion Headline Left', 'catch-responsive-pro' ),
		'id'            => 'promotion-headline-left',
		'before_widget' => '<div id="%1$s" class="section left">',
		'after_widget'  => '</div><!-- .section .left -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> __( 'This is the Promotion Headline Left. Enable it by going to Appearance => Customize => Theme Options => Promotion Headline Options.', 'catch-responsive-pro' ),
	) );

	//Promotion Headline Right
	register_sidebar( array(
		'name'          => __( 'Promotion Headline Right', 'catch-responsive-pro' ),
		'id'            => 'promotion-headline-right',
		'before_widget' => '<div id="%1$s" class="section right">',
		'after_widget'  => '</div><!-- .section .right -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> __( 'This is the Promotion Headline Right. Enable it by going to Appearance => Customize => Theme Options => Promotion Headline Options.', 'catch-responsive-pro' ),
	) );

	// Registering 404 Error Page Content
	register_sidebar( array(
		'name'					=> __( '404 Page Not Found Content', 'catch-responsive-pro' ),
		'id' 					=> 'sidebar-notfound',
		'description'			=> __( 'Replaces the default 404 Page Not Found Content', 'catch-responsive-pro' ),
		'before_widget'			=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			=> '</aside>',
		'before_title'			=> '<h2 class="widget-title">',
		'after_title'			=> '</h2>',
	) );

	if ( class_exists( 'woocommerce' ) ) {
		//Optional Primary Sidebar for Shop
		register_sidebar( array(
			'name' 				=> __( 'WooCommerce Primary Sidebar', 'catch-responsive-pro' ),
			'id' 				=> 'sidebar-optional-woocommmerce',
			'description'		=> __( 'This is Optional Primary Sidebar for WooCommerce', 'catch-responsive-pro' ),
			'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget'		=> '</div><!-- .widget-wrap --></section>',
			'before_title'  	=> '<h4 class="widget-title">',
			'after_title'   	=> '</h4>',
		) );
	}

	//Optional Sidebar for Hompeage instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Homepage Sidebar', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-homepage',
		'description'		=> __( 'This is Optional Sidebar for Homepage', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );

	//Optional Sidebar for Archive instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Archive Sidebar', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-archive',
		'description'		=> __( 'This is Optional Sidebar for Archive', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );

	//Optional Sidebar for Page instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Page Sidebar', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-page',
		'description'		=> __( 'This is Optional Sidebar for Page', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );

	//Optional Sidebar for Post instead of main sidebar
	register_sidebar( array(
		'name' 				=> __( 'Optional Post Sidebar', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-post',
		'description'		=> __( 'This is Optional Sidebar for Post', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );

	//Optional Sidebar one for page and post
	register_sidebar( array(
		'name' 				=> __( 'Optional Sidebar One', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-one',
		'description'		=> __( 'This is Optional Sidebar One', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );

	//Optional Sidebar two for page and post
	register_sidebar( array(
		'name' 				=> __( 'Optional Sidebar Two', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-two',
		'description'		=> __( 'This is Optional Sidebar Two', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );

	//Optional Sidebar Three for page and post
	register_sidebar( array(
		'name' 				=> __( 'Optional Sidebar Three', 'catch-responsive-pro' ),
		'id' 				=> 'sidebar-optional-three',
		'description'		=> __( 'This is Optional Sidebar Three', 'catch-responsive-pro' ),
		'before_widget'		=> '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'		=> '</div><!-- .widget-wrap --></section>',
		'before_title'  	=> '<h4 class="widget-title">',
		'after_title'   	=> '</h4>',
	) );
}
add_action( 'widgets_init', 'catchresponsive_widgets_init' );


/**
 * Adds catchresponsiveSocialIcons widget.
 *
 * @since Catch Responsive 1.0
 */
class Catchresponsive_social_icons_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'catchresponsive_social_icons', // Base ID
			__( 'CT: Social Icons', 'catch-responsive-pro' ), // Name
			array( 'description' => __( 'Use this widget to add Social Icons as a widget. ', 'catch-responsive-pro' ) ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		echo $args['before_widget'];

		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		echo catchresponsive_get_social_icons();

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title (optional):', 'catch-responsive-pro' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}


/**
 * Widget that shows selected page content and the title.
 * Construct the widget.
 * i.e. Name, description and control options.
 * Has form to ask the title, select page
 * In the display function we show the title and selected page's content.
 * If the title is not set, it shows the page title as the title.
 *
 */
class Catchresponsive_get_page_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'catchresponsive_page_widget', // Base ID
			__( 'CT: Featured Page', 'catch-responsive-pro' ), // Name
			array( 'description' => __( 'Display Featured Page. Suitable for Home Top Area and Home Left Area', 'catch-responsive-pro' ) ) // Args
		);
	}

 	function form( $instance ) {
 		//Defaults
 		$instance = wp_parse_args( (array) $instance, array(
 															'title' 					=> '',
															'page_id' 					=> '',
															'disable_featured_image'	=> 0,
															'image_position' 			=> 'above',
															'show_content' 				=> 'excerpt',
															'excerpt_length' 			=> 200
														) );

 		$page_id 				= absint( $instance['page_id'] );
		$title 					= esc_attr( $instance['title'] );
		$disable_featured_image = $instance['disable_featured_image'] ? 'checked="checked"' : '';
		$image_position 		= $instance['image_position'];
		$show_content			= $instance['show_content'];
		$excerpt_length			= absint( $instance['excerpt_length'] );
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'catch-responsive-pro' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

        <p class="description">
			<?php _e( 'Displays the title of the Page if title input is empty.', 'catch-responsive-pro' ); ?>
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page', 'catch-responsive-pro' ); ?>:</label>
			<?php
				wp_dropdown_pages( array(
										'name' 		=> $this->get_field_name( 'page_id' ),
										'selected' 	=> $instance['page_id']
									) );
			?>
		</p>

        <p>
			<input class="checkbox" type="checkbox" <?php echo $disable_featured_image; ?> id="<?php echo $this->get_field_id( 'disable_featured_image' ); ?>" name="<?php echo $this->get_field_name( 'disable_featured_image' ); ?>" /> <label for="<?php echo $this->get_field_id( 'disable_featured_image' ); ?>"><?php _e( 'Remove Featured image', 'catch-responsive-pro' ); ?></label>
		</p>

	    <?php if ( 'above' == $image_position ) { ?>
            <p>
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" style="" checked /><?php _e( 'Show Image Before Title', 'catch-responsive-pro' );?><br />
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" style="" /><?php _e( 'Show Image After Title', 'catch-responsive-pro' );?><br />
            </p>
		<?php } else { ?>
            <p>
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" style="" /><?php _e( 'Show Image Before Title', 'catch-responsive-pro' );?><br />
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" style="" checked /><?php _e( 'Show Image After Title', 'catch-responsive-pro' );?><br />
            </p>
		<?php } ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Show Content', 'catch-responsive-pro' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>">
				<option value="excerpt" <?php selected( 'excerpt', $instance['show_content'] ); ?>><?php _e( 'Excerpt', 'catch-responsive-pro' ); ?></option>
				<option value="fullcontent" <?php selected( 'fullcontent', $instance['show_content'] ); ?>><?php _e( 'Full Content', 'catch-responsive-pro' ); ?></option>
				<option value="hide" <?php selected( 'hide', $instance['show_content'] ); ?>><?php _e( 'Hide', 'catch-responsive-pro' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php _e( 'Content Character Limit for Excerpt Only', 'catch-responsive-pro' ); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" value="<?php echo $excerpt_length; ?>" type="number" min="5" />
       	</p>

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance 							= $old_instance;

		$instance['title'] 					= sanitize_text_field( $new_instance['title'] );

		$instance['page_id'] 				= absint( $new_instance['page_id'] );

		$instance['disable_featured_image'] = isset( $new_instance['disable_featured_image'] ) ? 1 : 0;

		$instance['image_position'] 		= $new_instance['image_position'];

		$instance['show_content']			= $new_instance['show_content'];

		$instance['excerpt_length']			= absint( $new_instance['excerpt_length'] );

		return $instance;
	}

	function widget( $args, $instance ) {
 		extract( $args );

		extract( $instance );

		global $post;

		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		$page_id = isset( $instance['page_id'] ) ? $instance['page_id'] : '';

		$disable_featured_image = !empty( $instance['disable_featured_image'] ) ? 'true' : 'false';

		$image_position = isset( $instance['image_position'] ) ? $instance['image_position'] : 'above' ;

		$show_content 	= isset( $instance['show_content'] ) ? $instance['show_content'] : 'excerpt' ;

		$excerpt_length	= isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 200;

		$options		= catchresponsive_get_theme_options();

		$more_tag_text	= $options['excerpt_more_text'];

 		if ( $page_id ) {
 			$the_query = new WP_Query( 'page_id='.$page_id );

			while( $the_query->have_posts() ) :
				$the_query->the_post();

				$page_name = the_title( '', '', false );

				$output = $before_widget;

				$output .= '<article class="post-'. $page_id . ' page type-page entry">';

					//Image position set below
					if ( $image_position == "below" ) {
						// Wiget title replace the page title is added
						if ( $title ) {

							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $title .'">'. $title .'</a></h2></header>';
						}
						else {
							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $page_name .'">'. $page_name .'</a></h2></header>';
						}
					}

					if ( has_post_thumbnail() && $disable_featured_image != "true" ) {
						$output.= '<figure class="featured-image excerpt-landscape-featured-image"><a href="' . get_permalink() . '" title="' . $page_name . '">' . get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-landscape', array( 'title' => esc_attr( $page_name ), 'alt' => esc_attr( $page_name ) ) ).'</a></figure>';
					}

					//Image position set above
					if ( $image_position == "above" ) {
						// Wiget title replace the page title is added
						if ( $title ) {
							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $title .'">'. $title .'</a></h2></header>';
						}
						else {
							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $page_name .'">'. $page_name .'</a></h2></header>';
						}
					}

					if ( 'excerpt' == $show_content ) {
						$output .= '<div class="entry-summery">';
						$output .= catchresponsive_get_the_content_limit( (int) $excerpt_length, esc_html( $more_tag_text ) );
						$output .= '</div><!-- .entry-summery -->';
					}
					elseif ( 'fullcontent' == $show_content ) {
						$content = apply_filters( 'the_content', get_the_content() );
						$content = str_replace( ']]>', ']]&gt;', $content );
						$output .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
					}

				$output .= '</article><!-- .type-page -->';

				$output .= $after_widget;

			endwhile;

			// Reset Post Data
	 		wp_reset_postdata();

			echo $output;
 		}
 	}
}


/**
 * Featured post widget
 *
 * @since Catch Responsive 1.0
 */
class Catchresponsive_featured_post_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'catchresponsive_post_widget', // Base ID
			__( 'CT: Featured Post', 'catch-responsive-pro' ), // Name
			array( 'description' => __( 'Display Featured Post. Suitable for Home Top Area and Home Left Area', 'catch-responsive-pro' ) ) // Args
		);
	}

	function form( $instance ) {
		//Defaults
 		$instance = wp_parse_args( (array) $instance, array(
 															'title' 					=> '',
															'post_id' 					=> '',
															'disable_featured_image'	=> 0,
															'image_position' 			=> 'above',
															'show_content' 				=> 'excerpt',
															'excerpt_length' 			=> 200,
															'valid' => 'valid'
														) );

		$post_id 				= absint( $instance['post_id'] );
		$title 					= esc_attr( $instance['title'] );
		$disable_featured_image = $instance['disable_featured_image'] ? 'checked="checked"' : '';
		$image_position 		= $instance['image_position'];
		$show_content			= $instance['show_content'];
		$excerpt_length			= absint( $instance['excerpt_length'] );
		$valid_id				= $instance['valid'];
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'catch-responsive-pro' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

        <p>
			<?php _e( 'Displays the title of the Post if title input is empty.', 'catch-responsive-pro' ); ?>
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id( 'post_id' ); ?>"><?php _e( 'ID of the Post:', 'catch-responsive-pro'); ?></label>
			<input id="<?php echo $this->get_field_id( 'post_id' ); ?>" name="<?php echo $this->get_field_name( 'post_id' ); ?>" type="text" value="<?php echo $post_id; ?>" size="5" /> <br />
			<?php
			if ( 'not_valid' == $valid_id ) {
				echo '<strong>'. __( 'This Post ID is Not Valid', 'catch-responsive-pro' ) .'</strong>';
			}
			?>
        </p>

        <p>
        	<input class="checkbox" type="checkbox" <?php checked($instance['disable_featured_image'], true) ?> id="<?php echo $this->get_field_id( 'disable_featured_image' ); ?>" name="<?php echo $this->get_field_name( 'disable_featured_image' ); ?>" />
        	<label for="<?php echo $this->get_field_id('disable_featured_image'); ?>"><?php _e( 'Remove Featured image', 'catch-responsive-pro' ); ?></label><br />
        </p>

	    <?php if ( 'above' == $image_position ) { ?>
            <p>
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" style="" checked /><?php _e( 'Show Image Before Title', 'catch-responsive-pro' );?><br />
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" style="" /><?php _e( 'Show Image After Title', 'catch-responsive-pro' );?><br />
            </p>
		<?php } else { ?>
            <p>
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="above" style="" /><?php _e( 'Show Image Before Title', 'catch-responsive-pro' );?><br />
                <input type="radio" id="<?php echo $this->get_field_id( 'image_position' ); ?>" name="<?php echo $this->get_field_name( 'image_position' ); ?>" value="below" style="" checked /><?php _e( 'Show Image After Title', 'catch-responsive-pro' );?><br />
            </p>
		<?php } ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Show Content', 'catch-responsive-pro' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>">
				<option value="excerpt" <?php selected( 'excerpt', $instance['show_content'] ); ?>><?php _e( 'Excerpt', 'catch-responsive-pro' ); ?></option>
				<option value="fullcontent" <?php selected( 'fullcontent', $instance['show_content'] ); ?>><?php _e( 'Full Content', 'catch-responsive-pro' ); ?></option>
				<option value="hide" <?php selected( 'hide', $instance['show_content'] ); ?>><?php _e( 'Hide', 'catch-responsive-pro' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'excerpt_length' ); ?>"><?php _e( 'Content Character Limit', 'catch-responsive-pro' ); ?>: </label>
			<input id="<?php echo $this->get_field_id( 'excerpt_length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt_length' ); ?>" value="<?php echo $excerpt_length; ?>" type="number" min="5" />
       	</p>

       	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		$instance['disable_featured_image'] = isset( $new_instance['disable_featured_image'] ) ? 1 : 0;

		$instance['image_position'] = $new_instance['image_position'];
		$instance['show_content']   = $new_instance['show_content'];
		$instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );
		$instance['post_id']        = absint( $new_instance['post_id'] );

		$instance['valid'] = 'valid';

		if ( !get_post_status( $instance['post_id'] ) ) {
			$instance['valid'] = 'not_valid';
		}

		return $instance;
	}

	function widget( $args, $instance ) {
		global $valid_id, $post;

		extract( $args );

		if ( !empty( $instance ) ) {
			extract( $instance );
		}


		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		$disable_featured_image = !empty( $instance['disable_featured_image'] ) ? 'true' : 'false';

		$image_position = isset( $instance['image_position'] ) ? $instance['image_position'] : 'above' ;

		$show_content   = isset( $instance['show_content'] ) ? $instance['show_content'] : 'excerpt' ;

		$excerpt_length	= isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 200;

		$options		= catchresponsive_get_theme_options();

		$more_tag_text	= $options['excerpt_more_text'];

		if ( empty( $instance['post_id'] ) || ! $post_id = absint( $instance['post_id'] ) )
			$post_id = NULL;

		// The Query
		if ( $instance['valid'] =='valid' ):
			$the_query = new WP_Query( 'p='.$post_id );

			// The Loop
			while ( $the_query->have_posts() ) :
				$the_query->the_post();

				$post_name = the_title( '', '', false );

				$output = $before_widget;

				$output .= '<article class="post-'. $post_id . ' page type-post entry">';

					//Image position set below
					if ( $image_position == "below" ) {
						// Wiget title replace the page title is added
						if ( $title ) {

							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $title .'">'. $title .'</a></h2></header>';
						}
						else {
							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $post_name .'">'. $post_name .'</a></h2></header>';
						}
					}

					if ( has_post_thumbnail() && $disable_featured_image != "true" ) {
						$output.= '<figure class="featured-image excerpt-landscape-featured-image"><a href="' . get_permalink() . '" title="' . $post_name . '">' . get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-landscape', array( 'title' => esc_attr( $post_name ), 'alt' => esc_attr( $post_name ) ) ).'</a></figure>';
					}

					//Image position set above
					if ( $image_position == "above" ) {
						// Wiget title replace the page title is added
						if ( $title ) {

							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $title .'">'. $title .'</a></h2></header>';
						}
						else {
							$output .= '<header class="entry-header"><h2 class="entry-title"><a href="' . get_permalink() . '" title="'. $post_name .'">'. $post_name .'</a></h2></header>';
						}
					}

					if ( 'excerpt' == $show_content ) {
						$output .= '<div class="entry-summery">';
						$output .= catchresponsive_get_the_content_limit( (int) $excerpt_length, esc_html( $more_tag_text ) );
						$output .= '</div><!-- .entry-summery -->';
					}
					elseif ( 'fullcontent' == $show_content ) {
						$content = apply_filters( 'the_content', get_the_content() );
						$content = str_replace( ']]>', ']]&gt;', $content );
						$output .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
					}

				$output .= '</article><!-- .type-post -->';

				$output .= $after_widget;

			endwhile;

			// Reset Post Data
			wp_reset_postdata();

			echo $output;

		endif;

	}

}


/**
 * Makes a custom Widget for Displaying Ads
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0
 */
class Catchresponsive_adspace_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'widget_catchresponsive_adspace_widget', // Base ID
			__( 'CT: Advertisement', 'catch-responsive-pro' ), // Name
			array( 'description' => __( 'Use this widget to add any type of Advertisement as a widget', 'catch-responsive-pro' ) ) // Args
		);
	}

	/**
	 * Creates the form for the widget in the back-end which includes the Title , adcode, image, alt
	 * $instance Current settings
	 */
	function form($instance) {
		$instance 	= wp_parse_args(
						(array) $instance,

						array(
							'title' => '',
							'adcode' => '',
							'image' => '',
							'href' => '',
							'target' => '0',
							'alt' => ''
							)
					);
		$title 		= esc_attr( $instance[ 'title' ] );
		$adcode 	= esc_textarea( $instance[ 'adcode' ] );
		$image 		= esc_url( $instance[ 'image' ] );
		$href 		= esc_url( $instance[ 'href' ] );
		$target 	= $instance['target'] ? 'checked="checked"' : '';
		$alt 		= esc_attr( $instance[ 'alt' ] );
		if ( isset( $instance['enable_hide_404'] ) ) {
			if ( $instance['enable_hide_404'] ) {
				$enable_hide_404 = 'checked="checked"';
			}
			else {
				$enable_hide_404 = '';
			}
		}
		else {
			$enable_hide_404 = 'checked="checked"';
		}
		?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):','catch-responsive-pro'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <?php if ( current_user_can( 'unfiltered_html' ) ) : // Only show it to users who can edit it ?>
            <p>
                <label for="<?php echo $this->get_field_id('adcode'); ?>"><?php _e('Advertisement Code:','catch-responsive-pro'); ?></label>
                <textarea name="<?php echo $this->get_field_name('adcode'); ?>" class="widefat" id="<?php echo $this->get_field_id('adcode'); ?>"><?php echo $adcode; ?></textarea>
            </p>
            <p><strong>or</strong></p>
        <?php endif; ?>
        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image Url:','catch-responsive-pro'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('image'); ?>" value="<?php echo $image; ?>" class="widefat" id="<?php echo $this->get_field_id('image'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('href'); ?>"><?php _e('Link URL:','catch-responsive-pro'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('href'); ?>" value="<?php echo esc_url( $href ); ?>" class="widefat" id="<?php echo $this->get_field_id('href'); ?>" />
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php echo $target; ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" /> <label for="<?php echo $this->get_field_id('target'); ?>"><?php _e( 'Open Link in New Window', 'catch-responsive-pro' ); ?></label>
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('alt'); ?>"><?php _e('Alt text:','catch-responsive-pro'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('alt'); ?>" value="<?php echo $alt; ?>" class="widefat" id="<?php echo $this->get_field_id('alt'); ?>" />
        </p>
        <p>
			<input class="checkbox" type="checkbox" <?php echo $enable_hide_404; ?> id="<?php echo $this->get_field_id('enable_hide_404'); ?>" name="<?php echo $this->get_field_name('enable_hide_404'); ?>" /> <label for="<?php echo $this->get_field_id('enable_hide_404'); ?>"><?php _e( 'Check to Hide Ad on 404 page', 'catch-responsive-pro' ); ?></label>
		</p>
        <?php
	}

	/**
	 * update the particular instant
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * $new_instance New settings for this instance as input by the user via form()
	 * $old_instance Old settings for this instance
	 * Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags($new_instance['title']);
		$instance['adcode']   = wp_kses_stripslashes($new_instance['adcode']);
		$instance['image']    = esc_url_raw($new_instance['image']);
		$instance['href']     = esc_url_raw($new_instance['href']);
		$instance[ 'target' ] = isset( $new_instance[ 'target' ] ) ? 1 : 0;
		$instance['alt']      = sanitize_text_field($new_instance['alt']);

		$instance[ 'enable_hide_404' ] = isset( $new_instance[ 'enable_hide_404' ] ) ? 1 : 0;

		return $instance;
	}

	/**
	 * Displays the Widget in the front-end.
	 *
	 * $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		if ( isset( $instance['enable_hide_404'] ) && $instance['enable_hide_404'] && is_404() ) {
			//Bail Early if the page is 404 error page and the widget is set to be hidden in that page
			return;
		}


		$title 	= !empty( $instance['title'] ) ? $instance['title'] : '';
		$adcode = !empty( $instance['adcode'] ) ? $instance['adcode'] : '';
		$image 	= !empty( $instance['image'] ) ? $instance['image'] : '';
		$href 	= !empty( $instance['href'] ) ? $instance['href'] : '';
		$target = !empty( $instance['target' ] ) ? 'true' : 'false';
		$alt 	= !empty( $instance['alt'] ) ? $instance['alt'] : '';

		$enable_hide_404 = !empty( $instance[ 'enable_hide_404' ] ) ? 'true' : 'false';

		if ( $target == "true" ) :
			$base = '_blank';
		else:
			$base = '_self';
		endif;

		echo $before_widget;
		if ( '' != $title ) {
			echo $before_title . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $after_title;
		}

		if ( '' != $adcode ) {
			echo $adcode;
		}
		elseif ( '' != $image ) {
        	if ( '' != $href ) {
        		echo '<a href="'.$href.'" target="'.$base.'"><img src="'. $image.'" alt="'.$alt.'" /></a>';
        	}
        	else {
        		echo '<img src="'. $image.'" alt="'.$alt.'" />';
        	}
		}
		else {
			_e( 'Add Advertisement Code or Image URL', 'catch-responsive-pro' );
		}
		echo $after_widget;
	}

}


/**
 * Register Widgets
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_register_widgets() {
    register_widget( 'Catchresponsive_social_icons_widget' );

	register_widget( 'Catchresponsive_get_page_widget' );

	register_widget( 'Catchresponsive_featured_post_widget' );

	register_widget( 'Catchresponsive_adspace_widget' );
}
add_action( 'widgets_init', 'catchresponsive_register_widgets' );
<?php
/**
 * The template for displaying the Slider
 *
 * @package Catch Themes
 * @subpackage Catch Responsive Pro
 * @since Catch Responsive 1.0
 */

if ( ! defined( 'CATCHRESPONSIVE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if ( !function_exists( 'catchresponsive_featured_slider' ) ) :
/**
 * Add slider.
 *
 * @uses action hook catchresponsive_before_content.
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_slider() {
	global $post, $wp_query;
	//catchresponsive_flush_transients();
	// get data value from options
	$options 		= catchresponsive_get_theme_options();
	$enableslider 	= $options['featured_slider_option'];
	$sliderselect 	= $options['featured_slider_type'];
	$imageloader	= isset ( $options['featured_slider_image_loader'] ) ? $options['featured_slider_image_loader'] : 'true';

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	if ( 'entire-site' == $enableslider || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enableslider ) ) {
		if ( ( !$catchresponsive_featured_slider = get_transient( 'catchresponsive_featured_slider' ) ) ) {
			echo '<!-- refreshing cache -->';

			$catchresponsive_featured_slider = '
				<section id="feature-slider">
					<div class="wrapper">
						<div class="cycle-slideshow"
						    data-cycle-log="false"
						    data-cycle-pause-on-hover="true"
						    data-cycle-swipe="true"
						    data-cycle-auto-height=container
						    data-cycle-fx="'. esc_attr( $options['featured_slide_transition_effect'] ) .'"
							data-cycle-speed="'. absint( $options['featured_slide_transition_length'] ) * 1000 .'"
							data-cycle-timeout="'. absint( $options['featured_slide_transition_delay'] ) * 1000 .'"
							data-cycle-loader="'. esc_attr( $imageloader ) .'"
							data-cycle-loop="'. esc_attr( absint( $options['featured_slide_loop'] ) ) .'"
							data-cycle-slides="> article"
							>

						    <!-- prev/next links -->
						    <div class="cycle-prev"></div>
						    <div class="cycle-next"></div>

						    <!-- empty element for pager links -->
	    					<div class="cycle-pager"></div>';

							// Select Slider
							if ( 'demo-featured-slider' == $sliderselect && function_exists( 'catchresponsive_demo_slider' ) ) {
								$catchresponsive_featured_slider .=  catchresponsive_demo_slider( $options );
							}
							elseif ( 'featured-post-slider' == $sliderselect && function_exists( 'catchresponsive_post_slider' ) ) {
								$catchresponsive_featured_slider .=  catchresponsive_post_slider( $options );
							}
							elseif ( 'featured-page-slider' == $sliderselect && function_exists( 'catchresponsive_page_slider' ) ) {
								$catchresponsive_featured_slider .=  catchresponsive_page_slider( $options );
							}
							elseif ( 'featured-category-slider' == $sliderselect && function_exists( 'catchresponsive_category_slider' ) ) {
								$catchresponsive_featured_slider .=  catchresponsive_category_slider( $options );
							}
							elseif ( 'featured-image-slider' == $sliderselect && function_exists( 'catchresponsive_image_slider' ) ) {
								$catchresponsive_featured_slider .=  catchresponsive_image_slider( $options );
							}

			$catchresponsive_featured_slider .= '
						</div><!-- .cycle-slideshow -->
					</div><!-- .wrapper -->
				</section><!-- #feature-slider -->';

			set_transient( 'catchresponsive_featured_slider', $catchresponsive_featured_slider, 86940 );
		}
		echo $catchresponsive_featured_slider;
	}
}
endif;
add_action( 'catchresponsive_before_content', 'catchresponsive_featured_slider', 10 );


if ( ! function_exists( 'catchresponsive_demo_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from customizer options
 *
 * @since Catch Responsive 1.0
 *
 */
function catchresponsive_demo_slider( $options ) {
	$catchresponsive_demo_slider ='
								<article class="post demo-image-1 hentry slides displayblock">
									<figure class="slider-image">
										<a title="Slider Image 1" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'.get_template_directory_uri().'/images/gallery/slider1-1200x514.jpg" class="wp-post-image" alt="Slider Image 1" title="Slider Image 1">
										</a>
									</figure>
									<div class="entry-container">
										<header class="entry-header">
											<h1 class="entry-title">
												<a title="Slider Image 1" href="#"><span>Slider Image 1</span></a>
											</h1>
											<div class="assistive-text"><span class="post-time">Posted on <time pubdate="" datetime="2014-08-16T10:56:23+00:00" class="entry-date updated">16 August, 2014</time></span><span class="post-author">By <span class="author vcard"><a rel="author" title="View all posts by Catch Themes" href="https://catchthemes.com/blog/" class="url fn n">Catch Themes</a></span></span></div>
										</header>
										<div class="entry-content">
											<p>Slider Image 1 Content</p>
										</div>
									</div>
								</article><!-- .slides -->

								<article class="post demo-image-2 hentry slides displaynone">
									<figure class="Slider Image 2">
										<a title="Slider Image 2" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'. get_template_directory_uri() . '/images/gallery/slider2-1200x514.jpg" class="wp-post-image" alt="Slider Image 2" title="Slider Image 2">
										</a>
									</figure>
									<div class="entry-container">
										<header class="entry-header">
											<h1 class="entry-title">
												<a title="Slider Image 2" href="#"><span>Slider Image 2</span></a>
											</h1>
											<div class="assistive-text"><span class="post-time">Posted on <time pubdate="" datetime="2014-08-16T10:56:23+00:00" class="entry-date updated">16 August, 2014</time></span><span class="post-author">By <span class="author vcard"><a rel="author" title="View all posts by Catch Themes" href="https://catchthemes.com/blog/" class="url fn n">Catch Themes</a></span></span></div>
										</header>
										<div class="entry-content">
											<p>Slider Image 2 Content</p>
										</div>
									</div>
								</article><!-- .slides --> ';
	return $catchresponsive_demo_slider;
}
endif; // catchresponsive_demo_slider


if ( ! function_exists( 'catchresponsive_post_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_post_slider( $options ) {
	$quantity	= $options['featured_slide_number'];

	global $post;

    $catchresponsive_post_slider = '';

   	$number_of_post = 0; 		// for number of posts

	$post_list		= array();	// list of valid post ids

	//Get valid post ids
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_slider_post_' . $i] ) && $options['featured_slider_post_' . $i] > 0 ){
			$number_of_post++;

			$post_list	=	array_merge( $post_list, array( $options['featured_slider_post_' . $i] ) );
		}

	}

	if ( !empty( $post_list ) && $number_of_post > 0 ) {
        $catchresponsive_post_slider = '';

    	$get_featured_posts = new WP_Query( array(
            'posts_per_page' => $number_of_post,
            'post__in'       => $post_list,
            'orderby'        => 'post__in',
            'ignore_sticky_posts' => 1 // ignore sticky posts
        ));

		$i=0;
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;

			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive-pro' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'post post-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'post post-'.$post->ID.' hentry slides displaynone'; }

			$catchresponsive_post_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
				if ( has_post_thumbnail() ) {
					$catchresponsive_post_slider .= '<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'attached-post-image' ) ).'
					</a>';
				}
				else {
					//Default value if there is no first image
					$catchresponsive_image = '<img class="pngfix wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1200x514.jpg" >';

					//Get the first image in page, returns false if there is no image
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'attached-post-image' ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_image =	$catchresponsive_first_image;
					}

					$catchresponsive_post_slider .= '<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
						'. $catchresponsive_image .'
					</a>';
				}

				$catchresponsive_post_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
						</h1>
						<div class="assistive-text">'.catchresponsive_page_post_meta().'</div>
					</header>';
					if ( $excerpt !='') {
						$catchresponsive_post_slider .= '<div class="entry-content"><p>'. $excerpt.'</p></div>';
					}
					$catchresponsive_post_slider .= '
				</div><!-- .entry-container -->
			</article><!-- .slides -->';
		endwhile;

		wp_reset_query();

		return $catchresponsive_post_slider;
	}
}
endif; // catchresponsive_post_slider


if ( ! function_exists( 'catchresponsive_page_slider' ) ) :
/**
 * This function to display featured page slider
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_page_slider( $options ) {
	$quantity		= $options['featured_slide_number'];
	$more_link_text	=	$options['excerpt_more_text'];

    global $post;

    $catchresponsive_page_slider = '';
    $number_of_page 		= 0; 		// for number of pages
	$page_list				= array();	// list of valid page ids

	//Get number of valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_slider_page_' . $i] ) && $options['featured_slider_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_slider_page_' . $i] ) );
		}

	}

	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
			'posts_per_page'	=> $quantity,
			'post_type'			=> 'page',
			'post__in'			=> $page_list,
			'orderby' 			=> 'post__in'
		));
		$i=0;

		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive-pro' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'page post-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'page post-'.$post->ID.' hentry slides displaynone'; }
			$catchresponsive_page_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
				if ( has_post_thumbnail() ) {
					$catchresponsive_page_slider .= '<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'attached-page-image' ) ).'
					</a>';
				}
				else {
					//Default value if there is no first image
					$catchresponsive_image = '<img class="pngfix wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1200x514.jpg" >';

					//Get the first image in page, returns false if there is no image
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'attached-page-image' ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_image =	$catchresponsive_first_image;
					}

					$catchresponsive_page_slider .= '<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
						'. $catchresponsive_image .'
					</a>';
				}

				$catchresponsive_page_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
						</h1>
						<div class="assistive-text">'.catchresponsive_page_post_meta().'</div>
					</header>';
					if ( $excerpt !='') {
						$catchresponsive_page_slider .= '<div class="entry-content"><p>'. $excerpt.'</p></div>';
					}
					$catchresponsive_page_slider .= '
				</div><!-- .entry-container -->
			</article><!-- .slides -->';
		endwhile;

		wp_reset_query();
  	}
	return $catchresponsive_page_slider;
}
endif; // catchresponsive_page_slider


if ( ! function_exists( 'catchresponsive_category_slider' ) ) :
/**
 * This function to display featured category slider
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_category_slider( $options ) {
    $quantity	= $options['featured_slide_number'];

	global $post;

	$catchresponsive_category_slider = '';

	$category_list	= (array) $options['featured_slider_select_category'];

	if ( !empty( $category_list ) ) {
		$get_featured_posts = new WP_Query( array(
			'posts_per_page'		=> $quantity,
			'category__in'			=> $category_list,
			'ignore_sticky_posts' 	=> 1 // ignore sticky posts
		));

		$i=0;

		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive-pro' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'post post-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'post post-'.$post->ID.' hentry slides displaynone'; }
			$catchresponsive_category_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
				if ( has_post_thumbnail() ) {
					$catchresponsive_category_slider .= '<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'attached-post-image' ) ).'
					</a>';
				}
				else {
					//Default value if there is no first image
					$catchresponsive_image = '<img class="pngfix wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1200x514.jpg" >';

					//Get the first image in page, returns false if there is no image
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'attached-post-image' ) );
					//Set value of image as first image if there is an image present in the page
					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_image =	$catchresponsive_first_image;
					}

					$catchresponsive_category_slider .= '<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">
						'. $catchresponsive_image .'
					</a>';
				}


				$catchresponsive_category_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
						</h1>
						<div class="assistive-text">'.catchresponsive_page_post_meta().'</div>
					</header>';
					if ( $excerpt !='') {
						$catchresponsive_category_slider .= '<div class="entry-content"><p>'. $excerpt.'</p></div>';
					}
					$catchresponsive_category_slider .= '
				</div><!-- .entry-container -->
			</article><!-- .slides -->';
		endwhile;

		wp_reset_query();
	}
	return $catchresponsive_category_slider;
}
endif; // catchresponsive_category_slider


if ( ! function_exists( 'catchresponsive_image_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from theme options
 * @displays on the index
 *
 * @useage Featured Image, Title and Excerpt of Post
 *
 */
function catchresponsive_image_slider( $options ) {
	$quantity	= $options['featured_slide_number'];

	$catchresponsive_image_slider = '';

	for ( $i = 1; $i <= $quantity; $i++ ) {

		//Adding in Classes for Display block and none
		if ( $i == 1 ) { $classes = 'slider-image images-'.$i.' hentry slides displayblock'; } else { $classes = 'slider-image images-'.$i.' hentry slides displaynone'; }

		//Check Image Not Empty to add in the slides
		if ( !empty ( $options[ 'featured_slider_image_'. $i ] ) ) {

			//Checking Title
			if ( !empty ( $options[ 'featured_title_'. $i ] ) ) {
				$imagetitle = $options[ 'featured_title_'. $i ];
			}
			else {
				$imagetitle = 'Featured Image-'.$i;
			}

			//Checking Link
			if ( !empty ( $options[ 'featured_link_'. $i ] ) ) {
				$link = $options[ 'featured_link_'. $i ];

				//Checking Link Target
				if ( !empty ( $options[ 'featured_target_'. $i ] ) ) {
					$target = '_blank';
				} else {
					$target = '_self';
				}

				//Checking image
				$image = '<a href="'. esc_url( $link ).'" title="'. esc_attr( $imagetitle ) .'" target="'.$target.'"><img alt="'. esc_attr( $imagetitle ) .'" class="wp-post-image" src="'. esc_url( $options[ 'featured_slider_image_'. $i ] ) .'" /></a>';

			}
			else {
				$link = '';
				$target = '';
				$image = '<img alt="'. esc_attr( $imagetitle ) .'" class="wp-post-image" src="'. esc_url( $options['featured_slider_image_'. $i] ).'" />';
			}

			//Checking Title
			if ( !empty ( $options['featured_title_'. $i] ) ) {
				$content_title = $options['featured_title_'. $i];

				if ( !empty ( $options[ 'featured_link_'. $i ] ) ) {
					$title = '<header class="entry-header"><h1 class="entry-title"><a title="' . esc_attr( $content_title ) . '" href="' . esc_url( $link ) . '" target="' . $target . '"><span>' . esc_attr( $content_title ) . '</span></a></h1></header>';
				}
				else {
					$title = '<header class="entry-header"><h1 class="entry-title"><span>' . esc_attr( $content_title ) . '</span></h1></header>';
				}

			}
			else {
				$content_title = '';
				$title = '';
			}

			//Checking Content
			if ( !empty ( $options['featured_content_'. $i] ) ) {
				$content = '<div class="entry-content"><p>' . $options['featured_content_'. $i] . '</p></div><!-- .entry-content -->';
			}
			else {
				$content = '';
			}

			//Content Opening and Closing
			if ( !empty ( $content_title ) || !empty ( $content ) ) {
				$contentopening = '<div class="entry-container"><p>';
				$contentclosing = '</p></div>';
			}
			else {
				$contentopening = '';
				$contentclosing = '';
			}

			$catchresponsive_image_slider .= '
								<article class="image-slides hentry '. $classes .'">
									<figure class="slider-image">
										'. $image .'
									</figure>
									' . $contentopening . $title . $content . $contentclosing . '
								</article><!-- .slides --> ';
		}
	}
	return $catchresponsive_image_slider;
}
endif; //catchresponsive_image_slider
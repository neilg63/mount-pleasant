<?php
/**
 * The template for displaying the Featured Content
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


if ( !function_exists( 'catchresponsive_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook catchresponsive_before_content.
*
* @since Catch Responsive 1.0
*/
function catchresponsive_featured_content_display() {
	//catchresponsive_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$options 		= catchresponsive_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent ) ) {
		if ( 'featured-widget-content' == $contentselect ) {
			get_sidebar( 'featured-widget-content' );
		}
		else {
			if ( ( !$catchresponsive_featured_content = get_transient( 'catchresponsive_featured_content' ) ) ) {
				$layouts 	 = $options ['featured_content_layout'];
				$headline 	 = $options ['featured_content_headline'];
				$subheadline = $options ['featured_content_subheadline'];

				echo '<!-- refreshing cache -->';

				if ( !empty( $layouts ) ) {
					$classes = $layouts ;
				}

				if ( 'demo-featured-content' == $contentselect ) {
					$classes 	.= ' demo-featured-content' ;
					$headline 		= __( 'Featured Content', 'catch-responsive-pro' );
					$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'catch-responsive-pro' );
				}
				elseif ( 'featured-post-content' == $contentselect ) {
					$classes 	.= ' featured-post-content' ;
				}
				elseif ( 'featured-page-content' == $contentselect ) {
					$classes .= ' featured-page-content' ;
				}
				elseif ( 'featured-category-content' == $contentselect ) {
					$classes .= ' featured-category-content' ;
				}
				elseif ( 'featured-image-content' == $contentselect ) {
					$classes .= ' featured-image-content' ;
				}

				$featured_content_position = $options [ 'featured_content_position' ];

				if ( '1' == $featured_content_position ) {
					$classes .= ' border-top' ;
				}

				$catchresponsive_featured_content ='
					<section id="featured-content" class="' . $classes . '">
						<div class="wrapper">';
							if ( !empty( $headline ) || !empty( $subheadline ) ) {
								$catchresponsive_featured_content .='<div class="featured-heading-wrap">';
									if ( !empty( $headline ) ) {
										$catchresponsive_featured_content .='<h1 id="featured-heading" class="entry-title">'. $headline .'</h1>';
									}
									if ( !empty( $subheadline ) ) {
										$catchresponsive_featured_content .='<p>'. $subheadline .'</p>';
									}
								$catchresponsive_featured_content .='</div><!-- .featured-heading-wrap -->';
							}

							$catchresponsive_featured_content .='
							<div class="featured-content-wrap">';
								// Select content
								if ( 'demo-featured-content' == $contentselect && function_exists( 'catchresponsive_demo_content' ) ) {
									$catchresponsive_featured_content .= catchresponsive_demo_content( $options );
								}
								elseif ( 'featured-post-content' == $contentselect && function_exists( 'catchresponsive_post_content' ) ) {
									$catchresponsive_featured_content .= catchresponsive_post_content( $options );
								}
								elseif ( 'featured-page-content' == $contentselect && function_exists( 'catchresponsive_page_content' ) ) {
									$catchresponsive_featured_content .= catchresponsive_page_content( $options );
								}
								elseif ( 'featured-category-content' == $contentselect && function_exists( 'catchresponsive_category_content' ) ) {
									$catchresponsive_featured_content .= catchresponsive_category_content( $options );
								}
								elseif ( 'featured-image-content' == $contentselect && function_exists( 'catchresponsive_image_content' ) ) {
									$catchresponsive_featured_content .= catchresponsive_image_content( $options );
								}

				$catchresponsive_featured_content .='
							</div><!-- .featured-content-wrap -->
						</div><!-- .wrapper -->
					</section><!-- #featured-content -->';
				set_transient( 'catchresponsive_featured_content', $catchresponsive_featured_content, 86940 );

			}
			echo $catchresponsive_featured_content;
		}
	}
}
endif;


if ( ! function_exists( 'catchresponsive_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action catchresponsive_content, catchresponsive_after_secondary
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= catchresponsive_get_theme_options();

	$featured_content_position = $options [ 'featured_content_position' ];

	if ( '1' != $featured_content_position ) {
		add_action( 'catchresponsive_before_content', 'catchresponsive_featured_content_display', 40 );
	} else {
		add_action( 'catchresponsive_after_content', 'catchresponsive_featured_content_display', 40 );
	}

}
endif; // catchresponsive_featured_content_display_position
add_action( 'catchresponsive_before', 'catchresponsive_featured_content_display_position' );


if ( ! function_exists( 'catchresponsive_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Catch Responsive 1.0
 *
 */
function catchresponsive_demo_content( $options ) {
	$catchresponsive_demo_content = '
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Central Park" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured1-350x197.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						<a title="Central Park" href="#">Central Park</a>
					</h1>
				</header>
				<div class="entry-content">
					<p>Central Park is is the most visited urban park in the United States as well as one of the most filmed locations in the world. It was opened in 1857 and is expanded in 843 acres of city-owned land.</p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Home Office" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured2-350x197.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						<a title="Home Office" href="#">Home Office</a>
					</h1>
				</header>
				<div class="entry-content">
					<p>It might be work, but it doesn\'t have to feel like it. All you need is a comfortable desk, nice laptop, home office furniture that keeps things organized, and the right lighting for the job.</p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Vespa Scooter" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured3-350x197.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						<a title="Vespa Scooter" href="#">Vespa Scooter</a>
					</h1>
				</header>
				<div class="entry-content">
					<p>The Vespa Scooter has evolved from a single model motor scooter manufactured in the year 1946 by Piaggio & Co. S.p.A. of Pontedera, Italy-to a full line of scooters, today owned by Piaggio.</p>
				</div>
			</div><!-- .entry-container -->
		</article>';

	if ( 'layout-four' == $options ['featured_content_layout'] || 'layout-two' == $options ['featured_content_layout'] ) {
		$catchresponsive_demo_content .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Antique Clock" class="wp-post-image" src="'.get_template_directory_uri() . '/images/gallery/featured4-350x197.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						<a title="Antique Clock" href="#">Antique Clock</a>
					</h1>
				</header>
				<div class="entry-content">
					<p>Antique clocks increase in value with the rarity of the design, their condition, and appeal in the market place. Many different materials were used in antique clocks.</p>
				</div>
			</div><!-- .entry-container -->
		</article>';
	}

	return $catchresponsive_demo_content;
}
endif; // catchresponsive_demo_content


if ( ! function_exists( 'catchresponsive_post_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_post_content( $options ) {
	global $post;

	$quantity 		= $options [ 'featured_content_number' ];

	$number_of_post = 0; 		// for number of posts

	$post_list		= array();	// list of valid post ids

	$show_content	= $options['featured_content_show'];

	$catchresponsive_post_content = '';

	//Get valid number of posts
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_content_post_' . $i] ) && $options['featured_content_post_' . $i] > 0 ){
			$number_of_post++;

			$post_list	=	array_merge( $post_list, array( $options['featured_content_post_' . $i] ) );
		}

	}

	if ( !empty( $post_list ) && $number_of_post > 0 ) {
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
			$catchresponsive_post_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-post-content">';
				if ( has_post_thumbnail() ) {
					$catchresponsive_post_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_post_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $catchresponsive_first_image .'
							</a>
						</figure>';
					}
				}

				$catchresponsive_post_content .= '
					<div class="entry-container">
						<header class="entry-header">
							<h1 class="entry-title">
								<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h1>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$catchresponsive_post_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
						}
						elseif ( 'full-content' == $show_content ) {
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$catchresponsive_post_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
						}
					$catchresponsive_post_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}

	return $catchresponsive_post_content;
}
endif; // catchresponsive_post_content


if ( ! function_exists( 'catchresponsive_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_page_content( $options ) {
	global $post;

	$quantity 		= $options [ 'featured_content_number' ];

	$more_link_text	= $options['excerpt_more_text'];

	$show_content	= $options['featured_content_show'];

	$number_of_page = 0; 		// for number of pages

	$page_list		= array();	// list of valid pages ids

	$catchresponsive_page_content 	= '';

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0;
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive-pro' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			$catchresponsive_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';
				if ( has_post_thumbnail() ) {
					$catchresponsive_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_page_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $catchresponsive_first_image .'
							</a>
						</figure>';
					}
				}

				$catchresponsive_page_content .= '
					<div class="entry-container">
						<header class="entry-header">
							<h1 class="entry-title">
								<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h1>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$catchresponsive_page_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
						}
						elseif ( 'full-content' == $show_content ) {
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$catchresponsive_page_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
						}
					$catchresponsive_page_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}

	return $catchresponsive_page_content;
}
endif; // catchresponsive_page_content


if ( ! function_exists( 'catchresponsive_category_content' ) ) :
/**
 * This function to display featured category content
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_category_content( $options ) {
	global $post;

	$quantity 		= $options [ 'featured_content_number' ];

	$more_link_text	= $options['excerpt_more_text'];

	$category_list	= (array) $options['featured_content_select_category'];

	$show_content	= $options['featured_content_show'];

	$catchresponsive_category_content = '';

	$get_featured_posts = new WP_Query( array(
		'posts_per_page'		=> $quantity,
		'category__in'			=> $category_list,
		'ignore_sticky_posts' 	=> 1 // ignore sticky posts
	));

	$i=0;
	while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
		$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive-pro' ), 'echo' => false ) );
		$excerpt = get_the_excerpt();
		$catchresponsive_category_content .= '
			<article id="featured-post-' . $i . '" class="post hentry featured-category-content">';
			if ( has_post_thumbnail() ) {
				$catchresponsive_category_content .= '
				<figure class="featured-homepage-image">
					<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
					'. get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
					</a>
				</figure>';
			}
			else {
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-featured-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_category_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $catchresponsive_first_image .'
							</a>
						</figure>';
					}
				}

			$catchresponsive_category_content .= '
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
						</h1>
					</header>';
					if ( 'excerpt' == $show_content ) {
						$catchresponsive_category_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
					}
					elseif ( 'full-content' == $show_content ) {
						$content = apply_filters( 'the_content', get_the_content() );
						$content = str_replace( ']]>', ']]&gt;', $content );
						$catchresponsive_category_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
					}
				$catchresponsive_category_content .= '
				</div><!-- .entry-container -->
			</article><!-- .featured-post-'. $i .' -->';
	endwhile;

	wp_reset_query();
	return $catchresponsive_category_content;
}
endif; // catchresponsive_category_content


if ( ! function_exists( 'catchresponsive_image_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from theme options
 * @displays on the index
 *
 * @useage Featured Image, Title and Excerpt of Post
 *
 * @uses set_transient
 *
 * @since Catch Responsive 1.0v
 */
function catchresponsive_image_content( $options ) {
	$quantity 		= $options [ 'featured_content_number' ];

	$more_link_text	= $options['excerpt_more_text'];

	$show_content	= $options['featured_content_show'];

	$catchresponsive_image_content = '';

	for ( $i = 1; $i <= $quantity; $i++ ) {
		if ( !empty ( $options[ 'featured_content_target_' . $i ] ) ) {
			$target = '_blank';
		} else {
			$target = '_self';
		}

		//Checking Link
		if ( !empty ( $options[ 'featured_content_link_' . $i ] ) ) {
			//support qTranslate plugin
			if ( function_exists( 'qtrans_convertURL' ) ) {
				$link = qtrans_convertURL(  $options[ 'featured_content_link_' . $i ] );
			}
			else {
				$link =  $options[ 'featured_content_link_' . $i ];
			}
		}
		else {
			$link = '#';
		}

		//Checking Title
		if ( !empty ( $options[ 'featured_content_title_'. $i ] ) ) {
			$title =$options[ 'featured_content_title_'. $i ];
		}
		else {
			$title = '';
		}

		//Checking Content
		if ( !empty ( $options[ 'featured_content_content_'. $i ] ) ) {
			$content =$options[ 'featured_content_content_'. $i ];
		}
		else {
			$content = '';
		}

		$catchresponsive_image_content .= '
		<article id="featured-post-'.$i.'" class="post hentry featured-image-content">';
			if ( !empty ( $options[ 'featured_content_image_' . $i ] ) ) {
				$catchresponsive_image_content .= '
				<figure class="featured-homepage-image">
					<a title="'.$title.'" href="'.$link.'" target="'.$target.'">
						<img src="'. $options[ 'featured_content_image_' . $i ] .'" class="wp-post-image" alt="'.$title.'" title="'.$title.'">
					</a>
				</figure>';
			}
			if ( '' != $title || $content!='' ) {
				$catchresponsive_image_content .= '
				<div class="entry-container">';
					if ( '' != $title ) {
						$catchresponsive_image_content .= '
						<header class="entry-header">
							<h1 class="entry-title">
								<a href="'.$link.'" rel="bookmark" target="'.$target.'">'.$title.'</a>
							</h1>
						</header>';
					}
					if ( 'hide-content' != $show_content ) {
						if ( '' != $content )  {
							$catchresponsive_image_content .= '
							<div class="entry-content"><p>
								' . $content . '
							</p></div>';
						}
					}
				$catchresponsive_image_content .= '
				</div><!-- .entry-container -->';
			}
		$catchresponsive_image_content .= '
		</article><!-- .featured-post-'.$i.' -->';

	}
	return $catchresponsive_image_content;
}
endif; //catchresponsive_image_content
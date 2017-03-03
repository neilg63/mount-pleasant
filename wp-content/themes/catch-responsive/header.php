<?php
/**
 * The default template for displaying header
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0 
 */

	/** 
	 * catchresponsive_doctype hook
	 *
	 * @hooked catchresponsive_doctype -  10
	 *
	 */
	do_action( 'catchresponsive_doctype' );?>

<head>
<?php	
	/** 
	 * catchresponsive_before_wp_head hook
	 *
	 * @hooked catchresponsive_head -  10
	 * 
	 */
	do_action( 'catchresponsive_before_wp_head' );

	wp_head(); ?>
<?php	
	/**	
	<script type="text/javascript">
    (function() {
        var path = '//easy.myfonts.net/v2/js?sid=10338(font-family=Avenir+55+Roman)&sid=10340(font-family=Avenir+85+Heavy)&sid=10344(font-family=Avenir+65+Medium)&key=TdlrYO3Pu6',
            protocol = ('https:' == document.location.protocol ? 'https:' : 'http:'),
            trial = document.createElement('script');
        trial.type = 'text/javascript';
        trial.async = true;
        trial.src = protocol + path;
        var head = document.getElementsByTagName("head")[0];
        head.appendChild(trial);
    })();
	</script> */ ?>
	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php 
	/** 
     * catchresponsive_before_header hook
     *
     */
    do_action( 'catchresponsive_before' );
	
	/** 
	 * catchresponsive_header hook
	 *
	 * @hooked catchresponsive_page_start -  10
	 * @hooked catchresponsive_header_start- 20
	 * @hooked catchresponsive_mobile_header_nav_anchor - 30
	 * @hooked catchresponsive_mobile_secondary_nav_anchor - 40
	 * @hooked catchresponsive_site_branding - 50
	 * @hooked catchresponsive_header_right - 60
	 * @hooked catchresponsive_header_end - 100
	 * 
	 */
	do_action( 'catchresponsive_header' );

	/** 
     * catchresponsive_after_header hook
     *
     * @hooked catchresponsive_primary_menu - 20
     * @hooked catchresponsive_secondary_menu - 30
	 * @hooked catchresponsive_featured_overall_image - 40
     * @hooked catchresponsive_add_breadcrumb - 50
     */
	do_action( 'catchresponsive_after_header' ); 

	/** 
	 * catchresponsive_before_content hook
	 *
	 * @hooked catchresponsive_slider - 10
	 * @hooked catchresponsive_promotion_headline - 30
	 * @hooked catchresponsive_featured_content_display (move featured content above homepage posts - default option) - 40
	 */
	do_action( 'catchresponsive_before_content' );
	
	/** 
     * catchresponsive_content hook
     *
     *  @hooked catchresponsive_content_start - 10
     *  @hooked catchresponsive_add_breadcrumb - 20
     *  @hooked catchresponsive_content_sidebar_wrap_start - 40
     *
     */
	do_action( 'catchresponsive_content' );	
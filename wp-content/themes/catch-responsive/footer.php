<?php
/**
 * The template for displaying the footer
 *
 * @package Catch Themes
 * @subpackage Catch Responsive
 * @since Catch Responsive 1.0 
 */
?>

<?php 
    /** 
     * catchresponsive_after_content hook
     *
     * @hooked catchresponsive_content_sidebar_wrap_end - 10
     * @hooked catchresponsive_content_end - 30
     * @hooked catchresponsive_featured_content_display (move featured content below homepage posts) - 40 
     *
     */
    //echo ">>>";
    do_action( 'catchresponsive_after_content' ); 
?>
            
<?php                
    /** 
     * catchresponsive_footer hook
     *
     * @hooked catchresponsive_footer_content_start - 30
     * @hooked catchresponsive_footer_sidebar - 40
     * @hooked catchresponsive_get_footer_content - 100
     * @hooked catchresponsive_footer_content_end - 110
     * @hooked catchresponsive_page_end - 200
     *
     */
    //echo "???";
    do_action( 'catchresponsive_footer' );
?>

<?php  
//echo "###0";             
/** 
 * catchresponsive_after hook
 *
 * @hooked catchresponsive_scrollup - 10
 * @hooked catchresponsive_mobile_menus- 20
 *
 */
//echo "###1";
do_action( 'catchresponsive_after' );
//echo "###2";
?>
<?php wp_footer(); ?>

</body>
</html>
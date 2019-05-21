<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package SKT Charity
 */
?>
<div id="sidebar" <?php if( is_page_template('blog-post-left-sidebar.php')){?> style="float:left;"<?php } ?>>
    
    <?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>
     <h3 class="widget-title">Contact Form</h3>
        <aside id="archives" class="widget">           
            <?php echo do_shortcode('[contactform to_email="test@example.com" title="Contact Form"]'); ?>
        </aside>
        <h3 class="widget-title">Testimonials</h3>
        <aside id="meta" class="widget">           
             <?php echo do_shortcode('[testimonials]'); ?>
        </aside>
    <?php endif; // end sidebar widget area ?>
	
</div><!-- sidebar -->
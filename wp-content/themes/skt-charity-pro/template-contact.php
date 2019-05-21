<?php
/**
Template name: Contact Us

 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Charity
 */

get_header(); ?>

<div class="content-area">
    <div class="middle-align">
        <div class="site-main sitefull">
           <header class="entry-header">
           	  <h1 class="entry-title"><?php the_title(); ?></h1>
       	    </header><!-- .entry-header -->
            <iframe src=<?php echo of_get_option('googlemap', true); ?> width=98% height=300 frameborder=0></iframe> 
            <div class="contact_left">
			  <?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>				
			  <?php endwhile; // end of the loop. ?>
            </div><!-- .contact_left -->
            <div class="contact_right">
            <?php if ( !dynamic_sidebar('sidebar-contact')) : ?>
               <?php if( of_get_option('contacttitle',true) != ''){ ?>
                		<h3 class="widget-title"><?php echo of_get_option('contacttitle'); ?></h3>
               <?php } ?>
            <p><?php if( of_get_option('address',true) != '') { echo of_get_option('address',true) ; } ; ?><br />
               <?php if( of_get_option('address2',true) != '') { echo of_get_option('address2',true) ; } ; ?>
            </p>
                <div class="phone-no">
                	<?php if( of_get_option('phone',true) != ''){ ?>
                		<p><strong><?php _e('Phone:','skt-charity'); ?></strong><?php echo of_get_option('phone'); ?></p>
                    <?php } ?>
                    <?php if( of_get_option('email',true) != '' ) { ?>
                    <p><strong><?php _e('E-mail:','skt-charity'); ?></strong><a href="mailto:<?php echo of_get_option('email',true); ?>"><?php echo of_get_option('email',true) ; ?></a></p>
                    <?php } ?>
                    <?php if( of_get_option('weblink',true) != ''){ ?>
                    	<p><strong><?php _e('Website:','skt-charity'); ?></strong><a href="<?php echo of_get_option('weblink',true); ?>" target="_blank"><?php echo of_get_option('weblink',true); ?></a></p>
                    <?php } ?>
                </div>                
               
                <?php if( of_get_option('footersocialicons') != ''){ echo do_shortcode(of_get_option('footersocialicons', true));}; ?>
                
                <?php endif; ?>
            </div><!-- .contact_right -->
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>
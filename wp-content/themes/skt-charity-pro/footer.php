<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Charity
 */

$footerlayout = of_get_option('footerlayout');
 
?>
<div id="footer-wrapper">
	
    
    <div class="container">
		<div class="footer">   

<?php if($footerlayout=='onecolumn'){ ?>

		<div class="cols-1">    
        	<?php if(!dynamic_sidebar('footer-1')) : ?>  
             <div class="widget-column-1">            	
               <?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
                <div class="clear"></div>    
              </div>                  
			<?php  endif; ?>
            <div class="clear"></div>
        </div>

<?php 
}
 elseif ($footerlayout=='twocolumn'){ ?>

<div class="cols-2">    
            
<?php if(!dynamic_sidebar('footer-1')) : ?>  
             <div class="widget-column-1">        
                   <h5><?php if( of_get_option('footertitle1') != ''){ echo of_get_option('contacttitle');}; ?></h5>
                <p class="parastyle"><?php if( of_get_option('address',true) != '') { echo of_get_option('address',true) ; } ; ?><br />
                  <?php if( of_get_option('address2',true) != '') { echo of_get_option('address2',true) ; } ; ?></p>
                <div class="phone-no">
                	<p><?php if( of_get_option('phone',true) != ''){ ?>
                	<span><?php _e('Phone: ','skt_charity'); ?></span><?php echo of_get_option('phone'); ?>
                    <?php } ?><br />
                    <?php if( of_get_option('email',true) != '' ) { ?>
                    <span><?php _e('E-mail: ','skt_charity'); ?></span><a href="mailto:<?php echo of_get_option('email',true); ?>"> <?php echo of_get_option('email',true) ; ?></a>
                    <?php } ?><br />
                    
                     <?php if( of_get_option('weblink',true) != '' ) { ?>
                    <span><?php _e('Website: ','skt_charity'); ?></span><a href="<?php echo of_get_option('weblink',true); ?>"> <?php echo of_get_option('weblink',true) ; ?></a>
                    <?php } ?>
                    
                    </p>
                </div>                  
                <div class="clear"></div>                
                <?php // if( of_get_option('footersocialicons') != ''){ echo do_shortcode(of_get_option('footersocialicons', true));}; ?>

               </div>                  
			<?php  endif; ?>
       
            <?php if(!dynamic_sidebar('footer-2')) : ?> 
             <div class="widget-column-2">          
            	<h5><?php if( of_get_option('footertitle2') != '') { echo of_get_option('footertitle2'); } ; ?></h5>
                <?php echo do_shortcode('[footer-posts show="2"]'); ?>
              </div>             
            <?php endif; ?>
    <div class="clear"></div>
</div><!--end .cols-2-->  
<?php 
}
elseif($footerlayout=='threecolumn'){ ?>

<div class="cols-3">    
            
        	<?php if(!dynamic_sidebar('footer-1')) : ?>  
             <div class="widget-column-1">        
                   <h5><?php if( of_get_option('footertitle1') != ''){ echo of_get_option('contacttitle');}; ?></h5>
                <p class="parastyle"><?php if( of_get_option('address',true) != '') { echo of_get_option('address',true) ; } ; ?><br />
                  <?php if( of_get_option('address2',true) != '') { echo of_get_option('address2',true) ; } ; ?></p>
                <div class="phone-no">
                	<p><?php if( of_get_option('phone',true) != ''){ ?>
                	<span><?php _e('Phone: ','skt_charity'); ?></span><?php echo of_get_option('phone'); ?>
                    <?php } ?><br />
                    <?php if( of_get_option('email',true) != '' ) { ?>
                    <span><?php _e('E-mail: ','skt_charity'); ?></span><a href="mailto:<?php echo of_get_option('email',true); ?>"> <?php echo of_get_option('email',true) ; ?></a>
                    <?php } ?><br />
                    
                     <?php if( of_get_option('weblink',true) != '' ) { ?>
                    <span><?php _e('Website: ','skt_charity'); ?></span><a href="<?php echo of_get_option('weblink',true); ?>"> <?php echo of_get_option('weblink',true) ; ?></a>
                    <?php } ?>
                    
                    </p>
                </div>                  
                <div class="clear"></div>    
               </div>                  
			<?php  endif; ?>
       
            <?php if(!dynamic_sidebar('footer-2')) : ?> 
             <div class="widget-column-2">          
            	<h5><?php if( of_get_option('footertitle2') != '') { echo of_get_option('footertitle2'); } ; ?></h5>
                <div class="recent-post  "style="color:#fff;font-weight:bold" >

<table style="width:100%">
<tr>
<td style="float:left"><a href="http://ucheodoputafoundation.org/who-we-are"style="color:#fff">Who We Are</a></td>
<td style="float:right"><a href="http://ucheodoputafoundation.org/history"style="color:#fff">History</a></td>
</tr>
<tr>
<td style="float:left"><a href="http://ucheodoputafoundation.org/what-we-do"style="color:#fff">What We Do </a></td>
<td style="float:right"><a href="http://ucheodoputafoundation.org/our-mission"style="color:#fff">Our Mission </a></td>
</tr>
<tr>
<td style="float:left"><a href="http://ucheodoputafoundation.org/apply-for-aid"style="color:#fff">Apply for Aid </a></td>
<td style="float:right"><a href="http://ucheodoputafoundation.org/our-board"style="color:#fff">Our Board </a></td>
</tr>
<tr>
<td style="float:left"><a href="http://ucheodoputafoundation.org/get-involved"style="color:#fff">Get Involved </a></td>
<td style="float:right"><a href="http://ucheodoputafoundation.org/finances"style="color:#fff">Finances </a></td>
</tr>
<tr>
<td style="float:left"><a href="http://ucheodoputafoundation.org/gallery"style="color:#fff">Gallery </a></td>
<td style="float:right"><a href="http://ucheodoputafoundation.org/programs-events"style="color:#fff">Programs & Events </a></td>
</tr>
<tr>
<td style="float:left"><a href="http://ucheodoputafoundation.org/contact"style="color:#fff">Contact </a></td>
<td style="float:right"><a href="http://ucheodoputafoundation.org/donate-now"style="color:#fff">Donate </a></td>
</tr>
</table>
</div>
    
              </div>             
            <?php endif; ?>
            
            
             <?php if(!dynamic_sidebar('footer-3')) : ?>
              <div class="widget-column-3">                
				<h5><?php if( of_get_option('footertitle3') != ''){ echo of_get_option('footertitle3');}; ?></h5>
                
                
                <?php if( of_get_option('footersocialicons') != ''){ echo do_shortcode(of_get_option('footersocialicons', true));}; ?>	 
               </div>
                
            <?php endif; ?>
    <div class="clear"></div>
</div><!--end .cols-3-->  
<?php
}
elseif($footerlayout=='fourcolumn'){ ?>
          
<div class="cols-4">    
            
        	<?php if(!dynamic_sidebar('footer-1')) : ?>  
             <div class="widget-column-1">        
                   <h5><?php if( of_get_option('footertitle1') != ''){ echo of_get_option('contacttitle');}; ?></h5>
                <p class="parastyle"><?php if( of_get_option('address',true) != '') { echo of_get_option('address',true) ; } ; ?><br />
                  <?php if( of_get_option('address2',true) != '') { echo of_get_option('address2',true) ; } ; ?></p>
                <div class="phone-no">
                	<p><?php if( of_get_option('phone',true) != ''){ ?>
                	<span><?php _e('Phone: ','skt_charity'); ?></span><?php echo of_get_option('phone'); ?>
                    <?php } ?><br />
                    <?php if( of_get_option('email',true) != '' ) { ?>
                    <span><?php _e('E-mail: ','skt_charity'); ?></span><a href="mailto:<?php echo of_get_option('email',true); ?>"> <?php echo of_get_option('email',true) ; ?></a>
                    <?php } ?><br />
                    
                     <?php if( of_get_option('weblink',true) != '' ) { ?>
                    <span><?php _e('Website: ','skt_charity'); ?></span><a href="<?php echo of_get_option('weblink',true); ?>"> <?php echo of_get_option('weblink',true) ; ?></a>
                    <?php } ?>
                    
                    </p>
                </div>                  
                <div class="clear"></div>                
               
               </div>                  
			<?php  endif; ?>
       
           <?php if(!dynamic_sidebar('footer-2')) : ?> 
             <div class="widget-column-2">          
            	<h5><?php if( of_get_option('footertitle2') != '') { echo of_get_option('footertitle2'); } ; ?></h5>
                <?php echo do_shortcode('[footer-posts show="2"]'); ?>
              </div>             
            <?php endif; ?>
            
            
             <?php if(!dynamic_sidebar('footer-3')) : ?>
              <div class="widget-column-3">                
				<h5><?php if( of_get_option('footertitle3') != ''){ echo of_get_option('footertitle3');}; ?></h5>
                
                <div class="newslettersign">
                	Street tempor Donec ultricies mattis nulla, suscipit risus tristique ut.
                    <form action="#" method="post">
                    	<input type="email" name="email" placeholder="Email Address"  />
                        <input type="submit" name="button" value="SUBMIT"  />
                    </form>                    
                </div>
                <div class="clear"></div>
                <?php if( of_get_option('footersocialicons') != ''){ echo do_shortcode(of_get_option('footersocialicons', true));}; ?>	 
               </div>
                
            <?php endif; ?>
            
            <?php if(!dynamic_sidebar('footer-4')) : ?>
              <div class="widget-column-4">                
               <h5><?php if( of_get_option('footertitle4') != '') { echo of_get_option('footertitle4'); } ; ?></h5>
                <?php wp_nav_menu( array('theme_location' => 'footer' )); ?>
                <div class="clear"></div>    
               </div>
            <?php endif; ?>
            
    <div class="clear"></div>
</div><!--end .cols-4-->
<?php } ?>  
 
		</div><!--end .footer-->
    </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php if( of_get_option('copytext',true) != ''){ echo of_get_option('copytext',true); }; ?> </div>
				<div class="design-by"><?php if( of_get_option('ftlink', true) != ''){echo of_get_option('ftlink',true);}; ?></div></div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>
</div><!--main-->
</body>
</html>
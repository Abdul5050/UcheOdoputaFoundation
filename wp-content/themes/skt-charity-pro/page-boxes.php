<?php if ( is_home() || is_front_page() ) { ?>
<div id="wrapOne" <?php if( of_get_option('hidefourbxsec', true) != '' ) { ?>style="display:none"<?php } ?>>
    <div class="container">
        <div class="services-wrap">
       <?php
	   		$boxArr = array();
			   if( of_get_option('box1',true) != '' ){
				$boxArr[] = of_get_option('box1',false);
			   }
			   if( of_get_option('box2',true) != '' ){
				$boxArr[] = of_get_option('box2',false);
			   }
			   if( of_get_option('box3',true) != '' ){
				$boxArr[] = of_get_option('box3',false);
			   }
			   if( of_get_option('box4',true) != '' ){
				$boxArr[] = of_get_option('box4',false);
			   }
			   if( of_get_option('box5',true) != '' ){
				$boxArr[] = of_get_option('box5',false);
			   }
			   if( of_get_option('box6',true) != '' ){
				$boxArr[] = of_get_option('box6',false);
			   }
			
			
			if (!array_filter($boxArr)) {
			for($fx=1; $fx<=4; $fx++) {
			?>
            <div class="one_four_page <?php if($fx % 4 == 0) { echo "last_column"; } ?>">            
             <div class="thumb_four_icon"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/donation-image-<?php echo $fx; ?>.png" alt="" /></a></div>
              <a href="#"><h4><?php _e('Help Donation', 'skt-charity') ?> <?php echo $fx; ?></h4></a>            
              <p><?php _e('Lorem ipsum dolor sit amet, consecte adipiscing elit.', 'skt-charity') ?></p>              
              <?php if( of_get_option('donatebutton',true) != '') { ?>
                  <div class="view-all-btn"><a href="#"><?php echo of_get_option('donatebutton'); ?></a></div>                  
				<?php } ?>
         	</div>
			<?php 
			} 
			} else {
				$box_column = array('no_column','one_column','two_column','three_column','one_four_page','five_column','six_column');
				$fx = 1;
				$queryvar = new wp_query(array('post_type' => 'page', 'post__in' => $boxArr, 'posts_per_page' => 6, 'orderby' => 'post__in' ));
				while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="one_four_page <?php echo $box_column[count($boxArr)]; ?> <?php if($fx % count($boxArr) == 0) { echo "last_column"; } ?>">
			       <?php if( of_get_option('boximg'.$fx,true) != '') { ?>	 
                      <div class="thumb_four_icon">
                        <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo esc_url( of_get_option( 'boximg'.$fx, true )); ?>" / ></a>
                       </div>
                  <?php } ?>
                   <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                  <?php echo content( of_get_option('donatebxexcerptlength') ); ?>
                                    
				  <?php if( of_get_option('donatebutton',true) != '') { ?>
                  <div class="view-all-btn"><a href="<?php the_permalink(); ?>"><?php echo of_get_option('donatebutton'); ?></a></div>                  
				  <?php } ?>
        	   </div>
             <?php 
			 $fx++; 
			 endwhile;
			 wp_reset_query();
			 }
			 ?>    
        
      <div class="clear"></div>
       </div><!-- .services-wrap -->
       <div class="clear"></div>
    </div><!-- .container -->
</div><!-- #wrapOne -->
 <?php } ?>

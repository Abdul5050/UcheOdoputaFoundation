<?php
/**
 * @package SKT Charity
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('skt_charity_optionsframework_custom_scripts', 'skt_charity_optionsframework_custom_scripts');
function skt_charity_optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
    jQuery(document).ready(function() {
    
        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });
        
        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }
        
    });
    </script><?php
}

// get_the_content format text
function get_the_content_format( $str ){
	$raw_content = apply_filters( 'the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function the_content_format( $str ){
	echo get_the_content_format( $str );
}

function is_google_font( $font ){
	$notGoogleFont = array( 'Arial', 'Comic Sans MS', 'FreeSans', 'Georgia', 'Lucida Sans Unicode', 'Palatino Linotype', 'Symbol', 'Tahoma', 'Trebuchet MS', 'Verdana' );
	if( in_array($font, $notGoogleFont) ){
		return false;
	}else{
		return true;
	}
}

// subhead section function
function sub_head_section( $more ) {
	$pgs = 0;
	do {
		$pgs++;
	} while ($more > $pgs);
	return $pgs;
}


// [searchform]
function searchform_shortcode_func( $atts ){
	return get_search_form( false );
}
add_shortcode( 'searchform', 'searchform_shortcode_func' );
 

// remove excerpt more
function new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// get post categories function
function getPostCategories(){
	$categories = get_the_category();
	$catOut = '';
	$separator = ', ';
	$catOutput = '';
	if($categories){
		foreach($categories as $category) {
			$catOutput .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'skt-charity' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$catOut = 'Categories: '.trim($catOutput, $separator);
	}
	return $catOut;
}

// replace last occurance of a string.
function str_lreplace($search, $replace, $subject){
	$pos = strrpos($subject, $search);
	if($pos !== false){
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}


function readmore_func( $atts) {
	extract(shortcode_atts(array(	
	'button'		=> '',	
	'links'		=> '',
	'bgcolor'	=> '',
	'color'	=> '',
	'align'		=> '',						
	), $atts));
	$rrow = '<div class="view-all-btn" style="float:'.$align.'; background:'.$bgcolor.'; color:'.$color.';"><a href="'.$links.'" style="color:'.$color.';">'.$button.'</a></div>';
    return $rrow;
}
add_shortcode( 'readmore-link', 'readmore_func' );


// custom post type for Testimonials
function my_custom_post_testimonials() {
	$labels = array(
		'name'               => __( 'Testimonials','skt-charity'),
		'singular_name'      => __( 'Testimonials','skt-charity'),
		'add_new'            => __( 'Add Testimonials','skt-charity'),
		'add_new_item'       => __( 'Add New Testimonial','skt-charity'),
		'edit_item'          => __( 'Edit Testimonial','skt-charity'),
		'new_item'           => __( 'New Testimonial','skt-charity'),
		'all_items'          => __( 'All Testimonials','skt-charity'),
		'view_item'          => __( 'View Testimonial','skt-charity'),
		'search_items'       => __( 'Search Testimonial','skt-charity'),
		'not_found'          => __( 'No Testimonial found','skt-charity'),
		'not_found_in_trash' => __( 'No Testimonial found in the Trash','skt-charity'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Testimonials',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-quote',
		'menu_position' => null,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonials' );


// add meta box to testimonials
add_action( 'admin_init', 'my_testimonial_admin_function' );
function my_testimonial_admin_function() {
    add_meta_box( 'testimonial_meta_box',
        'Testimonial Info',
        'display_testimonial_meta_box',
        'testimonials', 'normal', 'high'
    );
}
// add meta box form to donators
function display_testimonial_meta_box( $testimonial ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $possition = esc_html( get_post_meta( $testimonial->ID, 'possition', true ) ); 
	
    ?>
    <table width="100%">       
        <tr>
            <td width="20%">Donation Amount </td>
            <td width="80%"><input size="80" type="text" name="possition" value="<?php echo $possition; ?>" /></td>
        </tr>       
    </table>
    <?php    
}
// save testimonial meta box form data
add_action( 'save_post', 'add_testimonial_fields_function', 10, 2 );
function add_testimonial_fields_function( $testimonial_id, $testimonial ) {
    // Check post type for testimonials
    if ( $testimonial->post_type == 'testimonials' ) {
        // Store data in post meta table if present in post data		 
        if ( isset($_POST['possition']) ) {
            update_post_meta( $testimonial_id, 'possition', $_POST['possition'] );
        }       
    }
}



//Testimonials function
function testimonials_output_func( $atts ){
	$testimonialoutput = '<div id="testimonials"><div class="quotes">
            <ul>';
	wp_reset_query();
	query_posts('post_type=testimonials');
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();		
		$possition = esc_html( get_post_meta( get_the_ID(), 'possition', true ) );
			$testimonialoutput .= '
			 <li>			 
			   
				<div class="tm_description">
				  '.content( of_get_option('testimonialsexcerptlength') ).'
				  <h5>'.get_the_title().'</h5>
				 <h6>'.$possition.'</h6>				  
				</div>								
              </li>
			';
		endwhile;
		 $testimonialoutput .= '</ul></div>';
	else:
	  $testimonialoutput = '<div id="testimonials">
          <div class="quotes">
            <ul>
              <li> 			                    
                  <div class="tm_description">
				   <p>Phasellus porta. Fusce susct varius mi. Cum sociis natoque penabus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Praesent vestibulum aenean nonummy hendrerit mauris. Hasellus porta. Fusce suscipit varius Nascetur ridiculus mus.</p>
				   <h5>Roadside Assistance</h5>
				  </div> 				  			              
              </li>
			  
              <li>                 
                  <div class="tm_description">
				   <p>Phasellus porta. Fusce susct varius mi. Cum sociis natoque penabus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Praesent vestibulum aenean nonummy hendrerit mauris. Hasellus porta. Fusce suscipit varius Nascetur ridiculus mus.</p>
				   <h5>"Aliquam et varius orci, ut ornare justo. Lorem ipsum dolor sit amet"</h5>            
				  </div>
              </li>  
			           
            </ul>         
    </div>  
  </div> ';			
	  endif;  
	wp_reset_query();
	$testimonialoutput .= '</div>';
	
	return $testimonialoutput;
}
add_shortcode( 'testimonials', 'testimonials_output_func' );


//Testimonials function
function testimonials_list_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	), 
	$atts ) ); $postoutput = ''; wp_reset_query();
	$testimonialoutput = '<div id="testimonialslist">';
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();			
			$testimonialoutput .= '				 
				   <div class="listing">				 
				   <div class="tml_thumb"><a href="'.get_permalink().'"> '.( (get_the_post_thumbnail( get_the_ID(), array(150,150)) != '') ? get_the_post_thumbnail() : '<img src="'.get_template_directory_uri().'/images/john.png" width="150" />' ).'</a></div>
				   <div class="descriptionbx">
				   <h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>				  
				    '.content( of_get_option('testimonialsexcerptlength') ).'
				    
				   </div>
				   <div class="clear"></div> 
				</div>  ';
		endwhile;
		 $testimonialoutput .= '</div>';
	else:
	  $testimonialoutput = 'There are not found testimonials';			
	  endif;  
	wp_reset_query();
	$testimonialoutput .= '';
	
	return $testimonialoutput;
}
add_shortcode( 'testimonials-lists', 'testimonials_list_output_func' );


/*Latest news Function*/
function footer_recent_posts_func( $atts ){
   extract( shortcode_atts( array(
		'show' => 4,
	), $atts ) );
	$frp = '';
	wp_reset_query();
	$n = 0;
	query_posts(  array( 'posts_per_page'=>$show, 'post__not_in' => get_option('sticky_posts') )  );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$n++;
			if( $n%2==0 ) 
			$nomgn = 'last';
			else
			$nomgn = ' ';
			if ( has_post_thumbnail()) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
				$imgUrl = $large_image_url[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			} 
			
			$frp .= '<div class="recent-post '.$nomgn.'">
							 <a href="'.get_the_permalink().'"><img src="'.$imgUrl.'" alt="" /></a>						 
							 <a href="'.get_the_permalink().'"><h6>'.get_the_title().'</h6></a>	
							 <div class="footer-post-date">
								<span><a href="'. esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>&nbsp;</span> | <span>'.get_the_time('M d, Y').'</span>
							</div>	
							<div class="clear"></div>
                        </div>';		
		endwhile;
	endif;
	wp_reset_query();
	$frp .= '<div class="clear"></div>';
	
	return $frp;
}
add_shortcode( 'footer-posts', 'footer_recent_posts_func' );


//custom post type for Our Donators
function my_custom_post_donators() {
	$labels = array(
		'name'               => __( 'Our Donators', 'skt-charity' ),
		'singular_name'      => __( 'Our Donators', 'skt-charity' ),
		'add_new'            => __( 'Add New', 'skt-charity' ),
		'add_new_item'       => __( 'Add New Our Donator', 'skt-charity' ),
		'edit_item'          => __( 'Edit Our Donator', 'skt-charity' ),
		'new_item'           => __( 'New Donators', 'skt-charity' ),
		'all_items'          => __( 'All Donators', 'skt-charity' ),
		'view_item'          => __( 'View Donators', 'skt-charity' ),
		'search_items'       => __( 'Search Our Donators', 'skt-charity' ),
		'not_found'          => __( 'No Our Donators found', 'skt-charity' ),
		'not_found_in_trash' => __( 'No Our Donators found in the Trash', 'skt-charity' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Our Donators'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Donators',
		'public'        => true,
		'menu_position' => null,
		'menu_icon'		=> 'dashicons-groups',
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' => array('slug' => 'our-donators'),
		'has_archive'   => true,
	);
	register_post_type( 'donators', $args );
}
add_action( 'init', 'my_custom_post_donators' );

// add meta box to donators
add_action( 'admin_init', 'my_donators_admin_function' );
function my_donators_admin_function() {
    add_meta_box( 'donators_meta_box',
        'Donator Info',
        'display_donators_meta_box',
        'donators', 'normal', 'high'
    );
}
// add meta box form to donators
function display_donators_meta_box( $donators ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $donationamount = esc_html( get_post_meta( $donators->ID, 'donationamount', true ) );
    ?>
    <table width="100%">
        <tr>
            <td width="20%">Donation Amount </td>
            <td width="80%"><input type="text" name="donationamount" value="<?php echo $donationamount; ?>" /></td>
        </tr>
    </table>
    <?php   
}
// save donators meta box form data
add_action( 'save_post', 'add_donators_fields_function', 10, 2 );
function add_donators_fields_function( $donators_id, $donators ) {
    // Check post type for testimonials
    if ( $donators->post_type == 'donators' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['donationamount']) ) {
            update_post_meta( $donators_id, 'donationamount', $_POST['donationamount'] );
        }
    }
}

function ourdonatorsposts_func( $atts ) {
   extract( shortcode_atts( array(
		'col' => '',
	), $atts ) );
	  extract( shortcode_atts( array( 'show' => '',), $atts ) ); $postoutput = ''; wp_reset_query();
	$bposts = '<div class="section-donatorsmember">';
	$args = array( 'post_type' => 'donators', 'posts_per_page' => $show, 'post__not_in' => get_option('sticky_posts') );
	query_posts( $args );
	$n = 0;
	if ( have_posts() ) {
		while ( have_posts() ) { 
			the_post();
			$n++; if( $n%4 == 0 ) $nomargn = ' last'; else $nomargn = '';
			$donationamount = esc_html( get_post_meta( get_the_ID(), 'donationamount', true ) );
			 $bposts .= '<div class="ourclasses_col '.$nomargn.'">';	
			$bposts .= '<div class="ourclasses_thumb"><a href="'.get_permalink().'" title="'.get_the_title().'">'.( (get_the_post_thumbnail( get_the_ID(), 'thumbnail') != '') ? get_the_post_thumbnail( get_the_ID(), array( 270, 320 )) : '<img src="'.get_template_directory_uri().'/images/img_404.png" width="270" height="180" />' ).'</a></div>';
			$bposts .= '<div class="title_day_time"><a href="'.get_permalink().'"><h6>'.get_the_title().'</h6></a>';
			$bposts .= '<div class="day_time">';
			$bposts .= ''.content( of_get_option('donerbxexcerptlength') ).'';
			$bposts .= '</div></div>';
			$bposts .= '<div class="member-desination">'.$donationamount.'</div>';
			$bposts .= '</div>';
			$bposts .= ''.(($n%4==0) ? '<div class="clear"></div>' : '');	
 
		}
	}else{
		$bposts .= '
<div class="ourclasses_col ">
	<div class="ourclasses_thumb"><a href="#"><img src="'.get_template_directory_uri().'/images/ourdonators-1.jpg"></a></div>
    <div class="title_day_time">
        <a href="#"><h6>Stev Smith</h6></a>
        <div class="day_time"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean…</p></div>
    </div>
	<div class="member-desination">Donated : $1100</div>
</div>
<div class="ourclasses_col ">
	<div class="ourclasses_thumb"><a href="#"><img src="'.get_template_directory_uri().'/images/ourdonators-2.jpg"></a></div>
    <div class="title_day_time">
    	<a href="#"><h6>Nick Jackson</h6></a>
        <div class="day_time"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean…</p></div>
	</div>
    <div class="member-desination">Donated : $1800</div>
</div>   
<div class="ourclasses_col ">
	<div class="ourclasses_thumb"><a href="#"><img src="'.get_template_directory_uri().'/images/ourdonators-3.jpg"></a></div>
	<div class="title_day_time">
    	<a href="#"><h6>Sarah Watson</h6></a>
        <div class="day_time"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean…</p></div>
	</div>
	<div class="member-desination">Donated : $1500</div>
</div>
<div class="ourclasses_col last">
	<div class="ourclasses_thumb"><a href="#"><img src="'.get_template_directory_uri().'/images/ourdonators-4.jpg"></a></div>
        <div class="title_day_time">
        	<a href="#"><h6>Media</h6></a>
            <div class="day_time"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean…</p></div>
	</div>
    <div class="member-desination">Donated : $1300</div>
</div>
<div class="clear"></div>	
		';
	}
	wp_reset_query();
	$bposts .= '</div>';
    return $bposts;
}
add_shortcode( 'ourdonators', 'ourdonatorsposts_func' );

// Social Icon Shortcodes

function skt_charity_social_area($atts,$content = null){
  return '<div class="social-icons">'.do_shortcode($content).'</div>';
 }
add_shortcode('social_area','skt_charity_social_area');

function skt_charity_social($atts){
 extract(shortcode_atts(array(
  'icon' => '',
  'link' => ''
 ),$atts));
  return '<a href="'.$link.'" target="_blank" class="fa fa-'.$icon.' fa-lg" title="'.$icon.'"></a>';
 }
add_shortcode('social','skt_charity_social');


function contactform_func( $atts ) {
    $atts = shortcode_atts( array(
        'to_email' => get_bloginfo('admin_email'),
		'title' => 'Contact enquiry - '.home_url( '/' ),
    ), $atts );

	$cform = "<div class=\"main-form-area\" id=\"contactform_main\">";

	$cerr = array();
	if( isset($_POST['c_submit']) && $_POST['c_submit']=='Submit' ){
		$name 			= trim( $_POST['c_name'] );
		$email 			= trim( $_POST['c_email'] );
		$phone 			= trim( $_POST['c_phone'] );
		$website		= trim( $_POST['c_website'] );
		$comments 		= trim( $_POST['c_comments'] );
		$captcha 		= trim( $_POST['c_captcha'] );
		$captcha_cnf	= trim( $_POST['c_captcha_confirm'] );

		if( !$name )
			$cerr['name'] = 'Please enter your name.';
		if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) 
			$cerr['email'] = 'Please enter a valid email.';
		if( !$phone )
			$cerr['phone'] = 'Please enter your phone number.';
		if( !$comments )
			$cerr['comments'] = 'Please enter your message.';
		if( !$captcha || (md5($captcha) != $captcha_cnf) )
			$cerr['captcha'] = 'Please enter the correct answer.';

		if( count($cerr) == 0 ){
			$subject = $atts['title'];
			$headers = "From: ".$name." <" . strip_tags($email) . ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			$message = '<html><body>
							<table>
								<tr><td>Name: </td><td>'.$name.'</td></tr>
								<tr><td>Email: </td><td>'.$email.'</td></tr>
								<tr><td>Phone: </td><td>'.$phone.'</td></tr>
								<tr><td>Website: </td><td>'.$website.'</td></tr>
								<tr><td>Message: </td><td>'.$comments.'</td></tr>
							</table>
						</body>
					</html>';
			mail( $atts['to_email'], $subject, $message, $headers);
			$cform .= '<div class="success_msg">Thank you! A representative will get back to you very shortly.</div>';
			unset( $name, $email, $phone, $website, $comments, $captcha );
		}else{
			$cform .= '<div class="error_msg">';
			$cform .= implode('<br />',$cerr);
			$cform .= '</div>';
		}
	}

	$capNum1 	= rand(1,4);
	$capNum2 	= rand(1,5);
	$capSum		= $capNum1 + $capNum2;
	$sumStr		= $capNum1." + ".$capNum2 ." = ";

	$cform .= "<form name=\"contactform\" action=\"#contactform_main\" method=\"post\">
			<p><input type=\"text\" name=\"c_name\" value=\"". ( ( empty($name) == false ) ? $name : "" ) ."\" placeholder=\"Name\" /></p>
			<p><input type=\"email\" name=\"c_email\" value=\"". ( ( empty($email) == false ) ? $email : "" ) ."\" placeholder=\"Email\" /></p><div class=\"clear\"></div>
			<p><input type=\"tel\" name=\"c_phone\" value=\"". ( ( empty($phone) == false ) ? $phone : "" ) ."\" placeholder=\"Phone\" /></p>
			<p><input type=\"url\" name=\"c_website\" value=\"". ( ( empty($website) == false ) ? $website : "" ) ."\" placeholder=\"Website with prefix http://\" /></p><div class=\"clear\"></div>
			<p><textarea name=\"c_comments\" placeholder=\"Message\">". ( ( empty($comments) == false ) ? $comments : "" ) ."</textarea></p><div class=\"clear\"></div>";
	$cform .= "<p><span class=\"capcode\">$sumStr</span><input style=\"width:200px;\" type=\"text\" placeholder=\"Captcha\" value=\"". ( ( empty($captcha) == false ) ? $captcha : "" ) ."\" name=\"c_captcha\" /><input type=\"hidden\" name=\"c_captcha_confirm\" value=\"". md5($capSum)."\"></p><div class=\"clear\"></div>";
	$cform .= "<p class=\"sub\"><input type=\"submit\" name=\"c_submit\" value=\"Submit\" class=\"search-submit\" /></p>
		</form>
	</div>";

    return $cform;
}
add_shortcode( 'contactform', 'contactform_func' );

// Start Gallery section
add_action("admin_init", "admin_init");
function admin_init(){
	add_meta_box("video_file_url-meta", "Video File URL", "video_file_url", "photogallery", "normal", "low"); 
}

function video_file_url () {
	global $post;  
	$custom     = get_post_custom($post->ID);  
	$video_file_url  = isset ( $custom["video_file_url"][0] ) ? $custom["video_file_url"][0] : '';  ?> 
	<style>
	.amount_input { margin:0; padding:6px; width:80%; }
	</style>
	<table width="100%"> 
		<tr><td width="110">Video File URL : </td><td colspan="2"><input class="amount_input" type="text" name="video_file_url"  value="<?php echo $video_file_url; ?>"  /></td></tr> 
		<tr><td></td><td><strong>YouTube video url:</strong></td><td>http://www.youtube.com/watch?v=qqXi8WmQ_WM</td></tr> 
		<tr><td></td><td width="120"><strong>Vimeo video url:</strong></td><td>http://vimeo.com/8245346</td></tr> 
	</table>
	<?php
}

add_action('save_post', 'save_details');
function save_details(){
	global $post; 
	if ( isset($_POST["video_file_url"]) ) {
		update_post_meta($post->ID, "video_file_url", $_POST["video_file_url"]);
	} 
}

//custom post type for Our photogallery
function my_custom_post_photogallery() {
	$labels = array(
		'name'               => __( 'Photo Gallery','skt-charity' ),
		'singular_name'      => __( 'Photo Gallery','skt-charity' ),
		'add_new'            => __( 'Add New','skt-charity' ),
		'add_new_item'       => __( 'Add New Image / Video','skt-charity' ),
		'edit_item'          => __( 'Edit Image/Video','skt-charity' ),
		'new_item'           => __( 'New Image/Video','skt-charity' ),
		'all_items'          => __( 'All Images/Videos','skt-charity' ),
		'view_item'          => __( 'View Image/Video','skt-charity' ),
		'search_items'       => __( 'Search Images/Videos','skt-charity' ),
		'not_found'          => __( 'No images/videos found','skt-charity' ),
		'not_found_in_trash' => __( 'No images/videos found in the Trash','skt-charity' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Photo Gallery'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Photo Gallery',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-image',
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'photogallery', $args );
}
add_action( 'init', 'my_custom_post_photogallery' );


//  register gallery taxonomy
register_taxonomy( "gallerycategory", 
	array("photogallery"), 
	array(
		"hierarchical" => true, 
		"label" => "Gallery Category", 
		"singular_label" => "Photo Gallery", 
		"rewrite" => true
	)
);

add_action("manage_posts_custom_column",  "photogallery_custom_columns");
add_filter("manage_edit-photogallery_columns", "photogallery_edit_columns");
function photogallery_edit_columns($columns){
	$columns = array(
		"cb" => '<input type="checkbox" />',
		"title" => "Gallery Title",
		"pcategory" => "Gallery Category",
		"view" => "Image",
		"date" => "Date",
	);
	return $columns;
}
function photogallery_custom_columns($column){
	global $post;
	switch ($column) {
		case "pcategory":
			echo get_the_term_list($post->ID, 'gallerycategory', '', ', ','');
		break;
		case "view":
			the_post_thumbnail('thumbnail');
		break;
		case "date":

		break;
	}
}


//[photogallery filter="false"]
function photogallery_shortcode_func( $atts ) {
	extract( shortcode_atts( array(
		'show' => -1,
		'filter' => 'true'
	), $atts ) );
	$pfStr = '';

	$pfStr .= '<div class="photobooth">';
	if( $filter == 'true' ){
		$pfStr .= '<div class="filter-gallery"><ul class="clean" id="filter"><li class="current"><a href="javascript:void(0)">All</a></li>';
		$categories = get_categories( array('taxonomy' => 'gallerycategory') );
		foreach ($categories as $category) {
			$pfStr .= '<li><a href="javascript:void(0)">'.$category->name.'</a></li>';
		}
		$pfStr .= '</ul></div>';
	}

	$pfStr .= '<div class="gallery"><ul class="clean" id="portfolio">';
	$j=0;
	query_posts('post_type=photogallery&posts_per_page='.$show); 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$j++;
		$videoUrl = get_post_meta( get_the_ID(), 'video_file_url', true);
		$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
		$terms = wp_get_post_terms( get_the_ID(), 'gallerycategory', array("fields" => "all"));
		$slugAr = array();
		foreach( $terms as $tv ){
			$slugAr[] = $tv->slug;
		}
		if ( $imgSrc[0]!='' ) {
			$imgUrl = $imgSrc[0];
		}else{
			$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}
		$pfStr .= '<li class="'.implode(' ', $slugAr).'" '.( ($j%4==0) ? 'style="margin-right:0"' : '' ).'>
 <a href="'.( ($videoUrl) ? $videoUrl : $imgSrc[0] ).'" rel="prettyPhoto[pp_gal]"><img src="'.$imgSrc[0].'"/></a>
            </li>';
		unset( $slugAr );
	endwhile; else: 
		$pfStr .= '<p>Sorry, photo gallery is empty.</p>';
	endif; 
	wp_reset_query();
	$pfStr .= '</ul></div>';
	$pfStr .= '<div class="clear"></div></div>';
	return $pfStr;
}
add_shortcode( 'photogallery', 'photogallery_shortcode_func' );
// end gallery section

function latestpostsoutput_func( $atts ){
   extract( shortcode_atts( array(
		'show' => '',
	), $atts ) );
	$postoutput = '';
	wp_reset_query();
	$n = 0;
	query_posts(  array( 'posts_per_page'=>$show, 'post__not_in' => get_option('sticky_posts') )  );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$n++;
			if( $n%2==0 )  $nomgn = 'last';	else $nomgn = ' ';
			if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}
			$postoutput .= '<div class="news-box '.$nomgn.'">
								<div class="news-thumb">
									<a href="'.get_the_permalink().'"><img src="'.$imgUrl.'" alt=" " /></a>
								</div>
								<div class="news">
									<div class="date-news">
										<span class="newsdate">'.get_the_time('d').'</span>
										<span>'.get_the_time('M').'</span>
									</div>
									<a href="'.get_permalink().'"><h4>'.get_the_title().'</h4></a>
									 '.content( of_get_option('hmlatestnewsexcerptlength') ).' 
								</div>
                        </div>';	
						$postoutput .= ''.(($n%2==0) ? '<div class="clear"></div>' : '');	
		endwhile;
	endif;
	wp_reset_query();
	return $postoutput;
}
add_shortcode( 'latestposts', 'latestpostsoutput_func' );


// add shortcode for day and Our event
function skt_charity_pricing($skt_var){
		extract( shortcode_atts(array(
			'eventdate' => 'eventdate',
			'eventmonth' => 'eventmonth',
			'eventyear' => 'eventyear',
			'eventtitle' => 'eventtitle',
			'eventtiming' => 'eventtiming',
			'eventlocation' => 'eventlocation',
			'link' => '#',
			'class'	=> '',
		), $skt_var));
		return '<div class="our-event-date-row '.$class.'">
					<div class="eventdate">
						<strong>'.$eventdate.'</strong> 
						<span>'.$eventmonth.' '.$eventyear.'</span>
					</div>
					<div class="eventtitlelocation">
						<div class="eventtitle"><a href="'.$link.'">'.$eventtitle.'</a></div>
						<div class="eventtiming"><i class="fa fa-lg fa-clock-o"></i> '.$eventtiming.'</div>
						<div class="eventlocation"><i class="fa fa-lg fa-map-marker"></i> '.$eventlocation.'</div>
					</div>
					<div class="clear"></div>
				</div>';
}
add_shortcode('oureventdate','skt_charity_pricing');

// Title Heading
function heading_title_func( $atts, $content = null ) {
   extract( shortcode_atts( array(	
	'underline'	=> '',
	'align'		=> ''	
	), $atts ) ); 
	$hdntitle = '<h2 class="heading '.( (strtolower($underline) == 'yes') ? 'underline' : '' ).'" '.( ($align!='') ? 'style="text-align:'.$align.' !important;"' : '' ) .'>'.do_shortcode( $content ) .'</h2>'; 
    return $hdntitle;
}
add_shortcode( 'heading', 'heading_title_func' );


define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/charity_documentation/');
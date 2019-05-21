<?php
/**
 * SKT Charity functions and definitions
 *
 * @package SKT Charity
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function content($limit) {
$content = explode(' ', get_the_excerpt(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

if ( ! function_exists( 'skt_charity_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_charity_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-charity', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_image_size('homepage-thumb',240,145,true);	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-charity' ),
		'footer' => __( 'Footer Menu', 'skt-charity' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_charity_setup
add_action( 'after_setup_theme', 'skt_charity_setup' );

function skt_charity_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-charity' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-charity' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'skt-charity' ),
		'description'   => __( 'Appears on page sidebar', 'skt-charity' ),
		'id'            => 'sidebar-main',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'skt-charity' ),
		'description'   => __( 'Appears on footer', 'skt-charity' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget-column-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'skt-charity' ),
		'description'   => __( 'Appears on footer', 'skt-charity' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget-column-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'skt-charity' ),
		'description'   => __( 'Appears on footer', 'skt-charity' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget-column-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'skt-charity' ),
		'description'   => __( 'Appears on footer', 'skt-charity' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget-column-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	
	register_sidebar( array(
		'name'          => __( 'Sidebar Contact Page', 'skt-charity' ),
		'description'   => __( 'Appears on contact page', 'skt-charity' ),
		'id'            => 'sidebar-contact',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget left', 'skt-charity' ),
		'description'   => __( 'Appears on header widget left side', 'skt-charity' ),
		'id'            => 'header-widget-left',
		'before_widget' => '<span class="emailinfo">',
		'after_widget'  => '</span>',
		'before_title'  => '<h6 style="display:none">',
		'after_title'   => '</h6>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget Right', 'skt-charity' ),
		'description'   => __( 'Appears on header widget right side', 'skt-charity' ),
		'id'            => 'header-widget-right',
		'before_widget' => '<span class="donateuser">',
		'after_widget'  => '</span>',
		'before_title'  => '<h6 style="display:none">',
		'after_title'   => '</h6>',
	) );
		

}
add_action( 'widgets_init', 'skt_charity_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

function skt_charity_scripts() {
	
	wp_enqueue_style( 'skt_charity-gfonts-roboto','//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,500,700,900,' );
	wp_enqueue_style( 'skt_charity-gfonts-robotocondensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700' );
	wp_enqueue_style( 'skt_charity-gfonts-arimo', '//fonts.googleapis.com/css?family=Arimo:400,700' );
	wp_enqueue_style( 'skt_charity-gfonts-oswald', '//fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic,700' );
	
	if( of_get_option('bodyfontface',true) != '' ){
		wp_enqueue_style( 'skt_charity-gfonts-body', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('bodyfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if( of_get_option('logofontface',true) != '' ){
		wp_enqueue_style( 'skt_charity-gfonts-logo', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('logofontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('navfontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-nav', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('navfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('headfontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-heading', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('headfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('hdrtopfontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-hdrtopfontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('hdrtopfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('slidetitlefontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-slidetitlefontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidetitlefontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('slidedescfontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-slidedescfontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidedescfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('h1fontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-h1fontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('h1fontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('h2fontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-h2fontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('h2fontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('h3fontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-h3fontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('h3fontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('h4fontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-h4fontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('h4fontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('h5fontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-h5fontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('h5fontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('h6fontface', true) != '' ) {
		wp_enqueue_style( 'skt_charity-gfonts-h6fontface', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('h6fontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}

	wp_enqueue_style( 'skt_charity-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skt_charity-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'skt_charity-base-style', get_template_directory_uri().'/css/style_base.css' );	

	if ( is_home() || is_front_page() ) { 
		wp_enqueue_style( 'skt_charity-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
		wp_enqueue_script( 'skt_charity-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}	
	wp_enqueue_style( 'skt_charity-prettyphoto-style', get_template_directory_uri().'/css/prettyPhoto.css' );
	wp_enqueue_script( 'skt_charity-prettyphoto-script', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery') );
	wp_enqueue_script( 'skt_charity-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'skt_charity-filter-scripts', get_template_directory_uri().'/js/filter-gallery.js' );
	wp_enqueue_style( 'skt_charity-font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );	
	wp_enqueue_script( 'skt_charity-testimonialsminjs', get_template_directory_uri().'/testimonialsrotator/js/jquery.quovolver.min.js', array('jquery') );
	wp_enqueue_script( 'skt_charity-testimonials-bootstrap', get_template_directory_uri().'/testimonialsrotator/js/bootstrap.js', array('jquery') );
	wp_enqueue_style( 'skt_charity-testimonialslider-style', get_template_directory_uri().'/testimonialsrotator/js/tm-rotator.css' );		
	wp_enqueue_style( 'skt_charity-responsive-style', get_template_directory_uri().'/css/theme-responsive.css' );		
	
	// Add  corcle bar
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_charity_scripts' );

function media_css_hook(){
	
	?>
    	
    	<script>
			jQuery(window).bind('scroll', function() {
	var wwd = jQuery(window).width();
	if( wwd > 939 ){
		var navHeight = jQuery( window ).height() - 0;
		<?php if( of_get_option('headstick',true) != true) { ?>
		if (jQuery(window).scrollTop() > navHeight) {
			jQuery(".header").addClass('fixed');
		}else {
			jQuery(".header").removeClass('fixed');
		}
		<?php } ?>
	}
});
		jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
        	effect:'<?php echo of_get_option('slideefect',true); ?>', //sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
		  	animSpeed: <?php echo of_get_option('slideanim',true); ?>,
			pauseTime: <?php echo of_get_option('slidepause',true); ?>,
			directionNav: <?php echo of_get_option('slidenav',true); ?>,
			controlNav: <?php echo of_get_option('slidepage',true); ?>,
			pauseOnHover: <?php echo of_get_option('slidepausehover',true); ?>,
    });
});


jQuery(document).ready(function() {
  
  jQuery('.link').on('click', function(event){
    var $this = jQuery(this);
    if($this.hasClass('clicked')){
      $this.removeAttr('style').removeClass('clicked');
    } else{
      $this.css('background','#7fc242').addClass('clicked');
    }
  });
 
});
		</script>
<?php 
}
add_action('wp_head','media_css_hook'); 

function skt_charity_custom_head_codes() { 
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>";
		}
		echo "<style>";
		if ( of_get_option('bodyfontface', true) != '' ||  of_get_option('bodyfontcolor', true) != '' || of_get_option('bodyfontsize',true) != '' ) {
			echo 'body{font-family:\''. esc_html( of_get_option('bodyfontface', true) ) .'\', sans-serif; color:'. esc_html( of_get_option('bodyfontcolor', true) ) .'; font-size:'.of_get_option('bodyfontsize',true).'; }';
		} 
		if( of_get_option('logofontface',true) != '' || of_get_option('logofontcolor',true) != '' || of_get_option('logofontsize',true) != ''){
			echo ".header .header-inner .logo h1, .header .header-inner .logo a {font-family:".of_get_option('logofontface').";color:".of_get_option('logofontcolor',true).";font-size:".of_get_option('logofontsize',true)."}";
		}
		if( of_get_option('logotagfontcolor',true) != '' ){
			echo ".header span.tagline{color:".of_get_option('logotagfontcolor',true).";}";
		}	
// heder top strip
		if ( of_get_option('topheaderbg', true) != '' ) {
			echo ".signin_wrap{background-color:".of_get_option('topheaderbg',true)."; }";
		}
		if ( of_get_option('topheaderrightbg', true) != '' ) {
			echo ".signin_wrap .widget-right{background-color:".of_get_option('topheaderrightbg',true).";}";
		}
		
		if ( of_get_option('topheaderrightbd', true) != '' ) {
			echo ".signin_wrap span.donateuser{border-color:".of_get_option('topheaderrightbd',true).";}";
		}
		if ( of_get_option('logoheight', true) != '' ) {
			echo ".logo img{height:".of_get_option('logoheight',true)."px;}";
		}
		
		
		if( of_get_option('hdrtopfontface',true) != '' || of_get_option('hdrtopfontcolor',true) != '' || of_get_option('hdrtopfontsize',true) != ''){
			echo ".signin_wrap, .signin_wrap a, .signin_wrap a:hover{font-family:".of_get_option('hdrtopfontface')."; color:".of_get_option('hdrtopfontcolor',true).";font-size:".of_get_option('hdrtopfontsize',true).";}";
		}
		if ( of_get_option('topheadericoncolor', true) != '' ) {
		echo ".signin_wrap i{ color:".of_get_option('topheadericoncolor', true)."; }";
		}
		
// header nav menu
		$headerhex = of_get_option('headerbg',true); 
		list($r,$g,$b) = sscanf($headerhex,'#%02x%02x%02x');
		if ( of_get_option('headerbg', true) != '' ) {
		echo ".header, .header .header-inner .nav ul li:hover > ul{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('headerbgopacity',true).");}";
		}
		
	 
		if ( of_get_option('navfontface', true) != '' || of_get_option('navfontsize',true) != '' ) {
			echo '.header .header-inner .nav ul{font-family:\''. esc_html( of_get_option('navfontface', true) ) .'\', sans-serif;font-size:'.of_get_option('navfontsize',true).'}';
		}
		if ( of_get_option('navfontcolor', true) != '' ) {
			echo '.header .header-inner .nav ul li a, .header .header-inner .nav ul li.current_page_item ul li a{color:'. esc_html( of_get_option('navfontcolor', true) ) .';}';
		}
		if ( of_get_option('navhovercolor', true) != '') {
			echo '.header .header-inner .nav ul li a:hover, .header .header-inner .nav ul li.current_page_item a, .header .header-inner .nav ul li.current_page_item ul li a:hover, .header .header-inner .nav ul li.current-menu-ancestor a.parent{ color:'. esc_html( of_get_option('navhovercolor', true) ) .';}';
		}	
		
	
		if ( of_get_option('togglemenu', true) != '' ) {
			echo ".toggle a{ background-color:".of_get_option('togglemenu', true)."; }";
		}
		if ( of_get_option('tgmenuresponsivebg', true) != '' ) {
			echo "@media screen and (max-width:980px){.header .header-inner .nav{background-color: ".of_get_option('tgmenuresponsivebg', true).";}}";
		}
		
		
// Slider title, description and button
		if( of_get_option('slidetitlecolor',true) != '' || of_get_option('slidetitlefontsize',true) != ''  || of_get_option('slidetitlefontstyle',true) != ''){
			echo ".slide_info h2{font-family:".of_get_option('slidetitlefontface').";color:".of_get_option('slidetitlecolor',true).";font-size:".of_get_option('slidetitlefontsize',true).";}";
		}
		if( of_get_option('slidedescfontface',true) != '' || of_get_option('slidedesccolor',true) != '' || of_get_option('slidedescfontsize',true) != ''){
			echo ".slide_info p{font-family:".of_get_option('slidedescfontface').";color:".of_get_option('slidedesccolor',true).";font-size:".of_get_option('slidedescfontsize',true).";}";
		}
		if( of_get_option('slidebtnbgcolor',true) != '' || of_get_option('slidebtntxtcolor', true) != '' || of_get_option('slidebtnbordercolor', true) != ''){
			echo " {background-color:".of_get_option('slidebtnbgcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; border-bottom:4px solid ". of_get_option('slidebtnbordercolor', true) ."; }";
		}
		if( of_get_option('slidebtnbgcolor',true) != '' ||  of_get_option('slidebtntxtcolor', true) != ''){
			echo ".slide_info a.sldbutton {background-color:".of_get_option('slidebtnbgcolor',true)."; color:". of_get_option('slidebtntxtcolor', true) .";}";
		}
		
// section title 
		if ( of_get_option('headfontface', true) != '' || of_get_option('sectitlecolor',true) != '' || of_get_option('sectitlesize',true) != '' ) {
			echo 'h2.section_title{font-family:\''. esc_html( of_get_option('headfontface', true) ) .'\', sans-serif; color:'.of_get_option('sectitlecolor',true).'; font-size:'.of_get_option('sectitlesize',true).'; }';
		}
				if ( of_get_option('sectitlelastcolor',true) != '') {
			echo 'h2.section_title span, .sponsercontent h2 span, .needyourhelp-content h1 span{ color:'.of_get_option('sectitlelastcolor',true).';}';
		}	

// slider below section four boxes
		if ( of_get_option('firstsectionbgcolor',true) != '') {
			echo '#wrapOne{background:'.of_get_option('firstsectionbgcolor',true).';}';
		}
		if ( of_get_option('firstsectionbgimage', true) != '' ) {
		echo "#wrapOne{background:url(".of_get_option('firstsectionbgimage', true)." ) no-repeat top center; background-size:cover;}";
		}

// section 1 fourcolumn boxes
		if ( of_get_option('fourcolumnbd', true) != '' ||  of_get_option('fourcolumnbg', true) != '' ||  of_get_option('fourcolumncolor', true) != '' ) {
			echo '.one_four_page{border-color:'.of_get_option('fourcolumnbd',true).'; background:'.of_get_option('fourcolumnbg',true).'; color:'.of_get_option('fourcolumncolor',true).';}';
		}
		if ( of_get_option('fourcolumnhoverbg', true) != '' || of_get_option('foubxborderhover', true) != '' ) {
			echo '.one_four_page:hover{background:'.of_get_option('fourcolumnhoverbg',true).'; border-color:'.of_get_option('foubxborderhover',true).';}';
		}
		
		if ( of_get_option('fourtitlecolor', true) != '' ) {
			echo '.one_four_page h4, .one_four_page .view-all-btn a{color:'.of_get_option('fourtitlecolor',true).';}';
		}		
		 
		 if ( of_get_option('sponserdonatebgcolor', true) != '' || of_get_option('sponserdonatecolor', true) != '') {
			echo '.sponserdonate{background:'.of_get_option('sponserdonatebgcolor',true).'; color:'.of_get_option('sponserdonatecolor',true).';}';
		}
// section Event list

		if ( of_get_option('eventlistbdcolor', true) != '' || of_get_option('eventlistbgcolor', true) != '') {
			echo '.our-event-date-row{border-color:'.of_get_option('eventlistbdcolor',true).'; background:'.of_get_option('eventlistbgcolor',true).';}';
		}
		
		if ( of_get_option('eventlistdatehvbg', true) != '') {
			echo '.our-event-date-row:hover{border-color:'.of_get_option('eventlistdatehvbg',true).';}';
		}
 
		if ( of_get_option('eventlistdatebg', true) != '' || of_get_option('eventlistdatecolor', true) != '') {
			echo '.eventdate{background:'.of_get_option('eventlistdatebg',true).'; color:'.of_get_option('eventlistdatecolor',true).';}';
		}
		
		
		
		if (of_get_option('eventlistdatecolor', true) != '') {
			echo '.our-event-date-row .eventdate strong{border-color:'.of_get_option('eventlistdatecolor',true).';}';
		} 

		if ( of_get_option('eventlistdatehvbg', true) != '') {
			echo '.our-event-date-row:hover .eventdate{background:'.of_get_option('eventlistdatehvbg',true).';}';
		}	
		
		
		
		
		
		
		
		
		
		
		
		
		
		if( of_get_option('pagestitlebdcolor',true) != ''){
			echo "h1.entry-title, h1.page-title, .blog-post-repeat .postmeta{border-color:".of_get_option('pagestitlebdcolor',true)."}";
		}			
		
		if ( of_get_option('linkcolor', true) != '' ) {
			echo 'a{color:'. esc_html( of_get_option('linkcolor', true) ) .';}';
		}
		if ( of_get_option('linkhovercolor', true) != '' ) {
			echo 'a:hover{color:'. esc_html( of_get_option('linkhovercolor', true) ) .';}';
		}			
		if( of_get_option('foottitlecolor', true) != '' || of_get_option('ftfontsize', true) != '' || of_get_option('ftfontface', true) != ''  ){
			echo ".footer h5, .footer h6{color:".of_get_option('foottitlecolor', true)."; font-size:".of_get_option('ftfontsize', true)."; font-family:".of_get_option('ftfontface', true)."; }";
		}
		 	
 		if( of_get_option('ftfllowusfontsize', true) != ''){
			echo ".footer h6, .recent-post h6{font-size:".of_get_option('ftfllowusfontsize', true).";}";
		}
		 	
		
		
		
		if( of_get_option('footdesccolor', true) != ''){
			echo ".footer{color:".of_get_option('footdesccolor', true).";}";
		}					
		if( of_get_option('copycolor', true) != ''){
			echo ".copyright-txt{color:".of_get_option('copycolor',true)."}";
		}
		
// Our Donator
		if ( of_get_option('ourdonatorbgcolor', true) != '' || of_get_option('ourdonatortextcolor', true) != '') {
			echo ".ourclasses_col{background:".of_get_option('ourdonatorbgcolor',true)."; color:".of_get_option('ourdonatortextcolor',true).";}";
		}
		if ( of_get_option('donatorambgcolor', true) != '' ||  of_get_option('donationamountcolor', true) != '' ) {
			echo ".member-desination{background:".of_get_option('donatorambgcolor',true)."; color:".of_get_option('donationamountcolor',true).";}";
		}
 
// Blog Post
		if ( of_get_option('newsbgcolor', true) != '' || of_get_option('newstextcolor', true) != '' || of_get_option('newsshadowcolor', true) != '') {
			echo ".news{background:".of_get_option('newsbgcolor', true)."; color:".of_get_option('newstextcolor', true)."; box-shadow: 0 1px 10px 0 ".of_get_option('newsshadowcolor', true).";}";
		}
		if ( of_get_option('datenewsbdcolor', true) != '' ) {
			echo ".date-news, .date-news span.newsdate{border-color:".of_get_option('datenewsbdcolor', true).";}";
		}
		if ( of_get_option('newstitlebdcolor', true) != '' ) {
			echo ".news h4{border-color:".of_get_option('newstitlebdcolor', true).";}";
		}
		
		if ( of_get_option('datenewshvbgcolor', true) != '' ) {
			echo ".news-box:hover .date-news{background:".of_get_option('datenewshvbgcolor', true).";}";
		}
		if ( of_get_option('datenewshvbdcolor', true) != '' ) {
			echo ".news-box:hover .date-news span.newsdate{border-color:".of_get_option('datenewshvbdcolor', true).";}";
		}
 
 
		if( of_get_option('socialfontcolor',true) != '' || of_get_option('socialbgcolor',true) != ''  ){
			echo ".social-icons a{color:".of_get_option('socialfontcolor',true)."; background:".of_get_option('socialbgcolor',true).";}";
		}
		if( of_get_option('socialfonthvcolor',true) != '' ||  of_get_option('socialbghvcolor',true) != ''){
			echo ".social-icons a:hover{color:".of_get_option('socialfonthvcolor',true)."; background:".of_get_option('socialbghvcolor',true)."; }";
		}	
		if( of_get_option('btnbgcolor',true) != '' || of_get_option('btntxtcolor', true) != '' || of_get_option('btnbordercolor', true) != ''){
			echo ".wpcf7-form input[type=submit], .button, #commentform input#submit, input.search-submit, .post-password-form input[type=submit], p.read-more a, .accordion-box h2:before, .pagination ul li span, .pagination ul li a{background-color:".of_get_option('btnbgcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; border-bottom:4px solid ". of_get_option('btnbordercolor', true) ."; }";
		}
		
		if( of_get_option('btnbgcolor',true) != '' || of_get_option('btntxtcolor', true) != ''){
			echo ".newslettersign input[type='text'], .newslettersign input[type='email']{background-color:".of_get_option('btnbgcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; }";
		}
		
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxtcolor', true) != ''){
			echo ".newslettersign input[type='submit']{background-color:".of_get_option('btnbghvcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; }";
		}
		
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' || of_get_option('btnborderhvcolor', true) != '' ){
			echo ".wpcf7-form input[type=submit]:hover, .button:hover, #commentform input#submit:hover, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) ."; border-bottom:4px solid ". of_get_option('btnborderhvcolor', true) .";}";
		}
		if( of_get_option('searchbgcolor',true) != ''){
			echo ".searchbox-icon, .searchbox-submit{background-color:".of_get_option('searchbgcolor',true)."; }";
		}
		if( of_get_option('galleryactivebc',true) != ''){
			echo ".photobooth .filter-gallery ul li.current a{border-bottom:3px solid ".of_get_option('galleryactivebc',true)."; }";
		}
		if( of_get_option('searchbgcolor',true) != ''){
			echo ".wrap_one .fa {color:".of_get_option('searchbgcolor',true)."; }";
		}
 
		 
 
		if ( of_get_option('widgettitlebgcolor', true) != '' || of_get_option('wdgttitleccolor', true) != '' ) {
			echo "h3.widget-title{background-color:".of_get_option('widgettitlebgcolor', true)."; color:".of_get_option('wdgttitleccolor', true).";}";
		}
		if ( of_get_option('footerbgcolor', true) != '' ) {
			echo "#footer-wrapper{background-color:".of_get_option('footerbgcolor', true)."; }";
		}			
		if ( of_get_option('footermenucolor', true) != '' ) {
			echo ".footer ul li a{color:".of_get_option('footermenucolor', true)."; }";
		}
		if ( of_get_option('footermenucurrent', true) != '' ) {
			echo ".footer ul li a:hover, .footer ul li.current_page_item a, .footer .cols-1 .widget-column-1 ul li a:hover, .cols-1 .widget-column-1 ul li.current_page_item a{color:".of_get_option('footermenucurrent', true).";  background:url(".get_template_directory_uri()."/images/list-arrow-hover.png) left 6px no-repeat;}";
		}
 
 		if ( of_get_option('copybgcolor', true) != '' ) {
			echo '.copyright-wrapper{background-color:'. esc_html( of_get_option('copybgcolor', true) ) .';}';
		}
		if( of_get_option('galhvcolor',true) != ''){
			echo ".photobooth .gallery ul li:hover{ background:".of_get_option('galhvcolor',true)."; float:left; z-index:999; background:url(".get_template_directory_uri()."/images/zoom-icon.png) 50% 50% no-repeat ".of_get_option('galhvcolor',true)."; }";
		}
		 
	 
		
 
		if( of_get_option('sldnavbg',true) != ''){
			echo ".nivo-directionNav a{background:url(".get_template_directory_uri()."/images/slide-nav.png) no-repeat".of_get_option('sldnavbg',true).";}";
		}
		
		
		if( of_get_option('sldnavbg',true) != ''){
			echo ".nivo-directionNav a{background:url(".get_template_directory_uri()."/images/slide-nav.png) no-repeat".of_get_option('sldnavbg',true).";}";
		}
		if( of_get_option('sldnavhvbg',true) != ''){
			echo ".nivo-directionNav a:hover{background:url(".get_template_directory_uri()."/images/slide-nav.png) no-repeat".of_get_option('sldnavhvbg',true).";}";
		}
		if( of_get_option('sldpagebg',true) != ''){
			echo ".nivo-controlNav a{background-color:".of_get_option('sldpagebg',true)."}";
		}
		if( of_get_option('sldpagehvbg',true) != ''){
			echo ".nivo-controlNav a.active{background-color:".of_get_option('sldpagehvbg',true)."}";
		}		
		
		if(of_get_option('sidebarliaborder', true) != '' ){
			echo "#sidebar ul li{border-bottom:1px dashed ".of_get_option('sidebarliaborder',true)."}";
		}
		if( of_get_option('sidebarfontcolor',true) != ''){
			echo "#sidebar ul li a{color:".of_get_option('sidebarfontcolor',true).";}";
		}	
		if( of_get_option('sidebarfonthvcolor',true) != '' ){
			echo "#sidebar ul li a:hover{color:".of_get_option('sidebarfonthvcolor',true)."; }";
		}	
		if ( of_get_option('copylinks', true) != '' ) {
		echo ".copyright-wrapper, .copyright-wrapper a:hover, .footer .phone-no a, .footer-post-date a{ color: ".of_get_option('copylinks', true)."; }";
		}	
		if ( of_get_option('copylinkshover', true) != '' ) {
		echo ".copyright-wrapper a, .footer .phone-no a:hover, .phone-no span, .footer-post-date a:hover{ color: ".of_get_option('copylinkshover', true)."; }";
		}	
		if ( of_get_option('footermenuborder', true) != '' ) {
		echo ".footer ul li, .cols-3 .widget-column-2, .recent-post, .cols-2 .widget-column-2{ border-color: ".of_get_option('footermenuborder', true)."; }";
		}
 		if ( of_get_option('iframeborder', true) != '') {
		echo "iframe{ border:1px solid ".of_get_option('iframeborder', true)."; }";
		}		
		if ( of_get_option('sidebarbgcolor', true) != '' ) {
		echo "aside.widget{ background-color:".of_get_option('sidebarbgcolor', true)."; }";
		}	
		if ( of_get_option('readmorebuttonbg', true) != '' ) {
		echo "a.read-more{ background:".of_get_option('readmorebuttonbg', true).";}";
		}
		if ( of_get_option('readmorebuttonbghover', true) != '' ) {
		echo "a.read-more:hover{ background:".of_get_option('readmorebuttonbghover', true).";}";
		}		
		
		// Testimonials 
		if ( of_get_option('testimonialinnerbgcolor', true) != '' ) {
		echo ".site-main #testimonials{ background: ".of_get_option('testimonialinnerbgcolor', true)."; }";
		}
		if ( of_get_option('tmndesccolor', true) != '' ) {
		echo "#testimonials ul li .tm_description{color: ".of_get_option('tmndesccolor', true)."; }";
		}
		if ( of_get_option('tmn_titlefontcolor', true) != '' ) {
		echo "#testimonials ul li h5{ color: ".of_get_option('tmn_titlefontcolor', true)."; }";
		}
		if ( of_get_option('tmn_titledesfontcolor', true) != '' ) {
		echo "#testimonials ul li h6{ color: ".of_get_option('tmn_titledesfontcolor', true)."; }";
		}		
		if ( of_get_option('tmnpagerbg', true) != '' ) {
		echo "ol.nav-numbers li a{background-color: ".of_get_option('tmnpagerbg', true).";}";
		}
		if ( of_get_option('tmnpagerbgactive', true) != '') {
		echo "ol.nav-numbers li.active a{background-color: ".of_get_option('tmnpagerbgactive', true).";}";
		}
		
// Heading
		if ( of_get_option('towingemergencyh2', true) != '' ) {
			echo ".towing-emergency h2{font-size:".of_get_option('towingemergencyh2', true).";}";
		}
		if ( of_get_option('towingemergencyh3', true) != '' || of_get_option('towingemergencyh3color', true) != '' ) {
			echo ".towing-emergency h3{font-size:".of_get_option('towingemergencyh3', true)."; color:".of_get_option('towingemergencyh3color', true)."; }";
		}
		if ( of_get_option('sectiontitleboldcolor', true) != '' ) {
			echo "section h2 span{color:".of_get_option('sectiontitleboldcolor', true).";}";
		}
		if ( of_get_option('h1fontface', true) != '' ||  of_get_option('h1fontsize', true) != '' ||  of_get_option('h1fontsize', true) != '' ) {
			echo "h1{font-family:".of_get_option('h1fontface', true)."; font-size:".of_get_option('h1fontsize', true)."; color:".of_get_option('h1fontcolor', true).";}";
		}
		if ( of_get_option('h2fontface', true) != '' || of_get_option('h2fontsize', true) != '' || of_get_option('h2fontcolor', true) != '') {
			echo "h2{font-family:".of_get_option('h2fontface', true)."; font-size:".of_get_option('h2fontsize', true)."; color:".of_get_option('h2fontcolor', true).";}";
		}	
		if ( of_get_option('h3fontface', true) != '' || of_get_option('h3fontsize', true) != '' || of_get_option('h3fontcolor', true) != '') {
			echo "h3{font-family:".of_get_option('h3fontface', true).";font-size:".of_get_option('h3fontsize', true).";color:".of_get_option('h3fontcolor', true).";}";
		}	
		if ( of_get_option('h4fontface', true) != '' || of_get_option('h4fontsize', true) != '' || of_get_option('h4fontcolor', true) != '') {
			echo "h4{font-family:".of_get_option('h4fontface', true).";font-size:".of_get_option('h4fontsize', true).";color:".of_get_option('h4fontcolor', true).";}";
		}	
		if ( of_get_option('h5fontface', true) != '' || of_get_option('h5fontsize', true) != '' || of_get_option('h5fontcolor', true) != '' ) {
			echo "h5{font-family:".of_get_option('h5fontface', true).";font-size:".of_get_option('h5fontsize', true)."; color:".of_get_option('h5fontcolor', true).";}";
		}	
		if ( of_get_option('h6fontface', true) != '' || of_get_option('h6fontsize', true) != '' || of_get_option('h6fontcolor', true) != '') {
			echo "h6{font-family:".of_get_option('h6fontface', true)."; font-size:".of_get_option('h6fontsize', true)."; color:".of_get_option('h6fontcolor', true).";}";
		}	
		
		echo "</style>";
	}
}
add_action('wp_head', 'skt_charity_custom_head_codes');


function skt_charity_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';

function excerpt($num) {
        $limit = $num+1;
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt)."...";
        echo $excerpt;
    }
	
function skt_charity_string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}	

function skt_charity_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) ); 
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	} 
}

// get slug by id
function skt_charity_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

/**
 * Include the Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-plugin-activation.php';
add_action( 'tgmpa_register', 'spirited_register_required_plugins' );
 
function spirited_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'Shortcodes Ultimate',
			'slug'      => 'shortcodes-ultimate',
			'required'  => false,
		),
 
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'skt-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
<?php
/**
 * The template for displaying search forms in SKT Charity
 *
 * @package SKT Charity
 */
?>
<form role="search" method="get" class="searchbox" action="<?php echo esc_url( home_url( '/' ) ); ?>">		
	<input type="search" class="searchbox-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'skt-charity' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" onkeyup="buttonUp();">
	<input type="submit" class="" value="<?php echo esc_attr_x( '', 'submit button', 'skt-charity' ); ?>">
     <span class="searchbox-icon"></span>

</form>
     <div class="clear"></div>
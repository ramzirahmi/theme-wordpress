<?php
require_once('includes/wp-bootstrap-navwalker.php');

Add_theme_support('post-thumbnails');

function add_styles(){
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome-css', get_template_directory_uri().'/css/font-awesome.min.css');
	wp_enqueue_style('main-css', get_template_directory_uri().'/css/main.css');

}
add_action( 'wp_enqueue_scripts','add_styles');

function add_scripts(){

	wp_enqueue_script('jquery-js', get_template_directory_uri().'/js/jquery-3.3.1.min.js', array(),false,true);

	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array(),false,true);

	wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.js');

	wp_enqueue_script('html5shiv-js', get_template_directory_uri().'/js/html5shiv.min.js');
	wp_script_add_data('html5shiv','conditional','lt IF 9');
	wp_enqueue_script('respond-js', get_template_directory_uri().'/js/respond.min.js');
	wp_script_add_data('respond','conditional','lt IF 9');
}

add_action( 'wp_enqueue_scripts','add_scripts');


function register_custom_menu(){
	register_nav_menus(array(
		'bootstrap_menu' =>'navigation bar',
         'footer_menu'   =>'footer menu'
	));
}

function bootstrap_nav_menu(){
wp_nav_menu(array(
	'theme_location'=>'bootstrap_menu',
	'menu_class'=>'nav navbar-nav navbar-right',
	'container' => false,
	'dapth'     =>2,
	'walker'   => new WP_Bootstrap_Navwalker()
	
));
}

add_action('init','register_custom_menu');


function extend_excerpt_length($length){
	if(is_author())
	{return 30;}
    else if(is_category())
    { return 40;}
		else{ return 65; }
   
	
}
add_filter('excerpt_length', 'extend_excerpt_length');

function excerpt_change_dots($more){
return '...';
}
add_filter('excerpt_more', 'excerpt_change_dots');

function numbering_pagenation(){
	global $wp_query;
	$all_page=$wp_query->max_num_pages;
	$current_page=max(1,get_query_var('paged'));
	if($all_page>1){
		return paginate_links(array(
			'base'   => get_pagenum_link(). '%_%',
			'format' =>'page/%#%',
			'current'=>$current_page,
			'mid_size' =>1,
			'end_size' =>2
		));
	}
}

function main_sidebar(){
	register_sidebar(array(
		'name'       =>'Main Sidebar',
		'id'         =>'main-sidebar',
		'descrption' =>'main sidebar Appear Evreywhre',
		'class'      =>'main-sidebar',
	'before_widget'  =>'<div class="widget-content">',
	'after_widget'   =>'</div>',
	 'before_title'  =>'<h3 class="widget-title">',
	 'after_title'   =>'</h3>'
	  ));
}
 add_action('widgets_init','main_sidebar');
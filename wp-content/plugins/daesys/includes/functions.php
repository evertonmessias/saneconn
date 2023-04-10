<?php

// ***************** Add style & script for Admin

add_action('admin_enqueue_scripts',function(){
	wp_enqueue_style('style1', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css');
	wp_enqueue_style('style2', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
	wp_enqueue_style('style3', 'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css');
	wp_enqueue_style('style4', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css');
	wp_enqueue_style('style5', 'https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css');
	wp_enqueue_style('style6', '/wp-content/themes/daesys/assets/vendor/remixicon/remixicon.css');
	wp_enqueue_style('style7', '/wp-content/plugins/daesys/assets/daesys.css');

	wp_enqueue_script('script1', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
	wp_enqueue_script('script2', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js');
	wp_enqueue_script('script3', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
	wp_enqueue_script('script4', 'https://code.jquery.com/jquery-3.5.1.js');
	wp_enqueue_script('script5', 'https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js');
	wp_enqueue_script('script6', 'https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js');
	wp_enqueue_script('script7', '/wp-content/plugins/daesys/assets/daesys.js');

	wp_enqueue_media();
});


//***************** Add General Configuration Roles
function general_configuration_role_caps()
{
	$roles = array('editor');
	foreach ($roles as $the_role) {
		$role = get_role($the_role);
		$role->remove_cap('list_users');
		$role->remove_cap('create_users');
		$role->remove_cap('remove_users');
		$role->remove_cap('promote_users');
		$role->remove_cap('edit_users');
		$role->add_cap('manage_options');
	}
}
add_action('admin_init', 'general_configuration_role_caps', 999);


// ***************** Add in Menu
add_action('admin_menu',function(){
	add_menu_page('DAESys', 'DAESys', 'edit_posts', 'daesys', 'function_about', 'dashicons-welcome-view-site', 1);
	//add_submenu_page('daesys', 'Acessos', 'Acessos', 'edit_posts', 'acess', 'function_access', 1);
	add_submenu_page('daesys', 'Login', 'Login', 'edit_posts', 'login', 'function_login', 2);
});

// ***************** Add About
function function_about()
{
	include ABSPATH . '/wp-content/plugins/daesys/includes/about.php';
}
add_action('function_about', 'function_about');

// ***************** Add Access
function function_access()
{
	include ABSPATH . '/wp-content/plugins/daesys/includes/access.php';
}
add_action('function_access', 'function_access');

// ***************** Add Login
function function_login()
{
	include ABSPATH . '/wp-content/plugins/daesys/includes/login.php';
}
add_action('function_login', 'function_login');


//************* Add thumbnails
add_theme_support('post-thumbnails', array('post'));


//************* Hide admin bar for users
add_action('after_setup_theme',function(){
	show_admin_bar(false);
});


//************* Remove tags support from posts
add_action('init',function(){
	unregister_taxonomy_for_object_type('post_tag', 'post');
	register_nav_menu('daesys-nav', __('daesys-nav'));
});

//************* Data Base
/*
function registerdb($ip) // register in db
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'access';
	$resp = $wpdb->insert($table_name, array('ipadress' => $ip, 'time' => current_time('mysql')));
	if ($resp == 1) {
		return "register db: SUCESS";
	} else {
		return "register db: ERROR";
	}
}
add_action('registerdb', 'registerdb');
*/

function registerdb2($user, $ip) // register in db
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'login';
	$resp = $wpdb->insert($table_name, array('user' => $user, 'ipadress' => $ip, 'time' => current_time('mysql')));
	if ($resp == 1) {
		return "register db: SUCESS";
	} else {
		return "register db: ERROR";
	}
}
add_action('registerdb2', 'registerdb2');

function list_access($table) // list access
{
	global $wpdb;
	$table_name = $wpdb->prefix . $table;
	$results = $wpdb->get_results(
		"SELECT * FROM $table_name ORDER BY id DESC"
	);
	return $results;
}
add_action('list_access', 'list_access');


function list_data($sql) // list data base
{
	global $wpdb;
	$results = $wpdb->get_results($sql);
	return $results;
}
add_action('list_data', 'list_data');
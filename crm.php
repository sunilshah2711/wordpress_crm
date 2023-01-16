<?php 
/**
 * Plugin Name: CRM
 * Plugin URI: https://google.com
 * Description: crm test plugin
 * Version: 1.0
 * Author: CRM
 * Author URI: https://google.com
 * License: GPL2
 */
global $wpdb;
include "pages/contact.php";
include "pages/dashbord.php";
include "pages/tasks.php";
include "pages/meetings.php";
include "pages/companies.php";
include "pages/opportunities.php";
include "pages/reports.php";
include "pages/starred.php";
include "pages/trash.php";
include "pages/admin.php";
include "pages/cms.php";
include "pages/cms_pages.php";
include "pages/databsetables.php"; 
include "pages/contact_trash.php";
include "pages/inbox.php";

// add_filter( 'page_template', 'wpa3396_page_template' );
// function wpa3396_page_template( $page_template )
// {
//     if ( is_page( 'contact_trash' ) ) {
//         $page_template = dirname( __FILE__ ) . '/.pages/contact_trash.php';
//     }
//     return $page_template;
// }
//add_action( $tag, $function_to_add, $priority, $accepted_args );

register_activation_hook( __FILE__, 'test_contact_form');
// register_activation_hook( __FILE__, 'user_setting');

add_action('admin_menu', 'crm');
// add_action('contact_t', 'contact_trash');

// CSS
wp_register_style( 'inbox', plugins_url('css/globel.css', __FILE__) );
wp_register_style( 'bootstrapcss', plugins_url('css/bootstrap/bootstrap.min.css', __FILE__) );
wp_register_style( 'datatable', plugins_url('css/datatable.css', __FILE__) );
wp_register_style( 'fontawesome',  plugins_url('css/fontawesome.css', __FILE__)  );
// wp_register_style( 'datatable','https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' );

// JS
wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.11.3.min.js' );
wp_register_script( 'bootstrapjs', plugins_url('js/bootstrap.bundle.js', __FILE__) );
wp_register_script( 'datatable', 'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js' );


wp_register_script( 'custom', plugins_url('js/custom.js', __FILE__) );


function crm(): void
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'userstable';

    wp_enqueue_style('bootstrapcss');
    wp_enqueue_style('fontawesome');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrapjs');
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('CRM', 'CRM', 'publish_posts', 'dashbord', 'dashbord');
    add_menu_page('CMS', 'CMS', 'administrator', 'cms', 'cms');
    add_menu_page('Admin', 'Admin', 'administrator', 'admin', 'admin');

    // removeung default menu
    remove_menu_page( 'edit.php');
    remove_menu_page( 'upload.php');
    remove_menu_page( 'edit.php?post_type=page');
    remove_menu_page( 'edit-comments.php');
    remove_menu_page( 'themes.php');
    remove_menu_page( 'users.php');
    remove_menu_page( 'tools.php');
    remove_menu_page( 'plugins.php');
    remove_menu_page( 'options-general.php');
    remove_menu_page( 'index.php');

    //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
    add_submenu_page('dashbord', 'Dashbord', 'Dashbord', 'administrator', 'dashbord', 'dashbord');
    add_submenu_page('dashbord', 'Inbox', 'Inbox', 'administrator', 'inbox', 'inbox');
    add_submenu_page('dashbord', 'Contact', 'Contact', 'administrator', 'contact', 'contact');
    add_submenu_page('dashbord', 'Tasks', 'Tasks', 'administrator', 'tasks', 'tasks');
    add_submenu_page('dashbord', 'Meetings', 'Meetings', 'administrator', 'meetings', 'meetings');
    add_submenu_page('dashbord', 'Companies', 'Companies', 'administrator', 'companies', 'companies');
    add_submenu_page('dashbord', 'Opportunities', 'Opportunities', 'administrator', 'opportunities', 'opportunities');
    add_submenu_page('dashbord', 'Reports', 'Reports', 'administrator', 'reports', 'reports');
    add_submenu_page('dashbord', 'Starred', 'Starred', 'administrator', 'starred', 'starred');
    add_submenu_page('dashbord', 'Trash', 'Trash', 'administrator', 'trash', 'trash');

    //cms sub menu
    add_submenu_page('cms', 'Dashbord', 'Dashbord', 'administrator', 'cms', 'cms');
    add_submenu_page('cms', 'All Posts', 'All Posts', 'administrator', 'posts', 'posts');
    add_submenu_page('cms', 'Add New', 'Add New Post', 'administrator', 'postnew', 'postnew');
    add_submenu_page('cms', 'Categories', 'Categories', 'administrator', 'categories', 'categories');
    add_submenu_page('cms', 'Tags', 'Tags', 'administrator', 'tages', 'tages');
    add_submenu_page('cms', 'Library', 'Library', 'administrator', 'upload', 'upload');
    add_submenu_page('cms', 'Add New Library', 'Add New Library', 'administrator', 'addnewlib', 'addnewlib');
    add_submenu_page('cms', 'All Pages', 'All Pages', 'administrator', 'allpages', 'allpages');
    add_submenu_page('cms', 'Add New Page', 'Add New Page', 'administrator', 'newpages', 'newpages');
    add_submenu_page('cms', 'Comments', 'Comments', 'administrator', 'comments', 'comments');

   //  Creating New Page
    add_menu_page('Trash Contacts', 'Trash Contacts', 'administrator','contact_trash', 'contact_trash');
    remove_menu_page('contact_trash');
}

function delete_plugin_database_tables(){
  global $wpdb;
  $tableArray = [   
    $wpdb->prefix . "contacts_table",
    $wpdb->prefix . "user_settings_table",
 ];

foreach ($tableArray as $tablename) {
   $wpdb->query("DROP TABLE IF EXISTS $tablename");
}
}

register_uninstall_hook(__FILE__, 'delete_plugin_database_tables');
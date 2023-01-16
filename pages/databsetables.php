<?php 
function test_contact_form() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contacts_table';
    $table_name1 = $wpdb->prefix . 'user_settings_table';
  
    $query = "SELECT ENGINE FROM information_schema.TABLES WHERE TABLE_SCHEMA='{$wpdb->dbname}' AND TABLE_NAME='{$wpdb->users}';";
    $engine = $wpdb->get_results( $query )[0]->ENGINE;
  
    $sql = "CREATE TABLE {$wpdb->prefix}contacts_table (
      id bigint unsigned NOT NULL AUTO_INCREMENT,
      user_id bigint(20) unsigned DEFAULT NULL,
      name varchar(220) DEFAULT NULL,
      email varchar(220) DEFAULT NULL,
      mobile_no varchar(22) DEFAULT NULL,
      description varchar(22) DEFAULT NULL,
      lifecyclestage varchar(22) DEFAULT NULL,
      lifecyclestage_createdat DATETIME DEFAULT NULL,
      lifecyclestage_updatedat DATETIME DEFAULT NULL,
      is_read int(11) DEFAULT 0,
      trash_status int(11) DEFAULT 0,
      creation_date datetime DEFAULT CURRENT_TIMESTAMP,
      updation_date datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      FOREIGN KEY (user_id) REFERENCES wp_users(ID) ON DELETE CASCADE,
      PRIMARY KEY (id),
      UNIQUE (id)
    ) ENGINE={$engine};";
  
    $sql1 = "CREATE TABLE {$wpdb->prefix}user_settings_table (
      id bigint unsigned NOT NULL AUTO_INCREMENT,
      is_filter_pin int(11) DEFAULT 0,
      creation_date datetime DEFAULT CURRENT_TIMESTAMP,
      updation_date datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (id)
    ) ENGINE={$engine};";
  
  
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
    }
  
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name1'") != $table_name1) {
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql1);
    }
  }
?>
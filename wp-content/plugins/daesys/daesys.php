<?php

/**
 * Plugin Name: DAESys
 * Plugin URI: https://ic.unicamp.br/~everton
 * Description: Plugin para gerenciamento do site DAESys
 * Author: EvM.
 * Version: 1.0
 * Text Domain: DAESys
 * Plugin DAESys
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// ***************** Add DB
register_activation_hook(__FILE__, function() {

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    /*
    $table_name = $wpdb->prefix . 'access';
    $sql = "CREATE TABLE $table_name (`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,`ipadress` text NOT NULL,`time` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL)$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        dbDelta($sql);
    }
    */

    $table_name2 = $wpdb->prefix . 'login';
    $sql2 = "CREATE TABLE $table_name2 (`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT, `user` text NOT NULL,`ipadress` text NOT NULL,`time` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL)$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name2'") != $table_name2) {
        dbDelta($sql2);
    } 
    
    $table_name3 = $wpdb->prefix . 'snis';
    $sql3 = "CREATE TABLE $table_name3 (`ano` int PRIMARY KEY NOT NULL AUTO_INCREMENT,`IN001` decimal (10,2),`IN008` decimal (10,2),`IN011` decimal (10,2),`IN016` decimal (10,2),`IN020` decimal (10,2),`IN023` decimal (10,2),`IN024` decimal (10,2),`IN026` decimal (10,2),`IN030` decimal (10,2),`IN049` decimal (10,2),`IN053` decimal (10,2),`IN060` decimal (10,2),`IN102` decimal (10,2))$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name3'") != $table_name3) {
        dbDelta($sql3);
    }

    $table_name4 = $wpdb->prefix . 'clientes_ativos';
    $sql4 = "CREATE TABLE $table_name4 (`ano` int PRIMARY KEY NOT NULL, `janeiro` INT,`fevereiro` INT,`marco` INT,`abril` INT,`maio` INT,`junho` INT,`julho` INT,`agosto` INT,`setembro` INT,`outubro` INT,`novembro` INT,`dezembro` INT)$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name4'") != $table_name4) {
        dbDelta($sql4);
    }

    $table_name5 = $wpdb->prefix . 'clientes_cat';
    $sql5 = "CREATE TABLE $table_name5 (`ano` int PRIMARY KEY NOT NULL, `CAM` INT, `COM` INT, `CON` INT, `ENT` INT, `HOC` INT, `HOP` INT, `IND` INT, `ITR` INT, `PES` INT, `PMU` INT, `PNM` INT, `POC` INT, `RES` INT, `SOC` INT, `TAR` INT, `TER` INT)$charset_collate;";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name5'") != $table_name5) {
        dbDelta($sql5);
    }
    
    //administrator
    //editor
    //author
    //contributor
    //subscriber

    remove_role('contributor');
    remove_role('author');
    flush_rewrite_rules();
    
});


// DEACTIVATE *************************************************
register_deactivation_hook(__FILE__, function(){
    flush_rewrite_rules();
});


// FUNCTIONS ************************************************
include ABSPATH . '/wp-content/plugins/daesys/includes/functions.php';
include ABSPATH . '/wp-content/plugins/daesys/includes/dae.php';

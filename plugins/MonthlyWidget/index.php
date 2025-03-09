<?php

//Prevent direct access
defined('PLUGINPATH') or exit('No direct script access allowed');

/*
Plugin Name: Monthly Project
Plugin URL: https://codecanyon.net/item/your_item
Description: Your plugin description
Version: 1.0
Requires at least: 2.8
Author: Author name
Author URL: https://codecanyon.net/user/author_url
*/    

app_hooks()->add_filter('app_filter_dashboard_widgets', function ($default_widgets_array) {
    array_push($default_widgets_array, array(
        "widget" => "hohohho",
        "widget_view" => view("MonthlyWidget\Views\widget")
    ));

    return $default_widgets_array;
});

// app_hooks()->add_filter('app_filter_admin_settings_menu', function ($settings_menu) {
//     $settings_menu["plugins"][] = array("name" => "demo", "url" => "demo_settings");
//     return $settings_menu;
// });
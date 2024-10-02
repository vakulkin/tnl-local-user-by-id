<?php
/*
Plugin Name: Authorize User Local
Description: Authorizes the user with ID 1 (for local only)
Author: TheNewLook
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Authorize_User
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'authorize_user'], 1);
    }

    public function authorize_user($request)
    {
        if (!is_user_logged_in()) {
            $user_id = 1;
            $user = get_user_by('id', $user_id);
            if ($user) {
                wp_set_current_user($user_id);
            }
        }
    }
}

new Authorize_User();

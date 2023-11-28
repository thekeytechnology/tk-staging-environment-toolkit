<?php

class TkTesterRole {

    public function init() {
        add_action('after_setup_theme', array($this, 'tkRemoveAdminBarForTesters'));
        add_action('admin_init', array($this, 'tkRestrictAdminAccessForTesters'));
        register_activation_hook(__FILE__, array($this, 'tkAddTesterRole'));
        register_deactivation_hook(__FILE__, array($this, 'tkRemoveTesterRole'));
    }

    public function tkAddTesterRole() {
        add_role('tester', 'Tester', array('read' => true));
    }

    public function tkRemoveTesterRole() {
        remove_role('tester');
    }

    public function tkRemoveAdminBarForTesters() {
        if (current_user_can('tester')) {
            show_admin_bar(false);
        }
    }

    public function tkRestrictAdminAccessForTesters() {
        if (!is_admin()) {
            return;
        }

        if (current_user_can('tester') && !(defined('DOING_AJAX') && DOING_AJAX)) {
            wp_redirect(home_url());
            exit;
        }
    }
}

<?php

class TkRedirect {

    public function init() {
        add_action('template_redirect', array($this, 'tkCheckStagingAndRedirect'));
    }

    /**
     * Redirects non-logged-in users to the login page if 'staging' is in the URL.
     */
    public function tkCheckStagingAndRedirect() {
        if (!tkIsStagingEnvironment()) {
            return;
        }

        if (is_user_logged_in()) {
            return;
        }

        wp_redirect(wp_login_url());
        exit;
    }
}


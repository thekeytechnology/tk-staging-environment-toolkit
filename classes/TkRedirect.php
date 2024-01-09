<?php

class TkRedirect {

    /**
     * Initializes WordPress hooks for the redirect functionality.
     */
    public function init() {
        add_action('template_redirect', array($this, 'redirectToLoginOnStaging'));
    }

    /**
     * Redirects non-logged-in users to the login page on staging environments, unless they are already on the login page.
     * This method checks if the current environment is a staging environment and if the user is not logged in.
     * If both conditions are met and the user is not already on the login page, the user is redirected to the WordPress login page.
     */
    public function redirectToLoginOnStaging() {
        if (tkIsStagingEnvironment() && !is_user_logged_in() && !$this->isLoginPage()) {
            wp_redirect(wp_login_url());
            exit;
        }
    }

    /**
     * Checks if the current page is the login page.
     *
     * @return bool True if it's the login page, false otherwise.
     */
    private function isLoginPage() {
        return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
    }
}

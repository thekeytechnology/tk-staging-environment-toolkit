<?php

class TkRobots {

    public function init() {
        add_action('init', array($this, 'tkUpdateSearchEngineVisibility'));
        add_filter('wp_robots', array($this, 'tkNoRobotsForStaging'));
    }

    /**
     * Updates the search engine visibility setting based on the URL.
     */
    public function tkUpdateSearchEngineVisibility() {
        if (tkIsStagingEnvironment()) {
            update_option('blog_public', '0');
        } else {
            update_option('blog_public', '1');
        }
    }

    public function additionalDeactivationTask() {
        update_option('blog_public', '1');
    }

    /**
     * Modifies robots.txt rules if 'staging' is in the URL.
     *
     * @param array $robots The associative array of robots.txt rules.
     * @return array Modified robots.txt rules.
     */
    public function tkNoRobotsForStaging($robots) {
        if (tkIsStagingEnvironment()) {
            $robots['noindex'] = true;
            $robots['nofollow'] = true;
        }
        return $robots;
    }


}

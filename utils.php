<?php

/**
 * Checks if the current environment is a staging environment.
 *
 * @return bool True if staging, false otherwise.
 */
function tkIsStagingEnvironment() {
    // Check if HTTP_HOST is set to prevent errors in CLI or unusual server configurations
    if (!isset($_SERVER['HTTP_HOST'])) {
        return false;
    }

    // Extract the host from the URL
    $host = strtolower($_SERVER['HTTP_HOST']);

    // Define a clear and specific pattern that identifies staging environments
    // For example, this pattern checks if the host contains '.staging.' or starts with 'staging.'
    $stagingPattern = '/(^staging\.)|(\.staging\.)/';

    // Perform the check using regular expression for precise matching
    return preg_match($stagingPattern, $host) === 1;
}

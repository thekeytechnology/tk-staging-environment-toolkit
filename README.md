# TK Staging Environment Toolkit

## Description
The TK Staging Environment Toolkit is a WordPress plugin specifically designed for enhancing staging environments. It offers functionalities such as redirecting non-logged-in users to the login page if the URL contains 'staging', preventing search engines from indexing staging sites, and adding a custom 'Tester' user role for restricted access.

## Features
- **Staging Detection**: Detects staging environments based on 'staging' keyword in the URL.
- **User Redirection**: Redirects non-logged-in users to the login page in staging environments.
- **SEO Protection**: Adjusts robots.txt to prevent search engines from indexing staging sites.
- **Custom User Role**: Introduces a 'Tester' role with limited permissions, ideal for review and testing purposes.

## Installation
1. **Download the Plugin**: Download the plugin's .zip file from the GitHub repository.
2. **Upload and Install in WordPress**:
    - Navigate to `Plugins` -> `Add New` in your WordPress dashboard.
    - Click `Upload Plugin`, then choose the downloaded .zip file.
    - Click `Install Now` followed by `Activate Plugin`.

## Usage
The plugin functions automatically once activated. Specific behaviors are as follows:

- **In Staging Environments**: Automatically activates user redirection and SEO adjustments when 'staging' is detected in the URL.
- **For Tester Role**: Create a new user and assign the 'Tester' role for restricted site access.

## Configuration
No additional setup is required. The plugin operates based on the URL structure and the WordPress environment.


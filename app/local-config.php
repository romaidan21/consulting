<?php

//=============================================== Security and optimization mods

// Disable theme & plugin edit from admin
define('DISALLOW_FILE_EDIT', true);

// No revisions
define('WP_POST_REVISIONS', 0);


//=============================================== Check for environment
$host = explode('.', $_SERVER['HTTP_HOST']);

// Local development environment
if (end($host) === 'loc') {

    // DB Configuration
    define('DB_NAME', 'consulting');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');

    // Debug
    define('WP_DEBUG', true);
}

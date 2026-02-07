<?php
/**
 * Database Configuration
 * Copy this file to config.php and update with your credentials
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'hotel_booking');
define('DB_CHARSET', 'utf8mb4');

// Application Settings
define('SITE_NAME', 'Hotel Booking System');
define('SITE_URL', 'http://localhost');
define('ADMIN_EMAIL', 'admin@example.com');

// Security
define('SESSION_LIFETIME', 3600); // 1 hour in seconds
define('CSRF_TOKEN_NAME', 'csrf_token');

// Timezone
date_default_timezone_set('UTC');

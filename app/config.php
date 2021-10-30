<?php

// ============================
// PHP Settings
// ============================
$config['php']['error_reporting']           = E_ALL;        // activate or deactivate PHP Error Messages

// ============================
// SITE Settings
// ============================
$config['site']['invitation_code']          = 2322;         // this is the code that has to be used to successfully register
$config['site']['show_extended_homepage']   = true;        // show some Explanations and hints on DIWA's index Page?
$config['site']['show_footer_info']         = true;         // show infos about author and links to github in the footer?
$config['site']['use_mail_function']        = false;        // false: saves all mails to disk only; true: also sends mails using php's mail()-function

// ============================
// HTTP BASIC AUTH Settings
// ============================
// Uncomment the following two lines to enable HTTP Basic Auth. Please also change username and password!
// $config['auth']['username']                 = '';        // set your username
// $config['auth']['password']                 = '';        // set a strong password

// ONLY CHANGE SETTINGS BELOW BEFORE INSTALLATION

// ============================
// SYSTEM Settings
// ============================
$config['system']['hashing_algorithm']      = 'md5';        // specify the hashing algorithm for password hashing. Do not change this after installation.

// ============================
// DATABASE Settings
// ============================
$config['database']['driver']               = 'sqlite';                 // available options: sqlite, mysql
$config['database']['prefix']               = 'fritzed_';               // the table prefix (e.g. "fritzed" generates the table name "diwa_users"). Do not change this after installation.
$config['database']['database']             = '../database/db';    // for sqlite: Database filename; for mysql & pgsql: Database name
// additional database settings for mysql & pgsql (ignore these if you use sqlite)
$config['database']['server']               = 'localhost';              // specify Server Hostname here
$config['database']['username']             = 'username';               // database username ...
$config['database']['password']             = 'password';               // ... and password
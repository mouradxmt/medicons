<?php

/**
 * change the values of each variable
 * then rename the file name to config.php
 *  instead of config.sample.php
 */
  // DB Params
  define('DB_HOST', '__DBHOSTNAME__');
  define('DB_USER', '__DBUSERNAME__');
  define('DB_PASS', '__DBPASSWORD__');
  define('DB_NAME', '__DBNAME__');
  

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', '__ROOTOFAPPLICATION__');
  // Site Name
  define('SITENAME', '__SITENAME__');

  define('SITELOGO',URLROOT.'/assets/images/logo.png');
  define('SITELOGOLIGHT',URLROOT.'/assets/images/logo-light.png');
<?php

    // Project name. Will be used for loging errors
define('PR_NAME','Boomboom');

    // Project damain name. Will be used for sending email messages
define('PR_DOMAIN','Boomboom.co.il');

    /*
     * 0 - test mode (will print errors and save in database)
     * 1 - live mode (only save errors in database)
     */
define('PR_MODE',0);

    /*
     * Meanwhile turning off search by categories,
     * because all the job ads are from parsed websites,
     * and they don't divided by categories
     */
define('MOD_CATEGORIES_ON',0);

    // Protecting sensitive information, from you, reader
$passwords    = file('.passwords');
$passwords[0] = isset($passwords[0])?trim($passwords[0]):''; 
$passwords[1] = isset($passwords[1])?trim($passwords[1]):''; 

    // Database connection data for localhost, and not a local host.
if($_SERVER['SERVER_ADDR'] == '127.0.0.1')
{
    define('DBMS_NAME','mysql');  // Database management system name
    define('DB_HOST'  ,'localhost');
    define('DB_PORT'  ,'3306');
    define('DB_USER'  ,'root');
    define('DB_PASS'  ,$passwords[0]);
    define('DB_DATABASENAME','Boomboom');
    define('DB_DATABASENAME_LOG','log');
}
else
{
    define('DBMS_NAME','mysql');  // Database management system name
    define('DB_HOST'  ,'localhost');
    define('DB_PORT'  ,'3306');
    define('DB_USER'  ,'user475_boomboom');
    define('DB_PASS'  ,$passwords[1]);
    define('DB_DATABASENAME','user475_Boomboom');
    define('DB_DATABASENAME_LOG','user475_log');
}
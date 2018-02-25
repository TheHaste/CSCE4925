<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Postgres",   // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	"user" => "tdqtwhcckycshu",        // Database user name
	"pass" => "5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee",        // Database password
	"host" => "ec2-54-227-243-210.compute-1.amazonaws.com",        // Database host
	"port" => "5432",        // Database connection port (can be left empty for default)
	"db"   => "d3f2mm484o32jn",        // Database name
	"dsn"  => "",        // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
	"pdoAttr" => array() // PHP PDO attributes array. See the PHP documentation for all options
);


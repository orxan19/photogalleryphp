<?php 

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "gallery";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}
?>
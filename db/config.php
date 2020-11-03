<?php 

session_start();

$server_ip = $_SERVER['REMOTE_ADDR'];

if($server_ip == '::1' || $server_ip == '127.0.0.1' || $server_ip == 'localhost'){
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PWD', '');
    define('DB_NAME','hollowin');
}else{
    define('DB_HOST', 'sql202.byethost17.com');
    define('DB_USER', 'b17_27061341');
    define('DB_PWD', 'gX3c7SJ*ng..Sa5');
    define('DB_NAME','b17_27061341_project_3');
}


?>
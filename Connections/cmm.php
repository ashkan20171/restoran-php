<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cmm = "localhost";
$database_cmm = "restoran";
$username_cmm = "root";
$password_cmm = "";
$cmm = mysql_pconnect($hostname_cmm, $username_cmm, $password_cmm) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
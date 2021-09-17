<?php require_once('Connections/cmm.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_cmm, $cmm);
$query_Recordset1 = "SELECT * FROM enteghad";
$Recordset1 = mysql_query($query_Recordset1, $cmm) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>برنامه جامع رستوران</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-color: #CFC;
}
</style>
</head>
<body>
<div class="container">
 <?php require "header.php" ?>
 <?php require "menu.php" ?>
 <?php do { ?>
   <table width="500" border="3" cellpadding="5" cellspacing="5" class="err">
     <tr>
       <td colspan="2">نظرات</td>
      </tr>
     <tr>
       <td width="34"><a href="javascript:if(confirm('آیا مطمن هستید؟')) window.location='del2.php?id=<?php echo $row_Recordset1['id']; ?>'">حذف</a></td>
       <td width="421"><h2><?php echo $row_Recordset1['enn']; ?></h2></td>
     </tr>
   </table>
   <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<div class="err">
  
  
</div>
 
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

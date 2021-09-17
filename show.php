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
$query_Recordset1 = "SELECT * FROM ghaza";
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
 <div class="content">
   <table width="500" align="right" cellpadding="5" cellspacing="5">
     <tr>
       <?php do { ?>
       <td>چلو کباب</td>
       <td><?php echo $row_Recordset1['kabab']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>چلو مرغ</td>
       <td><?php echo $row_Recordset1['morgh']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>چلو گوشت</td>
       <td><?php echo $row_Recordset1['gosht']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>چلوماهی</td>
       <td><?php echo $row_Recordset1['mahi']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>خورشت قورمه</td>
       <td><?php echo $row_Recordset1['ghorme']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>خورشت قیمه</td>
       <td><?php echo $row_Recordset1['gheyme']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>سالاد</td>
       <td><?php echo $row_Recordset1['salad']; ?></td>
       <td>ویرایش</td>
     </tr>
     <tr>
       <td>نوشابه</td>
       <td><?php echo $row_Recordset1['noshabe']; ?></td>
       <td>ویرایش</td>
       <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
     </tr>
   </table>
 </div>

</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

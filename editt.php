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
   <?php do { ?>
     <tr class="err">
       <td><h3>نام غذا</h3></td>
       <td valign="middle"><h3>تعداد</h3></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">چلو کباب</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['kabab']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">چلو مرغ</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['morgh']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">چلو گوشت</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['gosht']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">چلو ماهی</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['mahi']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">خورشت قورمه سبزی</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['ghorme']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">خورشت قیمه</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['gheyme']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">سالاد</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['salad']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">نوشابه</td>
       <td align="center" class="topmenu"><h1><?php echo $row_Recordset1['noshabe']; ?></h1></td>
     </tr>
     <tr>
       <td align="center" class="tblhead">&nbsp;</td>
       <td align="center" class="topmenu">&nbsp;</td>
     </tr>
     <tr>
       <td align="center" class="tblhead">&nbsp;</td>
       <td align="center" class="topmenu"><h1><a href="javascript:if(confirm('آیا مطمن هستید؟')) window.location='del.php?ffff=<?php echo $row_Recordset1['ffff']; ?> 
        '">حذف</a><!--ctrl+p -->
         </h1></td>
       
     </tr>
     <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
 </table>

 </div>

</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>

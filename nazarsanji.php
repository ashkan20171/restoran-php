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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO enteghad (enn) VALUES (%s)",
                       GetSQLValueString($_POST['enn'], "text"));

  mysql_select_db($database_cmm, $cmm);
  $Result1 = mysql_query($insertSQL, $cmm) or die(mysql_error());

  $insertGoTo = "menughaza.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
   <h3>انتقادات و پیشنهادات خود را برای ما ارسال کنید. </h3>
   <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
     <table align="center">
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">نظرات و پیشنهادات:</td>
         <td><textarea name="enn" cols="32"></textarea></td>
       </tr>
       <tr valign="baseline">
         <td nowrap="nowrap" align="right">&nbsp;</td>
         <td align="center"><input type="submit" class="tblhead" value="ثبت" />
          <input name="cann" type="button" onclick="window.location='menughaza.php'" class="tblhead" id="cann" value="انصراف" /></td>
       </tr>
     </table>
     <input type="hidden" name="MM_insert" value="form1" />
   </form>
   <p>&nbsp;</p>
 </div>
 
</div>
</body>
</html>
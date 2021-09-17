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
  $insertSQL = sprintf("INSERT INTO ghaza (kabab, morgh, gosht, mahi, ghorme, gheyme, salad, noshabe) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['kabab'], "text"),
                       GetSQLValueString($_POST['morgh'], "text"),
                       GetSQLValueString($_POST['gosht'], "text"),
                       GetSQLValueString($_POST['mahi'], "text"),
                       GetSQLValueString($_POST['ghorme'], "text"),
                       GetSQLValueString($_POST['gheyme'], "text"),
                       GetSQLValueString($_POST['salad'], "text"),
                       GetSQLValueString($_POST['noshabe'], "text"));

  mysql_select_db($database_cmm, $cmm);
  $Result1 = mysql_query($insertSQL, $cmm) or die(mysql_error());

  $insertGoTo ="editt.php";
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
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تعداد&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;قیمت


 <br />
   <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
    
     <table border="5" align="right" dir="rtl">
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">چلو کباب:</h2></td>
      
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="kabab" value="" size="1" />
           <input type="text" name="s" value="25000"  readonly="readonly" size="1" />
          
          
           
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">چلو مرغ:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="morgh" value="" size="1" />
           <input type="text" name="a" value="25000" readonly="readonly" size="1" />
           
            
           
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">چلو گوشت:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="gosht" value="" size="1" />
           <input type="text" name="b" value="30000" readonly="readonly" size="1" />
          
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">چلو ماهی:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="mahi" value="" size="1" />
           <input type="text" name="c" value="25000" readonly="readonly" size="1" />
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">خورشت قورمه سبزی:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="ghorme" value="" size="1" />
           <input type="text" name="d" value="20000"  readonly="readonly" size="1" />
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">خورشت قیمه:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="gheyme" value="" size="1" />
           <input type="text" name="e" value="20000" readonly="readonly" size="1" />
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">سالاد:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="salad" value="" size="1" />
           <input type="text" name="f" value="10000" readonly="readonly" size="1" />
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td align="right" nowrap="nowrap" bgcolor="#9966FF"><h2 class="err">نوشابه:</h2></td>
         <td bgcolor="#9966FF"><h2 class="err">
           <input type="text" name="noshabe" value="" size="1" />
           <input type="text" name="h" value="5000" readonly="readonly" size="1" />
         </h2></td>
       </tr>
       <tr valign="baseline">
         <td colspan="2" align="center" valign="middle" bgcolor="#9966FF"><h2>&nbsp;</h2>           <h2 class="err">
             <input type="button" name="can" id="can" onclick="window.location='menughaza.php'" value="انصراف" />           
             <input type="submit" value="ثبت" />
          </h2></td>
        </tr>
 </table>
     <h1>
       <input type="hidden" name="MM_insert" value="form1" />
     </h1>
   </form>
   <p>&nbsp;</p>
 </div>

</div>
</body>
</html>
<?php
include("dconnect.php");

session_start();
$errors = array();  //Holds submitted form error messages
$values = array();  //Holds submitted form field values


$_SESSION['value_array']= $_POST;
$values = $_SESSION['value_array'];
/**
    * value - Returns the value attached to the given
    * field, if none exists, the empty string is returned.
    */
   function value($field){
   global $values;
  global  $thevalue;
   
  
      if(array_key_exists($field,$values)){
	  //extract($values);
	  //$thevalue = $values['fname'];
	$thevalue = htmlspecialchars(stripslashes($values["$field"]));
         return $thevalue;
      }else{
         return "";
      }
   }

/**
    * setValue - Records the value typed into the given
    * form field by the user.
    */
   function setValue($field, $value){
      global $values,$field;
	  $values[$field] = $value;
   }

function setError($field, $errmsg){
		global $errors; //,$field;
            $errors[$field] = $errmsg;
      return;
   }
function error($field){
	global $errors; //$field,
      if(array_key_exists($field,$errors)){
         return "<font size=\"2\" color=\"#ff0000\">".$errors[$field]."</font>";
      }else{
         return "";
      }
   }
function usernameTaken($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT useremail FROM users WHERE useremail = '$useremail'";
      $result = mysql_query($q);
      return (mysql_numrows($result) > 0);
   }
 /**
    * usernameBanned - Returns true if the username has
    * been banned by the administrator.
    */
   function usernameBanned($username){
      if(!get_magic_quotes_gpc()){
         $username = addslashes($username);
      }
      $q = "SELECT useremail FROM users WHERE useremail = '$usereail'";
      $result = mysql_query($q);
      return (mysql_numrows($result) > 0);
   }
  
   function check_input($value)
{
// Stripslashes
if (get_magic_quotes_gpc())
  {
  $value = stripslashes($value);
  }
// Quote if not a number
if (!is_numeric($value))
  {
  $value = "'" . mysql_real_escape_string($value) . "'";
  }
return $value;
}

?>
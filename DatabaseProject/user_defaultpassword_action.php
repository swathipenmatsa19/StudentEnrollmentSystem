<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warning.
ini_set( "display_errors", 0);

// Obtain information for the record to be updated.
$userid = $_POST["userid"];
$type1 = $_POST["type1"];

$sql = "update myuser set userid = '$userid', password = '123456', type1 = '$type1', organisation = 'UCO' where userid = '$userid'";

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

  display_oracle_error_message($cursor);

  die("<i>
  <form method=\"post\" action=\"user_update?sessionid=$sessionid\">

  <input type=\"hidden\" value = \"1\" name=\"update_fail\">
  <input type=\"hidden\" value = \"$userid\" name=\"userid\">
  <input type=\"hidden\" value = \"$password\" name=\"password\">
  <input type=\"hidden\" value = \"$type1\" name=\"type1\">
  <input type=\"hidden\" value = \"$organisation\" name=\"organisation\">

  Read the error message, and then try again:
  <input type=\"submit\" value=\"Go Back\">
  </form>

  </i>
  ");
}

// Record updated.  Go back.
Header("Location:defaultpassword_success.php?sessionid=$sessionid");
?>


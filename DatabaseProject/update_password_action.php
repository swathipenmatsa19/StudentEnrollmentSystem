<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warning.
ini_set( "display_errors", 0);

// Obtain information for the record to be updated.
$clientid = $_POST["clientid"];
$password = $_POST["password"];

$sql = "update myuser set password = '$password' where userid = '$clientid'";

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  // Error handling interface.
  echo "<B>Update Failed.</B> <BR />";

  display_oracle_error_message($cursor);
}

// Record updated.  Go back.
Header("Location:password_success_user.php?sessionid=$sessionid");
?>



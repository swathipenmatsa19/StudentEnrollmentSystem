<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warnings.
ini_set( "display_errors", 0);

// Get the values of the record to be inserted.
$userid = trim($_POST["userid"]);
if ($userid == "") $userid = "NULL";

$password = $_POST["password"];
$type1 = $_POST["type1"];

$sql = "insert into myuser values ('$userid', '$password', '$type1', 'UCO')";

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  // Error handling interface.
  echo "<B>Insertion Failed.</B> <BR />";

  display_oracle_error_message($cursor);

  die("<i>
  <form method=\"post\" action=\"user_add?sessionid=$sessionid\">

  <input type=\"hidden\" value = \"$clientid\" name=\"clientid\">
  <input type=\"hidden\" value = \"$password\" name=\"password\">
  <input type=\"hidden\" value = \"$type1\" name=\"type1\">
  <input type=\"hidden\" value = \"$organisation\" name=\"organisation\">

  Read the error message, and then try again:
  <input type=\"submit\" value=\"Go Back\">
  </form>

  </i>
  ");
}


Header("Location:users.php?sessionid=$sessionid");
?>

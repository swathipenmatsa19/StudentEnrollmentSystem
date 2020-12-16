<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);


ini_set( "display_errors", 0);


$userid = $_GET["userid"];


//Form the sql string and execute it.
$sql = "delete from myuser where userid = '$userid' ";
$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];


if ($result == false){
  // Error handling interface.
  echo "<B>Deletion Failed.</B> <BR />";
   display_oracle_error_message($cursor);

  die("<i>

  <form method=\"post\" action=\"users.php?sessionid=$sessionid\">
  Read the error message, and then try again:
  <input type=\"submit\" value=\"Go Back\">
  </form>

  </i>
  ");
}

// Record deleted.  Go back.
header("Location:users_sa.php?sessionid=$sessionid");
?>


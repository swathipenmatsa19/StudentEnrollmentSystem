<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);


$q_userid = $_GET["userid"];
$sql = "select * from myuser where userid = '$q_userid'";


$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

if (!($values = oci_fetch_array ($cursor))) {
  // Record already deleted by a separate session.  Go back.
  Header("Location:users.php?sessionid=$sessionid");
}
oci_free_statement($cursor);

$userid = $values[0];
$type1 = $values[2];

echo("
  <form method=\"post\" action=\"user_delete_action_sa.php?userid=$userid&sessionid=$sessionid\">
  UserName (Read-only): <input type=\"text\" readonly value = \"$userid\" size=\"10\" maxlength=\"10\" name=\"userid\"> <br />
  Type: <input type=\"text\" disabled value = \"$type1\" size=\"20\" maxlength=\"30\" name=\"type1\">  <br />
  ");

echo("
  </select>  <input type=\"submit\" value=\"Delete\">
  </form>

  <form method=\"post\" action=\"users_sa.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Go Back\">
  </form>
  ");

?>
                                                    

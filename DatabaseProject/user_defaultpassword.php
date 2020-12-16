<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Verify where we are from, employee.php or  emp_update_action.php.
if (!isset($_POST["update_fail"])) { // from employee.php
  // Fetch the record to be updated.
  $q_userid = $_GET["userid"];
  $sql = "select userid, type1 from myuser where userid = '$q_userid'";

  $result_array = execute_sql_in_oracle ($sql);
  $result = $result_array["flag"];
  $cursor = $result_array["cursor"];

  if ($result == false) {
     display_oracle_error_message($cursor);
    die("Query Failed.");
  }
  $values = oci_fetch_array ($cursor);
  oci_free_statement($cursor);
  $userid = $values[0];
  $type1 = $values[1];
}
else { // from emp_update_action.php
  // Obtain values of the record to be updated directly.
  $userid = $_POST["userid"];
  $type1 = $_POST["type1"];
}

echo("
  <form method=\"post\" action=\"user_defaultpassword_action.php?sessionid=$sessionid\">
  User Id (Read-only): <input type=\"text\" readonly value = \"$userid\" size=\"10\" maxlength=\"10\" name=\"userid\"> <br />
  Type (Read-only): <input type=\"text\" readonly value = \"$type1\" size=\"20\" maxlength=\"30\" name=\"type1\">  <br />
  ");
echo("
  </select>  <input type=\"submit\" value=\"Update\">

  <form method=\"post\" action=\"users.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Go Back\">
  </form>
  ");
?>


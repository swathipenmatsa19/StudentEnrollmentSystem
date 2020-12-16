<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Get values for the record to be added if from emp_add_action.php
$userid = $_POST["userid"];
$password = $_POST["password"];
$type1 = $_POST["type1"];

echo("
  <form method=\"post\" action=\"user_add_action.php?sessionid=$sessionid\">
  User Id (Required, up to 10 characters): <input type=\"text\" value = \"$userid\" size=\"10\" maxlength=\"10\" name=\"userid\"> <br />
  Password (Required): <input type=\"password\" value = \"$password\" size=\"20\" maxlength=\"30\" name=\"password\">  <br />
  Type (Required): <input type=\"text\" value = \"$type1\" size=\"20\" maxlength=\"30\" name=\"type1\">  <br />
  ");
echo("
  </select>
  <input type=\"submit\" value=\"Add\">
  <input type=\"reset\" value=\"Reset to Original Value\">
  </form>

  <form method=\"post\" action=\"users.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Go Back\">
  </form>");
?>


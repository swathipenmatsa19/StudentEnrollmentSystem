<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);
echo("
  <form method=\"post\" action=\"update_password_action.php?sessionid=$sessionid\">
   UserName(Required) : <input type=\"text\" size=\"20\" maxlength=\"30\" name=\"clientid\"> </br> 
   New Password(Required) : <input type=\"password\" size=\"20\" minlength=\"1\"  maxlength=\"30\" name=\"password\"> </br>
  ");

echo("
  </select>  <input type=\"submit\" value=\"Update\">
  </form>
  ");
echo("
  <form method=\"post\" action=\"welcomepage_user.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Go Back\">
  </form>
  ");

?>

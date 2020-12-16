<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);


// Here we can generate the content of the welcome page
echo("View List of Users");
echo("<UL>
  <LI><A HREF=\"users_sa.php?sessionid=$sessionid\">Users</A></LI>
  </UL>");

echo("
  <form method=\"post\" action=\"welcomepage_studentadmin.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Go Back\">
  </form>
  ");


echo("<br />");
echo("Click <A HREF = \"update_password.php?sessionid=$sessionid\">here</A> to change password");
echo("<br />");
echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
echo("<br />");
?>


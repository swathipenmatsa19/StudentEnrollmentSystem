<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);


// Here we can generate the content of the welcome page
echo("Choose role");
echo("<UL>
  <LI><A HREF=\"welcomepage_user.php?sessionid=$sessionid\">As a User</A></LI>
  <LI><A HREF=\"welcomepage_admin_sa.php?sessionid=$sessionid\">As an Admin</A></LI>
  </UL>");

echo("<br />");
echo("<br />");
echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
?>


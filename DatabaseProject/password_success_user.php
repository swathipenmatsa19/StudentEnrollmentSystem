<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warning.
ini_set( "display_errors", 0);

echo("Password changed Successfully!!");
echo("</br>");
echo("Click <A HREF = \"welcomepage_user.php?sessionid=$sessionid\">here</A> to go to HomePage.");



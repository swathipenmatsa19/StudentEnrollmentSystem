<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

// Suppress PHP auto warning.
ini_set( "display_errors", 0);

echo("Default Password has been set successfully!!");
echo("</br>");
echo("Click <A HREF = \"users.php?sessionid=$sessionid\">here</A> to go to list of  Users Page.");

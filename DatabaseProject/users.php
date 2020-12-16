<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
$userid = $_GET["userid"];
verify_session($sessionid);


// Generate the query section
echo("
  <form method=\"post\" action=\"users.php?sessionid=$sessionid\">
  Username: <input type=\"text\" size=\"20\" maxlength=\"30\" name=\"q_uname\">
  Usertype: <input type=\"text\" size=\"20\" maxlength=\"30\" name=\"q_utype\">
  ");

echo("
  </select>
  <input type=\"submit\" value=\"Search\">
  </form>

  <form method=\"post\" action=\"welcomepage_admin.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Go Back\">
  </form>

  <form method=\"post\" action=\"user_add.php?sessionid=$sessionid\">
  <input type=\"submit\" value=\"Add A New User\">
  </form>
  ");

$q_uname = $_POST["q_uname"];
$q_utype = $_POST["q_utype"];

$whereClause = "type1 != 'admin' and organisation = 'UCO'";


if (isset($q_uname) and $q_uname != "") {
  $whereClause .= " and userid like '%$q_uname%'";
}

if (isset($q_utype) and $q_utype != "") {
  $whereClause .= " and type1 like '%$q_utype%'";
}

$sql = "select userid, type1 from myuser where $whereClause order by userid";
$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

// Display the query results
echo "<table border=1>";
echo "<th>Username</th> <th>UserType</th><th>Update</th> <th>Delete</th> <th>SetDefaultPassword</tr>";

while ($values = oci_fetch_array ($cursor)){
  $userid = $values[0];
  $type1 = $values[1];
  echo("<tr>" .
    "<td>$userid</td> <td>$type1</td>".
    " <td> <A HREF=\"user_update.php?sessionid=$sessionid&userid=$userid\">Update</A> </td> ".
    " <td> <A HREF=\"user_delete.php?sessionid=$sessionid&userid=$userid\">Delete</A> </td> ".
    " <td> <A HREF=\"user_defaultpassword.php?sessionid=$sessionid&userid=$userid\">SetDefaultPassword</A> </td> ".
    "</tr>");
}
oci_free_statement($cursor);

echo "</table>";
echo("<br />");

echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
echo("<br />");

?>




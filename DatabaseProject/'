<?
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);

$q_userid = $_GET["userid"];

$sql = "select userid, name, age, city, state, student_type, status  from myuser where userid = $q_userid";
$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

// Display the query results

echo "</br>";

echo "Home Page";
echo "</br>";
echo "</br>";

echo "</br>";
echo "My User Profile";
echo "<table border=1>";
echo "<th>MyId</th> <th>Name</th><th>Age</th> <th>City</th> <th>State</th> <th>Student_type</th><th>Status</tr>";

if ($values = oci_fetch_array ($cursor)){
  $userid = $values[0];
  $name = $values[1];
  $age = $values[2];
  $city = $values[3];
  $state = $values[4];
  $student_type = $values[5];
  $status = $values[6];
  echo("<tr>" .
    "<td>$userid</td> <td>$name</td>".
    " <td>$age </td> ".
    " <td>$city </td> ".
    " <td>$state </td> ".
    " <td>$student_type </td> ".
    " <td>$status </td> ".
    "</tr>");

}
oci_free_statement($cursor);
echo "</table>";

$sql = "select s.sectionid, c.course_no, c.course_title, s.semester, c.credit_hours, e.grade from enrolls e join section s on e.sectionid = s.sectionid join course c on c.course_no = s.course_no where userid = $q_userid";
$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

echo "</br>";
echo "</br>";
echo "My Sections Details";
echo "<table border=1>";
echo "<th>SectionId</th> <th>Course Number</th><th>Course Title</th> <th>Semester</th> <th>Number of Credits</th><th>Grade</tr>";

while ($values = oci_fetch_array ($cursor)){
  $sectionid = $values[0];
  $course_no = $values[1];
  $course_title = $values[2];
  $semester = $values[3];
  $credit_hours = $values[4];
  $grade = $values[5];
  echo("<tr>" .
    "<td>$sectionid</td> ".
    " <td>$course_no </td> ".
    " <td>$course_title </td> ".
    " <td>$semester </td> ".
    " <td>$credit_hours </td> ".
    " <td>$grade </td> ".
    "</tr>");

}
oci_free_statement($cursor);

echo "</table>";

$sql = "select s.sectionid, c.course_no, c.course_title, c.description, s.semester, c.credit_hours from  section s  join course c on c.course_no = s.course_no";
$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

echo "</br>";
echo "</br>";
echo "General Sections Details";
echo "<table border=1>";
echo "<th>SectionId</th> <th>Course Number</th><th>Course Title</th> <th>Description </th> <th>Semester</th> <th>Number of Credits</tr>";

while ($values = oci_fetch_array ($cursor)){
  $sectionid = $values[0];
  $course_no = $values[1];
  $course_title = $values[2];
  $description = $values[3];
  $semester = $values[4];
  $credit_hours = $values[5];

  echo("<tr>" .
    "<td>$sectionid</td> ".
    " <td>$course_no </td> ".
    " <td>$course_title </td> ".
    " <td>$description </td> ".
    " <td>$semester </td> ".
    " <td>$credit_hours </td> ".
    "</tr>");

}
oci_free_statement($cursor);

echo "</table>";

// Here we can generate the content of the welcome page
echo("<br />");
echo("Click <A HREF = \"update_password.php?sessionid=$sessionid\">here</A> to change password");
echo("<br />");
echo("Click <A HREF = \"logout_action.php?sessionid=$sessionid\">here</A> to Logout.");
echo("<br />");

?>


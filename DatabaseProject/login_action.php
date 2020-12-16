<?
include "utility_functions.php";

// Get the client id and password and verify them
$userid = $_POST["userid"];
$password = $_POST["password"];

$sql = "select userid, admin_flag, student_flag " .
       "from myuser " .
       "where userid='$userid'
         and password ='$password'";

$result_array = execute_sql_in_oracle ($sql);
$result = $result_array["flag"];
$cursor = $result_array["cursor"];

if ($result == false){
  display_oracle_error_message($cursor);
  die("Client Query Failed.");
}

if ($values = oci_fetch_array ($cursor)){
  oci_free_statement($cursor);
 // found the client
  $admin_flag = $values[1];
  $student_flag = $values[2];
  //create a new session for this client
  $sessionid = md5(uniqid(rand()));
  // store the link between the sessionid and the clientid
  // and when the session started in the session table

  $sql = "insert into myusersession " .
    "(sessionid, userid, sessiondate) " .
    "values ('$sessionid', '$userid', sysdate)";

  $result_array = execute_sql_in_oracle ($sql);
  $result = $result_array["flag"];
  $cursor = $result_array["cursor"];

  if ($result == false){
    display_oracle_error_message($cursor);
    die("Failed to create a new session");
  }
  else {
      if ($admin_flag == "T" && $student_flag == "F") {
    // insert OK - we have created a new session
        header("Location:welcomepage_admin.php?sessionid=$sessionid");
      }
      elseif ($student_flag == 'T' && $admin_flag == 'F') {
	header("Location:welcomepage_user.php?sessionid=$sessionid&userid=$userid");
      }
      elseif ($student_flag == 'T' && $admin_flag == 'T') {
	header("Location:welcomepage_studentadmin.php?sessionid=$sessionid&userid=$userid");
      }
  }
}
else {
  // client username not found
  die ('Login failed.  Click <A href="login.html">here</A> to go back to the login page.');
}
?>


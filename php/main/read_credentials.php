<?php
// Read credentials file
// $cred_file = "storage/credentials.json";
//
// $file_exists = file_exists($cred_file);
// print 'Extracting credentials from ' . $cred_file . '</br>';
//
// if ($file_exists){
//   print 'File Found' . '</br>';
// }else{
//   print 'File not found' . '</br>';
// }
//
// $json = json_decode(file_get_contents($cred_file), True);
//
// print 'json contains: </br>';
// var_dump($json);
//
// foreach($json as $user => $cred){
//   print $user . ' -> ' . $cred . '</br>';
//   foreach($cred as $uname => $pass){
//     print $uname . ' -> ' . $pass . '</br>';
//   }
// }

/* Function that returs users from json file */
function get_users_from_json($json_file){
  // Check that file exists
  $file_exists = file_exists($json_file);
  if ($file_exists){

    // Decode json as object
    $json = json_decode(file_get_contents($json_file));
    // Create users array
    $users = array();
    foreach ($json as $user){
      $temp_user = new USER_JSON($user->username, $user->password);
      array_push($users, $temp_user);  // push to array
    } //end foreach
    $success_msg = 'Found ' . count($users) . ' users in file: ' . $json_file;
    error_log($success_msg, 3, 'error_log.txt');
    error_log(print_r($users, true), 3, 'error_log.txt');
    return $users; // return users
  }else{
    print 'File not found' . '</br>';
    return False; // return false
  }
}


class USER_JSON{
  public $uname;
  public $pass;

  function __construct($username, $password){
    $this->uname = $username;
    $this->pass = $password;
  }
}

// Test function
get_users_from_json($cred_file);
?>

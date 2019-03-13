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

/* Class to manage users from JSON File */
class JsonUser{
  public $uname;
  public $pass;

  function __construct($username, $password){
    $this->uname = $username;
    $this->pass = $password;
  }
}

/* Function that returs users from json file */
function get_users_from_json($json_file){
  // Check that file exists
  error_log('Getting users from json file.' . PHP_EOL, 3, 'error_log.txt');
  $file_exists = file_exists($json_file);
  if ($file_exists){

    // Decode json as object
    $json = json_decode(file_get_contents($json_file));
    // Create users array
    $users = array();
    foreach ($json as $user){
      $temp_user = new JsonUser($user->username, $user->password);
      array_push($users, $temp_user);  // push to array
    } //end foreach
    $success_msg = 'Found ' . count($users) . ' users in file: ' . $json_file;
    error_log($success_msg . PHP_EOL, 3, 'error_log.txt');
    // error_log(print_r($users, true) . PHP_EOL, 3, 'error_log.txt');  //extra debug
    return $users; // return users
  }else{
    $fail_msg = 'File not found! Coudn\'t get users from file.';
    print $fail_msg . '</br>';
    error_log($fail_msg . PHP_EOL, 3, 'error_log.txt');
    return False; // return false
  }
}

// Get users from json
$cred_file = "storage/credentials.json";
$users = get_users_from_json($cred_file);

require 'main/user.php';
session_start();

/* Session management */
/* Add users found in json to session */
function add_json_users_to_session($users){
  error_log('Adding users from json file to session.' . PHP_EOL, 3, 'error_log.txt');
  $secure_users = array();
  $index = 0;
  foreach ($users as $user){
    $new_user = new SecureUser($index, $user->uname, $user->pass);
    array_push($secure_users, $new_user);
    $index++;
  }
  $success_msg = 'Added ' . count($users) . 'secure users to session.';
  error_log($success_msg . PHP_EOL, 3, 'error_log.txt');
  // error_log(print_r($secure_users, true) . PHP_EOL, 3, 'error_log.txt');  //extra debug
  $_SESSION['users'] = serialize($secure_users);
}

$secure_users = add_json_users_to_session($users);

/* Get a user from session */
function get_user_from_session($username){
  print 'Searching for username: ' . $username . '</br>';
  $session_users = unserialize($_SESSION['users']);
  foreach ($session_users as $user){
    $found = $user->get_user_from_username($username);
    if (!$found){
      // Continue looking for user
      continue;
    }
    // Found user
    print 'Found user: ' . $found->username . '</br>';
    return $found;
  }
  print 'User ' . $username . ' Not found';
}

/* Get valid user from session (by username and password) */
function get_validated_user_from_session($username, $password){
  print 'Validating username: ' . $username . '</br>';
  $session_users = unserialize($_SESSION['users']);
  foreach ($session_users as $user){
    $found = $user->get_user_from_uname_and_pass($username, $password);
    if (!$found){
      // Continue looking for user
      continue;
    }
    // Found user
    print 'Valid login credentials for: ' . $found->username . '</br>';
    $_SESSION['current_user'] = $found;
    return $found;
  }
  print 'Invalid credentials for ' . $username;
}
?>

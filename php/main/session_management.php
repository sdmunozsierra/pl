<?php
// Session management functions
session_start();
require 'main/read_credentials.php';
require 'main/user.php';

// Get users from json TODO move to main or something (maybe)
$cred_file = "storage/credentials.json";
$users = get_users_from_json($cred_file);

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
  $message = 'Searching for username: ' . $username . ' in session.';
  error_log($message . PHP_EOL, 3, 'error_log.txt');

  $session_users = unserialize($_SESSION['users']);
  foreach ($session_users as $user){
    $found = $user->get_user_from_username($username);
    if (!$found){
      // Continue looking for user
      continue;
    }
    // Found user
    $success_msg = 'Found user: ' . $found->username . ' in session.';
    error_log($success_msg . PHP_EOL, 3, 'error_log.txt');
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
    $_SESSION['current_user'] = serialize($found);
    return $found;
  }
  print 'Invalid credentials for ' . $username;
}

/* Get current user logged in */
function get_current_user_from_session(){
  $current_user = unserialize($_SESSION['current_user']);
  if (!$current_user){
    return False;
  }
  // var_dump($current_user);
  return $current_user;
}

?>

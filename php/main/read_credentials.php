<?php

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

?>

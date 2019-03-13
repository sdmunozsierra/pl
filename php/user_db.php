<?php
include 'user.php';

class UserDB{
  // Login information for various users
  public $current_user;
  public $users = array();

  function _create_users(){
    // A function that creates users for testing purposes
    // WARNING this function erases whatever was saved in the object
    $user2 = new User();
    $user2->create_user('user2', 'password');
    $this->add_user_to_db($user2);

    $user3 = new User();
    $user3->create_user('user3', 'password');
    $this->add_user_to_db($user3);

    $user4 = new User();
    $user4->create_user('larry', 'password');
    $this->add_user_to_db($user4);
  }

  function add_user_to_db($user){
    // Add a user to the database object
    if (!$this->users){
      array_push($this->users, $user);
    }
    if (in_array($user, $this->users)){
      // User already in the db
      print 'User already in db';
      return False;
    }
    array_push($this->users, $user);
    print 'Added user ' . $user->get_username() . ' to db.';
    return True;
  }

  function get_login_user($username, $password){
    foreach ($this->users as $user){
      if ($user->get_user_by_username_and_password($username, $password)){
        $this->current_user = $user;
        print 'Current user ' . $this->current_user->get_username() . ' logged in';
        return $this->current_user;
      }
    }//end foreach
    print 'Did not found user on db';
    return False;
  }

  function print_current_user(){
    print 'Current user logged in: ' . $this->current_user;
  }

  function get_current_user(){
    return $this->current_user;
  }

  function print_users_in_db(){
    print 'Users in database';
    foreach ($this->users as $user){
      print $user->get_username();
    }
  }
}

?>

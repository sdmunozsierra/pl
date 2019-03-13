<?php
// User management via json file

class SecureUser {
  // Secure User
  public $id;  // Create a unique ID for each user
  protected static $registry = array(); // registry to keep users
  public $username;
  private $password;

  function __construct($id, $username, $password){
    // Creates a user object with unique id
    $this->id = $id;  // assigns ID
    $this->check_id();  // checks valid ID
    self::$registry[] = $id;  // add ID to registry array
    $this->username = $username; // update username
    $this->password = $password; // update password
  }

  function check_id(){
    //Checks for unique id upon user creation
    if (in_array($this->id, self::$registry)){
      trigger_error('ID: ' . $this->id . ' already taken.');
    }
  }

  function get_user_from_id($id){
    // Returns a user from id
    if ($this->id == $id){
      return $this;
    }else{
      return NULL;
    }
  }

  function get_user_from_username($username){
    // Returns a user from username
    if ($this->username == $username){
      return $this;
    }else{
      return NULL;
    }
  }

  function get_user_from_uname_and_pass($username, $password){
    // Returns user if it matches username and password
    if ($username == $this->username and $password == $this->password){
      print 'Username and password are correct.';
      return $this;
    }
    return False;
  }

}


class User {
  // User Object
  private $username;
  private $password;
  public $purchased_songs = array();

  function get_username(){
    return $this->username;
  }

  function get_user_by_username_and_password($username, $password){
    // Returns user if it matches username and password
    if (self::validate_login($username, $password)){
      return self;
    }
  }

  function create_user($username, $password){
    // Creates a user
    if (empty($username) or empty($password)){
      // Empty username or password
      print 'Cannot ser username or password as null.';
      return False;
    }
    // Set username and password
    $this->username = $username;
    $this->password = $password;
    print 'Username and Password has been set.';
    return True;
  }

  function validate_login($username, $password){
    if (empty($username) or empty($password)){
      // Empty username or password
      print 'Cannot set username or password as null.';
      return False;
    }
    if ($username == $this->username and $password == $this->password){
      print 'Username and password are correct.';
      return True;
    }
  }

  function is_purchased($song){
    // Check if song is purchased
    if (in_array($song, $this->purchased_songs)){
       return True;
    }
    return False;
  }

  function add_to_purchased_songs($song){
    // Add a song to purchased
    echo 'Adding song to purchased songs...';
    if ($this->is_purchased($song)){
      echo $song->print_song_info() . 'is already purchased';
      return False;
    }
    array_push($this->purchased_songs, $song);
    echo '</br>' . $song->print_song_info() . 'added to purchases' . '</br>';
    return True;
  }

} // End User

?>

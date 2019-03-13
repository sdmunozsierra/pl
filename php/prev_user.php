<?php
// User management via php session (maybe file)

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
    // Validates correct credentials for login
    if (empty($this->username) or empty($this->password)){
      // User has not set its credentials
      print 'Error user has not set user and password.';
      return False;
    }
    if (empty($username) or empty($password)){
      // Empty username or password
      print 'Cannot ser username or password as null.';
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

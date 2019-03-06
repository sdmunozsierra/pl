<?php
// User management via php session (maybe file)

class User{
  // User Object
  private $username;
  private $password;
  public $purchased_songs = array();

  function is_purchased($song){
    // Check if song is purchased
    if (in_array($song, $this->purchased_songs)){
       echo $song->print_song_info() . 'is already purchased';
       return True;
    }
    echo '</br>' . $song->print_song_info() . 'is not purchased' . '</br>';
    return False;
  }

  function add_to_purchased_songs($song){
    // Add a song to purchased
    echo 'Adding song to purchased songs...';
    if ($this->is_purchased($song)){
      return False;
    }
    array_push($this->purchased_songs, $song);
    return True;
  }

} // End User

?>

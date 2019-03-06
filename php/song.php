<!-- Create a song object -->
<?php

class Song {
  // Song object
  private $artist;
  private $title;
  private $year;
  private $public_date;
  public $nickname;

  function set_artist($_artist){
    // Set artist
    $this->artist = $_artist;
  }

  function get_artist(){
    // Get artist
    return $this->artist;
  }

  function set_title($_song_title){
    // Set title
    $this->title = $_song_title;
  }

  function get_title(){
    // Get title
    return $this->title;
  }

  function set_year($_year){
    // Set title
    $this->year = $_year;
  }

  function get_year(){
    // Get title
    return $this->year;
  }

  function set_public_date($_pub_date){
    // Set public_date (publication date)
    $this->public_date = $_pub_date;
  }

  function get_public_date(){
    // Get public_date (publication date)
    return $this->public_date;
  }

  function create_song($_artist, $_title, $_year){
    // Create a song
    $this->artist = $_artist;
    $this->title = $_title;
    $this->year = $_year;
  }

  function print_song_info(){
    // Prints song information (debugging)
    echo $this->title . ' by ' . $this->artist;
  }

}

class Playlist {
  // Creates a playlist of songs
  public $tracks = array();
}

$song = new Song;
$song->set_artist('henry');
$song->get_artist();
?>

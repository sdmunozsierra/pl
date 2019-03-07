<!-- Create a song object -->
<?php
// TODO change name of file to MUSIC php as it contains library and songs
// maybe even playlists

class Song {
  // Song object
  public $id;  // Create a unique ID for each song
  protected static $registry = array();
  private $artist;
  private $title;
  private $year;
  private $public_date;
  public $nickname;

  function __construct($id){
    // Creates a song object with unique id
    $this->id = $id;  // assigns ID
    $this->check_id();  // checks valid ID
    self::$registry[] = $id;  // add ID to registry array
  }

  function check_id(){
    if (empty($this->id)){
      trigger_error('ID is required to create a new song.');
    }
    elseif (in_array($this->id, self::$registry)){
      trigger_error('ID: ' . $this->id . ' already taken.');
    }
  }

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

class Library{
  // Contains all songs
  private $index = 0;
  public $songs = array();

  function add_song($_artist, $_title, $_year){
    // Add a song to the library

    // Create a song
    $new_song = new Song($this->index);
    $new_song->create_song($_artist, $_title, $_year);
    $new_song->print_song_info();
    // Update Library
    array_push($this->songs, $new_song);

    print 'Added song to index count: ' . $this->index . '</br>';
    $this->index = $this->index + 1;  // Update index

  }

  function print_songs(){
    $num_songs = count($this->songs);
    print 'Found ' . $num_songs . ' in library:' . PHP_EOL;
    print $this->songs;
    foreach ($this->songs as $song){
      print $song->print_song_info() . PHP_EOL;
    }

  }

  function get_song_by_id($id){
    return $this->songs[$id];
  }

}

class ZmazonLibrary extends Library{

}

class Playlist {
  // Creates a playlist of songs
  public $tracks = array();
}

?>

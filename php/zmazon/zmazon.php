<?php
// Create songs to be used in zmazon

require('../song.php');
require('../user.php');

$user1 = new User;

$library = new Library();
// French House
$library->add_song('Daft Punk', 'Face To Face', '2003');
$library->add_song('Daft Punk', 'One More Time', '2001');
$library->add_song('Modjo', 'Lady (Hear Me Tonight)', '2001');
$library->add_song('Cassius', 'Cassius 1999', '1999');
$library->add_song('Thomas Bangalter', 'Club Soda (A1)', '2001');
$library->add_song('Ryskee', 'Holy Ghostz', '2000');
$library->add_song('Kris Menace', 'Discopolis', '2009');

$library->print_songs();  // prints songs in library

print 'Requesting song info by id 1';
$requested_song = $library->get_song_by_id(1);
$requested_song->print_song_info();

function handle_request($library, $request_id, $user){
  // Handles a request id
  $song = $library->get_song_by_id($request_id);
  $user->add_to_purchased_songs($song);
}

?>

<?php
// Create songs to be used in zmazon

require('../song.php');
require('../user.php');

// Create Songs
// French House
$daftpunk1 = new Song;
$daftpunk1->create_song('Daft Punk', 'Face To Face', '2003');

$daftpunk2 = new Song;
$daftpunk2->create_song('Daft Punk', 'One More Time', '2001');

$modjo = new Song;
$modjo->create_song('Modjo', 'Lady (Hear Me Tonight)', '2001');

$cassius = new Song;
$cassius->create_song('Cassius', 'Cassius 1999', '1999');

$club_soda = new Song;
$club_soda->create_song('Thomas Bangalter', 'Club Soda (A1)', '2001');

$ryskee = new Song;
$ryskee->create_song('Ryskee', 'Holy Ghostz', '2000');

$discopolis = new Song;
$discopolis->create_song('Kris Menace', 'Discopolis', '2009');

$user1 = new User;

?>

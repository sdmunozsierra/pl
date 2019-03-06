<?php
// Create songs to be used in zmazon

require('../song.php');

$song1 = new Song;
$song1->set_artist("Elmo");
$song1->set_title("pizza");
$song1->set_public_date("10 octodber 2012");

$daftpunk1 = new Song;
$daftpunk1->create_song('Daft Punk', 'Face To Face', '10 October 2003')
?>

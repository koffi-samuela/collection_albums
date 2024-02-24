<?php 
require_once('vendor/autoload.php');
require_once('utils/functions.php');
use App\controllers\Album ;
use App\controllers\Note;
$album_controller = new Album();
$note_controller = new Note();
$path = $_GET["path"] ?? '';
$path = filter_var($path, FILTER_SANITIZE_URL);


$route = match ($path) {
    '', '/' => $album_controller ->index(),
    'albums.details' => $album_controller->details(),
    'note.add' => $note_controller ->add(),
    'note.edit' => $note_controller ->edit(),
    default => '404'
};
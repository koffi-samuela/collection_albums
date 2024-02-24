<?php 
namespace App\controllers ;
use App\controllers\BaseController;
use App\models\Note as noteModels;
class Note extends BaseController{
    public function add(){
    $note = new noteModels();
    if (isset($_POST)&& !empty($_POST)) {
        // var_dump($_POST);
        //recuperation et nettoyage des données
        $comment_text = filter_input(INPUT_POST,'comment',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $album_id = filter_input(INPUT_GET,'album_id',FILTER_VALIDATE_INT);
        var_dump($comment_text,$album_id);
        if ($note->create($comment_text,$album_id)) {
            redirectToRoute('/');
        }
    }
        $title = 'Ajouter une nouvelle note';
        $this->render('note/add',compact('title'));
    }
    public function edit(){
        $note = new noteModels();
        $comment_id = filter_input(INPUT_GET,'comment_id',FILTER_VALIDATE_INT);
        $one_note = $note ->getOne($comment_id);
        // var_dump($one_note);
        if (isset($_POST)&& !empty($_POST)) {
            var_dump($_POST);
            $comment_text = filter_input(INPUT_POST,'comment',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            var_dump($comment_text);
            if ($note -> update($comment_text,$comment_id)) {
                redirectToRoute('/');
            }
            }
        
        $title = 'modifier une  note';
        $this->render('note/edit',compact('title','one_note'));
    }
}
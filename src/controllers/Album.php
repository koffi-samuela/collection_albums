<?php 
namespace App\controllers ;
use App\controllers\BaseController;
use App\models\Album as albumModels ;
use App\models\Note as noteModels;
 class Album extends BaseController{
    public function index(){
        $album = new albumModels();
        //récuperation des données et affichage
        $album_list = $album ->all();
        // var_dump($album_list);
        $title = 'Accueil';
        $this->render('albums/home',compact('title','album_list'));
    }
    //function pour les details 
    public function details(){
        $album = new albumModels();
        $note = new noteModels();
        $commented = true ;
        if(isset($_GET['album_id'])){
            $album_id = filter_input(INPUT_GET,'album_id',FILTER_VALIDATE_INT);
            $one_album = $album->getOne($album_id) ;
            $comments = $note -> all($album_id);
            if (empty($comments)) {
                $commented = false ;
            }
            // var_dump($comments);
            if (!empty($_POST["comment_id"])) {
                var_dump($_POST);
                $comment_id = filter_input(INPUT_POST,'comment_id',FILTER_VALIDATE_INT);
                if ($note -> delete($comment_id)) {
                    redirectToRoute('/');
            }
        }
    }
        
        $title = 'Details';
        $this->render('albums/details',compact('title','one_album','comments','commented'));
    }
 }
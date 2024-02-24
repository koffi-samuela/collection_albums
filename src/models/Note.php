<?php 
namespace App\models;
use App\models\BaseModel ;
use PDO ;
use PDOException ;
class Note extends BaseModel{
    protected int $comment_id = 0 ;
    protected string  $content = '' ;
    protected string   $created_at = '';
    protected int   $album_id = 0;
    public function create($content,$album_id){
        try {
            //ajout dans la table comments
            $sql = " INSERT INTO 
            `comments` (content, created_at , album_id)
             VALUES (:content, Now() ,:album_id )";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':content',$content,PDO::PARAM_STR);
            $stm->bindValue(":album_id" , $album_id , PDO::PARAM_INT);
            return $stm->execute();
        } catch (PDOException $th) {
            throw $th;
        }
    }
    public function all($album_id){
        try {
            //code...
            $sql="SELECT * FROM `comments`
            WHERE album_id = :album_id
            ;
            ";
            $stm=$this->db->prepare($sql);
            $stm -> bindValue(":album_id",$album_id,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $th) {
            throw $th;
        }

    }
    public function all_coments(){
        try {
            $sql="SELECT * FROM `comments`
            ;
            ";
            $stm=$this->db->query($sql);
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $th) {
            throw $th;
        }
    }
    public function getOne($comment_id){
        try {
            $sql = "SELECT
            `comments`.`comment_id`,
            `comments`.`content`,
            `comments`.`created_at`,
            `comments`.`album_id`
             FROM comments WHERE `comments`.`comment_id` = :comment_id ";
             $stm= $this->db->prepare($sql);
             $stm -> bindValue(':comment_id' , $comment_id , PDO::PARAM_INT);
             $stm-> execute();
             return $stm -> fetch();            
        } catch (PDOException $th) {
            throw $th;
        }
    }
    public function update($content,$comment_id){
        try {
            $sql = "UPDATE
            `comments`
            SET 
            `content` = :content 
            WHERE `comment_id` = :comment_id";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(":content", $content, PDO::PARAM_STR);
            $stm->bindValue(":comment_id",$comment_id,PDO::PARAM_INT);
            return $stm->execute();
        } catch (PDOException $th) {
            throw $th;
        }
    }
    public function delete($comment_id){
        try {
            //fonction suppression d'un lien         
            $sql = "DELETE
            FROM `comments`
            WHERE `comment_id`= :comment_id";
            $stm = $this->db->prepare($sql);
            $stm->bindValue(":comment_id", $comment_id, PDO::PARAM_INT);
            return $stm->execute();
        } catch (PDOException $th) {
            throw $th;
        }
    }
}

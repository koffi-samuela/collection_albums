<?php 
namespace App\models;
use App\models\BaseModel ;
use PDO ;
use PDOException ;
class Album extends BaseModel{
    protected int $album_id = 0 ;
    protected string $title = '' ;
    protected string $release_date = '' ;
    protected string $artist = '' ;
    //creation du getter de $album_id et son setter
    public function all(){
        try {
            //code...
            $sql="SELECT 
            `albums`.`album_id`,
            `albums`.`title`,
            `albums`.`release_date`,
            `albums`.`artist`
            FROM `albums`";
            $stm = $this->db->query($sql); 
            $stm->execute();
            return $stm->fetchAll();
        } catch (PDOException $th) {
            throw $th;
        }

    }
    public function getOne($album_id){
        try {
            $sql = "SELECT
            `albums`.`album_id`,
            `albums`.`title`,
            `albums`.`release_date`,
            `albums`.`artist`,
            `songs`.`song_id`,
            `songs`.`name`,
            `songs`.`duration`
            FROM albums
            JOIN songs
            ON `songs`.`album_id` = `albums`.`album_id`
            WHERE `albums`.`album_id` = :album_id ";
             $stm= $this->db->prepare($sql);
             $stm -> bindValue(':album_id' , $album_id , PDO::PARAM_INT);
             $stm-> execute();
             return $stm -> fetch();            
        } catch (PDOException $th) {
            throw $th;
        }
    }
}
// SELECT
//  `comments`.`comment_id`,
//  `comments`.`content`,
//  `comments`.`created_at`,
//  `comments`.`album_id`,
//  `albums`.`album_id`,
//  `albums`.`title`,
//  `albums`.`release_date`,
//  `albums`.`artist`,
//  songs.song_id,
//  songs.name,
//  songs.duration
//  FROM albums
//  JOIN comments
//  ON comments.album_id = albums.album_id
//   JOIN songs
//  ON songs.album_id = albums.album_id
//  WHERE `albums`.`album_id` = 3 
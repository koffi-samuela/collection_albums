<?php
namespace App\models ;
use App\models\Database ;
use PDO;

abstract class BaseModel{
    protected PDO $db ;
    //fonction consruct pur hydrader db eavec la casse database
    public function __construct(){
        $this->db = Database::db_connect();
        }
}


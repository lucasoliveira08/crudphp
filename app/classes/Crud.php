<?php

require_once('Database.php');

class Crud extends Database{


    private function setParams($stmt, $params = array()){
        foreach($params as $key => $value){
            $this->bindParam($stmt, $key, $value);
        }
    }


    private function bindParam($stmt, $key, $value){
        $stmt->bindParam($key, $value);
    }


    public function query($query, $params = array()){
        $stmt = self::prepare($query);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt->rowCount();
    }

    
    public function select($query, $params = array()){
        $stmt = self::prepare($query);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
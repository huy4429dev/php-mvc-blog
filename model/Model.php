<?php 

Class Model {

    private static $sql = "";

    public static function all($table){

        $DB = new Database();
        return $DB->all($table);    
    }
    public static function find($table, $id){

        $DB = new Database();
        return $DB->find($table,$id);    

    }

    public static function orderBy($table, $id , $order){
        Model::$sql = "SELECT * FROM $table ORDER BY $id $order "; 
        return new static();
    }

    public function take($limit){
        Model::$sql .= "LIMIT $limit";
        return new static();
    }
    
    public function get(){
        $DB = new Database();
        return $DB->query(Model::$sql);

    }
}
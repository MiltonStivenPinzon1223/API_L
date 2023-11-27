<?php

require_once "ConDB.php";

class PaymentMethodModel {

    public static function all(){
        $query = "SELECT * FROM payment_method";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $methods = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $methods;
    }

    public static function find($id){
        $query = "SELECT * FROM payment_method WHERE clo_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $method = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $method;
    }

    public static function create($data){
        $query = "INSERT INTO `payment_method`(`pame_method`) VALUES ('".$data['pame_method']."')";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("method created successfully");
        return $message;
    }

    public static function update($id,$data){
        $query = "UPDATE `methods` SET `clo_name`='".$data['clo_name']."',`clo_price`='".$data['clo_price']."',`clo_stock`='".$data['clo_stock']."',`clo_details`='".$data['clo_details']."',`cat_id`='".$data['cat_id']."' WHERE clo_id = $id";
        $statement = Connection::connection()->prepare($query);
        $statement->execute();
        $message = array("method updated successfully");
        return $message;
    }
}
?>
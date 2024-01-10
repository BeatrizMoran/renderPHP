<?php
function getUsuario($dbh, $data){
    try{
        $stmt = $dbh->prepare("SELECT * FROM usuarios where email = :email and contrasena = :passw");
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
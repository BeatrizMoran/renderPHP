<?php
function getLibros($dbh){
    try{
        $stmt = $dbh->prepare("SELECT * FROM libros");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}

function insertarLibro($dbh, $data){
    try{
        $stmt = $dbh->prepare("INSERT INTO libros (codigo, titulo, categoria, ano, retirado)
                                values (:codigo, :titulo, :categoria, :ano, :retirado)");
        $stmt->execute($data);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}


function actualizarLibro($dbh, $codLibro){
    try{
        $data = array(
            "cod" => $codLibro
        );

        $stmt = $dbh->prepare("UPDATE libros set retirado = 1 where codigo = :cod");
        $stmt->execute($data);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}


function borrarLibros($dbh){
    try{
        
        $stmt = $dbh->prepare("DELETE FROM libros");
        $stmt->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
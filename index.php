<?php

require "bd/bd.php";
require "bd/usuarios.php";
require "bd/libros.php";



function realizarAccion($accion, $dbh){
    try{
        switch($accion){
            case "login":
                $nombre = validarUsuario($dbh);
                if($nombre !== null){
                    actualizarLibros($dbh);
                    exit();
                }
                else{
                    throw new Exception("Usuario o contraseña incorrecta");
                }
                break;
            case "crearLibro":
                try{
                    validarLibro($dbh);
                    actualizarLibros($dbh);
                    exit();
                }
                catch(Exception $e){
                    echo "<p style='color:red'>" . $e->getMessage() ."</p>";
                    actualizarLibros($dbh);
                    exit();
                }
                
                break;
            case "marcar":
                marcar($dbh);
                actualizarLibros($dbh);
                exit();
                break;
            case "vaciar":
                borrarLibros($dbh);
                actualizarLibros($dbh);
                exit();
                break;
            case "cerrarSesion":
                header("Location: index.php");
                break;
        }
    }
    catch(Exception $e){
        echo "<p style='color:red'>" . $e->getMessage() ."</p>";
    }
    

}

function marcar($dbh){
    $libros = getLibros($dbh);

    $codLibro = $_GET["codLibro"];

   actualizarLibro($dbh, $codLibro);


}

function actualizarLibros($dbh){
    $libros = getLibros($dbh);
    require "libros.view.php";
}

function validarLibro($dbh){
    $libros = getLibros($dbh);


    $nuevoLibro = array(
        "codigo" => $_POST["codigo"],
        "titulo" => $_POST["titulo"],
        "categoria" => $_POST["categoria"],
        "ano" => $_POST["ano"],
        "retirado" => 0
    );

    foreach ($libros as $libro) {
        if($libro["codigo"] === $nuevoLibro["codigo"]){
            throw new Exception("ese libro ya existe");
        }
    };

    insertarLibro($dbh, $nuevoLibro);

}

function validarUsuario($dbh){
    $email = $_POST["user"];
    $passw = $_POST["passw"];

    $data = array(
        "email" => $email,
        "passw" => $passw
    );

   $usuario = getUsuario($dbh, $data);

   if($usuario){
     $nombre = $usuario[0]["nombre"];
     return $nombre;
   }

   return null;

}

if(isset($_POST["accion"]) || isset($_GET["accion"])){
    $accion = isset($_POST["accion"]) ? $_POST["accion"] : $_GET["accion"];
    realizarAccion($accion, $dbh);
}
require "login.php";
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>recu</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Lista de libros</h1>
<form action="index.php" method="post">
        <input type="text" name="codigo" placeholder="codigo" required>
        <input type="text" name="titulo" placeholder="titulo" required>
        <input type="text" name="categoria" placeholder="categoria" required>
        <input type="number" name="ano" placeholder="ano" required>
        <input type="hidden" name="accion" value="crearLibro" >
        <input type="submit" value="Añadir">
    </form>

    <table>
        <tr>
            <th>Codigo</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Año</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <?php if(count($libros) > 0){
                foreach ($libros as $libro) { ?>
                <tr>
                    <td><?=$libro["codigo"]?></td>
                    <td><?=$libro["titulo"]?></td>
                    <td><?=$libro["categoria"]?></td>
                    <td><?=$libro["ano"]?></td>
                    <td><?=$libro["retirado"]?></td>
                    <td><a href="index.php?accion=marcar&&codLibro=<?=$libro["codigo"]?>">Marcar</a></td>
                </tr>
                <?php }
            } else{ ?>
            <tr>
                <td>No hay libros</td>
            </tr>
           <?php
            } ?>
        </tr>
    </table>
    <a href="index.php?accion=vaciar">Vaciar lista</a>
    <h2><a href="index.php?accion=cerrarSesion">Cerrar sesion</a></h2>
</body>
</html>
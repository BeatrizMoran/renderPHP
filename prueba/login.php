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
    <form action="index.php" method="post">
        <input type="text" name="user" required>
        <input type="password" name="passw" required>
        <input type="hidden" name="accion" value="login">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
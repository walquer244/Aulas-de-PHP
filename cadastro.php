<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de cadastro</title>
</head>
<body>
    <h2>Digite seu nome </h2>
    <form method="post" action="">
        <label for="nome" id="nome">Digite seu nome</label><br>
        <input type="text" name="nome" required><br>
        <input type="submit" value="enviar">
    </form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aula_crud";

$conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
}
$query = $conexao -> prepare("INSERT INTO categorias(nome) VALUE(':nome')");
$query -> bindValue(":nome","$nome");
$query -> execute(); 

?>
</body>
</html>
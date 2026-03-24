<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>Digite seu Nome</h2><br>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id= "nome" required><br>
        <input type="submit" value = "enviar">
    </form>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
}
$username = "root";
$password = "";
$dbname = "aula_crud";
$servername = "localhost";

$conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$query = $conexao -> prepare("INSERT INTO categoria(nome) VALUES (:nome)");
$query -> bindValue(":nome",$nome);
$query -> execute();

?>
</body>
</html>
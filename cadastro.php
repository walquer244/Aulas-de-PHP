<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <h2>Cadastrar Nova Categoria</h2>
    <form method="post" action="select.php">
        <label for="nome_input">Digite o nome da categoria:</label><br>
        <input type="text" name="nome" id="nome_input" required><br><br>
        <input type="submit" value="Enviar">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aula_crud";

    try {
        $conexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nome = $_POST["nome"];

        // 1. Removidas as aspas de ':nome'
        // 2. Corrigido para VALUES
        $query = $conexao->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
        
        // 3. Passando a variável diretamente
        $query->bindValue(":nome", $nome);
        
        if ($query->execute()) {
            echo "<p style='color: green;'>Categoria '$nome' cadastrada com sucesso!</p>";
        }

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
</body>
</html>
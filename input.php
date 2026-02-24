<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Digite seu Nome</h2>
    <form action="" method="post">
        <?php for($i = 1; $i <= 3; $i ++){?>
        <div>
            <label for="Aluno1" <?php echo $i?>> Nome do Aluno <?php echo $i?></label>
            <input type="text" name="Aluno[]" id="Aluno1"><br></br>
            <input type="submit" value="Cadastrar">
        </div>
        <?php } ?>
    </form>
    <?php 
    $nome = $_POST["Aluno1"];
    echo $nome;


    ?>
</body>
</html>

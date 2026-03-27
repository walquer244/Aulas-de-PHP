<?php
// ==========================================
// 1. A CONEXÃO COM O BANCO (A ponte)
// ==========================================
$host = 'localhost';   // Onde o banco está rodando (geralmente localhost no XAMPP)
$banco = 'escola';     // O nome do nosso banco de dados
$usuario = 'root';     // O usuário padrão do XAMPP
$senha = '';           // A senha padrão do XAMPP (vazia)

try {
    // Aqui nós criamos a conexão usando o PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    
    // Configuramos o PDO para nos avisar caso dê algum erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ==========================================
// 2. A INSTRUÇÃO SQL (O pedido ao bibliotecário)
// ==========================================
    // Queremos o id, o nome e o curso da tabela alunos
    $sql = "SELECT id, nome, curso FROM alunos";

// ==========================================
// 3. PREPARANDO E EXECUTANDO (Ação!)
// ==========================================
    $stmt = $pdo->prepare($sql); // Prepara a consulta (mais seguro!)
    $stmt->execute();            // Vai lá no banco e busca de fato

// ==========================================
// 4. GUARDANDO OS DADOS (Trazendo os livros pra mesa)
// ==========================================
    // O fetchAll pega todas as linhas que o banco encontrou e guarda na variável $alunos
    // O PDO::FETCH_ASSOC organiza isso bonitinho pelo nome das colunas
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ==========================================
// 5. MOSTRANDO NA TELA COM HTML (Para o usuário ver)
// ==========================================
    
    // Primeiro, checamos se o banco encontrou alguém (se tem mais de 0 alunos)
    if (count($alunos) > 0) {
        echo "<h2>Lista de Alunos Matriculados:</h2>";
        echo "<ul>"; // Inicia uma lista HTML
        
        // O foreach vai passar de aluno em aluno para imprimir na tela
        foreach ($alunos as $aluno) {
            echo "<li>Matrícula: " . $aluno['id'] . " | Nome: " . $aluno['nome'] . " - Curso: " . $aluno['curso'] . "</li>";
        }
        
        echo "</ul>"; // Fecha a lista
    } else {
        // Se a tabela estiver vazia, ele cai aqui
        echo "<p>Nenhum aluno foi encontrado no sistema.</p>";
    }

} catch (PDOException $e) {
    // Se o banco estiver fora do ar ou a senha errada, o código não quebra o site inteiro.
    // Ele cai aqui no "catch" e avisa qual foi o erro de forma amigável.
    echo "Deu ruim na conexão, turma! Erro: " . $e->getMessage();
}
?>
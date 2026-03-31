<?php
// ==========================================
// 1. A CONEXÃO COM O BANCO (A ponte)
// ==========================================
$host = 'localhost';   
$banco = 'aula_crud';     // Alterado para aula_crud
$usuario = 'root';     
$senha = '';           

try {
    // Aqui nós criamos a conexão usando o PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    
    // Configuramos o PDO para nos avisar caso dê algum erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ==========================================
// 2. A INSTRUÇÃO SQL (O pedido ao bibliotecário)
// ==========================================
    // Alterado para a tabela 'categorias'
    $sql = "SELECT id, nome FROM categorias";

// ==========================================
// 3. PREPARANDO E EXECUTANDO (Ação!)
// ==========================================
    $stmt = $pdo->prepare($sql); 
    $stmt->execute();            

// ==========================================
// 4. GUARDANDO OS DADOS (Trazendo os livros pra mesa)
// ==========================================
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ==========================================
// 5. MOSTRANDO NA TELA COM HTML (Para o usuário ver)
// ==========================================
    
    if (count($categorias) > 0) {
        echo "<h2>Lista de Categorias:</h2>";
        echo "<ul>"; 
        
        foreach ($categorias as $categoria) {
            // Exibindo os dados da tabela categorias
            echo "<li>ID: " . $categoria['id'] . " | Nome: " . $categoria['nome'] . "</li>";
        }
        
        echo "</ul>"; 
    } else {
        echo "<p>Nenhuma categoria foi encontrada no sistema.</p>";
    }

} catch (PDOException $e) {
    echo "Deu ruim na conexão, turma! Erro: " . $e->getMessage();
}
?>
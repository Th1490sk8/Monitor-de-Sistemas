<?php
require_once __DIR__ . '/../config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pegando os dados que o formulário enviou
    $id     = $_POST['id_maquina'];
    $nome   = $_POST['nome_equipamento'];
    $status = $_POST['status_equipamento'];

    try {
        // A estrutura SQL que você mencionou:
        $sql = "UPDATE tbl_maquinas 
                SET nome_equipamento = :nome, 
                    status_equipamento = :status 
                WHERE id_maquina = :id";
        
        $stmt = $pdo->prepare($sql);

        // Vinculando os nomes (:nome) aos valores reais ($nome)
        $stmt->execute([
            ':nome'   => $nome,
            ':status' => $status,
            ':id'     => $id
        ]);

        // Redireciona com uma mensagem de sucesso
        header("Location: ../index.php?status=editado");
        exit();

    } catch (PDOException $e) {
        die("Erro ao atualizar os dados: " . $e->getMessage());
    }
} 
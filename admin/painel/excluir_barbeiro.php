<?php
session_start();
$include_path = __DIR__ . '/../../bd/conexao.php';

// Inclui o arquivo conexao.php
include_once($include_path);

// Verifique se o usuário está logado
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Acesse as informações da sessão
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
// Check if the barber ID is provided in the URL
if (isset($_GET['id'])) {
    $barbeiro_id = $_GET['id'];
    
    // Perform the database delete operation
    // Ensure you have a database connection established before this point
    $sql = "DELETE FROM barbeiros WHERE id = $barbeiro_id";
    
    if ($conexao->query($sql) === TRUE) {
        header("Location: barbeiros.php");
    } else {
        echo "Erro ao excluir o barbeiro: " . $conexao->error;
    }
    
    // You may redirect back to the main page after deletion or perform other actions as needed
    // ...
} else {
    echo "ID do barbeiro não fornecido.";
}

// Close the database connection if needed
$conexao->close();

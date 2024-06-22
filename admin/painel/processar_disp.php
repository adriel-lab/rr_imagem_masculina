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

if (isset($_POST['barbeiro_id']) && isset($_POST['nova_disponibilidade'])) {
    $barbeiro_id = $_POST['barbeiro_id'];
    $nova_disponibilidade = $_POST['nova_disponibilidade'];

    // Coloque aqui o código para processar a atualização da disponibilidade do barbeiro
    // Conecte-se ao banco de dados e execute a atualização
    $sql = "UPDATE barbeiros SET disponibilidade = '$nova_disponibilidade' WHERE id = $barbeiro_id";

    if ($conexao->query($sql) === TRUE) {
        // Redirecione de volta à página principal após a atualização bem-sucedida
        
        header("Location: barbeiros.php");

        exit();
    } else {
        // Em caso de erro na atualização, redirecione para uma página de erro ou outra página apropriada
        header("Location: barbeirose.php");
        exit();
    }
} else {
    // Se os dados não foram enviados corretamente, redirecione para uma página de erro ou outra página apropriada
    header("Location: barbeiroser.php");
    exit();
}

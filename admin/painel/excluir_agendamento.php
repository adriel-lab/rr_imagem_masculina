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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Recupere o ID do agendamento a ser excluído
    $appointmentId = $_GET["id"];

    // Exclua o registro do banco de dados
    $sql = "DELETE FROM appointment_list WHERE id=$appointmentId";

    if ($conexao->query($sql) === TRUE) {
        // Redirecione de volta para a página principal ou uma página de sucesso
        header("Location: agendamentos.php");
        exit();
    } else {
        echo "Erro ao excluir o agendamento: " . $conexao->error;
    }
}

// Feche a conexão
$conexao->close();
?>

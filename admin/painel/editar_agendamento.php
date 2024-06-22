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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $appointmentId = $_POST["appointmentId"];
    $fullname = $_POST["fullname"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $schedule = $_POST["schedule"];
    $status = $_POST["status"];
    $total = $_POST["total"];
    $barber = $_POST["barber"];

    // Atualize o registro no banco de dados
    $sql = "UPDATE appointment_list SET fullname='$fullname', contact='$contact', email='$email', schedule='$schedule', status='$status', total='$total', barber='$barber' WHERE id=$appointmentId";

    if ($conexao->query($sql) === TRUE) {
        // Redirecione de volta para a página principal ou uma página de sucesso
        header("Location: agendamentos.php");
        exit();
    } else {
        echo "Erro ao atualizar o agendamento: " . $conexao->error;
    }
}

// Feche a conexão
$conexao->close();
?>

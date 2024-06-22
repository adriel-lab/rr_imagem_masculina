<?php

session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["barber_id"])) {
	// Se não estiver logado, redirecionar para a página de login
	header("Location: index.php");
	exit();
}

require_once "conexao.php";

// Acesse as informações da sessão
$barber_id = $_SESSION["barber_id"];


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
        header("Location: account-booking.php");
        exit();
    } else {
        echo "Erro ao atualizar o agendamento: " . $conexao->error;
    }
}

// Feche a conexão
$conexao->close();
?>

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

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o parâmetro "status" foi enviado
    if (isset($_POST["status"])) {
  

        // Recupera o ID do agendamento a partir do formulário
        $appointmentId = $_POST["appointmentId"];
        // Recupera o novo status do agendamento a partir do formulário
        $newStatus = $_POST["status"];

        // Atualize o status no banco de dados (substitua "appointment_list" pelo nome da sua tabela)
        $sql = "UPDATE appointment_list SET status = $newStatus WHERE id = $appointmentId";

        if ($conexao->query($sql) === TRUE) {
            // Redirecione de volta para a página anterior após a atualização bem-sucedida (substitua "pagina_anterior.php" pelo URL real)
            header("Location: account-booking.php");
            exit;
        } else {
            echo "Erro ao atualizar o status: " . $conexao->error;
        }

        // Feche a conexão com o banco de dados
        $conexao->close();
    } else {
        echo "O parâmetro 'status' não foi enviado no formulário.";
    }
} else {
    echo "Este arquivo não deve ser acessado diretamente.";
}
?>



<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Acesse as informações da sessão
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o parâmetro "status" foi enviado
    if (isset($_POST["status"])) {
        // Conecte-se ao seu banco de dados aqui (substitua pelos detalhes de conexão reais)
        $include_path = __DIR__ . '/../../bd/conexao.php';

        // Inclui o arquivo conexao.php
        include_once($include_path);

        // Recupera o ID do agendamento a partir do formulário
        $appointmentId = $_POST["appointmentId"];
        // Recupera o novo status do agendamento a partir do formulário
        $newStatus = $_POST["status"];

        // Atualize o status no banco de dados (substitua "appointment_list" pelo nome da sua tabela)
        $sql = "UPDATE appointment_list SET status = $newStatus WHERE id = $appointmentId";

        if ($conexao->query($sql) === TRUE) {
            // Redirecione de volta para a página anterior após a atualização bem-sucedida (substitua "pagina_anterior.php" pelo URL real)
            header("Location: agendamentos.php");
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

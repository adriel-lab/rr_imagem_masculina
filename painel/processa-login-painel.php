<?php
// Iniciar a sessão (se já não estiver iniciada)
session_start();

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Incluir o arquivo de conexão
    require_once "conexao.php";

    // Consulta SQL para verificar as credenciais do barbeiro
    $sql = "SELECT * FROM barbeiros WHERE user = ? AND password = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o barbeiro foi encontrado
    if ($result->num_rows == 1) {
        // Barbeiro encontrado, iniciar sessão e redirecionar para a página de perfil
        $barber_data = $result->fetch_assoc();
        $_SESSION["barber_id"] = $barber_data["id"];
        $_SESSION["barbername"] = $barber_data["nome"];
        header("Location: account-profile.php");
        exit();
    } else {
        // Credenciais inválidas, exibir mensagem de erro
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }
}
?>


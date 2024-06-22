<?php
// Iniciar a sessão (se já não estiver iniciada)
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["barber_id"])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: index.php");
    exit();
}

require_once "conexao.php";

// Verificar se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $user = $_POST['user'];

    // Atualizar os dados do barbeiro no banco de dados
    $sql = "UPDATE barbeiros SET nome = ?, email = ?, telefone = ?, user = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssssi', $nome, $email, $telefone, $user, $_SESSION["barber_id"]); // Substitua $_SESSION["user_id"] pelo ID do barbeiro logado
    $stmt->execute();

    // Verificar se ocorreu um erro na consulta
    if ($stmt->errno) {
        echo "Erro na consulta: " . $stmt->error;
    } else {
        header("Location: account-profile.php");
        exit();
    }

    // Fechar a conexão
    $stmt->close();
    $conexao->close();
} else {
    // Se os dados não foram enviados via POST, redirecionar para uma página de erro
    header("Location: erro.php");
    exit();
}
?>

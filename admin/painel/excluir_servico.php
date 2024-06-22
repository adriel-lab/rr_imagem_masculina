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




// Verifique se o ID do serviço foi fornecido via GET
if (isset($_GET['id'])) {
    // Inclua o arquivo de conexão com o banco de dados
    

    // ID do serviço a ser excluído
    $serviceId = $_GET['id'];

    // SQL para excluir o serviço
    $sql = "DELETE FROM service_list WHERE id = $serviceId";

    // Executar a consulta SQL
    if ($conexao->query($sql) === TRUE) {
        // Serviço excluído com sucesso
        header("Location: servicos.php"); // Redirecionar de volta para a lista de serviços
        exit();
    } else {
        echo "Erro ao excluir o serviço: " . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    // ID do serviço não fornecido, redirecionar para a lista de serviços
    header("Location: servicos.php");
    exit();
}
?>

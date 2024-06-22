<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Verifique se o ID do serviço foi fornecido via GET
if (isset($_GET['id']) && isset($_POST['serviceName']) && isset($_POST['serviceDescription']) && isset($_POST['serviceCost']) && isset($_POST['serviceStatus'])) {
    // Inclua o arquivo de conexão com o banco de dados
    $include_path = __DIR__ . '/../../bd/conexao.php';

    // Inclui o arquivo conexao.php
    include_once($include_path);

    // ID do serviço a ser editado
    $serviceId = $_GET['id'];

    // Recupere os dados do modal
    $newName = $_POST['serviceName'];
    $newDescription = $_POST['serviceDescription'];
    $newCost = $_POST['serviceCost'];
    $newStatus = $_POST['serviceStatus'];

    // SQL para atualizar o serviço
    $sql = "UPDATE service_list SET name = ?, description = ?, cost = ?, status = ? WHERE id = ?";

    // Use prepared statements para evitar SQL injection
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdsi", $newName, $newDescription, $newCost, $newStatus, $serviceId);

    // Executar a consulta SQL
    if ($stmt->execute()) {
        // Serviço atualizado com sucesso
        $stmt->close();
        $conexao->close();
        header("Location: servicos.php"); // Redirecionar de volta para a lista de serviços
        exit();
    } else {
        echo "Erro ao atualizar o serviço: " . $stmt->error;
    }
} else {
    // ID do serviço não fornecido ou dados do formulário ausentes, redirecionar para a lista de serviços
    header("Location: servicos.php");
    exit();
}
?>

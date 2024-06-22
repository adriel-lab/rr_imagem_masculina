<?php
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecte-se ao banco de dados (substitua com suas próprias configurações)
    $include_path = __DIR__ . '/../../bd/conexao.php';

    // Inclui o arquivo conexao.php
    include_once($include_path);

    // Prepare e execute a consulta SQL para adicionar um novo serviço
    $serviceName = $_POST["newServiceName"];
    $serviceDescription = $_POST["newServiceDescription"];
    $serviceCost = $_POST["newServiceCost"];
    $serviceStatus = $_POST["newServiceStatus"];

    $sql = "INSERT INTO service_list (name, description, cost, status) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssds", $serviceName, $serviceDescription, $serviceCost, $serviceStatus);

    if ($stmt->execute()) {
        header("Location: servicos.php");
    } else {
        echo "Erro ao adicionar o serviço: " . $stmt->error;
    }

    // Feche a declaração e a conexão
    $stmt->close();
    $conexao->close();
}

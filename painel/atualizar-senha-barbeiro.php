<?php
// Iniciar a sessão (se já não estiver iniciada)
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["barber_id"])) {
	
	header("Location: index.php");
	exit();
}

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["password"])) {
        $novaSenha = $_POST["password"];

      
        // Atualizar a senha do barbeiro no banco de dados
        $idBarbeiro = $_SESSION["barber_id"]; // Defina o ID do barbeiro
        $query = "UPDATE barbeiros SET password = '$novaSenha' WHERE id = '$idBarbeiro'";
        if (mysqli_query($conexao, $query)) {
            // Redirecionar o usuário de volta para a página de perfil
            header("Location: account-profile.php");
            exit();
        } else {
            echo "Erro ao atualizar a senha. Por favor, tente novamente.";
        }

        // Fechar a conexão com o banco de dados
        mysqli_close($conexao);
    } else {
        echo "O campo de senha não foi enviado.";
    }
} else {
    header("Location: perfil.php");
    exit();
}
?>
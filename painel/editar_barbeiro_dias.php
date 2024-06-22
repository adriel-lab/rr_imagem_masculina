<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["barber_id"])) {
    // Se não estiver logado, redirecionar para a página de login
    header("Location: index.php");
    exit();
}

// Incluir o arquivo de conexão
require_once "conexao.php";

// Obter o ID do barbeiro da sessão
$barber_id = $_SESSION["barber_id"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o parâmetro 'barbeiro_id' foi enviado
    if (isset($_POST['barbeiro_id'])) {
        // Obtém o ID do barbeiro do formulário
        $barbeiro_id = $_POST['barbeiro_id'];

        // Inclua o arquivo de conexão com o banco de dados
        include_once 'conexao.php';

        // Verifica se a array 'edit_dias' está definida e não está vazia
        if (isset($_POST['edit_dias']) && !empty($_POST['edit_dias'])) {
            // Limpa os dados de entrada para evitar possíveis ataques XSS
            $dias_semana = array_map('htmlspecialchars', $_POST['edit_dias']);

            // Remove todos os dias associados ao barbeiro antes de inserir os novos
            $sql_delete = "DELETE FROM barber_days WHERE barber_id = $barbeiro_id";
            $conexao->query($sql_delete);

            // Insere os novos dias selecionados no banco de dados
            foreach ($dias_semana as $dia) {
                $sql_insert = "INSERT INTO barber_days (barber_id, day) VALUES ($barbeiro_id, '$dia')";
                $conexao->query($sql_insert);
            }
        } else {
            // Se nenhum dia foi selecionado, remova todos os dias associados ao barbeiro
            $sql_delete = "DELETE FROM barber_days WHERE barber_id = $barbeiro_id";
            $conexao->query($sql_delete);
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();

        // Redireciona o usuário para a página de sucesso
        header("Location: account-projects.php");
        exit();
    } else {
        // Se 'barbeiro_id' não foi enviado, exiba uma mensagem de erro
        echo "Erro: O ID do barbeiro não foi recebido.";
        exit();
    }
} else {
    // Se o método de requisição não for POST, redirecione o usuário para a página inicial ou exiba uma mensagem de erro
    echo "Erro: Método de requisição inválido.";
    exit();
}
?>
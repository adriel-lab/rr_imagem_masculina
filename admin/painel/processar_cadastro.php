<?php
session_start();
$include_path = __DIR__ . '/../../bd/conexao.php';

// Include the connection file
include_once($include_path);

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Access session information
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

// Retrieve data from the form
$nome = $_POST['nome'];

// Check if time slots were selected
if (isset($_POST['horarios_disponiveis']) && is_array($_POST['horarios_disponiveis'])) {
    $horarios_disponiveis = $_POST['horarios_disponiveis'];
} else {
    $horarios_disponiveis = array(); // Initialize as an empty array if no time slots are selected
}

// Insert barber data into the table
$sql = "INSERT INTO barbeiros (nome) VALUES ('$nome')";

if ($conexao->query($sql) === TRUE) {
    $barber_id = $conexao->insert_id; // Get the ID of the newly inserted barber

    // Insert time slots into the time_slots table
    foreach ($horarios_disponiveis as $time_slot) {
        $sql = "INSERT INTO time_slots (barber_id, time_slot) VALUES ('$barber_id', '$time_slot')";
        if (!$conexao->query($sql)) {
            echo "Erro ao cadastrar horário: " . $conexao->error;
        }
    }

    header("Location: barbeiros.php");
} else {
    echo "Erro ao cadastrar o barbeiro: " . $conexao->error;
}

// Close the database connection
$conexao->close();
?>

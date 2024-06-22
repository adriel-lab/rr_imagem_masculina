<?php
session_start();
$include_path = __DIR__ . '/../../bd/conexao.php';

// Include the file conexao.php
include_once($include_path);




// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Access session information
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];




// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    


    
    // Consulta SQL para excluir as linhas
    $sql = "DELETE FROM time_slots 
            WHERE day = '' 
            AND time_slot_segunda IS NULL 
            AND time_slot_terca IS NULL 
            AND time_slot_quarta IS NULL 
            AND time_slot_quinta IS NULL 
            AND time_slot_sexta IS NULL 
            AND time_slot_sabado IS NULL 
            AND time_slot_domingo IS NULL 
            AND time_slot IS NULL";
    
    // Executa a consulta
    if ($conexao->query($sql) === TRUE) {
        echo "Linhas excluídas com sucesso!";
    } else {
        echo "Erro ao excluir linhas: " . $conexao->error;
    }
    // Check if necessary data is set
    if (isset($_POST['barbeiro_id'], $_POST['edit_nome'], $_POST['diaSql'], $_POST['edit_horarios'])) {
        // Get form data
        $barbeiro_id = $_POST['barbeiro_id'];
        $nome = $_POST['edit_nome'];
        $diaSql = $_POST['diaSql'];
        $horarios = $_POST['edit_horarios']; // Array of selected time slots


        // Sanitize data (if necessary)
        $barbeiro_id = filter_var($barbeiro_id, FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_var($nome, FILTER_SANITIZE_STRING);
        $diaSql = filter_var($diaSql, FILTER_SANITIZE_STRING);
        // Assuming $horarios and $dias are already sanitized when selected in the form

        // Update barber's name
        $sql_update_nome = "UPDATE barbeiros SET nome='$nome' WHERE id=$barbeiro_id";
        if ($conexao->query($sql_update_nome) === FALSE) {
            echo "Error updating name: " . $conexao->error;
        }

        // Update barber's time slots if any time slots are selected
    
     
            // Clear existing time slots for the specified day
            $sql_clear_time_slots = "UPDATE time_slots SET $diaSql = NULL WHERE barber_id = $barbeiro_id";
            $conexao->query($sql_clear_time_slots);

            // Insert new time slots
            foreach ($horarios as $horario) {
                $sql_insert_time_slot = "INSERT INTO time_slots (barber_id, $diaSql) VALUES ($barbeiro_id, '$horario')";
                $conexao->query($sql_insert_time_slot);
            }
       



        // Close connection
        $conexao->close();

        // Redirect back to the page where the form was submitted
        header("Location: barbeiros.php");
        exit();
    } else {
        // Handle missing data error
        echo "erro no banco de dados";
        exit();
    }
} else {
    // Handle invalid request method error
    echo "Invalid request method.";
}

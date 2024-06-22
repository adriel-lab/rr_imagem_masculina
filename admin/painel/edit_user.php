<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Check if the user ID was provided via GET and form data is submitted
if (isset($_GET['id']) && isset($_POST['editFirstName']) && isset($_POST['editMiddleName']) && isset($_POST['editLastName']) && isset($_POST['editUsername']) && isset($_POST['editPassword']) && isset($_POST['editType'])) {
    // Include the database connection file
    $include_path = __DIR__ . '/../../bd/conexao.php';
    include_once($include_path);

    // User ID to be edited
    $userId = $_GET['id'];

    // Sanitize and validate form inputs (you should customize these as per your requirements)
    $newFirstName = mysqli_real_escape_string($conexao, $_POST['editFirstName']);
    $newMiddleName = mysqli_real_escape_string($conexao, $_POST['editMiddleName']);
    $newLastName = mysqli_real_escape_string($conexao, $_POST['editLastName']);
    $newUsername = mysqli_real_escape_string($conexao, $_POST['editUsername']);
    $newPassword = mysqli_real_escape_string($conexao, $_POST['editPassword']);
    $newType = mysqli_real_escape_string($conexao, $_POST['editType']);

    // SQL to update the user
    $sql = "UPDATE users SET firstname = ?, middlename = ?, lastname = ?, username = ?, password = ?, type = ? WHERE id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssi", $newFirstName, $newMiddleName, $newLastName, $newUsername, $newPassword, $newType, $userId);

    // Execute the SQL query
    if ($stmt->execute()) {
        // User updated successfully
        $stmt->close();
        $conexao->close();
        header("Location: usuarios.php"); 
        exit();
    } else {
        echo "Error updating user: " . $stmt->error;
        $stmt->close(); // Close the statement in case of an error
        $conexao->close(); // Close the connection in case of an error
    }
} else {
    // User ID not provided or form data missing, redirect to the user list page
    echo "Error: Missing or invalid data.";
    exit();
}

?>

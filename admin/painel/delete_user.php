<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Check if the user ID was provided via GET
if (isset($_GET['id'])) {
    // Include the database connection file
    $include_path = __DIR__ . '/../../bd/conexao.php';
    include_once($include_path);

    // Sanitize the user ID (you should validate and sanitize input)
    $userId = $_GET['id'];

    // SQL to delete the user
    $sql = "DELETE FROM users WHERE id = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $userId);

    // Execute the SQL query
    if ($stmt->execute()) {
        // User deleted successfully, you can redirect to a user list page or display a confirmation message
        header("Location: usuarios.php"); // Redirect to the user list page
        exit();
    } else {
        echo "Error deleting user: " . $stmt->error;
        $stmt->close(); // Close the statement in case of an error
        $conexao->close(); // Close the connection in case of an error
    }
} else {
    // User ID not provided, redirect to the user list page or handle the error as needed
    header("Location: usuarios.php"); // Redirect to the user list page
    exit();
}
?>

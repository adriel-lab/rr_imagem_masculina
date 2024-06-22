<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    $include_path = __DIR__ . '/../../bd/conexao.php';
    include_once($include_path);

    // Sanitize and validate form inputs (customize these as per your requirements)
    $newFirstName = mysqli_real_escape_string($conexao, $_POST['addFirstName']);
    $newMiddleName = mysqli_real_escape_string($conexao, $_POST['addMiddleName']);
    $newLastName = mysqli_real_escape_string($conexao, $_POST['addLastName']);
    $newUsername = mysqli_real_escape_string($conexao, $_POST['addUsername']);
    $newPassword = $_POST['addPassword']; // No password hashing

    // Additional fields - customize these as needed
    $type = $_POST['addType']; // User-selected type
    $status = $_POST['addStatus']; // User-selected status
    $lastLogin = null; // You can set this to a default value if needed

    // SQL to insert a new user with current timestamp for date_added
    $sql = "INSERT INTO users (firstname, middlename, lastname, username, password, last_login, type, status, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?, current_timestamp())";

    // Use prepared statements to prevent SQL injection
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssii", $newFirstName, $newMiddleName, $newLastName, $newUsername, $newPassword, $lastLogin, $type, $status);

    // Execute the SQL query
    if ($stmt->execute()) {
        // User added successfully, you can redirect to a user list page or display a confirmation message
        header("Location: usuarios.php"); // Redirect to the user list page
        exit();
    } else {
        echo "Error adding user: " . $stmt->error;
        $stmt->close(); // Close the statement in case of an error
        $conexao->close(); // Close the connection in case of an error
    }
} else {
    // Form data not submitted, redirect to the user list page or handle the error as needed
    header("Location: user_list.php"); // Redirect to the user list page
    exit();
}
?>

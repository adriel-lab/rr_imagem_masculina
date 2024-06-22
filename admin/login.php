<style>
        /* Custom CSS for centering and styling the button */


        .custom-btn {
            background-color: #dc3545;
            border: none;
            color: white;
            border-radius: 40px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .custom-btn:hover {
            background-color: #8d222c;
            /* Cor de fundo ao passar o mouse */
        }

        .custom-btn1 {
            background-color: #6c757d;
            border: none;
            color: white;
            border-radius: 40px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .custom-btn1:hover {
            background-color: #43494e;
            /* Cor de fundo ao passar o mouse */
        }
    </style>


<?php
session_start();
$include_path = __DIR__ . '/../bd/conexao.php';

// Inclui o arquivo conexao.php
include_once($include_path);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para verificar as credenciais do usuário
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 1";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Definir sessão de usuário
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["username"] = $row["username"];

        // Redirecionar para a página após o login
        header("Location: painel");
        exit; // Certifique-se de que o script seja encerrado após o redirecionamento
    } else {
        $error_message = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Painel para administradores</h1>
                                    </div>
                                    <form method="post" action="login.php" class="user">
                                        <?php if (isset($error_message)) { ?>
                                            <div class="text-danger mb-3"><?php echo $error_message; ?></div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" placeholder="Digite seu usuario: "
                                                required value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Digite sua senha:" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                             
                                               
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block custom-btn">
                                            Entrar
                                        </button>
                                        <hr>
                                      
                                        
                                    </form>
                                  
                                  
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

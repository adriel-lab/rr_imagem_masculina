<?php
session_start();
$include_path = __DIR__ . '/../../bd/conexao.php';

// Inclui o arquivo conexao.php
include_once($include_path);

// Verifique se o usuário está logado
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Acesse as informações da sessão
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Painel Geral</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Agendamentos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gerenciar Agendamentos</h6>
                        <a class="collapse-item" href="agendamentos.php">Listar Agendamentos</a>
                        <a class="collapse-item" href="barbeiros.php">Listar Barbeiros</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Serviços</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cadastrar Serviços</h6>
                        <a class="collapse-item" href="servicos.php">Lista de serviços</a>
                        <a class="collapse-item" href="usuarios.php">Lista de Usuarios</a>
                        <a class="collapse-item" href="config.php">Configurações</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->


            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $username; ?></h2></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <style>
                        .icon-button {
                            cursor: pointer;
                            transition: color 0.2s;
                        }

                        .icon-button:hover {
                            color: #FF0000;
                            /* Cor que desejar ao passar o mouse sobre o ícone */
                        }
                    </style>
                    <!-- Page Heading -->
                    <div class="container my-4">
                        <!-- Conteúdo do seu container aqui -->

                        <!-- Button to trigger the "Add User" modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            Adicionar novo usuario
                        </button>
                        <br>
                        <br>
                        <!-- Add User Modal -->
                        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- User creation form -->
                                        <form action="add_user.php" method="post">
                                            <div class="mb-3">
                                                <label for="addFirstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="addFirstName" name="addFirstName" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="addMiddleName" class="form-label">Middle Name</label>
                                                <input type="text" class="form-control" id="addMiddleName" name="addMiddleName">
                                            </div>

                                            <div class="mb-3">
                                                <label for="addLastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="addLastName" name="addLastName" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="addUsername" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="addUsername" name="addUsername" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="addPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="addPassword" name="addPassword" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="addType" class="form-label">Type</label>
                                                <select class="form-select" id="addType" name="addType" required>
                                                    <option value="1">Administrator</option>
                                                    <option value="2">Moderator</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="addStatus" class="form-label">Status</label>
                                                <select class="form-select" id="addStatus" name="addStatus" required>
                                                    <option value="0">Not Verified</option>
                                                    <option value="1">Verified</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Add User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <?php


                        // Consulta SQL para recuperar os dados da tabela users
                        $sql = "SELECT id, firstname, middlename, lastname, username, password, avatar, last_login, type, 
               CASE WHEN status = 0 THEN 'not verified' WHEN status = 1 THEN 'verified' ELSE 'unknown' END as status,
               date_added, date_updated
        FROM users";

                        $result = $conexao->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">';
                            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>';

                            echo "<table id='example' class='table'>
                            <thead>
                            <tr>
                <th>ID</th>
                <th>Primeiro nome</th>
                <th>Nome do meio</th>
                <th>Sobrenome</th>
                <th>Username</th>
                <th>Nivel</th>
                <th>Status</th>
                <th>Cadastrado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
            </thead>";

                            while ($row = $result->fetch_assoc()) {


                                if ($row['type'] == 1) {
                                    $row['type'] = 'Administrador';
                                } elseif ($row['type'] == 2) {
                                    $row['type'] = 'Moderador';
                                }

                                echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['middlename']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['username']}</td>
                <td>{$row['type']}</td>
                <td>{$row['status']}</td>
                <td>{$row['date_added']}</td>
                <td>{$row['date_updated']}</td>
               
                <td>
            <i class='fas fa-edit fa-sm text-primary mx-2 cursor-pointer transition icon-button' data-bs-toggle='modal' data-bs-target='#editModal{$row['id']}'>
               
            </i>
            <i class='fas fa-trash-alt fa-sm text-danger mx-2 cursor-pointer transition icon-button' data-bs-toggle='modal' data-bs-target='#deleteModal{$row['id']}'>
                
            </i>
        </td>
        
              </tr>";

                                echo "<div class='modal fade' id='editModal{$row['id']}' tabindex='-1' aria-labelledby='editModalLabel{$row['id']}' aria-hidden='true'>
              <div class='modal-dialog'>
                  <div class='modal-content'>
                      <div class='modal-header'>
                          <h5 class='modal-title' id='editModalLabel{$row['id']}'>Edit User</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                      </div>
                      <div class='modal-body'>
                          <!-- Add your edit form fields here -->
                          
                          <form action='edit_user.php?id={$row["id"]}' method='post'>
                              <input type='hidden' name='user_id' value='{$row['id']}'>
                              
                              <div class='mb-3'>
                                  <label for='editFirstName' class='form-label'>First Name</label>
                                  <input type='text' class='form-control' id='editFirstName' name='editFirstName' value='{$row['firstname']}' >
                              </div>
                              
                              <div class='mb-3'>
                                  <label for='editMiddleName' class='form-label'>Middle Name</label>
                                  <input type='text' class='form-control' id='editMiddleName' name='editMiddleName' value='{$row['middlename']}' >
                              </div>
                              
                              <div class='mb-3'>
                                  <label for='editLastName' class='form-label'>Last Name</label>
                                  <input type='text' class='form-control' id='editLastName' name='editLastName' value='{$row['lastname']}' >
                              </div>
                              
                              <div class='mb-3'>
                                  <label for='editUsername' class='form-label'>Username</label>
                                  <input type='text' class='form-control' id='editUsername' name='editUsername' value='{$row['username']}' >
                              </div>

                              <div class='mb-3'>
                              <label for='editPassword' class='form-label'>Senha</label>
                              <input type='text' class='form-control' id='editPassword' name='editPassword' value='{$row['password']}' >
                          </div>
                              
                          <div class='mb-3'>
                          <label for='editType' class='form-label'>Tipo</label>
                          <select class='form-select' id='editType' name='editType' required>
                              <option value='1' " . ($row['type'] == 1 ? 'selected' : '') . ">Administrator</option>
                              <option value='2' " . ($row['type'] == 2 ? 'selected' : '') . ">Moderator</option>
                          </select>
                      </div>
                      
                      
                              
                              <!-- Add other form fields for editing user data -->
                              
                              <button type='submit' class='btn btn-primary'>Save Changes</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>";

                                echo "<div class='modal fade' id='deleteModal{$row['id']}' tabindex='-1' aria-labelledby='deleteModalLabel{$row['id']}' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='deleteModalLabel{$row['id']}'>Delete User</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <p>Are you sure you want to delete this user?</p>
                    <!-- You can display user information here, e.g., {$row['firstname']} {$row['lastname']} -->
                </div>
                <div class='modal-footer'>
                    <a href='delete_user.php?id={$row["id"]}' class='btn btn-danger'>Delete</a>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                </div>
            </div>
        </div>
    </div>";
                            }

                            echo "</table>";
                        } else {
                            echo "Nenhum resultado encontrado.";
                        }

                        // Fechar a conexão com o banco de dados
                        $conexao->close();
                        ?>



                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables CSS e JavaScript -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Bootstrap -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"
                }
            });
        });
    </script>

</body>

</html>
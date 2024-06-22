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
                    <div class="container my-4">
                        <!-- Page Heading -->

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

                        <?php
                        // SQL para selecionar todos os registros da tabela appointment_list
                        $sql = "SELECT id, fullname, contact, email, schedule, status, total, date_created, date_updated, barber 
        FROM appointment_list 
        WHERE status <> 2";

                        $result = $conexao->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">';
                            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>';

                            echo '<table id="example" class="table">';
                            echo '<thead>';
                            echo '<tr><th>ID</th><th>Nome Completo</th><th>Contato</th><th>Email</th><th>Agendamento</th><th>Status</th><th>Total</th><th>Data de Criação</th><th>Data de Atualização</th><th>Barbeiro</th><th>Ações</th></tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["id"] . '</td>';
                                echo '<td>' . $row["fullname"] . '</td>';
                                echo '<td>' . $row["contact"] . '</td>';
                                echo '<td>' . $row["email"] . '</td>';
                                echo '<td>' . date("H:i:s d-m-Y", strtotime($row["schedule"])) . '</td>';

                                echo '<td><button class="btn ' . ($row["status"] == 1 ? 'btn-primary' : ($row["status"] == 2 ? 'btn-success' : 'btn-danger')) . '">' . ($row["status"] == 1 ? "Verificado" : ($row["status"] == 2 ? "Concluído" : "Pendente")) . '</button></td>';
                                echo '<td>' . $row["total"] . '</td>';
                                echo '<td>' . $row["date_created"] . '</td>';
                                echo '<td>' . $row["date_updated"] . '</td>';
                                echo '<td><h5><b>' . $row["barber"] . '</b></h5></td>';
                                echo '<td>';
                                echo '<div class="d-flex">';
                                echo '    <i class="fas fa-edit fa-sm text-primary mx-2 cursor-pointer transition icon-button" data-bs-toggle="modal" data-bs-target="#editModal' . $row["id"] . '" title="Editar"></i>';
                                echo '    <i class="fas fa-trash-alt fa-sm text-danger mx-2 cursor-pointer transition icon-button" data-bs-toggle="modal" data-bs-target="#deleteModal' . $row["id"] . '" title="Excluir"></i>';
                                echo '    <i class="fas fa-eye fa-sm text-info mx-2 cursor-pointer transition icon-button" data-bs-toggle="modal" data-bs-target="#viewModal' . $row["id"] . '" title="Ver"></i>';
                                echo '    <i class="fas fa-edit fa-sm text-primary mx-2 cursor-pointer transition icon-button" data-bs-toggle="modal" data-bs-target="#editStatusModal' . $row["id"] . '" title="Editar Status"></i>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';

                                // Modal de Edição
                                echo '<div class="modal fade" id="editModal' . $row["id"] . '" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
                                echo '    <div class="modal-dialog">';
                                echo '        <div class="modal-content">';
                                echo '            <div class="modal-header">';
                                echo '                <h5 class="modal-title" id="editModalLabel">Editar Agendamento</h5>';
                                echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
                                echo '                    <span aria-hidden="true">&times;</span>';
                                echo '                </button>';
                                echo '            </div>';
                                echo '            <div class="modal-body">';
                                echo '                <!-- Formulário de Edição -->';
                                echo '                <form method="post" action="editar_agendamento.php?id=' . $row["id"] . '">';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="fullname">Nome Completo</label>';
                                echo '                        <input type="text" class="form-control" id="fullname" name="fullname" value="' . $row["fullname"] . '">';
                                echo '                    </div>';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="contact">Contato</label>';
                                echo '                        <input type="text" class="form-control" id="contact" name="contact" value="' . $row["contact"] . '">';
                                echo '                    </div>';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="email">Email</label>';
                                echo '                        <input type="email" class="form-control" id="email" name="email" value="' . $row["email"] . '">';
                                echo '                    </div>';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="schedule">Agendamento</label>';
                                echo '                        <input type="text" class="form-control" id="schedule" name="schedule" value="' . $row["schedule"] . '">';
                                echo '                    </div>';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="status">Status</label>';
                                echo '                        <select class="form-control" id="status" name="status">';
                                echo '                            <option value="1" ' . ($row["status"] == 1 ? 'class="text-primary"' : '') . ' ' . ($row["status"] == 1 ? 'selected' : '') . '>Verificado</option>';
                                echo '                            <option value="0" ' . ($row["status"] == 0 ? 'class="text-danger"' : '') . ' ' . ($row["status"] == 0 ? 'selected' : '') . '>Pendente</option>';
                                echo '                            <option value="2" ' . ($row["status"] == 2 ? 'class="text-success"' : '') . ' ' . ($row["status"] == 2 ? 'selected' : '') . '>Concluído</option>';
                                echo '                        </select>';
                                echo '                    </div>';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="total">Total</label>';
                                echo '                        <input type="text" class="form-control" id="total" name="total" value="' . $row["total"] . '">';
                                echo '                    </div>';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="barber">Barbeiro</label>';
                                echo '                        <input type="text" class="form-control" id="barber" name="barber" value="' . $row["barber"] . '">';
                                echo '                    </div>';
                                echo '                    <input type="hidden" name="appointmentId" value="' . $row["id"] . '">';
                                echo '                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>';
                                echo '                </form>';
                                echo '            </div>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';



                                // Modal de Edição do Status
                                echo '<div class="modal fade" id="editStatusModal' . $row["id"] . '" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">';
                                echo '    <div class="modal-dialog">';
                                echo '        <div class="modal-content">';
                                echo '            <div class="modal-header">';
                                echo '                <h5 class="modal-title" id="editStatusModalLabel">Editar Status</h5>';
                                echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
                                echo '                    <span aria-hidden="true">&times;</span>';
                                echo '                </button>';
                                echo '            </div>';
                                echo '            <div class="modal-body">';
                                echo '                <!-- Formulário de Edição do Status -->';
                                echo '                <form method="post" action="editar_status.php?id=' . $row["id"] . '">';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="status">Status</label>';
                                echo '                        <select class="form-control" id="status' . $row["id"] . '" name="status" onchange="updateConfirmationMessage(this, confirmationText' . $row["id"] . ')">';
                                echo '                            <option value="1" ' . ($row["status"] == 1 ? 'selected' : '') . '>Verificado</option>';
                                echo '                            <option value="0" ' . ($row["status"] == 0 ? 'selected' : '') . '>Pendente</option>';
                                echo '                            <option value="2" ' . ($row["status"] == 2 ? 'selected' : '') . '>Concluído</option>';
                                echo '                        </select>';
                                echo '                    </div>';
                                echo '                    <!-- Mensagem de Confirmação Dinâmica -->';
                                echo '                    <div class="form-group">';
                                echo '                        <label for="confirmationText' . $row["id"] . '">Confirmação</label>';
                                echo '                        <p id="confirmationText' . $row["id"] . '" data-previous-status="' . $row["status"] . '">Tem certeza de que deseja mudar o status de "' . ($row["status"] == 1 ? "Verificado" : ($row["status"] == 0 ? "Pendente" : "Concluído")) . '" para "?</p>';
                                echo '                    </div>';
                                echo '                    <input type="hidden" name="appointmentId" value="' . $row["id"] . '">';
                                echo '                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>';
                                echo '                </form>';
                                echo '            </div>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';








                                //delete modal

                                echo '<div class="modal fade" id="deleteModal' . $row["id"] . '" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">';
                                echo '    <div class="modal-dialog">';
                                echo '        <div class="modal-content">';
                                echo '            <div class="modal-header">';
                                echo '                <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>';
                                echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
                                echo '                    <span aria-hidden="true">&times;</span>';
                                echo '                </button>';
                                echo '            </div>';
                                echo '            <div class="modal-body">';
                                echo '                <p>Tem certeza de que deseja excluir este agendamento?</p>';
                                echo '            </div>';
                                echo '            <div class="modal-footer">';
                                echo '                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';
                                echo '                <a href="excluir_agendamento.php?id=' . $row["id"] . '" class="btn btn-danger">Excluir</a>';
                                echo '            </div>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';

                                // Modal de Visualização
                                echo '<div class="modal fade" id="viewModal' . $row["id"] . '" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">';
                                echo '    <div class="modal-dialog">';
                                echo '        <div class="modal-content">';
                                echo '            <div class="modal-header">';
                                echo '                <h5 class="modal-title" id="viewModalLabel">Detalhes do Agendamento</h5>';
                                echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
                                echo '                    <span aria-hidden="true">&times;</span>';
                                echo '                </button>';
                                echo '            </div>';
                                echo '            <div class="modal-body">';
                                echo '                <p><strong>ID:</strong> ' . $row["id"] . '</p>';
                                echo '                <p><strong>Nome Completo:</strong> ' . $row["fullname"] . '</p>';
                                echo '                <p><strong>Contato:</strong> ' . $row["contact"] . '</p>';
                                echo '                <p><strong>Email:</strong> ' . $row["email"] . '</p>';
                                echo '                <p><strong>Agendamento:</strong> ' . $row["schedule"] . '</p>';
                                echo '                <p><strong>Status:</strong> <button class="btn ' . ($row["status"] == 1 ? 'btn-primary' : ($row["status"] == 2 ? 'btn-success' : 'btn-danger')) . '">' . ($row["status"] == 1 ? "Verificado" : ($row["status"] == 2 ? "Concluído" : "Pendente")) . '</button></p>';
                                echo '                <p><strong>Total:</strong> ' . $row["total"] . '</p>';
                                echo '                <p><strong>Data de Criação:</strong> ' . $row["date_created"] . '</p>';
                                echo '                <p><strong>Data de Atualização:</strong> ' . $row["date_updated"] . '</p>';
                                echo '                <p><strong>Barbeiro:</strong> ' . $row["barber"] . '</p>';
                                echo '            </div>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo "Nenhum registro encontrado na tabela 'appointment_list'.";
                        }

                        // Fecha a conexão
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
<script>
// Função para recarregar a página
function recarregarPagina() {
  location.reload();
}

// Define o intervalo para recarregar a página a cada 5 minutos
const intervalo =  60 * 1000; // 5 minutos em milissegundos (5 minutos * 60 segundos * 1000 milissegundos)
setInterval(recarregarPagina, intervalo);




</script>
    <script>
        // Objeto para mapear valores de status para texto correspondente
        const statusTextMap = {
            '1': 'Verificado',
            '0': 'Pendente',
            '2': 'Concluído'
        };

        // Função para atualizar a mensagem de confirmação com base na seleção de status
        function updateConfirmationMessage(selectElement, confirmationElement) {
            const previousStatus = confirmationElement.getAttribute('data-previous-status');
            const newStatus = selectElement.value;

            const previousStatusText = statusTextMap[previousStatus];
            const newStatusText = statusTextMap[newStatus];

            confirmationElement.innerText = `Tem certeza de que deseja mudar o status de "${previousStatusText}" para "${newStatusText}"?`;
            confirmationElement.setAttribute('data-previous-status', newStatus);
        }
    </script>


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
                },
                "responsive": true
            });
        });
    </script>

</body>

</html>
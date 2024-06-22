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

    <title>Dashboard - Barbeiros</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Custom CSS to style checked checkboxes */
        .form-check-input:checked+.form-check-label::before {
            background-color: #007bff;
            /* Change to your desired checked color */
        }
    </style>


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
                        <a class="collapse-item" href="confige.php">Configurações</a>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                    </div>

                    <div class="container my-4">



                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $nome = $_POST['nome'];

                            // Inserir o barbeiro na tabela
                            $sql = "INSERT INTO barbeiros (nome, disponibilidade) VALUES ('$nome', 'Disponível')";

                            if ($conexao->query($sql) === TRUE) {
                                echo "Cadastro de barbeiro realizado com sucesso!";
                            } else {
                                echo "Erro ao cadastrar o barbeiro: " . $conexao->error;
                            }
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['barbeiro_id']) && isset($_POST['nova_disponibilidade'])) {
                            $barbeiro_id = $_POST['barbeiro_id'];
                            $nova_disponibilidade = $_POST['nova_disponibilidade'];

                            // Atualize a disponibilidade na tabela
                            $sql = "UPDATE barbeiros SET disponibilidade = '$nova_disponibilidade' WHERE id = $barbeiro_id";

                            if ($conexao->query($sql) === TRUE) {
                                echo "Disponibilidade atualizada com sucesso!";
                            } else {
                                echo "Erro ao atualizar a disponibilidade: " . $conexao->error;
                            }
                        }

                        // Consulta para buscar os barbeiros
                        $sql = "SELECT id, nome, disponibilidade FROM barbeiros";
                        $result = $conexao->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">';
                            echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>';
                            echo '<table id="example" class="table">';
                            echo '<thead>';
                            echo '<tr><th>ID</th><th>Nome</th><th>Disponibilidade</th><th>Atualizar Disponibilidade</th><th>Ações</th></tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            while ($row = $result->fetch_assoc()) {
                                $barbeiro_id = $row['id'];
                                $nome = $row['nome'];
                                $disponibilidade = $row['disponibilidade'];

                                echo '<tr>';
                                echo '<td>' . $barbeiro_id . '</td>';
                                echo '<td>' . $nome . '</td>';
                                echo '<td><button class="btn ' . ($disponibilidade == "Disponível" ? 'btn-success' : 'btn-danger') . '">' . $disponibilidade . '</button></td>';
                                echo '<td>
                <form action="processar_disp.php" method="POST">
                    <input type="hidden" name="barbeiro_id" value="' . $barbeiro_id . '">
                    <select name="nova_disponibilidade">
                        <option value="Disponível">Disponível</option>
                        <option value="Indisponível">Indisponível</option>
                    </select>
                    <input type="submit" value="Atualizar">
                </form>
            </td>';
                                echo

                                '<td>
                <div class="d-flex">
                    <i class="fas fa-edit fa-sm text-primary mx-2 cursor-pointer transition icon-button" data-bs-toggle="modal" data-bs-target="#editModal' . $barbeiro_id . '" title="Editar"></i>
               <!--   <i class="fas fa-trash-alt fa-sm text-danger mx-2 cursor-pointer transition icon-button" data-bs-toggle="modal" data-bs-target="#deleteModal' . $barbeiro_id . '" title="Excluir"></i> -->
                </div>
            </td>';


                                echo '</tr>';

                                // Modal de Edição

                                echo '<div class="modal fade" id="editModal' . $barbeiro_id . '" tabindex="-1" aria-labelledby="editModalLabel' . $barbeiro_id . '" aria-hidden="true">';
                                echo '    <div class="modal-dialog">';
                                echo '        <div class="modal-content">';
                                echo '            <div class="modal-header">';
                                echo '                <h5 class="modal-title" id="editModalLabel' . $barbeiro_id . '">Editar Barbeiro</h5>';
                                echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
                                echo '                    <span aria-hidden="true">&times;</span>';
                                echo '                </button>';
                                echo '            </div>';
                                echo '            <div class="modal-body">';


                                echo '
<form method="GET">
    <div class="mb-3">
        <label for="diaSemana" class="form-label">Dia da Semana</label>
        <select class="form-select" id="diaSemana" name="diaSemana">
            <option value="">Selecione um dia</option>
            <option value="' . $barbeiro_id . '_segunda"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_segunda' ? ' selected' : '') . '>Segunda-feira</option>
            <option value="' . $barbeiro_id . '_terca"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_terca' ? ' selected' : '') . '>Terça-feira</option>
            <option value="' . $barbeiro_id . '_quarta"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_quarta' ? ' selected' : '') . '>Quarta-feira</option>
            <option value="' . $barbeiro_id . '_quinta"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_quinta' ? ' selected' : '') . '>Quinta-feira</option>
            <option value="' . $barbeiro_id . '_sexta"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_sexta' ? ' selected' : '') . '>Sexta-feira</option>
            <option value="' . $barbeiro_id . '_sabado"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_sabado' ? ' selected' : '') . '>Sábado</option>
            <option value="' . $barbeiro_id . '_domingo"' . (isset($_GET['diaSemana']) && $_GET['diaSemana'] == $barbeiro_id . '_domingo' ? ' selected' : '') . '>Domingo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>';



                                if (isset($_GET['diaSemana'])) {
                                    // Se sim, obtém o valor do parâmetro 'diaSemana'
                                    $diaSemana = $_GET['diaSemana'];

                                    // Separa o ID do barbeiro do dia da semana
                                    $parts = explode('_', $diaSemana);
                                    $idBarbeiro = $parts[0];
                                    $dia = $parts[1];

                                    $diaCompleto = ucfirst($dia); // Deixa a primeira letra em maiúscula

                                    $daysOfWeek = array("Segunda", "Terca", "Quarta", "Quinta", "Sexta", "Sabado", "Domingo");
                                    $daysWithAccent = array("Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado", "Domingo");

                                    foreach ($daysOfWeek as $index => $day) {
                                        if ($day == $diaCompleto) {
                                            $diaCompleto = $daysWithAccent[$index];
                                            break;
                                        }
                                    }

                                    $consultDay = $dia;
                                    $timeSlotField = "time_slot_$consultDay";

                                    echo "<br>";
                                    if ($idBarbeiro == $barbeiro_id) {
                                        //echo "O dia da semana selecionado é: $dia";
                                        // echo "<br>";
                                        // echo "O ID do barbeiro selecionado é: $idBarbeiro";

                                        echo '                <!-- Formulário de Edição -->';
                                        echo '                <form method="POST" action="editar_barbeiro.php?id=' . $barbeiro_id . '">';
                                        echo '                    <div class="form-group">';
                                        echo ' <label for="edit_nome' . $barbeiro_id . '">Nome do Barbeiro</label>';
                                        echo ' <input type="text" class="form-control" id="edit_nome' . $barbeiro_id . '" name="edit_nome" value="' . $nome . '">';
                                        echo ' <label for="edit_nome"></label>';
                                        echo ' <input type="hidden" class="form-control" id="diaSql" name="diaSql" value="' . $timeSlotField . '">';
                                        echo ' <label for="edit_nome"></label>';
                                        echo ' <input type="hidden" class="form-control" id="diaSel" name="diaSel" value="' . $dia . '">';
                                        echo '                    </div>';
                                        echo '                    <!-- Horários Disponíveis -->';
                                        echo '                    <div class="form-group">';
                                        echo '                        <label for="edit_horarios' . $barbeiro_id . '">Horários Disponíveis para <strong> ' . $diaCompleto  . ' </strong></label>';

                                        $allTimeSlots = array(
                                            "00:00:00", "00:30:00", "01:00:00", "01:30:00", "02:00:00", "02:30:00", "03:00:00", "03:30:00",
                                            "04:00:00", "04:30:00", "05:00:00", "05:30:00", "06:00:00", "06:30:00", "07:00:00", "07:30:00",
                                            "08:00:00", "08:30:00", "09:00:00", "09:30:00", "10:00:00", "10:30:00", "11:00:00", "11:30:00",
                                            "12:00:00", "12:30:00", "13:00:00", "13:30:00", "14:00:00", "14:30:00", "15:00:00", "15:30:00",
                                            "16:00:00", "16:30:00", "17:00:00", "17:30:00", "18:00:00", "18:30:00", "19:00:00", "19:30:00",
                                            "20:00:00", "20:30:00", "21:00:00", "21:30:00", "22:00:00", "22:30:00", "23:00:00", "23:30:00"
                                        );



                                        $sql_time_slots = "SELECT $timeSlotField, day FROM time_slots WHERE barber_id = $barbeiro_id";
                                        $result_time_slots = $conexao->query($sql_time_slots);

                                        $selectedTimeSlots = $selectedDays = array();

                                        if ($result_time_slots->num_rows > 0) {
                                            while ($row = $result_time_slots->fetch_assoc()) {
                                                $selectedTimeSlots[] = $row[$timeSlotField];
                                                $selectedDays[] = $row['day'];
                                            }
                                        }

                                        echo ' <div class="container text-center">';
                                        echo '  <div class="row align-items-start">';
                                        echo '  <div class="col">';

                                        // Primeira coluna
                                        $totalTimeSlots = count($allTimeSlots);
                                        $column1_end = ceil($totalTimeSlots / 3); // Fim da primeira coluna
                                        for ($i = 0; $i < $column1_end; $i++) {
                                            $timeSlot = $allTimeSlots[$i];
                                            $isChecked = in_array($timeSlot, $selectedTimeSlots) ? 'checked="checked"' : '';
                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" name="edit_horarios[]" value="' . $timeSlot . '" ' . $isChecked . '>';
                                            echo '<label class="form-check-label">' . $timeSlot . '</label>';
                                            echo '</div>';
                                        }

                                        echo ' </div>';
                                        echo '<div class="col">';

                                        // Segunda coluna
                                        $column2_start = $column1_end;
                                        $column2_end = ceil(2 * $totalTimeSlots / 3); // Fim da segunda coluna
                                        for ($i = $column2_start; $i < $column2_end; $i++) {
                                            $timeSlot = $allTimeSlots[$i];
                                            $isChecked = in_array($timeSlot, $selectedTimeSlots) ? 'checked="checked"' : '';
                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" name="edit_horarios[]" value="' . $timeSlot . '" ' . $isChecked . '>';
                                            echo '<label class="form-check-label">' . $timeSlot . '</label>';
                                            echo '</div>';
                                        }

                                        echo ' </div>';
                                        echo '<div class="col">';

                                        // Terceira coluna
                                        $column3_start = $column2_end;
                                        for ($i = $column3_start; $i < $totalTimeSlots; $i++) {
                                            $timeSlot = $allTimeSlots[$i];
                                            $isChecked = in_array($timeSlot, $selectedTimeSlots) ? 'checked="checked"' : '';
                                            echo '<div class="form-check">';
                                            echo '<input class="form-check-input" type="checkbox" name="edit_horarios[]" value="' . $timeSlot . '" ' . $isChecked . '>';
                                            echo '<label class="form-check-label">' . $timeSlot . '</label>';
                                            echo '</div>';
                                        }

                                        echo '  </div>';
                                        echo '</div>';
                                        echo ' </div>';


                                        echo '                    </div>';

                                        echo '                    <!-- Dias da Semana -->';
                                        echo '                    <div class="form-group">';
                                       // echo '                        <label for="edit_dias' . $barbeiro_id . '">Dias da Semana</label>';
                                      //  echo ' <label>*Ao desmarcar o dia de trabalho o barbeiro ficara indisponivel para o agendamento</label>';
                                        // Adicionei a busca pelos dias na tabela barber_days
                                       // $sql_days = "SELECT day FROM barber_days WHERE barber_id = $barbeiro_id";
                                      //  $result_days = $conexao->query($sql_days);

                                       // $selectedDays = array();

                                      //  if ($result_days->num_rows > 0) {
                                        //    while ($row = $result_days->fetch_assoc()) {
                                        //        $selectedDays[] = $row['day'];
                                       //     }
                                     //   }

                                     //   $daysOfWeek = array("Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo");
                                     //   foreach ($daysOfWeek as $day) {
                                       //     $isChecked = in_array($day, $selectedDays) ? 'checked="checked"' : '';
                                        //    echo '<div class="form-check">';
                                        //    echo '<input class="form-check-input" type="checkbox" name="edit_dias[]" value="' . $day . '" ' . $isChecked . '>';
                                         //   echo '<label class="form-check-label">' . $day . '</label>';
                                          //  echo '</div>';
                                    //    }



                                        echo '<pre>';
                                       // print_r($selectedTimeSlots);
                                        echo '</pre>';

                                        echo '                    </div>';
                                        echo '                    <input type="hidden" name="barbeiro_id" value="' . $barbeiro_id . '">';
                                        echo '                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>';
                                        echo '                </form>';
                                        echo '            </div>';
                                        echo '        </div>';
                                        echo '    </div>';
                                        echo '</div>';
                                    }
                                } else {
                                    // Se não, mostra uma mensagem padrão
                                    echo "Nenhum dia da semana selecionado.";
                                }


                                // Modal de Exclusão
                                echo '<div class="modal fade" id="deleteModal' . $barbeiro_id . '" tabindex="-1" aria-labelledby="deleteModalLabel' . $barbeiro_id . '" aria-hidden="true">';
                                echo '    <div class="modal-dialog">';
                                echo '        <div class="modal-content">';
                                echo '            <div class="modal-header">';
                                echo '                <h5 class="modal-title" id="deleteModalLabel' . $barbeiro_id . '">Confirmar Exclusão</h5>';
                                echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
                                echo '                    <span aria-hidden="true">&times;</span>';
                                echo '                </button>';
                                echo '            </div>';
                                echo '            <div class="modal-body">';
                                echo '                <p>Tem certeza de que deseja excluir este barbeiro?</p>';
                                echo '            </div>';
                                echo '            <div class="modal-footer">';
                                echo '                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';
                                echo '                <a href="excluir_barbeiro.php?id=' . $barbeiro_id . '" class="btn btn-danger">Excluir</a>';
                                echo '            </div>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';
                            }

                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo "Nenhum barbeiro cadastrado.";
                        }

                        // Feche a conexão com o banco de dados
                        $conexao->close();
                        ?>



                        <style>
                            .time-slots {
                                display: grid;
                                grid-template-columns: repeat(4, 1fr);
                                gap: 10px;
                            }

                            .form-check-label {
                                margin-left: 5px;
                            }
                        </style>



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
        // Função para enviar o formulário via AJAX
        function enviarFormulario(barbeiro_id) {
            // Captura o valor selecionado do select
            var diaSemana = document.getElementById('diaSemana_' + barbeiro_id).value;

            // Cria uma nova requisição AJAX
            var xhr = new XMLHttpRequest();

            // Configura a requisição
            xhr.open('GET', 'seu_script.php?diaSemana=' + diaSemana, true);

            // Define a função a ser chamada quando a resposta da requisição estiver pronta
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Se a requisição for bem-sucedida, você pode manipular a resposta do servidor aqui
                    console.log(xhr.responseText);
                } else {
                    // Se houver um erro na requisição, você pode lidar com ele aqui
                    console.error('Erro ao enviar requisição: ', xhr.status);
                }
            };

            // Envia a requisição
            xhr.send();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables CSS e JavaScript -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Bootstrap -->
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

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
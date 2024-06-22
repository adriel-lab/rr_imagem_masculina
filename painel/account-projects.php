<?php
// Iniciar a sessão (se já não estiver iniciada)
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

// Consulta SQL para obter os dados do barbeiro
$sql = "SELECT * FROM barbeiros WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param('i', $barber_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar se o barbeiro foi encontrado
if ($result->num_rows == 1) {
	// Extrair os dados do barbeiro
	$barber_data = $result->fetch_assoc();


	//$percent_complete = 0;
	//if (!empty($barber_data['nome'])) $percent_complete += 25;
	//if (!empty($barber_data['email'])) $percent_complete += 25;
	//if (!empty($barber_data['telefone'])) $percent_complete += 25;
	//if (!empty($barber_data['disponibilidade'])) $percent_complete += 25;

	// Exibir as informações do barbeiro

	// echo "<p><strong>Porcentagem de Conclusão do Perfil:</strong> " . $percent_complete . "%</p>";
	// Exibir as informações do barbeiro
	// echo "<h1>Perfil do Barbeiro</h1>";
	// echo "<p><strong>Nome:</strong> " . $barber_data['nome'] . "</p>";
	//echo "<p><strong>E-mail:</strong> " . $barber_data['email'] . "</p>";
	//echo "<p><strong>Telefone:</strong> " . $barber_data['telefone'] . "</p>";
	// echo "<p><strong>Disponibilidade:</strong> " . $barber_data['disponibilidade'] . "</p>";

	// Adicione aqui mais informações do barbeiro, se necessário
} else {
	// Se o barbeiro não for encontrado, exibir uma mensagem de erro
	echo "Erro: Barbeiro não encontrado.";
}

// Botão de logout
//echo '<a href="logout.php">Sair</a>';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

	<title>Horarios- RR Imagem Masculina</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="RR-Imagem-Masculina">
	<meta name="description" content="RR-Imagem-Masculina">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function(theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
			var el = document.querySelector('.theme-icon-active');
			if (el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
					const activeThemeIcon = document.querySelector('.theme-icon-active use')
					const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
					const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

					document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
						element.classList.remove('active')
					})

					btnToActive.classList.add('active')
					activeThemeIcon.setAttribute('href', svgOfActiveBtn)
				}

				window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
					if (storedTheme !== 'light' || storedTheme !== 'dark') {
						setTheme(getPreferredTheme())
					}
				})

				showActiveTheme(getPreferredTheme())

				document.querySelectorAll('[data-bs-theme-value]')
					.forEach(toggle => {
						toggle.addEventListener('click', () => {
							const theme = toggle.getAttribute('data-bs-theme-value')
							localStorage.setItem('theme', theme)
							setTheme(theme)
							showActiveTheme(theme)
						})
					})

			}
		})
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="https://i.imgur.com/ouX3Id4.png">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
	<!-- Header START -->
	<header class="header-sticky header-absolute">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-xl">
			<div class="container">
				<!-- Logo START -->
				<a class="navbar-brand me-0" href="index.php">
					<img class="light-mode-item navbar-brand-item" src="https://i.imgur.com/w1p2UoH.png" alt="logo">
					<img class="dark-mode-item navbar-brand-item" src="https://i.imgur.com/Bo0Q3qt.png" alt="logo">
				</a>
				<!-- Logo END -->

				<!-- Main navbar START -->

				<!-- Main navbar END -->

				<!-- Buttons -->
				<ul class="nav align-items-center dropdown-hover ms-sm-2">
					<!-- Dark mode option START -->
					<li class="nav-item dropdown dropdown-animation">
						<button class="btn btn-link mb-0 px-2 lh-1" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
								<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z">
									<use href="#"></use>
							</svg>
						</button>

						<ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
							<li class="mb-1">
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
									<svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
										<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z">
											<use href="#"></use>
									</svg>Light
								</button>
							</li>
							<li class="mb-1">
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
										<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
											<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z">
												<use href="#"></use>
									</svg>Dark
								</button>
							</li>
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z">
											<use href="#"></use>
									</svg>Auto
								</button>
							</li>
						</ul>
					</li>
					<!-- Dark mode option END -->

					<!-- Sign up button -->
					<li class="nav-item me-2">

					</li>
					<!-- Buy now button -->
					<li class="nav-item d-sm-block">
						<button class="btn btn-sm btn-secondary mb-0">Voltar</button>
					</li>
					<!-- Responsive navbar toggler -->

				</ul>

			</div>
		</nav>
		<!-- Logo Nav END -->
	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Content START -->
		<section class="pt-sm-7">
			<div class="container pt-3 pt-xl-5">
				<div class="row">
					<!-- Sidebar -->
					<div class="col-lg-4 col-xl-3">
						<!-- Responsive offcanvas body START -->
						<div class="offcanvas-lg offcanvas-start h-100" tabindex="-1" id="offcanvasSidebar">
							<!-- Offcanvas header -->
							<div class="offcanvas-header bg-light">
								<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Meu perfil</h5>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
							</div>
							<!-- Offcanvas body -->
							<div class="offcanvas-body p-0">
								<div class="card border p-3 w-100">
									<!-- Card header -->
									<div class="card-header text-center border-bottom">
										<!-- Avatar -->
										<div class="avatar avatar-xl position-relative mb-2">
											<img class="avatar-img rounded-circle border border-2 border-white" src="https://i.imgur.com/igf5lj8.png" alt="">
											<a href="#" class="btn btn-sm btn-round btn-dark position-absolute top-50 start-100 translate-middle mt-4 ms-n3" data-bs-toggle="tooltip" data-bs-title="Edit profile">
												<i class="bi bi-pencil-square"></i>
											</a>
										</div>
										<h6 class="mb-0"><?php echo $barber_data['nome']; ?></h6>
										<a href="#" class="text-reset text-primary-hover small"><?php echo $barber_data['email']; ?></a>
									</div>

									<!-- Card body START -->
									<div class="card-body p-0 mt-4">
										<!-- Sidebar menu item START -->
										<ul class="nav nav-pills-primary-border-start flex-column">
											<li class="nav-item">
												<a class="nav-link " href="account-profile.php"><i class="bi bi-person fa-fw me-2"></i>Meu perfil</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-booking.php"><i class="bi bi-ticket-perforated fa-fw me-2"></i>Meus Agendamentos</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#"><i class="bi bi-bell fa-fw me-2"></i>Permições</a>
											</li>
											<li class="nav-item">
												<a class="nav-link active" href="account-projects.php"><i class="bi bi-briefcase fa-fw me-2"></i>Meus Horarios</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-payment-details.php"><i class="bi bi-wallet fa-fw me-2"></i>Detalhes Financeiros</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="account-order.php"><i class="bi bi-basket fa-fw me-2"></i>Relatorio Geral</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#"><i class="bi bi-heart fa-fw me-2"></i>Wishlist</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#"><i class="bi bi-trash fa-fw me-2"></i>Deletar Perfil</a>
											</li>
											<li class="nav-item">
												<a class="nav-link text-danger" href="#"><i class="fas fa-sign-out-alt fa-fw me-2"></i>Sair</a>
											</li>
										</ul>
										<!-- Sidebar menu item END -->
									</div>
									<!-- Card body END -->
								</div>
							</div>
						</div>
					</div>

					<!-- Main content -->
					<div class="col-lg-8 col-xl-9 ps-lg-4 ps-xl-6">
						<!-- Title and offcanvas button -->
						<div class="d-flex justify-content-between align-items-center mb-5 mb-sm-6">
							<!-- Title -->
							<h1 class="h3 mb-0">Meus horarios</h1>

							<!-- Advanced filter responsive toggler START -->
							<button class="btn btn-primary d-lg-none flex-shrink-0 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
								<i class="fas fa-sliders-h"></i> Menu
							</button>
							<!-- Advanced filter responsive toggler END -->
						</div>

						<!-- Search and buttons -->
						<div class="row g-3 align-items-center mb-3">
							<!-- Search -->
							<div class="alert alert-primary w-90" role="alert">
								<var><strong>
										*Se a opção "Disponibilidade" for definida como "Indisponível", você não será visualizado para agendamentos na página inicial.</strong></var>
							</div>

							<?php



							// Verificar se o formulário foi submetido para atualizar a disponibilidade
							if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nova_disponibilidade'])) {
								$nova_disponibilidade = $_POST['nova_disponibilidade'];
								$barber_id = $_SESSION["barber_id"];

								// Atualize a disponibilidade na tabela
								$sql = "UPDATE barbeiros SET disponibilidade = ? WHERE id = ?";
								$stmt = $conexao->prepare($sql);
								$stmt->bind_param('si', $nova_disponibilidade, $barber_id);
								if ($stmt->execute()) {

									echo '<script>window.location.replace("' . $_SERVER["PHP_SELF"] . '");</script>';
									exit();
								} else {
									echo "Erro ao atualizar a disponibilidade: " . $conexao->error;
								}
							}

							// Consulta SQL para obter os dados do barbeiro


							// Formulário para atualizar disponibilidade
							//echo '<form >';
							//echo '<label for="nova_disponibilidade">Nova Disponibilidade:</label>';
							//echo '<select  class="form-select" aria-label="Default select example"> name="nova_disponibilidade" id="nova_disponibilidade">';
							//echo '<option value="Disponível">Disponível</option>';
							//echo '<option value="Indisponível">Indisponível</option>';
							//echo '</select>';
							//echo '<input type="submit" value="Atualizar Disponibilidade">';
							//echo '</form>';

							$sql = "SELECT id, nome, disponibilidade FROM barbeiros WHERE id = $barber_id";
							$result = $conexao->query($sql);
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$disponibilidade = $row['disponibilidade'];
							?>
									<div class="col-sm-6 col-xl-3 ms-auto">

								<?php
									echo '<div class="alert alert-primary" role="alert">';
									echo '<td><button class="btn ' . ($disponibilidade == "Disponível" ? 'btn-success' : 'btn-danger') . ' w-100">' . $disponibilidade . '</button></td>';
								}
							}
								?>



								<form class="mt-0 mb-0" action="" method="POST">
									<label for="nova_disponibilidade">Disponibilidade:</label>
									<select class="form-select js-choice" aria-label=".form-select-sm" name="nova_disponibilidade" id="nova_disponibilidade">>
										<option value="" disabled selected>Selecionar</option>
										<option value="Disponível">Disponível</option>
										<option value="Indisponível">Indisponível</option>
									</select>

									<input href="#" class="btn btn-primary w-100 mt-2 mb-0" type="submit" value="Atualizar">

								</form>
									</div>


									<!-- Button -->

									<label for="nova_disponibilidade">Seus dias de trabalho:</label>
									<?php
									echo '	<a href="#" class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#editModal2' . $barber_id . '" ><i class="bi bi-plus-lg me-2"></i>Itinerário Semanal</a>';
									?>
						</div>
					</div>
					

<!-- Modal -->
<div class="modal fade" id="editModal2<?php echo $barber_id; ?>" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal2Label">Itinerário Semanal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="editar_barbeiro_dias.php?id=<?php echo $barber_id; ?>">
                    <!-- Dias da Semana -->
                    <div class="form-group">
                        <label for="edit_dias<?php echo $barber_id; ?>">Dias da Semana</label>
                        <label>*Ao desmarcar o dia de trabalho o barbeiro ficará indisponível para o agendamento</label>
                        <?php
                        //Adicionei a busca pelos dias na tabela barber_days
                        $sql_days = "SELECT day FROM barber_days WHERE barber_id = $barber_id";
                        $result_days = $conexao->query($sql_days);

                        $selectedDays = array();

                        if ($result_days->num_rows > 0) {
                            while ($row = $result_days->fetch_assoc()) {
                                $selectedDays[] = $row['day'];
                            }
                        }

                        $daysOfWeek = array("Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo");
                        foreach ($daysOfWeek as $day) {
                            $isChecked = in_array($day, $selectedDays) ? 'checked="checked"' : '';
                            echo '<div class="form-check">';
                            echo '<input class="form-check-input" type="checkbox" name="edit_dias[]" value="' . $day . '" ' . $isChecked . '>';
                            echo '<label class="form-check-label">' . $day . '</label>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <input type="hidden" name="barbeiro_id" value="<?php echo $barber_id; ?>">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <!-- Se desejar, adicione mais botões de ação aqui -->
            </div>
        </div>
    </div>
</div>


					
					<!-- Table -->
					<div class="table-sm border-0">
						<table class="table align-middle p-4 mb-0 table-hover">
							<!-- Table head -->
							<thead class="thead-dark">
								<tr>

									<th scope="col" class="border-0 text-white">Dias</th>

									<th scope="col" class="border-0 text-white rounded-end">Ações</th>
								</tr>
							</thead>

							<!-- Table body START -->
							<tbody>

								<!-- Table row -->
								<tr>


									<!-- Table data -->
									<td>SEG</td>



									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'segunda\', \'' . $barber_id . '\')" data-bs-toggle="modal" ' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>

								<!-- Table row -->
								<tr>


									<!-- Table data -->
									<td>TER</td>



									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'terca\', \'' . $barber_id . '\')" data-bs-toggle="modal"' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>

								<!-- Table row -->
								<tr>


									<!-- Table data -->
									<td>QUA</td>



									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'quarta\', \'' . $barber_id . '\')" data-bs-toggle="modal"' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>

								<!-- Table row -->
								<tr>


									<!-- Table data -->
									<td>QUI</td>


									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'quinta\', \'' . $barber_id . '\')" data-bs-toggle="modal"' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>
								<!-- Table row -->
								<tr>


									<!-- Table data -->
									<td>SEX</td>


									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'sexta\', \'' . $barber_id . '\')" data-bs-toggle="modal"' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>
								<tr>


									<!-- Table data -->
									<td>SAB</td>


									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'sabado\', \'' . $barber_id . '\')" data-bs-toggle="modal"' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>
								<tr>


									<!-- Table data -->
									<td>DOM</td>


									<!-- Table data -->
									<td>
										<?php echo '<i class="bi bi-pencil-square btn btn-sm btn-dark me-1 mb-1 mb-md-0" onclick="handleEditClick(\'domingo\', \'' . $barber_id . '\')" data-bs-toggle="modal"' . $barber_id . '" title="Editar"></i>'; ?>
										<button class="btn btn-sm btn-light border me-1 mb-1 mb-md-0"><i class="bi bi-power"></i></button>
										<button class="btn btn-sm btn-danger me-1 mb-1 mb-md-0"><i class="bi bi-trash"></i></button>
									</td>
								</tr>
							</tbody>
							<!-- Table body END -->
						</table>
					</div>

				</div>
			</div>
			</div>
		</section>
		<script>
			function handleEditClick(diaSemana, id) {

				var formData = new FormData();
				formData.append('diaSemana', diaSemana);
				formData.append('id', id);

				var xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
				xhr.onload = function() {
					if (xhr.status === 200) {
						console.log(xhr.responseText);

						// Adiciona um atraso de 500 milissegundos (0.5 segundos) antes de abrir o modal
						setTimeout(function() {
							// Define o conteúdo do elemento alvo com a resposta HTML
							document.getElementById('resultado').innerHTML = xhr.responseText;

							// Aguarda um curto intervalo de tempo e, em seguida, limpa o conteúdo
							setTimeout(function() {
								// Limpa o conteúdo do elemento alvo
								document.getElementById('resultado').innerHTML = '';
							}, 0); // Tempo mínimo possível para garantir que a limpeza ocorra após a definição inicial

							// Abre o modal manualmente
							$('#editModal' + id).modal('show');
						}, 300); // Tempo em milissegundos


					}
				};
				xhr.send(formData);
			}
		</script>





		<div id="resultado"></div>

		<?php

		// Modal de Edição

		echo '<div class="modal fade" id="editModal' . $barber_id . '" tabindex="-1" aria-labelledby="editModalLabel' . $barber_id . '" aria-hidden="true">';
		echo '    <div class="modal-dialog">';
		echo '        <div class="modal-content">';
		echo '            <div class="modal-header">';
		echo '                <h5 class="modal-title" id="editModalLabel' . $barber_id . '">Editar Barbeiro</h5>';
		echo '                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">';
		echo '                    <span aria-hidden="true">&times;</span>';
		echo '                </button>';
		echo '            </div>';
		echo '            <div class="modal-body">';






		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['diaSemana']) && isset($_POST['id'])) {
				$diaSemana = $_POST['diaSemana'];
				$idBarbeiro = $_POST['id'];
				$nome = $barber_data['nome'];
				//echo $diaSemana;
				//echo $idBarbeiro;
				// Separa o ID do barbeiro do dia da semana
				$dia =  $diaSemana;



				$diaCompleto = ucfirst($dia); // Deixa a primeira letra em maiúscula

				$daysOfWeek = array("Segunda", "Terca", "Quarta", "Quinta", "Sexta", "Sabado", "Domingo");
				$daysWithAccent = array("Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado", "Domingo"); //dias que são mostrados no html

				foreach ($daysOfWeek as $index => $day) {
					if ($day == $diaCompleto) {
						$diaCompleto = $daysWithAccent[$index];
						break;
					}
				}
			}
			$consultDay = $dia;
			$timeSlotField = "time_slot_$consultDay";

			echo "<br>";
			if ($idBarbeiro == $barber_id) {
				//echo "O dia da semana selecionado é: $dia";
				// echo "<br>";
				// echo "O ID do barbeiro selecionado é: $idBarbeiro";

				echo '                <!-- Formulário de Edição -->';
				echo '                <form method="POST" action="editar_barbeiro.php?id=' . $barber_id . '">';
				echo '                    <div class="form-group">';
				echo ' <label for="edit_nome' . $barber_id . '">Nome do Barbeiro</label>';
				echo ' <input type="text" class="form-control" id="edit_nome' . $barber_id . '" name="edit_nome" value="' . $nome . '" readonly>';
				echo ' <label for="edit_nome"></label>';
				echo ' <input type="hidden" class="form-control" id="diaSql" name="diaSql" value="' . $timeSlotField . '">';
				echo ' <label for="edit_nome"></label>';
				echo ' <input type="hidden" class="form-control" id="diaSel" name="diaSel" value="' . $dia . '">';
				echo '                    </div>';
				echo '                    <!-- Horários Disponíveis -->';
				echo '                    <div class="form-group">';
				echo '                        <label for="edit_horarios' . $barber_id . '">Horários Disponíveis para <strong> ' . $diaCompleto  . ' </strong></label>';

				$allTimeSlots = array(
					"00:00:00", "00:30:00", "01:00:00", "01:30:00", "02:00:00", "02:30:00", "03:00:00", "03:30:00",
					"04:00:00", "04:30:00", "05:00:00", "05:30:00", "06:00:00", "06:30:00", "07:00:00", "07:30:00",
					"08:00:00", "08:30:00", "09:00:00", "09:30:00", "10:00:00", "10:30:00", "11:00:00", "11:30:00",
					"12:00:00", "12:30:00", "13:00:00", "13:30:00", "14:00:00", "14:30:00", "15:00:00", "15:30:00",
					"16:00:00", "16:30:00", "17:00:00", "17:30:00", "18:00:00", "18:30:00", "19:00:00", "19:30:00",
					"20:00:00", "20:30:00", "21:00:00", "21:30:00", "22:00:00", "22:30:00", "23:00:00", "23:30:00"
				);



				$sql_time_slots = "SELECT $timeSlotField, day FROM time_slots WHERE barber_id = $barber_id";
				$result_time_slots = $conexao->query($sql_time_slots);

				$selectedTimeSlots = $selectedDays = array();

				if ($result_time_slots->num_rows > 0) {
					while ($row = $result_time_slots->fetch_assoc()) {
						$selectedTimeSlots[] = $row[$timeSlotField];
						$selectedDays[] = $row['day'];
					}
				}

				echo ' <div class="container text-center">';
				echo '  <div class="row2 align-items-start">';
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
				// echo '                        <label for="edit_dias' . $barber_id . '">Dias da Semana</label>';
				//  echo ' <label>*Ao desmarcar o dia de trabalho o barbeiro ficara indisponivel para o agendamento</label>';
				// Adicionei a busca pelos dias na tabela barber_days
				// $sql_days = "SELECT day FROM barber_days WHERE barber_id = $barber_id";
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
				echo '                    <input type="hidden" name="barbeiro_id" value="' . $barber_id . '">';
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





		?>
		<!-- =======================
Content END -->


	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<br>
	<!-- =======================
Footer START -->
	<footer class="bg-dark position-relative overflow-hidden pt-6" data-bs-theme="dark">
		<figure class="position-absolute top-0 start-0 mt-n8 ms-n9">
			<svg class="fill-mode" width="775px" height="834px" viewBox="0 0 775 834" style="enable-background:new 0 0 775 834; opacity: 0.05;" xml:space="preserve">
				<path d="https://i.imgur.com/Bo0Q3qt.png"></path>
				<path d="M500.9,551.4c-43.7,31-103,15.8-165.5-0.2c-49.9-12.7-101.5-25.8-148.7-16.7c-53.3,10.5-93.2,49-121.6,118 l-0.5-0.1c15.3-37.1,33.3-64.7,55.1-84.7c19.5-17.7,41.3-28.6,66.7-33.7c47.4-9.2,99,3.9,148.9,16.6 c70.4,17.9,137.1,34.9,181.3-14.4c35.7-39.9,57.3-91.7,80.2-146.7c23.8-56.7,48.2-115.5,90.2-163.6c22.7-25.9,48.4-46.4,78.4-62.4 c33.9-18.1,72.2-30.3,117.1-37.1l0.1,0.4C695,155.3,645.2,274.5,597.1,389.7c-22.9,55-44.5,106.8-80.4,146.8 C512.3,542.4,506.6,547.3,500.9,551.4z"></path>
				<path d="M521.3,536.4c-21.9,15.5-48.4,23.4-80.8,23.8c-31.2,0.5-65.1-5.8-97.9-11.9c-49.3-9.2-100.2-18.7-145.7-6.5 c-51.1,13.7-88.9,53.7-116,122.6l-0.6-0.2c60.5-154.1,163.3-135,262.6-116.5c68.1,12.7,132.6,24.6,183.6-15.8 c48.1-38.2,71.1-100.6,95.6-166.5c20.3-55,41.4-111.6,78.3-158.1c20-25.1,42.7-44.9,69.2-60.5c30.1-17.5,64.2-29.1,104.3-35.4 l0.2,0.6c-167.2,26.3-210,141.9-251.4,253.5C598.3,431.5,575,493.8,527,532.2C525.1,533.8,523.2,535.1,521.3,536.4z"></path>
				<path d="M548.9,520.3c-4,2.9-8.2,5.6-12.6,8c-56.6,31.5-120.9,23.8-183,16.6c-51.7-6-100.4-11.8-144.6,3.2 c-49.9,16.9-85.5,57.7-111.3,128.2l-0.6-0.2c13.7-37.3,30.1-66,49.9-87.8c17.8-19.4,37.9-32.8,61.8-40.9 c44.3-15,93.1-9.3,144.9-3.2c62.1,7.2,126.3,14.8,182.8-16.6c59.6-33.2,82-104.7,105.9-180.4c17.1-54.3,34.7-110.5,67.2-156.6 c36.7-52,87.8-82.8,155.7-94l0.2,0.6c-151.9,25-187.8,139.3-222.3,250C620.4,417.6,599.4,484.5,548.9,520.3z"></path>
				<path d="M573.5,509.5c-8.2,5.8-17.4,10.7-27.7,14.6c-59.3,22-119.1,18.8-176.8,15.8c-53.2-2.8-103.3-5.3-147.1,12.5 C172.6,572.3,138.1,615.5,113,688l-0.5-0.1c25.1-72.7,59.6-115.9,108.9-136c44-18,94.2-15.3,147.6-12.6 c57.7,3,117.4,6.1,176.6-15.9c70.7-26.2,91.1-106.3,112.8-191.4c13.9-54.5,28.3-111,56.7-156.9C747,123.2,793,92.6,855.6,82l0,0.7 C716.3,106.5,687,221.4,658.9,332.2C640.4,405,622.6,474.4,573.5,509.5z"></path>
				<path d="M595.2,502.3c-11.3,8-24.6,14-40,17.4c-56.8,12.7-112,12.7-160.5,12.9c-60.2,0.1-112,0.2-157,21.1 c-49.5,23-84,69.3-108.5,146l-0.6-0.2c24.3-76.7,58.9-123.1,108.6-146.3c45.1-21.1,97.2-21.1,157.4-21.2 c48.6,0,103.6-0.1,160.5-12.9c81.6-18.3,99-106.7,117.4-200.6c10.7-55,22-112,46.6-158.2C747,108,788.6,77.5,846.5,67.2l0.1,0.8 C718,91.2,695.2,206.9,673.2,318.9C658.3,394.9,643.8,467.8,595.2,502.3z"></path>
				<path d="M615.3,497.4c-13.7,9.7-30.2,16-50.8,18c-44.4,4.6-86.5,5.8-123.6,6.8c-71.2,2-132.8,3.7-182,27.7 C206,575.6,169.8,627,145,711.3l-0.8-0.1c13-44.6,29-79.3,48.6-106.3c18.1-24.9,39.5-43.1,65.6-55.7 c49.5-24.1,110.9-25.8,182.4-27.7c37.1-1,79.3-2.2,123.5-6.7c92.6-9.4,106.2-106.5,120.5-209.2c7.8-55.9,15.9-113.6,37-160 c23.8-52.7,61.6-83.1,115.3-93.4l0.3,0.7c-53.4,10.1-91,40.4-114.6,92.9c-21.1,46.4-29.2,104.1-36.8,159.9 C674.6,386,663.8,463,615.3,497.4z"></path>
				<path d="M634.4,494c-15.5,11-35.2,17.2-60.4,17.3c-12.3,0.1-24.5,0.1-36.1,0.1c-103.7,0-185.5-0.1-246.4,26.4 c-63.5,27.7-103.7,85-130.5,185.5l-0.8-0.1c13.9-52.5,31.3-92.6,53.2-122.9c20.7-28.8,46.2-49.4,77.8-63.2 c61-26.6,142.9-26.4,246.6-26.4c11.7,0.1,23.8,0,36.1-0.1c103.8-0.2,112.9-105.6,122.5-217.2c4.7-56.9,9.9-115.5,27.5-162.4 c20-53.1,54.1-83.7,104.1-93.7l0.1,0.8c-49.5,9.8-83.5,40.3-103.3,93.1c-17.6,46.9-22.7,105.4-27.6,162 C690.1,378.2,682.9,459.6,634.4,494z"></path>
				<path d="M652.7,491.8c-17.9,12.7-40.7,17.7-69.2,15.4C328,486.2,228.3,517.5,177.2,735.2l-0.9-0.3 c25.9-110.7,64-171.6,127-204c66.6-34.2,160.2-34.6,280.3-24.7c32.2,2.6,56.9-4.1,75.4-20.5c42.1-37.4,45.1-118.6,48-204.7 c4-116.5,8.1-236.8,112.1-258.6l0.1,0.8C715.9,44.8,711.8,164.8,707.8,280.9c-3.1,86.3-5.8,167.7-48.3,205.2 C657.3,488.3,655,490.1,652.7,491.8z"></path>
				<path d="M670.6,490.3c-19.3,13.7-44.8,17.9-77.7,12.7c-138.5-21.4-227.1-13-287.3,27 c-55.4,36.8-89.1,101.7-112.4,216.9l-0.9-0.3C215.8,631,249.6,566,305.1,528.9c60.3-40.1,149.1-48.6,288.1-27.3 c35.9,5.5,63,0,82.6-16.9c43.2-37.5,42.2-124.3,40.9-216.1C714.9,151,713,28.8,809.9,7.7l0.1,0.8c-96,21.1-94.3,142.7-92.7,260.6 c1.3,92.1,2.4,179-41.1,216.7C674.3,487.4,672.6,488.9,670.6,490.3z"></path>
			</svg>
		</figure>

		<!-- SVG decoration -->
		<div class="position-absolute top-0 end-0 mt-n3 me-n4">
			<img src="../assets/images/elements/decoration-pattern-2.svg" style="opacity:0.05;" alt="">
		</div>
		<div class="container position-relative mt-sm-5">

			<!-- CTA -->


			<!-- Divider -->


			<!-- Footer Widgets -->
			<div class="row g-4 justify-content-between">

				<!-- Widget 1 START -->
				<div class="col-lg-8 col-xl-7">
					<div class="row g-4">
						<!-- Link block -->
						<div class="col-6 col-md-3">

						</div>

						<!-- Link block -->


						<!-- Link block -->

					</div>
					<h6 class="mb-2 mb-md-4">Formas de pagamento aceitas:</h6>
					<li class="list-inline-item"> <a href="#"><img src="../assets/images/elements/paypal.svg" class="h-30px" alt=""></a></li>
					<li class="list-inline-item"> <a href="#"><img src="../assets/images/elements/visa.svg" class="h-30px" alt=""></a></li>
					<li class="list-inline-item"> <a href="#"><img src="../assets/images/elements/mastercard.svg" class="h-30px" alt=""></a></li>
					<li class="list-inline-item"> <a href="#"><img src="../assets/images/elements/expresscard.svg" class="h-30px" alt=""></a></li>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->
				<div class="col-lg-3">
					<h6 class="mb-2 mb-md-4">Disponivel em:</h6>
					<div class="row g-2 mb-4 mb-sm-5">
						<!-- Google play store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="https://i.imgur.com/OeS73DS.png" alt=""> </a>
						</div>
						<!-- App store button -->
						<div class="col-6 col-sm-4 col-md-3 col-lg-6">
							<a href="#"> <img src="https://i.imgur.com/xXPUaVA.png" alt="app-store"> </a>
						</div>
					</div>

					<!-- Social buttons -->
					<h6 class="mb-2 mb-md-4">Nossas redes sociais</h6>

					<ul class="list-inline mb-0 mt-3">
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-instagram" href="#"><i class="fab fa-fw fa-instagram lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-twitter" href="#"><i class="fab fa-fw fa-twitter lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-youtube" href="#"><i class="fab fa-fw fa-youtube lh-base"></i></a> </li>
					</ul>


				</div>
				<!-- Widget 2 END -->
			</div>

			<!-- Divider -->
			<hr class="mt-4 mb-3">

			<!-- Bottom footer -->
			<div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-3">
				<!-- Logo -->
				<a class="navbar-brand" href="index.html">
					<img class="light-mode-item navbar-brand-item h-40px" src="https://i.imgur.com/w1p2UoH.png" alt="logo">
					<img class="dark-mode-item navbar-brand-item h-40px" src="https://i.imgur.com/Bo0Q3qt.png" alt="logo">
				</a>

				<!-- Copyright link-->
				<div class="text-body mt-3 mt-md-0">Copyrights ©<?php
																// Obtém o ano atual
																$ano_atual = date("Y");

																// Exibe o ano atual
																echo $ano_atual;
																?>
					RR IMAGEM MASCULINA. <strong>Todos os direitos reservados</strong> <br>Desenvolvido e Projetado por <a href="https://adrieldias.netlify.app/" class="text-body-secondary">Adriel Dias</a>. </div>
				<!-- Copyright link-->
			</div>
		</div>
	</footer>
	<!-- =======================
Footer END -->

	<!-- Back to top -->
	<div class="back-top"></div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Theme Functions -->
	<script src="../assets/js/functions.js"></script>







</body>

</html>
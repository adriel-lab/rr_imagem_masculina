<?php
// Inclua o arquivo de conexão com o banco de dados
$include_path = __DIR__ . '/bd/conexao.php';
include_once($include_path);

// Consulta para obter os barbeiros disponíveis
$sql = "SELECT id, nome FROM barbeiros WHERE disponibilidade = 'Disponível'";
$result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>RR Imagem Masculina</title>

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
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">

	<!-- Plugins CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/flatpickr/css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/choices/css/choices.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

	<!-- Header START -->
	<header class="navbar-light py-3">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-lg">
			<div class="container d-block">
				<div class="row align-items-center">
					<div class="col-4">
						<!-- Logo START -->
						<a class="navbar-brand" href="index.html">
							<img class="light-mode-item navbar-brand-item d-inline h-40px h-md-60px" src="https://i.imgur.com/w1p2UoH.png" alt="logo">
							<img class="dark-mode-item navbar-brand-item d-inline h-40px h-md-60px" src="https://i.imgur.com/Bo0Q3qt.png" alt="logo">
						</a>
						<!-- Logo END -->
					</div>
					<style>
						
					</style>
					<div class="col-8">
						<!-- Navbar top Right-->
						<div class="align-items-center justify-content-end d-lg-flex">
							<ul class="nav border-bottom">
								<li class="dropdown nav-item d-none d-sm-block">
									<a class="nav-link small pb-2 " href="#" role="button" id="languageDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-globe fa-fw me-2"></i>Lingua</a>
									<ul class="dropdown-menu dropdown-animation dropdown-menu-end min-w-auto " aria-labelledby="languageDropdown">
										<li> <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/uk.svg" alt="">English</a> </li>
										<li> <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/sp.svg" alt="">Español</a> </li>
										<li> <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/fr.svg" alt="">Français</a> </li>
										<li> <a class="dropdown-item me-4" href="#"><img class="fa-fw me-2" src="assets/images/flags/gr.svg" alt="">Deutsch</a> </li>
									</ul>
								</li>
								<li class="nav-item"> <a href="painel" class="nav-link small pb-2"><i class="bi bi-briefcase me-2"></i>Meu Perfil</a> </li>
								<li class="nav-item d-none d-sm-block"> <a href="help-center.html" class="nav-link small pb-2"><i class="bi bi-info-circle me-2"></i>Ajuda</a> </li>
								<li class="nav-item"> <a href="#" class="nav-link small pb-2"><i class="far fa-user me-2"></i>Painel</a> </li>
								<!-- Dark mode option START -->
								<li class="d-none">
									<button class="btn btn-link text-warning lh-3 p-0 mb-0" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-circle-half theme-icon-active fa-fw" viewBox="0 0 16 16">
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
												</svg>Claro
											</button>
										</li>
										<li class="mb-1">
											<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
													<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z">
														<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z">
															<use href="#"></use>
												</svg>Noturno
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
							</ul>
						</div>

						<div class="d-sm-flex align-items-center justify-content-end">
							<!-- Main navbar START -->
							<div class="navbar-collapse collapse" id="navbarCollapse">
								<ul class="navbar-nav navbar-nav-scroll ms-auto">
									<!-- Nav item Find hotel -->
									<li class="nav-item dropdown dropdown-fullwidth">
										<a class="nav-link dropdown-toggle" href="#" id="hotelMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Encontre um barbeiro</a>
										<div class="dropdown-menu" aria-labelledby="hotelMenu">
											<div class="container">
												<div class="row g-4 justify-content-between p-lg-3">


													<!-- Hotel type -->


													<!-- Category -->


													<!-- Action box -->
													<div class="col-12">
														<div class="card overflow-hidden" style="background-image:url(assets/images/bg/05.jpg); background-position: center left; background-size: cover;">
															<div class="bg-overlay bg-dark opacity-5"></div>
															<div class="card-body d-lg-flex justify-content-between align-items-center position-relative z-index-9">
																<!-- Meta -->
																<div class="mb-3 mb-lg-0">
																	<h5 class="text-white">Feito para homens que prezam pelo estilo!</h5>
																	<ul class="list-inline">
																		<li class="list-inline-item text-white me-2"> <i class="bi bi-patch-check-fill me-1"></i>Get 1000 bonus points on every stay</li>
																		<li class="list-inline-item text-white me-2"> <i class="bi bi-patch-check-fill me-1"></i>Earn through Dec 15</li>
																		<li class="list-inline-item text-white"> <i class="bi bi-patch-check-fill me-1"></i>Redeem for free night and more</li>
																	</ul>
																</div>
																<!-- Button -->
																<a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-white mb-0">Agende Agora!</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>

									<!-- Nav item Facilities -->

								</ul>
							</div>
							<!-- Main navbar END -->

							<!-- Toggler button and stay button -->
							<div class="d-flex align-items-center justify-content-end">
								<!-- Responsive navbar toggler -->
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-animation">
										<span></span>
										<span></span>
										<span></span>
									</span>
									<span class="d-none d-sm-inline-block small">Menu</span>
								</button>

								<!-- Booking form dropdown START -->
								<div class="nav-item dropdown form-control-bg-light">
									<!-- Stay button -->
									<a class="btn btn-sm btn-primary mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
										Marcar Horário <i class="fa-solid fa-angle-down"></i>
									</a>

									<!-- Form START -->
									<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 mt-2">
										<!-- Card START -->
										<div class="card">
											<!-- Card header -->
											<div class="card-header border-bottom">
												<h6 class="mb-0">Selecione um barbeiro: </h6>
											</div>

											<!-- Card body -->
											<div class="card-body">
												<div class="row g-3">
													<!-- Pickup -->
													<div class="col-12">
														<label class="form-label mb-0">Marcar Horário</label>


														<form class="form-select js-choice" data-search-enabled="true" aria-label=".form-select-sm" action="page1.php" method="GET">
															<div class="mb-3">

																<select name="barberId" id="barberSelect" class="form-select" required>
																	<option value="">Selecione um barbeiro</option>
																	<?php
																	while ($row = $result->fetch_assoc()) {
																		$barberId = $row['id'];
																		$barberName = $row['nome'];
																		echo "<option value='$barberId|$barberName'>$barberName</option>";
																	}
																	?>
																</select>
															</div>
															<div class="col-12 text-center">
																<a href="#" class="text-primary-hover text-decoration-underline">Tem um código promocional?</a>
																<button type="submit" name="submit" class="btn btn-primary-soft w-100 mt-3 mb-0">Verificar disponibilidade</button>

															</div>
														</form>


													</div>




													<!-- Buttons -->


												</div>
											</div>
										</div>
										<!-- Card END -->
									</div>
									<!-- Form END -->
								</div>
								<!-- Booking form dropdown END -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<!-- Logo Nav END -->
	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>
		<!-- **************** MODAL **************** -->
		<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title fs-5" id="exampleModalLabel">ESCOLHER O BARBEIRO:</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body ">
						<div class="container">
							<form id="barberForm" class="align-items-center" action="page1.php" method="GET">
								<input type="hidden" id="selectedBarber" name="barberId" value="">
								<div class="mb-3">
									<div class="text-center">
										<div class="dropdown ">

											<button class="btn btn-secondary-soft w-100 mt-3 mb-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
												Selecione um barbeiro
											</button>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<?php
												$sql = "SELECT id, nome FROM barbeiros WHERE disponibilidade = 'Disponível'";
												$result = $conexao->query($sql);
												while ($row = $result->fetch_assoc()) {
													$barberId = $row['id'];
													$barberName = $row['nome'];
													echo "<li><button class='dropdown-item' type='button' onclick='selectBarber($barberId, \"$barberName\")'>$barberName</button></li>";
												}
												?>
											</ul>
										</div>
									</div>
								</div>
								<div class="text-center">
									<a href="#" class="text-primary-hover text-decoration-underline">Tem um código promocional?</a>
								</div>
								<div class="mb-3">
									<button type="submit" name="submit" class="btn btn-primary-soft w-100 mt-3 mb-0">Verificar disponibilidade</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			function selectBarber(id, name) {
				document.getElementById("selectedBarber").value = id + "|" + name;
				document.getElementById("dropdownMenuButton").innerText = name;
			}
		</script>



		<!-- ======================= Main Banner START -->
		<section class="py-0">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-11 mx-auto">
						<!-- Slider START -->
						<div class="tiny-slider arrow-round arrow-blur arrow-hover rounded-3 overflow-hidden">
							<div class="tiny-slider-inner" data-gutter="0" data-arrow="true" data-dots="false" data-items="1">
								<!-- Card item START -->
								<div class="card overflow-hidden h-400px h-sm-600px rounded-0" style="background-image:url(https://i.imgur.com/X7SfBrJ.jpeg); background-position: center left; background-size: cover;">
									<!-- Background dark overlay -->
									<div class="bg-overlay bg-dark opacity-3"></div>
									<!-- Card image overlay -->
									<div class="card-img-overlay d-flex align-items-center">
										<div class="container">
											<div class="row">
												<div class="col-11 col-lg-7">
													<h6 class="text-white fw-normal mb-0">💖 Elevando sua imagem, inspirando confiança.</h6>
													<!-- Title -->
													<h1 class="text-white display-6"></h1>
													<a href="#" class="btn btn-primary mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Reserve hoje!</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Card item END -->
								<!-- Card item START -->
								<div class="card overflow-hidden h-400px h-sm-600px rounded-0" style="background-image:url(https://i.imgur.com/v4SkUi4.jpeg); background-position: center left; background-size: cover;">
									<!-- Background dark overlay -->
									<div class="bg-overlay bg-dark opacity-3"></div>
									<!-- Card image overlay -->
									<div class="card-img-overlay d-flex align-items-center">
										<div class="container">
											<div class="row">
												<div class="col-11 col-lg-7">
													<h6 class="text-white fw-normal mb-0">💖 Elevando sua imagem, inspirando confiança.</h6>
													<!-- Title -->
													<h1 class="text-white display-6"></h1>
													<a href="#" class="btn btn-primary mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Reserve hoje!</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Card item END -->

								<!-- Card item START -->
								<div class="card overflow-hidden h-400px h-sm-600px bg-parallax text-center rounded-0" style="background-image:url(https://i.imgur.com/4CFdfDq.gif); background-position: center left; background-size: cover;">
									<!-- Background dark overlay -->
									<div class="bg-overlay bg-dark opacity-3"></div>
									<!-- Card image overlay -->
									<div class="card-img-overlay d-flex align-items-center">
										<div class="container w-100 my-auto">
											<div class="row justify-content-center">
												<div class="col-11 col-lg-8">
													<!-- Title -->
													<h1 class="text-white"></h1>
													<a href="#" class="btn btn-primary mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Marcar agora!</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Card item END -->
							</div>
						</div>
						<!-- Slider END -->
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Main Banner END -->

		<!-- =======================
Special offer START -->
		<section class="pb-0">
			<div class="container">
				<!-- Title -->
				<div class="row mb-4">
					<div class="col-12 text-center">
						<h3 class="mb-0">Serviços essenciais</h3>
					</div>
				</div>

				<!-- Slider START -->
				<div class="tiny-slider arrow-round arrow-blur arrow-hover">
					<div class="tiny-slider-inner mb-8" data-autoplay="true" data-arrow="true" data-edge="2" data-dots="false" data-items-xl="3" data-items-lg="3" data-items-md="2" data-items-sm="1">

						<!-- Offer card START -->
						<div>
							<div class="card">
								<img src="https://i.imgur.com/6bmAilZ.png" class="card-img" alt="">
								<!-- Card body -->
								<div class="position-absolute top-100 start-50 translate-middle w-100">
									<div class="card-body text-center bg-mode shadow rounded mx-4 p-3">
										<h6 class="card-title mb-1"><a href="#">Cortes</a></h6>
										<small>Desde cortes clássicos até cortes modernos e estilos mais elaborados.</small>
										<div class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-dark mb-0">Agendar</a></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Offer card END -->

						<!-- Offer card START -->
						<div>
							<div class="card">
								<img src="https://i.imgur.com/XLi1Rmm.png" class="card-img" alt="">
								<!-- Card body -->
								<div class="position-absolute top-100 start-50 translate-middle w-100">
									<div class="card-body text-center bg-mode shadow rounded mx-4 p-3">
										<h6 class="card-title mb-1"><a href="#">Barba e Cuidados</a></h6>
										<small>Barbear tradicional, barba feita com navalha.</small>
										<div class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-dark mb-0">Agendar</a></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Offer card END -->

						<!-- Offer card START -->
						<div>
							<div class="card">
								<img src="https://i.imgur.com/FkqTKRD.png" class="card-img" alt="">
								<!-- Card body -->
								<div class="position-absolute top-100 start-50 translate-middle w-100">
									<div class="card-body text-center bg-mode shadow rounded mx-4 p-3">
										<h6 class="card-title mb-1"><a href="#">Tratamento Capilar</a></h6>
										<small>Coloração de cabelo, Hidratação profunda e alisamento.</small>
										<div class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-dark mb-0">Agendar</a></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Offer card END -->

						<!-- Offer card START -->
						<div>
							<div class="card">
								<img src="https://i.imgur.com/fYah5ZY.png" class="card-img" alt="">
								<!-- Card body -->
								<div class="position-absolute top-100 start-50 translate-middle w-100">
									<div class="card-body text-center bg-mode shadow rounded mx-4 p-3">
										<h6 class="card-title mb-1"><a href="#">Cuidados com as sobrancelhas</a></h6>
										<small>Modelagem e limpeza de sobrancelhas</small>
										<div class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#myModal" class="btn btn-sm btn-dark mb-0">Agendar</a></div>
									</div>
								</div>
							</div>
						</div>
						<!-- Offer card END -->
					</div>
				</div>
				<!-- Slider END -->
			</div>
		</section>
		<!-- =======================
Special offer END -->

		<!-- =======================
About START -->
		<section class="py-0 py-lg-7">
			<div class="container">
				<!-- Title -->
				<div class="row mb-4">
					<div class="col-12">
						<h5>Na nossa barbearia, buscamos sempre proporcionar a melhor experiência aos nossos clientes. Estamos aqui para ajudá-lo e garantir que saia satisfeito com o seu visual.</h5>
						<p class="mb-0">Nosso foco está em entender as necessidades e preferências dos nossos clientes. Reconhecemos que essa compreensão é fundamental para oferecer o melhor serviço na nossa barbearia. Sabemos que teoria é importante, mas nada substitui a prática quando se trata de satisfazer nossos clientes.</p>
					</div>
				</div>

				<!-- Counters and features START -->
				<div class="row g-4">
					<!-- Location -->
					<div class="col-md-6 col-xl-4">
						<div class="card  overflow-hidden">
							<!-- Image -->
							<img src="https://i.imgur.com/SGcNB3n.png" class="rounded-3" alt="">
							<!-- Full screen button -->
							<div class="w-100 h-100">


								</button>
							</div>
						</div>
					</div>

					<!-- Location -->
					<div class="col-md-6 col-xl-4">
						<div class="card  overflow-hidden">
							<!-- Image -->
							<img src="assets/images/about/07.jpg" class="rounded-3" alt="">
							<!-- Full screen button -->
							<div class="w-100 h-100">
								<button class="btn btn-dark position-absolute top-50 start-50 translate-middle mb-0" data-bs-toggle="modal" data-bs-target="#map360">
									<i class="bi bi-eye me-2"></i>View 360
								</button>
							</div>
						</div>
					</div>

					<!-- Features -->
					<div class="col-md-6 col-xl-4">
						<ul class="list-group list-group-borderless">
							<li class="list-group-item py-3">
								<h6 class="mb-0 fw-normal">
									<i class="bi bi-cash-coin fa-fw text-info me-2"></i>Melhor preço garantido!
								</h6>
							</li>

							<li class="list-group-item py-3">
								<h6 class="mb-0 fw-normal">
									<i class="bi bi-credit-card-2-back fa-fw text-warning me-2"></i>Diversas opções de pagamento
								</h6>
							</li>

							<li class="list-group-item py-3">
								<h6 class="mb-0 fw-normal">
									<i class="bi bi-wallet fa-fw text-success me-2"></i>Promoções para membros
								</h6>
							</li>

							<li class="list-group-item py-3">
								<h6 class="mb-0 fw-normal">
									<i class="bi bi-wifi fa-fw text-danger me-2"></i>Acesso Wi-Fi
								</h6>
							</li>

							<li class="list-group-item pt-3 pb-0">
								<h6 class="mb-0 fw-normal">
									<i class="bi bi-tags fa-fw text-orange me-2"></i>Escolha a melhor opção
								</h6>
							</li>
						</ul>

					</div>
				</div>
				<!-- Counters and features END -->
			</div>
		</section>
		<!-- =======================
About END -->


		<!-- =======================
Services START -->
		<section class="pt-0 pt-lg-5">
			<div class="container">
				<div class="row g-4 align-items-center">
					<div class="col-lg-6">
						<!-- Title -->
						<h4>Venha relaxar e aproveitar nossos serviços de alta qualidade em um ambiente confortável e acolhedor.</h4>
						<p>Reserve seu horário conosco e não se esqueça de aproveitar uma oferta incrível para economizar bastante. Garanta já o seu momento de cuidados pessoais e estilo conosco!</p>
						<!-- Button -->
						<a href="#" class="btn btn-dark mb-4">Agendar</a>
						<!-- Services -->
						<div class="row g-sm-4">
							<div class="col-sm-6">
								<ul class="list-group list-group-borderless mt-2 mb-0">
									<li class="list-group-item">
										<h6 class="fw-normal mb-0"><i class="fa-solid fa-wifi fa-fw text-primary me-2"></i>Wifi grátis</h6>
									</li>

									<li class="list-group-item">
										<h6 class="fw-normal mb-0"><i class="fa-solid fa-wind fa-fw text-primary me-2"></i>Ar-Condicionado</h6>
									</li>

									<li class="list-group-item">
										<h6 class="fw-normal mb-0"><i class="fa-solid fa-bolt fa-fw text-primary me-2"></i>Carregador</h6>
									</li>

									<li class="list-group-item">
										<h6 class="fw-normal mb-0"><i class="fa-solid fa-tv fa-fw text-primary me-2"></i>TV</h6>
									</li>
								</ul>
							</div>



							<div class="col-sm-6">
								<ul class="list-group list-group-borderless">
									<li class="list-group-item">
										<h6 class="fw-normal mb-0"><i class="fa-regular fa-clock fa-fw text-primary me-2"></i>Horários Flexíveis</h6>
									</li>

									<li class="list-group-item">
										<h7 class="fw-normal mb-0 text-black"><i class="fa-solid fa-droplet fa-fw text-primary me-2"></i>Ambiente Limpo e Organizado</h7>
									</li>

									<li class="list-group-item">
										<h6 class="fw-normal mb-0"><i class="fa-regular fa-bell fa-fw text-primary me-2"></i>Tempo de Espera Reduzido</h6>
									</li>


								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="bg-light rounded-3 h-100 p-4">
							<!-- Slider START -->
							<div class="tiny-slider arrow-round arrow-blur">
								<div class="tiny-slider-inner" data-autoplay="true" data-arrow="true" data-edge="2" data-dots="false" data-items-xl="1" data-items-md="1">

									<!-- Card START -->
									<div class="card bg-transparent">
										<div class="row g-4 align-items-center">
											<div class="col-sm-6">
												<img src="https://i.imgur.com/5OuywnT.png" class="img-fluid card-img" alt="...">
											</div>
											<div class="col-sm-6">
												<div class="card-body p-0">
													<h6 class="fw-normal mb-3">Elegância Redefinida</h6>
													<h4 class="card-title mb-3"><a href="#" class="stretched-link">Descubra uma abordagem única para elevar seu estilo e presença. </a></h4>

												</div>
											</div>
										</div>
									</div>
									<!-- Card END -->

									<!-- Card START -->
									<div class="card bg-transparent">
										<div class="row g-4 align-items-center">
											<div class="col-sm-6">
												<img src="https://i.imgur.com/OvMSy7i.png" class="img-fluid card-img" alt="...">
											</div>
											<div class="col-sm-6">
												<div class="card-body p-0">
													<h6 class="fw-normal mb-3">Barbearia de Excelência</h6>
													<h4 class="card-title mb-3"><a href="#" class="stretched-link">Um ambiente acolhedor e profissionais experientes.</a></h4>

												</div>
											</div>
										</div>
									</div>
									<!-- Card END -->

									<!-- Card START -->
									<div class="card bg-transparent">
										<div class="row g-4 align-items-center">
											<div class="col-sm-6">
												<img src="https://i.imgur.com/yQfWFxR.jpeg" class="img-fluid card-img" alt="...">
											</div>
											<div class="col-sm-6">
												<div class="card-body p-0">
													<h6 class="fw-normal mb-3">Tradição e Modernidade</h6>
													<h4 class="card-title mb-3"><a href="#" class="stretched-link">Unimos a arte tradicional da barbearia com técnicas e produtos modernos.</a></h4>

												</div>
											</div>
										</div>
									</div>
									<!-- Card END -->
								</div>
							</div>
							<!-- Slider END -->
						</div>
					</div>
				</div> <!-- Row END -->
			</div>
		</section>
		<!-- =======================
Services END -->

		<!-- =======================
Action box START -->
		<section class="py-0 py-md-5">
			<div class="container">
				<div class="position-relative rounded-3 overflow-hidden p-3 p-sm-5" style="background-image:url(https://i.imgur.com/M3Fkmpz.jpeg); background-position: center left; background-size: cover;">
					<div class="row position-relative z-index-9">
						<div class="col-md-7 col-xl-5 ms-auto">
							<div class="card card-body p-sm-5">
								<div class="d-sm-flex justify-content-between align-items-center mb-2">
									<h6 class="text-primary mb-0">Oferta exclusiva</h6>
									<!-- Rating -->
									<ul class="list-inline small mb-0">
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item me-0"><i class="fa-solid fa-star text-warning"></i></li>
										<li class="list-inline-item"><i class="fa-solid fa-star text-warning"></i></li>
									</ul>
								</div>
								<!-- Title -->
								<h5>Corte tal</h5>
								<p class="mb-3">Descrição da oferta</p>

								<!-- Price -->
								<h6 class="fw-normal mb-1">quantidade</h6>
								<div class="d-flex align-items-center">
									<h5 class="text-success mb-0 me-1">Preço</h5>
									<span class="mb-0 me-2">de</span>
									<span class="text-decoration-line-through">Preço maior</span>
								</div>
								<!-- Button -->
								<a href="#" class="btn btn-primary-soft mb-0 mt-3">Agendar agora!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Action box END -->

		<!-- =======================
Gallery START -->
		<section>
			<div class="container-fluid">
				<!-- Title -->
				<div class="row mb-md-4">
					<div class="col-12 mx-auto text-center mb-4">
						<h2 class="mb-0">Nossos Cortes</h2>
					</div>
				</div>

				<!-- Slider START -->
				<div class="tiny-slider arrow-round arrow-blur arrow-hover rounded-3 overflow-hidden">
					<div class="tiny-slider-inner d-flex align-items-end" data-autoplay="true" data-edge="2" data-arrow="true" data-dots="false" data-items="6" data-items-lg="4" data-items-sm="2">
						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/01.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/01.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/02.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/02.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/03.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/03.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/05.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/05.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/08.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/08.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="https://www.youtube.com/embed/tXHviS-4ygo">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/04.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<span class="btn text-danger btn-round btn-white position-absolute top-50 start-50 translate-middle mb-0">
											<i class="fas fa-play"></i>
										</span>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/06.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/06.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>

						<!-- Slider item -->
						<div>
							<a data-glightbox="" data-gallery="gallery" href="assets/images/category/hotel/gallery/07.jpg">
								<div class="card card-element-hover card-overlay-hover overflow-hidden">
									<!-- Image -->
									<img src="assets/images/category/hotel/gallery/07.jpg" class="rounded-3" alt="">
									<!-- Full screen button -->
									<div class="hover-element w-100 h-100">
										<i class="bi bi-fullscreen fs-6 text-white position-absolute top-50 start-50 translate-middle bg-dark rounded-1 p-2 lh-1"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!-- Slider END	 -->
			</div>
		</section>
		<!-- =======================
Gallery END -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->

	<!-- =======================
Footer START -->
	<footer class="bg-dark pt-5">
		<div class="container">
			<!-- Row START -->
			<div class="row g-4">

				<!-- Widget 1 START -->
				<div class="col-lg-3">
					<!-- logo -->
					<a href="index.html">
						<img class="h-40px" src="https://i.imgur.com/Bo0Q3qt.png" alt="logo">
					</a>
					<p class="my-3 text-body-secondary">Feito para homens que prezam pelo estilo!</p>
					<p class="mb-2"><a href="#" class="text-body-secondary text-primary-hover"><i class="bi bi-telephone me-2"></i>+1234 568 963</a> </p>
					<p class="mb-0"><a href="#" class="text-body-secondary text-primary-hover"><i class="bi bi-envelope me-2"></i>examplo@gmail.com</a></p>
				</div>
				<!-- Widget 1 END -->

				<!-- Widget 2 START -->

				<!-- Widget 2 END -->

			</div><!-- Row END -->

			<!-- Tops Links -->


			<!-- Payment and card -->
			<div class="row g-4 justify-content-between mt-0 mt-md-2">

				<!-- Payment card -->
				<div class="col-sm-7 col-md-6 col-lg-4">
					<h5 class="text-white mb-2">Formas de Pagamento</h5>
					<ul class="list-inline mb-0 mt-3">
						<li class="list-inline-item"> <a href="#"><img src="assets/images/element/paypal.svg" class="h-30px" alt=""></a></li>
						<li class="list-inline-item"> <a href="#"><img src="assets/images/element/visa.svg" class="h-30px" alt=""></a></li>
						<li class="list-inline-item"> <a href="#"><img src="assets/images/element/mastercard.svg" class="h-30px" alt=""></a></li>
						<li class="list-inline-item"> <a href="#"><img src="assets/images/element/expresscard.svg" class="h-30px" alt=""></a></li>
					</ul>
				</div>

				<!-- Social media icon -->
				<div class="col-sm-5 col-md-6 col-lg-3 text-sm-end">
					<h5 class="text-white mb-2">Nossas Redes Sociais</h5>
					<ul class="list-inline mb-0 mt-3">
						<li class="list-inline-item"> <a class="btn btn-sm px-2 bg-facebook mb-0" href="#"><i class="fab fa-fw fa-facebook-f"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-sm shadow px-2 bg-instagram mb-0" href="#"><i class="fab fa-fw fa-instagram"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-sm shadow px-2 bg-twitter mb-0" href="#"><i class="fab fa-fw fa-twitter"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-sm shadow px-2 bg-linkedin mb-0" href="#"><i class="fab fa-fw fa-linkedin-in"></i></a> </li>
					</ul>
				</div>
			</div>

			<!-- Divider -->
			<hr class="mt-4 mb-0">

			<!-- Bottom footer -->
			<div class="row">
				<div class="container">
					<div class="d-lg-flex justify-content-between align-items-center py-3 text-center text-lg-start">
						<!-- copyright text -->
						<div class="text-body-secondary text-primary-hover"> Copyrights ©<?php
																							// Obtém o ano atual
																							$ano_atual = date("Y");

																							// Exibe o ano atual
																							echo$ano_atual;
																							?>
							RR IMAGEM MASCULINA. <strong>Todos os direitos reservados</strong> <br>Desenvolvido e Projetado por <a href="https://adrieldias.netlify.app/" class="text-body-secondary">Adriel Dias</a>. </div>
						<!-- copyright links-->
						<div class="nav mt-2 mt-lg-0">
							<ul class="list-inline text-primary-hover mx-auto mb-0">
								<li class="list-inline-item me-0"><a class="nav-link text-body-secondary py-1" href="#">Política de Privacidade</a></li>
								<li class="list-inline-item me-0"><a class="nav-link text-body-secondary py-1" href="#">Termos e Condições</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- =======================
Footer END -->

	<!-- Modal START -->
	<div class="modal fade" id="map360" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Title -->
				<div class="modal-header">
					<h5 class="modal-title" id="map360label">Hotel 360 View</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- Body -->
				<div class="modal-body p-3">

				</div>
			</div>
		</div>
	</div>
	<!-- Modal END -->

	<!-- Back to top -->
	<div class="back-top"></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.js"></script>
	<script src="assets/vendor/flatpickr/js/flatpickr.min.js"></script>
	
	<script src="assets/vendor/jarallax/jarallax.min.js"></script>
	<script src="assets/vendor/jarallax/jarallax-video.min.js"></script>

	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

</html>
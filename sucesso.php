<?php
// Verifique se o parâmetro 'successMessage' está presente na URL
if (!empty($_GET['successMessage'])) {
	// Se não estiver presente, exiba uma mensagem e encerre o script
	echo 'Esta página não deve ser acessada diretamente.';
	exit;
}

// Verifique se todos os parâmetros necessários estão presentes na URL
$required_params = array('fullname', 'cpf', 'contact', 'email', 'schedule', 'status', 'barber', 'combo', 'service_or_combo', 'barber_id', 'formattedDate', 'pagamento');
foreach ($required_params as $param) {
	if (!isset($_GET[$param])) {
		// Se algum parâmetro estiver faltando, exiba uma mensagem e encerre o script
		echo 'Esta página não deve ser acessada diretamente.';
		// echo 'Parâmetro ausente na URL: ' . $param;
		echo 'Parâmetros ausentes';
		exit;
	}
}

$include_path = __DIR__ . '/BD/conexao.php';
include_once($include_path);
// A partir deste ponto, você pode assumir que todos os parâmetros necessários estão presentes na URL
$fullname = $_GET['fullname'];
$cpf = $_GET['cpf'];
$contact = $_GET['contact'];
$email = $_GET['email'];
$schedule = $_GET['schedule'];
$status = $_GET['status'];
$barber = $_GET['barber'];
$combo = $_GET['combo'];
$service_or_combo = $_GET['service_or_combo'];
$barber_id = $_GET['barber_id'];
$formattedDate = $_GET['formattedDate'];
$pagamento = $_GET['pagamento'];

if ($service_or_combo === 'invalido') {
	// Se for 'invalido', $combo contém o ID de um combo
	$service_id = $conexao->real_escape_string($combo);
	// Query para selecionar o combo com base no ID
	$sql = "SELECT * FROM service_list_combos WHERE combo_id = $service_id";
} else {
	// Caso contrário, $service_or_combo contém o ID de um serviço
	$service_id = $conexao->real_escape_string($service_or_combo);
	// Query para selecionar o serviço com base no ID
	$sql = "SELECT * FROM service_list WHERE id = $service_id";
}

$result = $conexao->query($sql);
// Agora você pode usar esses valores conforme necessário na página de sucesso
?>






<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Agendado!</title>

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
				return 'light';
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function(theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: light)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'light')
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
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox/css/glightbox.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>
<style>
	@font-face {
		font-family: 'Noto Color Emoji';
		src: url('https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.7/assets/fonts/emojione-svg.woff') format('woff');
	}

	.emoji {
		font-family: 'Noto Color Emoji', sans-serif;
	}
</style>

<body>

	<!-- Header START -->
	<header class="navbar-light header-sticky">
		<!-- Logo Nav START -->
		<nav class="navbar navbar-expand-xl">
			<div class="container">
				<!-- Logo START -->
				<a class="navbar-brand" href="index.php">
					<img class="light-mode-item navbar-brand-item" src="https://i.imgur.com/w1p2UoH.png" alt="logo">
					<img class="dark-mode-item navbar-brand-item" src="https://i.imgur.com/Bo0Q3qt.png" alt="logo">
				</a>
				<!-- Logo END -->

				<!-- Responsive navbar toggler -->
				<button class="navbar-toggler ms-auto mx-3 p-0 p-sm-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-animation">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>

				<!-- Main navbar START -->

				<!-- Main navbar END -->

				<!-- Profile and Notification START -->

				<!-- Profile and Notification START -->
			</div>
		</nav>
		<!-- Logo Nav END -->
	</header>
	<!-- Header END -->

	<!-- **************** MAIN CONTENT START **************** -->
	<main>

		<!-- =======================
Main content START -->
		<section class="pt-4">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-xl-8 mx-auto">

						<div class="card shadow">
							<!-- Image -->


							<!-- Card body -->
							<div id="divToPrint">
								<div class="card-body mb-2 text-center p-4">
									<!-- Title -->
									<h1 class="card-title fs-3">🎊 Parabéns! Fantástico! 🎊</h1>
									<p class="lead mb-3">Seu horario foi reservado.</p>

									<!-- Second title --><?php
															if ($service_or_combo === 'invalido') {
																// Se for 'invalido', $combo contém o ID de um combo
																$combo_id = $conexao->real_escape_string($combo);
																// Query para selecionar o combo com base no ID
																$sql = "SELECT * FROM service_list_combos WHERE combo_id = $combo_id";
															} else {
																// Caso contrário, $service_or_combo contém o ID de um serviço
																$service_id = $conexao->real_escape_string($service_or_combo);
																// Query para selecionar o serviço com base no ID
																$sql = "SELECT * FROM service_list WHERE id = $service_id";
															}

															$result = $conexao->query($sql);

															if ($result->num_rows > 0) {
																// Saída dos dados de cada linha
																while ($row = $result->fetch_assoc()) {
																	// Imprime os dados da linha
																	if ($service_or_combo === 'invalido') {
																		echo '<h5 class="text-primary mb-4">' . $row["combo_name"] . '</h5>';
																	} else {
																		echo '<h5 class="text-primary mb-4">' . $row["name"] . '</h5>';
																	}
																}
															} else {
																echo "0 resultados";
															}
															?>

									<?php
									$numeros = [];

									for ($i = 0; $i < 1; $i++) {
										$numeros[] = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT) . $barber_id;
									}


									?>

									<!-- List -->
									<div class="row justify-content-between text-start mb-4">
										<div class="col-lg-5">
											<ul class="list-group list-group-borderless">
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-vr fa-fw me-2"></i>ID da reserva:</span>
													<span class="h6 fw-normal mb-0">RR-<?php echo  implode(", ", $numeros);  ?></span>
												</li>
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-person fa-fw me-2"></i>Reservado por:</span>
													<span class="h6 fw-normal mb-0"><?php echo $fullname ?></span>
												</li>
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-wallet2 fa-fw me-2"></i>F/pagamento:</span>
													<span class="h6 fw-normal mb-0"><?php echo strtoupper($pagamento);  ?></span>
												</li>

												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>Email</span>
													<span class="h6 fw-normal mb-0"><?php echo $email ?></span>
												</li>

												<?php


												// Verifica se é um combo ou serviço
												if ($service_or_combo === 'invalido') {
													// Query para selecionar o custo do combo com base no ID do combo
													$sql = "SELECT price FROM service_list_combos WHERE combo_id = $service_id";
												} else {
													// Query para selecionar o custo do serviço com base no ID do serviço
													$sql = "SELECT cost FROM service_list WHERE id = $service_id";
												}

												$result = $conexao->query($sql);

												if ($result->num_rows > 0) {
													// Saída dos dados de cada linha
													while ($row = $result->fetch_assoc()) {
														// Imprime os dados da linha
														if ($service_or_combo === 'invalido') {
															echo '<li class="list-group-item d-sm-flex justify-content-between align-items-center">';
															echo '<span class="mb-0"><i class="bi bi-currency-dollar fa-fw me-2"></i>Valor total:</span>';
															echo '<span class="h6 fw-normal mb-0"><b>R$' . $row["price"] . ' REAIS</b></span>';
															echo '</li>';
														} else {
															echo '<li class="list-group-item d-sm-flex justify-content-between align-items-center">';
															echo '<span class="mb-0"><i class="bi bi-currency-dollar fa-fw me-2"></i>Valor total:</span>';
															echo '<span class="h6 fw-normal mb-0"><b>R$' . $row["cost"] . ' REAIS</b></span>';
															echo '</li>';
														}
													}
												} else {
													echo "0 resultados";
												}
												?>




											</ul>
										</div>

										<?php
										// String contendo a data e hora


										// Separar data e hora em duas variáveis
										list($data, $hora) = explode(' ', $schedule);

										// Formatando a data para dd/mm/YYYY
										$data_formatada = date('d/m/Y', strtotime($data));

										//echo "Data formatada: " . $data_formatada . "<br>";
										//	echo "Hora: " . $hora;
										?>


										<div class="col-lg-5">
											<ul class="list-group list-group-borderless">
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Data:</span>
													<span class="h6 fw-normal mb-0"><?php echo $data_formatada ?></span>
												</li>
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-calendar fa-fw me-2"></i>Horario:</span>
													<span class="h6 fw-normal mb-0"><?php echo $hora ?></span>
												</li>
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>CPF</span>
													<span class="h6 fw-normal mb-0"><?php echo $cpf  ?></span>
												</li>
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>Contato</span>
													<span class="h6 fw-normal mb-0"><?php echo $contact ?></span>
												</li>
												<li class="list-group-item d-sm-flex justify-content-between align-items-center">
													<span class="mb-0"><i class="bi bi-people fa-fw me-2"></i>Barbeiro</span>
													<span class="h6 fw-normal mb-0"><?php echo $barber ?></span>
												</li>
											</ul>
										</div>
									</div>

									<!-- Button -->
									<div class="d-sm-flex justify-content-sm-end d-grid">
										<!-- Share button with dropdown 

										<div class="dropdown me-sm-2 mb-2 mb-sm-0">
											<a href="#" class="btn btn-light mb-0 w-100" role="button" id="dropdownShare" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="bi bi-share me-2"></i>Share
											</a>

										
											<ul class="dropdown-menu dropdown-menu-end min-w-auto shadow rounded" aria-labelledby="dropdownShare">
												<li><a class="dropdown-item" href="#"><i class="fab fa-twitter-square me-2"></i>Twitter</a></li>
												<li><a class="dropdown-item" href="#"><i class="fab fa-facebook-square me-2"></i>Facebook</a></li>
												<li><a class="dropdown-item" href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
												<li><a class="dropdown-item" href="#"><i class="fas fa-copy me-2"></i>Copy link</a></li>
											</ul>
										</div>
										-->
										<!-- Download button -->
										<button onclick="executeBeforeCapture(); setTimeout(capture, 2000); setTimeout(recarregarPagina, 4000);" class="btn btn-primary mb-0">
											<i class="bi bi-file-pdf me-2"></i>Download PDF
										</button>



									</div>

								</div>
								<br>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- =======================
Main content START -->

	</main>
	<!-- **************** MAIN CONTENT END **************** -->
	<br>
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
						<li class="list-inline-item"> <a href="#"><img src="assets/images/elements/paypal.svg" class="h-30px" alt=""></a></li>
						<li class="list-inline-item"> <a href="#"><img src="assets/images/elements/visa.svg" class="h-30px" alt=""></a></li>
						<li class="list-inline-item"> <a href="#"><img src="assets/images/elements/mastercard.svg" class="h-30px" alt=""></a></li>
						<li class="list-inline-item"> <a href="#"><img src="assets/images/elements/expresscard.svg" class="h-30px" alt=""></a></li>
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
																							echo $ano_atual;
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
	<script>
		function executeBeforeCapture() {
			// Aqui você pode adicionar o código da sua função
			// Por exemplo:
			window.scrollTo(0, 0);


		}

		function capture() {

			var scrollX = window.scrollX;
			var scrollY = window.scrollY;

			// Mova a página para o topo para garantir que a div seja capturada completamente
			window.scrollTo(0, 0);
			var divToPrint = document.getElementById('divToPrint');

			// Ajusta o estilo da div para ter texto branco e fundo preto
			divToPrint.style.color = '#b8860b'; // Define a cor do texto como branco
			divToPrint.style.backgroundColor = '#FFF'; // Define o fundo como preto

			// Remove emojis e ícones antes de capturar
			removeEmojisAndIcons(divToPrint);

			// Use html2canvas para capturar a div como uma imagem
			html2canvas(divToPrint, {
				backgroundColor: null, // Define o fundo da captura de tela como transparente
				onrendered: function(canvas) {
					// Obtenha o contexto 2D do canvas
					var ctx = canvas.getContext('2d');

					// Crie um novo canvas com fundo preto
					var blackCanvas = document.createElement('canvas');
					blackCanvas.width = canvas.width + 20; // Adiciona espaço extra para o fundo preto
					blackCanvas.height = canvas.height + 20;
					var blackCtx = blackCanvas.getContext('2d');

					// Preenche o novo canvas com cor preta
					blackCtx.fillStyle = '#FFF';
					blackCtx.fillRect(0, 0, blackCanvas.width, blackCanvas.height);

					// Desenha a captura de tela no centro do novo canvas
					blackCtx.drawImage(canvas, 10, 10); // Desloca a captura de tela para o centro

					// Obtenha o URL da imagem resultante
					var imgURL = blackCanvas.toDataURL();

					// Crie um link de download
					var link = document.createElement('a');
					link.href = imgURL;
					link.download = 'recibo-confirmacao-RR-<?php echo implode(", ", $numeros); ?>.png'; // Nome do arquivo de download

					// Simule um clique no link para iniciar o download
					document.body.appendChild(link);
					link.click();

					// Limpe o elemento do link após o download
					document.body.removeChild(link);

					// Restaura o estilo original da div após a captura de tela
					divToPrint.style.color = ''; // Restaura a cor do texto
					divToPrint.style.backgroundColor = ''; // Restaura o fundo
				}
			});
		}

		// Função para remover emojis e ícones
		function removeEmojisAndIcons(element) {
			var nodes = element.querySelectorAll('i, span'); // Seleciona todos os elementos <i> e <span>

			nodes.forEach(function(node) {
				if (node.classList.contains('bi') || // Verifica se contém classes do Bootstrap Icons
					node.classList.contains('fa')) { // Verifica se contém classes do Font Awesome
					node.parentNode.removeChild(node); // Remove o elemento
				}
			});

			// Remova emojis específicos
			var textNodes = getTextNodesIn(element);

			textNodes.forEach(function(node) {
				var text = node.nodeValue;
				var updatedText = text.replace(/🎊/g, ''); // Remove o emoji "🎊"

				if (text !== updatedText) {
					node.nodeValue = updatedText;
				}
			});
		}

		// Função auxiliar para obter todos os nós de texto em um elemento e seus descendentes
		function getTextNodesIn(element) {
			var textNodes = [];
			var walker = document.createTreeWalker(element, NodeFilter.SHOW_TEXT, null, false);

			while (walker.nextNode()) {
				textNodes.push(walker.currentNode);
			}

			return textNodes;
		}


		// Função para converter um URL de dados em Blob
		function dataURLtoBlob(dataURL) {
			var byteString = atob(dataURL.split(',')[1]);
			var mimeString = dataURL.split(',')[0].split(':')[1].split(';')[0];

			var ab = new ArrayBuffer(byteString.length);
			var ia = new Uint8Array(ab);

			for (var i = 0; i < byteString.length; i++) {
				ia[i] = byteString.charCodeAt(i);
			}

			return new Blob([ab], {
				type: mimeString
			});

		}


		function recarregarPagina() {
			// Recarrega a página sem usar o cache do navegador
			location.reload(true);
		}
	</script>




	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- Back to top -->
	<div class="back-top"></div>

	<!-- Bootstrap JS -->
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


	<!-- ThemeFunctions -->
	<script src="assets/js/functions.js"></script>

</body>

</html>
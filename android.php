<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>RR Imagem Masculina</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Technology and Corporate Bootstrap Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
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
    <link rel="shortcut icon" href="https://i.imgur.com/7dBEuno.png">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/aos/aos.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/tiny-slider/tiny-slider.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>

<!-- Header START -->
<header class="header-sticky header-absolute">
        <!-- Nav START -->
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand me-0" href="index.php">
                    <img class="light-mode-item navbar-brand-item" src="https://i.imgur.com/jZClhu7.png" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="https://i.imgur.com/OA1fvSJ.png" alt="logo">
                </a>
                <!-- Logo END -->

                <!-- Main navbar START -->

                <!-- Main navbar END -->

                <!-- Buttons -->
                <ul class="nav align-items-center dropdown-hover ms-sm-2">

                    <!-- Dark mode option START -->
                    <li class="nav-item dropdown dropdown-animation">
                        <button class="btn btn-link text-warning mb-0 px-2 lh-1" id="bs-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z">
                                    <use href="#"></use>
                            </svg>
                        </button>

                        <ul class="dropdown-menu min-w-auto dropdown-menu-lg-end" aria-labelledby="bs-theme">
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
                                    </svg>Escuro
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

                    <style>
                        /* Para dispositivos com largura máxima de 360px e altura máxima de 720px */
                        @media (max-width: 360px) and (max-height: 720px) {
                            .custom-d-none {
                                display: none !important;
                            }
                        }

                        /* Para dispositivos com largura máxima de 375px e altura máxima de 667px */
                        @media (max-width: 375px) and (max-height: 667px) {
                            .custom-d-none {
                                display: none !important;
                            }
                        }

                        /* Para dispositivos com largura máxima de 390px e altura máxima de 844px */
                        @media (max-width: 390px) and (max-height: 844px) {
                            .custom-d-none {
                                display: none !important;
                            }
                        }

                        /* Para dispositivos com largura máxima de 360px e altura máxima de 740px */
                        @media (max-width: 360px) and (max-height: 740px) {
                            .custom-d-none {
                                display: none !important;
                            }
                        }

                        /* Para dispositivos com largura máxima de 375px e altura máxima de 812px */
                        @media (max-width: 375px) and (max-height: 812px) {
                            .custom-d-none {
                                display: none !important;
                            }
                        }
                    </style>



                    <!-- Sign up button -->
                    <li class="nav-item me-2 custom-d-none">
                        <a href="sign-up.htmlcustom-d-none" class="btn btn-sm btn-light mb-0"><i class="bi bi-person-circle me-1"></i>Painel</a>
                    </li>
                    <li class="nav-item me-2 ">
                        <a href="painel" class="btn btn-sm btn-light mb-0"><i class="bi bi-briefcase me-1"></i>Meu perfil</a>
                    </li>

                    <!-- Buy now button -->
                    <li class="nav-item d-none d-sm-block dropdown form-control-bg-light">


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





                                        <!-- Buttons -->


                                    </div>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                    </li>

                    <!-- Responsive navbar toggler -->

                </ul>

            </div>
        </nav>
        <!-- Nav END -->
    </header>
<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================
Main Banner START -->
<section class="overflow-hidden pt-lg-9">
	<div class="container position-relative pt-4 pt-sm-6">
		<div class="row">
			<!-- Hero Title and content -->
			<div class="col-lg-6 mb-5 mb-sm-8 mb-md-9 mb-lg-0">
				<!-- Title -->
				<h1 class="position-relative lh-base mb-4">Agende com elegância e praticidade com apenas um clique na RR Imagem Masculina.
					<!-- SVG decoration -->
					<span class="position-absolute top-0 start-0 translate-middle mt-1 ms-n5">
						<svg class="fill-primary" width="86" height="105" viewBox="0 0 86 105" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M50.9805 4.63769C51.6165 4.24345 56.4262 10.3524 61.7246 18.1163C67.0564 25.8003 72.7966 35.1061 75.9634 40.6314C82.2158 51.6489 85.8889 61.2748 84.5362 62.0301C83.1029 62.7522 77.2708 54.3462 71.0415 43.3853C67.8986 37.9165 62.7042 28.3199 58.293 20.1246C53.8819 11.9293 50.2874 5.05535 50.9805 4.63769Z"/>
							<path d="M64.0889 66.7297C63.5001 67.2372 60.6142 65.1098 57.1179 62.637C53.6451 60.2207 49.5285 57.539 47.2336 56.0303C42.5967 52.8997 39.0022 49.8707 39.6599 48.4069C40.2841 47.0231 45.3294 47.9307 50.3923 51.2838C52.9286 52.892 56.9393 56.2802 59.8742 59.6469C62.809 63.0137 64.6779 66.2223 64.0889 66.7297Z"/>
							<path d="M55.1316 86.0595C55.1297 86.856 48.7063 87.4433 40.9853 87.6368C33.2643 87.8295 24.2555 87.492 19.0669 87.0413C8.68981 86.139 0.434871 83.7683 0.656712 82.218C0.878555 80.6685 9.34356 80.5005 19.5833 81.393C24.7149 81.867 33.5706 82.7978 41.1895 83.6415C48.832 84.5408 55.1571 85.32 55.1316 86.0595Z"/>
						</svg>
					</span>
				</h1>
				<p class="mb-5">Baixe gratuitamente nosso aplicativo exclusivo para desfrutar de todos os recursos e comodidades que oferecemos.</p>
				<!-- Download app buttons 
				<div class="row g-2 mb-5">
				
					<div class="col-6 col-sm-4 col-md-3">
						<a href="#"> <img src="assets/images/elements/google-play.svg" class="btn-transition" alt="google-store"> </a>
					</div>
				
					<div class="col-6 col-sm-4 col-md-3">
						<a href="#"> <img src="assets/images/elements/app-store.svg" class="btn-transition" alt="app-store"> </a>
					</div>
				</div>
-->
				<!-- Global partner -->
				<div class="d-sm-flex gap-3 align-items-center">
					<h6 class="mb-3 mb-sm-0">Parceiros</h6>
					<ul class="list-inline flex-wrap mb-0">
						<li class="list-inline-item">
							<a href="#" class="btn btn-icon btn-lg btn-white bg-primary-hover shadow rounded-circle"><i class="bi bi-android ga-fw"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#" class="btn btn-icon btn-lg btn-white bg-primary-hover shadow rounded-circle"><i class="bi bi-apple ga-fw"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#" class="btn btn-icon btn-lg btn-white bg-primary-hover shadow rounded-circle"><i class="bi bi-slack ga-fw"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#" class="btn btn-icon btn-lg btn-white bg-primary-hover shadow rounded-circle"><i class="bi bi-google ga-fw"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#" class="btn btn-icon btn-lg btn-white bg-primary-hover shadow rounded-circle"><i class="bi bi-git ga-fw"></i></a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Hero Image -->
			<div class="col-lg-6 position-relative">
				<!-- Decoration -->
				<div class="bg-body shadow d-none d-sm-block heading-color fw-semibold position-absolute top-0 start-50 translate-middle mt-n6 px-3 py-2 ms-n4">
					<i class="bi bi-patch-check-fill text-primary me-2"></i>Seguro e verificado
				</div>
				<!-- Avatar decoration -->
				<div class="avatar avatar-lg position-absolute top-0 start-0 mt-n8 ms-8">
					<img class="avatar-img rounded-circle d-none d-md-block" src="assets/images/avatar/07.jpg" alt="avatar">
				</div>
				<!-- Avatar decoration -->
				<div class="avatar position-absolute bottom-50 start-0 mb-n8 ms-n5">
					<img class="avatar-img rounded-circle d-none d-lg-block" src="assets/images/avatar/07.jpg" alt="avatar">
				</div>
				<!-- Avatar decoration -->
				<div class="avatar position-absolute bottom-0 end-0 me-8">
					<img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
				</div>
				<!-- SVG decoration -->
				<figure class="position-absolute top-0 start-50">
					<svg width="42" height="54" viewBox="0 0 42 54" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path class="fill-mode" d="M17.1284 20.5293C11.8807 27.5916 6.85321 34.5787 1.34862 41.4719C0.678899 40.3825 0.678899 39.819 1.33945 39.0208C4.44037 35.33 7.48624 31.5922 10.4771 27.8076C12.4954 25.2531 14.3853 22.5766 16.422 19.8437C15.0734 18.2284 13.6514 16.6507 12.3761 14.9415C9.45872 11.0441 5.9633 7.71955 2.6422 4.2166C1.63303 3.15538 0.87156 1.84999 0 0.657293C0.66055 -0.263055 1.12844 -0.122185 1.66972 0.525815C2.80734 1.90634 3.99083 3.24929 5.15596 4.60164C8.74312 8.79016 12.3303 12.9787 15.9083 17.1766C16.2477 17.571 16.5505 18.003 17.156 18.7919C17.6055 18.1157 17.8716 17.6837 18.156 17.2705C20.7523 13.4576 23.3578 9.64477 25.9633 5.84129C26.2936 5.35294 26.6697 4.87399 27.1193 4.51712C27.3028 4.36686 27.7431 4.55468 28.3028 4.62042C25.2569 9.92651 21.6055 14.5282 18.0459 19.346C18.4954 19.9189 18.8624 20.4636 19.2936 20.9519C23.3394 25.4785 26.7523 30.4747 30.0367 35.5836C32.6605 39.6688 35.3028 43.754 38.0275 47.7829C39.2385 49.5672 40.6514 51.2107 42 52.9481C41.2844 54.291 40.8624 54.3662 40.0092 53.1077C37.6147 49.586 35.2202 46.0642 32.8991 42.5049C29.3395 37.0392 26 31.4138 22 26.258C20.5046 24.3234 18.8349 22.5296 17.1284 20.5293Z"/>
					</svg>
				</figure>

				<div class="row">
					<!-- Mockup 1 -->
					<div class="col-sm-6">
						<div class="iphone-x iphone-x-small rotate-sm-343 m-auto m-sm-0 ms-sm-5 mt-4 z-index-99" style="background: url(assets/images/mokeup/app-placeholder.jpg); background-size: 100%;">
							<i></i>
							<b></b>

							<!-- SVG decorayion -->
							<figure class="position-absolute bottom-0 start-0 mb-n7 ms-n6">
								<svg class="fill-mode mb-n3" width="103" height="104" viewBox="0 0 103 104" xmlns="http://www.w3.org/2000/svg">
									<path d="M102.067 67.8341C100.811 69.4168 99.0712 69.8069 97.1401 69.5024C93.8547 69.0105 90.5851 68.51 87.3361 67.8959C68.297 64.2927 50.1717 57.982 32.8669 49.3216C32.0793 48.9295 31.0206 48.6433 30.6773 48.0103C30.2297 47.147 30.362 45.9897 30.2318 44.9543C31.1056 45.0131 32.1719 44.783 32.8386 45.1793C42.5842 50.9955 53.0343 55.119 63.7656 58.7008C74.2035 62.1959 84.9894 64.212 95.7329 66.4149C97.74 66.8217 99.8864 66.5385 101.962 66.5802C101.993 67.0144 102.03 67.4242 102.067 67.8341Z"/>
									<path d="M25.2144 22.3383C27.2069 20.7868 28.2795 20.0003 29.9515 21.531C33.261 24.5289 36.5328 27.6088 40.1752 30.1601C50.4513 37.4091 60.6044 44.8477 71.7798 50.6874C75.3353 52.5484 79.1635 53.852 82.8785 55.4012C83.1402 55.5051 83.4469 55.5026 83.7305 55.5332C85.4991 55.803 85.8777 57.0314 85.3156 58.3807C84.7621 59.7459 83.6095 59.5517 82.395 58.9404C76.3471 55.8912 69.9372 53.3865 64.2353 49.8015C53.3501 42.9442 42.8255 35.5022 32.2414 28.2155C29.8887 26.6034 27.8456 24.5776 25.2144 22.3383Z"/>
									<path d="M85.7587 76.3091C84.2107 78.3774 82.8299 78.3684 80.9544 77.7878C71.7323 74.9442 62.4069 72.4025 53.198 69.4698C39.4789 65.1118 25.8717 60.4679 12.1659 56.0208C10.8442 55.5905 10.0136 55.1193 10.3226 53.6819C10.6328 52.2848 12.0873 51.8238 13.8127 52.5062C20.1406 54.9735 26.4758 57.4163 32.7879 59.8921C45.3387 64.8222 58.1372 68.9215 71.1861 72.2707C75.378 73.336 79.605 74.239 83.8201 75.2713C84.3739 75.4216 84.8548 75.8162 85.7587 76.3091Z"/>
								</svg>
							</figure>	
						</div>
					</div>
					<!-- Mockup 2 -->
					<div class="col-6 d-none d-sm-block">
						<div class="iphone-x iphone-x-small rotate-13 m-0 ms-3 mt-xl-n7" style="background: url(assets/images/mokeup/app-placeholder2.png); background-size: 100%;">
							<i></i>
							<b></b>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- =======================
Main Banner END -->

<!-- =======================
About START -->
<section class="pt-6 pt-lg-0 pb-0">
	<div class="container">
		<div class="row g-4 align-items-center">
			<!-- About images -->
			<div class="col-lg-6 position-relative order-2">
				<!-- Decoration -->
				<div class="bg-dark rounded d-none d-sm-flex align-items-center z-index-2 position-absolute top-0 end-0 me-8 px-3 py-2" style="max-width: 330px;">
					<!-- Avatar -->
					<div class="avatar avatar-sm flex-shrink-0 me-2">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
					</div>
					<p class="text-white small mb-0">Obtenha ajuda instantânea de nossa incrível equipe 🪒</p>
				</div>

				<!-- Decoration -->
				<div class="bg-white shadow rounded d-flex align-items-center px-3 py-2 position-absolute bottom-0 end-0 mb-4 me-5">
					<!-- Avatar -->
					<div class="avatar avatar-sm flex-shrink-0 me-2">
						<img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
					</div>
					<p class="text-dark small mb-0">Clientes satisfeitos 🤗</p>
				</div>

				<!-- SVG decoration -->
				<figure class="position-absolute top-0 end-0 mt-5 me-4">
					<svg width="161" height="159" viewBox="0 0 161 159" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path class="fill-mode" d="M25.5386 13.9089C23.5464 16.1653 22.3451 19.3502 22.4932 22.3567C22.8448 29.8923 30.8302 34.1332 37.0233 36.423C50.0784 41.2465 64.0338 43.1912 77.0903 48.1289C89.1527 52.6911 102.006 59.8378 105.507 73.2574C108.672 85.4796 104.643 99.5095 93.3895 105.945C87.0539 109.575 74.3135 112.401 69.0359 105.215C64.8602 99.5268 73.3331 94.6861 77.6354 93.0458C86.4861 89.6306 96.8613 89.7477 105.86 92.689C118.317 96.7733 129.091 106.995 134.006 119.132C136.082 124.261 137.559 130.382 136.88 135.962C136.74 137.067 138.905 138.255 139.079 136.845C141.136 120.047 128.666 103 114.963 94.7923C105.994 89.3955 95.1401 87.3394 84.8209 88.8208C78.5117 89.7293 69.2315 92.195 66.3738 98.7195C63.5529 105.13 70.8035 110.041 76.2035 111.211C85.7632 113.274 96.4128 109.031 102.457 101.538C110.229 91.8668 110.744 76.8274 104.665 66.1051C98.0233 54.4149 84.6323 48.5083 72.4805 44.4604C64.7228 41.8362 56.8009 39.841 48.9354 37.7883C41.7953 35.9222 33.0411 34.3881 27.5736 28.9349C23.8198 25.2049 23.9084 19.5704 27.3475 15.6506C28.137 14.7709 26.3281 13.0292 25.5386 13.9089Z"/>
						<path class="fill-mode" d="M131.181 128.512C134.051 131.523 136.392 134.842 138.299 138.524C138.571 139.056 139.801 140.115 140.248 139.199C142.034 135.536 143.801 131.853 145.587 128.189C144.916 127.793 144.207 127.397 143.536 127.001C143.539 127.267 143.542 127.533 143.545 127.8C143.556 128.752 145.665 130.073 145.65 128.779C145.647 128.512 145.644 128.246 145.641 127.979C145.633 127.218 144.093 125.703 143.591 126.791C141.805 130.455 140.039 134.137 138.253 137.801C138.902 138.026 139.552 138.251 140.202 138.476C138.1 134.414 135.47 130.735 132.33 127.421C131.213 126.285 130.121 127.394 131.181 128.512Z"/>
					</svg>
				</figure>

				<!-- Images -->
				<div class="row pe-md-6">
					<div class="col-6 position-relative">
						<!-- SVG decoration -->
						<figure class="position-absolute bottom-0 end-0 mb-7 d-none d-xl-block">
							<svg class="fill-mode" width="96" height="99" viewBox="0 0 96 99" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M66.5204 64.3653C68.4878 62.2239 69.8711 59.7411 70.3936 56.886C72.4225 45.5894 64.3072 35.5653 52.1035 36.6825C44.603 37.3653 38.9777 44.5653 39.8999 52.0446C40.6684 58.2205 45.9556 62.4101 51.8576 61.448C54.6549 60.9825 56.776 59.4929 58.0363 56.886C59.02 54.8377 58.7126 52.5101 57.2985 51.0205C55.7923 49.4377 51.8576 48.6308 49.798 49.4377C49.4599 49.5618 49.2447 50.2136 49.4599 50.5239C49.7673 50.9273 50.1054 51.2687 50.4743 51.6101C51.1506 52.2308 51.8576 52.8205 52.5031 53.4722C52.9028 53.8756 52.872 54.4032 52.4724 54.8067C51.5195 55.8618 50.3206 56.048 49.0603 55.6756C46.9393 55.0239 45.8019 53.4411 45.4023 51.2998C44.3571 45.7136 49.4292 42.0205 53.1487 41.7722C58.6511 41.3687 63.5694 44.7205 65.1679 49.9963C66.7356 55.086 65.2294 59.7411 60.9873 62.9377C59.7884 63.8377 58.4666 64.5515 57.0219 65.017C53.0872 66.3204 49.1525 66.3515 45.2793 65.017C37.9325 62.5032 34.1823 56.6377 35.1352 48.5998C35.7193 43.6963 37.7788 39.4446 41.0065 35.7825C42.3898 34.1998 43.8653 32.7101 46.0478 32.3067C46.14 32.3067 46.2015 32.2446 46.2937 32.2136C46.5089 32.0894 46.5396 31.5308 46.3245 31.3136C46.0478 30.9722 45.6789 30.7549 45.2793 30.7239C44.4493 30.5998 43.6501 30.7239 42.8201 31.0032C41.2832 31.5618 40.0536 32.4929 38.8855 33.6101C34.336 37.9239 31.6616 43.2308 31.0468 49.4998C30.1861 58.4377 34.2745 65.048 41.8365 68.7101C44.8182 70.1377 47.9844 70.7273 51.2736 70.7584C52.3494 70.6963 53.4253 70.6653 54.5012 70.5101C59.2351 69.8584 63.2928 67.9032 66.5204 64.3653Z"></path>
								<path d="M0.769309 44.5963C2.36777 45.8998 3.99697 47.2032 5.65692 48.4756C7.99313 50.2446 10.6367 51.0205 13.8337 51.1136C13.7722 51.1136 14.0488 51.1446 14.264 51.0825C14.4792 51.0205 14.7866 50.9274 14.8481 50.7412C14.9096 50.586 14.8173 50.2446 14.6944 50.0894C14.0796 49.5308 13.4955 48.9101 12.7885 48.4756C10.1449 46.8929 7.53204 45.3101 4.70399 44.0998C3.6281 43.6343 2.52147 43.3239 1.41484 42.9515C1.10745 42.8584 0.769309 42.8584 0.431173 42.8584C0.123776 42.8584 -0.152881 43.3549 0.00081747 43.6032C0.246735 43.9446 0.461913 44.3481 0.769309 44.5963Z"></path>
								<path d="M55.6683 15.2692C55.822 15.2692 56.0064 15.3002 56.1294 15.2071C56.6212 14.8657 56.8364 14.3071 57.0823 13.7795C58.4349 10.614 60.1563 7.66572 62.0007 4.77951C62.6462 3.78641 63.2303 2.79331 63.8451 1.8002C64.0602 1.45882 64.2447 1.05537 64.3676 0.68296C64.3984 0.558822 64.3369 0.372615 64.2447 0.217443C64.091 -0.0308331 63.8143 0.00020143 63.5991 0.0933049C63.384 0.186408 63.1688 0.341581 62.9536 0.465719C58.0967 3.91055 56.1601 8.93813 55.4531 14.6795C55.4839 14.7726 55.4839 14.9278 55.5453 15.114C55.5453 15.1761 55.6376 15.2692 55.6683 15.2692Z"></path>
								<path d="M24.5905 26.6586C23.3916 23.0896 22.1928 19.5207 20.9325 15.9827C20.3791 14.4 19.6721 12.8793 18.9959 11.3586C18.8729 11.0793 18.627 10.831 18.4425 10.6138C18.2274 10.7069 18.0122 10.7379 17.9507 10.831C17.7048 11.2034 17.797 11.6379 17.8278 12.0414C18.2888 17.9689 20.6251 23.1827 23.8835 28.0551C23.9757 28.1793 24.0986 28.3345 24.2216 28.3965C24.3446 28.4586 24.5597 28.5517 24.6827 28.4896C24.8057 28.4586 24.9286 28.2414 24.8979 28.1172C24.8364 27.6207 24.7442 27.1241 24.5905 26.6586Z"></path>
								<path d="M56.5302 83.9173C56.4072 83.8862 56.1613 83.9483 56.0998 84.0414C55.7924 84.7241 55.4851 85.4069 55.2699 86.1207C54.6243 88.1379 53.8251 90.0621 52.3189 91.5828C51.9192 91.9862 51.6119 92.5138 51.2737 93.0104C50.3208 94.4069 49.6753 95.9586 49.0912 97.5104C48.9682 97.8207 48.9682 98.1621 48.9375 98.5035C48.9375 98.6586 48.999 98.9379 49.0912 98.9379C49.3064 99 49.6445 99.0311 49.7675 98.9069C51.1815 97.2621 52.5033 95.5241 54.0095 93.9724C55.9461 91.8931 56.8376 89.4724 56.8683 86.6793C56.8683 86.3379 56.9298 85.9966 56.9606 85.469C56.9298 85.1897 56.9298 84.6931 56.8683 84.1966C56.8376 84.0724 56.6532 83.9173 56.5302 83.9173Z"></path>
								<path d="M80.4469 37.086C81.031 37.1481 81.615 37.1791 82.1683 37.055C83.8897 36.7136 85.6112 36.6205 87.3633 36.7136C89.8533 36.9308 92.3124 36.4033 94.7716 36.124C95.079 36.0929 95.4171 35.9377 95.6938 35.7826C95.8167 35.7205 96.0319 35.4722 96.0012 35.4412C95.8782 35.2239 95.7245 35.0067 95.5401 34.9136C95.3249 34.7895 95.079 34.7584 94.8331 34.7274C92.5276 34.4791 90.2221 34.2619 87.9166 34.0446C85.2423 33.7653 82.8753 34.7895 80.5391 35.8446C80.3854 35.9067 80.2625 36.0308 80.1702 36.155C80.078 36.2791 79.9551 36.4964 80.0165 36.5895C80.078 36.7757 80.2625 37.055 80.4469 37.086Z"></path>
								<path d="M78.4176 68.4311C78.2332 68.6173 78.1717 68.8656 78.3254 69.1139C78.4484 69.3311 78.5713 69.5484 78.7865 69.7035C80.7231 71.1001 82.0141 72.9932 83.2437 75.0104C84.3196 76.8104 85.7951 78.269 87.3936 79.6346C87.6088 79.8208 87.9469 80.069 88.2543 79.7587C88.3773 79.6035 88.4387 79.2311 88.3773 79.0759C87.0247 76.5001 85.7644 73.8621 84.0737 71.4725C82.8134 69.7346 80.8768 68.9277 78.9709 68.2139C78.6943 68.2759 78.5406 68.338 78.4176 68.4311Z"></path>
								<path d="M18.9031 80.3173C16.1058 81.0621 13.8311 82.6759 11.8023 84.7242C11.7408 84.7863 11.6793 84.8483 11.6793 84.9104C11.6486 84.9725 11.6486 85.0966 11.6793 85.1587C11.7715 85.2518 11.9252 85.4069 12.0174 85.4069C12.2634 85.3759 12.5093 85.2828 12.7245 85.1587C16.0443 83.1414 19.6409 82.0242 23.4526 81.5276C23.9444 81.4656 24.4363 81.3725 24.8974 80.7207C22.8071 79.7897 20.8397 79.7897 18.9031 80.3173Z"></path>
							</svg>
						</figure>
						<!-- Image -->
						<img src="images/10.jpg" class="rounded-pill" alt="about-img">
					</div>
					<div class="col-6 mt-8">
						<img src="images/11.jpg" class="rounded-pill" alt="about-img">
					</div>
				</div>
			</div>

			<!-- About content -->
			<div class="col-lg-6 order-lg-2">
				<!-- Title -->
				<h2 class="mb-4 mb-lg-5">RR Imagem Masculina</h2>
				<p class="mb-4 mb-lg-5">Agende com elegância e praticidade com apenas um clique na RR Imagem Masculina.</p>
				
				<!-- Counter -->
				
	
				<a class="btn btn-dark btn-lg mb-0" href="RR_IMAGEM_MASCULINA_FINAL.apk" download>Download</a>
			</div>
		</div>
	</div>
</section>
<!-- =======================
About END -->

<!-- =======================
Steps START -->
<section class="pb-0">
	<div class="container">
		<!-- Title -->
		<div class="inner-container-small text-center mb-4 mb-sm-5">
			<h2 class="mb-4">Agende com facilidade em apenas três simples passos.</h2>
			<p class="mb-0">Facilite sua vida com nosso sistema de agendamento em 3 etapas simples. Em poucos cliques, você pode marcar seu compromisso de forma rápida e conveniente. Experimente agora!</p>
		</div>

		<!-- Slider START -->
		<div class="swiper" data-swiper-options='{
			"spaceBetween": 30,
			"pagination":{
				"el":".swiper-pagination"
			},
			"breakpoints": {
				"576": {"slidesPerView": 1}, 
				"768": {"slidesPerView": 2}, 
				"992": {"slidesPerView": 3}
			}}'>

			<!-- Slider items -->
			<div class="swiper-wrapper">
				<!-- Step item -->
				<div class="swiper-slide h-100">
					<div class="card bg-light overflow-hidden p-4 p-sm-5 h-100">
						<!-- Card body -->
						<div class="card-body p-0 pb-5">
							<!-- Number -->
							<div class="icon-lg bg-dark rounded-circle fw-bold text-white mb-3">01</div>
							<h5>Download app</h5>
							<p class="heading-color">Baixe nosso aplicativo exclusivamente para dispositivos Android e aproveite uma experiência de agendamento simplificada. Em breve estará disponível para outras plataformas. Aguarde as novidades!</p>

							<!-- Buttons -->
					
							<a href="#"><i style="font-size: 40px;" class="bi bi-android  me-3" alt="icon-img"></i></a>
							<a href="#"><i style="font-size: 40px;" class="bi bi-apple  me-3" alt="icon-img"></i></a>
							<a href="#"><i style="font-size: 40px;" class="bi bi-windows me-3" alt="icon-img"></i></a>

					
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-transparent p-0">
							<div class="iphone-x iphone-x-small rotate-335 m-auto mb-n9 me-n5 mt-4" style="background: url(assets/images/mokeup/app-placeholder3.jpg); background-size: 100%; width: 280px; height:430px">
								<i></i>
								<b style="left: 5%;"></b>
							</div>
						</div>
					</div>
				</div>

				<!-- Step item -->
				<div class="swiper-slide h-100">
					<div class="card bg-light overflow-hidden p-4 p-sm-5 h-100">
						<!-- Card body -->
						<div class="card-body p-0 pb-5">
							<!-- Number -->
							<div class="icon-lg bg-dark rounded-circle fw-bold text-white mb-3">02</div>
							<h5>Sem criar Conta</h5>
							<p class="heading-color">Agende rapidamente sem a necessidade de criar uma conta. Simplificamos o processo para tornar sua experiência mais ágil e conveniente. Experimente agora!</p>

							<!-- Buttons -->
						
							
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-transparent p-0">
							<div class="iphone-x iphone-x-small m-auto mb-n9 mt-4" style="background: url(assets/images/mokeup/app-placeholder4.jpg); background-size: 100%; width: 280px; height:430px">
								<i></i>
								<b style="left: 5%;"></b>
							</div>
						</div>
					</div>
				</div>

				<!-- Step item -->
				<div class="swiper-slide h-100">
					<div class="card bg-light overflow-hidden p-4 p-sm-5 h-100">
						<!-- Card body -->
						<div class="card-body p-0 pb-5">
							<!-- Number -->
							<div class="icon-lg bg-dark rounded-circle fw-bold text-white mb-3">03</div>
							<h5>Tudo pronto!</h5>
							<p class="heading-color mb-2">Aproveite a incrível experiência da RR Imagem Masculina e comece a explorar nosso app hoje mesmo.</p>

						
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-transparent p-0 mb-n9 ms-n5 mt-4">
							<div class="iphone-x iphone-x-small rotate-33 m-auto" style="background: url(assets/images/mokeup/app-placeholder.jpg); background-size: 100%; width: 280px; height:430px">
								<i></i>
								<b style="left: 5%;"></b>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<!-- Slider Pagination -->
			<div class="swiper-pagination swiper-pagination-primary position-relative mt-4"></div>
		</div> <!-- Slider END -->
	</div>
</section>
<!-- =======================
Steps END -->

<!-- =======================
Features START -->
<section class="pb-0">
	<div class="container">
		<!-- Title -->
		<div class="inner-container-small text-center mb-9">
			<h2 class="mb-4">Mais praticidade!</h2>
			<p class="mb-0">"Baixe nosso aplicativo exclusivamente para dispositivos Android e aproveite uma experiência de agendamento simplificada. Em breve estará disponível para outras plataformas. Aguarde as novidades!"</p>
		</div>

		<div class="bg-dark rounded position-relative p-4 p-xl-6" data-bs-theme="dark">
			<!-- SVG decoration -->
			<figure class="position-absolute top-0 start-0 mt-n3 ms-8">
				<svg width="34" height="45" viewBox="0 0 34 45" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path class="fill-white" d="M15.1008 0.800049H15.0008C15.0008 8.60005 8.60078 14.9 0.800781 15V15.2C8.60078 15.3 14.9008 21.6 15.0008 29.4H15.2008C15.3008 21.6 21.6008 15.3 29.4008 15.2V15C21.5008 14.9 15.2008 8.60005 15.1008 0.800049Z"/>
					<path class="fill-dark" d="M29.4 14.2C22 14.2 15.9 8.1 15.9 0.7C15.9 0.3 15.6 0 15.1 0H15C14.6 0 14.3 0.3 14.2 0.7C14.2 8.1 8.1 14.1 0.7 14.2C0.3 14.2 0 14.5 0 15V15.2C0 15.6 0.3 15.9 0.7 16C8.1 16 14.2 22 14.2 29.4C14.2 29.8 14.5 30.1 15 30.1H15.2C15.6 30.1 15.9 29.8 16 29.4C15.9 22 22 16 29.4 15.9C29.8 15.9 30.1 15.6 30.1 15.1V15C30.1 14.5 29.8 14.2 29.4 14.2ZM15 25.1C13.5 20.3 9.7 16.5 5 15.1C9.8 13.6 13.6 9.9 15 5.1C16.5 9.9 20.3 13.7 25 15.1C20.3 16.5 16.5 20.3 15 25.1Z"/>
					<path class="fill-white" d="M25.3977 28.7H25.2977C25.2977 32.9 21.7977 36.4 17.5977 36.4V36.5C21.7977 36.5 25.2977 40 25.2977 44.2H25.3977C25.3977 40 28.8977 36.5 33.0977 36.5V36.4C28.7977 36.3 25.3977 32.9 25.3977 28.7Z"/>
					<path class="fill-dark" d="M33.0992 35.5999C29.2992 35.5999 26.1992 32.4999 26.0992 28.5999C26.0992 28.1999 25.7992 27.8999 25.2992 27.8999H25.1992C24.7992 27.8999 24.4992 28.1999 24.3992 28.5999C24.3992 32.3999 21.2992 35.4999 17.3992 35.5999C16.9992 35.5999 16.6992 35.8999 16.6992 36.3999V36.4999C16.6992 36.8999 16.9992 37.1999 17.3992 37.2999C21.1992 37.2999 24.2992 40.3999 24.3992 44.2999C24.3992 44.6999 24.6992 44.9999 25.1992 44.9999H25.2992C25.6992 44.9999 25.9992 44.6999 26.0992 44.2999C26.0992 40.4999 29.2992 37.3999 33.0992 37.2999C33.4992 37.2999 33.7992 36.9999 33.7992 36.4999V36.3999C33.7992 35.8999 33.4992 35.5999 33.0992 35.5999ZM25.2992 40.8999C24.3992 38.8999 22.7992 37.2999 20.7992 36.3999C22.7992 35.4999 24.3992 33.8999 25.2992 31.9999C26.1992 33.9999 27.7992 35.5999 29.7992 36.3999C27.7992 37.2999 26.1992 38.8999 25.2992 40.8999Z"/>
				</svg>
			</figure>

			<!-- SVG decoration -->
			<figure class="position-absolute bottom-0 end-0 me-8 d-none d-xl-block">
				<svg width="77" height="84" viewBox="0 0 77 84" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path class="fill-white" d="M34.6405 38.5112C35.5587 37.7651 36.2958 37.2248 36.9554 36.6074C40.1497 33.6358 43.9389 31.8735 48.1937 30.973C53.8581 29.7767 61.1521 34.5877 61.7987 40.0162C61.8763 40.6337 61.9927 41.3026 61.8246 41.8686C60.7253 45.3289 59.626 48.8279 57.2335 51.645C50.2888 59.8521 41.6887 65.5378 31.2651 68.4965C29.5192 68.9982 27.9544 70.1044 26.2861 70.902C25.8334 71.1207 25.3291 71.2365 24.6695 71.468C23.803 68.072 21.7856 65.3063 21.1519 61.8202C20.6475 59.0288 18.7206 56.5075 17.4791 53.8447C16.0824 50.8732 14.4399 47.966 13.4441 44.853C12.707 42.5504 12.8363 39.9648 12.6035 37.5078C12.5518 37.0061 12.7587 36.4659 12.6811 35.977C12.0474 31.5648 14.427 28.4775 17.3756 25.7504C18.2033 24.9914 19.6517 24.4512 20.7639 24.5283C26.4542 24.94 31.0064 27.1783 32.9851 32.9669C33.5541 34.6392 33.9938 36.3372 34.6405 38.5112ZM33.4119 42.9363C32.9075 40.8652 32.6618 39.4502 32.1962 38.1124C31.3168 35.5911 30.5409 32.9798 29.2864 30.6515C27.6569 27.6542 23.0659 25.789 20.2208 26.8052C17.0394 27.9501 15.0736 30.4199 14.5951 33.6744C14.0649 37.3792 14.2589 41.174 15.7202 44.6729C18.6301 51.645 21.6951 58.5528 24.7342 65.4606C25.0963 66.2711 25.6524 66.9914 26.0921 67.6861C34.7698 65.1519 35.2354 66.1424 46.6806 58.6429C52.358 54.9253 56.8585 50.0242 59.1993 43.4766C60.3115 40.3636 59.5743 37.1219 57.0783 35.3724C54.0004 33.2113 50.5474 32.208 46.7841 33.3786C42.206 34.8064 38.378 37.3534 35.5199 41.2512C35.1448 41.7786 34.4853 42.1002 33.4119 42.9363Z"/>
					<path class="fill-white" d="M63.8803 10.1463C64.5657 9.59312 65.5486 8.98853 66.2987 8.17811C68.4843 5.83692 71.0578 5.93983 73.7219 6.9432C76.0368 7.81793 76.955 9.5288 76.9809 12.0244C77.0326 15.3175 75.6877 18.0832 73.6702 20.5144C71.2389 23.4602 68.6265 26.2773 66.053 29.1074C64.3329 30.9983 63.5699 31.1012 61.7723 29.3904C60.2851 27.9754 58.9013 26.3931 57.6727 24.7466C56.0561 22.6112 54.4784 20.4115 53.1463 18.096C50.6892 13.7996 50.7409 10.6865 55.8751 6.99465C57.621 5.73401 59.2375 6.73738 60.7248 7.6507C61.7723 8.30675 62.6776 9.18148 63.8803 10.1463ZM63.8544 27.8853C66.7901 24.5536 69.6482 21.5821 72.1571 18.3533C73.2563 16.9383 73.8642 15.0345 74.2909 13.2593C74.8082 11.0853 73.7607 9.76035 71.5622 9.19435C68.5748 8.40966 65.6262 10.4035 65.0572 13.7224C64.7985 15.2403 64.6433 16.7325 63.0914 18.2633C62.5871 17.1184 62.1344 16.2951 61.8499 15.4075C61.3455 13.851 61.2162 12.1015 60.4273 10.7251C59.0048 8.26816 56.664 8.24243 54.8276 10.3907C53.6378 11.78 53.1851 13.4265 54.0645 14.9959C56.6381 19.5754 59.3151 24.1034 63.8544 27.8853Z"/>
					<path class="fill-white" d="M10.4055 5.05247C12.0867 3.81755 13.561 2.54405 15.2293 1.59213C16.4579 0.884628 17.8934 0.498717 19.2772 0.112806C20.6609 -0.273105 21.6309 0.357216 22.3292 1.605C24.2044 4.96242 23.4543 8.15262 21.2688 10.854C18.5529 14.2243 15.4491 17.273 12.4747 20.4375C11.5953 21.3636 10.5348 21.1578 9.75885 20.3346C7.14649 17.5817 4.52119 14.8417 2.08989 11.9346C0.848368 10.4552 -0.0957034 8.6929 0.00775651 6.59611C0.0982839 4.82092 0.0853517 3.00714 2.15455 2.19673C4.32721 1.34772 6.42227 1.38631 8.29748 2.89137C9.06049 3.50882 9.69419 4.31924 10.4055 5.05247ZM11.8798 11.4972C9.77178 9.88922 9.15102 11.8702 8.0259 12.5777C6.06016 10.4038 8.19402 8.84726 8.58199 6.80193C8.03883 6.19734 7.3922 5.42552 6.68092 4.71801C5.73685 3.77896 4.66345 3.85614 3.55126 4.44788C2.43906 5.03961 2.11575 6.00438 2.49079 7.07207C2.9693 8.4099 3.4478 9.85063 4.32721 10.9312C5.8791 12.8479 7.67672 14.5716 9.48727 16.2696C10.108 16.8485 11.0262 17.1058 12.022 17.6203C14.5827 14.9061 17.0398 12.3976 19.3547 9.77345C20.079 8.93731 20.5445 7.81817 20.9196 6.75048C21.6697 4.65369 21.3076 3.9076 19.122 2.49259C18.6823 2.67268 18.1908 2.85278 17.7123 3.04573C14.2335 4.52506 11.1814 6.31311 11.8798 11.4972Z"/>
					<path class="fill-white" d="M56.8976 83.9972C54.7378 79.8679 51.8022 76.369 50.3279 72.0596C50.0045 71.0949 49.8752 70.0272 49.8752 68.9981C49.8623 66.8241 50.4313 64.8946 52.6298 63.8526C55.0094 62.7335 57.3631 63.0422 59.2771 64.8174C60.0919 65.5763 60.7773 66.4897 61.4627 67.2615C63.2474 65.988 64.8381 64.6887 66.584 63.6339C70.6318 61.1769 74.2529 62.875 74.9384 68.1491C75.3781 71.5708 74.4469 74.8639 71.3819 76.9221C68.7308 78.6973 65.8986 80.241 63.0534 81.6817C61.2299 82.595 59.2125 83.1353 56.8976 83.9972ZM59.3806 72.2397C59.3806 71.3393 59.4194 70.4388 59.3677 69.5512C59.2513 67.0685 56.8717 64.9717 54.6214 65.3191C52.4617 65.6664 51.6211 67.3773 52.0349 70.1172C52.591 73.8734 54.893 76.652 56.9881 79.5849C57.764 80.6655 58.734 80.5754 59.7427 80.2667C63.7388 79.0832 67.528 77.4367 70.6706 74.6452C72.4812 73.0373 73.3089 70.9276 72.895 68.5093C72.3389 65.2933 70.1921 64.1613 67.2565 65.5506C65.1485 66.554 63.5707 68.1619 62.3551 70.1558C61.7602 71.1463 61.3463 72.5227 59.3806 72.2397Z"/>
				</svg>
			</figure>

<style>

	.bg-yellow{
		background-color: #f6ac08;
	}

</style>

			<div class="row g-4">
				<!-- Features item -->
				<div class="col-md-6 col-lg-4 order-2">
					<div class="text-lg-end mb-4 mb-md-6">
						<div class="icon-lg bg-yellow text-white rounded ms-lg-auto mb-3"><i class="bi bi-shield-check fa-lg"></i></div>
						<h5 class="mb-3">Seus dados protegidos</h5>
						<p class="mb-0">Fique tranquilo sabendo que seus dados estão seguros e protegidos. Nossa tecnologia de criptografia de última geração garante a privacidade dos dados.</p>
					</div>

					<div class="text-lg-end">
						<div class="icon-lg bg-yellow text-white rounded ms-lg-auto mb-3"><i class="bi bi-fingerprint fa-lg"></i></div>
						<h5 class="mb-3">Pagamentos seguros</h5>
						<p class="mb-0">Pague com segurança com todos os principais métodos de pagamento. Oferecemos a máxima segurança para seus pagamentos.</p>
					</div>
				</div>
				
				<!-- Image and rating -->
				<div class="col-md-6 col-lg-4 text-center position-relative order-1 order-md-2">
					<!-- SVG decoration -->
					<figure class="position-absolute end-0 top-0 mt-n9 me-md-n4">
						<svg class="fill-mode" width="78" height="86" viewBox="0 0 78 86" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M58.1663 52.6936C57.2433 52.922 56.3362 53.183 55.4053 53.3705C49.0479 54.6836 43.0644 57.0976 37.1287 59.6911C34.0096 61.053 30.986 62.5537 28.1057 64.405C24.7877 66.5417 21.788 69.0862 19.0032 71.8836C15.4465 75.4475 11.9694 79.1012 8.50824 82.763C7.64095 83.6765 6.94872 84.7612 5.99391 86.0008C5.5722 84.8509 5.66768 84.125 6.25648 83.4236C7.16355 82.339 7.99901 81.1727 8.96973 80.1533C12.7253 76.2386 16.4809 72.324 20.3161 68.4909C22.8463 65.9627 25.8142 64.0053 28.9014 62.2927C35.7362 58.5085 42.9132 55.5073 50.3607 53.2319C52.1192 52.6936 53.9572 52.3919 55.7793 52.0983C56.559 51.9759 57.3786 52.1472 58.1743 52.188C58.1743 52.3592 58.1742 52.5224 58.1663 52.6936Z"/>
							<path d="M0.00390625 83.4154C1.49182 81.2949 3.07521 79.2316 4.43582 77.0215C5.40654 75.4393 6.11469 73.6858 6.87854 71.9813C8.15162 69.1351 9.40083 66.2806 10.5943 63.4017C11.0717 62.26 11.3741 61.0529 11.7799 59.8867C12.7665 57.0649 13.785 54.2512 14.7716 51.4294C15.7901 48.5016 16.2118 45.4596 16.4107 42.3686C16.4425 41.9119 16.3869 41.4063 16.5778 41.0311C16.7449 40.6967 17.1984 40.5092 17.5247 40.2563C17.7475 40.5907 18.0498 40.9088 18.1692 41.2839C18.2646 41.5694 18.1373 41.9282 18.1214 42.2545C17.8668 46.8949 16.5221 51.2745 14.9387 55.5806C13.2917 60.0498 11.6128 64.5109 9.75888 68.8986C7.77765 73.5961 5.50202 78.1551 2.05675 81.9637C1.48386 82.5998 0.823452 83.1544 0.210782 83.7498C0.139171 83.6274 0.0675602 83.5214 0.00390625 83.4154Z"/>
							<path d="M34.957 48.3875C34.1852 47.2294 34.3602 46.5117 34.7819 45.8103C35.4821 44.6359 36.1982 43.4697 36.9064 42.2953C38.9751 38.8292 41.0677 35.3794 43.0808 31.8889C44.0993 30.1191 45.0939 28.3167 45.8657 26.4328C46.3988 25.1361 46.542 23.6681 46.8523 22.2735C46.8762 22.1512 46.8046 22.0125 46.8125 21.882C46.8682 21.042 47.4809 20.3325 47.9185 20.6506C48.3084 20.936 48.7221 21.6292 48.6505 22.0451C48.4437 23.1869 48.1174 24.3613 47.6082 25.3889C45.6668 29.3036 43.6935 33.2019 41.6088 37.035C40.1209 39.7753 38.4182 42.3932 36.8348 45.0845C36.4767 45.688 36.2539 46.3731 35.9197 47.001C35.681 47.4088 35.3707 47.784 34.957 48.3875Z"/>
							<path d="M68.3681 68.0586C67.3019 68.1402 66.8802 67.7324 66.8563 66.8353C66.7847 63.9972 66.2675 61.2325 65.3843 58.5411C65.1536 57.8479 65.1377 57.1547 66.0129 57.0079C66.7052 56.8856 66.9996 57.4157 67.111 58.0763C67.5645 60.8573 68.0578 63.6302 68.4875 66.4194C68.567 66.9576 68.4079 67.5367 68.3681 68.0586Z"/>
							<path d="M61.1509 56.4287C60.9997 56.9588 60.944 57.5215 60.6894 57.9619C59.1696 60.6206 57.5862 63.2386 56.0506 65.8891C55.5732 66.7047 55.1594 67.561 54.6343 68.5478C53.8307 67.7404 53.4408 67.1043 54.1728 66.248C56.4484 63.5729 57.7693 60.3026 59.4402 57.2524C59.7823 56.6326 60.0926 56.1514 61.1509 56.4287Z"/>
							<path d="M12.2033 36.2847C12.4818 38.0544 12.458 38.0707 11.3042 38.5519C9.01269 39.5143 6.73706 40.4929 4.45348 41.4716C3.44297 41.9038 3.31566 41.8223 2.92578 40.4848C5.97322 39.1065 9.00474 37.7364 12.2033 36.2847Z"/>
							<path d="M31.7987 34.001C31.5998 34.5882 31.377 35.2407 31.194 35.7708C28.8627 35.0776 26.8019 34.4659 24.7411 33.8624C24.3751 33.7564 23.9215 33.7645 23.6669 33.5362C23.3805 33.2752 23.2611 32.8103 23.0781 32.4352C23.4441 32.2884 23.8579 31.9459 24.1841 32.0111C26.5393 32.5086 28.8866 33.0876 31.2338 33.6504C31.3452 33.6748 31.4486 33.7727 31.7987 34.001Z"/>
							<path d="M69.3222 55.915C69.8473 56.91 70.3009 57.8479 70.834 58.7368C71.5023 59.8378 72.1707 60.947 72.9743 61.9501C73.4438 62.5373 73.4517 63.0593 73.0459 63.4997C72.5765 64.0135 71.8843 63.8667 71.5501 63.3284C70.3327 61.3303 69.1392 59.3077 68.073 57.2281C67.6194 56.3391 68.2639 55.9314 69.3222 55.915Z"/>
							<path d="M52.9551 28.8386C51.873 28.3493 51.7457 27.6316 51.7059 26.8079C51.5786 24.5162 51.4354 22.2245 50.4487 20.0959C50.2259 19.6229 50.2419 19.0928 50.8307 19.0276C51.133 18.9949 51.6423 19.3375 51.7855 19.6392C52.1435 20.3977 52.4538 21.2214 52.5971 22.0533C52.9153 23.9209 53.1461 25.8048 53.3609 27.6887C53.3848 28.0068 53.1222 28.3656 52.9551 28.8386Z"/>
							<path d="M69.9609 53.24C71.5045 53.4928 72.8731 53.6967 74.2417 53.9332C75.1726 54.0963 76.0876 54.3328 77.0265 54.447C77.8699 54.553 78.0848 55.0179 77.9813 55.7845C77.8699 56.5919 77.2493 56.7958 76.7162 56.5348C74.8384 55.6377 72.8492 55.3523 70.8282 55.1321C70.0405 55.0505 70.0485 54.9853 69.9609 53.24Z"/>
							<path d="M20.6819 40.1992C21.5094 41.2431 22.321 42.1565 22.9973 43.1515C23.7293 44.2199 24.4056 45.3372 24.9706 46.4953C25.1377 46.8378 24.8671 47.4087 24.8035 47.8817C24.3738 47.7268 23.8168 47.6941 23.5543 47.3924C23.1007 46.8623 22.87 46.1446 22.4801 45.5492C21.7401 44.4238 21.0161 43.2657 20.1567 42.2299C19.4884 41.4225 19.4884 40.9087 20.6819 40.1992Z"/>
							<path d="M20.5234 20.0959C21.5101 20.2509 21.4146 21.0175 21.3271 21.4905C20.8019 24.3613 20.1813 27.2157 19.5845 30.1109C18.6695 30.3964 17.9295 30.1436 18.2399 29.1812C19.0833 26.547 19.3697 23.823 19.8551 21.1235C19.9187 20.7402 20.3086 20.414 20.5234 20.0959Z"/>
							<path d="M56.9658 14.5664C58.4538 14.86 59.9576 15.0884 61.4216 15.4554C62.3685 15.6919 62.6947 16.2954 62.3923 16.956C62.0661 17.6818 61.4057 17.5921 60.9204 17.3393C59.2813 16.4911 57.5626 16.2546 55.7644 16.3606C55.5257 16.3769 55.2154 16.3117 55.0483 16.1567C54.8414 15.9692 54.6107 15.6266 54.6345 15.382C54.6663 15.1454 54.9926 14.8111 55.2233 14.7785C55.7803 14.6887 56.3611 14.7458 56.9261 14.7458C56.942 14.6887 56.9499 14.6235 56.9658 14.5664Z"/>
							<path d="M28.1863 44.5381C27.7168 44.1874 27.1678 43.902 26.7859 43.4697C25.5526 42.0588 24.3909 40.5827 23.1815 39.1554C22.7836 38.6824 22.6484 38.1686 23.1417 37.8098C23.3804 37.6385 24.0488 37.7282 24.2636 37.9647C25.7038 39.449 27.1121 40.966 28.425 42.5645C28.7273 42.9315 28.6239 43.641 28.7114 44.1874C28.5284 44.3016 28.3534 44.4158 28.1863 44.5381Z"/>
							<path d="M60.49 47.9877C60.0603 47.8491 59.5113 47.8409 59.3283 47.5718C57.9915 45.59 56.1297 44.2525 53.9336 42.9476C54.4508 42.3604 54.8407 41.92 55.2146 41.4878C59.9569 45.223 60.6013 45.9978 60.49 47.9877Z"/>
							<path d="M13.0865 32.6066C12.6488 32.3049 12.1953 32.0357 11.7816 31.7014C10.4528 30.633 9.13196 29.5483 7.83501 28.4392C7.47695 28.1292 6.91998 27.6725 6.96772 27.3626C7.03138 26.9141 7.56448 26.5308 7.83501 26.1882C9.70484 27.7459 11.4474 29.1405 13.0944 30.633C13.4525 30.9592 13.4684 31.6851 13.6355 32.2233C13.4604 32.3538 13.2774 32.4843 13.0865 32.6066Z"/>
							<path d="M49.1122 8.72714C48.8576 8.28674 48.3563 7.83003 48.3882 7.4141C48.5632 5.20396 48.8497 2.99381 49.1441 0.791818C49.1759 0.547153 49.526 0.343264 49.8363 0.000732422C50.2341 0.685796 50.5365 1.21591 50.8468 1.75417C50.7513 1.75417 50.6479 1.76233 50.5524 1.76233C50.2898 4.02956 50.0193 6.2968 49.7567 8.55588C49.5419 8.61296 49.3271 8.67005 49.1122 8.72714Z"/>
							<path d="M51.2461 58.9816C53.3546 57.4076 55.4791 55.8254 57.5797 54.2595C58.4867 54.6591 58.3992 55.2463 57.9457 55.8335C57.6751 56.1761 57.2853 56.437 56.9272 56.7062C55.5507 57.7419 54.1662 58.7695 52.7738 59.7971C51.9781 60.3843 51.7792 60.2783 51.2461 58.9816Z"/>
							<path d="M68.8047 50.9075C69.2105 50.2958 69.5924 49.5618 70.1176 48.9665C71.2235 47.7105 72.433 46.5525 73.5549 45.3047C73.9527 44.8643 74.3744 44.5707 74.8677 44.9132C75.5361 45.3781 75.1542 46.0142 74.812 46.4464C74.3744 46.9929 73.7856 47.4169 73.2764 47.9063C72.2579 48.8931 71.2474 49.8962 70.2369 50.8912C69.8709 51.2664 69.5049 51.6986 68.8047 50.9075Z"/>
							<path d="M42.977 16.271C40.1763 16.32 38.1075 14.5013 35.625 13.8651C36.4127 12.1851 36.4048 12.2504 37.5664 12.7968C39.0146 13.4737 40.5025 14.0772 42.0143 14.6155C42.7065 14.852 43.1919 15.0885 42.977 16.271Z"/>
							<path d="M38.3477 8.30308C39.4298 6.71275 39.6923 6.79431 40.6631 8.25414C41.2917 9.19203 42.2783 9.88525 43.1138 10.6845C43.3843 10.9455 43.7662 11.1412 43.9333 11.4593C44.0447 11.6795 43.9651 12.1362 43.798 12.3401C43.6469 12.5195 43.1774 12.6337 42.9864 12.5276C42.326 12.1362 41.6815 11.6958 41.1246 11.1738C40.2016 10.2849 39.3422 9.32252 38.3477 8.30308Z"/>
							<path d="M15.1309 39.0085C14.192 42.0097 11.9562 44.0486 10.4524 46.691C9.64076 46.0222 9.93516 45.3535 10.2296 44.8478C11.3276 42.9639 12.5052 41.1289 13.6351 39.2613C13.9613 38.7312 14.3273 38.5273 15.1309 39.0085Z"/>
							<path d="M52.6367 18.106C52.9072 17.7879 53.0584 17.4699 53.2971 17.3802C53.5438 17.2823 53.9416 17.3149 54.1405 17.4617C54.427 17.6901 54.5623 18.0978 54.8089 18.3914C55.5568 19.2722 56.3287 20.1204 57.0766 20.9931C57.5619 21.5558 57.4744 22.5345 56.8697 22.8362C56.265 23.138 55.8592 22.9178 55.4852 22.2898C54.8964 21.2948 54.1485 20.3977 53.4881 19.4517C53.2016 19.0357 52.955 18.6035 52.6367 18.106Z"/>
							<path d="M26.6668 24.6467C27.2556 25.8374 27.3034 26.4083 26.4997 27.0689C25.2266 28.121 24.1047 29.3688 22.959 30.5758C22.3861 31.1793 21.9325 31.1467 21.3438 30.4698C22.959 28.4554 24.7333 26.6367 26.6668 24.6467Z"/>
							<path d="M38.871 21.7271C38.4732 21.197 38.1708 20.7893 37.7969 20.2836C38.1231 20.0063 38.3698 19.6312 38.6721 19.5659C40.2714 19.2397 41.8787 18.9869 43.4859 18.7177C43.6133 18.6933 43.7406 18.7096 43.8679 18.7014C44.4408 18.6851 44.9341 18.8646 44.9341 19.5251C44.9341 20.145 44.5283 20.4549 43.9156 20.3896C42.1492 20.2102 40.534 20.6669 38.871 21.7271Z"/>
							<path d="M63.9457 39.4002C63.9457 42.0263 63.9457 44.6605 63.9457 47.2213C63.0943 47.6291 62.6407 47.4578 62.6407 46.626C62.6407 44.6116 62.6328 42.5971 62.7442 40.5909C62.7681 40.1097 63.2216 39.6612 63.4762 39.1963C63.6274 39.2615 63.7865 39.3268 63.9457 39.4002Z"/>
							<path d="M69.0926 41.0229C68.5674 43.5267 68.0502 46.0222 67.533 48.5097C67.3898 48.5423 67.2466 48.5668 67.1034 48.5994C66.9204 48.1916 66.5305 47.7675 66.5782 47.3924C66.809 45.4595 67.1591 43.5348 67.4614 41.602C67.6047 40.6559 68.1537 40.6641 69.0926 41.0229Z"/>
							<path d="M57.0229 3.83393C55.901 5.49765 54.7791 7.15323 53.5856 8.93113C53.0286 8.79249 52.3205 8.7354 52.7899 7.75673C53.3946 6.49263 54.0312 5.23668 54.7314 4.02966C55.2883 3.05915 55.6623 3.04284 57.0229 3.83393Z"/>
							<path d="M60.7625 9.07794C60.5 9.53465 60.3408 10.1545 59.9509 10.4073C58.7654 11.1658 57.4844 11.7611 56.259 12.4462C55.71 12.7561 55.2008 12.7072 54.9939 12.1444C54.9064 11.8998 55.2644 11.337 55.5588 11.1331C56.7205 10.342 57.922 9.61621 59.1473 8.93114C59.4974 8.73541 59.9669 8.75172 60.3727 8.67017C60.5 8.80065 60.6352 8.9393 60.7625 9.07794Z"/>
							<path d="M14.238 22.9829C14.6438 23.929 14.8905 24.4346 15.0735 24.9565C15.4952 26.1717 15.8612 27.4114 16.2829 28.6265C16.5853 29.5073 16.5693 30.1761 15.169 30.2739C14.5642 28.4471 13.88 26.5877 13.3628 24.6793C13.2673 24.3367 13.8004 23.7985 14.238 22.9829Z"/>
							<path d="M62.9977 64.6905C61.836 64.3398 61.653 63.8097 61.7883 63.0593C62.0508 61.5832 62.2418 60.0989 62.5521 58.6391C62.6237 58.2884 63.0216 58.0111 63.2682 57.7012C63.491 58.0355 63.9366 58.3944 63.9048 58.688C63.6581 60.6698 63.3239 62.6353 62.9977 64.6905Z"/>
							<path d="M56.4428 48.3221C56.3552 49.3497 56.0767 49.9451 55.1219 49.5862C54.1194 49.2111 53.1248 48.787 52.162 48.3221C51.5812 48.0448 50.9287 47.637 51.3823 46.8296C51.7164 46.2261 52.2973 46.2751 52.8861 46.5768C54.0716 47.1885 55.2731 47.7594 56.4428 48.3221Z"/>
							<path d="M46.5422 10.4317C46.1921 10.2359 45.6829 10.1381 45.5078 9.8363C44.8952 8.78423 44.378 7.66693 43.8528 6.56593C43.5744 5.97873 43.8051 5.44862 44.3541 5.32629C44.6246 5.2692 45.1577 5.66882 45.301 5.98689C45.8977 7.31624 46.391 8.69452 46.9241 10.0565C46.8048 10.1788 46.6695 10.3012 46.5422 10.4317Z"/>
							<path d="M6.95703 34.0093C8.46881 33.4874 9.84533 33.6423 11.2059 33.7483C11.3969 33.7647 11.6436 34.1806 11.7072 34.4497C11.747 34.621 11.5003 35.0532 11.3889 35.0532C10.084 35.0451 8.77117 35.0043 7.47422 34.8901C7.30713 34.8738 7.17982 34.4089 6.95703 34.0093Z"/>
						</svg>
					</figure>

					<!-- Image -->
					<div class="iphone-x iphone-x-small m-auto mt-n9 mb-7" style="background: url(assets/images/mokeup/app-placeholder5.jpg); background-size: 100%;">
						<i></i>
						<b></b>
					</div>

					<!-- Rating -->
					<ul class="list-inline mb-2">
						<li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning fs-6"></i></li>
						<li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning fs-6"></i></li>
						<li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning fs-6"></i></li>
						<li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning fs-6"></i></li>
						<li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning fs-6"></i></li>
					</ul>
					<h6 class="mb-2">Nosso Super APP</h6>
					<p class="mb-0">Baixe agora mesmo!</p>
				</div>

				<!-- Features item -->
				<div class="col-md-6 col-lg-4 order-3">
					<div class="mb-4 mb-md-6">
						<div class="icon-lg bg-yellow text-white rounded mb-3"><i class="bi bi-gear fa-lg"></i></div>
						<h5 class="mb-3">Aplicativo totalmente funcional</h5>
						<p class="mb-0">Experimente o poder do nosso aplicativo móvel completo. Identifique problemas rapidamente, obtenha recomendações e acompanhe seu progresso.</p>
					</div>

					<div>
						<div class="icon-lg bg-yellow text-white rounded mb-3"><i class="bi bi-chevron-bar-contract fa-lg"></i></div>
						<h5 class="mb-3">Criptografia ponta a ponta</h5>
						<p class="mb-0">Proteja seus dados com criptografia ponta a ponta, mantendo suas informações confidenciais seguras e protegidas.</p>
					</div>
				</div>
			</div> <!-- Row END -->
		</div>
	</div>
</section>
<!-- =======================
Features END -->

<!-- =======================
Pricing START -->

<!-- =======================
Pricing END -->

<!-- =======================
Testimonials START -->

<!-- =======================
Testimonials END -->

<!-- =======================
CTA START -->
<section>
	<div class="container">
		<div class="bg-light rounded position-relative overflow-hidden p-4 p-sm-6">
			<!-- Decoration -->
			

			<div class="row g-4">
				<!-- Title and inputs -->
				<div class="col-lg-5">
					<!-- Title -->
					<h2 class="mb-4">Somente disponivel para Android™. Em breve em todas as plataformas.</h2>
					
					<!-- Download button -->
					
				</div>

				<!-- Content -->
				<div class="col-lg-5">
					<!-- Mobile image -->
					<div class="iphone-x iphone-x-small ms-lg-auto m-0 mb-n9" style="background: url(assets/images/mokeup/app-placeholder6.jpg); background-size: 100%; width: 280px; height:430px">
						<i></i>
						<b style="left:6%;"></b>
					</div>
				</div>
			</div> <!-- Row END -->
		</div>
	</div>
</section>
<!-- =======================
CTA END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
<footer>
	<div class="container">
		<div class="bg-dark rounded position-relative p-4 p-sm-6 mb-3 mb-sm-5" data-bs-theme="dark">
			<div class="row mx-auto">
				<div class="col-lg-8 mx-auto text-center px-0">
				
					<!-- Logo -->
					<a class="me-0" href="index.html">
						<img class="light-mode-item h-60px" src="https://i.imgur.com/jZClhu7.png" alt="logo">
						<img class="dark-mode-item h-60px" src="https://i.imgur.com/OA1fvSJ.png" alt="logo">
					</a>
					<p class="mt-4">Elevando sua imagem, inspirando confiança.</p>
					<!-- Links -->
					<ul class="nav justify-content-center mt-4 mt-md-0">
						
					</ul>
					<!-- Social media button -->
					<ul class="list-inline mb-0 mt-4">
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-facebook" href="#"><i class="fab fa-fw fa-facebook-f lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-instagram" href="#"><i class="fab fa-fw fa-instagram lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-twitter" href="#"><i class="fab fa-fw fa-twitter lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-linkedin" href="#"><i class="fab fa-fw fa-linkedin-in lh-base"></i></a> </li>
						<li class="list-inline-item"> <a class="btn btn-xs btn-icon bg-youtube" href="#"><i class="fab fa-fw fa-youtube lh-base"></i></a> </li>
					</ul>
					<!-- copyright text -->
					<div class="text-body mt-4">Copyrights ©<?php
                                                                // Obtém o ano atual
                                                                $ano_atual = date("Y");

                                                                // Exibe o ano atual
                                                                echo $ano_atual;
                                                                ?>
                    RR IMAGEM MASCULINA. <strong>Todos os direitos reservados</strong> <br>Desenvolvido e Projetado por <a href="https://adrieldias.netlify.app/" class="text-body-secondary">Adriel Dias</a>. </div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"></div>

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!--Vendors-->
<script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
<script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>

</body>

<!-- Mirrored from mizzle.webestica.com/index-mobile-app-showcase.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2024 16:59:44 GMT -->
</html>
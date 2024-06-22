<?php
date_default_timezone_set('America/Sao_Paulo');
// Inclua o arquivo de conexão com o banco de dados
$include_path = __DIR__ . '/BD/conexao.php';
include_once($include_path);

// Consulta para obter os barbeiros disponíveis
$sql = "SELECT id, nome FROM barbeiros WHERE disponibilidade = 'Disponível'";
$result = $conexao->query($sql);




//$dia_semana = array(
//   'Sunday'    => 'Domingo',
//    'Monday'    => 'Segunda',
//    'Tuesday'   => 'Terça',
//   'Wednesday' => 'Quarta',
//   'Thursday'  => 'Quinta',
//   'Friday'    => 'Sexta',
//   'Saturday'  => 'Sábado'
// );

// Obter o nome do dia atual em português BR
//echo $dia_atual = $dia_semana[date('l')];

// Consulta para obter os barbeiros disponíveis com base na tabela barber_days e no dia atual
/// $sql = "SELECT DISTINCT b.id, b.nome 
//     FROM barbeiros b
//   INNER JOIN barber_days bd ON b.id = bd.barber_id
//      WHERE b.disponibilidade = 'Disponível' AND bd.day = '$dia_atual'";

//  $result = $conexao->query($sql);
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
    <link rel="shortcut icon" href="https://i.imgur.com/7dBEuno.png">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

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
                        <a class="btn btn-sm btn-primary  mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            Marcar Horário <i class="fa-solid fa-angle-down"></i>
                        </a>

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
        <section class="pt-5 pt-xl-7">
            <!-- Slider START -->
            <div class="swiper overflow-hidden pt-5" data-swiper-options='{
			"autoplay":{
				"delay": 4000, 
				"disableOnInteraction": false
			},
			"pagination":{
				"el":".swiper-pagination",
				"clickable":"true"
			}}'>

                <div class="swiper-wrapper">
                    <!-- Slider item -->
                    <div class="swiper-slide">
                        <div class="card overflow-hidden h-400px h-xl-750px rounded-0" style="background-image:url(https://i.imgur.com/7JJpp4z.jpeg); background-position: center left; background-size: cover;">
                            <!-- Bg overlay -->
                            <div class="bg-overlay bg-dark opacity-5 d-lg-none"></div>
                            <!-- Card image overlay -->
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-11 col-lg-8 col-xl-5">

                                            <!-- Title -->
                                            <h1 class="text-white display-6 mb-4">🪒 Elevando sua imagem, inspirando confiança.</h1>

                                            <p class="text-white mb-4"> </p>
                                            <a class="btn btn-lg btn-outline-white icon-link icon-link-hover mb-0" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Reserve agora!<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slider item -->
                    <div class="swiper-slide">
                        <div class="card overflow-hidden  h-400px h-xl-750px  rounded-0" style="background-image:url(https://i.imgur.com/EZxKwYQ.jpeg); background-position: center left; background-size: cover;">
                            <!-- Bg overlay -->
                            <div class="bg-overlay bg-dark opacity-5 d-lg-none"></div>
                            <!-- Card image overlay -->
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-11 col-lg-8 col-xl-5 ms-auto">


                                            <!-- Title -->
                                            <h1 class="text-white display-4 mb-3">Feito para homens que prezam pelo estilo!</h1>


                                            <a class="btn btn-lg btn-dark icon-link icon-link-hover mb-0" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Marcar agora!<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider item -->
                    <div class="swiper-slide">
                        <div class="card overflow-hidden  h-400px h-xl-750px  rounded-0" style="background-image:url(https://i.imgur.com/4CFdfDq.gif); background-position: center left; background-size: cover;">
                            <!-- Bg overlay -->
                            <div class="bg-overlay bg-dark opacity-5 d-lg-none"></div>
                            <!-- Card image overlay -->
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-11 col-lg-8 col-xl-5 ms-auto">


                                            <!-- Title -->
                                            <h1 class="text-white display-4 mb-3">Feito para homens que prezam pelo estilo!</h1>


                                            <a class="btn btn-lg btn-dark icon-link icon-link-hover mb-0" data-bs-toggle="modal" data-bs-target="#myModal" href="#">Marcar agora!<i class="bi bi-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Pagination -->
                <div class="swiper-pagination swiper-pagination-line position-absolute bottom-0 mb-3"></div>
            </div>
            <!-- Slider END -->
        </section>

        <!-- =======================
Special offer START -->
        <section>
            <div class="container">
                <div class="row g-4">
                    <!-- Title -->
                    <div class="col-md-4">
                        <h2 class="text-center text-md-start">Serviços Essenciais</h2>
                        <!-- Slider arrow -->
                        <div class="d-flex justify-content-center justify-content-md-start gap-3 position-relative mt-5 mt-md-6">
                            <a href="#" class="btn btn-dark btn-icon rounded-circle mb-0 swiper-button-prev"><i class="bi bi-arrow-left"></i></a>
                            <a href="#" class="btn btn-dark btn-icon rounded-circle mb-0 swiper-button-next"><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="col-md-8">
                        <!-- Slider START -->
                        <div class="swiper" data-swiper-options='{
					"loop": false, 
					"spaceBetween": 30,
					"navigation":{
						"nextEl":".swiper-button-next",
						"prevEl":".swiper-button-prev"
					},
					"breakpoints": {
						"576": {"slidesPerView": 2}, 
						"768": {"slidesPerView": 2}, 
						"992": {"slidesPerView": 3}
					}}'>

                            <!-- Slider items -->
                            <div class="swiper-wrapper">

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                    <div class="card bg-transparent text-center p-0">
                                        <!-- Image -->
                                        <img src="https://i.imgur.com/6bmAilZ.png" class="px-5" alt="product-img" style="border-radius: 70px;">
                                        <div class="card-body p-0 mt-3">
                                            <!-- Title -->
                                            <h6 class="card-title mb-3"><a href="#">Cortes</a></h6>
                                            <!-- Price -->
                                            <div class="d-flex align-items-center justify-content-center mb-3">

                                                <span class="text-decoration">Desde cortes clássicos <br>até cortes modernos e<br> estilos mais elaborados.</span>
                                            </div>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Agendar</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                    <div class="card bg-transparent text-center p-0">
                                        <!-- Image -->
                                        <img src="https://i.imgur.com/XLi1Rmm.png" class="px-5" alt="product-img" style="border-radius: 70px;">
                                        <div class="card-body p-0 mt-3">
                                            <!-- Title -->
                                            <h6 class="card-title mb-3"><a href="#">Barba e Cuidados</a></h6>
                                            <!-- Price -->
                                            <div class="d-flex align-items-center justify-content-center mb-3">

                                                <span class="text-decoration">Barbear tradicional,<br> barba feita<br> com navalha.</span>
                                            </div>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Agendar</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                    <div class="card bg-transparent text-center p-0">
                                        <!-- Image -->
                                        <img src="https://i.imgur.com/FkqTKRD.png" class="px-5" alt="product-img" style="border-radius: 70px;">
                                        <div class="card-body p-0 mt-3">
                                            <!-- Title -->
                                            <h6 class="card-title mb-3"><a href="#">Tratamento Capilar</a></h6>
                                            <!-- Price -->
                                            <div class="d-flex align-items-center justify-content-center mb-3">

                                                <span class="text-decoration">Coloração de cabelo,<br> Hidratação profunda <br>e alisamento.</span>
                                            </div>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Agendar</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slider item -->
                                <div class="swiper-slide">
                                    <div class="card bg-transparent text-center p-0">
                                        <!-- Image -->
                                        <img src="https://i.imgur.com/fYah5ZY.png" class="px-5" alt="product-img" style="border-radius: 70px;">
                                        <div class="card-body p-0 mt-3">
                                            <!-- Title -->
                                            <h6 class="card-title mb-3"><a href="#">Sobrancelhas</a></h6>
                                            <!-- Price -->
                                            <div class="d-flex align-items-center justify-content-center mb-3">

                                                <span class="text-decoration">Modelagem <br>e limpeza de<br> sobrancelhas</span>
                                            </div>
                                            <!-- Button -->
                                            <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="modal" data-bs-target="#myModal">Agendar</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- Slider END -->
                    </div>

                </div>
            </div>
        </section>
        <!-- =======================
Special offer END -->




        <!-- =======================
Main Banner START -->
        <section class="pt-xl-8 pb-0">
            <div class="container pt-2 pt-sm-5">
                <!-- Hero START -->
                <div class="row g-4 g-xxl-5">
                    <!-- Hero content START -->
                    <div class="col-xl-6">
                        <!-- Title -->
                        <h1 class="mb-0 lh-base">Barbearia com agendamento
                            <span class="position-relative">digital
                                <!-- SVG START -->
                                <span class="position-absolute top-50 start-50 translate-middle z-index-n1 ms-n2 d-none d-sm-block">
                                    <svg width="182" height="53" viewBox="0 0 182 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-primary" d="M3.39646 26.6791C5.18665 34.7553 18.564 38.9851 25.9087 41.4254C46.0791 47.4215 67.3652 48.7695 88.3693 49.6062C104.15 50.0478 119.955 49.7573 135.662 48.1885C149.211 46.7243 164.06 45.5158 174.924 36.9051C179.694 33.0239 179.89 27.2834 175.537 22.9954C164.011 11.8166 134.166 7.57514 117.871 4.98378C99.9319 2.36919 81.7603 3.171 63.7112 4.27494C75.4946 4.49573 87.278 5.19295 98.9755 6.57578C103.978 7.27301 109.202 8.35371 113.297 11.3053C109.484 10.457 105.535 10.4338 101.649 10.1084C74.3665 7.19166 45.6622 4.62355 19.2875 13.5713C13.5245 15.8256 2.88147 19.5442 3.39646 26.6791ZM0 25.7727C1.02997 10.1897 38.4891 5.03027 51.6213 4.43763C49.4878 4.29818 47.3543 4.07739 45.233 3.78688C48.7766 2.79915 52.3938 2.04382 56.06 1.60224C63.466 0.939879 70.9088 0.753952 78.327 0.323997C91.0913 -0.349987 103.88 0.0102456 116.571 1.56738C132.45 4.10063 191.085 11.3983 180.797 34.918C178.664 38.8573 174.642 41.4603 170.645 43.5403C160.86 48.6068 149.591 49.8618 138.691 51.1285C122.42 52.7902 106.063 53.3131 89.7058 52.825C65.575 51.907 40.8311 50.501 18.0981 42.1459C10.8025 39.1943 0.122616 34.3834 0 25.7727Z">
                                    </svg>
                                </span>
                                <!-- SVG END -->
                            </span>

                        </h1>

                        <p class="mb-0 mt-4 mt-xl-5">Assim como um barbeiro habilidoso que esculpe com precisão a barba de um cliente, os profissionais digitais moldam e aprimoram websites, aplicativos e plataformas online para garantir uma experiência fluida e cativante para os usuários.</p>

                        <!-- Buttons -->
                        <div class="d-flex gap-1 gap-sm-3 flex-wrap mt-4 mt-xl-5">

                            <button class="btn btn-secondary-soft mt-3 mb-0" data-bs-toggle="modal" data-bs-target="#myModal" type="button">Agende um corte agora mesmo!</button>
                        </div>

                        <!-- Features -->
                        <ul class="list-inline d-flex flex-wrap gap-2 gap-sm-4 mb-0 mt-4 mt-xl-5">
                            <li class="list-inline-item heading-color"> <i class="bi bi-stopwatch me-1"></i>24/7 Suporte</li>
                            <li class="list-inline-item heading-color"> <i class="bi bi-fire me-1"></i>Agendamento Simples</li>
                            <li class="list-inline-item heading-color"> <i class="bi bi-life-preserver me-1"></i>Promoções Premium!</li>
                        </ul>
                    </div>
                    <!-- Hero content END -->

                    <!-- Hero image START -->
                    <div class="col-xl-6 text-center">
                        <img src="assets/images/elements/rr1.png" alt="hero-img">
                    </div>
                    <!-- Hero image END -->
                </div>
                <!-- Hero END -->

                <hr class="border-primary opacity-2 mt-sm-7 my-5"> <!-- Divider -->

                <!-- Client and skill sets START -->
                <div class="row">
                    <!-- Client -->
                    <div class="col-md-6 col-xl-7 mb-5 mb-md-0">
                        <p class="mb-0"><i class="bi bi-shield-check"></i>Acreditamos em ir além para superar. <b class="text-primary fs-6"></b></p>

                        <!-- Slider START -->
                        <div class="swiper mt-2 mt-md-4" data-swiper-options='{
						"loop": true, 
						"slidesPerView": 2, 
						"spaceBetween": 30, 
						"autoplay":{
							"delay": 2000, 
							"disableOnInteraction": false
						},
						"breakpoints": { 
							"576": {"slidesPerView": 3}, 
							"768": {"slidesPerView": 2}, 
							"992": {"slidesPerView": 3}, 
							"1200": {"slidesPerView": 4}
						}}'>

                            <!-- Slider items -->
                            <div class="swiper-wrapper align-items-center">
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/01.svg" class="px-3 ps-0" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/02.svg" class="px-3" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/03.svg" class="px-3" alt="client-img">
                                </div>
                                <!-- Image -->
                                <div class="swiper-slide">
                                    <img src="assets/images/client/04.svg" class="px-3" alt="client-img">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Skill sets -->
                    <div class="col-md-6 col-lg-5 col-xl-3 ms-auto text-md-end">
                        <!-- Title -->
                        <p class="mb-0 me-2">Confirmado pelos clientes <span class="badge bg-dark">Ativos</span></p>

                        <!-- Counter -->
                        <div class="d-flex justify-content-md-end mt-2 mt-md-4">
                            <!-- Counter item -->
                            <div>
                                <div class="d-flex justify-content-md-end">
                                    <h4 class="purecounter mb-0" data-purecounter-start="0" data-purecounter-end="80" data-purecounter-delay="300">0</h4>
                                    <span class="h4 mb-0">+</span>
                                </div>
                                <p class="mb-0">Clientes Ativos</p>
                            </div>

                            <div class="vr mx-3 mx-sm-4"></div> <!-- Divider -->

                            <!-- Counter item -->
                            <div>
                                <div class="d-flex justify-content-md-end">
                                    <h4 class="purecounter mb-0" data-purecounter-start="0" data-purecounter-end="56" data-purecounter-delay="300">0</h4>
                                    <span class="h4 mb-0">+</span>
                                </div>
                                <p class="mb-0">Parceiros</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client and skill sets END -->
            </div>
        </section>
        <!-- =======================
Main Banner END -->

        <!-- =======================
About START -->
        <section class="pb-0">
            <div class="container">
                <!-- Main title -->
                <div class="row mb-3 mb-xl-0">
                    <div class="col-xl-9">
                        <h4 class="lh-base mb-0">O Encontro Entre Modernidade e Tradição</h4>
                    </div>
                </div>

                <!-- About detail START -->
                <div class="row align-items-center">
                    <!-- Content -->
                    <div class="col-lg-7 pe-lg-5">
                        <p class="mb-5">No universo da estética masculina, onde a busca pela excelência no cuidado com a aparência encontra-se em constante evolução, a RR Imagem Masculina emerge como uma referência inigualável. </p>

                        <!-- Goal and Mission tab START -->
                        <div class="card card-body bg-light p-sm-5 h-100">
                            <!-- SVG decoration -->
                            <figure class="position-absolute bottom-0 end-0 mb-0 me-3 d-none d-sm-block">
                                <svg width="116" height="177" viewBox="0 0 116 177" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-mode" d="M54.2742 58.113H50.0625V177H54.2742V58.113Z">
                                        <path class="fill-mode" d="M62.0829 55.1344L57.9297 55.8303L78.1605 175.597L82.3137 174.901L62.0829 55.1344Z">
                                            <path class="fill-mode" d="M75.4696 136.02H28.2031V140.641H75.4696V136.02Z">
                                                <path class="fill-mode" d="M21.2999 174.91L25.4531 175.606L45.684 55.8399L41.5308 55.144L21.2999 174.91Z">
                                                    <path class="fill-primary" d="M91.1643 90.7959C111.953 70.0913 111.953 36.5225 91.1643 15.8179C70.3759 -4.88673 36.6713 -4.88673 15.8829 15.8179C-4.90549 36.5225 -4.90549 70.0913 15.8829 90.7959C36.6713 111.5 70.3759 111.501 91.1643 90.7959Z">
                                                        <path d="M103.519 35.0652L103.418 34.9452L103.338 34.8651L103.144 34.9385C103.164 34.9785 103.177 35.0119 103.184 35.0385C103.224 35.1319 103.258 35.2186 103.284 35.312L103.566 35.2119C103.559 35.1519 103.539 35.1052 103.519 35.0652ZM102.012 75.2055C102.066 75.1121 102.106 75.0121 102.146 74.9121C102.066 74.8387 101.985 74.7587 101.912 74.6786C101.872 74.7787 101.831 74.8787 101.778 74.9787C99.4276 80.1605 96.2404 84.8954 92.4036 89.0302C92.3433 89.1102 92.2697 89.1836 92.2027 89.2503C92.1425 89.3303 92.0688 89.4036 92.0019 89.4703L92.2764 89.6437C92.35 89.5704 92.417 89.5037 92.4773 89.4303L92.7317 89.5904C92.8054 89.517 92.8723 89.4503 92.9326 89.377C96.7827 85.2222 99.903 80.5273 102.247 75.3989C102.16 75.3455 102.079 75.2788 102.012 75.2055ZM103.519 35.0652L103.418 34.9452L103.338 34.8651L103.144 34.9385C103.164 34.9785 103.177 35.0119 103.184 35.0385C103.224 35.1319 103.258 35.2186 103.284 35.312L103.566 35.2119C103.559 35.1519 103.539 35.1052 103.519 35.0652ZM102.139 74.9121C102.059 74.8387 101.979 74.7587 101.905 74.6786C101.865 74.7787 101.825 74.8787 101.771 74.9787C99.4209 80.1605 96.2337 84.8954 92.3969 89.0302C92.3366 89.1102 92.263 89.1836 92.196 89.2503C92.1358 89.3303 92.0621 89.4036 91.9952 89.4703L92.2697 89.6437C92.3433 89.5704 92.4103 89.5037 92.4706 89.4303L92.725 89.5904C92.7987 89.517 92.8656 89.4503 92.9259 89.377C96.776 85.2222 99.8963 80.5273 102.24 75.3989C102.16 75.3389 102.079 75.2655 102.006 75.1988C102.059 75.1188 102.099 75.0188 102.139 74.9121ZM107.048 52.5845C106.994 48.0296 106.358 43.5614 105.166 39.2466C105.146 39.1466 105.112 39.0532 105.086 38.9665C105.066 38.8665 105.032 38.7665 105.005 38.6731C104.845 38.1129 104.684 37.5594 104.503 37.0059C104.349 36.5324 104.202 36.0722 104.028 35.6187C103.974 35.4453 103.914 35.2786 103.847 35.1186C103.813 35.0185 103.773 34.9185 103.746 34.8251C103.733 34.7918 103.726 34.7518 103.706 34.7251C103.686 34.6651 103.666 34.6117 103.633 34.5517C103.633 34.5117 103.613 34.4784 103.592 34.4383C103.559 34.345 103.532 34.2583 103.492 34.1649C103.459 34.0849 103.432 33.9915 103.398 33.9115C103.218 33.458 103.037 33.0045 102.843 32.551C102.588 31.9508 102.32 31.3573 102.032 30.7638C101.992 30.6704 101.952 30.5904 101.898 30.5037C101.865 30.4103 101.825 30.3236 101.778 30.2436C99.1732 24.8151 95.6779 19.9067 91.3657 15.6053C86.4442 10.7036 80.7326 6.86233 74.3514 4.18142C67.7626 1.40714 60.7587 0 53.5271 0C46.3022 0 39.2983 1.40714 32.6894 4.18142C26.3149 6.86899 20.5899 10.7103 15.6818 15.6053C15.2399 16.0454 14.8047 16.4989 14.3761 16.9524C14.3159 17.0258 14.2422 17.0925 14.1752 17.1658C14.115 17.2392 14.0413 17.3059 13.9744 17.3859C13.519 17.8794 13.0771 18.3796 12.6486 18.8931C12.287 19.3065 11.9388 19.7267 11.6107 20.1535C11.5973 20.1668 11.5772 20.1735 11.5772 20.1935C11.5036 20.2669 11.4433 20.3469 11.3831 20.4269C11.3496 20.4603 11.3228 20.5003 11.3027 20.5403C11.2625 20.5803 11.229 20.6203 11.2023 20.6603C11.1688 20.7003 11.142 20.7337 11.1219 20.7737C11.0483 20.8537 10.988 20.9271 10.9411 21.0071C10.8809 21.0805 10.8273 21.1405 10.7871 21.2072C10.0974 22.1008 9.45463 23.0145 8.82521 23.9548C8.77165 24.0348 8.71138 24.1148 8.66451 24.2082C8.60425 24.2882 8.55068 24.3683 8.50381 24.4616C6.84992 27.0292 5.4036 29.7301 4.19834 32.571C1.41284 39.1266 0 46.109 0 53.3114C0 60.5005 1.41284 67.4829 4.21173 74.0651C6.91018 80.4139 10.767 86.1158 15.6818 91.0108C20.5899 95.8992 26.3149 99.7538 32.6894 102.428C32.9506 102.541 33.2117 102.648 33.4796 102.748C34.8054 103.288 36.1445 103.775 37.5105 104.189C41.5816 105.469 45.78 106.243 50.0653 106.503C51.2037 106.583 52.3687 106.623 53.5271 106.623C53.7816 106.623 54.0293 106.623 54.2838 106.609C58.3549 106.556 62.3657 106.056 66.2494 105.102C67.622 104.782 68.988 104.389 70.3272 103.949C71.6931 103.495 73.0323 102.995 74.3581 102.428C78.5498 100.667 82.4401 98.4134 86.0157 95.6658C86.1094 95.6124 86.1764 95.5524 86.2568 95.4857C86.3371 95.4323 86.4175 95.3723 86.4978 95.3056C88.2053 93.9785 89.8324 92.5514 91.3724 91.0108C91.7675 90.6174 92.1492 90.2239 92.5241 89.8238C92.5978 89.7504 92.6647 89.6837 92.725 89.6037C92.7987 89.5303 92.8656 89.4637 92.9259 89.3903C96.776 85.2356 99.8963 80.5406 102.24 75.4122C102.293 75.3189 102.334 75.2322 102.374 75.1321C102.427 75.0388 102.468 74.9387 102.508 74.8387C102.628 74.5853 102.742 74.3252 102.849 74.0651C104.363 70.4839 105.487 66.7826 106.184 62.988C106.217 62.7946 106.257 62.6079 106.284 62.4145C106.505 61.1474 106.679 59.8603 106.807 58.5732C106.84 58.2131 106.867 57.8463 106.9 57.4795C106.914 57.3794 106.92 57.2794 106.92 57.1794C106.934 57.086 106.94 56.986 106.94 56.8859C107.021 55.7122 107.061 54.5118 107.061 53.3181C107.061 53.0713 107.061 52.8246 107.048 52.5845ZM106.465 53.3114C106.465 54.5051 106.425 55.7055 106.344 56.8793C106.331 56.9793 106.331 57.0727 106.324 57.1727C106.311 57.2727 106.311 57.3728 106.304 57.4728C106.271 57.8863 106.231 58.2864 106.19 58.6999C106.057 59.927 105.896 61.1474 105.688 62.3545C105.655 62.5479 105.615 62.7279 105.574 62.928C104.838 66.9293 103.633 70.7707 102.039 74.3919C101.999 74.4919 101.959 74.5853 101.905 74.6853C101.865 74.7853 101.825 74.8854 101.771 74.9854C99.4209 80.1672 96.2337 84.9021 92.3969 89.0368C92.3366 89.1169 92.263 89.1902 92.196 89.2569C92.1358 89.3369 92.0621 89.4103 91.9952 89.477C90.1471 91.431 88.145 93.2383 86.0291 94.8855L85.788 95.0656C85.7077 95.1389 85.6273 95.1989 85.547 95.2456C80.9603 98.7268 75.8044 101.481 70.2267 103.335C68.8943 103.775 67.5283 104.169 66.1489 104.509C62.339 105.436 58.3616 105.956 54.2838 106.009C54.0293 106.023 53.7816 106.023 53.5271 106.023C52.3687 106.023 51.2037 105.983 50.0653 105.909C45.7532 105.629 41.5816 104.836 37.6109 103.588C36.245 103.155 34.9058 102.675 33.5934 102.128C14.2489 94.2853 0.595936 75.3589 0.595936 53.3114C0.595936 42.8279 3.68945 33.0512 8.99931 24.8351C9.03279 24.7817 9.05957 24.735 9.09305 24.695C9.12653 24.6417 9.14662 24.615 9.16671 24.5817C9.20688 24.5216 9.24706 24.4616 9.28054 24.4083C9.31402 24.3683 9.32071 24.3549 9.3341 24.3349C9.96352 23.3879 10.6063 22.4743 11.296 21.5806C11.3362 21.5206 11.3897 21.4473 11.45 21.3806C11.5036 21.3072 11.5638 21.2272 11.6241 21.1472C11.6576 21.1138 11.6844 21.0738 11.7178 21.0338C11.7312 21.0271 11.7379 21.0138 11.7513 20.9938C11.7714 20.9604 11.7915 20.9338 11.8116 20.9004C11.8451 20.8671 11.8719 20.8404 11.8919 20.8004C11.9522 20.727 12.0125 20.647 12.0727 20.567C12.1129 20.5336 12.1263 20.5136 12.1464 20.4869C12.903 19.5533 13.6798 18.633 14.49 17.7594C14.5502 17.686 14.6239 17.606 14.6908 17.5393C14.7511 17.4659 14.8248 17.3992 14.8917 17.3259C24.5204 7.02905 38.2872 0.580197 53.5271 0.580197C74.5121 0.580197 92.6714 12.8043 101.222 30.4503C101.276 30.5437 101.316 30.6237 101.356 30.7104C101.396 30.8038 101.436 30.8838 101.477 30.9705C101.959 31.9975 102.414 33.0512 102.843 34.1182C102.876 34.1983 102.903 34.2783 102.936 34.3717C102.976 34.465 103.017 34.5517 103.05 34.6451C103.063 34.6784 103.084 34.7184 103.084 34.7451C103.124 34.8185 103.144 34.8785 103.157 34.9252C103.177 34.9652 103.191 34.9985 103.197 35.0252C103.238 35.1186 103.271 35.2053 103.298 35.2986C103.378 35.512 103.452 35.7121 103.512 35.8988C103.867 36.8725 104.182 37.8728 104.47 38.8732C104.49 38.9665 104.523 39.0666 104.543 39.1533C104.577 39.2533 104.604 39.3467 104.624 39.4467C105.782 43.6681 106.418 48.1096 106.472 52.6712C106.465 52.8979 106.465 53.098 106.465 53.3114ZM102.012 75.2055C102.066 75.1121 102.106 75.0121 102.146 74.9121C102.066 74.8387 101.985 74.7587 101.912 74.6786C101.872 74.7787 101.831 74.8787 101.778 74.9787C99.4276 80.1605 96.2404 84.8954 92.4036 89.0302C92.3433 89.1102 92.2697 89.1836 92.2027 89.2503C92.1425 89.3303 92.0688 89.4036 92.0019 89.4703L92.2764 89.6437C92.35 89.5704 92.417 89.5037 92.4773 89.4303L92.7317 89.5904C92.8054 89.517 92.8723 89.4503 92.9326 89.377C96.7827 85.2222 99.903 80.5273 102.247 75.3989C102.16 75.3455 102.079 75.2788 102.012 75.2055ZM103.519 35.0652L103.418 34.9452L103.338 34.8651L103.144 34.9385C103.164 34.9785 103.177 35.0119 103.184 35.0385C103.224 35.1319 103.258 35.2186 103.284 35.312L103.566 35.2119C103.559 35.1519 103.539 35.1052 103.519 35.0652ZM102.012 75.2055C102.066 75.1121 102.106 75.0121 102.146 74.9121C102.066 74.8387 101.985 74.7587 101.912 74.6786C101.872 74.7787 101.831 74.8787 101.778 74.9787C99.4276 80.1605 96.2404 84.8954 92.4036 89.0302C92.3433 89.1102 92.2697 89.1836 92.2027 89.2503C92.1425 89.3303 92.0688 89.4036 92.0019 89.4703L92.2764 89.6437C92.35 89.5704 92.417 89.5037 92.4773 89.4303L92.7317 89.5904C92.8054 89.517 92.8723 89.4503 92.9326 89.377C96.7827 85.2222 99.903 80.5273 102.247 75.3989C102.16 75.3455 102.079 75.2788 102.012 75.2055ZM103.519 35.0652L103.418 34.9452L103.338 34.8651L103.144 34.9385C103.164 34.9785 103.177 35.0119 103.184 35.0385C103.224 35.1319 103.258 35.2186 103.284 35.312L103.566 35.2119C103.559 35.1519 103.539 35.1052 103.519 35.0652Z" fill="#202124">
                                                            <path d="M83.5774 83.2415C100.177 66.7091 100.177 39.9047 83.5774 23.3723C66.9781 6.83984 40.0652 6.83984 23.4659 23.3723C6.86657 39.9047 6.86657 66.7091 23.4659 83.2415C40.0652 99.7739 66.9781 99.7739 83.5774 83.2415Z" fill="white">
                                                                <path d="M79.8329 86.1626C79.5784 86.3626 79.3173 86.5627 79.0561 86.7628L79.19 86.8762L79.3039 86.9762C79.4646 86.8561 79.6253 86.7361 79.7793 86.6161L79.9601 86.4627L81.4131 84.8421C80.8908 85.2956 80.3685 85.7358 79.8329 86.1626ZM79.8329 86.1626C79.5784 86.3626 79.3173 86.5627 79.0561 86.7628L79.19 86.8762L79.3039 86.9762C79.4646 86.8561 79.6253 86.7361 79.7793 86.6161L79.9601 86.4627L81.4131 84.8421C80.8908 85.2956 80.3685 85.7358 79.8329 86.1626ZM93.8005 38.8132C93.6465 38.4131 93.4992 38.0196 93.3452 37.6261C93.2247 37.3127 93.1042 37.0126 92.9702 36.7125C90.8075 31.6308 87.7206 27.0759 83.7901 23.1612C79.8596 19.2466 75.2863 16.1722 70.184 14.0248C64.9144 11.8041 59.3099 10.677 53.5179 10.677C50.9132 10.677 48.3353 10.9104 45.8109 11.3706C45.7172 11.3839 45.6167 11.4039 45.5163 11.4239C45.4159 11.4439 45.3221 11.4639 45.2217 11.4839C44.0298 11.704 42.858 11.9841 41.6996 12.3309C41.5791 12.3642 41.4854 12.3842 41.3983 12.4243C41.3581 12.4243 41.3247 12.4376 41.2845 12.4576C41.2242 12.4709 41.1706 12.4909 41.1104 12.511C41.0702 12.511 41.0367 12.5243 40.9966 12.5443C40.9028 12.5643 40.8158 12.5977 40.7153 12.6377C40.635 12.6577 40.5412 12.6777 40.4609 12.7177C40.327 12.751 40.1863 12.7977 40.0591 12.8377C39.1485 13.1378 38.2445 13.4713 37.354 13.8447C37.2602 13.8781 37.1598 13.9181 37.0728 13.9581C36.9991 13.9915 36.9321 14.0181 36.8585 14.0515C36.8384 14.0648 36.8183 14.0715 36.7982 14.0715C31.716 16.2122 27.1628 19.2933 23.2524 23.1812C22.0739 24.355 20.9691 25.5821 19.9513 26.8625C19.6902 27.1959 19.429 27.536 19.1746 27.8762C17.1256 30.6038 15.4182 33.5714 14.0723 36.7258C11.8425 41.9876 10.7109 47.5695 10.7109 53.3248C10.7109 59.0801 11.8425 64.662 14.0723 69.9237C16.2351 74.9921 19.3152 79.547 23.2524 83.475C26.7744 86.9828 30.8255 89.8238 35.2983 91.9112C35.8139 92.1513 36.3295 92.3847 36.8518 92.6048C37.662 92.9449 38.4789 93.2583 39.2958 93.5518C42.7576 94.7655 46.3667 95.5257 50.0427 95.8125C51.1944 95.9059 52.3461 95.9526 53.5045 95.9526C53.759 95.9526 54.0067 95.9526 54.2612 95.9392C57.7363 95.8792 61.1379 95.4191 64.4389 94.5521C65.8116 94.192 67.1642 93.7652 68.4967 93.265C69.0524 93.0516 69.6082 92.8315 70.164 92.5981C73.0499 91.3843 75.7818 89.8705 78.3129 88.0699C78.3932 88.0099 78.487 87.9498 78.5673 87.8765C78.6678 87.8031 78.7682 87.7364 78.8686 87.6564C78.9222 87.6231 78.9825 87.5831 79.0293 87.543C79.1097 87.483 79.19 87.423 79.2704 87.363C79.3507 87.303 79.4244 87.2429 79.5048 87.1829C80.5962 86.3493 81.6474 85.4623 82.6585 84.5287C82.7322 84.4553 82.7991 84.3953 82.8728 84.3286C82.9464 84.2686 83.0134 84.1952 83.0871 84.1286C83.1875 84.0352 83.2879 83.9352 83.3884 83.8351C83.462 83.7751 83.529 83.7017 83.5893 83.6351C83.6495 83.5817 83.7098 83.5217 83.7701 83.4617C87.7206 79.5203 90.8008 74.9721 92.9501 69.9104C94.4232 66.4426 95.4142 62.8413 95.9164 59.1268C96.0169 58.3798 96.0972 57.6396 96.1575 56.8927C96.2579 55.7056 96.3115 54.5119 96.3115 53.3115C96.3316 48.3098 95.4812 43.4548 93.8005 38.8132ZM95.5013 57.6729C95.4879 57.8463 95.4678 58.0264 95.441 58.1931C94.3228 67.8364 89.9035 76.4793 83.3616 83.0082C83.2879 83.0682 83.2277 83.1415 83.1473 83.2082C83.0871 83.2816 83.0134 83.3483 82.9465 83.4083C82.846 83.5083 82.7456 83.6017 82.6451 83.7017C82.5715 83.7751 82.5045 83.8351 82.4309 83.9018C82.3572 83.9752 82.2903 84.0352 82.2166 84.1019C81.9555 84.3553 81.6742 84.5954 81.3997 84.8355C80.8841 85.2889 80.3618 85.7291 79.8262 86.1559C79.5717 86.356 79.3106 86.556 79.0494 86.7561C78.9758 86.8161 78.8954 86.8695 78.8151 86.9295C78.7347 86.9895 78.6544 87.0495 78.574 87.1096C75.4805 89.3903 72.0723 91.251 68.4163 92.6314C67.0905 93.1316 65.738 93.5651 64.3586 93.9319C61.1379 94.7855 57.7564 95.2723 54.2812 95.3324C54.0268 95.3457 53.7791 95.3457 53.5246 95.3457C52.3662 95.3457 51.2011 95.2923 50.0628 95.2056C46.3533 94.9055 42.7911 94.1319 39.4163 92.9249C38.0437 92.4514 36.7112 91.8979 35.4189 91.2776C21.1767 84.5154 11.3203 70.0438 11.3203 53.3181C11.3203 43.9349 14.4339 35.252 19.6634 28.2496C19.9178 27.9095 20.179 27.5627 20.4401 27.2359C24.7924 21.7741 30.4773 17.4059 36.9924 14.6317C37.0259 14.6183 37.046 14.6117 37.0728 14.5917C37.1464 14.5717 37.2067 14.5383 37.2669 14.5183C37.3607 14.4783 37.4477 14.4383 37.5415 14.4049C37.7825 14.2916 38.037 14.2049 38.2914 14.1115C39.1016 13.7981 39.8582 13.518 40.6551 13.2645C40.7354 13.2312 40.8158 13.2112 40.9095 13.1845C41.0033 13.1512 41.0903 13.1245 41.1907 13.0912C41.2242 13.0778 41.251 13.0711 41.2912 13.0578C41.3514 13.0445 41.4117 13.0245 41.472 13.0045C41.5054 12.9911 41.5456 12.9844 41.5724 12.9711C41.6661 12.9378 41.7666 12.9111 41.8536 12.8911C43.0321 12.551 44.2039 12.2642 45.3958 12.0375C45.4962 12.0175 45.59 11.9974 45.6904 11.9774C45.7908 11.9574 45.8846 11.9441 45.985 11.9241C48.4424 11.4839 50.9534 11.2505 53.5313 11.2505C71.329 11.2505 86.5823 22.2743 92.7761 37.8262C92.9368 38.2197 93.0908 38.6131 93.2381 39.0133C94.8518 43.4814 95.7423 48.2897 95.7423 53.2981C95.7423 54.7653 95.662 56.2124 95.508 57.6529C95.5013 57.6663 95.4946 57.6663 95.5013 57.6729ZM79.8329 86.1626C79.5784 86.3626 79.3173 86.5627 79.0561 86.7628L79.19 86.8762L79.3039 86.9762C79.4646 86.8561 79.6253 86.7361 79.7793 86.6161L79.9601 86.4627L81.4131 84.8421C80.8908 85.2956 80.3685 85.7358 79.8329 86.1626ZM79.8329 86.1626C79.5784 86.3626 79.3173 86.5627 79.0561 86.7628L79.19 86.8762L79.3039 86.9762C79.4646 86.8561 79.6253 86.7361 79.7793 86.6161L79.9601 86.4627L81.4131 84.8421C80.8908 85.2956 80.3685 85.7358 79.8329 86.1626Z" fill="#202124">
                                                                    <path class="fill-primary" d="M53.5277 85.3824C71.3153 85.3824 85.735 71.0208 85.735 53.3048C85.735 35.5889 71.3153 21.2273 53.5277 21.2273C35.74 21.2273 21.3203 35.5889 21.3203 53.3048C21.3203 71.0208 35.74 85.3824 53.5277 85.3824Z">
                                                                        <path d="M75.8429 76.4326L75.6889 76.1592C75.6152 76.2326 75.5349 76.2993 75.4679 76.3726C75.2536 76.566 75.0461 76.7528 74.8318 76.9462C74.7514 77.0262 74.6711 77.0995 74.5907 77.1596L74.9121 77.2996C74.9925 77.2262 75.0728 77.1462 75.1532 77.0862L75.4478 77.2062C75.5416 77.1262 75.6286 77.0462 75.7224 76.9528V76.8128L75.6219 76.6394C75.7023 76.586 75.7692 76.5127 75.8429 76.4326ZM70.8812 79.9738C70.8611 79.9938 70.8276 80.0072 70.8075 80.0139L71.0821 80.1939C71.0955 80.1939 70.8812 79.9738 70.8812 79.9738ZM69.9973 80.7608L69.8366 80.6207C69.7429 80.6808 69.6559 80.7341 69.5621 80.7941C68.6314 81.3343 67.6605 81.8278 66.6762 82.2813C65.3705 82.8615 64.0313 83.3683 62.6452 83.7818C59.987 84.5687 57.1814 85.0222 54.282 85.0889V85.3823H54.3557C54.7507 85.369 55.1257 85.349 55.5074 85.329C55.8221 85.309 56.1435 85.289 56.4582 85.2556C56.8131 85.2156 57.1747 85.1823 57.5296 85.1356C57.563 85.1356 57.6032 85.1223 57.63 85.1223C58.0317 85.0689 58.4469 85.0089 58.842 84.9422C59.2035 84.8888 59.5718 84.8222 59.92 84.7488C59.9535 84.7355 59.9937 84.7355 60.0204 84.7288C60.2213 84.6888 60.4222 84.6488 60.6231 84.5954C60.8976 84.5354 61.1587 84.4754 61.4333 84.402C61.7346 84.3287 62.0426 84.2486 62.3439 84.1619C62.4644 84.1286 62.5783 84.0886 62.6988 84.0619C62.7189 84.0486 62.7323 84.0486 62.7524 84.0419C62.9332 83.9819 63.1273 83.9285 63.3081 83.8818C63.3483 83.8618 63.3885 83.8485 63.4287 83.8418C63.4487 83.8285 63.4621 83.8285 63.4822 83.8218C63.6161 83.7818 63.7367 83.7418 63.8639 83.6884C64.0849 83.6151 64.2991 83.5484 64.5201 83.455C64.5937 83.435 64.6741 83.4017 64.7411 83.375C65.0223 83.275 65.2968 83.1749 65.5713 83.0616C65.9664 82.9015 66.3481 82.7414 66.7297 82.5681C66.79 82.5347 66.8436 82.5147 66.9038 82.488C67.1851 82.368 67.4663 82.2279 67.7542 82.0879C68.1359 81.9078 68.5109 81.7078 68.8858 81.5077C69.1068 81.3877 69.3278 81.2676 69.5554 81.1342C69.6492 81.0809 69.7295 81.0342 69.8166 80.9809C69.9103 80.9275 69.9973 80.8675 70.0911 80.8208L69.9973 80.7608ZM75.8429 76.4326L75.6889 76.1592C75.6152 76.2326 75.5349 76.2993 75.4679 76.3726C75.2536 76.566 75.0461 76.7528 74.8318 76.9462C74.7514 77.0262 74.6711 77.0995 74.5907 77.1596L74.9121 77.2996C74.9925 77.2262 75.0728 77.1462 75.1532 77.0862L75.4478 77.2062C75.5416 77.1262 75.6286 77.0462 75.7224 76.9528V76.8128L75.6219 76.6394C75.7023 76.586 75.7692 76.5127 75.8429 76.4326ZM70.8142 80.0139L71.0888 80.1939C71.1022 80.1939 70.8879 79.9738 70.8879 79.9738C70.8611 79.9938 70.8343 80.0072 70.8142 80.0139ZM69.8366 80.6207C69.7429 80.6808 69.6559 80.7341 69.5621 80.7941C68.6314 81.3343 67.6605 81.8278 66.6762 82.2813C65.3705 82.8615 64.0313 83.3683 62.6452 83.7818C59.987 84.5687 57.1814 85.0222 54.282 85.0889V85.3823H54.3557C54.7507 85.369 55.1257 85.349 55.5074 85.329C55.8221 85.309 56.1435 85.289 56.4582 85.2556C56.8131 85.2156 57.1747 85.1823 57.5296 85.1356C57.563 85.1356 57.6032 85.1223 57.63 85.1223C58.0317 85.0689 58.4469 85.0089 58.842 84.9422C59.2035 84.8888 59.5718 84.8222 59.92 84.7488C59.9535 84.7355 59.9937 84.7355 60.0204 84.7288C60.2213 84.6888 60.4222 84.6488 60.6231 84.5954C60.8976 84.5354 61.1587 84.4754 61.4333 84.402C61.7346 84.3287 62.0426 84.2486 62.3439 84.1619C62.4644 84.1286 62.5783 84.0886 62.6988 84.0619C62.7189 84.0486 62.7323 84.0486 62.7524 84.0419C62.9332 83.9819 63.1273 83.9285 63.3081 83.8818C63.3483 83.8618 63.3885 83.8485 63.4287 83.8418C63.4487 83.8285 63.4621 83.8285 63.4822 83.8218C63.6161 83.7818 63.7367 83.7418 63.8639 83.6884C64.0849 83.6151 64.2991 83.5484 64.5201 83.455C64.5937 83.435 64.6741 83.4017 64.7411 83.375C65.0223 83.275 65.2968 83.1749 65.5713 83.0616C65.9664 82.9015 66.3481 82.7414 66.7297 82.5681C66.79 82.5347 66.8436 82.5147 66.9038 82.488C67.1851 82.368 67.4663 82.2279 67.7542 82.0879C68.1359 81.9078 68.5109 81.7078 68.8858 81.5077C69.1068 81.3877 69.3278 81.2676 69.5554 81.1342C69.6492 81.0809 69.7295 81.0342 69.8166 80.9809C69.9103 80.9275 69.9973 80.8675 70.0911 80.8208L70.0107 80.7474L69.8366 80.6207ZM84.1458 42.3744C83.9918 41.9743 83.8445 41.5675 83.6838 41.1807C82.0701 37.1994 79.6528 33.5448 76.5125 30.4171C70.3723 24.3016 62.21 20.9338 53.5254 20.9338C50.4721 20.9338 47.4857 21.3473 44.6399 22.1609C44.2248 22.2743 43.823 22.3943 43.4213 22.5344C38.6136 24.0816 34.2211 26.7558 30.545 30.4171C29.6478 31.3107 28.7974 32.2577 28.0274 33.2447C27.7461 33.5781 27.4917 33.9182 27.2372 34.2584C23.1929 39.7602 21.0234 46.3691 21.0234 53.3115C21.0234 61.9611 24.3982 70.0905 30.5383 76.2059C32.527 78.1866 34.7367 79.8871 37.1137 81.2676C38.3792 82.0212 39.6983 82.6748 41.0509 83.2416C43.9101 84.4153 46.9366 85.1823 50.0569 85.5024C51.1952 85.6358 52.3603 85.6958 53.5187 85.6958C53.7731 85.6958 54.0209 85.6958 54.2753 85.6758C57.1814 85.6224 60.0204 85.1756 62.739 84.3753C64.1116 83.9752 65.4642 83.4817 66.7699 82.8882C67.8881 82.408 68.993 81.8411 70.0509 81.2009C70.1446 81.1609 70.2451 81.1009 70.3321 81.0409C70.4125 80.9875 70.5062 80.9408 70.5866 80.8808C70.7674 80.7808 70.9482 80.6674 71.1223 80.5474C71.2227 80.4874 71.3231 80.414 71.4236 80.354C72.6556 79.5404 73.8341 78.6334 74.959 77.6464C75.0394 77.573 75.1331 77.5063 75.2135 77.4263C75.2938 77.3663 75.3675 77.2929 75.4478 77.2129C75.5416 77.1329 75.6286 77.0529 75.7224 76.9595C75.8161 76.8795 75.9031 76.7994 75.9835 76.6994C76.0638 76.6394 76.1442 76.566 76.2178 76.486C76.3183 76.3926 76.412 76.3059 76.5125 76.2059C76.566 76.1525 76.6129 76.1059 76.6665 76.0458C76.7401 75.9725 76.8071 75.9058 76.8807 75.8324C76.9544 75.7591 77.0214 75.6924 77.095 75.6124C82.8736 69.577 86.0407 61.6943 86.0407 53.3115C86.0341 49.5169 85.3845 45.8356 84.1458 42.3744ZM74.5907 77.1596C74.5104 77.2396 74.43 77.3129 74.3363 77.3796C73.6801 77.9532 72.9904 78.4933 72.2873 79.0068C72.1467 79.1069 72.0128 79.2069 71.8722 79.3003C71.6311 79.4737 71.3901 79.6404 71.1357 79.8005C71.0553 79.8605 70.9616 79.9138 70.8812 79.9738C70.8611 79.9938 70.8276 80.0072 70.8075 80.0139C70.7138 80.0739 70.6335 80.1339 70.5464 80.1873C70.3924 80.2873 70.2451 80.3806 70.0911 80.4673C69.9973 80.5207 69.917 80.5674 69.8299 80.6207C69.7362 80.6808 69.6492 80.7341 69.5554 80.7941C68.6247 81.3343 67.6538 81.8278 66.6695 82.2813C65.3638 82.8615 64.0246 83.3683 62.6385 83.7818C59.9803 84.5687 57.1747 85.0222 54.2753 85.0889C54.0209 85.0956 53.7731 85.0956 53.5187 85.0956C52.3469 85.0956 51.1952 85.0356 50.0569 84.9155C46.9366 84.5754 43.9502 83.7885 41.1514 82.6147C39.7854 82.0412 38.473 81.3743 37.2209 80.6207C27.8801 75.0655 21.606 64.9087 21.606 53.3115C21.606 46.3291 23.8692 39.8736 27.7127 34.6318C27.9537 34.2917 28.2148 33.9449 28.4827 33.6181C32.3328 28.7832 37.5623 25.0819 43.582 23.1079C43.9837 22.9745 44.3922 22.8478 44.8006 22.7344C47.566 21.9475 50.4988 21.5274 53.5187 21.5274C66.8904 21.5274 78.3605 29.7568 83.1079 41.3941C83.2686 41.7876 83.4226 42.1877 83.5633 42.5878C84.7752 45.9356 85.4314 49.5502 85.4314 53.3115C85.4314 61.741 82.1169 69.4236 76.7133 75.1189C76.6397 75.1922 76.5727 75.2722 76.4991 75.3389C76.4254 75.4123 76.3652 75.479 76.2848 75.5523C76.1643 75.6857 76.0304 75.8124 75.9031 75.9458C75.8295 76.0192 75.7491 76.0859 75.6822 76.1659C75.6085 76.2392 75.5282 76.3059 75.4612 76.3793C75.2469 76.5727 75.0394 76.7594 74.8251 76.9528C74.7514 77.0262 74.6711 77.0995 74.5907 77.1596ZM69.9973 80.7608L69.8366 80.6207C69.7429 80.6808 69.6559 80.7341 69.5621 80.7941C68.6314 81.3343 67.6605 81.8278 66.6762 82.2813C65.3705 82.8615 64.0313 83.3683 62.6452 83.7818C59.987 84.5687 57.1814 85.0222 54.282 85.0889V85.3823H54.3557C54.7507 85.369 55.1257 85.349 55.5074 85.329C55.8221 85.309 56.1435 85.289 56.4582 85.2556C56.8131 85.2156 57.1747 85.1823 57.5296 85.1356C57.563 85.1356 57.6032 85.1223 57.63 85.1223C58.0317 85.0689 58.4469 85.0089 58.842 84.9422C59.2035 84.8888 59.5718 84.8222 59.92 84.7488C59.9535 84.7355 59.9937 84.7355 60.0204 84.7288C60.2213 84.6888 60.4222 84.6488 60.6231 84.5954C60.8976 84.5354 61.1587 84.4754 61.4333 84.402C61.7346 84.3287 62.0426 84.2486 62.3439 84.1619C62.4644 84.1286 62.5783 84.0886 62.6988 84.0619C62.7189 84.0486 62.7323 84.0486 62.7524 84.0419C62.9332 83.9819 63.1273 83.9285 63.3081 83.8818C63.3483 83.8618 63.3885 83.8485 63.4287 83.8418C63.4487 83.8285 63.4621 83.8285 63.4822 83.8218C63.6161 83.7818 63.7367 83.7418 63.8639 83.6884C64.0849 83.6151 64.2991 83.5484 64.5201 83.455C64.5937 83.435 64.6741 83.4017 64.7411 83.375C65.0223 83.275 65.2968 83.1749 65.5713 83.0616C65.9664 82.9015 66.3481 82.7414 66.7297 82.5681C66.79 82.5347 66.8436 82.5147 66.9038 82.488C67.1851 82.368 67.4663 82.2279 67.7542 82.0879C68.1359 81.9078 68.5109 81.7078 68.8858 81.5077C69.1068 81.3877 69.3278 81.2676 69.5554 81.1342C69.6492 81.0809 69.7295 81.0342 69.8166 80.9809C69.9103 80.9275 69.9973 80.8675 70.0911 80.8208L69.9973 80.7608ZM70.8812 79.9738C70.8611 79.9938 70.8276 80.0072 70.8075 80.0139L71.0821 80.1939C71.0955 80.1939 70.8812 79.9738 70.8812 79.9738ZM75.8429 76.4326L75.6889 76.1592C75.6152 76.2326 75.5349 76.2993 75.4679 76.3726C75.2536 76.566 75.0461 76.7528 74.8318 76.9462C74.7514 77.0262 74.6711 77.0995 74.5907 77.1596L74.9121 77.2996C74.9925 77.2262 75.0728 77.1462 75.1532 77.0862L75.4478 77.2062C75.5416 77.1262 75.6286 77.0462 75.7224 76.9528V76.8128L75.6219 76.6394C75.7023 76.586 75.7692 76.5127 75.8429 76.4326ZM69.9973 80.7608L69.8366 80.6207C69.7429 80.6808 69.6559 80.7341 69.5621 80.7941C68.6314 81.3343 67.6605 81.8278 66.6762 82.2813C65.3705 82.8615 64.0313 83.3683 62.6452 83.7818C59.987 84.5687 57.1814 85.0222 54.282 85.0889V85.3823H54.3557C54.7507 85.369 55.1257 85.349 55.5074 85.329C55.8221 85.309 56.1435 85.289 56.4582 85.2556C56.8131 85.2156 57.1747 85.1823 57.5296 85.1356C57.563 85.1356 57.6032 85.1223 57.63 85.1223C58.0317 85.0689 58.4469 85.0089 58.842 84.9422C59.2035 84.8888 59.5718 84.8222 59.92 84.7488C59.9535 84.7355 59.9937 84.7355 60.0204 84.7288C60.2213 84.6888 60.4222 84.6488 60.6231 84.5954C60.8976 84.5354 61.1587 84.4754 61.4333 84.402C61.7346 84.3287 62.0426 84.2486 62.3439 84.1619C62.4644 84.1286 62.5783 84.0886 62.6988 84.0619C62.7189 84.0486 62.7323 84.0486 62.7524 84.0419C62.9332 83.9819 63.1273 83.9285 63.3081 83.8818C63.3483 83.8618 63.3885 83.8485 63.4287 83.8418C63.4487 83.8285 63.4621 83.8285 63.4822 83.8218C63.6161 83.7818 63.7367 83.7418 63.8639 83.6884C64.0849 83.6151 64.2991 83.5484 64.5201 83.455C64.5937 83.435 64.6741 83.4017 64.7411 83.375C65.0223 83.275 65.2968 83.1749 65.5713 83.0616C65.9664 82.9015 66.3481 82.7414 66.7297 82.5681C66.79 82.5347 66.8436 82.5147 66.9038 82.488C67.1851 82.368 67.4663 82.2279 67.7542 82.0879C68.1359 81.9078 68.5109 81.7078 68.8858 81.5077C69.1068 81.3877 69.3278 81.2676 69.5554 81.1342C69.6492 81.0809 69.7295 81.0342 69.8166 80.9809C69.9103 80.9275 69.9973 80.8675 70.0911 80.8208L69.9973 80.7608ZM70.8812 79.9738C70.8611 79.9938 70.8276 80.0072 70.8075 80.0139L71.0821 80.1939C71.0955 80.1939 70.8812 79.9738 70.8812 79.9738ZM75.8429 76.4326L75.6889 76.1592C75.6152 76.2326 75.5349 76.2993 75.4679 76.3726C75.2536 76.566 75.0461 76.7528 74.8318 76.9462C74.7514 77.0262 74.6711 77.0995 74.5907 77.1596L74.9121 77.2996C74.9925 77.2262 75.0728 77.1462 75.1532 77.0862L75.4478 77.2062C75.5416 77.1262 75.6286 77.0462 75.7224 76.9528V76.8128L75.6219 76.6394C75.7023 76.586 75.7692 76.5127 75.8429 76.4326Z" fill="#202124">
                                                                            <path d="M53.5274 74.4186C65.2354 74.4186 74.7266 64.9656 74.7266 53.3047C74.7266 41.6439 65.2354 32.1909 53.5274 32.1909C41.8194 32.1909 32.3281 41.6439 32.3281 53.3047C32.3281 64.9656 41.8194 74.4186 53.5274 74.4186Z" fill="white">
                                                                                <path d="M73.7992 46.1757C73.6586 45.7756 73.5046 45.3821 73.3439 44.9886C72.2726 42.4745 70.7191 40.1603 68.717 38.1663C64.6593 34.125 59.2624 31.8909 53.5173 31.8909C51.5487 31.8909 49.6203 32.151 47.7722 32.6645C47.3571 32.7778 46.9419 32.8979 46.5402 33.0446C43.4801 34.0783 40.6746 35.8189 38.3176 38.1663C37.715 38.7732 37.1458 39.4067 36.6235 40.067C36.3624 40.4004 36.1012 40.7405 35.8535 41.094C33.3693 44.6419 32.0234 48.87 32.0234 53.3048C32.0234 59.0201 34.2532 64.4019 38.3176 68.4433C38.5787 68.7034 38.8533 68.9634 39.1345 69.2169C40.3063 70.2705 41.5919 71.1909 42.9445 71.9511C45.1474 73.1915 47.5379 74.0318 50.0555 74.4253C51.1871 74.6187 52.3455 74.7054 53.5173 74.7054C53.7718 74.7054 54.0195 74.7054 54.274 74.6854C56.564 74.612 58.787 74.1852 60.8895 73.4049C62.2756 72.9114 63.5947 72.2779 64.8468 71.491C66.2329 70.6373 67.5319 69.6103 68.717 68.4299C72.7748 64.3885 75.0179 59.0067 75.0179 53.2915C75.0246 50.844 74.6094 48.4298 73.7992 46.1757ZM54.2807 74.1119C54.0262 74.1319 53.7785 74.1319 53.524 74.1319C52.3455 74.1319 51.1938 74.0318 50.0622 73.8384C47.5446 73.4249 45.1876 72.558 43.065 71.3242C41.6923 70.5306 40.4067 69.5836 39.2684 68.51C35.1906 64.7087 32.6328 59.2935 32.6328 53.3115C32.6328 48.9233 34.0054 44.8419 36.349 41.4808C36.5901 41.1273 36.8445 40.7872 37.1056 40.4538C39.563 37.346 42.8909 34.9386 46.721 33.6248C47.1227 33.4847 47.5379 33.3514 47.953 33.2447C49.7274 32.7512 51.5956 32.4911 53.5307 32.4911C62.1751 32.4911 69.6076 37.7395 72.7815 45.202C72.9556 45.5955 73.1029 45.989 73.2435 46.3891C74.0202 48.5632 74.4353 50.884 74.4353 53.3115C74.4353 60.674 70.5785 67.1695 64.7531 70.8641C63.521 71.6577 62.1952 72.3246 60.8025 72.8247C58.7535 73.585 56.564 74.0385 54.2807 74.1119Z" fill="#202124">
                                                                                    <path class="fill-primary" d="M61.5638 61.314C66.0039 56.8918 66.0039 49.722 61.5638 45.2998C57.1237 40.8776 49.9249 40.8776 45.4848 45.2998C41.0447 49.722 41.0447 56.8918 45.4848 61.314C49.9249 65.7362 57.1237 65.7362 61.5638 61.314Z">
                                                                                        <path d="M44.9272 60.2404L44.867 60.6338C45.0076 60.7939 45.1482 60.954 45.3022 61.114C45.5365 61.3674 45.7843 61.5942 46.0521 61.8276C46.0655 61.8476 46.0856 61.8609 46.1057 61.8676C46.3066 62.0477 46.5208 62.221 46.7284 62.3811C46.7887 62.4345 46.8423 62.4745 46.9025 62.5145C47.0364 62.6078 47.1637 62.6945 47.3043 62.7879C47.7462 63.0813 48.2015 63.3281 48.6903 63.5615C48.7104 63.5748 48.7238 63.5748 48.7439 63.5815C49.1657 63.7749 49.6144 63.955 50.0697 64.095V63.7816C48.0207 63.108 46.253 61.8676 44.9272 60.2404ZM44.9272 60.2404L44.867 60.6338C45.0076 60.7939 45.1482 60.954 45.3022 61.114C45.5365 61.3674 45.7843 61.5942 46.0521 61.8276C46.0655 61.8476 46.0856 61.8609 46.1057 61.8676C46.3066 62.0477 46.5208 62.221 46.7284 62.3811C46.7887 62.4345 46.8423 62.4745 46.9025 62.5145C47.0364 62.6078 47.1637 62.6945 47.3043 62.7879C47.7462 63.0813 48.2015 63.3281 48.6903 63.5615C48.7104 63.5748 48.7238 63.5748 48.7439 63.5815C49.1657 63.7749 49.6144 63.955 50.0697 64.095V63.7816C48.0207 63.108 46.253 61.8676 44.9272 60.2404ZM64.573 49.5901C64.4391 49.1766 64.2784 48.7832 64.0909 48.403C62.2295 44.4417 58.2052 41.6941 53.5248 41.6941C52.507 41.6941 51.516 41.8275 50.5786 42.0676C50.1634 42.1809 49.7483 42.3076 49.3599 42.4677C47.3578 43.2346 45.6236 44.5284 44.3313 46.1889C44.0701 46.5224 43.8291 46.8758 43.6014 47.236C42.5033 49.0032 41.8672 51.0906 41.8672 53.3114C41.8672 53.9649 41.9208 54.5985 42.0279 55.2253C42.3895 57.4194 43.3805 59.4068 44.8134 61.0073C46.1994 62.5745 48.014 63.7749 50.063 64.4085C51.1611 64.7486 52.3262 64.9286 53.5248 64.9286C53.7792 64.9286 54.027 64.9153 54.2814 64.9086C56.0558 64.7886 57.7365 64.2751 59.2096 63.4481C60.676 62.6345 61.9482 61.5075 62.9392 60.1603C64.3521 58.2397 65.1891 55.8656 65.1891 53.3114C65.1891 52.0109 64.9748 50.7572 64.573 49.5901ZM54.2814 64.3018C54.027 64.3218 53.7792 64.3351 53.5248 64.3351C52.3128 64.3351 51.1544 64.1417 50.063 63.7816C48.0207 63.108 46.253 61.8676 44.9339 60.2404C43.7956 58.8532 42.9921 57.1727 42.6506 55.332C42.5167 54.6785 42.4564 54.0049 42.4564 53.3114C42.4564 51.2307 43.039 49.27 44.0634 47.6094C44.2844 47.236 44.5255 46.8825 44.7933 46.5557C46.0187 44.9885 47.6391 43.7615 49.5273 43.0345C49.9224 42.8745 50.3241 42.7411 50.7527 42.6411C51.6432 42.401 52.5673 42.281 53.5315 42.281C57.9575 42.281 61.7741 44.8685 63.5486 48.6098C63.7293 48.9899 63.89 49.3967 64.024 49.7968C64.4056 50.9039 64.6065 52.0909 64.6065 53.318C64.6065 55.5321 63.9369 57.6062 62.7986 59.3334C61.8679 60.7739 60.5957 61.9676 59.1092 62.8346C57.6762 63.6615 56.029 64.1951 54.2814 64.3018ZM44.9272 60.2404L44.867 60.6338C45.0076 60.7939 45.1482 60.954 45.3022 61.114C45.5365 61.3674 45.7843 61.5942 46.0521 61.8276C46.0655 61.8476 46.0856 61.8609 46.1057 61.8676C46.3066 62.0477 46.5208 62.221 46.7284 62.3811C46.7887 62.4345 46.8423 62.4745 46.9025 62.5145C47.0364 62.6078 47.1637 62.6945 47.3043 62.7879C47.7462 63.0813 48.2015 63.3281 48.6903 63.5615C48.7104 63.5748 48.7238 63.5748 48.7439 63.5815C49.1657 63.7749 49.6144 63.955 50.0697 64.095V63.7816C48.0207 63.108 46.253 61.8676 44.9272 60.2404ZM44.9272 60.2404L44.867 60.6338C45.0076 60.7939 45.1482 60.954 45.3022 61.114C45.5365 61.3674 45.7843 61.5942 46.0521 61.8276C46.0655 61.8476 46.0856 61.8609 46.1057 61.8676C46.3066 62.0477 46.5208 62.221 46.7284 62.3811C46.7887 62.4345 46.8423 62.4745 46.9025 62.5145C47.0364 62.6078 47.1637 62.6945 47.3043 62.7879C47.7462 63.0813 48.2015 63.3281 48.6903 63.5615C48.7104 63.5748 48.7238 63.5748 48.7439 63.5815C49.1657 63.7749 49.6144 63.955 50.0697 64.095V63.7816C48.0207 63.108 46.253 61.8676 44.9272 60.2404Z" fill="#202124">
                                                                                            <path d="M53.527 57.6461C55.9344 57.6461 57.886 55.7023 57.886 53.3046C57.886 50.9069 55.9344 48.9631 53.527 48.9631C51.1196 48.9631 49.168 50.9069 49.168 53.3046C49.168 55.7023 51.1196 57.6461 53.527 57.6461Z" fill="#202124">
                                                                                                <path d="M58.0323 51.951C57.7711 51.951 57.5234 51.791 57.4296 51.5309C57.3091 51.1974 57.4765 50.8306 57.8113 50.7106L113.87 30.0569C114.204 29.9369 114.573 30.1036 114.693 30.4371C114.814 30.7705 114.646 31.1373 114.311 31.2573L58.2532 51.911C58.1796 51.9377 58.1059 51.951 58.0323 51.951Z" fill="#1C1C1C">
                                                                                                    <path d="M53.5273 53.3048L58.6028 48.6099L60.1764 52.878L53.5273 53.3048Z" fill="white">
                                                                                                        <path d="M60.4497 52.7781L59.9074 51.2976L59.4721 50.1038L58.8896 48.5033C58.8494 48.4099 58.7691 48.3432 58.6753 48.3232C58.5749 48.3032 58.4744 48.3232 58.4008 48.3966L56.5125 50.1438L53.3186 53.0915C53.2784 53.1315 53.2449 53.1849 53.2382 53.2316C53.2182 53.2916 53.2249 53.3649 53.2516 53.425C53.2851 53.4983 53.3454 53.5583 53.4123 53.5783C53.4458 53.5983 53.486 53.6117 53.5262 53.6117C53.5463 53.6117 57.8919 53.3383 57.8919 53.3383L60.202 53.1849C60.2957 53.1715 60.3761 53.1249 60.423 53.0448C60.4698 52.9648 60.4832 52.8648 60.4497 52.7781ZM54.3431 52.9581L56.921 50.5773L58.4878 49.1302L58.9231 50.3039L59.365 51.4976L59.7668 52.6113L57.845 52.7314L54.3431 52.9581Z" fill="#1C1C1C">
                                                                                                            <path d="M99.7578 35.8722L100.293 31.1106L112.246 26.6558L111.924 31.3373L99.7578 35.8722Z" fill="white">
                                                                                                                <path d="M112.428 26.4224C112.348 26.3624 112.234 26.3424 112.147 26.3824L109.013 27.5495L103.429 29.6302C103.409 29.6302 103.389 29.6435 103.369 29.6502L101.782 30.2437L101.507 30.3437L101.213 30.4571L100.181 30.8372C100.081 30.8706 100.001 30.9706 99.9872 31.0773L99.5051 35.3454C99.5051 35.3588 99.4515 35.8389 99.4515 35.8389C99.4381 35.939 99.485 36.039 99.5653 36.1124C99.5854 36.1324 99.6189 36.1457 99.639 36.1457C99.6791 36.1657 99.7126 36.179 99.7528 36.179C99.793 36.179 99.8265 36.1657 99.8666 36.159L102.806 35.0653L103.141 34.9453L103.335 34.8719L103.429 34.8319L103.71 34.7319L105.893 33.9183C105.906 33.9183 106.328 33.7582 106.328 33.7582L108.578 32.9113L109.04 32.7379L110.727 32.1043L111.189 31.9309L112.026 31.6175C112.1 31.5842 112.147 31.5375 112.18 31.4774C112.214 31.4441 112.221 31.4041 112.221 31.3641L112.274 30.6505L112.549 26.6758C112.549 26.5758 112.509 26.4824 112.428 26.4224ZM111.665 30.8772L111.645 31.1307L103.496 34.165L103.215 34.2651L102.933 34.3784L100.114 35.4255L100.148 35.1254C100.148 35.1187 100.57 31.3241 100.57 31.3241L101.48 30.9839L101.762 30.8839C101.775 30.8839 102.043 30.7705 102.043 30.7705L103.134 30.3704L103.77 30.137L105.813 29.3701L106.442 29.13C106.455 29.13 108.772 28.263 108.772 28.263L109.408 28.0296L111.933 27.0826L111.665 30.8772Z" fill="#1C1C1C">
                                                                                                                    <path d="M103.215 32.1976C103.014 32.1709 102.9 32.0242 102.92 31.8641L103.195 29.8768C103.215 29.7167 103.369 29.6034 103.53 29.6234C103.69 29.6434 103.804 29.7968 103.784 29.9568L103.509 31.9442C103.489 32.0909 103.362 32.1976 103.215 32.1976Z" fill="#1C1C1C">
                                                                                                                        <path d="M105.672 32.8645C105.471 32.8379 105.357 32.6911 105.377 32.5311L105.866 28.9432C105.886 28.7832 106.04 28.6698 106.201 28.6898C106.362 28.7098 106.475 28.8632 106.455 29.0232L105.967 32.6111C105.94 32.7578 105.819 32.8645 105.672 32.8645Z" fill="#1C1C1C">
                                                                                                                            <path d="M108.738 30.9772C108.537 30.9505 108.424 30.8038 108.444 30.6438L108.839 27.7828C108.859 27.6228 109.013 27.5094 109.174 27.5294C109.334 27.5494 109.448 27.7028 109.428 27.8628L109.033 30.7238C109.006 30.8705 108.879 30.9772 108.738 30.9772Z" fill="#1C1C1C">
                                                                                                                                <path d="M115.704 35.0787L112.122 31.7576L99.9219 36.2191L103.297 39.6202L115.704 35.0787Z" fill="white">
                                                                                                                                    <path d="M110.815 32.3778C110.774 32.3444 110.754 32.2977 110.741 32.2577L109.154 32.8379L108.578 33.0513L106.429 33.8383L105.886 34.0383L103.744 34.8253L103.462 34.9253L103.409 34.9453L103.509 35.0653C103.529 35.1053 103.55 35.1587 103.563 35.2054L103.623 35.1854L103.844 35.1054L106.054 34.2917L106.663 34.0717L108.786 33.2981L109.388 33.078C109.402 33.078 110.942 32.5045 110.942 32.5045L110.815 32.3778ZM110.815 32.3778C110.774 32.3444 110.754 32.2977 110.741 32.2577L109.154 32.8379L108.578 33.0513L106.429 33.8383L105.886 34.0383L103.744 34.8253L103.462 34.9253L103.409 34.9453L103.509 35.0653C103.529 35.1053 103.55 35.1587 103.563 35.2054L103.623 35.1854L103.844 35.1054L106.054 34.2917L106.663 34.0717L108.786 33.2981L109.388 33.078C109.402 33.078 110.942 32.5045 110.942 32.5045L110.815 32.3778ZM115.904 34.8653L112.669 31.8709L112.314 31.5508C112.274 31.5108 112.234 31.4908 112.174 31.4775C112.12 31.4574 112.06 31.4641 112.013 31.4908L110.895 31.9043L108.746 32.6912L103.637 34.5652L103.362 34.6652L103.067 34.7652L103.007 34.7986L99.8266 35.9523C99.7262 35.9923 99.6659 36.0657 99.6458 36.1524C99.6123 36.2657 99.6458 36.3658 99.7195 36.4325L99.8735 36.5925L103.088 39.8403C103.148 39.8936 103.228 39.9203 103.302 39.9203C103.342 39.9203 103.375 39.9203 103.402 39.907L104.614 39.4668L104.895 39.3668L105.177 39.2534L115.81 35.3588C115.91 35.3254 115.984 35.2454 116.004 35.1454C116.017 35.0453 115.977 34.932 115.904 34.8653ZM103.369 39.2801L100.469 36.3658C100.449 36.3458 103.014 35.3988 103.014 35.3988L103.275 35.3054L103.556 35.2054L103.616 35.1854L103.837 35.1054L106.047 34.2917L106.656 34.0717L108.779 33.2981L109.382 33.078C109.395 33.078 110.935 32.5045 110.935 32.5045L111.565 32.2711L112.04 32.0977L115.14 34.972L105.003 38.6732L104.728 38.7866L104.447 38.8866L103.369 39.2801ZM110.815 32.3778C110.774 32.3444 110.754 32.2977 110.741 32.2577L109.154 32.8379L108.578 33.0513L106.429 33.8383L105.886 34.0383L103.744 34.8253L103.462 34.9253L103.409 34.9453L103.509 35.0653C103.529 35.1053 103.55 35.1587 103.563 35.2054L103.623 35.1854L103.844 35.1054L106.054 34.2917L106.663 34.0717L108.786 33.2981L109.388 33.078C109.402 33.078 110.942 32.5045 110.942 32.5045L110.815 32.3778ZM110.815 32.3778C110.774 32.3444 110.754 32.2977 110.741 32.2577L109.154 32.8379L108.578 33.0513L106.429 33.8383L105.886 34.0383L103.744 34.8253L103.462 34.9253L103.409 34.9453L103.509 35.0653C103.529 35.1053 103.55 35.1587 103.563 35.2054L103.623 35.1854L103.844 35.1054L106.054 34.2917L106.663 34.0717L108.786 33.2981L109.388 33.078C109.402 33.078 110.942 32.5045 110.942 32.5045L110.815 32.3778Z" fill="#1C1C1C">
                                                                                                                                        <path d="M113.347 34.5518C113.273 34.5518 113.206 34.5251 113.146 34.4784L110.822 32.3777C110.702 32.271 110.695 32.0843 110.802 31.9642C110.909 31.8442 111.097 31.8375 111.217 31.9442L113.541 34.0449C113.661 34.1516 113.668 34.3384 113.561 34.4584C113.507 34.5184 113.427 34.5518 113.347 34.5518Z" fill="#1C1C1C">
                                                                                                                                            <path d="M110.291 34.6452C110.217 34.6452 110.143 34.6185 110.083 34.5585L108.643 33.158C108.53 33.0446 108.523 32.8579 108.637 32.7379C108.751 32.6245 108.938 32.6178 109.059 32.7312L110.498 34.1317C110.612 34.245 110.619 34.4318 110.505 34.5451C110.445 34.6185 110.371 34.6452 110.291 34.6452Z" fill="#1C1C1C">
                                                                                                                                                <path d="M108.934 37.0127C108.861 37.0127 108.78 36.986 108.727 36.926L105.968 34.205C105.854 34.0917 105.854 33.9049 105.968 33.7916C106.082 33.6782 106.27 33.6782 106.39 33.7916L109.149 36.5125C109.263 36.6259 109.263 36.8126 109.149 36.926C109.082 36.9793 109.008 37.0127 108.934 37.0127Z" fill="#1C1C1C">
                                                                                                                                                    <path d="M105.143 37.5529C105.063 37.5529 104.983 37.5195 104.922 37.4595L102.887 35.2588C102.773 35.1387 102.786 34.952 102.907 34.8453C103.027 34.7319 103.215 34.7453 103.322 34.8653L105.358 37.0661C105.472 37.1861 105.458 37.3728 105.338 37.4795C105.284 37.5262 105.217 37.5529 105.143 37.5529Z" fill="#1C1C1C">
                                                                                                                                                        <path d="M51.7799 48.97C51.5054 48.97 51.2509 48.7899 51.1639 48.5098L38.589 6.36219C38.4885 6.02208 38.6827 5.66862 39.0242 5.56859C39.3657 5.46856 39.7206 5.66196 39.821 6.00207L52.3959 48.1497C52.4964 48.4898 52.3022 48.8433 51.9607 48.9433C51.9004 48.9633 51.8402 48.97 51.7799 48.97Z" fill="#1C1C1C">
                                                                                                                                                            <path d="M53.103 51.7109L49.8555 48.0963L53.5114 46.6292L53.103 51.7109Z" fill="white">
                                                                                                                                                                <path d="M53.6863 46.4024C53.606 46.3424 53.5055 46.3224 53.4051 46.3624L52.019 46.9159L50.8272 47.3894L49.7491 47.8162C49.6554 47.8562 49.5884 47.9362 49.5683 48.0296C49.5483 48.123 49.5817 48.223 49.642 48.2897L49.7759 48.4297L50.9879 49.7769L51.0682 49.8769L52.8962 51.8976C52.9498 51.9709 53.0301 51.9976 53.1105 51.9976C53.144 51.9976 53.1841 51.9976 53.2109 51.9843C53.3247 51.9443 53.4051 51.8442 53.4118 51.7242L53.6328 48.9566L53.8135 46.6425C53.8135 46.5491 53.7734 46.4624 53.6863 46.4024ZM53.0301 48.9966L52.8694 50.9973L51.4968 49.4701L50.3652 48.2097L51.0013 47.9562L52.1931 47.4761L53.1841 47.0826L53.0301 48.9966Z" fill="#1C1C1C">
                                                                                                                                                                    <path d="M42.3516 16.9525L37.9323 16.7258L35.207 7.73608L39.5728 7.80944L42.3516 16.9525Z" fill="white">
                                                                                                                                                                        <path d="M42.6388 16.8658L41.9826 14.7118L41.8219 14.1782L41.467 13.0112L41.3867 12.7311L41.293 12.451L41.2729 12.391L41.139 11.9308L40.6635 10.3836L40.5095 9.89012L40.168 8.76307C40.168 8.74974 40.014 8.26957 40.014 8.26957L39.8533 7.72939C39.8199 7.64936 39.773 7.58934 39.6993 7.556C39.6592 7.52265 39.619 7.51599 39.5654 7.51599L38.9159 7.50265L35.1863 7.44263C35.0925 7.44263 35.0055 7.48264 34.9519 7.56267C34.8917 7.63603 34.8716 7.73606 34.8984 7.82276L35.6148 10.1836L36.7866 14.0449L36.8803 14.3383L36.9138 14.4317L36.9741 14.6251L37.6303 16.8058C37.6705 16.9258 37.7709 17.0192 37.9048 17.0192L41.8152 17.2193L42.3174 17.2526C42.4313 17.2526 42.5116 17.2126 42.5719 17.1392C42.5853 17.1259 42.592 17.1059 42.592 17.0992C42.6455 17.0259 42.6656 16.9458 42.6388 16.8658ZM38.1526 16.4457L37.6102 14.6451L37.5365 14.405L37.4428 14.1116L37.4227 14.0382L37.3625 13.8248L37.0009 12.6311L36.8201 12.0242L36.3246 10.4036L36.1438 9.79009L35.6081 8.02949L39.1034 8.08951H39.3578L40.7305 12.6177L40.8242 12.8911L40.9046 13.1846L41.9558 16.6324L41.6545 16.6124L38.1526 16.4457Z" fill="#1C1C1C">
                                                                                                                                                                            <path d="M39.0365 14.7517C39.0164 14.7517 37.1817 14.6183 37.1817 14.6183C37.021 14.605 36.8938 14.465 36.9072 14.3049C36.9206 14.1449 37.0612 14.0181 37.2219 14.0315L39.0566 14.1649C39.2173 14.1782 39.3445 14.3182 39.3311 14.4783C39.3244 14.6317 39.1905 14.7517 39.0365 14.7517Z" fill="#1C1C1C">
                                                                                                                                                                                <path d="M39.9655 12.8445C39.9454 12.8445 36.631 12.6044 36.631 12.6044C36.4703 12.5911 36.343 12.451 36.3564 12.291C36.3698 12.1309 36.5104 12.0042 36.6711 12.0176L39.9856 12.2576C40.1463 12.271 40.2735 12.411 40.2602 12.5711C40.2468 12.7311 40.1195 12.8445 39.9655 12.8445Z" fill="#1C1C1C">
                                                                                                                                                                                    <path d="M38.5605 10.5703C38.5404 10.5703 35.8888 10.3769 35.8888 10.3769C35.7281 10.3636 35.6009 10.2235 35.6142 10.0635C35.6276 9.9034 35.7683 9.77669 35.929 9.79003L38.5738 9.98343C38.7345 9.99676 38.8618 10.1368 38.8484 10.2969C38.8484 10.4503 38.7145 10.5703 38.5605 10.5703Z" fill="#1C1C1C">
                                                                                                                                                                                        <path d="M43.5572 4.7749L39.9883 7.64254L42.7001 16.819L46.3159 14.1047L43.5572 4.7749Z" fill="white">
                                                                                                                                                                                            <path d="M41.7677 12.6243L41.6873 12.3442L41.6539 12.2641L41.4798 11.6506L41.0579 10.2101L40.8771 9.60991L40.5758 8.5829L40.4218 8.70294C40.3816 8.72294 40.3482 8.74295 40.308 8.75629L40.6227 9.80331L40.7968 10.3835L41.232 11.844L41.3927 12.4042C41.4061 12.4242 41.4865 12.7043 41.4865 12.7043L41.5668 12.9844C41.6606 12.951 41.761 12.9244 41.848 12.9044L41.7677 12.6243ZM41.7677 12.6243L41.6873 12.3442L41.6539 12.2641L41.4798 11.6506L41.0579 10.2101L40.8771 9.60991L40.5758 8.5829L40.4218 8.70294C40.3816 8.72294 40.3482 8.74295 40.308 8.75629L40.6227 9.80331L40.7968 10.3835L41.232 11.844L41.3927 12.4042C41.4061 12.4242 41.4865 12.7043 41.4865 12.7043L41.5668 12.9844C41.6606 12.951 41.761 12.9244 41.848 12.9044L41.7677 12.6243ZM45.9794 11.9374L45.8991 11.6573L45.8187 11.3772L43.8367 4.68824C43.8033 4.59488 43.7363 4.52819 43.6425 4.49484C43.5421 4.4615 43.4417 4.48151 43.368 4.5482L40.1473 7.1224L39.7924 7.41583C39.7388 7.45585 39.7121 7.5092 39.6987 7.55588C39.6786 7.6159 39.6786 7.66925 39.6987 7.72927L39.933 8.48286C39.933 8.52288 39.9464 8.56289 39.9531 8.6029L40.4151 10.1701C40.4285 10.2101 40.4486 10.2501 40.4687 10.2835L41.1182 12.5042L41.1985 12.7843L41.2789 13.0644L41.694 14.4649C41.694 14.4982 41.7074 14.5182 41.7141 14.5382L42.4105 16.899C42.444 16.9924 42.5109 17.0724 42.6047 17.0991C42.6382 17.1125 42.6649 17.1125 42.6984 17.1125C42.7587 17.1125 42.819 17.0924 42.8792 17.0524L43.0734 16.9124L46.4883 14.3448C46.5888 14.2715 46.6289 14.1448 46.6021 14.0247L45.9794 11.9374ZM42.8591 16.3255L42.3368 14.5449L42.1628 13.9447L41.848 12.911L41.7677 12.6309L41.6873 12.3508L41.6539 12.2708L41.4798 11.6573L41.0579 10.2168L40.8771 9.61658L40.5758 8.58957L40.395 7.96269L40.3348 7.76262C40.3415 7.74928 43.3948 5.28845 43.3948 5.28845L45.2295 11.4972L45.3098 11.7773L45.3902 12.0574L45.966 13.9981L42.8859 16.2988L42.8591 16.3255ZM41.7677 12.6243L41.6873 12.3442L41.6539 12.2641L41.4798 11.6506L41.0579 10.2101L40.8771 9.60991L40.5758 8.5829L40.4218 8.70294C40.3816 8.72294 40.3482 8.74295 40.308 8.75629L40.6227 9.80331L40.7968 10.3835L41.232 11.844L41.3927 12.4042C41.4061 12.4242 41.4865 12.7043 41.4865 12.7043L41.5668 12.9844C41.6606 12.951 41.761 12.9244 41.848 12.9044L41.7677 12.6243ZM41.7677 12.6243L41.6873 12.3442L41.6539 12.2641L41.4798 11.6506L41.0579 10.2101L40.8771 9.60991L40.5758 8.5829L40.4218 8.70294C40.3816 8.72294 40.3482 8.74295 40.308 8.75629L40.6227 9.80331L40.7968 10.3835L41.232 11.844L41.3927 12.4042C41.4061 12.4242 41.4865 12.7043 41.4865 12.7043L41.5668 12.9844C41.6606 12.951 41.761 12.9244 41.848 12.9044L41.7677 12.6243Z" fill="#1C1C1C">
                                                                                                                                                                                                <path d="M40.2344 8.7696C40.1474 8.7696 40.067 8.73625 40.0067 8.66289C39.8996 8.53618 39.9197 8.34945 40.0469 8.24942L42.3101 6.38879C42.4374 6.28209 42.6248 6.30209 42.7253 6.4288C42.8324 6.55551 42.8123 6.74224 42.6851 6.84228L40.4219 8.70291C40.3683 8.74292 40.3014 8.7696 40.2344 8.7696Z" fill="#1C1C1C">
                                                                                                                                                                                                    <path d="M40.7175 10.3902C40.6304 10.3902 40.5434 10.3502 40.4831 10.2769C40.3827 10.1502 40.4095 9.96342 40.5367 9.86339L42.0299 8.70966C42.1571 8.60963 42.3446 8.63631 42.445 8.76302C42.5454 8.88973 42.5187 9.07646 42.3914 9.17649L40.8983 10.3302C40.8447 10.3702 40.7777 10.3902 40.7175 10.3902Z" fill="#1C1C1C">
                                                                                                                                                                                                        <path d="M41.3659 12.4108C41.2789 12.4108 41.1918 12.3708 41.1315 12.2974C41.0311 12.1707 41.0579 11.984 41.1851 11.884L44.0844 9.66987C44.2117 9.56984 44.3991 9.59651 44.4996 9.72322C44.6 9.84993 44.5732 10.0367 44.446 10.1367L41.5467 12.3508C41.4931 12.3908 41.4262 12.4108 41.3659 12.4108Z" fill="#1C1C1C">
                                                                                                                                                                                                            <path d="M41.99 14.7183C41.8962 14.7183 41.8092 14.6783 41.7489 14.5916C41.6552 14.4583 41.6887 14.2782 41.8159 14.1782L44.1394 12.5309C44.2733 12.4376 44.4608 12.4709 44.5545 12.5976C44.6483 12.731 44.6148 12.9111 44.4876 13.0111L42.1641 14.6583C42.1105 14.6983 42.0502 14.7183 41.99 14.7183Z" fill="#1C1C1C">
                                                                                                                                                                                                                <path d="M49.4551 51.7108C49.3144 51.7108 49.1738 51.6642 49.0533 51.5708L7.1034 18.2662C6.82887 18.0461 6.782 17.646 7.00296 17.3659C7.22393 17.0924 7.62568 17.0458 7.90691 17.2658L49.8635 50.5704C50.138 50.7905 50.1849 51.1907 49.9639 51.4708C49.83 51.6308 49.6425 51.7108 49.4551 51.7108Z" fill="#1C1C1C">
                                                                                                                                                                                                                    <path d="M53.1184 53.5848L47.4336 51.7575L49.9245 48.6631L53.1184 53.5848Z" fill="white">
                                                                                                                                                                                                                        <path d="M53.3728 53.4313L53.2388 53.2313L51.056 49.8835L50.9957 49.7701L50.1654 48.503C50.1119 48.4296 50.0248 48.383 49.9311 48.3696C49.8708 48.3696 49.8105 48.3896 49.757 48.4297C49.7235 48.443 49.7034 48.463 49.6833 48.483L48.7124 49.6767L47.9156 50.6704L47.2058 51.5774C47.1456 51.6507 47.1255 51.7508 47.1523 51.8375C47.1857 51.9375 47.2527 52.0109 47.3464 52.0375L49.2347 52.6444L53.0313 53.8715C53.0648 53.8848 53.0915 53.8848 53.125 53.8848C53.2188 53.8848 53.3058 53.8448 53.3594 53.7715C53.4129 53.7114 53.433 53.6381 53.4196 53.5714C53.4129 53.518 53.4062 53.4714 53.3728 53.4313ZM49.3552 52.0709L47.929 51.6107L48.3843 51.0505L49.1945 50.0435L49.9043 49.1699L50.5404 50.1569L52.4286 53.0646L49.3552 52.0709Z" fill="#1C1C1C">
                                                                                                                                                                                                                            <path d="M18.1658 26.3155L13.7465 28.1894L4.75391 21.1137L9.01251 19.113L18.1658 26.3155Z" fill="white">
                                                                                                                                                                                                                                <path d="M18.3472 26.0821L16.1844 24.3749C16.171 24.3749 15.7492 24.0414 15.7492 24.0414L13.8676 22.5543C13.8542 22.5543 13.4859 22.2608 13.4859 22.2608L11.8521 20.9737L11.7785 20.9137L11.524 20.7203L11.4437 20.6469L11.3031 20.5336L10.225 19.6866L9.82998 19.3665L9.19387 18.873C9.13361 18.833 9.07334 18.813 8.99969 18.813C8.95951 18.813 8.91934 18.813 8.87916 18.833L8.20957 19.1464L4.61386 20.8337C4.52012 20.887 4.45986 20.9671 4.43977 21.0671C4.42638 21.1805 4.47325 21.2805 4.5536 21.3405L6.90387 23.1945C6.91726 23.2078 8.49749 24.4549 8.49749 24.4549L8.73185 24.635L8.98629 24.835L11.1491 26.5356C11.1826 26.5556 11.2093 26.5756 11.2428 26.589L13.5529 28.4296C13.6065 28.4696 13.6667 28.4896 13.7337 28.4896C13.7739 28.4896 13.814 28.4763 13.8475 28.4696L17.8182 26.7824L18.2735 26.589C18.374 26.5489 18.4342 26.4556 18.4543 26.3555V26.3022C18.4543 26.2155 18.4141 26.1288 18.3472 26.0821ZM17.2892 26.3622L13.7873 27.8494L11.9258 26.3822L11.3834 25.9621L9.91033 24.795L9.37466 24.3749L9.32109 24.3415L9.06665 24.1415L8.83229 23.9481L7.68059 23.0411L7.14492 22.6209L5.30354 21.1738L8.72515 19.5666L8.96621 19.4532L10.9348 21.0004L11.1692 21.1805L11.4236 21.3805L17.5838 26.2288L17.2892 26.3622Z" fill="#1C1C1C">
                                                                                                                                                                                                                                    <path d="M11.3385 26.589C11.218 26.589 11.1108 26.5156 11.064 26.4023C11.0037 26.2489 11.0774 26.0822 11.2314 26.0221L13.0928 25.2819C13.2468 25.2219 13.4142 25.2952 13.4745 25.4486C13.5348 25.602 13.4611 25.7687 13.3071 25.8287L11.4523 26.569C11.4122 26.5823 11.3787 26.589 11.3385 26.589Z" fill="#1C1C1C">
                                                                                                                                                                                                                                        <path d="M9.38146 24.9818C9.26094 24.9818 9.1538 24.9151 9.10693 24.795C9.04667 24.6417 9.12032 24.4749 9.27433 24.4149L12.6424 23.0678C12.7964 23.0078 12.9638 23.0811 13.024 23.2345C13.0843 23.3879 13.0106 23.5546 12.8566 23.6146L9.4886 24.9618C9.45512 24.9751 9.42164 24.9818 9.38146 24.9818Z" fill="#1C1C1C">
                                                                                                                                                                                                                                            <path d="M7.09631 23.2545C6.97578 23.2545 6.86865 23.1811 6.82178 23.0678C6.76151 22.9144 6.83517 22.7476 6.98917 22.6876L9.68093 21.6139C9.83494 21.5539 10.0023 21.6273 10.0626 21.7807C10.1229 21.934 10.0492 22.1008 9.8952 22.1608L7.20344 23.2345C7.16996 23.2478 7.12979 23.2545 7.09631 23.2545Z" fill="#1C1C1C">
                                                                                                                                                                                                                                                <path d="M10.7069 14.3982L9.30078 18.7597L18.4005 26.0221L19.9674 21.7874L10.7069 14.3982Z" fill="white">
                                                                                                                                                                                                                                                    <path d="M11.8057 20.3802L11.5914 20.2201C11.5713 20.2001 10.4598 19.3131 10.4598 19.3131L10.3995 19.5065C10.3862 19.5465 10.3661 19.5799 10.346 19.6066L11.3838 20.4335L11.4843 20.5135L11.6182 20.6136L11.8593 20.8136C11.9195 20.7403 11.9798 20.6603 12.04 20.5802L11.8057 20.3802ZM11.8057 20.3802L11.5914 20.2201C11.5713 20.2001 10.4598 19.3131 10.4598 19.3131L10.3995 19.5065C10.3862 19.5465 10.3661 19.5799 10.346 19.6066L11.3838 20.4335L11.4843 20.5135L11.6182 20.6136L11.8593 20.8136C11.9195 20.7403 11.9798 20.6603 12.04 20.5802L11.8057 20.3802ZM20.1488 21.5539L14.8657 17.3391L14.6113 17.1391L14.3769 16.959L10.895 14.1714C10.8147 14.1114 10.7143 14.0914 10.6205 14.118C10.5268 14.138 10.4464 14.2181 10.4196 14.3114L9.14741 18.2661L9.01349 18.6662C8.9934 18.7196 8.9934 18.7663 9.0001 18.8196C9.01349 18.893 9.06036 18.9397 9.11393 18.993L9.93083 19.6466C9.96431 19.6666 11.2031 20.6603 11.2031 20.6603L11.4374 20.8403L11.5111 20.9003C11.5445 20.9337 11.5646 20.9404 11.5847 20.9537C11.5981 20.9737 11.6182 20.9737 11.6383 20.987L11.6986 21.0471L15.85 24.3548C15.8701 24.3748 15.8902 24.3949 15.9237 24.4082L18.2271 26.2622C18.2806 26.3022 18.3409 26.3222 18.4079 26.3222C18.4279 26.3222 18.448 26.3222 18.4681 26.3088C18.5819 26.2888 18.6489 26.2155 18.6824 26.1288L18.7761 25.8954L20.2626 21.894C20.2894 21.7673 20.2492 21.6339 20.1488 21.5539ZM18.2605 25.5352L16.379 24.0347L15.9036 23.6546L14.1158 22.2275L13.6337 21.834L12.0869 20.6069L12.0467 20.5736L11.8057 20.3735L11.5914 20.2134C11.5713 20.1934 10.4598 19.3065 10.4598 19.3065L10.1451 19.053L9.96431 18.8997L9.64291 18.6462L10.8549 14.885L13.9752 17.3791L14.2095 17.5592L14.464 17.7593L19.6131 21.874L18.2672 25.4952L18.2605 25.5352ZM11.8057 20.3802L11.5914 20.2201C11.5713 20.2001 10.4598 19.3131 10.4598 19.3131L10.3995 19.5065C10.3862 19.5465 10.3661 19.5799 10.346 19.6066L11.3838 20.4335L11.4843 20.5135L11.6182 20.6136L11.8593 20.8136C11.9195 20.7403 11.9798 20.6603 12.04 20.5802L11.8057 20.3802ZM11.8057 20.3802L11.5914 20.2201C11.5713 20.2001 10.4598 19.3131 10.4598 19.3131L10.3995 19.5065C10.3862 19.5465 10.3661 19.5799 10.346 19.6066L11.3838 20.4335L11.4843 20.5135L11.6182 20.6136L11.8593 20.8136C11.9195 20.7403 11.9798 20.6603 12.04 20.5802L11.8057 20.3802Z" fill="#1C1C1C">
                                                                                                                                                                                                                                                        <path d="M10.1259 19.7133C10.0992 19.7133 10.0657 19.7066 10.0389 19.6999C9.88489 19.6533 9.79785 19.4865 9.84472 19.3332L10.7085 16.5322C10.7554 16.3788 10.9228 16.2921 11.0768 16.3388C11.2308 16.3855 11.3178 16.5522 11.2709 16.7056L10.4072 19.5065C10.367 19.6266 10.2532 19.7133 10.1259 19.7133Z" fill="#1C1C1C">
                                                                                                                                                                                                                                                            <path d="M11.7392 21.0005C11.7057 21.0005 11.6723 20.9938 11.6388 20.9871C11.4848 20.9338 11.4044 20.767 11.458 20.6137L12.0807 18.8331C12.1343 18.6797 12.3017 18.5996 12.4557 18.653C12.6097 18.7063 12.69 18.8731 12.6365 19.0265L12.0138 20.8071C11.9736 20.9204 11.8597 21.0005 11.7392 21.0005Z" fill="#1C1C1C">
                                                                                                                                                                                                                                                                <path d="M13.7861 22.5675C13.7526 22.5675 13.7191 22.5608 13.6857 22.5475C13.5317 22.4942 13.4513 22.3274 13.5049 22.174L14.7369 18.7396C14.7905 18.5862 14.9579 18.5061 15.1119 18.5595C15.2659 18.6128 15.3462 18.7796 15.2927 18.933L14.0606 22.3674C14.0205 22.4875 13.9066 22.5675 13.7861 22.5675Z" fill="#1C1C1C">
                                                                                                                                                                                                                                                                    <path d="M16.0231 24.4216C15.9829 24.4216 15.9494 24.415 15.9092 24.4016C15.7552 24.3416 15.6883 24.1682 15.7485 24.0148L16.8266 21.3873C16.8868 21.2339 17.0609 21.1672 17.2149 21.2272C17.3689 21.2872 17.4359 21.4606 17.3756 21.614L16.2976 24.2416C16.2507 24.3549 16.1436 24.4216 16.0231 24.4216Z" fill="#1C1C1C">
                                </svg>
                            </figure>

                            <!-- Tabs -->
                            <div class="nav nav-pills nav-pills-dark" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" type="button" role="tab" aria-controls="nav-mission" aria-selected="true">Nossa missão</button>
                                <button class="nav-link" id="nav-goal-tab" data-bs-toggle="tab" data-bs-target="#nav-goal" type="button" role="tab" aria-controls="nav-goal" aria-selected="false">Nossos objetivos</button>
                            </div>

                            <!-- Tab content -->
                            <div class="tab-content mt-4" id="nav-tabContent">
                                <!-- Mission content -->
                                <div class="tab-pane fade show active" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab" tabindex="0">
                                    <h5 class="mb-3">Nosso compromisso com o seu visual</h5>
                                    <p class="mb-2">Nossa missão é elevar a experiência de cuidados pessoais dos homens a um novo patamar, proporcionando não apenas cortes de cabelo e barbas impecáveis, mas também um ambiente acolhedor e uma sensação de pertencimento. </p>
                                    <!-- List -->
                                    <ul class="list-group list-group-borderless mb-3">
                                        <li class="list-group-item heading-color d-flex pb-0"><i class="bi bi-patch-check-fill me-2"></i>Promover Autoestima e Confiança</li>
                                        <li class="list-group-item heading-color d-flex pb-0"><i class="bi bi-patch-check-fill me-2"></i>Oferecer uma Experiência Única</li>
                                        <li class="list-group-item heading-color d-flex pb-0"><i class="bi bi-patch-check-fill me-2"></i>Atendimento personalizado</li>
                                    </ul>
                                    <!-- Button -->

                                </div>

                                <!-- Goal content -->
                                <div class="tab-pane fade" id="nav-goal" role="tabpanel" aria-labelledby="nav-goal-tab" tabindex="0">
                                    <h5 class="mb-3">Traçando o futuro da estética Masculina</h5>
                                    <p class="mb-2"> Cuidadosamente elaborados para refletir nossa missão e garantir que estejamos sempre superando as expectativas de nossos clientes.</p>
                                    <!-- List -->
                                    <ul class="list-group list-group-borderless mb-3">
                                        <li class="list-group-item heading-color d-flex pb-0"><i class="bi bi-patch-check-fill me-2"></i>Excelência nos Serviços</li>
                                        <li class="list-group-item heading-color d-flex pb-0"><i class="bi bi-patch-check-fill me-2"></i>Satisfação do Cliente</li>
                                        <li class="list-group-item heading-color d-flex pb-0"><i class="bi bi-patch-check-fill me-2"></i>Construção de uma Comunidade</li>
                                    </ul>
                                    <!-- Button -->

                                </div>
                            </div>
                        </div>
                        <!-- Goal and Mission tab END -->
                    </div>

                    <!-- Image -->
                    <div class="col-lg-5 mt-7 mt-lg-0">
                        <div class="position-relative d-flex justify-content-center">
                            <!-- Hero image -->
                            <img src="https://i.imgur.com/BCGP6Ok.jpg" class="rounded" alt="">

                            <!-- Trustpilot review START -->
                            <div class="d-inline-block bg-dark shadow  rounded-4 position-absolute end-0 top-0 p-3 mt-n5 me-5" data-bs-theme="dark">
                                <!-- Trustpilot logo -->
                                <figure class="mb-2">
                                    <svg width="103" height="25" viewBox="0 0 103 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="fill-mode" d="M27.2904 9.09106L37.5808 9.09106V10.9814L33.5291 10.9814V21.6377H31.3082V10.9814H27.2734L27.2904 9.09106ZM37.1401 12.5539H39.0388V14.3104H39.0727C39.1405 14.0595 39.2592 13.8253 39.4287 13.5911C39.5982 13.3569 39.8017 13.1394 40.056 12.9554C40.2933 12.7547 40.5646 12.6041 40.8697 12.487C41.1579 12.3699 41.4631 12.303 41.7682 12.303C42.0056 12.303 42.1751 12.3197 42.2599 12.3197C42.3446 12.3364 42.4463 12.3532 42.5311 12.3532V14.277C42.3955 14.2435 42.2429 14.2268 42.0903 14.2101C41.9377 14.1933 41.8021 14.1766 41.6495 14.1766C41.3105 14.1766 40.9884 14.2435 40.6832 14.3774C40.3781 14.5112 40.1238 14.7119 39.8864 14.9629C39.666 15.2305 39.4796 15.5484 39.3439 15.9331C39.2083 16.3179 39.1405 16.7696 39.1405 17.2714V21.5875H37.1062L37.1401 12.5539ZM51.8552 21.6377H49.8548V20.3663H49.8209C49.5666 20.8347 49.1936 21.186 48.702 21.4704C48.2103 21.7548 47.7018 21.8886 47.1932 21.8886C45.9895 21.8886 45.108 21.6042 44.5655 21.002C44.023 20.4164 43.7517 19.5131 43.7517 18.3253V12.5539H45.7861V18.1246C45.7861 18.9276 45.9386 19.4964 46.2608 19.8142C46.5659 20.1488 47.0067 20.3161 47.5661 20.3161C47.9899 20.3161 48.346 20.2492 48.6342 20.1153C48.9224 19.9815 49.1597 19.8142 49.3292 19.5967C49.5157 19.3793 49.6344 19.1116 49.7192 18.8105C49.8039 18.5094 49.8378 18.1748 49.8378 17.8235V12.5539H51.8722V21.6377H51.8552ZM55.3136 18.7268C55.3814 19.3123 55.6018 19.7138 55.9917 19.9648C56.3817 20.199 56.8563 20.3161 57.3988 20.3161C57.5853 20.3161 57.8057 20.2993 58.0431 20.2659C58.2804 20.2324 58.5177 20.1822 58.7212 20.0986C58.9416 20.015 59.1111 19.8979 59.2467 19.7306C59.3823 19.5633 59.4502 19.3625 59.4332 19.1116C59.4162 18.8607 59.3315 18.6432 59.145 18.4759C58.9585 18.3086 58.7381 18.1915 58.4669 18.0744C58.1956 17.974 57.8735 17.8904 57.5175 17.8235C57.1615 17.7566 56.8055 17.6729 56.4325 17.5893C56.0596 17.5056 55.6866 17.4053 55.3306 17.2882C54.9746 17.1711 54.6694 17.0205 54.3812 16.803C54.11 16.6023 53.8726 16.3514 53.7201 16.0335C53.5505 15.7157 53.4658 15.3476 53.4658 14.8792C53.4658 14.3774 53.5844 13.9759 53.8387 13.6413C54.0761 13.3067 54.3982 13.0391 54.7711 12.8383C55.1441 12.6376 55.5679 12.487 56.0257 12.4034C56.4834 12.3197 56.9242 12.2863 57.331 12.2863C57.8057 12.2863 58.2634 12.3364 58.6873 12.4368C59.1111 12.5372 59.518 12.6878 59.857 12.922C60.213 13.1394 60.5012 13.4405 60.7216 13.7918C60.959 14.1432 61.0946 14.5781 61.1624 15.08H59.0433C58.9416 14.5948 58.7212 14.277 58.3821 14.1097C58.0261 13.9424 57.6362 13.8588 57.1785 13.8588C57.0428 13.8588 56.8563 13.8755 56.6699 13.8922C56.4664 13.9257 56.2969 13.9591 56.1104 14.0261C55.9409 14.093 55.7883 14.1933 55.6696 14.3104C55.551 14.4275 55.4832 14.5948 55.4832 14.7956C55.4832 15.0465 55.5679 15.2305 55.7375 15.3811C55.907 15.5316 56.1274 15.6487 56.4156 15.7658C56.6868 15.8662 57.0089 15.9499 57.3649 16.0168C57.721 16.0837 58.0939 16.1673 58.4669 16.251C58.8398 16.3346 59.1959 16.435 59.5519 16.5521C59.9079 16.6692 60.23 16.8198 60.5012 17.0372C60.7725 17.238 61.0098 17.4889 61.1794 17.79C61.3489 18.0911 61.4336 18.4759 61.4336 18.9109C61.4336 19.4462 61.315 19.8979 61.0607 20.2826C60.8064 20.6507 60.4843 20.9685 60.0944 21.2027C59.7044 21.4369 59.2467 21.6042 58.772 21.7213C58.2804 21.8217 57.8057 21.8886 57.331 21.8886C56.7546 21.8886 56.2121 21.8217 55.7205 21.6878C55.2289 21.554 54.7881 21.3533 54.4321 21.1023C54.0761 20.8347 53.7879 20.5168 53.5844 20.1153C53.381 19.7306 53.2623 19.2622 53.2454 18.7101H55.2967V18.7268H55.3136ZM62.01 12.5539H63.5528V9.8104L65.5871 9.8104V12.5372H67.418V14.0261L65.5871 14.0261V18.8774C65.5871 19.0949 65.6041 19.2622 65.621 19.4294C65.638 19.58 65.6888 19.7138 65.7397 19.8142C65.8075 19.9146 65.9092 19.9982 66.0279 20.0484C66.1635 20.0986 66.3331 20.1321 66.5704 20.1321C66.706 20.1321 66.8586 20.1321 66.9942 20.1153C67.1298 20.0986 67.2824 20.0819 67.418 20.0484V21.6042C67.1977 21.6376 66.9773 21.6544 66.7569 21.6711C66.5365 21.7046 66.3331 21.7046 66.0957 21.7046C65.5532 21.7046 65.1294 21.6544 64.8073 21.554C64.4852 21.4536 64.2309 21.3031 64.0444 21.1191C63.8579 20.9183 63.7392 20.6841 63.6714 20.3997C63.6036 20.1153 63.5697 19.764 63.5528 19.396V14.0428H62.01V12.5205V12.5539ZM68.8421 12.5539H70.7578V13.7918H70.7917C71.0799 13.2565 71.4698 12.8885 71.9784 12.6543C72.487 12.4201 73.0295 12.303 73.6398 12.303C74.3688 12.303 74.996 12.4201 75.5385 12.6878C76.081 12.9387 76.5218 13.2733 76.8778 13.7249C77.2338 14.1599 77.5051 14.6785 77.6746 15.264C77.8441 15.8495 77.9458 16.4852 77.9458 17.1376C77.9458 17.7566 77.8611 18.3421 77.7085 18.9109C77.539 19.4796 77.3016 19.9982 76.9795 20.4332C76.6574 20.8681 76.2505 21.2194 75.7419 21.4871C75.2334 21.7547 74.657 21.8886 73.9788 21.8886C73.6906 21.8886 73.3855 21.8551 73.0973 21.8049C72.8091 21.7548 72.5209 21.6711 72.2496 21.554C71.9784 21.4369 71.7241 21.2863 71.5037 21.1023C71.2664 20.9183 71.0799 20.7008 70.9273 20.4666H70.8934V25.0001H68.859V12.5539H68.8421ZM75.9454 17.1041C75.9454 16.7027 75.8945 16.3012 75.7759 15.9164C75.6741 15.5316 75.5046 15.1971 75.2842 14.8959C75.0638 14.5948 74.7926 14.3606 74.4874 14.1766C74.1653 13.9926 73.7924 13.909 73.3855 13.909C72.5378 13.909 71.8936 14.1933 71.4528 14.7789C71.029 15.3644 70.8086 16.1506 70.8086 17.1209C70.8086 17.5893 70.8595 18.0075 70.9782 18.3923C71.0968 18.777 71.2494 19.1116 71.4868 19.396C71.7071 19.6804 71.9784 19.8979 72.3005 20.0651C72.6226 20.2324 72.9786 20.3161 73.4024 20.3161C73.8771 20.3161 74.2501 20.2157 74.5722 20.0317C74.8943 19.8477 75.1486 19.5967 75.369 19.3123C75.5724 19.0112 75.725 18.6767 75.8098 18.2919C75.8945 17.8904 75.9454 17.5056 75.9454 17.1041ZM79.5225 9.09106H81.5568V10.9814H79.5225V9.09106ZM79.5225 12.5539H81.5568V21.6377H79.5225V12.5539ZM83.3708 9.09106H85.4051V21.6377H83.3708V9.09106ZM91.6099 21.8886C90.8809 21.8886 90.2198 21.7715 89.6434 21.5205C89.067 21.2696 88.5923 20.9518 88.1854 20.5335C87.7955 20.1153 87.4903 19.5967 87.2869 19.0112C87.0835 18.4257 86.9648 17.7733 86.9648 17.0874C86.9648 16.4015 87.0665 15.7658 87.2869 15.1803C87.4903 14.5948 87.7955 14.093 88.1854 13.658C88.5753 13.2398 89.067 12.9052 89.6434 12.671C90.2198 12.4368 90.8809 12.303 91.6099 12.303C92.3389 12.303 93.0001 12.4201 93.5765 12.671C94.1529 12.9052 94.6275 13.2398 95.0344 13.658C95.4243 14.0762 95.7295 14.5948 95.9329 15.1803C96.1364 15.7658 96.255 16.4015 96.255 17.0874C96.255 17.79 96.1533 18.4257 95.9329 19.0112C95.7125 19.5967 95.4243 20.0986 95.0344 20.5335C94.6445 20.9518 94.1529 21.2863 93.5765 21.5205C93.0001 21.7547 92.3558 21.8886 91.6099 21.8886ZM91.6099 20.2993C92.0507 20.2993 92.4576 20.199 92.7797 20.015C93.1187 19.8309 93.373 19.58 93.5934 19.2789C93.8138 18.9778 93.9664 18.6265 94.0681 18.2584C94.1698 17.8737 94.2207 17.4889 94.2207 17.0874C94.2207 16.7027 94.1698 16.3179 94.0681 15.9331C93.9664 15.5484 93.8138 15.2138 93.5934 14.9127C93.373 14.6116 93.1018 14.3774 92.7797 14.1933C92.4406 14.0093 92.0507 13.909 91.6099 13.909C91.1691 13.909 90.7623 14.0093 90.4402 14.1933C90.1011 14.3774 89.8468 14.6283 89.6264 14.9127C89.406 15.2138 89.2534 15.5484 89.1517 15.9331C89.05 16.3179 88.9992 16.7027 88.9992 17.0874C88.9992 17.4889 89.05 17.8737 89.1517 18.2584C89.2534 18.6432 89.406 18.9778 89.6264 19.2789C89.8468 19.58 90.1181 19.8309 90.4402 20.015C90.7792 20.2157 91.1691 20.2993 91.6099 20.2993ZM96.8653 12.5539H98.4081V9.8104H100.442V12.5372H102.273V14.0261H100.442V18.8774C100.442 19.0949 100.459 19.2622 100.476 19.4294C100.493 19.58 100.544 19.7138 100.595 19.8142C100.663 19.9146 100.765 19.9982 100.883 20.0484C101.019 20.0986 101.188 20.1321 101.426 20.1321C101.561 20.1321 101.714 20.1321 101.85 20.1153C101.985 20.0986 102.138 20.0819 102.273 20.0484V21.6042C102.053 21.6376 101.833 21.6544 101.612 21.6711C101.392 21.7046 101.188 21.7046 100.951 21.7046C100.409 21.7046 99.9847 21.6544 99.6626 21.554C99.3405 21.4536 99.0862 21.3031 98.8997 21.1191C98.7132 20.9183 98.5945 20.6841 98.5267 20.3997C98.4589 20.1153 98.425 19.764 98.4081 19.396V14.0428H96.8653V12.5205V12.5539Z">
                                            <path d="M25 8.68493L15.4488 8.68493L12.5087 0L9.55113 8.68493L0 8.6683L7.72441 14.0423L4.76687 22.7272L12.4913 17.3532L20.2157 22.7272L17.2755 14.0423L25 8.68493Z" fill="#00B67A">
                                                <path d="M18.1818 16.7942L17.4898 14.7727L12.5 18.1818L18.1818 16.7942Z" fill="#005128">
                                    </svg>
                                </figure>
                                <!-- Rating -->
                                <img src="assets/images/elements/trustpilot-star.svg" class="h-20px" alt="Rating-img">
                                <p class="small mb-0 mt-2">Trustpilot score <span class="fw-bold heading-color">4.7 | 27 avaliações</span></p>
                            </div>
                            <!-- Trustpilot review END -->
                        </div>
                    </div>
                </div>
                <!-- About detail END -->
            </div>
        </section>
        <!-- =======================
About END -->


        <!-- =======================
About START -->
        <br>
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
                            <img src="images/android.png" class="rounded-3" alt="">
                            
                            <!-- Full screen button -->
                            <div class="w-100 h-100">
                       
                                  
                                <a class="btn btn-dark position-absolute top-50 start-50 translate-middle mb-0" href="RR_IMAGEM_MASCULINA_FINAL.apk" download>

                                <i class="bi bi-cloud-arrow-down"></i>
                                    <p> Faça Download de nosso aplicativo para Android™</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="col-md-6 col-xl-4">
                        <div class="card  overflow-hidden">
                            <!-- Image -->
                            <img src="images/46.jpg" class="rounded-3" alt="">
                            <!-- Full screen button -->
                            <div class="w-100 h-100">
                                <a class="btn btn-dark position-absolute top-50 start-50 translate-middle mb-0" href="portifolio.php">
                                    <i class="bi bi-eye me-2"></i>Portfólio
                                </a>
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

        <br>
        <!--    Services START -->
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
                                        <h6 class="fw-normal mb-0 "><i class="fa-solid fa-droplet fa-fw text-primary me-2"></i>Local Limpo e Ordenado</h6>
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
                                                <img src="https://i.imgur.com/ezWdryN.jpeg" class="img-fluid card-img" alt="...">
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
                                                <img src="https://i.imgur.com/cqF4f1V.jpg" class="img-fluid card-img" alt="...">
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
                                                <img src="https://i.imgur.com/tNl60mi.jpeg" class="img-fluid card-img" alt="...">
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
Work START -->

        <!-- =======================
Work END -->

        <!-- =======================
Testimonials START -->

        <!-- =======================
Testimonials END -->

        <!-- =======================
About accordion START -->

        <!-- =======================
About accordion END -->
        <br>

        <!-- Action box START -->
        <section class="py-0 py-md-5">
            <div class="container">
                <div class="position-relative rounded-3 overflow-hidden p-3 p-sm-5" style="background-image:url(https://i.imgur.com/bhr9rIM.jpg); background-position: center left; background-size: cover;">
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
                                <h5>Corte FAMÍLIA</h5>
                                <p class="mb-3">Corte de cabelo família</p>

                                <!-- Price -->
                                <h6 class="fw-normal mb-1">PAI + 1 FILHO</h6>
                                <div class="d-flex align-items-center">
                                    <h5 class="text-success mb-0 me-1">R$ 60.00</h5>
                                    <span class="mb-0 me-2">de</span>
                                    <span class="text-decoration-line-through">R$ 70.00</span>
                                </div>
                                <h6 class="fw-normal mb-1">PAI + 2 FILHOS</h6>
                                <div class="d-flex align-items-center">
                                    <h5 class="text-success mb-0 me-1">R$ 85.00</h5>
                                    <span class="mb-0 me-2">de</span>
                                    <span class="text-decoration-line-through">R$ 105.00</span>
                                </div>
                                <h6 class="fw-normal mb-1">PAI + 3 FILHOS</h6>
                                <div class="d-flex align-items-center">
                                    <h5 class="text-success mb-0 me-1">R$ 110.00</h5>
                                    <span class="mb-0 me-2">de</span>
                                    <span class="text-decoration-line-through">R$ 140.00</span>
                                </div>
                                <h5>Corte + Hidratação</h5>
                                <div class="d-flex align-items-center">
                                    <h5 class="text-success mb-0 me-1">R$ 60.00</h5>
                                    <span class="mb-0 me-2">de</span>
                                    <span class="text-decoration-line-through">R$ 70.00</span>
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
Blog START 
        <section class="pb-0">
            <div class="container">
                
                <div class="inner-container text-center mb-4 mb-sm-6">
                    <h2 class="mb-0">Our news & articles</h2>
                </div>

        
                <div class="swiper" data-swiper-options='{
				"spaceBetween": 30, 
				"loop": false,
				"breakpoints": {
					"576": {"slidesPerView": 1}, 
					"768": {"slidesPerView": 2}, 
					"992": {"slidesPerView": 3}
				},
				"navigation":{
					"nextEl":".swiper-button-next",
					"prevEl":".swiper-button-prev"
				}}'>

                    <div class="swiper-wrapper">
               
                        <div class="swiper-slide">
                            <article class="card bg-transparent">
                            
                                <img src="assets/images/blog/4by3/01.jpg" class="card-img" alt="blog-image">
                                <div class="card-body px-0 pb-0">
                                    <h6 class="card-title">Mastering Responsive Web Design with Bootstrap</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">By Jacqueline Miller</p>
                                        <a class="icon-link icon-link-hover stretched-link me-1" href="blog-single-v1.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </article>
                        </div>

                 
                        <div class="swiper-slide">
                            <article class="card bg-transparent">
                            
                                <img src="assets/images/blog/4by3/02.jpg" class="card-img" alt="blog-image">
                                <div class="card-body px-0 pb-0">
                                    <h6 class="card-title">Bootstrap Mastery: Designing Stunning Websites</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">By Dennis Barrett</p>
                                        <a class="icon-link icon-link-hover stretched-link me-1" href="blog-single-v2.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </article>
                        </div>

                 
                        <div class="swiper-slide">
                            <article class="card bg-transparent">
                         
                                <img src="assets/images/blog/4by3/03.jpg" class="card-img" alt="blog-image">
                                <div class="card-body px-0 pb-0">
                                    <h6 class="card-title">Interactive Web Design with Bootstrap and Webestica</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">By Carolyn Ortiz</p>
                                        <a class="icon-link icon-link-hover stretched-link me-1" href="blog-single-v1.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </article>
                        </div>

                   
                        <div class="swiper-slide">
                            <article class="card bg-transparent">
                     
                                <img src="assets/images/blog/4by3/04.jpg" class="card-img" alt="blog-image">
                                <div class="card-body px-0 pb-0">
                                    <h6 class="card-title">Effortless Web Development with Mizzle</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">By Carolyn Ortiz</p>
                                        <a class="icon-link icon-link-hover stretched-link me-1" href="blog-single-v2.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </article>
                        </div>

                  
                        <div class="swiper-slide">
                            <article class="card bg-transparent">
                           
                                <img src="assets/images/blog/4by3/05.jpg" class="card-img" alt="blog-image">
                                <div class="card-body px-0 pb-0">
                                    <h6 class="card-title">Sleek and Responsive - Designing with Bootstrap and Mizzle</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0">By Carolyn Ortiz</p>
                                        <a class="icon-link icon-link-hover stretched-link me-1" href="blog-single-v1.html">Read more<i class="bi bi-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                 
                    <div class="d-flex justify-content-between position-absolute top-50 start-0 w-100">
                        <a href="#" class="btn btn-dark btn-icon btn-lg rounded-circle mb-0 swiper-button-prev"><i class="bi bi-arrow-left"></i></a>
                        <a href="#" class="btn btn-dark btn-icon btn-lg rounded-circle mb-0 swiper-button-next"><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
         
            </div>
        </section>
   
Blog END -->





        <!-- MODAIS -->
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






    </main>
    <!-- **************** MAIN CONTENT END **************** -->




    <!-- =======================
Footer START -->
    <footer class="pt-6">
        <div class="container position-relative mt-sm-5">

            <!-- CTA -->
            <div class="row g-3 g-md-4 align-items-center">
                <div class="col-md-6">
                    <h2 class="mb-0 lh-base">Faça já o seu
                        <span class="position-relative z-index-1">agendamento
                            <!-- SVG START -->
                            <span class="position-absolute top-50 start-50 translate-middle z-index-n1 ms-n2 d-none d-lg-block">
                                <svg width="188" height="53" viewBox="0 0 188 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-primary" d="M3.50843 26.6791C5.35764 34.7553 19.176 38.9851 26.7629 41.4254C47.5981 47.4215 69.586 48.7695 91.2825 49.6062C107.583 50.0478 123.91 49.7573 140.135 48.1885C154.13 46.7243 169.469 45.5158 180.691 36.9051C185.618 33.0239 185.82 27.2834 181.324 22.9954C169.418 11.8166 138.589 7.57514 121.756 4.98378C103.226 2.36919 84.4557 3.171 65.8116 4.27494C77.9834 4.49573 90.1553 5.19295 102.238 6.57578C107.406 7.27301 112.802 8.35371 117.032 11.3053C113.093 10.457 109.015 10.4338 105 10.1084C76.8182 7.19166 47.1675 4.62355 19.9233 13.5713C13.9704 15.8256 2.97647 19.5442 3.50843 26.6791ZM0 25.7727C1.06393 10.1897 39.758 5.03027 53.3231 4.43763C51.1192 4.29818 48.9154 4.07739 46.7242 3.78688C50.3846 2.79915 54.121 2.04382 57.9081 1.60224C65.5583 0.939879 73.2464 0.753952 80.9092 0.323997C94.0944 -0.349987 107.305 0.0102456 120.414 1.56738C136.816 4.10063 197.384 11.3983 186.757 34.918C184.554 38.8573 180.399 41.4603 176.27 43.5403C166.163 48.6068 154.523 49.8618 143.263 51.1285C126.456 52.7902 109.559 53.3131 92.6631 52.825C67.7368 51.907 42.1772 50.501 18.6947 42.1459C11.1586 39.1943 0.126658 34.3834 0 25.7727Z">
                                </svg>
                            </span>
                            <!-- SVG END -->
                        </span>
                        aqui e agora!
                    </h2>
                </div>

                <!-- Button -->
                <div class="col-md-5 text-md-end ms-auto">
                    <a class="btn btn-lg btn-primary-soft icon-link icon-link-hover mb-0" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Agendar<i class="bi bi-arrow-right"></i> </a>
                </div>
            </div>

            <!-- Divider -->
            <hr class="my-5">

            <!-- Footer Widgets -->
            <div class="row g-4 justify-content-between">

                <!-- Widget 1 START -->
                <div class="col-lg-8 col-xl-7">
                    <div class="row g-4">
                        <!-- Link block -->
                        <div class="col-6 col-md-3">
                            <h6 class="mb-2 mb-md-4">Nosso endereço: </h6>
                            <div style="width: 100%"><iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=200&amp;height=200&amp;hl=en&amp;q=Rua%20Adri%C3%A3o%20Dias,%2088%20Balne%C3%A1rio%20Jussara%20Mongagu%C3%A1-SP+(RR%20IMAGEM%20MASCULINA)&amp;t=h&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a></iframe></div>
                            <p><i class="bi bi-geo-alt"></i> Rua Adrião Dias, N° 88 Balneário Jussara Mongaguá-SP</p>
                        </div>

                        <!-- Link block -->


                        <!-- Link block -->

                    </div>
                    <h6 class="mb-2 mb-md-4">Formas de pagamento aceitas:</h6>
                    <li class="list-inline-item"> <a href="#"><img src="assets/images/elements/paypal.svg" class="h-30px" alt=""></a></li>
                    <li class="list-inline-item"> <a href="#"><img src="assets/images/elements/visa.svg" class="h-30px" alt=""></a></li>
                    <li class="list-inline-item"> <a href="#"><img src="assets/images/elements/mastercard.svg" class="h-30px" alt=""></a></li>
                    <li class="list-inline-item"> <a href="#"><img src="images/pix-bc-logo.png" class="h-30px" alt=""></a></li>


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
                    <img class="light-mode-item navbar-brand-item h-40px" src="https://i.imgur.com/jZClhu7.png" alt="logo">
                    <img class="dark-mode-item navbar-brand-item h-40px" src="https://i.imgur.com/OA1fvSJ.png" alt="logo">
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

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!--Vendors-->
    <script src="assets/vendor/purecounterjs/dist/purecounter_vanilla.js"></script>
    <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/imagesLoaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/tiny-slider/tiny-slider.js"></script>
    <!-- Theme Functions -->
    <script src="assets/js/functions.js"></script>

</body>

</html>
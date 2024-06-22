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
Main hero START -->
        <section class="pt-8">
            <div class="container">
                <!-- Breadcrumb & title -->
                <div class="bg-dark rounded-4 text-center position-relative overflow-hidden py-5">

                    <!-- Svg decoration -->
                    <figure class="position-absolute top-0 start-0 ms-n8">
                        <svg width="424" height="405" viewBox="0 0 424 405" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="212" cy="202.5" rx="212" ry="202.5" fill="url(#paint0_linear_153_3831)" />
                            <defs>
                                <linearGradient id="paint0_linear_153_3831" x1="212" y1="0" x2="212" y2="405" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.0569271" stop-color="#D9D9D9" stop-opacity="0" />
                                    <stop offset="0.998202" stop-color="#D9D9D9" stop-opacity="0.5" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </figure>

                    <!-- SVG decoration -->
                    <figure class="position-absolute top-0 end-0 me-n8 mt-5">
                        <svg class="opacity-3" width="371" height="354" viewBox="0 0 371 354" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="172.5" cy="176.5" rx="131.5" ry="125.5" fill="url(#paint0_linear_195_2)" />
                            <ellipse cx="185.5" cy="177" rx="185.5" ry="177" fill="url(#paint1_linear_195_2)" />
                            <defs>
                                <linearGradient id="paint0_linear_195_2" x1="172.5" y1="51" x2="172.5" y2="302" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.0569271" stop-color="#D9D9D9" stop-opacity="0.5" />
                                    <stop offset="0.998202" stop-color="#D9D9D9" stop-opacity="0" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_195_2" x1="185.5" y1="0" x2="185.5" y2="354" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.0569271" stop-color="#D9D9D9" stop-opacity="0.2" />
                                    <stop offset="0.998202" stop-color="#D9D9D9" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </figure>

                    <!-- Breadcrumb -->
                    <div class="d-flex justify-content-center position-relative z-index-9">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dots breadcrumb-dark mb-1">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Portfolio RR</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Title -->
                    <h1 class="h2 text-white">PORTFOLIO RR IMAGEM MASCULINA</h1>
                </div>

                <!-- Tabs -->
                <div class="d-lg-flex align-items-center justify-content-center mt-6">
                    <h6 class="mb-lg-0 me-3">Navegue por:</h6>
                    <div class="grid-menu" data-target=".filter-container">
                        <ul class="nav nav-pills nav-pills-primary-soft gap-2">
                            <li class="nav-item">
                                <a class="nav-link active" data-filter="*">Todos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-filter=".marketing">Amigos RR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-filter=".design">Ambiente</a>
                            </li>
                            <!-- 
					<li class="nav-item">
							<a class="nav-link" data-filter=".business">Development</a>        
					</li>
					<li class="nav-item">
						<a class="nav-link" data-filter=".brand">Brand design</a>        
					</li>
					<li class="nav-item">
						<a class="nav-link" data-filter=".ui">UI/UX design</a>        
					</li>
                    Tabs -->
                        </ul>
                    </div>
                </div>

                <!-- Portfolio item START -->
                <div class="row g-4 filter-container mt-3" data-isotope='{"layoutMode": "masonry"}'>
                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (15).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Rychard Rombaldo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (11).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Adriel Dias</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (12).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Eduardo Lourenço</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (10).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Adriel Dias - Eduardo Lourenço - Renan Ricardo - Rychard Rombaldo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (6).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Alan Oliveira - Misael Oliveira - Renan Ricardo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (5).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Misael Oliveira - Starks Oliveira - Renan Ricardo - Rychard Rombaldo</small>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (7).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Starks Oliveira - Rychard Rombaldo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (4).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Alex Oliveira - Misael Oliveira - Renan Ricardo - Rychard Rombaldo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (3).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Gustavo Souza - Renan Ricardo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (2).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Gustavo Souza - Renan Ricardo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Item -->
                     <div class="col-sm-6 col-lg-4 grid-item marketing business brand">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (1).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white">Elias Marqui - Renan Ricardo</small>
                                </div>
                            </div>
                        </div>
                    </div>

                  

                    <!-- Item -->
                

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (31).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item -->
                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (32).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Item -->
                     <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (30).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- Item -->
                        <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (29).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (28).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (27).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (26).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (25).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (24).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (23).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (22).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (21).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (20).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (19).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (18).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 grid-item design marketing">
                        <div class="card card-element-hover card-metro-hover">
                            <!-- Card Image -->
                            <img src="images/RR (17).jpeg" alt="portfolio-img">

                            <!-- Card elements -->
                            <div class="card-img-overlay hover-element d-flex">
                                <!-- Info -->
                                <div class="card-text mt-auto">
                                    <h6 class="mb-0"><a class="text-white stretched-link">RR Imagem Masculina</a></h6>
                                    <small class="text-white"></small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Portfolio item END -->

                <!-- button -->
                <div class="text-center mt-7">

                </div>

            </div>
        </section>
        <!-- =======================
Main hero END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- =======================
Footer START -->
    <footer class="bg-dark pt-6" data-bs-theme="dark">
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
                    <li class="list-inline-item"> <a href="#"><img src="assets/images/elements/expresscard.svg" class="h-30px" alt=""></a></li>


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

<!-- Mirrored from mizzle.webestica.com/portfolio-masonry.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Mar 2024 17:00:37 GMT -->

</html>
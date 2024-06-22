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

    <title>Escolha uma Barbeiro</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/swiper/swiper-bundle.min.css">


    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <?php if (!empty($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <div class="row g-0">
            <!-- left -->
            <div class="col-lg-7 vh-100 d-none d-lg-block">
                <!-- Slider START -->
                <div class="swiper h-100" data-swiper-options='{
					"pagination":{
						"el":".swiper-pagination",
						"clickable":"true"
					}}'>

                    <!-- Slider items START -->
                    <div class="swiper-wrapper">
                        <!-- Item -->
                        <div class="swiper-slide">
                            <div class="card rounded-0 h-100" data-bs-theme="dark" style="background-image:url(https://i.imgur.com/Se0Qp42.jpeg); background-position: center left; background-size: cover;">
                                <!-- Bg overlay -->
                                <div class="bg-overlay bg-dark opacity-5"></div>

                                <!-- Card info -->
                                <div class="card-img-overlay z-index-2 p-7">
                                    <div class="d-flex flex-column justify-content-end h-100">
                                        <!-- Quote -->
                                        <h4 class="fw-light">"A arte de cortar cabelo é mais do que simplesmente aparar; é uma forma de expressão e conexão com cada cliente."</h4>
                                        <!-- Info -->
                                        <div class="d-flex justify-content-between mt-5">
                                            <div>
                                                <h5 class="mb-0">- Vidal Sassoon</h5>
                                                <span>Barbeiro</span>
                                            </div>
                                            <!-- Rating star -->
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small"><i class="fa-solid fa-star-half-alt text-white"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide">
                            <div class="card rounded-0 h-100" data-bs-theme="dark" style="background-image:url(https://i.imgur.com/nEMQPVW.jpeg); background-position: center left; background-size: cover;">
                                <!-- Bg overlay -->
                                <div class="bg-overlay bg-dark opacity-5"></div>

                                <!-- Card info -->
                                <div class="card-img-overlay z-index-2 p-7">
                                    <div class="d-flex flex-column justify-content-end h-100">
                                        <!-- Quote -->
                                        <h4 class="fw-light">"Um bom corte de cabelo pode transformar não apenas a aparência física, mas também a autoconfiança de uma pessoa."</h4>
                                        <!-- Info -->
                                        <div class="d-flex justify-content-between mt-5">
                                            <div>
                                                <h5 class="mb-0">- John Sahag</h5>
                                                <span>Barbeiro</span>
                                            </div>
                                            <!-- Rating star -->
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small"><i class="fa-solid fa-star-half-alt text-white"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="swiper-slide">
                            <div class="card rounded-0 h-100" data-bs-theme="dark" style="background-image:url(https://i.imgur.com/lM8qegO.jpeg); background-position: center left; background-size: cover;">
                                <!-- Bg overlay -->
                                <div class="bg-overlay bg-dark opacity-5"></div>

                                <!-- Card info -->
                                <div class="card-img-overlay z-index-2 p-7">
                                    <div class="d-flex flex-column justify-content-end h-100">
                                        <!-- Quote -->
                                        <h4 class="fw-light">"O barbeiro não apenas molda o cabelo, mas também molda a identidade e a autoestima de seus clientes."</h4>
                                        <!-- Info -->
                                        <div class="d-flex justify-content-between mt-5">
                                            <div>
                                                <h5 class="mb-0">- Paul Mitchell</h5>
                                                <span>Barbeiro</span>
                                            </div>
                                            <!-- Rating star -->
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small me-0"><i class="fa-solid fa-star text-white"></i></li>
                                                <li class="list-inline-item small"><i class="fa-solid fa-star-half-alt text-white"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slider Pagination -->
                    <div class="swiper-pagination swiper-pagination-line mb-3"></div>
                </div>
            </div>

            <!-- Right -->
            <div class="col-sm-10 col-lg-5 d-flex m-auto vh-100">
                <div class="row w-100 m-auto">
                    <div class="col-sm-10 my-5 m-auto">

                        <a href="index.php"><img src="images/icone.png" class="h-60px mb-4" alt="logo"></a>


                        <style>
                            form {
                                max-height: 400px;
                                /* Defina o valor que desejar */
                                font-size: 0.8em;
                                /* Adiciona uma barra de rolagem vertical se o conteúdo do formulário exceder a altura máxima */
                            }
                        </style>


                        <!-- Form START -->

                        <form id="barberForm" class="align-items-center" action="page1.php" method="GET">
                            <h4>Selecione um barbeiro</h4>
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







                        <!-- Form END -->

                        <!-- Sign up link -->
                        <div class="mt-4 text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- **************** MAIN CONTENT END **************** -->
    <script>
        function selectBarber(id, name) {
            document.getElementById("selectedBarber").value = id + "|" + name;
            document.getElementById("dropdownMenuButton").innerText = name;

        }
    </script>
    <!-- Back to top -->
    <div class="back-top"></div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!--Vendors-->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


    <!-- Theme Functions -->
    <script src="assets/js/functions2.js"></script>

</body>

</html>
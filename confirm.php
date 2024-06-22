<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $selectedBarberId = $_POST["barberId"];
    $selectedBarberName = $_POST["barberName"];
    $fullname = $_POST["fullname"];
    $cpf = $_POST["cpf"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $selectedDate = $_POST["date"];
    $selectedTime = $_POST["time"];
    $status = $_POST["status"];
    $servico = $_POST["service"];
    $pagamento = $_POST["pagamento"];
    $combo = $_POST["combo"];

    // Extrai os valores do combo
    if (!empty($combo)) {
        $comboValues = explode('|', $combo);

        // Verifica se há índices definidos antes de acessá-los
        if (count($comboValues) >= 3) {
            $comboId = $comboValues[0];
            $comboName = $comboValues[1];
            $comboPrice = $comboValues[2];
        } else {
            // Lidar com erro de dados inválidos (por exemplo, redirecionar para uma página de erro)
            die("Erro: Dados do combo inválidos.");
        }
    }

    // Extrai os valores do serviço
    if (!empty($servico)) {
        $servicoValues = explode('|', $servico);

        // Verifica se há índices definidos antes de acessá-los
        if (count($servicoValues) >= 3) {
            $servicoId = $servicoValues[0];
            $servicoName = $servicoValues[1];
            $servicoCost = $servicoValues[2];
        } else {
            // Lidar com erro de dados inválidos (por exemplo, redirecionar para uma página de erro)
            die("Erro: Dados do serviço inválidos.");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Confirmar</title>

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
                            <div class="card rounded-0 h-100" data-bs-theme="dark" style="background-image:url(https://i.imgur.com/lM8qegO.jpg); background-position: center left; background-size: cover;">
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
            <style>
                .row {


                    overflow-y: auto;
                    margin: 0;
                }
            </style>
            <!-- Right -->
            <div class="col-sm-10 col-lg-5 d-flex m-auto vh-100">
                <div class="row w-100 ">

                    <div class="col-sm-10 my-5 m-auto">

                        <a href="index.php"><img src="images/icone.png" class="h-60px mb-4" alt="logo"></a>





                        <!-- Form START -->


                        <div class="overflow">
                            <form class="barra" action="insert_appointment.php" method="POST">
                                <h4>Confirmar os dados: </h4>
                                <div class="mb-3">

                                    <label for="barberId" class="form-label"></label>
                                    <input type="hidden" class="form-control" name="barberId" id="barberId" value="<?php echo $selectedBarberId; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="barberName" class="form-label">Nome do Barbeiro:</label>
                                    <input type="text" class="form-control" name="barberName" id="barberName" value="<?php echo $selectedBarberName; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nome Completo:</label>
                                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $fullname; ?>" readonly>
                                </div>

                        </div>
                        <div class="mb-3">

                            <input type="hidden" class="form-control2" name="date" id="date" value="<?php echo $selectedDate; ?>" readonly>
                        </div>

                        <?php $formattedDate = date("d/m/Y", strtotime($selectedDate));  ?>
                        <div class="mb-3">
                            <label for="date" class="form-label"><b>Data Selecionada:</b></label>
                            <input type="text" class="form-control" id="date" value="<?php echo $formattedDate; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" name="cpf" id="fullname" value="<?php echo $cpf; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contato:</label>
                            <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label"><b>Horário Selecionado:</b></label>
                            <input type="text" class="form-control" name="time" id="time" value="<?php echo $selectedTime; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="pagamento" class="form-label"><b>Forma de pagamento Selecionada:</b></label>
                            <input type="text" class="form-control" name="pagamento" id="pagamento" value="<?php echo $pagamento; ?>" readonly>
                        </div>
                        <div class="mb-3">

                            <label for="sevico" class="form-label"><b>Serviço ou combo Selecionado:</b></label>
                            <!-- Div para exibir informações do serviço ou combo selecionado -->
                            <div class="alert alert-info" role="alert">
                                <?php if (isset($servicoName) && isset($servicoCost)) : ?>
                                    <h5><?php echo $servicoName . ' - R$' . $servicoCost; ?></h5>
                                <?php elseif (isset($comboName) && isset($comboPrice)) : ?>
                                    <h5><?php echo $comboName . ' - R$' . $comboPrice; ?></h5>
                                <?php else : ?>
                                    <h5>Nenhum serviço ou combo selecionado.</h5>
                                <?php endif; ?>
                            </div>

                            <!-- Campos de entrada ocultos para armazenar o ID do serviço ou combo selecionado -->
                            <?php if (!empty($servicoId)) : ?>
                                <input type="hidden" class="form-control" name="service" id="service" value="<?php echo $servicoId; ?>" readonly>
                            <?php endif; ?>

                            <?php if (!empty($comboId)) : ?>
                                <input type="hidden" class="form-control" name="combo" id="combo" value="<?php echo $comboId; ?>" readonly>
                            <?php endif; ?>




                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label"></label>
                            <input type="hidden" class="form-control" name="status" id="status" value="<?php echo $status; ?>" readonly>
                        </div>
                        <div class="text-center">

                            <button type="button" onclick="window.history.back()" class="btn btn-secondary custom-btn1">Voltar</button>
                            <input type="submit" value="Confirmar" class="btn btn-primary custom-btn">
                        </div>


                        </form>


                    </div>





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



    </script>
    <!-- Back to top -->
    <div class="back-top"></div>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!--Vendors-->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


    <!-- Theme Functions -->
    <script src="assets/js/functions2.js"></script>

</body>

</html>
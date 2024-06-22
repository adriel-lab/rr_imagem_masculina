<?php
$include_path = __DIR__ . '/BD/conexao.php';
include_once($include_path);

$error_message = "";

if (!isset($_GET['date']) || !isset($_GET['time']) || !isset($_GET['barberId'])) {
    header("Location: page1.php");
    exit();
}

$selectedDate = urldecode($_GET['date']);
$selectedTime = urldecode($_GET['time']);
$selectedBarberId = urldecode($_GET['barberId']);

list($barberId, $barberName) = explode('|', $selectedBarberId);

//echo "Date: $selectedDate, Time: $selectedTime, BarberId: $selectedBarberId";
// Verificar se o formulário foi enviado


$sql = "SELECT id, time_slot FROM time_slots WHERE barber_id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $selectedBarberId);
$stmt->execute();
$resultTimeSlots = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>Dados do cliente</title>

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



                        <form action="page4.php" method="POST">
                            <!-- Mantém a escolha do barbeiro -->

                            <input type="hidden" name="date" value="<?php echo ($selectedDate); ?>">
                            <input type="hidden" name="time" value="<?php echo ($selectedTime); ?>">
                            <input type="hidden" name="barberName" value="<?php echo ($barberName); ?>">
                            <input type="hidden" name="barberId" value="<?php echo ($barberId); ?>">


                            <div class="mb-3">
                                <h5>Informe Seus Dados: </h5>
                                <!--      <label for="barber" class="form-label">Barbeiro:</label>
                <select required disabled onchange="updateSelectedBarber()" class="form-select">
                    <?php echo "<option value='$barberId'>$barberName</option>";   ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="barber" class="form-label">Data escolhida:</label>
                <select required disabled onchange="updateSelectedBarber()" class="form-select">
                    <?php echo "<option value=''>$selectedDate</option>";   ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="barber" class="form-label">Horario escolhido:</label>
                <select  required disabled onchange="updateSelectedBarber()" class="form-select">
                    <?php echo "<option value=''>$selectedTime</option>";   ?>
                </select>
            </div>
-->

                                <!-- ... (Campos adicionais, como nome, contato, e-mail) -->

                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Nome Completo:</label>
                                    <input type="text" id="fullname" name="fullname" class="form-control" required>
                                </div>

                                <div class="mb-3">
                              
                                    <input type="hidden"  value="000.000.000-00"  id="fullname" name="cpf" class="form-control" >
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contato whatsapp:</label>
                                    <input type="text" id="contact" name="contact" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                  
                                    <input type="hidden" value="rrimagemmasculina@gmail.com" id="email" name="email" class="form-control" >
                                </div>

                                <input type="hidden" id="status" name="status" value="0">

                                <div class="text-center">
                                    <br>
                                    <button type="button" onclick="window.history.back()" class="btn btn-secondary custom-btn1">Voltar</button>
                                    <input type="submit" value="Próximo" class="btn btn-primary custom-btn">
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
<?php $conexao->close(); ?>
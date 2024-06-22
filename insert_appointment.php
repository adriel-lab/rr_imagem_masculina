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
    <link rel="stylesheet" type="text/css" href="assets2/vendor/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets2/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets2/vendor/swiper/swiper-bundle.min.css">


    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets2/css/style.css">

</head>

<body>


    <?php
    $include_path = __DIR__ . '/BD/conexao.php';
    include_once($include_path);

    // Defina o fuso horário para o correto
    date_default_timezone_set('America/Sao_Paulo'); // Substitua 'America/Sao_Paulo' pelo seu fuso horário

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
        $pagamento = $_POST["pagamento"];


        $null = 'invalido'; // definindo a variável nula corretamente

        // Determinando qual valor atribuir
        if (isset($_POST["service"])) {
            $selectedServiceOrCombo = $_POST["service"];
            $selectedCombo = $null; // definindo combo como nulo
        } elseif (isset($_POST["combo"])) {
            $selectedServiceOrCombo = $null; // definindo serviço como nulo
            $selectedCombo = $_POST["combo"];
        }


        // Validação de dados
        if (empty($fullname) || empty($contact) || empty($email) || empty($selectedDate) || empty($selectedTime)) {
            echo "Por favor, preencha todos os campos obrigatórios.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Por favor, insira um endereço de email válido.";
        } else {
            // Combine a data e o horário em um único valor de agendamento
            $schedule = "$selectedDate $selectedTime";

            // Obtenha o timestamp atual
            $currentTime = time();

            // Converta a data e o horário do agendamento em um timestamp
            $scheduleTime = strtotime($schedule);


            // Verifique se a data selecionada está dentro do intervalo de até 7 dias a partir da data atual
            $currentDate = date("Y-m-d");
            $maxAllowedDate = date("Y-m-d", strtotime("+7 days"));

            if ($selectedDate < $currentDate) {

                echo '<div class="message-container text-center">
            <img src="images/danger.png" alt="Imagem" class="bold-large-text" style="width: 300px; height: 300px;">
            <p class="bold-large-text">ERRO!!!<br>Só é possível agendar para uma data futura (a partir de amanhã).</p>
            <button onclick="goBack()" class="btn btn-primary custom-btn1">Voltar</button>
        </div>';
            } elseif ($selectedDate > $maxAllowedDate) {
                echo '<div class="message-container text-center">
            <img src="images/danger.png" alt="Imagem" class="bold-large-text" style="width: 300px; height: 300px;">
            <p class="bold-large-text">ERRO!!!<br>Não é possível agendar para uma data mais de 7 dias à frente.</p>
            <button onclick="goBack()" class="btn btn-primary custom-btn1">Voltar</button>
        </div>';
            } else {
                // Verifique se o horário do agendamento é pelo menos 1 hora antes do horário escolhido no formulário
                $oneHourBeforeForm = strtotime("-1 hour", $scheduleTime);
                if ($currentTime >= $oneHourBeforeForm) {
                    echo '<div class="message-container text-center">
                <img src="images/danger.png" alt="Imagem" class="bold-large-text" style="width: 300px; height: 300px;">
                <p class="bold-large-text">ERRO!!!<br>Você só pode agendar para um horário até 1 hora antes do horário escolhido.</p>
                <button onclick="goBack()" class="btn btn-primary custom-btn1">Voltar</button>
            </div>';
                } else {
                    // Verifique se já existe um agendamento para o mesmo barbeiro, data e horário
                    $sqlCheck = "SELECT COUNT(*) as count FROM appointment_list WHERE schedule = ? AND barber = ?";
                    $stmtCheck = $conexao->prepare($sqlCheck);
                    $stmtCheck->bind_param("ss", $schedule, $selectedBarberName);
                    $stmtCheck->execute();
                    $resultCheck = $stmtCheck->get_result();
                    $rowCheck = $resultCheck->fetch_assoc();

                    if ($rowCheck["count"] > 0) {
                        echo '<div class="message-container text-center">
            <img src="images/danger.png" alt="Imagem" class="bold-large-text" style="width: 300px; height: 300px;">
            <p class="bold-large-text">ERRO!!!<br>Já existe um agendamento para este barbeiro na mesma data e horário. Por favor, selecione outro horário.</p>
            <button onclick="goBack()" class="btn btn-primary custom-btn1">Voltar</button>
        </div>';
                    } else {

                        if ($selectedCombo !== 'invalido') {
                            // Preparando a consulta SQL para inserir o compromisso do combo
                            $sqlInsertCombo = "INSERT INTO appointment_list (fullname, cpf, contact, email, schedule, status, barber, combo, service, pagamento, barber_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            $stmtInsertCombo = $conexao->prepare($sqlInsertCombo);
                        
                            // Verifica se a preparação da consulta preparada foi bem-sucedida
                            if ($stmtInsertCombo === false) {
                                die('Erro ao preparar a consulta: ' . $conexao->error);
                            }
                        
                            // Ligando os parâmetros para o compromisso do combo
                            $stmtInsertCombo->bind_param("sssssssssss", $fullname, $cpf, $contact, $email, $schedule, $status, $selectedBarberName, $selectedCombo, $selectedServiceOrCombo, $pagamento, $selectedBarberId);
                        
                            // Executando a inserção do compromisso do combo
                            if (!$stmtInsertCombo->execute()) {
                                die('Erro ao inserir o compromisso do combo: ' . $stmtInsertCombo->error);
                            }
                        
                            // Adicionando 30 minutos ao horário do compromisso
                            $scheduleDateTime = new DateTime($schedule);
                            $scheduleDateTime->modify('+30 minutes');
                            $schedulePlus30Minutes = $scheduleDateTime->format('Y-m-d H:i:s');
                        
                            // Preparando a consulta SQL para inserir o agendamento do barbeiro
                            $sqlInsertBarberSchedule = "INSERT INTO appointment_list (barber_id, schedule) VALUES (?, ?)";
                            $stmtInsertBarberSchedule = $conexao->prepare($sqlInsertBarberSchedule);
                        
                            // Verifica se a preparação da consulta preparada foi bem-sucedida
                            if ($stmtInsertBarberSchedule === false) {
                                die('Erro ao preparar a consulta: ' . $conexao->error);
                            }
                        
                            // Ligando os parâmetros para o agendamento do barbeiro
                            $stmtInsertBarberSchedule->bind_param("is", $selectedBarberId, $schedulePlus30Minutes);
                        
                            // Executando a inserção do agendamento do barbeiro
                            if (!$stmtInsertBarberSchedule->execute()) {
                                die('Erro ao inserir o agendamento do barbeiro: ' . $stmtInsertBarberSchedule->error);
                            }
                        } else {
                            // Parte do código para inserção de compromissos regulares
                            $sqlInsert = "INSERT INTO appointment_list (fullname, cpf, contact, email, schedule, status, barber, combo, service, pagamento, barber_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                            $stmtInsert = $conexao->prepare($sqlInsert);
                        
                            // Verifica se a preparação da consulta preparada foi bem-sucedida
                            if ($stmtInsert === false) {
                                die('Erro ao preparar a consulta: ' . $conexao->error);
                            }
                        
                            // Ligando os parâmetros
                            $stmtInsert->bind_param("sssssssssss", $fullname, $cpf, $contact, $email, $schedule, $status, $selectedBarberName, $selectedCombo, $selectedServiceOrCombo, $pagamento, $selectedBarberId);
                        
                            // Executando a inserção do compromisso regular
                            if (!$stmtInsert->execute()) {
                                die('Erro ao inserir o compromisso regular: ' . $stmtInsert->error);
                            }
                        }
                        
                        // Parte do código comum para ambos os casos (combo selecionado ou não)
                        
                        $formattedDate = date('d/m/Y', strtotime($selectedDate));
                        $sucessMessage = 'Sucesso!';
                        $params = http_build_query(array(
                            'fullname' => $fullname,
                            'cpf' => $cpf,
                            'contact' => $contact,
                            'email' => $email,
                            'schedule' => $schedule,
                            'status' => $status,
                            'barber' => $selectedBarberName,
                            'combo' => $selectedCombo,
                            'service_or_combo' => $selectedServiceOrCombo,
                            'barber_id' => $selectedBarberId,
                            'formattedDate' => $formattedDate,
                            'pagamento' => $pagamento,
                            'sucessMessage' => $sucessMessage
                        ));

                            // Redirecionamento para a página de sucesso com os parâmetros na URL
                             header('Location: sucesso.php?' . $params);
                       

                        // Fechar a conexão com o banco de dados após a inserção
                      
                    }

                    // Fechar a conexão com o banco de dados após a verificação
                    $stmtCheck->close();
                }
            }
        }

        // Fechar a conexão com o banco de dados (se já não estiver fechada)
        $conexao->close();
    } else {
        echo "Este script não deve ser acessado diretamente.";
    }
    ?>


























    <!-- Inclua o jQuery (requisito para alguns componentes do Bootstrap) -->
    <script>
        function goToIndex() {
            window.location.href = 'index.php'; // Substitua 'index.html' pelo URL da sua página inicial, se necessário
        }
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    <!-- Inclua o JavaScript do Bootstrap -->
    <!-- Bootstrap JS -->
    <script src="assets2/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!--Vendors-->
    <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>


    <!-- Theme Functions -->
    <script src="assets2/js/functions2.js"></script>

</body>

</html>
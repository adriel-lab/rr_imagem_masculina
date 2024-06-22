<?php
$include_path = __DIR__ . '/BD/conexao.php';
include_once($include_path);

$selectedBarberId = "";
$selectedDate = "";
$error_message = "";

if (isset($_GET['barberId'])) {
    $selectedBarber = $_GET['barberId'];
    list($barberId, $barberName1) = explode('|', $selectedBarber);
    $selectedBarberId = $barberId;
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedBarberId = $_POST["barber"];
    $selectedDate = $_POST["date"];
    $selectedTime = $_POST["time"];


}

// Consulta para obter os barbeiros disponíveis
$sql = "SELECT id, nome FROM barbeiros WHERE disponibilidade = 'Disponível'";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Agendamentos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <?php if (!empty($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">

        <form action="insert_appointment.php" method="POST">
            <div class="mb-3">
                <h1>Cadastrar novo agendamento</h1>
                <label for="barber" class="form-label">Barbeiro:</label>
                <select name="barber" id="barberSelect" required disabled onchange="updateSelectedBarber()" class="form-select">
                    <option value="">Selecione um barbeiro</option>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $barberId = $row['id'];
                        $barberName = $row['nome'];
                        $selected = ($barberId == $selectedBarberId) ? "selected" : "";
                        echo "<option value='$barberId|$barberName' $selected>$barberName</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Escolha uma data:</label>
                <input type="date" name="date" id="date" required class="form-control">
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Escolha um horário:</label>
                <select name="time" id="time" required class="form-select">
                    <option value="">Selecione um horário disponível</option>
                    <?php
                    if (!empty($selectedBarberId)) {
                        // Consulta para obter os horários disponíveis com base no barbeiro selecionado
                        $sql = "SELECT id, time_slot FROM time_slots WHERE barber_id = ?";
                        $stmt = $conexao->prepare($sql);
                        $stmt->bind_param("i", $selectedBarberId);
                        $stmt->execute();
                        $resultTimeSlots = $stmt->get_result();

                        while ($rowTimeSlot = $resultTimeSlots->fetch_assoc()) {
                            $timeSlotId = $rowTimeSlot['id'];
                            $timeSlot = $rowTimeSlot['time_slot'];
                            echo "<option value='$timeSlot'>$timeSlot</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <input type="hidden" name="selectedBarberId" value="<?php echo $barberName1; ?>">

            <div class="mb-3">
                <label for="fullname" class="form-label">Nome Completo:</label>
                <input type="text" id="fullname" name="fullname" class="form-control">
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contato whatsapp:</label>
                <input type="text" id="contact" name="contact" class="form-control">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>

            <input type="hidden" id="status" name="status" value="0">


            <div class="text-center">
                <a href="index.php" class="btn btn-primary custom-btn1">Voltar</a>
                <input type="submit" value="Agendar" class="btn btn-primary custom-btn">


            </div>

        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$conexao->close();
?>
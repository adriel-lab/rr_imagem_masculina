<?php
    // Incluindo o arquivo de conexão
    $include_path = __DIR__ . '/BD/conexao.php';
    include_once($include_path);

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    // Id do barbeiro para consulta
    $barber_id = 8;

    // Array com os nomes dos dias da semana e seus números correspondentes
    $dias_da_semana = array(
        'domingo' => 0,
        'segunda' => 1,
        'terca' => 2,
        'quarta' => 3,
        'quinta' => 4,
        'sexta' => 5,
        'sabado' => 6
    );

    // Array para armazenar os dias que estão vazios
    $dias_vazios = array();

    // Verificar se todos os campos em cada coluna dos dias da semana estão nulos
    foreach ($dias_da_semana as $dia => $numero) {
        $column = "time_slot_" . $dia;
        $sql = "SELECT COUNT(*) as total FROM time_slots WHERE barber_id = $barber_id AND $column IS NOT NULL";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['total'] == 0) {
                $dias_vazios[] = $numero;
            }
        }
    }

    // Imprimir os dias vazios
    echo json_encode($dias_vazios);

    $conexao->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flatpickr Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <input type="date" id="datepicker" placeholder="Selecione uma data">
   
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
    flatpickr('#datepicker', {
        dateFormat: 'Y-m-d',
        locale: 'pt',
        disable: [
            function(date) {
                // Array contendo os números dos dias da semana que você deseja desativar (0 para domingo, 1 para segunda-feira, ..., 6 para sábado)
                var disabledDays = <?php echo json_encode($dias_vazios); ?>; // Domingo e Segunda-feira

                // Verifica se o dia da semana da data fornecida está na lista de dias desativados
                return disabledDays.includes(date.getDay());
            }
        ]
    });
});

    </script>
</body>
</html>
<?php
// Define o intervalo de tempo em minutos
$intervalo = 30;

// Define o tempo total do combo em minutos
$tempo_total_combo = 60;

// Array para armazenar os horários
$horarios = array();

// Define o horário inicial
$horario_inicial = strtotime('08:00'); // Por exemplo, começando às 8:00

// Loop para gerar os horários de 30 em 30 minutos até o tempo total do combo
for ($i = 0; $i <= $tempo_total_combo; $i += $intervalo) {
    // Calcula o horário atual adicionando o intervalo ao horário inicial
    $horario_atual = $horario_inicial + ($i * 60); // Converte minutos em segundos

    // Adiciona o horário formatado ao array de horários
    $horarios[] = date('H:i', $horario_atual);
}

// Exibe os horários
foreach ($horarios as $horario) {
    echo $horario . "<br>";
}
?>



<?php

// include autoloader
require_once 'autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->setChroot(__DIR__);

$options = [
  'isRemoteEnabled' => true // Habilitar o carregamento de recursos remotos
];
// instantiate and use the dompdf class
$dompdf = new Dompdf($options);
// Habilitar o carregamento de recursos remotos


$start_of_year = $_POST['start_of_year'];
$end_of_year = $_POST['end_of_year'];
$yearly_total = $_POST['yearly_total'];
$count_pending_verified = $_POST['count_pending_verified'];
$count_completed = $_POST['count_completed'];
$percentage_pending_verified = $_POST['percentage_pending_verified'];
$percentage_completed = $_POST['percentage_completed'];
$daily_total_cuts = $_POST['daily_total_cuts'];
$weekly_total_cuts = $_POST['weekly_total_cuts'];
$monthly_total_cuts = $_POST['monthly_total_cuts'];
// Carregar o HTML no Dompdf
$html = "TEste funcionando";

echo $html;

$dompdf->loadHtml($html);

// (Opcional) Configurar o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Exibir o PDF gerado no navegador
$dompdf->stream();

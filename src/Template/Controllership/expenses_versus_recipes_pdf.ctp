<?php

class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        // Logo
        $image_file = K_PATH_IMAGES . 'logo.jpg';

        $this->Image($image_file, 15, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Set font
        $this->SetFont('times', 'B', 10);

        // Title
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {

        // Position at 15 mm from bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('times', 'B', 10);

        // Page number
        $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . ' de ' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

$months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

$month01 = 0;
$month02 = 0;
$month03 = 0;
$month04 = 0;
$month05 = 0;
$month06 = 0;
$month07 = 0;
$month08 = 0;
$month09 = 0;
$month10 = 0;
$month11 = 0;
$month12 = 0;
foreach ($revenueYearCurrent as $key => $value) {
    if ($value['MES'] == 'Janeiro') {
        $month01 += $value['VALOR'];
    } else if ($value['MES'] == 'Fevereiro') {
        $month02 += $value['VALOR'];
    } else if ($value['MES'] == 'Março') {
        $month03 += $value['VALOR'];
    } else if ($value['MES'] == 'Abril') {
        $month04 += $value['VALOR'];
    } else if ($value['MES'] == 'Maio') {
        $month05 += $value['VALOR'];
    } else if ($value['MES'] == 'Junho') {
        $month06 += $value['VALOR'];
    } else if ($value['MES'] == 'Julho') {
        $month07 += $value['VALOR'];
    } else if ($value['MES'] == 'Agosto') {
        $month08 += $value['VALOR'];
    } else if ($value['MES'] == 'Setembro') {
        $month09 += $value['VALOR'];
    } else if ($value['MES'] == 'Outubro') {
        $month10 += $value['VALOR'];
    } else if ($value['MES'] == 'Novembro') {
        $month11 += $value['VALOR'];
    } else if ($value['MES'] == 'Dezembro') {
        $month12 += $value['VALOR'];
    }
}
$allMonths = [$month01, $month02, $month03, $month04,
    $month05, $month06, $month07, $month08,
    $month09, $month10, $month11, $month12];

$month01One = 0;
$month02One = 0;
$month03One = 0;
$month04One = 0;
$month05One = 0;
$month06One = 0;
$month07One = 0;
$month08One = 0;
$month09One = 0;
$month10One = 0;
$month11One = 0;
$month12One = 0;

foreach ($expensesOne as $key => $value) {
    if ($value['MES'] == 1) {
        $month01One += $value['TOTAL'];
    } else if ($value['MES'] == 2) {
        $month02One += $value['TOTAL'];
    } else if ($value['MES'] == 3) {
        $month03One += $value['TOTAL'];
    } else if ($value['MES'] == 4) {
        $month04One += $value['TOTAL'];
    } else if ($value['MES'] == 5) {
        $month05One += $value['TOTAL'];
    } else if ($value['MES'] == 6) {
        $month06One += $value['TOTAL'];
    } else if ($value['MES'] == 7) {
        $month07One += $value['TOTAL'];
    } else if ($value['MES'] == 8) {
        $month08One += $value['TOTAL'];
    } else if ($value['MES'] == 9) {
        $month09One += $value['TOTAL'];
    } else if ($value['MES'] == 10) {
        $month10One += $value['TOTAL'];
    } else if ($value['MES'] == 11) {
        $month11One += $value['TOTAL'];
    } else if ($value['MES'] == 12) {
        $month12One += $value['TOTAL'];
    }
}

$allMonthsOne = [$month01One, $month02One, $month03One, $month04One,
    $month05One, $month06One, $month07One, $month08One,
    $month09One, $month10One, $month11One, $month12One];

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('Despesas vs Receita');
$pdf->SetSubject('Despesas vs Receita');
$pdf->SetKeywords('Despesas vs Receita');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(3, PDF_MARGIN_TOP, 3);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

if ($cc == '') {
    $cc = 'Todos';
}

$html = '';

$html .= '
<style> 

table {
    font-family: arial, sans-serif;
    width: 100%;
    border: 1px solid green;
    padding: 4px;
}

td, th {
    border: 1px solid green;
    padding: 4px;
}

</style>';

$html .= '<h2 align="center"> Despesas Vs Receita:</h2>';

$html .= '<p align="center"> Centro de custo: ' . $cc . '</p>';
$html .= '<p align="center"> Ano: ' . $year . '</p>';

$html .= '<table class="table" align="center">'
        . '<thead>'
        . '<tr>'
        . '<th style="width: 25%">Mês:</th>'
        . '<th style="width: 25%">Despesa:</th>'
        . '<th style="width: 25%">Receita:</th>'
        . '<th style="width: 25%">Diferença:</th>'
        . '</tr>'
        . '</thead>'
        . '<tbody>';

$totalExpenses = 0;
$totalRecipes = 0;
$diferenca = [];

for ($i = 0; $i < count($allMonthsOne); $i++) {
    $html .= '<tr>';
    $html .= '<td>' . $months[$i] . '</td>';
    $html .= '<td>' . number_format($allMonthsOne[$i], 2, ',', '.') . '</td>';
    $html .= '<td>' . number_format($allMonths[$i], 2, ',', '.') . '</td>';
    $html .= '<td>' . number_format($allMonths[$i] - $allMonthsOne[$i], 2, ',', '.') . '</td>';
    $html .= '</tr>';

    $diferenca[$i] = $allMonths[$i] - $allMonthsOne[$i];
    $totalExpenses += $allMonthsOne[$i];
    $totalRecipes += $allMonths[$i];
}

$html .= '<tr>';
$html .= '<td>Total Anual</td>';
$html .= '<td>' . number_format($totalExpenses, 2, ',', '.') . '</td>';
$html .= '<td>' . number_format($totalRecipes, 2, ',', '.') . '</td>';
$html .= '<td>' . number_format($totalRecipes - $totalExpenses, 2, ',', '.') . '</td>';
$html .= '</tr>';


$html .= '</tbody>'
        . '</table>';


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, '', true);

// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.


$pdf->Output('DespesasVsReceita_centro' . $cc . '_ano' . $year . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>  
<?php

$date = getdate();
$exist = false;
$totalyear = 0;

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

//receitas BRUTA
$cc01arryCCC[] = '01 - ADMINISTRATIVO';
$cc03arryCCC[] = '03 - LABORATORIO QUALITEX';
$cc06arryCCC[] = '06 - LABORATORIO PETROBRAS - SE';
$cc07arryCCC[] = '07 - LABORATORIO PETROBRAS - BA';
$cc08arryCCC[] = '08 - TRANSPETRO - PE';
$cc11arryCCC[] = '11 - APOIO OPERACIONAL UCS - AL';
$cc12arryCCC[] = '12 - APOIO OPERACIONAL UPVC - AL';
$cc13arryCCC[] = '13 - BRASKEM UCS - BA';
$cc14arryCCC[] = '14 - BRASKEM UPVC - BA';
$cc15arryCCC[] = '15 - PARADA UCS - AL';
$cc16arryCCC[] = '16 - PARADA UPVC - AL';
$cc18arryCCC[] = '18 - BRASKEM CASA DE CELULA';
$cc20arryCCC[] = '20 - PETROBRAS - RN';
$cc22arryCCC[] = '22 - CAMINHAO';
$cc23arryCCC[] = '23 - SECADOR - AL';
$cc28arryCCC[] = '28 - LABORATORIO RN';
$cc29arryCCC[] = '29 - ETE QUALITEX AL';
$cc32arryCCC[] = '32 - LANXES';
$semCCarryCCC[] = 'SEM CENTRO DE CUSTO';

for ($x = 0; $x < count($monthsNumbers); $x++) {
    $cc01CCC = 0;
    $cc03CCC = 0;
    $cc06CCC = 0;
    $cc07CCC = 0;
    $cc08CCC = 0;
    $cc11CCC = 0;
    $cc12CCC = 0;
    $cc13CCC = 0;
    $cc14CCC = 0;
    $cc15CCC = 0;
    $cc16CCC = 0;
    $cc18CCC = 0;
    $cc20CCC = 0;
    $cc22CCC = 0;
    $cc23CCC = 0;
    $cc28CCC = 0;
    $cc29CCC = 0;
    $cc32CCC = 0;
    $semCC_CCC = 0;
    for ($i = 0; $i < count($revenuesCountCredit); $i++) {
        if ($revenuesCountCredit[$i]['CT2_DATA'] == $monthsNumbers[$x]) {
            if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '01') {
                $cc01CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '03') {
                $cc03CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '06') {
                $cc06CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '07') {
                $cc07CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '08') {
                $cc08CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '11') {
                $cc11CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '12') {
                $cc12CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '13') {
                $cc13CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '14') {
                $cc14CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '15') {
                $cc15CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '16') {
                $cc16CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '18') {
                $cc18CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '20') {
                $cc20CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '22') {
                $cc22CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '23') {
                $cc23CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '28') {
                $cc28CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '29') {
                $cc29CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '32') {
                $cc32CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountCredit[$i]['CT2_CCC'], 0, 2) == '  ') {
                $semCC_CCC = $revenuesCountCredit[$i]['CT2_VALOR'];
            }
        }
    }
    $cc01arryCCC[] = $cc01CCC;
    $cc03arryCCC[] = $cc03CCC;
    $cc06arryCCC[] = $cc06CCC;
    $cc07arryCCC[] = $cc07CCC;
    $cc08arryCCC[] = $cc08CCC;
    $cc11arryCCC[] = $cc11CCC;
    $cc12arryCCC[] = $cc12CCC;
    $cc13arryCCC[] = $cc13CCC;
    $cc14arryCCC[] = $cc14CCC;
    $cc15arryCCC[] = $cc15CCC;
    $cc16arryCCC[] = $cc16CCC;
    $cc18arryCCC[] = $cc18CCC;
    $cc20arryCCC[] = $cc20CCC;
    $cc22arryCCC[] = $cc22CCC;
    $cc23arryCCC[] = $cc23CCC;
    $cc28arryCCC[] = $cc28CCC;
    $cc29arryCCC[] = $cc29CCC;
    $cc32arryCCC[] = $cc32CCC;
    $semCCarryCCC[] = $semCC_CCC;
}

//receita RETIDA
$cc01arryCCD[] = '01 - ADMINISTRATIVO';
$cc03arryCCD[] = '03 - LABORATORIO QUALITEX';
$cc06arryCCD[] = '06 - LABORATORIO PETROBRAS - SE';
$cc07arryCCD[] = '07 - LABORATORIO PETROBRAS - BA';
$cc08arryCCD[] = '08 - TRANSPETRO - PE';
$cc11arryCCD[] = '11 - APOIO OPERACIONAL UCS - AL';
$cc12arryCCD[] = '12 - APOIO OPERACIONAL UPVC - AL';
$cc13arryCCD[] = '13 - BRASKEM UCS - BA';
$cc14arryCCD[] = '14 - BRASKEM UPVC - BA';
$cc15arryCCD[] = '15 - PARADA UCS - AL';
$cc16arryCCD[] = '16 - PARADA UPVC - AL';
$cc18arryCCD[] = '18 - BRASKEM CASA DE CELULA';
$cc20arryCCD[] = '20 - PETROBRAS - RN';
$cc22arryCCD[] = '22 - CAMINHAO';
$cc23arryCCD[] = '23 - SECADOR - AL';
$cc28arryCCD[] = '28 - LABORATORIO RN';
$cc29arryCCD[] = '29 - ETE QUALITEX AL';
$cc32arryCCD[] = '32 - LANXES';
$semCCarryCCD[] = 'SEM CENTRO DE CUSTO';

for ($x = 0; $x < count($monthsNumbers); $x++) {
    $cc01CCD = 0;
    $cc03CCD = 0;
    $cc06CCD = 0;
    $cc07CCD = 0;
    $cc08CCD = 0;
    $cc11CCD = 0;
    $cc12CCD = 0;
    $cc13CCD = 0;
    $cc14CCD = 0;
    $cc15CCD = 0;
    $cc16CCD = 0;
    $cc18CCD = 0;
    $cc20CCD = 0;
    $cc22CCD = 0;
    $cc23CCD = 0;
    $cc28CCD = 0;
    $cc29CCD = 0;
    $cc32CCD = 0;
    $semCC_CCD = 0;
    for ($i = 0; $i < count($revenuesCountDebit); $i++) {
        if ($revenuesCountDebit[$i]['CT2_DATA'] == $monthsNumbers[$x]) {
            if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '01') {
                $cc01CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '03') {
                $cc03CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '06') {
                $cc06CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '07') {
                $cc07CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '08') {
                $cc08CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '11') {
                $cc11CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '12') {
                $cc12CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '13') {
                $cc13CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '14') {
                $cc14CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '15') {
                $cc15CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '16') {
                $cc16CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '18') {
                $cc18CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '20') {
                $cc20CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '22') {
                $cc22CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '23') {
                $cc23CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '28') {
                $cc28CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '29') {
                $cc29CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '32') {
                $cc32CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            } else if (substr($revenuesCountDebit[$i]['CT2_CCD'], 0, 2) == '  ') {
                $semCC_CCD = $revenuesCountDebit[$i]['CT2_VALOR'];
            }
        }
    }
    $cc01arryCCD[] = $cc01CCD;
    $cc03arryCCD[] = $cc03CCD;
    $cc06arryCCD[] = $cc06CCD;
    $cc07arryCCD[] = $cc07CCD;
    $cc08arryCCD[] = $cc08CCD;
    $cc11arryCCD[] = $cc11CCD;
    $cc12arryCCD[] = $cc12CCD;
    $cc13arryCCD[] = $cc13CCD;
    $cc14arryCCD[] = $cc14CCD;
    $cc15arryCCD[] = $cc15CCD;
    $cc16arryCCD[] = $cc16CCD;
    $cc18arryCCD[] = $cc18CCD;
    $cc20arryCCD[] = $cc20CCD;
    $cc22arryCCD[] = $cc22CCD;
    $cc23arryCCD[] = $cc23CCD;
    $cc28arryCCD[] = $cc28CCD;
    $cc29arryCCD[] = $cc29CCD;
    $cc32arryCCD[] = $cc32CCD;
    $semCCarryCCD[] = $semCC_CCD;
}

class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';

        $this->Image($image_file, 8, 8, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Set font
        $this->SetFont('times', 'B', 10);

        // Title
        //$this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {

        // Position at 15 mm from bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('times', 'B', 10);

        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);

//$this->SetFont('times', 'B', 8);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('Receitas mensais/cc');
$pdf->SetSubject('Receitas');
$pdf->SetKeywords('Receitas');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 8, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$html = '';

$html .= '
<style>

table {

    width: 100%;

}

td, th {

}

</style>';

// primeira pgina
$html .= '<h3 align="center">Receita bruta mensal por centro de custo: ano '.$year.'.</h3>';

$html .= '<table class="table" align="center">'
        . '<thead>'
            . '<tr>'
                . '<th>Centro de custo</th>';
                foreach ($monthsLabels as $key => $value):
                    $html .= '<th>' .$value.'</th>';
                endforeach;
                $html .=  '<th>Total</th>'
            . '</tr>'
        . '</thead>'
       . '<tbody>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc01arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc01arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc01arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc03arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc03arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc03arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc06arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc06arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc06arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc07arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc07arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc07arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc08arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc08arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc08arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc11arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc11arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc11arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc12arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc12arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc12arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc13arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc13arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc13arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc14arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc14arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc14arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc15arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc15arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc15arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc16arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc16arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc16arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc18arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc18arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc18arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc20arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc20arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc20arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc22arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc22arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc22arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc23arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc23arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc23arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc28arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc28arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc28arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc29arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc29arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc29arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc32arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc32arryCCC[$i],0,',','.') .'</td>';
                    $total += $cc32arryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            //LINHA PARA VALORES SEM CENTRO DE CUSTO
             . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>S/cc</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($semCCarryCCC[$i],0,',','.') .'</td>';
                    $total += $semCCarryCCC[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            .'<tr>';
                $total = 0;
                $html .= '<th>TOTAL</th>';
                    for ($i = 1; $i <= 12; $i++) {
                        $revenue = $cc01arryCCC[$i]+$cc03arryCCC[$i]+$cc06arryCCC[$i]+$cc07arryCCC[$i]+$cc08arryCCC[$i]+$cc11arryCCC[$i]+$cc12arryCCC[$i]+$cc13arryCCC[$i]+$cc14arryCCC[$i]+$cc15arryCCC[$i]+$cc16arryCCC[$i]+$cc18arryCCC[$i]+$cc20arryCCC[$i]+$cc22arryCCC[$i]+$cc23arryCCC[$i]+$cc28arryCCC[$i]+$cc32arryCCC[$i]+$semCCarryCCC[$i];

                        $html .= '<th class="active">'. number_format($revenue,0,',','.') .'</th>';
                    }
                    $html .= '<th>'.number_format($totalyear, 0, ',', '.').'</th>'
                 .'</tr>'

       . '</tbody>'
    . '</table>';

// segunda pgina
//$pdf->AddPage();

$totalyear = 0;

$html .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';

$html .= '<h3 align="center">Receita líquida mensal por centro de custo: ano '.$year.'.</h3>';

$html .= '<table class="table" align="center">'
        . '<thead>'
            . '<tr>'
                . '<th>Centro de custo</th>';
                foreach ($monthsLabels as $key => $value):
                    $html .= '<th>' .$value.'</th>';
                endforeach;
                $html .=  '<th>Total</th>'
            . '</tr>'
        . '</thead>'
       . '<tbody>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc01arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc01arryCCC[$i]-$cc01arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc01arryCCC[$i]-$cc01arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc03arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc03arryCCC[$i]-$cc03arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc03arryCCC[$i]-$cc03arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc06arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc06arryCCC[$i]-$cc06arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc06arryCCC[$i]-$cc06arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc07arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc07arryCCC[$i]-$cc07arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc07arryCCC[$i]-$cc07arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc08arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc08arryCCC[$i]-$cc08arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc08arryCCC[$i]-$cc08arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc11arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc11arryCCC[$i]-$cc11arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc11arryCCC[$i]-$cc11arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc12arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc12arryCCC[$i]-$cc12arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc12arryCCC[$i]-$cc12arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc13arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc13arryCCC[$i]-$cc13arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc13arryCCC[$i]-$cc13arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc14arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc14arryCCC[$i]-$cc14arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc14arryCCC[$i]-$cc14arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc15arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc15arryCCC[$i]-$cc15arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc15arryCCC[$i]-$cc15arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc16arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc16arryCCC[$i]-$cc16arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc16arryCCC[$i]-$cc16arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc18arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc18arryCCC[$i]-$cc18arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc18arryCCC[$i]-$cc18arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc20arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc20arryCCC[$i]-$cc20arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc20arryCCC[$i]-$cc20arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc22arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc22arryCCC[$i]-$cc22arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc22arryCCC[$i]-$cc22arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc23arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc23arryCCC[$i]-$cc23arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc23arryCCC[$i]-$cc23arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr>';
                $total = 0;
                $html .= '<th>'.substr($cc28arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc28arryCCC[$i]-$cc28arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc28arryCCC[$i]-$cc28arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>'.substr($cc32arryCCC[0],0,2).'</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($cc32arryCCC[$i]-$cc32arryCCD[$i],0,',','.') .'</td>';
                    $total += $cc32arryCCC[$i]-$cc32arryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            // LINHA PARA VALORES SEM CENTRO DE CUSTO
             . '<tr bgcolor="#F5F5F5">';
                $total = 0;
                $html .= '<th>S/cc</th>';
                 for ($i = 1; $i <= 12; $i++) {
                    $html .= '<td>'. number_format($semCCarryCCC[$i]-$semCCarryCCD[$i],0,',','.') .'</td>';
                    $total += $semCCarryCCC[$i]-$semCCarryCCD[$i]; }
                 $html .= '<th class="active">'.number_format($total,0,',','.').'</th>';
                 $totalyear += $total;
            $html .= '</tr>'

            .'<tr>';
                $total = 0;
                $html .= '<th>TOTAL</th>';
                    for ($i = 1; $i <= 12; $i++) {
                        $revenue = $cc01arryCCC[$i]+$cc03arryCCC[$i]+$cc06arryCCC[$i]+$cc07arryCCC[$i]+$cc08arryCCC[$i]+$cc11arryCCC[$i]+$cc12arryCCC[$i]+$cc13arryCCC[$i]+$cc14arryCCC[$i]+$cc15arryCCC[$i]+$cc16arryCCC[$i]+$cc18arryCCC[$i]+$cc20arryCCC[$i]+$cc22arryCCC[$i]+$cc23arryCCC[$i]+$cc28arryCCC[$i]+$cc32arryCCC[$i]+$semCCarryCCC[$i];

                        $retention = $cc01arryCCD[$i]+$cc03arryCCD[$i]+$cc06arryCCD[$i]+$cc07arryCCD[$i]+$cc08arryCCD[$i]+$cc11arryCCD[$i]+$cc12arryCCD[$i]+$cc13arryCCD[$i]+$cc14arryCCD[$i]+$cc15arryCCD[$i]+$cc16arryCCD[$i]+$cc18arryCCD[$i]+$cc20arryCCD[$i]+$cc22arryCCD[$i]+$cc23arryCCD[$i]+$cc28arryCCD[$i]+$cc32arryCCD[$i]+$semCCarryCCD[$i];

                        $html .= '<th class="active">' . number_format($revenue-$retention,0,',','.') . '</th>';
                    }
                    $html .= '<th>'.number_format($totalyear, 0, ',', '.').'</th>'
                 .'</tr>'

       . '</tbody>'
    . '</table>';




$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Receitas mensal/cc.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>

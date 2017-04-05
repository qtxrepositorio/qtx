<?php

$date = getdate();
$exist = false;
$totalyear = 0;

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$staff_cc01 = [''];
$staff_cc02 = [''];
$staff_cc03 = [''];
$staff_cc06 = [''];
$staff_cc07 = [''];
$staff_cc08 = [''];
$staff_cc11 = [''];
$staff_cc12 = [''];
$staff_cc13 = [''];
$staff_cc14 = [''];
$staff_cc15 = [''];
$staff_cc16 = [''];
$staff_cc18 = [''];
$staff_cc20 = [''];
$staff_cc22 = [''];
$staff_cc23 = [''];
$staff_cc28 = [''];
$staff_cc32 = [''];
for ($x = 0; $x < count($monthsNumbers); $x++) {
    $cc01 = 0;
    $cc02 = 0;
    $cc03 = 0;
    $cc06 = 0;
    $cc07 = 0;
    $cc08 = 0;
    $cc11 = 0;
    $cc12 = 0;
    $cc13 = 0;
    $cc14 = 0;
    $cc15 = 0; 
    $cc16 = 0; 
    $cc18 = 0;
    $cc20 = 0;
    $cc22 = 0;
    $cc23 = 0;
    $cc28 = 0; 
    $cc32 = 0; 
    foreach ($staffPerMonth as $key => $value) {
        if (substr($value['RD_DATARQ'],4,4) == $monthsNumbers[$x]) {
            if (substr($value['RD_CC'], 0, 2) == '01') {
                $cc01 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '03') {
                $cc03 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '06') {
                $cc06 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '07') {
                $cc07 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '08') {
                $cc08 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '11') {
                $cc11 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '12') {
                $cc12 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '13') {
                $cc13 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '14') {
                $cc14 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '15') {
                $cc15 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '16') {
                $cc16 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '18') {
                $cc18 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '20') {
                $cc20 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '22') {
                $cc22 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '23') {
                $cc23 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '28') {
                $cc28 = $value['CONT'];
            } else if (substr($value['RD_CC'], 0, 2) == '32') {
                $cc32 = $value['CONT'];
            }
        }
    }
    $staff_cc01[] = (int) $cc01;
    $staff_cc02[] = (int) $cc02; 
    $staff_cc03[] = (int) $cc03; 
    $staff_cc06[] = (int) $cc06; 
    $staff_cc07[] = (int) $cc07; 
    $staff_cc08[] = (int) $cc08; 
    $staff_cc11[] = (int) $cc11; 
    $staff_cc12[] = (int) $cc12; 
    $staff_cc13[] = (int) $cc13; 
    $staff_cc14[] = (int) $cc14; 
    $staff_cc15[] = (int) $cc15; 
    $staff_cc16[] = (int) $cc16; 
    $staff_cc18[] = (int) $cc18; 
    $staff_cc20[] = (int) $cc20; 
    $staff_cc22[] = (int) $cc22; 
    $staff_cc23[] = (int) $cc23; 
    $staff_cc28[] = (int) $cc28; 
    $staff_cc32[] = (int) $cc32; 
    
}

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
$pdf->SetTitle('Receitas per capita');
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
$html .= '<h3 align="center">Receita bruta per capita: ano '.$year.'.</h3>';

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
                        
          .'<tr>';
          
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
          $html .= '<th>'.substr($cc01arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            $totalCCRevenue += $cc01arryCCC[$i];
            $totalCCStaff += $staff_cc01[$i];
            if($cc01arryCCC[$i] != 0 and $staff_cc01[$i] !=0){
                $html .= number_format($cc01arryCCC[$i] / $staff_cc01[$i],0,',','.');
                $total += $cc01arryCCC[$i] / $staff_cc01[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                
            if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                
                $totalyear += $total;
         $html .= '</tr>' 
         
          . '<tr bgcolor="#F5F5F5">';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc03arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc03arryCCC[$i];
            $totalCCStaff += $staff_cc03[$i];
            
            if($cc03arryCCC[$i] != 0 and $staff_cc03[$i] !=0){
                $html .= number_format($cc03arryCCC[$i] / $staff_cc03[$i],0,',','.');
                $total += $cc03arryCCC[$i] / $staff_cc03[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                    $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
                else 
                    $html .='<th class="active">*</th>';
                
                $totalyear += $total;
         $html .= '</tr>'
         
         .'<tr>';
         
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc06arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc06arryCCC[$i];
            $totalCCStaff += $staff_cc06[$i];
            
            if($cc06arryCCC[$i] != 0 and $staff_cc06[$i] !=0){
                $html .= number_format($cc06arryCCC[$i] / $staff_cc06[$i],0,',','.');
                $total += $cc06arryCCC[$i] / $staff_cc06[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
               
          if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
               
                $totalyear += $total;
         $html .= '</tr>'
                
         . '<tr bgcolor="#F5F5F5">';
         
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
         
          $html .= '<th>'.substr($cc07arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc07arryCCC[$i];
            $totalCCStaff += $staff_cc07[$i];
            
            if($cc07arryCCC[$i] != 0 and $staff_cc07[$i] !=0){
                $html .= number_format($cc07arryCCC[$i] / $staff_cc07[$i],0,',','.');
                $total += $cc07arryCCC[$i] / $staff_cc07[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
         .'<tr>';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc08arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc08arryCCC[$i];
            $totalCCStaff += $staff_cc08[$i];
            
            if($cc08arryCCC[$i] != 0 and $staff_cc08[$i] !=0){
                $html .= number_format($cc08arryCCC[$i] / $staff_cc08[$i],0,',','.');
                $total += $cc08arryCCC[$i] / $staff_cc08[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
          
          . '<tr bgcolor="#F5F5F5">';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc11arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc11arryCCC[$i];
            $totalCCStaff += $staff_cc11[$i];
            
            if($cc11arryCCC[$i] != 0 and $staff_cc11[$i] !=0){
                $html .= number_format($cc11arryCCC[$i] / $staff_cc11[$i],0,',','.');
                $total += $cc11arryCCC[$i] / $staff_cc11[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
          .'<tr>';
         
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
         
          $html .= '<th>'.substr($cc12arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc12arryCCC[$i];
            $totalCCStaff += $staff_cc12[$i];
            
            if($cc12arryCCC[$i] != 0 and $staff_cc12[$i] !=0){
                $html .= number_format($cc12arryCCC[$i] / $staff_cc12[$i],0,',','.');
                $total += $cc12arryCCC[$i] / $staff_cc12[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
         . '<tr bgcolor="#F5F5F5">';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc13arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc13arryCCC[$i];
            $totalCCStaff += $staff_cc13[$i];
            
            if($cc13arryCCC[$i] != 0 and $staff_cc13[$i] !=0){
                $html .= number_format($cc13arryCCC[$i] / $staff_cc13[$i],0,',','.');
                $total += $cc13arryCCC[$i] / $staff_cc13[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
         .'<tr>';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc14arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc14arryCCC[$i];
            $totalCCStaff += $staff_cc14[$i];
            
            if($cc14arryCCC[$i] != 0 and $staff_cc14[$i] !=0){
                $html .= number_format($cc14arryCCC[$i] / $staff_cc14[$i],0,',','.');
                $total += $cc14arryCCC[$i] / $staff_cc14[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
                
           . '<tr bgcolor="#F5F5F5">';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
         
          $html .= '<th>'.substr($cc15arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc15arryCCC[$i];
            $totalCCStaff += $staff_cc15[$i];
            
            if($cc15arryCCC[$i] != 0 and $staff_cc15[$i] !=0){
                $html .= number_format($cc15arryCCC[$i] / $staff_cc15[$i],0,',','.');
                $total += $cc15arryCCC[$i] / $staff_cc15[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
         
         .'<tr>';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc16arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc16arryCCC[$i];
            $totalCCStaff += $staff_cc16[$i];
            
            if($cc16arryCCC[$i] != 0 and $staff_cc16[$i] !=0){
                $html .= number_format($cc16arryCCC[$i] / $staff_cc16[$i],0,',','.');
                $total += $cc16arryCCC[$i] / $staff_cc16[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
          . '<tr bgcolor="#F5F5F5">';
         
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
                   
          $html .= '<th>'.substr($cc18arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc18arryCCC[$i];
            $totalCCStaff += $staff_cc18[$i];
            
            if($cc18arryCCC[$i] != 0 and $staff_cc18[$i] !=0){
                $html .= number_format($cc18arryCCC[$i] / $staff_cc18[$i],0,',','.');
                $total += $cc18arryCCC[$i] / $staff_cc18[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
                
                  .'<tr>';
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
         
          $html .= '<th>'.substr($cc20arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc20arryCCC[$i];
            $totalCCStaff += $staff_cc20[$i];
            
            if($cc20arryCCC[$i] != 0 and $staff_cc20[$i] !=0){
                $html .= number_format($cc20arryCCC[$i] / $staff_cc20[$i],0,',','.');
                $total += $cc20arryCCC[$i] / $staff_cc20[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
          . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
          $html .= '<th>'.substr($cc22arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc22arryCCC[$i];
            $totalCCStaff += $staff_cc22[$i];
            
            if($cc22arryCCC[$i] != 0 and $staff_cc22[$i] !=0){
                $html .= number_format($cc22arryCCC[$i] / $staff_cc22[$i],0,',','.');
                $total += $cc22arryCCC[$i] / $staff_cc22[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
                 .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
          $html .= '<th>'.substr($cc23arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc23arryCCC[$i];
            $totalCCStaff += $staff_cc23[$i];
            
            if($cc23arryCCC[$i] != 0 and $staff_cc23[$i] !=0){
                $html .= number_format($cc23arryCCC[$i] / $staff_cc23[$i],0,',','.');
                $total += $cc23arryCCC[$i] / $staff_cc23[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
          . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
          $html .= '<th>'.substr($cc28arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc28arryCCC[$i];
            $totalCCStaff += $staff_cc28[$i];
            
            if($cc28arryCCC[$i] != 0 and $staff_cc28[$i] !=0){
                $html .= number_format($cc28arryCCC[$i] / $staff_cc28[$i],0,',','.');
                $total += $cc28arryCCC[$i] / $staff_cc28[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'
                
                  .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
          $html .= '<th>'.substr($cc32arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc32arryCCC[$i];
            $totalCCStaff += $staff_cc32[$i];
            
            if($cc32arryCCC[$i] != 0 and $staff_cc32[$i] !=0){
                $html .= number_format($cc32arryCCC[$i] / $staff_cc32[$i],0,',','.');
                $total += $cc32arryCCC[$i] / $staff_cc32[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format($totalCCRevenue/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
            
                $totalyear += $total;
         $html .= '</tr>'
                
         . '<tr bgcolor="#F5F5F5">';                                     
          
         $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          
            $totalRevenue = 0;
            $totalStaff = 0;
            $html .= '<th class="active">TOTAL</th>';                                   
                for ($i = 1; $i <= 12; $i++) {                                      
                    $html .= '<th class="active">';
                        
                    $revenue = 0;
                    $staff = 0;
                                                    
                    $revenue += $cc01arryCCC[$i];
                    $staff += $staff_cc01[$i];
                                                    
                    $revenue += $cc03arryCCC[$i];
                    $staff += $staff_cc03[$i];
                                                    
                    $revenue += $cc06arryCCC[$i];
                    $staff += $staff_cc06[$i];
                                                    
                    $revenue += $cc07arryCCC[$i];
                    $staff += $staff_cc07[$i];
                                                    
                    $revenue += $cc08arryCCC[$i];
                    $staff += $staff_cc08[$i];
                                                    
                    $revenue += $cc11arryCCC[$i];
                    $staff += $staff_cc11[$i];
                                                    
                    $revenue += $cc12arryCCC[$i];
                    $staff += $staff_cc12[$i];
                                                    
                    $revenue += $cc13arryCCC[$i];
                    $staff += $staff_cc13[$i];
                                                    
                    $revenue += $cc14arryCCC[$i];
                    $staff += $staff_cc14[$i];
                                                    
                    $revenue += $cc15arryCCC[$i];
                    $staff += $staff_cc15[$i];
                                                    
                    $revenue += $cc16arryCCC[$i];
                    $staff += $staff_cc16[$i];
                                                    
                    $revenue += $cc18arryCCC[$i];
                    $staff += $staff_cc18[$i];
                                                        
                    $revenue += $cc20arryCCC[$i];
                    $staff += $staff_cc20[$i];
                    
                    $revenue += $cc22arryCCC[$i];
                    $staff += $staff_cc22[$i];
                                                    
                    $revenue += $cc23arryCCC[$i];
                    $staff += $staff_cc23[$i];
                                                    
                    $revenue += $cc28arryCCC[$i];
                    $staff += $staff_cc28[$i];
                                                    
                    $revenue += $cc32arryCCC[$i];
                    $staff += $staff_cc32[$i];
                                                     
                    $totalRevenue += $revenue;
                    $totalStaff += $staff;                                                      
                        
                        //debug($revenue);
                        //debug($staff);
                                                    
                        if($revenue > 0 and $staff > 0)
                             $html .= number_format($revenue/$staff,0,',','.'); 
                        else
                            $html .= '*';
                        
                   $html .= '</th>';                                        
                  } 
                  
                  if($totalRevenue > 0 and $totalStaff > 0)
                    $html .='<th class="success">'.number_format($totalRevenue/$totalStaff, 0, ',', '.').'</th>';
                  else
                      $html .='<th class="success">*</th>'
                      
                   .'</tr>'
       . '</tbody>'
    . '</table>';

// segunda pgina
//$pdf->AddPage();

$totalyear = 0;
                    
$html .= '<h3 align="center">Receita líquida per capita: ano '.$year.'.</h3>';

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
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc01arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc01arryCCC[$i];
            $totalCCRetentions += $cc01arryCCD[$i];
            $totalCCStaff += $staff_cc01[$i];
            
            if($cc01arryCCC[$i] != 0 and $staff_cc01[$i] !=0){
                $html .= number_format(($cc01arryCCC[$i]-$cc01arryCCD[$i]) / $staff_cc01[$i],0,',','.');
                $total += ($cc01arryCCC[$i]-$cc01arryCCD[$i]) / $staff_cc01[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc03arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc03arryCCC[$i];
            $totalCCRetentions += $cc03arryCCD[$i];
            $totalCCStaff += $staff_cc03[$i];
            
            if($cc03arryCCC[$i] != 0 and $staff_cc03[$i] !=0){
                $html .= number_format(($cc03arryCCC[$i]-$cc03arryCCD[$i]) / $staff_cc03[$i],0,',','.');
                $total += ($cc03arryCCC[$i]-$cc03arryCCD[$i]) / $staff_cc03[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                       
          . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc06arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc06arryCCC[$i];
            $totalCCRetentions += $cc06arryCCD[$i];
            $totalCCStaff += $staff_cc06[$i];
            
            if($cc06arryCCC[$i] != 0 and $staff_cc06[$i] !=0){
                $html .= number_format(($cc06arryCCC[$i]-$cc06arryCCD[$i]) / $staff_cc06[$i],0,',','.');
                $total += ($cc06arryCCC[$i]-$cc06arryCCD[$i]) / $staff_cc06[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
          .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc07arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc07arryCCC[$i];
            $totalCCRetentions += $cc07arryCCD[$i];
            $totalCCStaff += $staff_cc07[$i];
            
            if($cc07arryCCC[$i] != 0 and $staff_cc07[$i] !=0){
                $html .= number_format(($cc07arryCCC[$i]-$cc07arryCCD[$i]) / $staff_cc07[$i],0,',','.');
                $total += ($cc07arryCCC[$i]-$cc07arryCCD[$i]) / $staff_cc07[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>'       
         
          . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc08arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc08arryCCC[$i];
            $totalCCRetentions += $cc08arryCCD[$i];
            $totalCCStaff += $staff_cc08[$i];
            
            if($cc08arryCCC[$i] != 0 and $staff_cc08[$i] !=0){
                $html .= number_format(($cc08arryCCC[$i]-$cc08arryCCD[$i]) / $staff_cc08[$i],0,',','.');
                $total += ($cc08arryCCC[$i]-$cc08arryCCD[$i]) / $staff_cc08[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
           
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc11arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc11arryCCC[$i];
            $totalCCRetentions += $cc11arryCCD[$i];
            $totalCCStaff += $staff_cc11[$i];
            
            if($cc11arryCCC[$i] != 0 and $staff_cc11[$i] !=0){
                $html .= number_format(($cc11arryCCC[$i]-$cc11arryCCD[$i]) / $staff_cc11[$i],0,',','.');
                $total += ($cc11arryCCC[$i]-$cc11arryCCD[$i]) / $staff_cc11[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc12arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc12arryCCC[$i];
            $totalCCRetentions += $cc12arryCCD[$i];
            $totalCCStaff += $staff_cc12[$i];
            
            if($cc12arryCCC[$i] != 0 and $staff_cc12[$i] !=0){
                $html .= number_format(($cc12arryCCC[$i]-$cc12arryCCD[$i]) / $staff_cc12[$i],0,',','.');
                $total += ($cc12arryCCC[$i]-$cc12arryCCD[$i]) / $staff_cc12[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
         
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc13arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc13arryCCC[$i];
            $totalCCRetentions += $cc13arryCCD[$i];
            $totalCCStaff += $staff_cc13[$i];
            
            if($cc13arryCCC[$i] != 0 and $staff_cc13[$i] !=0){
                $html .= number_format(($cc13arryCCC[$i]-$cc13arryCCD[$i]) / $staff_cc13[$i],0,',','.');
                $total += ($cc13arryCCC[$i]-$cc13arryCCD[$i]) / $staff_cc13[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc14arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc14arryCCC[$i];
            $totalCCRetentions += $cc14arryCCD[$i];
            $totalCCStaff += $staff_cc14[$i];
            
            if($cc14arryCCC[$i] != 0 and $staff_cc14[$i] !=0){
                $html .= number_format(($cc14arryCCC[$i]-$cc14arryCCD[$i]) / $staff_cc14[$i],0,',','.');
                $total += ($cc14arryCCC[$i]-$cc14arryCCD[$i]) / $staff_cc14[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc15arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc15arryCCC[$i];
            $totalCCRetentions += $cc15arryCCD[$i];
            $totalCCStaff += $staff_cc15[$i];
            
            if($cc15arryCCC[$i] != 0 and $staff_cc15[$i] !=0){
                $html .= number_format(($cc15arryCCC[$i]-$cc15arryCCD[$i]) / $staff_cc15[$i],0,',','.');
                $total += ($cc15arryCCC[$i]-$cc15arryCCD[$i]) / $staff_cc15[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc16arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc16arryCCC[$i];
            $totalCCRetentions += $cc16arryCCD[$i];
            $totalCCStaff += $staff_cc16[$i];
            
            if($cc16arryCCC[$i] != 0 and $staff_cc16[$i] !=0){
                $html .= number_format(($cc16arryCCC[$i]-$cc16arryCCD[$i]) / $staff_cc16[$i],0,',','.');
                $total += ($cc16arryCCC[$i]-$cc16arryCCD[$i]) / $staff_cc16[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc18arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc18arryCCC[$i];
            $totalCCRetentions += $cc18arryCCD[$i];
            $totalCCStaff += $staff_cc18[$i];
            
            if($cc18arryCCC[$i] != 0 and $staff_cc18[$i] !=0){
                $html .= number_format(($cc18arryCCC[$i]-$cc18arryCCD[$i]) / $staff_cc18[$i],0,',','.');
                $total += ($cc18arryCCC[$i]-$cc18arryCCD[$i]) / $staff_cc18[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
         
         . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc20arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc20arryCCC[$i];
            $totalCCRetentions += $cc20arryCCD[$i];
            $totalCCStaff += $staff_cc20[$i];
            
            if($cc20arryCCC[$i] != 0 and $staff_cc20[$i] !=0){
                $html .= number_format(($cc20arryCCC[$i]-$cc20arryCCD[$i]) / $staff_cc20[$i],0,',','.');
                $total += ($cc20arryCCC[$i]-$cc20arryCCD[$i]) / $staff_cc20[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc22arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc22arryCCC[$i];
            $totalCCRetentions += $cc22arryCCD[$i];
            $totalCCStaff += $staff_cc22[$i];
            
            if($cc22arryCCC[$i] != 0 and $staff_cc22[$i] !=0){
                $html .= number_format(($cc22arryCCC[$i]-$cc22arryCCD[$i]) / $staff_cc22[$i],0,',','.');
                $total += ($cc22arryCCC[$i]-$cc22arryCCD[$i]) / $staff_cc22[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc23arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc23arryCCC[$i];
            $totalCCRetentions += $cc23arryCCD[$i];
            $totalCCStaff += $staff_cc23[$i];
            
            if($cc23arryCCC[$i] != 0 and $staff_cc23[$i] !=0){
                $html .= number_format(($cc23arryCCC[$i]-$cc23arryCCD[$i]) / $staff_cc23[$i],0,',','.');
                $total += ($cc23arryCCC[$i]-$cc23arryCCD[$i]) / $staff_cc23[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         .'<tr>';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc28arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc28arryCCC[$i];
            $totalCCRetentions += $cc28arryCCD[$i];
            $totalCCStaff += $staff_cc28[$i];
            
            if($cc28arryCCC[$i] != 0 and $staff_cc28[$i] !=0){
                $html .= number_format(($cc28arryCCC[$i]-$cc28arryCCD[$i]) / $staff_cc28[$i],0,',','.');
                $total += ($cc28arryCCC[$i]-$cc28arryCCD[$i]) / $staff_cc28[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
                
         . '<tr bgcolor="#F5F5F5">';
          $total = 0;
          $totalCCRevenue = 0;
          $totalCCStaff =0;
          $totalCCRetentions = 0;
          
          $html .= '<th>'.substr($cc32arryCCC[0],0,2).'</th>';
          for ($i = 1; $i <= 12; $i++) { 
            $html .= '<td>';
            
            $totalCCRevenue += $cc32arryCCC[$i];
            $totalCCRetentions += $cc32arryCCD[$i];
            $totalCCStaff += $staff_cc32[$i];
            
            if($cc32arryCCC[$i] != 0 and $staff_cc32[$i] !=0){
                $html .= number_format(($cc32arryCCC[$i]-$cc32arryCCD[$i]) / $staff_cc32[$i],0,',','.');
                $total += ($cc32arryCCC[$i]-$cc32arryCCD[$i]) / $staff_cc32[$i];
            }else{
                $html .= '*';
                $total += 0;
            }
            $html .= '</td>';   
          } //chave do for
                                            
                if($totalCCRevenue > 0 and $totalCCStaff > 0)
                $html .='<th class="active">'.number_format(($totalCCRevenue-$totalCCRetentions)/$totalCCStaff,0,',','.').'</th>';
            else 
                $html .='<th class="active">*</th>';
                $totalyear += $total;
         $html .= '</tr>' 
         
         .'<tr>';    
         
            $total = 0;
            $totalRevenue = 0;
            $totalStaff = 0;
            $totalRetentions = 0;
            
            $html .= '<th class="active">TOTAL</th>';                                   
                for ($i = 1; $i <= 12; $i++) {                                      
                    $html .= '<th class="active">';
                        
                    
                    $revenue = 0;
                    $retention = 0;
                    $staff = 0;
                                                    
                    $retention += $cc01arryCCD[$i];
                    $revenue += $cc01arryCCC[$i];
                    $staff += $staff_cc01[$i];
                                                    
                    $retention += $cc03arryCCD[$i];
                    $revenue += $cc03arryCCC[$i];
                    $staff += $staff_cc03[$i];
                                                    
                    $retention += $cc06arryCCD[$i];
                    $revenue += $cc06arryCCC[$i];
                    $staff += $staff_cc06[$i];
                                                    
                    $retention += $cc07arryCCD[$i];
                    $revenue += $cc07arryCCC[$i];
                    $staff += $staff_cc07[$i];
                                                    
                    $retention += $cc08arryCCD[$i];
                    $revenue += $cc08arryCCC[$i];
                    $staff += $staff_cc08[$i];
                                                    
                    $retention += $cc11arryCCD[$i];
                    $revenue += $cc11arryCCC[$i];
                    $staff += $staff_cc11[$i];
                                                    
                    $retention += $cc12arryCCD[$i];
                    $revenue += $cc12arryCCC[$i];
                    $staff += $staff_cc12[$i];
                                                    
                    $retention += $cc13arryCCD[$i];
                    $revenue += $cc13arryCCC[$i];
                    $staff += $staff_cc13[$i];
                                                    
                    $retention += $cc14arryCCD[$i];
                    $revenue += $cc14arryCCC[$i];
                    $staff += $staff_cc14[$i];
                                                    
                    $retention += $cc15arryCCD[$i];
                    $revenue += $cc15arryCCC[$i];
                    $staff += $staff_cc15[$i];
                                                    
                    $retention += $cc16arryCCD[$i];
                    $revenue += $cc16arryCCC[$i];
                    $staff += $staff_cc16[$i];
                                                    
                    $retention += $cc18arryCCD[$i];
                    $revenue += $cc18arryCCC[$i];
                    $staff += $staff_cc18[$i];
                                                        
                    $retention += $cc20arryCCD[$i];
                    $revenue += $cc20arryCCC[$i];
                    $staff += $staff_cc20[$i];
                                                    
                    $retention += $cc22arryCCD[$i];
                    $revenue += $cc22arryCCC[$i];
                    $staff += $staff_cc22[$i];
                                                    
                    $retention += $cc23arryCCD[$i];
                    $revenue += $cc23arryCCC[$i];
                    $staff += $staff_cc23[$i];
                                                    
                    $retention += $cc28arryCCD[$i];
                    $revenue += $cc28arryCCC[$i];
                    $staff += $staff_cc28[$i];
                                                    
                    $retention += $cc32arryCCD[$i];
                    $revenue += $cc32arryCCC[$i];
                    $staff += $staff_cc32[$i];
                                                        
                    $totalRevenue += $revenue;
                    $totalStaff += $staff;
                    $totalRetentions += $retention;
                        
                        //debug($revenue);
                        //debug($staff);
                                                    
                        if($revenue > 0 and $staff > 0)
                             $html .= number_format(($revenue-$retention)/$staff,0,',','.'); 
                        else
                            $html .= '*';
                        
                   $html .= '</th>';                                        
                  }
                  
                  if($totalRevenue > 0 and $totalStaff > 0)
                    $html .='<th class="success">'.number_format($totalRevenue/$totalStaff, 0, ',', '.').'</th>';
                  else
                      $html .='<th class="success">*</th>'
                  
                  .'</tr>'
                
       . '</tbody>'
    . '</table>';




$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Receitas per capita.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>  
<?php

$x = ['TODOS','01 - ADMINISTRATIVO', '03 - LABORATORIO QUALITEX', '06 - LABORATORIO PETROBRAS - SE',
                '07 - LABORATORIO PETROBRAS - BA', '08 - TRANSPETRO - PE', '11 - APOIO OPERACIONAL UCS - AL',
                '12 - APOIO OPERACIONAL UPVC - AL', '13 - BRASKEM UCS - BA', '14 - BRASKEM UPVC - BA',
                '15 - PARADA UCS - AL', '16 - PARADA UPVC - AL','18 - BRASKEM CASA DE CELULA',
                '20 - PETROBRAS - RN', '22 - CAMINHAO', '23 - SECADOR - AL', '28 - LABORATORIO RN',
                '32 - LANXES'];

$costCenters = [];
for($i = 0; $i < sizeof($x); $i++){
    $costCenters[$x[$i]] = $x[$i];
}

$naturezas = ['Manuntenções','Multas de trânsito','Pseus (novos e renovados)'
                ,'Combustíveis e lubrificantes','Alugueis','Frete, pedágios e correios'
                ,'Materiais', 'Despesas diversas'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$totalAnual = 0;

$maintenanceMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($maintenance as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $maintenanceMonths[] = $valor;
endforeach;
$maintenanceMonths[] = $valorTotal;        

$finesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($fines as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $finesMonths[] = $valor;
endforeach;
$finesMonths[] = $valorTotal;

$tiresMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($tires as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $tiresMonths[] = $valor;
    endforeach;
$tiresMonths[] = $valorTotal;

$fuelAndLubricantsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($fuelAndLubricants as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $fuelAndLubricantsMonths[] = $valor;
endforeach;
$fuelAndLubricantsMonths[] = $valorTotal;

$rentsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($rents as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $rentsMonths[] = $valor;
endforeach;
$rentsMonths[] = $valorTotal;

$freightMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($freight as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $freightMonths[] = $valor;
endforeach;
$freightMonths[] = $valorTotal;

$materialsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($materials as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $materialsMonths[] = $valor;
endforeach;
$materialsMonths[] = $valorTotal;

$variousMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($various as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $variousMonths[] = $valor;
endforeach;
$variousMonths[] = $valorTotal;
    
?>
<?php 

class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';

        $this->Image($image_file, 5, 5, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
       
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
$pdf = new MYPDF('l', PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);

//$this->SetFont('times', 'B', 8);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('Despesas com operacional');
$pdf->SetSubject('Despesas');
$pdf->SetKeywords('Despesas');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(3, 3, 3);
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

$html .='<h3 align="center">Tabela de despesas operacionais:</h3>';

$html .='<p align="center">Centro de custo: '.$ccpdf.'</p>';

$html .= '<table class="table" align="center">'
        . '<thead>'
            . '<tr>'
                . '<th>Naturezas</th>';
                foreach ($monthsLabels as $key => $value): 
                    $html .= '<th>' .$value.'</th>';
                endforeach; 
                $html .=  '<th>Total</th>'
            . '</tr>'
        . '</thead>'
        . '<tbody>'
                        
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[0].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($maintenanceMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($maintenanceMonths[12],0,',','.').'</th>'
            .'</tr>' 
            .'<tr>'
                .'<th>'.$naturezas[1].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($finesMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($finesMonths[12],0,',','.').'</th>'
            .'</tr>'                 
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[2].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($tiresMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($tiresMonths[12],0,',','.').'</th>'
            .'</tr>'
            
            .'<tr>'
                .'<th>'.$naturezas[3].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($fuelAndLubricantsMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($fuelAndLubricantsMonths[12],0,',','.').'</th>'
            .'</tr>'          
            
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[4].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($rentsMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($rentsMonths[12],0,',','.').'</th>'
            .'</tr>'
            
            .'<tr>'
                .'<th>'.$naturezas[5].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($freightMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($freightMonths[12],0,',','.').'</th>'
            .'</tr>'  
          
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[6].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($materialsMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($materialsMonths[12],0,',','.').'</th>'
            .'</tr>'            
                        
            .'<tr>'
                .'<th>'.$naturezas[7].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($variousMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($variousMonths[12],0,',','.').'</th>'
            .'</tr>'            
                        
            .'<tr bgcolor="#F5F5F5">'
                .'<th>Total</th>';
                for ($i = 0; $i <= 11; $i++){  
                    $html .= '<td>'.number_format($maintenanceMonths[$i] + $finesMonths[$i] + $tiresMonths[$i] +
                                                                    $fuelAndLubricantsMonths[$i] + $rentsMonths[$i] + $freightMonths[$i] +
                                                                        $materialsMonths[$i] + $variousMonths[$i],0,',','.') .'</td>';
                }
                
                $html .= '<th>'. number_format($maintenanceMonths[12] + $finesMonths[12] + $tiresMonths[12] +
                                                                    $fuelAndLubricantsMonths[12] + $rentsMonths[12] + $freightMonths[12] +
                                                                        $materialsMonths[12] + $variousMonths[12],0,',','.') .'</th>';                                
                $html .= '</tr>'                
                        
        . '</tbody>'    
       . '</table>';




$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Despesas com operacional.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>  
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

$naturezas = ['Proventos', 'Pro-Labore', 'Hora Extra', 'Bolsa Estágio', 'Prêmios e Gratificações'
            , 'Encargos Sociais', 'Alimentação', 'Transporte de pessoal', 'Assistência Médica', 'Materiais de Segurança'
            , 'Cursos e Treinamentos', 'Outros Custos'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];


if($ccpdf == 'TODOS'){
    
    $staff_year = [];
    $staff_year_total = 0;
    for ($x = 0; $x < count($monthsNumbers); $x++) {
        $quant = 0;
        foreach ($staffPerMonth as $key => $value) {
            if (substr($value['RD_DATARQ'],4,4) == $monthsNumbers[$x]) {
                $quant += $value['CONT'];
                $staff_year_total += $value['CONT'];
            }
        } 
        $staff_year[] = $quant;
    }
    $staff_year[] = $staff_year_total;
}else{
    
    $staff_year = [];
    $staff_year_total = 0;
    for ($x = 0; $x < count($monthsNumbers); $x++) {
        $quant = 0;
        foreach ($staffPerMonth as $key => $value) {
            if (substr($value['RD_DATARQ'],4,4) == $monthsNumbers[$x] && substr($ccpdf,0,2) == $value['RD_CC']) {
                $quant += $value['CONT'];
                $staff_year_total += $value['CONT'];
            }
        } 
        $staff_year[] = $quant;
    }
    $staff_year[] = $staff_year_total;
}

$totalAnual = 0;


    //proventos
    $earningsMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($earnings as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];  
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $earningsMonths[] = $valor;
    endforeach;
    $earningsMonths[] = $valorTotal;

    //prolabore
    $prolaboreMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($prolabore as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR']; 
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $prolaboreMonths[] = $valor;
    endforeach;
    $prolaboreMonths[] = $valorTotal;

    //hora extra
    $extraHoursMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($extraHour as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $extraHoursMonths[] = $valor;
    endforeach;
    $extraHoursMonths[] = $valorTotal;

    //bolsas de estagios
    $internshipBagMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($internshipBag as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $internshipBagMonths[] = $valor;
    endforeach;
    $internshipBagMonths[] = $valorTotal;

    //premios e gratificações
    $prizesAndGratuitiesMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($prizesAndGratuities as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $prizesAndGratuitiesMonths[] = $valor;
    endforeach;
    $prizesAndGratuitiesMonths[] = $valorTotal;   

    //encargos sociais
    $socialChargesMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($socialCharges as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $socialChargesMonths[] = $valor;
    endforeach;
    $socialChargesMonths[] = $valorTotal; 

    //alimentação
    $feedingMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($feeding as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $feedingMonths[] = $valor;
    endforeach;
    $feedingMonths[] = $valorTotal; 

    //transporte
    $transportMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($transport as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $transportMonths[] = $valor;
    endforeach;
    $transportMonths[] = $valorTotal; 

    //assistencia medica 
    $medicalMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($medical as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $medicalMonths[] = $valor;
    endforeach;
    $medicalMonths[] = $valorTotal; 

    //materis de segurança
    $safetyEquipmentMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($safetyEquipment as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $safetyEquipmentMonths[] = $valor;
    endforeach;
    $safetyEquipmentMonths[] = $valorTotal; 

    //cursos e treinamentos 
    $coursesAndTrainingMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($coursesAndTraining as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $coursesAndTrainingMonths[] = $valor;
    endforeach;
    $coursesAndTrainingMonths[] = $valorTotal; 


    //outras despesas
    $outehsMonths = [];
    $valorTotal = 0;
    foreach($monthsNumbers as $key):
        $valor = 0;
        foreach($outehs as $x => $value):
            if ($key == $value['CT2_DATA'])
                $valor += $value['CT2_VALOR'];
                $totalAnual += $valor;
        endforeach;
        $valorTotal += $valor;
        $outehsMonths[] = $valor;
    endforeach;
    $outehsMonths[] = $valorTotal;
    


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
$pdf->SetTitle('Despesas com pessoal');
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

$html .='<h3 align="center">Tabela de despesas com pessoal:</h3>';

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
                    $html .= '<td>' .number_format($earningsMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($earningsMonths[12],0,',','.').'</th>'
            .'</tr>'
                        
            .'<tr>'
                .'<th>'.$naturezas[1].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($prolaboreMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($prolaboreMonths[12],0,',','.').'</th>'
            .'</tr>'
        
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[2].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($extraHoursMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($extraHoursMonths[12],0,',','.').'</th>'
            .'</tr>'
                        
            .'<tr>'
                .'<th>'.$naturezas[3].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($internshipBagMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($internshipBagMonths[12],0,',','.').'</th>'
            .'</tr>'                
            
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[4].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($prizesAndGratuitiesMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($prizesAndGratuitiesMonths[12],0,',','.').'</th>'
            .'</tr>'
                        
            .'<tr>'
                .'<th>'.$naturezas[5].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($socialChargesMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($socialChargesMonths[12],0,',','.').'</th>'
            .'</tr>'
            
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[6].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($feedingMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($feedingMonths[12],0,',','.').'</th>'
            .'</tr>'                  
        
            .'<tr>'
                .'<th>'.$naturezas[7].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($transportMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($transportMonths[12],0,',','.').'</th>'
            .'</tr>'              
                        
            . '<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[8].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($medicalMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($medicalMonths[12],0,',','.').'</th>'
            .'</tr>'            
                        
            .'<tr>'
                .'<th>'.$naturezas[9].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($safetyEquipmentMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($safetyEquipmentMonths[12],0,',','.').'</th>'
            .'</tr>'           
            
            .'<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[10].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($coursesAndTrainingMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($coursesAndTrainingMonths[12],0,',','.').'</th>'
            .'</tr>'               
         
            .'<tr>'
                .'<th>'.$naturezas[11].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    $html .= '<td>' .number_format($outehsMonths[$i],0,',','.'). '</td>';
                }
                $html .= '<th>'.number_format($outehsMonths[12],0,',','.').'</th>'
            .'</tr>'
                        
            .'<tr bgcolor="#F5F5F5">'
                .'<th>Total</th>';
                for ($i = 0; $i <= 11; $i++){  
                    $html .= '<td>'.number_format($earningsMonths[$i] + $prolaboreMonths[$i] + $extraHoursMonths[$i] +
                                                                    $internshipBagMonths[$i] + $prizesAndGratuitiesMonths[$i] + $socialChargesMonths[$i] +
                                                                        $feedingMonths[$i] + $transportMonths[$i] + $medicalMonths[$i] + $safetyEquipmentMonths[$i] + 
                                                                            $coursesAndTrainingMonths[$i] + $outehsMonths[$i],0,',','.') .'</td>';
                }
                
                $html .= '<th>'. number_format($earningsMonths[12] + $prolaboreMonths[12] + $extraHoursMonths[12] + $internshipBagMonths[12] +
                                                                $prizesAndGratuitiesMonths[12] + $socialChargesMonths[12] + $feedingMonths[12] + 
                                                                    $transportMonths[12] + $medicalMonths[12] + $safetyEquipmentMonths[12] + 
                                                                        $coursesAndTrainingMonths[12] + $outehsMonths[12],0,',','.') .'</th>';                                
                $html .= '</tr>'            
            . '</tbody>'    
       . '</table>';

/*
$html .='<h3 align="center">Tabela de despesas com pessoal Per Capito:</h3>';

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
                    if($earningsMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($earningsMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($earningsMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($earningsMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html .='<tr bgcolor="">'
                .'<th>'.$naturezas[1].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($prolaboreMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($prolaboreMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($prolaboreMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($prolaboreMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html.='<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[2].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($extraHoursMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($extraHoursMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($extraHoursMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($extraHoursMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html .='<tr bgcolor="">'
                .'<th>'.$naturezas[4].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($internshipBagMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($internshipBagMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($internshipBagMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($internshipBagMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html.='<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[5].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($prizesAndGratuitiesMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($prizesAndGratuitiesMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($prizesAndGratuitiesMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($prizesAndGratuitiesMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html .='<tr bgcolor="">'
                .'<th>'.$naturezas[6].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($socialChargesMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($socialChargesMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($socialChargesMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($socialChargesMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html.='<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[7].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($feedingMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($feedingMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($feedingMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($feedingMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html .='<tr bgcolor="">'
                .'<th>'.$naturezas[8].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($transportMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($transportMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($transportMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($transportMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
                        
            $html .='<tr bgcolor="">'
                .'<th>'.$naturezas[9].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($safetyEquipmentMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($safetyEquipmentMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($safetyEquipmentMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($safetyEquipmentMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html.='<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[10].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($coursesAndTrainingMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($coursesAndTrainingMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($coursesAndTrainingMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($coursesAndTrainingMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html.='<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[10].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($coursesAndTrainingMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($coursesAndTrainingMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($coursesAndTrainingMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($coursesAndTrainingMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
            $html.='<tr bgcolor="#F5F5F5">'
                .'<th>'.$naturezas[11].'</th>';
                for ($i = 0; $i <= 11; $i++){ 
                    if($outehsMonths[$i]>0 and $staff_year[$i] >0){
                        $html .= '<td>' .number_format($outehsMonths[$i]/$staff_year[$i],0,',','.'). '</td>';
                    }else{
                        $html .= '<td>*</td>';
                    }
                }
                if($outehsMonths[12]>0 and $staff_year[12] >0){
                    $html .= '<th>'.number_format($outehsMonths[12]/$staff_year[12],0,',','.').'</th>';
                }else{$html .= '<th>*</th>';}
            $html .='</tr>';
            
                        
            $html .='<tr bgcolor="#F5F5F5">'
                .'<th>Total</th>';
                for ($i = 0; $i <= 11; $i++){  
                    $html .= '<td>'.number_format(($earningsMonths[$i] + $prolaboreMonths[$i] + $extraHoursMonths[$i] +
                                                                    $internshipBagMonths[$i] + $prizesAndGratuitiesMonths[$i] + $socialChargesMonths[$i] +
                                                                        $feedingMonths[$i] + $transportMonths[$i] + $medicalMonths[$i] + $safetyEquipmentMonths[$i] + 
                                                                            $coursesAndTrainingMonths[$i] + $outehsMonths[$i])/$staff_year[$i],0,',','.') .'</td>';
                }
                
                $html .= '<th>'. number_format(($earningsMonths[12] + $prolaboreMonths[12] + $extraHoursMonths[12] + $internshipBagMonths[12] +
                                                                $prizesAndGratuitiesMonths[12] + $socialChargesMonths[12] + $feedingMonths[12] + 
                                                                    $transportMonths[12] + $medicalMonths[12] + $safetyEquipmentMonths[12] + 
                                                                        $coursesAndTrainingMonths[12] + $outehsMonths[12])/$staff_year[12],0,',','.') .'</th>';                                
                $html .= '</tr>'            
            . '</tbody>'    
       . '</table>';
*/

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Despesas com pessoal.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>  
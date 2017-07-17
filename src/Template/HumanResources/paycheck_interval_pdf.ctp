<?php
class MYPDF extends TCPDF {

    public function constructYearly($image_file, $month, $employer, $paychecksYearly, $paychecksYearlyVerbasBase){

        $html = '
        <table style="border-collapse: collapse; ">
        <tbody>
        <tr>
        <td colspan="1">
        <img src="'.$image_file.'" width="100" height="28"> <br>
        </td>
        <td colspan="4"><br>
        <b>*** Seu salário é confidencial, não divulgue a quem quer se seja! ***</b> <br>
        Rodovia Divaldo Suruagy, SN - Polo Multifabril -
        Marechal Deodoro, AL CEP: 57160-000 <br>
        CNPJ: 35.738.970/0001-73 IE: 240.976.835
        </td>
        </tr>
        <tr>
        <td style="border-left:1pt solid black; border-bottom:1pt solid black; border-top:1pt solid black;" colspan="4" align="center"><b>Recibo de pagamento de salário</b></td>
        <td style="border-right:1pt solid black; border-bottom:1pt solid black; border-top:1pt solid black;" align="right"><b>'.substr($month,4,6).'/'.substr($month,0,4).'</b></td>
        </tr>
        <tr>
        <td colspan="3" style="border-left:1pt solid black; padding:10px;">
        Código: '.$employer[0]['RA_MAT'].'
        Nome: '.$employer[0]['RA_NOME'].' <br>
        Função: '.$employer[0]['RA_CODFUNC'].'
        Desc. função: '.$employer[0]['RJ_DESC'].'
        </td>
        <td colspan="3" style="border-right:1pt solid black; padding:10px;">
        CBO: 317210 Emp: 00 Filial : 001
        Cto. Custo: '.$employer[0]['RA_CC'].' <br>
        Desc. cto custo: '.$employer[0]['I3_DESC'].'
        </td>

        </tr>
        <tr>
        <td style="width:5%; border:1pt solid black;">Cod.</td>
        <td align="center" style="width:35%; border:1pt solid black;">Descrição</td>
        <td align="center" style="width:10%; border:1pt solid black;">Referência</td>
        <td align="center" style="width:25%; border:1pt solid black;">Vencimentos</td>
        <td align="center" style="width:25%; border:1pt solid black;">Descontos</td>
        </tr> ';

        $cont = 0;
        $vencimentos = 0;
        $descontos = 0;
        foreach ($paychecksYearly as $key => $value) {

            if ($month == $value['RD_DATARQ']) {
                $html .= '<tr>';
                $html .= '<td align="center" style="width:5%; border-right:1pt solid black; border-left:1pt solid black;">'.$value['RD_PD'].'</td>';
                $html .= '<td align="left" style="width:35%; border-right:1pt solid black; border-left:1pt solid black;">'.$value['RV_DESC'].'</td>';
                $html .= '<td align="center" style="width:10%; border-right:1pt solid black; border-left:1pt solid black;">'.number_format($value['RD_HORAS'], 2, '.', ' ').'</td>';
                if ($value['RV_TIPOCOD'] == 1) {
                    $html .= '<td align="right" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;">'.number_format($value['RD_VALOR'], 2, ',', '.').'</td>';
                    $html .= '<td align="rightright" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                    $vencimentos += (float)$value['RD_VALOR'];
                }else{
                    $html .= '<td align="right" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                    $html .= '<td align="right" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;">'.number_format($value['RD_VALOR'], 2, ',', '.').'</td>';
                    $descontos += $value['RD_VALOR'];
                }
                $html .= '</tr>';
                $cont++;
                //debug($cont);
            }

        }

        //completa o corpo do contra cheque com linhas em branco caso não sejam preenchidas
        if ($cont < 20) {
            for ($i=0; $i < 20 - $cont; $i++) {
                $html .= '<tr>';
                $html .= '<td style="width:5%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '<td align="center" style="width:35%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '<td align="center" style="width:10%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '<td align="center" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '<td align="center" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '</tr>';
            }
        }

        $verba721 = 0;
        $verba731 = 0;
        $verba732 = 0;
        $verba713 = 0;
        foreach ($paychecksYearlyVerbasBase as $key => $value) {
            if ($month == $value['RD_DATARQ']) {
                if ($value['RD_PD'] == '713') {
                    $verba713 += (float) $value['RD_VALOR'];
                }elseif ($value['RD_PD'] == '721') {
                    $verba721 += (float) $value['RD_VALOR'];
                }elseif ($value['RD_PD'] == '731') {
                    $verba731 += (float) $value['RD_VALOR'];
                }elseif ($value['RD_PD'] == '732') {
                    $verba732 += (float) $value['RD_VALOR'];
                }
            }
        }

        $html .= '<tr>';
        $html .= '    <td style="border-left:1pt solid black; border-top:1pt solid black;"></td>';
        $html .= '    <td style="border-top:1pt solid black;"></td>';
        $html .= '    <td style="border-top:1pt solid black;"></td>';
        $html .= '    <td align="center" style="border:1pt solid black;"> Total de vencimentos: <br>'.number_format($vencimentos, 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="border:1pt solid black;"> Total de descontos: <br>'.number_format($descontos, 2, ',', '.').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '    <td style="border-left:1pt  solid black; border-bottom:1pt solid black;"></td>';
        $html .= '    <td style="border-bottom:1pt solid black;"></td>';
        $html .= '    <td style="border-bottom:1pt solid black;"></td>';
        $html .= '    <td align="center" style="border:1pt solid black;">Total liquido ==> </td>';
        $liquido = $vencimentos-$descontos;
        $html .= '    <td align="center" style="border:1pt solid black;"> ' . number_format($liquido, 2, ',', '.') . '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black; border-left:1pt solid black;">Salário base: <br> '.number_format($employer[0]['RA_SALARIO'], 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black;">Sal. contr. INSS: <br> '.number_format($verba721 , 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black;">Base Cálc. FGTS: <br> '.number_format($verba731 , 2, ',', '.').'</td>';
        $html .= '    <td align="left" style="width:12%; border-left:1pt solid black; border-bottom:1pt solid black;">FGTS do mês: <br> '.number_format($verba732 , 2, ',', '.').'</td>';
        $html .= '    <td align="right" style="width:13%; border-bottom:1pt solid black;">Base cálc IRRF: <br> '.number_format($verba713 , 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="width:25%; border:1pt solid black;">Faixa IRRF <br> 0,00</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '    <td style="border-left:1pt solid black; border-bottom:1pt solid black;" colspan="2" align="center">';
        $html .= '        <br>Declaro ter recebido a importância liquida discriminada neste recibo';
        $html .= '    </td>';
        $html .= '    <td style="border-bottom:1pt solid black;" colspan="2" align="center">';
        $html .= '    <br><br> ______/______/______  <br>';
        $html .= '        Data';
        $html .= '    </td>';
        $html .= '    <td style="border-right:1pt solid black; border-bottom:1pt solid black;" colspan="2" align="center">';
        $html .= '       <br><br>________________________________________<br>';
        $html .= '        Assinatura do funcionário';
        $html .= '    </td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table> <br><br><br>';

        return $html;

    }

    public function constructMonthly($image_file, $employer, $paychecksMonthly, $paychecksMonthlyVerbasBase){

        $month = $paychecksMonthly[0]['RC_DATA'];

        $html = '
        <table style="border-collapse: collapse; ">
        <tbody>
        <tr>
        <td colspan="1">
        <img src="'.$image_file.'" width="100" height="28"> <br>
        </td>
        <td colspan="4"><br>
        <b>*** Seu salário é confidencial, não divulgue a quem quer se seja! ***</b> <br>
        Rodovia Divaldo Suruagy, SN - Polo Multifabril -
        Marechal Deodoro, AL CEP: 57160-000 <br>
        CNPJ: 35.738.970/0001-73 IE: 240.976.835
        </td>
        </tr>
        <tr>
        <td style="border-left:1pt solid black; border-bottom:1pt solid black; border-top:1pt solid black;" colspan="4" align="center"><b>Recibo de pagamento de salário</b></td>
        <td style="border-right:1pt solid black; border-bottom:1pt solid black; border-top:1pt solid black;" align="right"><b>'.substr($paychecksMonthly[0]['RC_DATA'],4,2).'/'.substr($paychecksMonthly[0]['RC_DATA'],0,4).'</b></td>
        </tr>
        <tr>
        <td colspan="3" style="border-left:1pt solid black; padding:10px;">
        Código: '.$employer[0]['RA_MAT'].'
        Nome: '.$employer[0]['RA_NOME'].' <br>
        Função: '.$employer[0]['RA_CODFUNC'].'
        Desc. função: '.$employer[0]['RJ_DESC'].'
        </td>
        <td colspan="3" style="border-right:1pt solid black; padding:10px;">
        CBO: 317210 Emp: 00 Filial : 001
        Cto. Custo: '.$employer[0]['RA_CC'].' <br>
        Desc. cto custo: '.$employer[0]['I3_DESC'].'
        </td>

        </tr>
        <tr>
        <td style="width:5%; border:1pt solid black;">Cod.</td>
        <td align="center" style="width:35%; border:1pt solid black;">Descrição</td>
        <td align="center" style="width:10%; border:1pt solid black;">Referência</td>
        <td align="center" style="width:25%; border:1pt solid black;">Vencimentos</td>
        <td align="center" style="width:25%; border:1pt solid black;">Descontos</td>
        </tr> ';

        $cont = 0;
        $vencimentos = 0;
        $descontos = 0;
        foreach ($paychecksMonthly as $key => $value) {

            $html .= '<tr>';
            $html .= '<td align="center" style="width:5%; border-right:1pt solid black; border-left:1pt solid black;">'.$value['RC_PD'].'</td>';
            $html .= '<td align="left" style="width:35%; border-right:1pt solid black; border-left:1pt solid black;">'.$value['RV_DESC'].'</td>';
            $html .= '<td align="center" style="width:10%; border-right:1pt solid black; border-left:1pt solid black;">'.number_format($value['RC_HORAS'], 2, '.', ' ').'</td>';
            if ($value['RV_TIPOCOD'] == 1) {
                $html .= '<td align="right" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;">'.number_format($value['RC_VALOR'], 2, ',', '.').'</td>';
                $html .= '<td align="rightright" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $vencimentos += (float)$value['RC_VALOR'];
            }else{
                $html .= '<td align="right" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '<td align="right" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;">'.number_format($value['RC_VALOR'], 2, ',', '.').'</td>';
                $descontos += $value['RC_VALOR'];
            }
            $html .= '</tr>';
            $cont++;
        }

        //completa o corpo do contra cheque com linhas em branco caso não sejam preenchidas
        if ($cont < 20) {
            for ($i=0; $i < 20 - $cont; $i++) {
                $html .= '<tr>';
                $html .= '    <td style="width:5%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '    <td align="center" style="width:35%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '    <td align="center" style="width:10%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '    <td align="center" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '    <td align="center" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;"></td>';
                $html .= '</tr>';
            }
        }

        $verba721 = 0;
        $verba731 = 0;
        $verba732 = 0;
        $verba713 = 0;
        foreach ($paychecksMonthlyVerbasBase as $key => $value) {
            if ($month == $value['RC_DATA']) {
                if ($value['RC_PD'] == '713') {
                    $verba713 += (float) $value['RC_VALOR'];
                }elseif ($value['RC_PD'] == '721') {
                    $verba721 += (float) $value['RC_VALOR'];
                }elseif ($value['RC_PD'] == '731') {
                    $verba731 += (float) $value['RC_VALOR'];
                }elseif ($value['RC_PD'] == '732') {
                    $verba732 += (float) $value['RC_VALOR'];
                }
            }
        }

        $html .= '<tr>';
        $html .= '    <td style="border-left:1pt solid black; border-top:1pt solid black;"></td>';
        $html .= '    <td style="border-top:1pt solid black;"></td>';
        $html .= '    <td style="border-top:1pt solid black;"></td>';
        $html .= '    <td align="center" style="border:1pt solid black;"> Total de vencimentos: <br>'.number_format($vencimentos, 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="border:1pt solid black;"> Total de descontos: <br>'.number_format($descontos, 2, ',', '.').'</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '    <td style="border-left:1pt  solid black; border-bottom:1pt solid black;"></td>';
        $html .= '    <td style="border-bottom:1pt solid black;"></td>';
        $html .= '    <td style="border-bottom:1pt solid black;"></td>';
        $html .= '    <td align="center" style="border:1pt solid black;">Total liquido ==> </td>';
        $liquido = $vencimentos-$descontos;
        $html .= '    <td align="center" style="border:1pt solid black;"> ' . number_format($liquido, 2, ',', '.') . '</td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black; border-left:1pt solid black;">Salário base: <br> '.number_format($employer[0]['RA_SALARIO'], 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black;">Sal. contr. INSS: <br> '.number_format($verba721 , 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black;">Base Cálc. FGTS: <br> '.number_format($verba731 , 2, ',', '.').'</td>';
        $html .= '    <td align="left" style="width:12%; border-left:1pt solid black; border-bottom:1pt solid black;">FGTS do mês: <br> '.number_format($verba732 , 2, ',', '.').'</td>';
        $html .= '    <td align="right" style="width:13%; border-bottom:1pt solid black;">Base cálc IRRF: <br> '.number_format($verba713 , 2, ',', '.').'</td>';
        $html .= '    <td align="center" style="width:25%; border:1pt solid black;">Faixa IRRF <br> 0,00</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '    <td style="border-left:1pt solid black; border-bottom:1pt solid black;" colspan="2" align="center">';
        $html .= '        <br>Declaro ter recebido a importância liquida discriminada neste recibo';
        $html .= '    </td>';
        $html .= '    <td style="border-bottom:1pt solid black;" colspan="2" align="center">';
        $html .= '       <br><br>______/______/______  <br>';
        $html .= '        Data';
        $html .= '    </td>';
        $html .= '    <td style="border-right:1pt solid black; border-bottom:1pt solid black;" colspan="2" align="center">';
        $html .= '      <br> ________________________________________<br>';
        $html .= '        Assinatura do funcionário';
        $html .= '    </td>';
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table> <br><br><br>';

        return $html;

    }

    //Page header
    public function Header() {}

    // Page footer
    public function Footer() {}

}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('Contra Cheques');
$pdf->SetSubject('Contra Cheques');
$pdf->SetKeywords('Contra Cheques');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 8, '', false);

$pdf->AddPage();

$image_file = K_PATH_IMAGES.'logo.jpg';

$html = '';

foreach ($months as $key => $month) {

    $html .= $pdf->constructYearly($image_file, $month, $employer, $paychecksYearly, $paychecksYearlyVerbasBase);

    if ($vias == 'Sim') {
        $html .= $pdf->constructYearly($image_file, $month, $employer, $paychecksYearly, $paychecksYearlyVerbasBase);
    }

}

if ($paychecksMonthly != []) {

    if ($vias == 'Sim') {

        $html .= $pdf->constructMonthly($image_file,$employer, $paychecksMonthly, $paychecksMonthlyVerbasBase);

    }

    $html .= $pdf->constructMonthly($image_file, $employer, $paychecksMonthly, $paychecksMonthlyVerbasBase);
}

$pdf->writeHTML($html, true, false, true, false);

$pdf->Output('contra_cheques.pdf', 'I');


?>

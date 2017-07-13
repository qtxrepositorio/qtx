<?php
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
    	/*
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';

        $this->Image($image_file, 15, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Set font
        $this->SetFont('times', 'B', 10);

        // Title
        $this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        */
    }

    // Page footer
    public function Footer() {
		/*
        // Position at 15 mm from bottom
        $this->SetY(-15);

        // Set font
        $this->SetFont('times', 'B', 10);

        // Page number
        $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        */
    }
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

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

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
$pdf->SetFont('helvetica', '', 8, '', false);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$image_file = K_PATH_IMAGES.'logo.jpg';

$html = '';

for ($x=0; $x < $months ; $x++) {

    $html .= '
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
                        <td style="border-right:1pt solid black; border-bottom:1pt solid black; border-top:1pt solid black;" align="right"><b>Julho/2017</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-left:1pt solid black; padding:10px;">
                            Código: 001477
                            Nome: Lucas Timotio Firmino <br>
                            Função: 00004
                            Descrição da função: Assist de info
                        </td>
                        <td colspan="2" style="padding:10px;">
                            CBO: 317210
                            Cto. Custo: 01 <br>
                            Desc. cto custo: Administrativo
                        </td>
                        <td colspan="1" style="border-right:1pt solid black; padding:10px;">
                            Emp: 00 <br>
                            Filial : 001
                        </td>
                    </tr>
                    <tr>
                        <td style="width:5%; border:1pt solid black;">Cod.</td>
                        <td align="center" style="width:35%; border:1pt solid black;">Descrição</td>
                        <td align="center" style="width:10%; border:1pt solid black;">Referência</td>
                        <td align="center" style="width:25%; border:1pt solid black;">Vencimentos</td>
                        <td align="center" style="width:25%; border:1pt solid black;">Descontos</td>
                    </tr> ';

                    for($i=0; $i < 20; $i++) {

                        $html .= '<tr>';
                        $html .= '<td style="width:5%; border-right:1pt solid black; border-left:1pt solid black;"> 00'. $i. '</td>';
                        $html .= '<td align="center" style="width:35%; border-right:1pt solid black; border-left:1pt solid black;">xxxxxxxxx</td>';
                        $html .= '<td align="center" style="width:10%; border-right:1pt solid black; border-left:1pt solid black;">xxxxxxxxx</td>';
                        $html .= '<td align="center" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;">xxxxxxxxx</td>';
                        $html .= '<td align="center" style="width:25%; border-right:1pt solid black; border-left:1pt solid black;">xxxxxxxxx</td>';
                        $html .= '</tr>';

                    }

                    $html .= '<tr>';
                    $html .= '    <td style="border-left:1pt solid black; border-top:1pt solid black;"></td>';
                    $html .= '    <td style="border-top:1pt solid black;"></td>';
                    $html .= '    <td style="border-top:1pt solid black;"></td>';
                    $html .= '    <td align="center" style="border:1pt solid black;"> Total de vencimentos: <br>2,000.00</td>';
                    $html .= '    <td align="center" style="border:1pt solid black;"> Total de descontos: <br>2,000.00</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                    $html .= '    <td style="border-left:1pt  solid black; border-bottom:1pt solid black;"></td>';
                    $html .= '    <td style="border-bottom:1pt solid black;"></td>';
                    $html .= '    <td style="border-bottom:1pt solid black;"></td>';
                    $html .= '    <td align="center" style="border:1pt solid black;">Total liquido ==> </td>';
                    $html .= '    <td align="center" style="border:1pt solid black;"> 2,000.00</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                    $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black; border-left:1pt solid black;">Salário base: <br> 1,0000.00</td>';
                    $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black;">Sal. contr. INSS: <br> 1,0000.00</td>';
                    $html .= '    <td align="center" style="width:16.666%; border-bottom:1pt solid black;">Base Cálc. FGTS: <br> 1,0000.00</td>';
                    $html .= '    <td align="left" style="width:12%; border-left:1pt solid black; border-bottom:1pt solid black;">FGTS do mês: <br> 2.000,00</td>';
                    $html .= '    <td align="right" style="width:13%; border-bottom:1pt solid black;">Base cálc IRRF: <br> 2.000,00</td>';
                    $html .= '    <td align="center" style="width:25%; border:1pt solid black;">Faixa IRRF 0,00</td>';
                    $html .= '</tr>';

                    $html .= '<tr>';
                    $html .= '    <td style="border-left:1pt solid black; border-bottom:1pt solid black;" colspan="3" align="center">';
                    $html .= '        Declaro ter recebido a importância liquida discriminada neste recibo';
                    $html .= '         ______/______/______ <br>';
                    $html .= '         Data';
                    $html .= '    </td>';
                    $html .= '    <td style="border-right:1pt solid black; border-bottom:1pt solid black;" colspan="3" align="center">';
                    $html .= '        <br><br>________________________________________<br>';
                    $html .= '        Assinatura do funcionário';
                    $html .= '    </td>';
                    $html .= '</tr>';
                $html .= '</tbody>';
            $html .= '</table> <br><br><br><br>';

            if ($x % 2 ==0) {
                $pdf->SetAutoPageBreak(TRUE,10);
            }

}

$pdf->writeHTML($html, true, false, true, false);


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('contra_cheques.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>

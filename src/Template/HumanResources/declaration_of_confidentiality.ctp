<?php
class MYPDF extends TCPDF {

    //Page header
    public function Header() {

        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';

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
        $this->Cell(0, 10, '', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('Declaração de confidencialidade, integridade e imparcialidade');
$pdf->SetSubject('Declaração de confidencialidade, integridade e imparcialidade');
$pdf->SetKeywords('Declaração de confidencialidade, integridade e imparcialidade');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
$pdf->SetFont('helvetica', '', 10, '', false);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$css = '
</script>

</script>
';

$html = '';

$html .= $css;

$html = '<br/>';
$html .= '<h2 align="center"> Declaração de confidencialidade, integridade e imparcialidade: </h2>'
    .'<p></p>'
    .'<p></p>'
    .'<p></p>'
    .'<p></p>'
    .'<p></p>'
    .'<p></p>'
    .'<p></p>';
$html .= '<font size="12">'
            .'<p align="center">'
                .'<b>Eu: </b>'. $officialconfidential 
            .'</p>'
        .'</font>';

$html .= '<p></p>';
$html .= '<font size="12">'
            .'<p align="justify">'
            	.'Declaro observar o sigilo profissional sobre todos os atos por mim praticados ou sobre informações e dados que tenha conhecimento, em resultado do exercício do meu contrato de prestação de serviços para a Qualitex Engenharia e Serviços.'
			.'</p>'
			.'<p align="justify">'
				.'Comprometo-me a cumprir fielmente as diretrizes da empresa, estabelecidas em norma sobre confidencialidade, integridade e imparcialidade como também a política de segurança da informação na qual sou treinado e tenho acesso para.'
			.'</p>'
			.'<p align="justify">'
				.'Estou ciente de que devo me manter atento para não cometer falha e por conseguinte, ser penalizado por infringência da ética profissional.'
			.'</p>'
        .'<font/>';

$html .= '<p></p>'
        .'<p></p>'
        .'<p></p>'
        .'<p></p>'
        .'<p></p>'
        .'<p></p>'
        .'<p></p>'
        .'<p></p>';

$html .= '<p align="center">Marechal Deodoro - AL, '.$dateConverted.'</p>'
        .'<p></p>'
        .'<p align="center"> _____________________________________________ <br/> Assinatura do funcionário. </p>'
        .'<p align="center">CPF: '. $cpf .'</p>';









//$pdf->writeHTML($html, true, 0, true, true);
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('DeclaracaoDeConfidencialidadeIntegridadeEImparcialidade.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>   
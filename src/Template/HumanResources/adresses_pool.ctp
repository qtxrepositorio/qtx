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
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().' de '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('Endereço do POOL');
$pdf->SetSubject('Endereço do POOL');
$pdf->SetKeywords('Endereço do POOL');

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
$pdf->SetFont('helvetica', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = '';

$html .= '
<style> 

table {
    font-family: arial, sans-serif;
    width: 50%;
    border: 1px solid green;
    padding: 4px;
}

td, th {
    border: 1px solid green;
    padding: 4px;
}

</style>';



$html .= '<h2 align="center"> Endereços do POOL:</h2>';

$html .= '<table class="table" align="center">'
        . '<thead>'
            . '<tr>'
                . '<th style="width: 50px">MAT.:</th>'
                . '<th style="width: 200px">NOME:</th>'
                . '<th style="width: 100px">BAIRRO:</th>'
                . '<th style="width: 100px">MUNICÍPIO-UF:</th>'
                . '<th style="width: 50px">LINHA:</th>'
                . '<th style="width: 215px">PONTO:</th>'
            . '</tr>'
        . '</thead>'
        . '<tbody>';



foreach ($adressesPoolRs  as $key) {
    foreach ($key as $value) {
        # code...

        $html .=  '<tr>'
                . '<td style="width: 50px">'.$value['RA_MAT'].'</td>'
                . '<td style="width: 200px">'.$value['RA_NOME'].'</td>'
                . '<td style="width: 100px">'.$value['RA_BAIRRO'].'</td>'
                . '<td style="width: 100px">'.$value['RA_MUNICIP'].' - '.$value['RA_ESTADO'].'</td>'
                . '<td style="width: 50px">'.$value['RA_XLINHA'].'</td>'
                . '<td style="width: 215px">'.$value['RA_XPTAPAN'].'</td>'
            . '</tr>';

    }
    
}

$html .=  '</tbody>'
        . '</table>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Endereço do POOL.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>  
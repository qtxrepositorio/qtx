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
$pdf->SetTitle('Cartão de ponto');
$pdf->SetSubject('Cartão de ponto');
$pdf->SetKeywords('Cartão de ponto');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(6, 2, 2,2);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
$pdf->SetFont('helvetica', '', 10, '', false);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$html = '
<style>

	table{
	    margin-top: 100px;
	    margin-right: 150px;
	    margin-left: 150px;   
	}

</style>
';

$html .= '<table cellpadding="2">';

$pdf->resetColumns();

$pdf->setEqualColumns(2, 100);

$pdf->selectColumn(); 

if($timelunch == '0')
{
	$timelunch = '07:10 às 12:00 13:00 às 17:10';
	$aware = '* <b>Ciente:</b> Intervalo de 1 hora para almoço.';
}
else
{
	$timelunch = '07:10 às 12:00 13:20 às 17:10';
	$aware = '* <b>Ciente:</b> Intervalo de 1hr e 20min para almoço.';
}

$month = (string) (int) $month+1;
$year = (string) $year;

if (strlen($month) == 1) {
	# code...
	$month = '0'.$month;
}

foreach ($timecardDepartamentRs as $key) {
	# code...
	foreach ($key as  $value) {
		# code...
		$html .='<tr>
					<td border="1" width="270">
						<font size="9">'
							.'<b>Mês/Ano: </b>'.$month.'<b> / </b>'.$year
							.'<br><b>Matrícula: </b>'.$value['RA_MAT']
							.'<br/><b>Nome: </b>'.$value['RA_NOME']
							.'<br/><b>Cargo: </b>'.$value['Q3_DESCSUM']
                                                        .'<br/><b>Dpto: </b>'.$value['QB_DESCRIC'] . ' <b>CC: </b>'.$value['RA_CC'] 
							.'<br><b>Empresa: </b>Qualitex Engenharia e Serviços LTDA'
							.'<br/><b>CNPJ: </b>35.738.970/0001-73'
							.'<br/><b>Horário: </b>'.$timelunch		
							.'<br> '.$aware													
					  	.'</font>
					</td>
				</tr>';

	$pdf->SetAutoPageBreak(TRUE, 22);
	}
}
				


$html .='</table>';

//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->writeHTML($html, true, false, true, false);

$pdf->resetColumns();

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Cartão de ponto.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>    
 
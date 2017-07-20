<?php
class MYPDF extends TCPDF {

    public function Header() {

        $image_file = K_PATH_IMAGES.'logo.jpg';
    }

    public function Footer() {}
}

$image_file = K_PATH_IMAGES.'logo.jpg';

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, PDO::SQLSRV_ENCODING_UTF8, false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Qualitex Engenharia e Serviços');
$pdf->SetTitle('documento ' . $externalDocument[0]['number_document']);
$pdf->SetSubject('documento ' . $externalDocument[0]['number_document']);
$pdf->SetKeywords('documento ' . $externalDocument[0]['number_document']);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->setFontSubsetting(true);

$pdf->SetFont('helvetica', '', 10, '', false);

$pdf->AddPage();

$html = '<style></style>';

foreach ($externalDocument as $key => $value) {

    $html .= '<table  cellpadding="10">';
    $html .= '<tr>';
    $html .= '<th align="left"><img src="'.$image_file.'"  width="150" height="50"></th>';
    $html .= '<th align="right"><img src="http://qualitex.com.br/images/BV_Certification_ISO.png"  width="150" height="50"></th>';
    $html .= '</tr>';
    $html .= '</table>';

    //$html .= '<img src="'.$image_file.'" width="150" height="50"> <br/>';
    $html .= '<hr/>';
    $html .= '<table  cellpadding="10">';
    $html .= '<thead>';

    $html .= '<tr>';
    $html .= '<th><b>Numero do documento: </b>'.substr($value['number_document'],0,6).'/'.substr($value['number_document'],6,10).'</th>';
    $html .= '<th align="right">'.$value['locals_name'].', '.substr($value['created'],8,2).'/'.substr($value['created'],5,2).'/'.substr($value['created'],0,4).'</th>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<th colspan="3"><b>Cliente: </b>'.$value['client_name'].' <br><b>Att.:</b> '.$value['client_contact'].' </th>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<th><b>Referência: </b>'.$value['external_reference'].'</th>';
    $html .= '</tr>';

    $html .= '</thead>';
    $html .= '<tr>';
    $html .= '<th><b>Assunto: </b>'.$value['external_subject'].' </th>';
    $html .= '</tr>';
    $html .= '<tr>';
    $html .= '<td align="justify" colspan="3">'.$value['external_description'].'</td>';
    $html .= '</tr>';
    $html .= '<tbody>';
    $html .= '<tr>';


    $html .= '<td colspan="3" align="center">
                Atenciosamente, <br><br> <b>'
                .$value['users_name'].'</b> <br>
                '.$funcao.'</td>';
    $html .= '</tr>';


    $html .= '</tbody>';

    $html .= '</table>';

}

$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Output('documento ' . $externalDocument[0]['number_document'] . '.pdf', 'I');


?>

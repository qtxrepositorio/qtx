<?php

$date = getdate();
$exist = false;
$totalyear = 0;

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Mai', 'Abr', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];


$ccs = ['01 - ADMINISTRATIVO',
    '03 - LABORATORIO QUALITEX',
    '06 - LABORATORIO PETROBRAS - SE',
    '07 - LABORATORIO PETROBRAS - BA',
    '08 - TRANSPETRO - PE',
    '11 - APOIO OPERACIONAL UCS - AL',
    '12 - APOIO OPERACIONAL UPVC - AL',
    '13 - BRASKEM UCS - BA',
    '14 - BRASKEM UPVC - BA',
    '15 - PARADA UCS - AL',
    '16 - PARADA UPVC - AL',
    '18 - BRASKEM CASA DE CELULA',
    '20 - PETROBRAS - RN',
    '22 - CAMINHAO',
    '23 - SECADOR - AL',
    '28 - LABORATORIO RN',
    '32 - LANXES'];

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

    for ($i = 0; $i < count($revenuesCountCredit); $i++) {
        
        if ($revenuesCountCredit[$i]['CT2_DATA'] == $monthsNumbers[$x] ) {
            
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

    for ($i = 0; $i < count($revenuesCountDebit); $i++) {
        
        if ($revenuesCountDebit[$i]['CT2_DATA'] == $monthsNumbers[$x] ) {
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
}



?>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de receitas - Mês/Centro de custo. <b> Ano: <?php echo $date['year']?></b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">          
                        <div class="box-body">                 
                            <table id="example1" class="table table-bordered table-hover">
                                
                                <thead> 
                                    
                                    <tr>           
                                        <th>Centro de custo</th>
                                        
                                        <?php foreach ($monthsLabels as $key => $value): ?>
                                            <th><?php echo $value; ?></th>
                                        <?php endforeach ?>                                        
                                        
                                        <th>Total</th>
                                    </tr>  
                                        
                                </thead>

                                <tbody> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc01arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc01arryCCC[$i]-$cc01arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc01arryCCC[$i]-$cc01arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc03arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc03arryCCC[$i]-$cc03arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc03arryCCC[$i]-$cc03arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>  
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc06arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc06arryCCC[$i]-$cc06arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc06arryCCC[$i]-$cc06arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc07arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc07arryCCC[$i]-$cc07arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc07arryCCC[$i]-$cc07arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc08arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc08arryCCC[$i]-$cc08arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc08arryCCC[$i]-$cc08arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc11arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc11arryCCC[$i]-$cc11arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc11arryCCC[$i]-$cc11arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc12arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc12arryCCC[$i]-$cc12arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc12arryCCC[$i]-$cc12arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc13arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc13arryCCC[$i]-$cc13arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc13arryCCC[$i]-$cc13arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc14arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc14arryCCC[$i]-$cc14arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc14arryCCC[$i]-$cc14arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc15arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc15arryCCC[$i]-$cc15arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc15arryCCC[$i]-$cc15arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc16arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc16arryCCC[$i]-$cc16arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc16arryCCC[$i]-$cc16arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc18arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc18arryCCC[$i]-$cc18arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc18arryCCC[$i]-$cc18arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc20arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc20arryCCC[$i]-$cc20arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc20arryCCC[$i]-$cc20arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc22arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc22arryCCC[$i]-$cc22arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc22arryCCC[$i]-$cc22arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc23arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc23arryCCC[$i]-$cc23arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc23arryCCC[$i]-$cc23arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc28arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc28arryCCC[$i]-$cc28arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc28arryCCC[$i]-$cc28arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc32arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td><?php echo number_format($cc32arryCCC[$i]-$cc32arryCCD[$i],0,',','.'); ?></td>
                                        <?php $total += $cc32arryCCC[$i]-$cc32arryCCD[$i]; } ?>
                                        <th class="success"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th class="success"><?php echo 'TOTAL'; ?></th>
                                        
                                        <th class="success">
                                            <?php 
                                                $revenue = $cc01arryCCC[1]+$cc03arryCCC[1]+$cc06arryCCC[1]+$cc07arryCCC[1]+$cc08arryCCC[1]+$cc11arryCCC[1]+$cc12arryCCC[1]+$cc13arryCCC[1]+$cc14arryCCC[1]+$cc15arryCCC[1]+$cc16arryCCC[1]+$cc18arryCCC[1]+$cc20arryCCC[1]+$cc22arryCCC[1]+$cc23arryCCC[1]+$cc28arryCCC[1]+$cc32arryCCC[1];
                                                $retention = $cc01arryCCD[1]+$cc03arryCCD[1]+$cc06arryCCD[1]+$cc07arryCCD[1]+$cc08arryCCD[1]+$cc11arryCCD[1]+$cc12arryCCD[1]+$cc13arryCCD[1]+$cc14arryCCD[1]+$cc15arryCCD[1]+$cc16arryCCD[1]+$cc18arryCCD[1]+$cc20arryCCD[1]+$cc22arryCCD[1]+$cc23arryCCD[1]+$cc28arryCCD[1]+$cc32arryCCD[1];
                                                echo number_format($revenue-$retention,0,',','.'); 
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[2] + $cc03arryCCC[2] + $cc06arryCCC[2] + $cc07arryCCC[2] + $cc08arryCCC[2] + $cc11arryCCC[2] + $cc12arryCCC[2] + $cc13arryCCC[2] + $cc14arryCCC[2] + $cc15arryCCC[2] + $cc16arryCCC[2] + $cc18arryCCC[2] + $cc20arryCCC[2] + $cc22arryCCC[2] + $cc23arryCCC[2] + $cc28arryCCC[2] + $cc32arryCCC[2];
                                            $retention = $cc01arryCCD[2] + $cc03arryCCD[2] + $cc06arryCCD[2] + $cc07arryCCD[2] + $cc08arryCCD[2] + $cc11arryCCD[2] + $cc12arryCCD[2] + $cc13arryCCD[2] + $cc14arryCCD[2] + $cc15arryCCD[2] + $cc16arryCCD[2] + $cc18arryCCD[2] + $cc20arryCCD[2] + $cc22arryCCD[2] + $cc23arryCCD[2] + $cc28arryCCD[2] + $cc32arryCCD[2];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[3] + $cc03arryCCC[3] + $cc06arryCCC[3] + $cc07arryCCC[3] + $cc08arryCCC[3] + $cc11arryCCC[3] + $cc12arryCCC[3] + $cc13arryCCC[3] + $cc14arryCCC[3] + $cc15arryCCC[3] + $cc16arryCCC[3] + $cc18arryCCC[3] + $cc20arryCCC[3] + $cc22arryCCC[3] + $cc23arryCCC[3] + $cc28arryCCC[3] + $cc32arryCCC[3];
                                            $retention = $cc01arryCCD[3] + $cc03arryCCD[3] + $cc06arryCCD[3] + $cc07arryCCD[3] + $cc08arryCCD[3] + $cc11arryCCD[3] + $cc12arryCCD[3] + $cc13arryCCD[3] + $cc14arryCCD[3] + $cc15arryCCD[3] + $cc16arryCCD[3] + $cc18arryCCD[3] + $cc20arryCCD[3] + $cc22arryCCD[3] + $cc23arryCCD[3] + $cc28arryCCD[3] + $cc32arryCCD[3];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[4] + $cc03arryCCC[4] + $cc06arryCCC[4] + $cc07arryCCC[4] + $cc08arryCCC[4] + $cc11arryCCC[4] + $cc12arryCCC[4] + $cc13arryCCC[4] + $cc14arryCCC[4] + $cc15arryCCC[4] + $cc16arryCCC[4] + $cc18arryCCC[4] + $cc20arryCCC[4] + $cc22arryCCC[4] + $cc23arryCCC[4] + $cc28arryCCC[4] + $cc32arryCCC[4];
                                            $retention = $cc01arryCCD[4] + $cc03arryCCD[4] + $cc06arryCCD[4] + $cc07arryCCD[4] + $cc08arryCCD[4] + $cc11arryCCD[4] + $cc12arryCCD[4] + $cc13arryCCD[4] + $cc14arryCCD[4] + $cc15arryCCD[4] + $cc16arryCCD[4] + $cc18arryCCD[4] + $cc20arryCCD[4] + $cc22arryCCD[4] + $cc23arryCCD[4] + $cc28arryCCD[4] + $cc32arryCCD[4];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[5] + $cc03arryCCC[5] + $cc06arryCCC[5] + $cc07arryCCC[5] + $cc08arryCCC[5] + $cc11arryCCC[5] + $cc12arryCCC[5] + $cc13arryCCC[5] + $cc14arryCCC[5] + $cc15arryCCC[5] + $cc16arryCCC[5] + $cc18arryCCC[5] + $cc20arryCCC[5] + $cc22arryCCC[5] + $cc23arryCCC[5] + $cc28arryCCC[5] + $cc32arryCCC[5];
                                            $retention = $cc01arryCCD[5] + $cc03arryCCD[5] + $cc06arryCCD[5] + $cc07arryCCD[5] + $cc08arryCCD[5] + $cc11arryCCD[5] + $cc12arryCCD[5] + $cc13arryCCD[5] + $cc14arryCCD[5] + $cc15arryCCD[5] + $cc16arryCCD[5] + $cc18arryCCD[5] + $cc20arryCCD[5] + $cc22arryCCD[5] + $cc23arryCCD[5] + $cc28arryCCD[5] + $cc32arryCCD[5];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[6] + $cc03arryCCC[6] + $cc06arryCCC[6] + $cc07arryCCC[6] + $cc08arryCCC[6] + $cc11arryCCC[6] + $cc12arryCCC[6] + $cc13arryCCC[6] + $cc14arryCCC[6] + $cc15arryCCC[6] + $cc16arryCCC[6] + $cc18arryCCC[6] + $cc20arryCCC[6] + $cc22arryCCC[6] + $cc23arryCCC[6] + $cc28arryCCC[6] + $cc32arryCCC[6];
                                            $retention = $cc01arryCCD[6] + $cc03arryCCD[6] + $cc06arryCCD[6] + $cc07arryCCD[6] + $cc08arryCCD[6] + $cc11arryCCD[6] + $cc12arryCCD[6] + $cc13arryCCD[6] + $cc14arryCCD[6] + $cc15arryCCD[6] + $cc16arryCCD[6] + $cc18arryCCD[6] + $cc20arryCCD[6] + $cc22arryCCD[6] + $cc23arryCCD[6] + $cc28arryCCD[6] + $cc32arryCCD[6];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[7] + $cc03arryCCC[7] + $cc06arryCCC[7] + $cc07arryCCC[7] + $cc08arryCCC[7] + $cc11arryCCC[7] + $cc12arryCCC[7] + $cc13arryCCC[7] + $cc14arryCCC[7] + $cc15arryCCC[7] + $cc16arryCCC[7] + $cc18arryCCC[7] + $cc20arryCCC[7] + $cc22arryCCC[7] + $cc23arryCCC[7] + $cc28arryCCC[7] + $cc32arryCCC[7];
                                            $retention = $cc01arryCCD[7] + $cc03arryCCD[7] + $cc06arryCCD[7] + $cc07arryCCD[7] + $cc08arryCCD[7] + $cc11arryCCD[7] + $cc12arryCCD[7] + $cc13arryCCD[7] + $cc14arryCCD[7] + $cc15arryCCD[7] + $cc16arryCCD[7] + $cc18arryCCD[7] + $cc20arryCCD[7] + $cc22arryCCD[7] + $cc23arryCCD[7] + $cc28arryCCD[7] + $cc32arryCCD[7];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[8] + $cc03arryCCC[8] + $cc06arryCCC[8] + $cc07arryCCC[8] + $cc08arryCCC[8] + $cc11arryCCC[8] + $cc12arryCCC[8] + $cc13arryCCC[8] + $cc14arryCCC[8] + $cc15arryCCC[8] + $cc16arryCCC[8] + $cc18arryCCC[8] + $cc20arryCCC[8] + $cc22arryCCC[8] + $cc23arryCCC[8] + $cc28arryCCC[8] + $cc32arryCCC[8];
                                            $retention = $cc01arryCCD[8] + $cc03arryCCD[8] + $cc06arryCCD[8] + $cc07arryCCD[8] + $cc08arryCCD[8] + $cc11arryCCD[8] + $cc12arryCCD[8] + $cc13arryCCD[8] + $cc14arryCCD[8] + $cc15arryCCD[8] + $cc16arryCCD[8] + $cc18arryCCD[8] + $cc20arryCCD[8] + $cc22arryCCD[8] + $cc23arryCCD[8] + $cc28arryCCD[8] + $cc32arryCCD[8];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[9] + $cc03arryCCC[9] + $cc06arryCCC[9] + $cc07arryCCC[9] + $cc08arryCCC[9] + $cc11arryCCC[9] + $cc12arryCCC[9] + $cc13arryCCC[9] + $cc14arryCCC[9] + $cc15arryCCC[9] + $cc16arryCCC[9] + $cc18arryCCC[9] + $cc20arryCCC[9] + $cc22arryCCC[9] + $cc23arryCCC[9] + $cc28arryCCC[9] + $cc32arryCCC[9];
                                            $retention = $cc01arryCCD[9] + $cc03arryCCD[9] + $cc06arryCCD[9] + $cc07arryCCD[9] + $cc08arryCCD[9] + $cc11arryCCD[9] + $cc12arryCCD[9] + $cc13arryCCD[9] + $cc14arryCCD[9] + $cc15arryCCD[9] + $cc16arryCCD[9] + $cc18arryCCD[9] + $cc20arryCCD[9] + $cc22arryCCD[9] + $cc23arryCCD[9] + $cc28arryCCD[9] + $cc32arryCCD[9];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[10] + $cc03arryCCC[10] + $cc06arryCCC[10] + $cc07arryCCC[10] + $cc08arryCCC[10] + $cc11arryCCC[10] + $cc12arryCCC[10] + $cc13arryCCC[10] + $cc14arryCCC[10] + $cc15arryCCC[10] + $cc16arryCCC[10] + $cc18arryCCC[10] + $cc20arryCCC[10] + $cc22arryCCC[10] + $cc23arryCCC[10] + $cc28arryCCC[10] + $cc32arryCCC[10];
                                            $retention = $cc01arryCCD[10] + $cc03arryCCD[10] + $cc06arryCCD[10] + $cc07arryCCD[10] + $cc08arryCCD[10] + $cc11arryCCD[10] + $cc12arryCCD[10] + $cc13arryCCD[10] + $cc14arryCCD[10] + $cc15arryCCD[10] + $cc16arryCCD[10] + $cc18arryCCD[10] + $cc20arryCCD[10] + $cc22arryCCD[10] + $cc23arryCCD[10] + $cc28arryCCD[10] + $cc32arryCCD[10];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>

                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[11] + $cc03arryCCC[11] + $cc06arryCCC[11] + $cc07arryCCC[11] + $cc08arryCCC[11] + $cc11arryCCC[11] + $cc12arryCCC[11] + $cc13arryCCC[11] + $cc14arryCCC[11] + $cc15arryCCC[11] + $cc16arryCCC[11] + $cc18arryCCC[11] + $cc20arryCCC[11] + $cc22arryCCC[11] + $cc23arryCCC[11] + $cc28arryCCC[11] + $cc32arryCCC[11];
                                            $retention = $cc01arryCCD[11] + $cc03arryCCD[11] + $cc06arryCCD[11] + $cc07arryCCD[11] + $cc08arryCCD[11] + $cc11arryCCD[11] + $cc12arryCCD[11] + $cc13arryCCD[11] + $cc14arryCCD[11] + $cc15arryCCD[11] + $cc16arryCCD[11] + $cc18arryCCD[11] + $cc20arryCCD[11] + $cc22arryCCD[11] + $cc23arryCCD[11] + $cc28arryCCD[11] + $cc32arryCCD[11];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            $revenue = $cc01arryCCC[12] + $cc03arryCCC[12] + $cc06arryCCC[12] + $cc07arryCCC[12] + $cc08arryCCC[12] + $cc11arryCCC[12] + $cc12arryCCC[12] + $cc13arryCCC[12] + $cc14arryCCC[12] + $cc15arryCCC[12] + $cc16arryCCC[12] + $cc18arryCCC[12] + $cc20arryCCC[12] + $cc22arryCCC[12] + $cc23arryCCC[12] + $cc28arryCCC[12] + $cc32arryCCC[12];
                                            $retention = $cc01arryCCD[12] + $cc03arryCCD[12] + $cc06arryCCD[12] + $cc07arryCCD[12] + $cc08arryCCD[12] + $cc11arryCCD[12] + $cc12arryCCD[12] + $cc13arryCCD[12] + $cc14arryCCD[12] + $cc15arryCCD[12] + $cc16arryCCD[12] + $cc18arryCCD[12] + $cc20arryCCD[12] + $cc22arryCCD[12] + $cc23arryCCD[12] + $cc28arryCCD[12] + $cc32arryCCD[12];
                                            echo number_format($revenue - $retention, 0, ',', '.');
                                            ?>
                                        </th>
                                        
                                        <th class="success">
                                            <?php
                                            echo number_format($totalyear, 0, ',', '.');
                                            ?>
                                        </th>

                                    </tr>
                                    
                                    
                                    
                                    
                                    
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<?php

$date = getdate();
$exist = false;
$totalyear = 0;

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Mai', 'Abr', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
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
?>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Configurar ano de referência:</b></h3>
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
                            <div class="roles form large-9 medium-8 columns content">
                                <fieldset>
                                    <legend><?= __('Informar o ano desejado:') ?></legend>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <?php
                                            echo $this->Form->input('name', ['default' => '2017' ,'disabled' => FALSE,'label'=>' ']);
                                        ?>
                                    </div> 
                                    <div class="col-md-4""></div>
                                </fieldset>
                                <div align="center">
                                    <?= $this->Form->button(__('Carregar')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de receitas - <b> Bruta </b> - Per Capita. <b> Ano: <?php echo $date['year']?></b></h3>
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
                                        <td>
                                            <?php 
                                                if($cc01arryCCC[$i] != 0 and $staff_cc01[$i] !=0){
                                                    echo number_format($cc01arryCCC[$i] / $staff_cc01[$i],0,',','.');
                                                    $total += $cc01arryCCC[$i] / $staff_cc01[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc03arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc03arryCCC[$i] != 0 and $staff_cc03[$i] !=0){
                                                    echo number_format($cc03arryCCC[$i] / $staff_cc03[$i],0,',','.');
                                                    $total += $cc03arryCCC[$i] / $staff_cc03[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc06arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc06arryCCC[$i] != 0 and $staff_cc06[$i] !=0){
                                                    echo number_format($cc06arryCCC[$i] / $staff_cc06[$i],0,',','.');
                                                    $total += $cc06arryCCC[$i] / $staff_cc06[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc07arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc07arryCCC[$i] != 0 and $staff_cc07[$i] !=0){
                                                    echo number_format($cc07arryCCC[$i] / $staff_cc07[$i],0,',','.');
                                                    $total += $cc07arryCCC[$i] / $staff_cc07[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc08arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc08arryCCC[$i] != 0 and $staff_cc08[$i] !=0){
                                                    echo number_format($cc08arryCCC[$i] / $staff_cc08[$i],0,',','.');
                                                    $total += $cc08arryCCC[$i] / $staff_cc08[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc11arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc11arryCCC[$i] != 0 and $staff_cc11[$i] !=0){
                                                    echo number_format($cc11arryCCC[$i] / $staff_cc11[$i],0,',','.');
                                                    $total += $cc11arryCCC[$i] / $staff_cc11[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc12arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc12arryCCC[$i] != 0 and $staff_cc12[$i] !=0){
                                                    echo number_format($cc12arryCCC[$i] / $staff_cc12[$i],0,',','.');
                                                    $total += $cc12arryCCC[$i] / $staff_cc12[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc13arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc13arryCCC[$i] != 0 and $staff_cc13[$i] !=0){
                                                    echo number_format($cc13arryCCC[$i] / $staff_cc13[$i],0,',','.');
                                                    $total += $cc13arryCCC[$i] / $staff_cc13[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc14arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc14arryCCC[$i] != 0 and $staff_cc14[$i] !=0){
                                                    echo number_format($cc14arryCCC[$i] / $staff_cc14[$i],0,',','.');
                                                    $total += $cc14arryCCC[$i] / $staff_cc14[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc15arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc15arryCCC[$i] != 0 and $staff_cc13[$i] !=0){
                                                    echo number_format($cc15arryCCC[$i] / $staff_cc15[$i],0,',','.');
                                                    $total += $cc15arryCCC[$i] / $staff_cc15[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc16arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc16arryCCC[$i] != 0 and $staff_cc16[$i] !=0){
                                                    echo number_format($cc16arryCCC[$i] / $staff_cc16[$i],0,',','.');
                                                    $total += $cc16arryCCC[$i] / $staff_cc13[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc18arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc18arryCCC[$i] != 0 and $staff_cc18[$i] !=0){
                                                    echo number_format($cc18arryCCC[$i] / $staff_cc18[$i],0,',','.');
                                                    $total += $cc18arryCCC[$i] / $staff_cc18[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc20arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc20arryCCC[$i] != 0 and $staff_cc20[$i] !=0){
                                                    echo number_format($cc20arryCCC[$i] / $staff_cc20[$i],0,',','.');
                                                    $total += $cc20arryCCC[$i] / $staff_cc20[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc22arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc22arryCCC[$i] != 0 and $staff_cc22[$i] !=0){
                                                    echo number_format($cc22arryCCC[$i] / $staff_cc22[$i],0,',','.');
                                                    $total += $cc22arryCCC[$i] / $staff_cc22[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc23arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc23arryCCC[$i] != 0 and $staff_cc23[$i] !=0){
                                                    echo number_format($cc23arryCCC[$i] / $staff_cc23[$i],0,',','.');
                                                    $total += $cc23arryCCC[$i] / $staff_cc23[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc28arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc28arryCCC[$i] != 0 and $staff_cc28[$i] !=0){
                                                    echo number_format($cc28arryCCC[$i] / $staff_cc28[$i],0,',','.');
                                                    $total += $cc28arryCCC[$i] / $staff_cc28[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc32arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc32arryCCC[$i] != 0 and $staff_cc32[$i] !=0){
                                                    echo number_format($cc32arryCCC[$i] / $staff_cc32[$i],0,',','.');
                                                    $total += $cc32arryCCC[$i] / $staff_cc32[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr>                                         
                                        <?php $total = 0; ?>
                                        <th class="active"><?php echo 'TOTAL'; ?></th>                                        
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>                                       
                                            <th class="active">
                                                <?php 
                                                    $revenue = 0;
                                                    if ($cc01arryCCC[$i] > 0 and $staff_cc01[$i] > 0) 
                                                        $revenue += ($cc01arryCCC[$i] / $staff_cc01[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc03arryCCC[$i] > 0 and  $staff_cc03[$i] > 0)
                                                        $revenue += ($cc03arryCCC[$i] / $staff_cc03[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc06arryCCC[$i] > 0 and $staff_cc06[$i] > 0)
                                                        $revenue += ($cc06arryCCC[$i] / $staff_cc06[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc07arryCCC[$i] > 0 and $staff_cc07[$i] > 0)
                                                        $revenue += ($cc07arryCCC[$i] / $staff_cc07[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc08arryCCC[$i] > 0 and $staff_cc08[$i] > 0)
                                                        $revenue += ($cc08arryCCC[$i] / $staff_cc08[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc11arryCCC[$i] > 0 and $staff_cc11[$i] > 0)
                                                        $revenue += ($cc11arryCCC[$i] / $staff_cc11[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc12arryCCC[$i] > 0 and $staff_cc12[$i] > 0)
                                                        $revenue += ($cc12arryCCC[$i] / $staff_cc12[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if ($cc13arryCCC[$i] > 0 and $staff_cc13[$i] > 0)
                                                        $revenue += ($cc13arryCCC[$i] / $staff_cc13[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc14arryCCC[$i] > 0 and $staff_cc14[$i] > 0)
                                                        $revenue += ($cc14arryCCC[$i] / $staff_cc14[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc15arryCCC[$i] > 0 and $staff_cc15[$i] > 0)
                                                        $revenue += ($cc15arryCCC[$i] / $staff_cc15[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc16arryCCC[$i] > 0 and $staff_cc16[$i] > 0)    
                                                        $revenue += ($cc16arryCCC[$i] / $staff_cc16[$i]);
                                                    else 
                                                        $revenue += 0;
                                                    if($cc18arryCCC[$i] > 0 and $staff_cc18[$i] > 0)
                                                       $revenue += ($cc18arryCCC[$i] / $staff_cc18[$i]); 
                                                    else
                                                        $revenue += 0;
                                                    if($cc20arryCCC[$i] > 0 and $staff_cc20[$i] > 0)    
                                                        $revenue += ($cc20arryCCC[$i] / $staff_cc20[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc22arryCCC[$i] > 0 and $staff_cc22[$i] > 0)
                                                        $revenue += ($cc22arryCCC[$i] / $staff_cc22[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc23arryCCC[$i] > 0 and $staff_cc23[$i] > 0 )
                                                        $revenue += ($cc23arryCCC[$i] / $staff_cc23[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc28arryCCC[$i] > 0 and $staff_cc28[$i] > 0)
                                                        $revenue += ($cc28arryCCC[$i] / $staff_cc28[$i]);
                                                    else
                                                        $revenue += 0;
                                                    if($cc32arryCCC[$i] > 0 and $staff_cc32[$i] > 0)
                                                        $revenue += ($cc32arryCCC[$i] / $staff_cc32[$i]);
                                                    else 
                                                        $revenue += 0;                                                        
                                                                                                       
                                                    //debug($revenue);
                                                    //debug($staff);
                                                    
                                                    if($revenue > 0)
                                                        echo number_format($revenue,0,',','.'); 
                                                    else
                                                        echo '*';
                                                ?>
                                            </th>                                        
                                        <?php } ?>                                        
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
    
    
    <?php $totalyear = 0; ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de receitas - <b> Líquida </b> - Per Capita. <b> Ano: <?php echo $date['year']?></b></h3>
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
                                        <td>
                                            <?php 
                                                if($cc01arryCCC[$i] != 0 and $staff_cc01[$i] !=0){
                                                    echo number_format(($cc01arryCCC[$i]-$cc01arryCCD[$i]) / $staff_cc01[$i],0,',','.');
                                                    $total += ($cc01arryCCC[$i]-$cc01arryCCD[$i]) / $staff_cc01[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc03arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc03arryCCC[$i] != 0 and $staff_cc03[$i] !=0){
                                                    echo number_format(($cc03arryCCC[$i]-$cc03arryCCD[$i]) / $staff_cc03[$i],0,',','.');
                                                    $total += ($cc03arryCCC[$i]-$cc03arryCCD[$i]) / $staff_cc03[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc06arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc06arryCCC[$i] != 0 and $staff_cc06[$i] !=0){
                                                    echo number_format(($cc06arryCCC[$i]-$cc06arryCCD[$i]) / $staff_cc06[$i],0,',','.');
                                                    $total += ($cc06arryCCC[$i]-$cc06arryCCD[$i]) / $staff_cc06[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc07arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc07arryCCC[$i] != 0 and $staff_cc07[$i] !=0){
                                                    echo number_format(($cc07arryCCC[$i]-$cc07arryCCD[$i]) / $staff_cc07[$i],0,',','.');
                                                    $total += ($cc07arryCCC[$i]-$cc07arryCCD[$i]) / $staff_cc07[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc08arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc08arryCCC[$i] != 0 and $staff_cc08[$i] !=0){
                                                    echo number_format(($cc08arryCCC[$i]-$cc08arryCCD[$i]) / $staff_cc08[$i],0,',','.');
                                                    $total += ($cc08arryCCC[$i]-$cc08arryCCD[$i]) / $staff_cc08[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc11arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc11arryCCC[$i] != 0 and $staff_cc11[$i] !=0){
                                                    echo number_format(($cc11arryCCC[$i]-$cc11arryCCD[$i]) / $staff_cc11[$i],0,',','.');
                                                    $total += ($cc11arryCCC[$i]-$cc11arryCCD[$i]) / $staff_cc11[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc12arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc12arryCCC[$i] != 0 and $staff_cc12[$i] !=0){
                                                    echo number_format(($cc12arryCCC[$i]-$cc12arryCCD[$i]) / $staff_cc12[$i],0,',','.');
                                                    $total += ($cc12arryCCC[$i]-$cc12arryCCD[$i]) / $staff_cc12[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc13arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc13arryCCC[$i] != 0 and $staff_cc13[$i] !=0){
                                                    echo number_format(($cc13arryCCC[$i]-$cc13arryCCD[$i]) / $staff_cc13[$i],0,',','.');
                                                    $total += ($cc13arryCCC[$i]-$cc13arryCCD[$i]) / $staff_cc13[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc14arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc14arryCCC[$i] != 0 and $staff_cc14[$i] !=0){
                                                    echo number_format(($cc14arryCCC[$i]-$cc14arryCCD[$i]) / $staff_cc14[$i],0,',','.');
                                                    $total += ($cc14arryCCC[$i]-$cc14arryCCD[$i]) / $staff_cc14[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc15arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc15arryCCC[$i] != 0 and $staff_cc15[$i] !=0){
                                                    echo number_format(($cc15arryCCC[$i]-$cc15arryCCD[$i]) / $staff_cc15[$i],0,',','.');
                                                    $total += ($cc15arryCCC[$i]-$cc15arryCCD[$i]) / $staff_cc15[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc16arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc16arryCCC[$i] != 0 and $staff_cc16[$i] !=0){
                                                    echo number_format(($cc16arryCCC[$i]-$cc16arryCCD[$i]) / $staff_cc16[$i],0,',','.');
                                                    $total += ($cc16arryCCC[$i]-$cc16arryCCD[$i]) / $staff_cc16[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr>
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc18arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc18arryCCC[$i] != 0 and $staff_cc18[$i] !=0){
                                                    echo number_format(($cc18arryCCC[$i]-$cc18arryCCD[$i]) / $staff_cc18[$i],0,',','.');
                                                    $total += ($cc18arryCCC[$i]-$cc18arryCCD[$i]) / $staff_cc18[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc20arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc20arryCCC[$i] != 0 and $staff_cc20[$i] !=0){
                                                    echo number_format(($cc20arryCCC[$i]-$cc20arryCCD[$i]) / $staff_cc20[$i],0,',','.');
                                                    $total += ($cc20arryCCC[$i]-$cc20arryCCD[$i]) / $staff_cc20[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc22arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc22arryCCC[$i] != 0 and $staff_cc22[$i] !=0){
                                                    echo number_format(($cc22arryCCC[$i]-$cc22arryCCD[$i]) / $staff_cc22[$i],0,',','.');
                                                    $total += ($cc22arryCCC[$i]-$cc22arryCCD[$i]) / $staff_cc22[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc23arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc23arryCCC[$i] != 0 and $staff_cc23[$i] !=0){
                                                    echo number_format(($cc23arryCCC[$i]-$cc23arryCCD[$i]) / $staff_cc23[$i],0,',','.');
                                                    $total += ($cc23arryCCC[$i]-$cc23arryCCD[$i]) / $staff_cc23[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc28arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc28arryCCC[$i] != 0 and $staff_cc28[$i] !=0){
                                                    echo number_format(($cc28arryCCC[$i]-$cc28arryCCD[$i]) / $staff_cc28[$i],0,',','.');
                                                    $total += ($cc28arryCCC[$i]-$cc28arryCCD[$i]) / $staff_cc28[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr> 
                                        <?php $total = 0; ?>
                                        <th><?php echo $cc32arryCCC[0]; ?></th>
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                                        <td>
                                            <?php 
                                                if($cc32arryCCC[$i] != 0 and $staff_cc32[$i] !=0){
                                                    echo number_format(($cc32arryCCC[$i]-$cc32arryCCD[$i]) / $staff_cc32[$i],0,',','.');
                                                    $total += ($cc32arryCCC[$i]-$cc32arryCCD[$i]) / $staff_cc32[$i];
                                                }else{
                                                    echo '*';
                                                    $total += 0;
                                                }
                                            } //chave do for?>
                                        </td>                                        
                                        <th class="active"><?php echo number_format($total,0,',','.'); ?></th>
                                        <?php $totalyear += $total;  ?>
                                    </tr> 
                                    
                                    <tr>                                         
                                        <?php $total = 0; ?>
                                        <th class="active"><?php echo 'TOTAL'; ?></th>                                        
                                        <?php for ($i = 1; $i <= 12; $i++) { ?>                                       
                                            <th class="active">
                                                <?php 
                                                    $revenue = 0;
                                                    if ($cc01arryCCC[$i] > 0 and $staff_cc01[$i] > 0) 
                                                        $revenue += ($cc01arryCCC[$i]-$cc01arryCCD[$i]) / $staff_cc01[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc03arryCCC[$i] > 0 and  $staff_cc03[$i] > 0)
                                                        $revenue += ($cc03arryCCC[$i]-$cc03arryCCD[$i]) / $staff_cc03[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc06arryCCC[$i] > 0 and $staff_cc06[$i] > 0)
                                                        $revenue += ($cc06arryCCC[$i]-$cc06arryCCD[$i]) / $staff_cc06[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc07arryCCC[$i] > 0 and $staff_cc07[$i] > 0)
                                                        $revenue += ($cc07arryCCC[$i]-$cc07arryCCD[$i]) / $staff_cc07[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc08arryCCC[$i] > 0 and $staff_cc08[$i] > 0)
                                                        $revenue += ($cc08arryCCC[$i]-$cc08arryCCD[$i]) / $staff_cc08[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc11arryCCC[$i] > 0 and $staff_cc11[$i] > 0)
                                                        $revenue += ($cc11arryCCC[$i]-$cc11arryCCD[$i]) / $staff_cc11[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc12arryCCC[$i] > 0 and $staff_cc12[$i] > 0)
                                                        $revenue += ($cc12arryCCC[$i]-$cc12arryCCD[$i]) / $staff_cc12[$i];
                                                    else
                                                        $revenue += 0;
                                                    if ($cc13arryCCC[$i] > 0 and $staff_cc13[$i] > 0)
                                                        $revenue += ($cc13arryCCC[$i]-$cc13arryCCD[$i]) / $staff_cc13[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc14arryCCC[$i] > 0 and $staff_cc14[$i] > 0)
                                                        $revenue += ($cc14arryCCC[$i]-$cc14arryCCD[$i]) / $staff_cc14[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc15arryCCC[$i] > 0 and $staff_cc15[$i] > 0)
                                                        $revenue += ($cc15arryCCC[$i]-$cc15arryCCD[$i]) / $staff_cc15[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc16arryCCC[$i] > 0 and $staff_cc16[$i] > 0)    
                                                        $revenue += ($cc16arryCCC[$i]-$cc16arryCCD[$i]) / $staff_cc16[$i];
                                                    else 
                                                        $revenue += 0;
                                                    if($cc18arryCCC[$i] > 0 and $staff_cc18[$i] > 0)
                                                       $revenue += ($cc18arryCCC[$i]-$cc18arryCCD[$i]) / $staff_cc18[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc20arryCCC[$i] > 0 and $staff_cc20[$i] > 0)    
                                                        $revenue += ($cc20arryCCC[$i]-$cc20arryCCD[$i]) / $staff_cc20[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc22arryCCC[$i] > 0 and $staff_cc22[$i] > 0)
                                                        $revenue += ($cc22arryCCC[$i]-$cc22arryCCD[$i]) / $staff_cc22[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc23arryCCC[$i] > 0 and $staff_cc23[$i] > 0 )
                                                        $revenue += ($cc23arryCCC[$i]-$cc23arryCCD[$i]) / $staff_cc23[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc28arryCCC[$i] > 0 and $staff_cc28[$i] > 0)
                                                        $revenue += ($cc28arryCCC[$i]-$cc28arryCCD[$i]) / $staff_cc28[$i];
                                                    else
                                                        $revenue += 0;
                                                    if($cc32arryCCC[$i] > 0 and $staff_cc32[$i] > 0)
                                                        $revenue += ($cc32arryCCC[$i]-$cc32arryCCD[$i]) / $staff_cc32[$i];
                                                    else 
                                                        $revenue += 0;                                                        
                                                                                                       
                                                    //debug($revenue);
                                                    //debug($staff);
                                                    
                                                    if($revenue > 0)
                                                        echo number_format($revenue,0,',','.'); 
                                                    else
                                                        echo '*';
                                                ?>
                                            </th>                                        
                                        <?php } ?>                                        
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


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

$naturezas = ['Proventos', 'Pro-Labore', 'Hora Extra', 'Bolsa Estágio', 'Premios e Gratificações'
            , 'Encargos Sociais', 'Alimentação', 'Transporte de pessoal', 'Assistência Médica', 'Materiais de Segurança'
            , 'Cursos e Treinamentos', 'Outras Despesas'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Mai', 'Abr', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

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

?>


<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Despesas com pessoal</small>
    </h1>      
</section>

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
                                            $x = null;
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'PersonnelExpensesFilter']]);
                                            echo $this->Form->input('year', ['default' => '2017' ,'disabled' => FALSE,'label'=>' ']);
                                        ?>
                                    </div> 
                                    <div class="col-md-4"></div>
                                    
                                </fieldset>  
                                <div align="center">
                                    <?= $this->Form->button(__('Refinar')) ?>
                                </div>
                                
                                <?php echo $this->Form->end();   ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Ações relacionadas:</b></h3>
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
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <?php
                                            $x = null;
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'PersonnelExpensesPdf']]);
                                            echo $this->Form->input('yearPdf', ['default' => '2017' ,'disabled' => FALSE,'label'=>'Informe o ano desejado:']);
                                            echo $this->Form->input('ccPdf', ['id' => 'ccPdf', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']); 
                                        ?>
                                    </div> 
                                    <div class="col-md-3"></div>                                    
                                </fieldset>  
                                <div align="center">
                                    <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Gerar Relatório'); ?></button>
                                </div>
                                
                                <?php echo $this->Form->end();   ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    
    <div class="row">
        
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Despesas com pessoal:</h3>
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
                    
                    <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" align="center">
                                <?php echo $this->Form->input('cc', ['id' => 'cc', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']); ?>
                            </div>
                            <div class="col-md-4"></div>

                            
                       </div>
                        
                        <div align="right">
                                <a id="btnExport" onclick="fnExcelReport()" class="btn btn-primary" type=""><?php echo __('Gerar Excel'); ?></a>
                            </div>
                    
                    <table id="example1" class="table table-bordered table-hover">
                        
                        <theader>
                            <tr>           
                                <th>Naturezas</th>
                                <?php foreach ($monthsLabels as $key => $value): ?>
                                    <th><?php echo $value; ?></th>
                                <?php endforeach ?>  
                                <th>Total</th>
                            </tr>                            
                        </theader>
                        <tbody>
                            <tr>
                                <th><?php echo $naturezas[0]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($earningsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($earningsMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[1] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($prolaboreMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($prolaboreMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[2] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($extraHoursMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($extraHoursMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[3] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($internshipBagMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($internshipBagMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[4] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($prizesAndGratuitiesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($prizesAndGratuitiesMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[5] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($socialChargesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($socialChargesMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[6] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($feedingMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($feedingMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[7] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($transportMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($transportMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[8] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($medicalMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($medicalMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[9] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($safetyEquipmentMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($safetyEquipmentMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[10] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($coursesAndTrainingMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($coursesAndTrainingMonths[12],0,',','.');; ?></th>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[11] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($outehsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($outehsMonths[12],0,',','.');; ?></th>                                
                            </tr>
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format($earningsMonths[$i] + $prolaboreMonths[$i] + $extraHoursMonths[$i] +
                                                                    $internshipBagMonths[$i] + $prizesAndGratuitiesMonths[$i] + $socialChargesMonths[$i] +
                                                                        $feedingMonths[$i] + $transportMonths[$i] + $medicalMonths[$i] + $safetyEquipmentMonths[$i] + 
                                                                            $coursesAndTrainingMonths[$i] + $outehsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($earningsMonths[12] + $prolaboreMonths[12] + $extraHoursMonths[12] + $internshipBagMonths[12] +
                                                                $prizesAndGratuitiesMonths[12] + $socialChargesMonths[12] + $feedingMonths[12] + 
                                                                    $transportMonths[12] + $medicalMonths[12] + $safetyEquipmentMonths[12] + 
                                                                        $coursesAndTrainingMonths[12] + $outehsMonths[12],0,',','.'); ?></th>                                
                            </tr>
                            
                        </tbody>
                    </table>
                                      
                </div>
            </div>
        </div>
        
    </div>
    
    
    
    

    
    
    
    <div class="row">
        
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Despesas com pessoal Per Capita:</h3>
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
                    
                    <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" align="center">
                                <?php echo $this->Form->input('cc', ['id' => 'ccPerCapito', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']); ?>
                            </div>
                            <div class="col-md-4"></div>

                            
                       </div>
                        
                        <div align="right">
                                <a id="btnExport" onclick="fnExcelReport()2" class="btn btn-primary" type=""><?php echo __('Gerar Excel'); ?></a>
                            </div>
                    
                    <table id="example2" class="table table-bordered table-hover">
                        
                        <theader>
                            <tr>           
                                <th>Naturezas</th>
                                <?php foreach ($monthsLabels as $key => $value): ?>
                                    <th><?php echo $value; ?></th>
                                <?php endforeach ?>  
                                <th>Total</th>
                            </tr>                            
                        </theader>
                        <tbody>
                            <tr>
                                <th><?php echo $naturezas[0]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($earningsMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($earningsMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($earningsMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($earningsMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[1] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($prolaboreMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($prolaboreMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($prolaboreMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($prolaboreMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[2] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($extraHoursMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($extraHoursMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($extraHoursMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($extraHoursMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[3] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($internshipBagMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($internshipBagMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($internshipBagMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($internshipBagMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[4] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($prizesAndGratuitiesMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($prizesAndGratuitiesMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($prizesAndGratuitiesMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($prizesAndGratuitiesMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[5] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($socialChargesMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($socialChargesMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($socialChargesMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($socialChargesMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[6] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($feedingMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($feedingMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($feedingMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($feedingMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[7] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($transportMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($transportMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($transportMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($transportMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[8] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($medicalMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($medicalMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($medicalMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($medicalMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[9] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($safetyEquipmentMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($safetyEquipmentMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($safetyEquipmentMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($safetyEquipmentMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[10] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($coursesAndTrainingMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($coursesAndTrainingMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($coursesAndTrainingMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($coursesAndTrainingMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th><?php echo $naturezas[11] ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <?php if($outehsMonths[$i] > 0 and $staff_year[$i] > 0){ ?>
                                        <td> <?php echo number_format($outehsMonths[$i]/$staff_year[$i],0,',','.'); ?> </td>
                                    <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php }} ?>
                                <?php if($outehsMonths[12] > 0 and $staff_year[12] > 0){ ?>
                                    <th><?php echo number_format($outehsMonths[12]/$staff_year[12],0,',','.'); ?></th>
                                <?php }else{ ?>
                                        <td> <?php echo '*'; ?> </td>
                                <?php } ?>                               
                            </tr>
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format(($earningsMonths[$i] + $prolaboreMonths[$i] + $extraHoursMonths[$i] +
                                                                    $internshipBagMonths[$i] + $prizesAndGratuitiesMonths[$i] + $socialChargesMonths[$i] +
                                                                        $feedingMonths[$i] + $transportMonths[$i] + $medicalMonths[$i] + $safetyEquipmentMonths[$i] + 
                                                                            $coursesAndTrainingMonths[$i] + $outehsMonths[$i])/$staff_year[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format(($earningsMonths[12] + $prolaboreMonths[12] + $extraHoursMonths[12] + $internshipBagMonths[12] +
                                                                $prizesAndGratuitiesMonths[12] + $socialChargesMonths[12] + $feedingMonths[12] + 
                                                                    $transportMonths[12] + $medicalMonths[12] + $safetyEquipmentMonths[12] + 
                                                                        $coursesAndTrainingMonths[12] + $outehsMonths[12]) / $staff_year[12],0,',','.'); ?></th>                                
                            </tr>
                            
                        </tbody>
                    </table>
                                      
                </div>
            </div>
        </div>
        
    </div>
</section>


<?php $this->start('scriptBotton'); ?>
<script>
    
Number.prototype.formatMoney = function(c, d, t){
    var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
    
    $("#cc").change(function() { 
        
        document.getElementById('ccPdf').value = document.getElementById('cc').value;      
          
        var outehs = JSON.parse( '<?php echo json_encode($outehs) ?>' );
        var coursesAndTraining = JSON.parse( '<?php echo json_encode($coursesAndTraining) ?>' );
        var safetyEquipment = JSON.parse( '<?php echo json_encode($safetyEquipment) ?>' );
        var medical = JSON.parse( '<?php echo json_encode($medical) ?>' );
        var transport = JSON.parse( '<?php echo json_encode($transport) ?>' );
        var feeding = JSON.parse( '<?php echo json_encode($feeding) ?>' );
        var socialCharges = JSON.parse( '<?php echo json_encode($socialCharges) ?>' );
        var prizesAndGratuities = JSON.parse( '<?php echo json_encode($prizesAndGratuities) ?>' );
        var internshipBag = JSON.parse( '<?php echo json_encode($internshipBag) ?>' );
        var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );
        var prolabore = JSON.parse( '<?php echo json_encode($prolabore) ?>' );
        var earnings = JSON.parse( '<?php echo json_encode($earnings) ?>' );
        
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;        
        var cc = document.getElementById('cc').value;
        
        //proventos
        earningsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < earnings.length; x++){
                    if (monthsNumbers[i] === earnings[x].CT2_DATA && earnings[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(earnings[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                earningsMonths.push(valor);
            }else{
                for(var x = 0; x < earnings.length; x++){
                if (monthsNumbers[i] === earnings[x].CT2_DATA){
                    var aux = parseFloat(earnings[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                earningsMonths.push(valor);
            }
        }
        earningsMonths.push(valorTotal);
        
        //prolabore
        prolaboreMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < prolabore.length; x++){
                    if (monthsNumbers[i] === prolabore[x].CT2_DATA && prolabore[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(prolabore[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prolaboreMonths.push(valor);
            }else{
                for(var x = 0; x < prolabore.length; x++){
                    if (monthsNumbers[i] === prolabore[x].CT2_DATA){
                        var aux = parseFloat(prolabore[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prolaboreMonths.push(valor);
            }
        }
        prolaboreMonths.push(valorTotal);
        
        //hora extra
        extraHourMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < extraHour.length; x++){
                    if (monthsNumbers[i] === extraHour[x].CT2_DATA && extraHour[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(extraHour[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                extraHourMonths.push(valor);
            }else{
                for(var x = 0; x < extraHour.length; x++){
                    if (monthsNumbers[i] === extraHour[x].CT2_DATA){
                        var aux = parseFloat(extraHour[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                extraHourMonths.push(valor);
            }
        }
        extraHourMonths.push(valorTotal);
        
        //bolsa estagio
        internshipBagMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < internshipBag.length; x++){
                    if (monthsNumbers[i] === internshipBag[x].CT2_DATA && internshipBag[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(internshipBag[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                internshipBagMonths.push(valor);
            }else{
                for(var x = 0; x < internshipBag.length; x++){
                    if (monthsNumbers[i] === internshipBag[x].CT2_DATA){
                        var aux = parseFloat(internshipBag[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                internshipBagMonths.push(valor);
            }
        }
        internshipBagMonths.push(valorTotal);
        
        // gratificações e  premios
        prizesAndGratuitiesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < prizesAndGratuities.length; x++){
                    if (monthsNumbers[i] === prizesAndGratuities[x].CT2_DATA && prizesAndGratuities[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(prizesAndGratuities[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prizesAndGratuitiesMonths.push(valor);
            }else{
                for(var x = 0; x < prizesAndGratuities.length; x++){
                    if (monthsNumbers[i] === prizesAndGratuities[x].CT2_DATA){
                        var aux = parseFloat(prizesAndGratuities[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prizesAndGratuitiesMonths.push(valor);
            }
        }
        prizesAndGratuitiesMonths.push(valorTotal);
        
        //encargos socias 
        socialChargesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < socialCharges.length; x++){
                    if (monthsNumbers[i] === socialCharges[x].CT2_DATA && socialCharges[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(socialCharges[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                socialChargesMonths.push(valor);
            }else{
                for(var x = 0; x < socialCharges.length; x++){
                    if (monthsNumbers[i] === socialCharges[x].CT2_DATA){
                        var aux = parseFloat(socialCharges[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                socialChargesMonths.push(valor);
            }
        }
        socialChargesMonths.push(valorTotal);
        
        //aliemntação
        feedingMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < feeding.length; x++){
                    if (monthsNumbers[i] === feeding[x].CT2_DATA && feeding[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(feeding[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                feedingMonths.push(valor);
            }else{
                for(var x = 0; x < feeding.length; x++){
                    if (monthsNumbers[i] === feeding[x].CT2_DATA){
                        var aux = parseFloat(feeding[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                feedingMonths.push(valor);
            }
        }
        feedingMonths.push(valorTotal);
        
        //transporte        
        transportMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < transport.length; x++){
                    if (monthsNumbers[i] === transport[x].CT2_DATA && transport[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(transport[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                transportMonths.push(valor);
            }else{
                for(var x = 0; x < transport.length; x++){
                    if (monthsNumbers[i] === transport[x].CT2_DATA){
                        var aux = parseFloat(transport[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                transportMonths.push(valor);
            }
        }
        transportMonths.push(valorTotal);
        
        //assistencia medica
        medicalMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < medical.length; x++){
                    if (monthsNumbers[i] === medical[x].CT2_DATA && medical[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(medical[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                medicalMonths.push(valor);
            }else{
                for(var x = 0; x < medical.length; x++){
                    if (monthsNumbers[i] === medical[x].CT2_DATA){
                        var aux = parseFloat(medical[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                medicalMonths.push(valor);
            }
        }
        medicalMonths.push(valorTotal);
        
        //materias de segurança
        safetyEquipmentMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < safetyEquipment.length; x++){
                    if (monthsNumbers[i] === safetyEquipment[x].CT2_DATA && safetyEquipment[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(safetyEquipment[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                safetyEquipmentMonths.push(valor);
            }else{
                for(var x = 0; x < safetyEquipment.length; x++){
                    if (monthsNumbers[i] === safetyEquipment[x].CT2_DATA){
                        var aux = parseFloat(safetyEquipment[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                safetyEquipmentMonths.push(valor);
            }
        }
        safetyEquipmentMonths.push(valorTotal);   
        
        //cursos e treinamentos
        coursesAndTrainingMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < coursesAndTraining.length; x++){
                    if (monthsNumbers[i] === coursesAndTraining[x].CT2_DATA && coursesAndTraining[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(coursesAndTraining[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                coursesAndTrainingMonths.push(valor);
            }else{
                for(var x = 0; x < coursesAndTraining.length; x++){
                    if (monthsNumbers[i] === coursesAndTraining[x].CT2_DATA){
                        var aux = parseFloat(coursesAndTraining[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                coursesAndTrainingMonths.push(valor);
            }
        }
        coursesAndTrainingMonths.push(valorTotal);
        
        // ouytras despesas
        outehsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < outehs.length; x++){
                    if (monthsNumbers[i] === outehs[x].CT2_DATA && outehs[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(outehs[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                outehsMonths.push(valor);
            }else{
                for(var x = 0; x < outehs.length; x++){
                    if (monthsNumbers[i] === outehs[x].CT2_DATA){
                        var aux = parseFloat(outehs[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                outehsMonths.push(valor);
            }
        }
        outehsMonths.push(valorTotal);
        
        html = '';                
        html += '<table id="example1" class="table table-bordered table-hover">';
        html += '<theader>';
        html += '<tr>';
        html += '<th>Naturezas</th>';
        for(var x = 0; x < monthsLabels.length; x++){
             html += '<th>'+ monthsLabels[x] +'</th>';
        } 
        html += '<th>Total</th>';
        html += '</tr>';                            
        html += '</theader>';
        html += '<tbody>';
        
        html += '<tr>';
        html += '<th>'+naturezas[0]+'</th>';
        for(var x = 0; x < earningsMonths.length -1; x++){
             html += '<td>'+ earningsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+earningsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < prolaboreMonths.length -1; x++){
             html += '<td>'+ prolaboreMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+prolaboreMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < extraHourMonths.length -1; x++){
             html += '<td>'+ extraHourMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+extraHourMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[3]+'</th>';
        for(var x = 0; x < internshipBagMonths.length -1; x++){
             html += '<td>'+ internshipBagMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+internshipBagMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[4]+'</th>';
        for(var x = 0; x < prizesAndGratuitiesMonths.length -1; x++){
             html += '<td>'+ prizesAndGratuitiesMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+prizesAndGratuitiesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[5]+'</th>';
        for(var x = 0; x < socialChargesMonths.length -1; x++){
             html += '<td>'+ socialChargesMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+socialChargesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[6]+'</th>';
        for(var x = 0; x < feedingMonths.length -1; x++){
             html += '<td>'+ feedingMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+feedingMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[7]+'</th>';
        for(var x = 0; x < transportMonths.length -1; x++){
             html += '<td>'+ transportMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+transportMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[7]+'</th>';
        for(var x = 0; x < medicalMonths.length -1; x++){
             html += '<td>'+ medicalMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+medicalMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[8]+'</th>';
        for(var x = 0; x < safetyEquipmentMonths.length -1; x++){
             html += '<td>'+ safetyEquipmentMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+safetyEquipmentMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[9]+'</th>';
        for(var x = 0; x < coursesAndTrainingMonths.length -1; x++){
             html += '<td>'+ coursesAndTrainingMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+coursesAndTrainingMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[10]+'</th>';
        for(var x = 0; x < outehsMonths.length -1; x++){
             html += '<td>'+ outehsMonths[x].formatMoney(0, ',', '.') +'</td>';
        }
        html += '<th>'+outehsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = earningsMonths[i] + prolaboreMonths[i] + extraHourMonths[i] +
                            internshipBagMonths[i] + prizesAndGratuitiesMonths[i] + socialChargesMonths[i] +
                                feedingMonths[i] + transportMonths[i] + medicalMonths[i] + safetyEquipmentMonths[i] + 
                                    coursesAndTrainingMonths[i] + outehsMonths[i] ;
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = earningsMonths[12] + prolaboreMonths[12] + extraHourMonths[12] +
                        internshipBagMonths[12] + prizesAndGratuitiesMonths[12] + socialChargesMonths[12] +
                            feedingMonths[12] + transportMonths[12] + medicalMonths[12] + safetyEquipmentMonths[12] + 
                                coursesAndTrainingMonths[12] + outehsMonths[12];
        html += '<th>'+valorAnual.formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        
        html += '</tbody>';
        html += '</table>';
        document.getElementById("example1").innerHTML = html;
    });
    
    
    $("#ccPerCapito").change(function() { 
        
        document.getElementById('ccPdf').value = document.getElementById('ccPerCapito').value; 
                  
        var outehs = JSON.parse( '<?php echo json_encode($outehs) ?>' );
        var coursesAndTraining = JSON.parse( '<?php echo json_encode($coursesAndTraining) ?>' );
        var safetyEquipment = JSON.parse( '<?php echo json_encode($safetyEquipment) ?>' );
        var medical = JSON.parse( '<?php echo json_encode($medical) ?>' );
        var transport = JSON.parse( '<?php echo json_encode($transport) ?>' );
        var feeding = JSON.parse( '<?php echo json_encode($feeding) ?>' );
        var socialCharges = JSON.parse( '<?php echo json_encode($socialCharges) ?>' );
        var prizesAndGratuities = JSON.parse( '<?php echo json_encode($prizesAndGratuities) ?>' );
        var internshipBag = JSON.parse( '<?php echo json_encode($internshipBag) ?>' );
        var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );
        var prolabore = JSON.parse( '<?php echo json_encode($prolabore) ?>' );
        var earnings = JSON.parse( '<?php echo json_encode($earnings) ?>' );
        
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;     
        
        var cc = document.getElementById('ccPdf').value;
        
        var staffPerMonth = JSON.parse( '<?php echo json_encode($staffPerMonth) ?>' );
        
        if(cc != 'TODOS'){
            
            staff_year = [];
            staff_year_total = 0;
            for (x = 0; x < monthsNumbers.length; x++) {
                quant = 0;
                for (i = 0; i < staffPerMonth.length; i++) {
                    if (staffPerMonth[i].RD_DATARQ.substr(4,4) === monthsNumbers[x] && cc.substring(0,2) === staffPerMonth[i].RD_CC.substring(0,2)) {
                        var aux = parseFloat(staffPerMonth[i].CONT);
                        quant += aux;
                        staff_year_total += aux;
                    }
                } 
                staff_year.push(quant);
            }
            staff_year.push(staff_year_total);
        }else{
            
            staff_year = [];
            staff_year_total = 0;
            for (x = 0; x < monthsNumbers.length; x++) {
                quant = 0;
                for (i = 0; i < staffPerMonth.length; i++) {
                    if (staffPerMonth[i].RD_DATARQ.substr(4,4) === monthsNumbers[x]) {
                        var aux = parseFloat(staffPerMonth[i].CONT);
                        quant += aux;
                        staff_year_total += aux;
                    }
                } 
                staff_year.push(quant);
            }
            staff_year.push(staff_year_total);            
        }
        
        //proventos
        earningsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < earnings.length; x++){
                   
                    if (monthsNumbers[i] === earnings[x].CT2_DATA && earnings[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(earnings[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                earningsMonths.push(valor);
            }else{
                for(var x = 0; x < earnings.length; x++){
                if (monthsNumbers[i] === earnings[x].CT2_DATA){
                    var aux = parseFloat(earnings[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                earningsMonths.push(valor);
            }
        }
        earningsMonths.push(valorTotal);
        
        //prolabore
        prolaboreMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < prolabore.length; x++){
                    if (monthsNumbers[i] === prolabore[x].CT2_DATA && prolabore[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(prolabore[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prolaboreMonths.push(valor);
            }else{
                for(var x = 0; x < prolabore.length; x++){
                    if (monthsNumbers[i] === prolabore[x].CT2_DATA){
                        var aux = parseFloat(prolabore[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prolaboreMonths.push(valor);
            }
        }
        prolaboreMonths.push(valorTotal);
        
        //hora extra
        extraHourMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < extraHour.length; x++){
                    if (monthsNumbers[i] === extraHour[x].CT2_DATA && extraHour[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(extraHour[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                extraHourMonths.push(valor);
            }else{
                for(var x = 0; x < extraHour.length; x++){
                    if (monthsNumbers[i] === extraHour[x].CT2_DATA){
                        var aux = parseFloat(extraHour[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                extraHourMonths.push(valor);
            }
        }
        extraHourMonths.push(valorTotal);
        
        //bolsa estagio
        internshipBagMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < internshipBag.length; x++){
                    if (monthsNumbers[i] === internshipBag[x].CT2_DATA && internshipBag[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(internshipBag[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                internshipBagMonths.push(valor);
            }else{
                for(var x = 0; x < internshipBag.length; x++){
                    if (monthsNumbers[i] === internshipBag[x].CT2_DATA){
                        var aux = parseFloat(internshipBag[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                internshipBagMonths.push(valor);
            }
        }
        internshipBagMonths.push(valorTotal);
        
        // gratificações e  premios
        prizesAndGratuitiesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < prizesAndGratuities.length; x++){
                    if (monthsNumbers[i] === prizesAndGratuities[x].CT2_DATA && prizesAndGratuities[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(prizesAndGratuities[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prizesAndGratuitiesMonths.push(valor);
            }else{
                for(var x = 0; x < prizesAndGratuities.length; x++){
                    if (monthsNumbers[i] === prizesAndGratuities[x].CT2_DATA){
                        var aux = parseFloat(prizesAndGratuities[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                prizesAndGratuitiesMonths.push(valor);
            }
        }
        prizesAndGratuitiesMonths.push(valorTotal);
        
        //encargos socias 
        socialChargesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < socialCharges.length; x++){
                    if (monthsNumbers[i] === socialCharges[x].CT2_DATA && socialCharges[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(socialCharges[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                socialChargesMonths.push(valor);
            }else{
                for(var x = 0; x < socialCharges.length; x++){
                    if (monthsNumbers[i] === socialCharges[x].CT2_DATA){
                        var aux = parseFloat(socialCharges[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                socialChargesMonths.push(valor);
            }
        }
        socialChargesMonths.push(valorTotal);
        
        //aliemntação
        feedingMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < feeding.length; x++){
                    if (monthsNumbers[i] === feeding[x].CT2_DATA && feeding[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(feeding[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                feedingMonths.push(valor);
            }else{
                for(var x = 0; x < feeding.length; x++){
                    if (monthsNumbers[i] === feeding[x].CT2_DATA){
                        var aux = parseFloat(feeding[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                feedingMonths.push(valor);
            }
        }
        feedingMonths.push(valorTotal);
        
        //transporte        
        transportMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < transport.length; x++){
                    if (monthsNumbers[i] === transport[x].CT2_DATA && transport[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(transport[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                transportMonths.push(valor);
            }else{
                for(var x = 0; x < transport.length; x++){
                    if (monthsNumbers[i] === transport[x].CT2_DATA){
                        var aux = parseFloat(transport[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                transportMonths.push(valor);
            }
        }
        transportMonths.push(valorTotal);
        
        //assistencia medica
        medicalMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < medical.length; x++){
                    if (monthsNumbers[i] === medical[x].CT2_DATA && medical[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(medical[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                medicalMonths.push(valor);
            }else{
                for(var x = 0; x < medical.length; x++){
                    if (monthsNumbers[i] === medical[x].CT2_DATA){
                        var aux = parseFloat(medical[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                medicalMonths.push(valor);
            }
        }
        medicalMonths.push(valorTotal);
        
        //materias de segurança
        safetyEquipmentMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < safetyEquipment.length; x++){
                    if (monthsNumbers[i] === safetyEquipment[x].CT2_DATA && safetyEquipment[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(safetyEquipment[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                safetyEquipmentMonths.push(valor);
            }else{
                for(var x = 0; x < safetyEquipment.length; x++){
                    if (monthsNumbers[i] === safetyEquipment[x].CT2_DATA){
                        var aux = parseFloat(safetyEquipment[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                safetyEquipmentMonths.push(valor);
            }
        }
        safetyEquipmentMonths.push(valorTotal);   
        
        //cursos e treinamentos
        coursesAndTrainingMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < coursesAndTraining.length; x++){
                    if (monthsNumbers[i] === coursesAndTraining[x].CT2_DATA && coursesAndTraining[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(coursesAndTraining[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                coursesAndTrainingMonths.push(valor);
            }else{
                for(var x = 0; x < coursesAndTraining.length; x++){
                    if (monthsNumbers[i] === coursesAndTraining[x].CT2_DATA){
                        var aux = parseFloat(coursesAndTraining[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                coursesAndTrainingMonths.push(valor);
            }
        }
        coursesAndTrainingMonths.push(valorTotal);
        
        // ouytras despesas
        outehsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < outehs.length; x++){
                    if (monthsNumbers[i] === outehs[x].CT2_DATA && outehs[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(outehs[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                outehsMonths.push(valor);
            }else{
                for(var x = 0; x < outehs.length; x++){
                    if (monthsNumbers[i] === outehs[x].CT2_DATA){
                        var aux = parseFloat(outehs[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                outehsMonths.push(valor);
            }
        }
        outehsMonths.push(valorTotal);
        
        html = '';                
        html += '<table id="example2" class="table table-bordered table-hover">';
        html += '<theader>';
        html += '<tr>';
        html += '<th>Naturezas</th>';
        for(var x = 0; x < monthsLabels.length; x++){
             html += '<th>'+ monthsLabels[x] +'</th>';
        } 
        html += '<th>Total</th>';
        html += '</tr>';                            
        html += '</theader>';
        html += '<tbody>';
        
        html += '<tr>';
        html += '<th>'+naturezas[0]+'</th>';
        for(var x = 0; x < earningsMonths.length -1; x++){
            
            if (earningsMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (earningsMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(earningsMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(earningsMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < prolaboreMonths.length -1; x++){
            
            if (prolaboreMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (prolaboreMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(prolaboreMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(prolaboreMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < prolaboreMonths.length -1; x++){
            
            if (extraHourMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (extraHourMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(extraHourMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(extraHourMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[3]+'</th>';
        for(var x = 0; x < internshipBagMonths.length -1; x++){
            
            if (internshipBagMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (internshipBagMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(internshipBagMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(internshipBagMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[4]+'</th>';
        for(var x = 0; x < prizesAndGratuitiesMonths.length -1; x++){
            
            if (prizesAndGratuitiesMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (prizesAndGratuitiesMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(prizesAndGratuitiesMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(prizesAndGratuitiesMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';        
        
        html += '<tr>';
        html += '<th>'+naturezas[5]+'</th>';
        for(var x = 0; x < socialChargesMonths.length -1; x++){
            
            if (socialChargesMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (socialChargesMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(socialChargesMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(socialChargesMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';        
        
        html += '<tr>';
        html += '<th>'+naturezas[6]+'</th>';
        for(var x = 0; x < feedingMonths.length -1; x++){
            
            if (feedingMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (feedingMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(feedingMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(feedingMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>'; 
        
        html += '<tr>';
        html += '<th>'+naturezas[7]+'</th>';
        for(var x = 0; x < transportMonths.length -1; x++){
            
            if (transportMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (transportMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(transportMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(transportMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>'; 
        
        
        html += '<tr>';
        html += '<th>'+naturezas[8]+'</th>';
        for(var x = 0; x < medicalMonths.length -1; x++){
            
            if (medicalMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (medicalMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(medicalMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(medicalMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
                
        html += '<tr>';
        html += '<th>'+naturezas[9]+'</th>';
        for(var x = 0; x < safetyEquipmentMonths.length -1; x++){
            
            if (safetyEquipmentMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (safetyEquipmentMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(safetyEquipmentMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(safetyEquipmentMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[10]+'</th>';
        for(var x = 0; x < coursesAndTrainingMonths.length -1; x++){
            
            if (coursesAndTrainingMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (coursesAndTrainingMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(coursesAndTrainingMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(coursesAndTrainingMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>';
         
        html += '<tr>';
        html += '<th>'+naturezas[11]+'</th>';
        for(var x = 0; x < outehsMonths.length -1; x++){
            
            if (outehsMonths[x] > 0 && staff_year[x] > 0){
                //alert(earningsMonths[x]+'====wow==='+staff_year[x]);
                html += '<td>'+ (outehsMonths[x]/staff_year[x]).formatMoney(0, ',', '.'); +'</td>';
            }else{
                html += '<td>*</td>';
                //alert('NADAA');
            }
        }
        if(outehsMonths[12] > 0 && staff_year[12] > 0){
            html += '<th>'+(outehsMonths[12]/staff_year[12]).formatMoney(0, ',', '.')+'</th>';
        }else{
            html += '<td>*</td>';  
        }
        html += '</tr>'; 
                
        html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = (earningsMonths[i] + prolaboreMonths[i] + extraHourMonths[i] +
                            internshipBagMonths[i] + prizesAndGratuitiesMonths[i] + socialChargesMonths[i] +
                                feedingMonths[i] + transportMonths[i] + medicalMonths[i] + safetyEquipmentMonths[i] + 
                                    coursesAndTrainingMonths[i] + outehsMonths[i])/staff_year[i] ;
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = (earningsMonths[12] + prolaboreMonths[12] + extraHourMonths[12] +
                        internshipBagMonths[12] + prizesAndGratuitiesMonths[12] + socialChargesMonths[12] +
                            feedingMonths[12] + transportMonths[12] + medicalMonths[12] + safetyEquipmentMonths[12] + 
                                coursesAndTrainingMonths[12] + outehsMonths[12])/staff_year[12];
        html += '<th>'+valorAnual.formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        
        html += '</tbody>';
        html += '</table>';
        document.getElementById("example2").innerHTML = html;
    });
</script>
<?php $this->end(); ?>




<script type="text/javascript">
    
function fnExcelReport(){
       var htmltable= document.getElementById('example1');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}

function fnExcelReport2(){
       var htmltable= document.getElementById('example2');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}

</script>



<?php

// ============= RECEITAS INI ============= // 
$countsServices  = array("31101001", "31101002");
$countsProduct = array("31102001", "31102002");

$valueRevenuesOneProduct = 0;
$valueRevenuesOneService = 0;
foreach($revenuesOneRs as $key):
    if (in_array(substr($key['CT2_CREDIT'],0,8), $countsProduct))
        $valueRevenuesOneProduct += $key['CT2_VALOR'];
    if (in_array(substr($key['CT2_CREDIT'],0,8), $countsServices))
        $valueRevenuesOneService += $key['CT2_VALOR'];
endforeach;
$totalRevenuesOne = $valueRevenuesOneProduct + $valueRevenuesOneService;

$valueRevenuesTwoProduct = 0;
$valueRevenuesTwoService = 0;
foreach($revenuesTwoRs as $key):
    if (in_array(substr($key['CT2_CREDIT'],0,8), $countsProduct))
        $valueRevenuesTwoProduct += $key['CT2_VALOR'];
    if (in_array(substr($key['CT2_CREDIT'],0,8), $countsServices))
        $valueRevenuesTwoService += $key['CT2_VALOR'];
endforeach;
$totalRevenuesTwo = $valueRevenuesTwoProduct + $valueRevenuesTwoService;

$totalRevenuesRetOne = 0;
foreach($revenuesCountDebitOneRs as $key):
    $totalRevenuesRetOne += $key['CT2_VALOR']; 
endforeach;

$totalRevenuesRetTwo = 0;
foreach($revenuesCountDebitTwoRs as $key):
    $totalRevenuesRetTwo += $key['CT2_VALOR']; 
endforeach;

$totalRevenuesOne -= $cancellationOfTitlesOneRs[0]['CT2_VALOR'];
$totalRevenuesTwo -= $cancellationOfTitlesTwoRs[0]['CT2_VALOR'];

// ============= RECEITAS FIM ============= // 

// total de despesas recursos humanos
$totalRHOne = $othersRHOneRs[0]['CT2_VALOR']+$coursesAndTrainingOneRs[0]['CT2_VALOR']
                +$safetyEquipmentOneRs[0]['CT2_VALOR']+$medicalOneRs[0]['CT2_VALOR']
                +$transportOneRs[0]['CT2_VALOR']+$feedingOneRs[0]['CT2_VALOR']
                +$socialChargesOneRs[0]['CT2_VALOR']+$prizesAndGratuitiesOneRs[0]['CT2_VALOR']
                +$internshipBagOneRs[0]['CT2_VALOR']+$extraHourOneRs[0]['CT2_VALOR']
                +$prolaboreOneRs[0]['CT2_VALOR']+$earningsOneRs[0]['CT2_VALOR'];

$totalRHTwo = $othersRHTwoRs[0]['CT2_VALOR']+$coursesAndTrainingTwoRs[0]['CT2_VALOR']
                +$safetyEquipmentTwoRs[0]['CT2_VALOR']+$medicalTwoRs[0]['CT2_VALOR']
                +$transportTwoRs[0]['CT2_VALOR']+$feedingTwoRs[0]['CT2_VALOR']
                +$socialChargesTwoRs[0]['CT2_VALOR']+$prizesAndGratuitiesTwoRs[0]['CT2_VALOR']
                +$internshipBagTwoRs[0]['CT2_VALOR']+$extraHourTwoRs[0]['CT2_VALOR']
                +$prolaboreTwoRs[0]['CT2_VALOR']+$earningsTwoRs[0]['CT2_VALOR'];

// total de despesas operacionais
$totalOprOne = $maintenanceOneRs[0]['CT2_VALOR']+$finesOfCarsOneRs[0]['CT2_VALOR']+$tiresOneRs[0]['CT2_VALOR']
    +$fuelAndLubricantsOneRs[0]['CT2_VALOR']+$rentsOprOneRs[0]['CT2_VALOR']+$freightOneRs[0]['CT2_VALOR']
    +$materialsOneRs[0]['CT2_VALOR']+$othersOPROneRs[0]['CT2_VALOR'];

$totalOprTwo = $maintenanceTwoRs[0]['CT2_VALOR']+$finesOfCarsTwoRs[0]['CT2_VALOR']+$tiresTwoRs[0]['CT2_VALOR']
    +$fuelAndLubricantsTwoRs[0]['CT2_VALOR']+$rentsOprTwoRs[0]['CT2_VALOR']+$freightTwoRs[0]['CT2_VALOR']
    +$materialsTwoRs[0]['CT2_VALOR']+$othersOPRTwoRs[0]['CT2_VALOR'];

// toral de despesas admi
$totalAdminOne = $rentAdmOneRs[0]['CT2_VALOR']+$phoneAndInternetOneRs[0]['CT2_VALOR']+$electricityOneRs[0]['CT2_VALOR']+$waterAndSewageOneRs[0]['CT2_VALOR']+$officeSuppliesOneRs[0]['CT2_VALOR']+$cleaningSuppliesOneRs[0]['CT2_VALOR']+$othersAdmOneRs[0]['CT2_VALOR'];

$totalAdminTwo = $rentAdmTwoRs[0]['CT2_VALOR']+$phoneAndInternetTwoRs[0]['CT2_VALOR']+$electricityTwoRs[0]['CT2_VALOR']+$waterAndSewageTwoRs[0]['CT2_VALOR']+$officeSuppliesTwoRs[0]['CT2_VALOR']+$cleaningSuppliesTwoRs[0]['CT2_VALOR']+$othersAdmTwoRs[0]['CT2_VALOR'];

//total de despesas financeiras
$totalFinancialOne = $ratesOneRs[0]['CT2_VALOR']+$interestCostsOneRs[0]['CT2_VALOR']+$discountsGivenOneRs[0]['CT2_VALOR']+$bankExpensesOneRs[0]['CT2_VALOR']+$finesFinancialOneRs[0]['CT2_VALOR']+$iofOneRs[0]['CT2_VALOR']+$iocOneRs[0]['CT2_VALOR']+$bankInterestRateOneRs[0]['CT2_VALOR']+$financialChargesOneRs[0]['CT2_VALOR']+$irsOneRs[0]['CT2_VALOR'];

$totalFinancialTwo = $ratesTwoRs[0]['CT2_VALOR']+$interestCostsTwoRs[0]['CT2_VALOR']+$discountsGivenTwoRs[0]['CT2_VALOR']+$bankExpensesTwoRs[0]['CT2_VALOR']+$finesFinancialTwoRs[0]['CT2_VALOR']+$iofTwoRs[0]['CT2_VALOR']+$iocTwoRs[0]['CT2_VALOR']+$bankInterestRateTwoRs[0]['CT2_VALOR']+$financialChargesTwoRs[0]['CT2_VALOR']+$irsTwoRs[0]['CT2_VALOR'];

//total de com investimentos
$totalInvestOne = $furnitureAndUtensilsOneRs[0]['CT2_VALOR']+$furnitureAndUtensilsTwoRs[0]['CT2_VALOR']
                +$machinesAndEquipmentOneRs[0]['CT2_VALOR']+$machinesAndEquipmentTwoRs[0]['CT2_VALOR']
                +$vehiclesOneRs[0]['CT2_VALOR']+$vehiclesTwoRs[0]['CT2_VALOR'];

$totalInvestTwo = $furnitureAndUtensilsTwoRs[0]['CT2_VALOR']+$furnitureAndUtensilsTwoRs[0]['CT2_VALOR']
                    +$machinesAndEquipmentTwoRs[0]['CT2_VALOR']+$machinesAndEquipmentTwoRs[0]['CT2_VALOR']
                    +$vehiclesTwoRs[0]['CT2_VALOR']+$vehiclesTwoRs[0]['CT2_VALOR'];

//total de despesas com tributações
$totalTributosOne = $icmsOneRs[0]['CT2_VALOR']+$issOneRs[0]['CT2_VALOR']+$cofinsOneRs[0]['CT2_VALOR']
                    +$pisOneRs[0]['CT2_VALOR']+$irpjOneRs[0]['CT2_VALOR']
                    +$csllOneRs[0]['CT2_VALOR']+$ipvaOneRs[0]['CT2_VALOR']+$iptuOneRs[0]['CT2_VALOR']
                    +$itbiOneRs[0]['CT2_VALOR']+$fecoepOneRs[0]['CT2_VALOR'];

$totalTributosTwo = $icmsTwoRs[0]['CT2_VALOR']+$issTwoRs[0]['CT2_VALOR']
                        +$cofinsTwoRs[0]['CT2_VALOR']+$pisTwoRs[0]['CT2_VALOR']
                        +$irpjTwoRs[0]['CT2_VALOR']+$csllTwoRs[0]['CT2_VALOR']
                        +$ipvaTwoRs[0]['CT2_VALOR']+$iptuTwoRs[0]['CT2_VALOR']
                        +$itbiTwoRs[0]['CT2_VALOR']+$fecoepTwoRs[0]['CT2_VALOR'];

$totalDespesasOne = $totalRHOne + $totalOprOne + $totalAdminOne + $totalFinancialOne + $totalInvestOne + $totalTributosOne;

$totalDespesasTwo = $totalRHTwo + $totalOprTwo + $totalAdminTwo + $totalFinancialTwo + $totalInvestTwo + $totalTributosTwo;
?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Apuração dos resultados mensais</small>
    </h1>      
</section>

<section class="content-header">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apuração dos resultados mensais:</h3>
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
                    <!--
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" align="center">
                                <?php //echo $this->Form->input('cc', ['id' => 'cc', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']); ?>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    -->
                    <div align="right">
                        <a id="btnExport" onclick="fnExcelReport()" class="btn btn-primary" type=""><?php echo __('Gerar Excel'); ?></a>
                    </div>
                    <br>
                    <div align="center">
                    <table width=60% height=100% id="example1" class="table-bordered table-hover">
                        <thead>

                            <tr>
                                <th style="text-align:center" colspan="4">Apuração dos resultados mensais</th>
                            </tr>
                            <tr>
                                <th style="text-align:center" colspan="4">Mês de referencia: <?php echo $monthly ?> - Centro de custo: <?php echo $cc ?></th>
                            </tr>
                            <tr style="background-color:#72a1d8">
                                <td rowspan=3><b>Descrições das naturezas:</b></td>
                                <td align="center" colspan="2"><b>Período:</b></td>
                                <td align="center" colspan="2"><b>Variação:</b></td>
                            </tr>
                            <tr style="background-color:#72a1d8" >
                                <td ><?php echo $yearOne;  ?></b></td>
                                <td ><?php echo $yearTwo;  ?></td>
                                <td> R$:</td>
                                <td> %:</td>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td style="color:#FFFFFF" colspan="5"><?php echo 'a ' ?></td>
                            </tr>

                            <tr style="background-color:#CDC5BF">
                                <td><b>Receita Bruta:</b></td>
                                <td><?php echo number_format($totalRevenuesOne,0,',','.'); ?></td>
                                <td><?php echo number_format($totalRevenuesTwo,0,',','.'); ?></td>
                                <td>
                                    <?php echo number_format($totalRevenuesTwo-$totalRevenuesOne,0,',','.'); ?>
                                </td>
                                
                                <?php 
                                    if($totalRevenuesOne > 0 and $totalRevenuesTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalRevenuesOne == 0 and $totalRevenuesTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalRevenuesOne > 0 and $totalRevenuesTwo > 0){ ?>
                                        <td><?php echo number_format(($totalRevenuesTwo-$totalRevenuesOne)/$totalRevenuesOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalRevenuesOne == 0 and $totalRevenuesTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                                    
                            </tr>

                            <tr style="background-color:#EEE5DE">
                                <td><b>Vendas de serviços:</b></td>
                                <td><?php echo number_format($valueRevenuesOneService,0,',','.'); ?></td>
                                <td><?php echo number_format($valueRevenuesTwoService,0,',','.'); ?></td>
                                <td>
                                <?php echo number_format($valueRevenuesTwoService-$valueRevenuesOneService,0,',','.'); ?>
                                </td>
                                
                                <?php 
                                    if($valueRevenuesOneService > 0 and $valueRevenuesTwoService == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($valueRevenuesOneService == 0 and $valueRevenuesTwoService > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($valueRevenuesOneService > 0 and $valueRevenuesTwoService > 0){ ?>
                                        <td><?php echo number_format(($valueRevenuesTwoService-$valueRevenuesOneService)/$valueRevenuesOneService * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($valueRevenuesOneService == 0 and $valueRevenuesTwoService == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>

                            </tr>

                            <tr style="background-color:#EEE5DE">
                                <td><b>Vendas de produtos:</b></td>
                                <td><?php echo number_format($valueRevenuesOneProduct,0,',','.'); ?></td>
                                <td><?php echo number_format($valueRevenuesTwoProduct,0,',','.'); ?></td>
                                <td>
                                <?php echo number_format($valueRevenuesTwoProduct-$valueRevenuesOneProduct,0,',','.'); ?>
                                </td>    
                                
                                <?php 
                                    if($valueRevenuesOneProduct > 0 and $valueRevenuesTwoProduct == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($valueRevenuesOneProduct == 0 and $valueRevenuesTwoProduct > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($valueRevenuesOneProduct > 0 and $valueRevenuesTwoProduct > 0){ ?>
                                        <td><?php echo number_format(($valueRevenuesTwoProduct-$valueRevenuesOneProduct)/$valueRevenuesOneProduct * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($valueRevenuesOneProduct == 0 and $valueRevenuesTwoProduct == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>

                            <tr style="background-color:#ffbebe">
                                <td><b>Titulos cancelados:</b></td>
                                <td><?php echo number_format($cancellationOfTitlesOneRs[0]['CT2_VALOR'],0,',','.'); ?></td>
                                <td><?php echo number_format($cancellationOfTitlesTwoRs[0]['CT2_VALOR'],0,',','.'); ?></td>
                                <td>
                                <?php echo number_format($cancellationOfTitlesTwoRs[0]['CT2_VALOR']-$cancellationOfTitlesOneRs[0]['CT2_VALOR'],0,',','.'); ?>
                                </td>    
                                
                                <?php 
                                    if($cancellationOfTitlesOneRs[0]['CT2_VALOR'] > 0 and $cancellationOfTitlesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($cancellationOfTitlesOneRs[0]['CT2_VALOR'] == 0 and $cancellationOfTitlesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($cancellationOfTitlesOneRs[0]['CT2_VALOR'] > 0 and $cancellationOfTitlesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($cancellationOfTitlesTwoRs[0]['CT2_VALOR']-$cancellationOfTitlesOneRs[0]['CT2_VALOR'])/$cancellationOfTitlesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($cancellationOfTitlesOneRs[0]['CT2_VALOR'] == 0 and $cancellationOfTitlesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td style="color:#FFFFFF" colspan="5"><?php echo 'a ' ?></td>
                            </tr>

                            <tr style="background-color:#CDC5BF" >
                                <td><b>Despesas Gerais:</td>
                                <td><?php echo number_format($totalDespesasOne,0,',','.'); ?></td>
                                <td><?php echo number_format($totalDespesasTwo,0,',','.'); ?></td>
                                <td>
                                    <?php echo number_format($totalDespesasTwo-$totalDespesasOne,0,',','.'); ?>
                                </td>
                                
                                <?php 
                                    if($totalDespesasOne > 0 and $totalDespesasTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalDespesasOne == 0 and $totalDespesasTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalDespesasOne > 0 and $totalDespesasTwo > 0){ ?>
                                        <td><?php echo number_format(($totalDespesasTwo-$totalDespesasOne)/$totalDespesasOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalDespesasOne == 0 and $totalDespesasTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>

                            </tr>

                            <!-- PESSOAL INI -->
                            <!-- PESSOAL INI -->
                            <!-- PESSOAL INI -->
                            <tr style="background-color:#EEE5DE">
                                <td><b>Despesas com pessoal:</b></td>
                                <td><?php echo number_format($totalRHOne,0,',','.'); ?></td>
                                <td><?php echo number_format($totalRHTwo,0,',','.'); ?></td>
                                <td><?php echo number_format($totalRHTwo-$totalRHOne,0,',','.'); ?></td>
                                <?php 
                                    if($totalRHOne > 0 and $totalRHTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalRHOne == 0 and $totalRHTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalRHOne > 0 and $totalRHTwo > 0){ ?>
                                        <td><?php echo number_format(($totalRHTwo-$totalRHOne)/$totalRHOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalRHOne == 0 and $totalRHTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Proventos</td>
                                <td><?php echo number_format($earningsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($earningsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($earningsTwoRs[0]['CT2_VALOR']-$earningsOneRs[0]['CT2_VALOR'],0,',','.') ?>
                                </td>
                                <?php 
                                    if($earningsOneRs[0]['CT2_VALOR'] > 0 and $earningsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($earningsOneRs[0]['CT2_VALOR'] == 0 and $earningsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($earningsOneRs[0]['CT2_VALOR'] > 0 and $earningsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($earningsTwoRs[0]['CT2_VALOR']-$earningsOneRs[0]['CT2_VALOR'])/$earningsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($earningsOneRs[0]['CT2_VALOR'] == 0 and $earningsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Pro-Labore</td>
                                <td><?php echo number_format($prolaboreOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($prolaboreTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($prolaboreTwoRs[0]['CT2_VALOR']-$prolaboreOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($prolaboreOneRs[0]['CT2_VALOR'] > 0 and $prolaboreTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($prolaboreOneRs[0]['CT2_VALOR'] == 0 and $prolaboreTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($prolaboreOneRs[0]['CT2_VALOR'] > 0 and $prolaboreTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($prolaboreTwoRs[0]['CT2_VALOR']-$prolaboreOneRs[0]['CT2_VALOR'])/$prolaboreOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($prolaboreOneRs[0]['CT2_VALOR'] == 0 and $prolaboreTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Hora Extra</td>
                                <td><?php echo number_format($extraHourOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($extraHourTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($extraHourTwoRs[0]['CT2_VALOR']-$extraHourOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($extraHourOneRs[0]['CT2_VALOR'] > 0 and $extraHourTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($extraHourOneRs[0]['CT2_VALOR'] == 0 and $extraHourTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($extraHourOneRs[0]['CT2_VALOR'] > 0 and $extraHourTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($extraHourTwoRs[0]['CT2_VALOR']-$extraHourOneRs[0]['CT2_VALOR'])/$extraHourOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($extraHourOneRs[0]['CT2_VALOR'] == 0 and $extraHourTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Bolsa Estágio</td>
                                <td><?php echo number_format($internshipBagOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($internshipBagTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($internshipBagTwoRs[0]['CT2_VALOR']-$internshipBagOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($internshipBagOneRs[0]['CT2_VALOR'] > 0 and $internshipBagTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($internshipBagOneRs[0]['CT2_VALOR'] == 0 and $internshipBagTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($internshipBagOneRs[0]['CT2_VALOR'] > 0 and $internshipBagTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($internshipBagTwoRs[0]['CT2_VALOR']-$internshipBagOneRs[0]['CT2_VALOR'])/$internshipBagOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($internshipBagOneRs[0]['CT2_VALOR'] == 0 and $internshipBagTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Premios e Gratificações</td>
                                <td><?php echo number_format($prizesAndGratuitiesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($prizesAndGratuitiesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($prizesAndGratuitiesTwoRs[0]['CT2_VALOR']-$prizesAndGratuitiesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($prizesAndGratuitiesOneRs[0]['CT2_VALOR'] > 0 and $prizesAndGratuitiesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($prizesAndGratuitiesOneRs[0]['CT2_VALOR'] == 0 and $prizesAndGratuitiesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($prizesAndGratuitiesOneRs[0]['CT2_VALOR'] > 0 and $prizesAndGratuitiesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($prizesAndGratuitiesTwoRs[0]['CT2_VALOR']-$prizesAndGratuitiesOneRs[0]['CT2_VALOR'])/$prizesAndGratuitiesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($prizesAndGratuitiesOneRs[0]['CT2_VALOR'] == 0 and $prizesAndGratuitiesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Encargos Sociais</td>
                                <td><?php echo number_format($socialChargesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($socialChargesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($socialChargesTwoRs[0]['CT2_VALOR']-$socialChargesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($socialChargesOneRs[0]['CT2_VALOR'] > 0 and $socialChargesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($socialChargesOneRs[0]['CT2_VALOR'] == 0 and $socialChargesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($socialChargesOneRs[0]['CT2_VALOR'] > 0 and $socialChargesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($socialChargesTwoRs[0]['CT2_VALOR']-$socialChargesOneRs[0]['CT2_VALOR'])/$socialChargesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($socialChargesOneRs[0]['CT2_VALOR'] == 0 and $socialChargesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Alimentação</td>
                                <td><?php echo number_format($feedingOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($feedingTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($feedingTwoRs[0]['CT2_VALOR']-$feedingOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($feedingOneRs[0]['CT2_VALOR'] > 0 and $feedingTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($feedingOneRs[0]['CT2_VALOR'] == 0 and $feedingTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($feedingOneRs[0]['CT2_VALOR'] > 0 and $feedingTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($feedingTwoRs[0]['CT2_VALOR']-$feedingOneRs[0]['CT2_VALOR'])/$feedingOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($feedingOneRs[0]['CT2_VALOR'] == 0 and $feedingTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Transporte de pessoal</td>
                                <td><?php echo number_format($transportOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($transportTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($transportTwoRs[0]['CT2_VALOR']-$transportOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($transportOneRs[0]['CT2_VALOR'] > 0 and $transportTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($transportOneRs[0]['CT2_VALOR'] == 0 and $transportTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($transportOneRs[0]['CT2_VALOR'] > 0 and $transportTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($transportTwoRs[0]['CT2_VALOR']-$transportOneRs[0]['CT2_VALOR'])/$transportOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($transportOneRs[0]['CT2_VALOR'] == 0 and $transportTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Assistência Médica</td>
                                <td><?php echo number_format($medicalOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($medicalTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($medicalTwoRs[0]['CT2_VALOR']-$medicalOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($medicalOneRs[0]['CT2_VALOR'] > 0 and $medicalTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($medicalOneRs[0]['CT2_VALOR'] == 0 and $medicalTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($medicalOneRs[0]['CT2_VALOR'] > 0 and $medicalTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($medicalTwoRs[0]['CT2_VALOR']-$medicalOneRs[0]['CT2_VALOR'])/$medicalOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($medicalOneRs[0]['CT2_VALOR'] == 0 and $medicalTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Materiais de Segurança</td>
                                <td><?php echo number_format($safetyEquipmentOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($safetyEquipmentTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($safetyEquipmentTwoRs[0]['CT2_VALOR']-$safetyEquipmentOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($safetyEquipmentOneRs[0]['CT2_VALOR'] > 0 and $safetyEquipmentTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($safetyEquipmentOneRs[0]['CT2_VALOR'] == 0 and $safetyEquipmentTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($safetyEquipmentOneRs[0]['CT2_VALOR'] > 0 and $safetyEquipmentTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($safetyEquipmentTwoRs[0]['CT2_VALOR']-$safetyEquipmentOneRs[0]['CT2_VALOR'])/$safetyEquipmentOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($safetyEquipmentOneRs[0]['CT2_VALOR'] == 0 and $safetyEquipmentTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Cursos e Treinamentos</td>
                                <td><?php echo number_format($coursesAndTrainingOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($coursesAndTrainingTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($coursesAndTrainingTwoRs[0]['CT2_VALOR']-$coursesAndTrainingOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($coursesAndTrainingOneRs[0]['CT2_VALOR'] > 0 and $coursesAndTrainingTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($coursesAndTrainingOneRs[0]['CT2_VALOR'] == 0 and $coursesAndTrainingTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($coursesAndTrainingOneRs[0]['CT2_VALOR'] > 0 and $coursesAndTrainingTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($coursesAndTrainingTwoRs[0]['CT2_VALOR']-$coursesAndTrainingOneRs[0]['CT2_VALOR'])/$coursesAndTrainingOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($coursesAndTrainingOneRs[0]['CT2_VALOR'] == 0 and $coursesAndTrainingTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Outras</td>
                                <td><?php echo number_format($othersRHOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersRHTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersRHTwoRs[0]['CT2_VALOR']-$othersRHOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($othersRHOneRs[0]['CT2_VALOR'] > 0 and $othersRHTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($othersRHOneRs[0]['CT2_VALOR'] == 0 and $othersRHTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($othersRHOneRs[0]['CT2_VALOR'] > 0 and $othersRHTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($othersRHTwoRs[0]['CT2_VALOR']-$othersRHOneRs[0]['CT2_VALOR'])/$othersRHOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($othersRHOneRs[0]['CT2_VALOR'] == 0 and $othersRHTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- PESSOAL FIM -->
                            <!-- PESSOAL FIM -->
                            <!-- PESSOAL FIM -->

                            <!-- OPERACIONAL INI -->
                            <!-- OPERACIONAL INI -->
                            <!-- OPERACIONAL INI -->
                            <tr style="background-color:#EEE5DE">
                                <td><b>Despesas com operacional:</b></td>
                                <td><?php echo number_format($totalOprOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalOprTwo,0,',','.') ?></td>
                                <td><?php echo number_format($totalOprTwo-$totalOprOne,0,',','.') ?></td>
                                <?php 
                                    if($totalOprOne > 0 and $totalOprTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalOprOne == 0 and $totalOprTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalOprOne > 0 and $totalOprTwo > 0){ ?>
                                        <td><?php echo number_format(($totalOprTwo-$totalOprOne)/$totalOprOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalOprOne == 0 and $totalOprTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Manuntenções</td>
                                <td><?php echo number_format($maintenanceOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($maintenanceTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($maintenanceTwoRs[0]['CT2_VALOR']-$maintenanceOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($maintenanceOneRs[0]['CT2_VALOR'] > 0 and $maintenanceTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($maintenanceOneRs[0]['CT2_VALOR'] == 0 and $maintenanceTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($maintenanceOneRs[0]['CT2_VALOR'] > 0 and $maintenanceTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($maintenanceTwoRs[0]['CT2_VALOR']-$maintenanceOneRs[0]['CT2_VALOR'])/$maintenanceOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($maintenanceOneRs[0]['CT2_VALOR'] == 0 and $maintenanceTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Multas de trânsito</td>
                                <td><?php echo number_format($finesOfCarsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($finesOfCarsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($finesOfCarsTwoRs[0]['CT2_VALOR']-$finesOfCarsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($finesOfCarsOneRs[0]['CT2_VALOR'] > 0 and $finesOfCarsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($finesOfCarsOneRs[0]['CT2_VALOR'] == 0 and $finesOfCarsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($finesOfCarsOneRs[0]['CT2_VALOR'] > 0 and $finesOfCarsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($finesOfCarsTwoRs[0]['CT2_VALOR']-$finesOfCarsOneRs[0]['CT2_VALOR'])/$finesOfCarsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($finesOfCarsOneRs[0]['CT2_VALOR'] == 0 and $finesOfCarsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Pseus (novos e renovados)</td>
                                <td><?php echo number_format($tiresOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($tiresTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($tiresTwoRs[0]['CT2_VALOR']-$tiresOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($tiresOneRs[0]['CT2_VALOR'] > 0 and $tiresTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($tiresOneRs[0]['CT2_VALOR'] == 0 and $tiresTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($tiresOneRs[0]['CT2_VALOR'] > 0 and $tiresTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($tiresTwoRs[0]['CT2_VALOR']-$tiresOneRs[0]['CT2_VALOR'])/$tiresOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($tiresOneRs[0]['CT2_VALOR'] == 0 and $tiresTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Combustíveis e lubrificantes</td>
                                <td><?php echo number_format($fuelAndLubricantsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($fuelAndLubricantsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($fuelAndLubricantsTwoRs[0]['CT2_VALOR']-$fuelAndLubricantsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($fuelAndLubricantsOneRs[0]['CT2_VALOR'] > 0 and $fuelAndLubricantsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($fuelAndLubricantsOneRs[0]['CT2_VALOR'] == 0 and $fuelAndLubricantsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($fuelAndLubricantsOneRs[0]['CT2_VALOR'] > 0 and $fuelAndLubricantsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($fuelAndLubricantsTwoRs[0]['CT2_VALOR']-$fuelAndLubricantsOneRs[0]['CT2_VALOR'])/$fuelAndLubricantsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($fuelAndLubricantsOneRs[0]['CT2_VALOR'] == 0 and $fuelAndLubricantsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Alugueis</td>
                                <td><?php echo number_format($rentsOprOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($rentsOprTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($rentsOprTwoRs[0]['CT2_VALOR']-$rentsOprOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($rentsOprOneRs[0]['CT2_VALOR'] > 0 and $rentsOprTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($rentsOprOneRs[0]['CT2_VALOR'] == 0 and $rentsOprTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($rentsOprOneRs[0]['CT2_VALOR'] > 0 and $rentsOprTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($rentsOprTwoRs[0]['CT2_VALOR']-$rentsOprOneRs[0]['CT2_VALOR'])/$rentsOprOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($rentsOprOneRs[0]['CT2_VALOR'] == 0 and $rentsOprTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Frete, pedagios e correios</td>
                                <td><?php echo number_format($freightOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($freightTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($freightTwoRs[0]['CT2_VALOR']-$freightOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($freightOneRs[0]['CT2_VALOR'] > 0 and $freightTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($freightOneRs[0]['CT2_VALOR'] == 0 and $freightTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($freightOneRs[0]['CT2_VALOR'] > 0 and $freightTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($freightTwoRs[0]['CT2_VALOR']-$freightOneRs[0]['CT2_VALOR'])/$freightOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($freightOneRs[0]['CT2_VALOR'] == 0 and $freightTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Materiais</td>
                                <td><?php echo number_format($materialsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($materialsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($materialsTwoRs[0]['CT2_VALOR']-$materialsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($materialsOneRs[0]['CT2_VALOR'] > 0 and $materialsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($materialsOneRs[0]['CT2_VALOR'] == 0 and $materialsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($materialsOneRs[0]['CT2_VALOR'] > 0 and $materialsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($materialsTwoRs[0]['CT2_VALOR']-$materialsOneRs[0]['CT2_VALOR'])/$materialsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($materialsOneRs[0]['CT2_VALOR'] == 0 and $materialsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Outras</td>
                                <td><?php echo number_format($othersOPROneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersOPRTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersOPRTwoRs[0]['CT2_VALOR']-$othersOPROneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($othersOPROneRs[0]['CT2_VALOR'] > 0 and $othersOPRTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($othersOPROneRs[0]['CT2_VALOR'] == 0 and $othersOPRTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($othersOPROneRs[0]['CT2_VALOR'] > 0 and $othersOPRTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($othersOPRTwoRs[0]['CT2_VALOR']-$othersOPROneRs[0]['CT2_VALOR'])/$othersOPROneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($othersOPROneRs[0]['CT2_VALOR'] == 0 and $othersOPRTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- OPERACIONAL FIM -->
                            <!-- OPERACIONAL FIM -->
                            <!-- OPERACIONAL FIM -->

                            <!-- ADMINISTRATIVAS INI -->
                            <!-- ADMINISTRATIVAS INI -->
                            <!-- ADMINISTRATIVAS INI -->
                            <tr style="background-color:#EEE5DE">
                                <td><b>Despesas com administrativo:</b></td>
                                <td><?php echo number_format($totalAdminOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalAdminTwo,0,',','.') ?></td>
                                <td><?php echo number_format($totalAdminTwo-$totalAdminOne,0,',','.') ?></td>
                                <?php 
                                    if($totalAdminOne > 0 and $totalAdminTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalAdminOne == 0 and $totalAdminTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalAdminOne > 0 and $totalAdminTwo > 0){ ?>
                                        <td><?php echo number_format(($totalAdminTwo-$totalAdminOne)/$totalAdminOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalAdminOne == 0 and $totalAdminTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Alugueis</td>
                                <td><?php echo number_format($rentAdmOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($rentAdmTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($rentAdmTwoRs[0]['CT2_VALOR']-$rentAdmOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($rentAdmOneRs[0]['CT2_VALOR'] > 0 and $rentAdmTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($rentAdmOneRs[0]['CT2_VALOR'] == 0 and $rentAdmTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($rentAdmOneRs[0]['CT2_VALOR'] > 0 and $rentAdmTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($rentAdmTwoRs[0]['CT2_VALOR']-$rentAdmOneRs[0]['CT2_VALOR'])/$rentAdmOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($rentAdmOneRs[0]['CT2_VALOR'] == 0 and $rentAdmTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Telefone e Internet</td>
                                <td><?php echo number_format($phoneAndInternetOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($phoneAndInternetTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($phoneAndInternetTwoRs[0]['CT2_VALOR']-$phoneAndInternetOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($phoneAndInternetOneRs[0]['CT2_VALOR'] > 0 and $phoneAndInternetTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($phoneAndInternetOneRs[0]['CT2_VALOR'] == 0 and $phoneAndInternetTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($phoneAndInternetOneRs[0]['CT2_VALOR'] > 0 and $phoneAndInternetTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($phoneAndInternetTwoRs[0]['CT2_VALOR']-$phoneAndInternetOneRs[0]['CT2_VALOR'])/$phoneAndInternetOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($phoneAndInternetOneRs[0]['CT2_VALOR'] == 0 and $phoneAndInternetTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Energia eletrica</td>
                                <td><?php echo number_format($electricityOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($electricityTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($electricityTwoRs[0]['CT2_VALOR']-$electricityOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($electricityOneRs[0]['CT2_VALOR'] > 0 and $electricityTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($electricityOneRs[0]['CT2_VALOR'] == 0 and $electricityTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($electricityOneRs[0]['CT2_VALOR'] > 0 and $electricityTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($electricityTwoRs[0]['CT2_VALOR']-$electricityOneRs[0]['CT2_VALOR'])/$electricityOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($electricityOneRs[0]['CT2_VALOR'] == 0 and $electricityTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Agua e esgoto</td>
                                <td><?php echo number_format($waterAndSewageOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($waterAndSewageTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($waterAndSewageTwoRs[0]['CT2_VALOR']-$waterAndSewageOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($waterAndSewageOneRs[0]['CT2_VALOR'] > 0 and $waterAndSewageTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($waterAndSewageOneRs[0]['CT2_VALOR'] == 0 and $waterAndSewageTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($waterAndSewageOneRs[0]['CT2_VALOR'] > 0 and $waterAndSewageTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($waterAndSewageTwoRs[0]['CT2_VALOR']-$waterAndSewageOneRs[0]['CT2_VALOR'])/$waterAndSewageOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($waterAndSewageOneRs[0]['CT2_VALOR'] == 0 and $waterAndSewageTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Material de escritório</td>
                                <td><?php echo number_format($officeSuppliesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($officeSuppliesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($officeSuppliesTwoRs[0]['CT2_VALOR']-$officeSuppliesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($officeSuppliesOneRs[0]['CT2_VALOR'] > 0 and $officeSuppliesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($officeSuppliesOneRs[0]['CT2_VALOR'] == 0 and $officeSuppliesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($officeSuppliesOneRs[0]['CT2_VALOR'] > 0 and $officeSuppliesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($officeSuppliesTwoRs[0]['CT2_VALOR']-$officeSuppliesOneRs[0]['CT2_VALOR'])/$officeSuppliesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($officeSuppliesOneRs[0]['CT2_VALOR'] == 0 and $officeSuppliesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Material de limpeza</td>
                                <td><?php echo number_format($cleaningSuppliesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($cleaningSuppliesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($cleaningSuppliesTwoRs[0]['CT2_VALOR']-$cleaningSuppliesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($cleaningSuppliesOneRs[0]['CT2_VALOR'] > 0 and $cleaningSuppliesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($cleaningSuppliesOneRs[0]['CT2_VALOR'] == 0 and $cleaningSuppliesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($cleaningSuppliesOneRs[0]['CT2_VALOR'] > 0 and $cleaningSuppliesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($cleaningSuppliesTwoRs[0]['CT2_VALOR']-$cleaningSuppliesOneRs[0]['CT2_VALOR'])/$cleaningSuppliesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($cleaningSuppliesOneRs[0]['CT2_VALOR'] == 0 and $cleaningSuppliesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Outras</td>
                                <td><?php echo number_format($othersAdmOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersAdmTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersAdmTwoRs[0]['CT2_VALOR']-$othersAdmOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($othersAdmOneRs[0]['CT2_VALOR'] > 0 and $othersAdmTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($othersAdmOneRs[0]['CT2_VALOR'] == 0 and $othersAdmTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($othersAdmOneRs[0]['CT2_VALOR'] > 0 and $othersAdmTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($othersAdmTwoRs[0]['CT2_VALOR']-$othersAdmOneRs[0]['CT2_VALOR'])/$othersAdmOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($othersAdmOneRs[0]['CT2_VALOR'] == 0 and $othersAdmTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM --> 
                            
                            <!-- FINANCEIRA INI -->
                            <!-- FINANCEIRA INI -->
                            <!-- FINANCEIRA INI -->
                            <tr style="background-color:#EEE5DE">
                                <td><b>Despesas com financeiro:</b></td>
                                <td><?php echo number_format($totalFinancialOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalFinancialTwo,0,',','.') ?></td>
                                <td><?php echo number_format($totalFinancialTwo-$totalFinancialOne,0,',','.') ?></td>
                                <?php 
                                    if($totalFinancialOne > 0 and $totalFinancialTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalFinancialOne == 0 and $totalFinancialTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalFinancialOne > 0 and $totalFinancialTwo > 0){ ?>
                                        <td><?php echo number_format(($totalFinancialTwo-$totalFinancialOne)/$totalFinancialOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalFinancialOne == 0 and $totalFinancialTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Taxas e tarifas</td>
                                <td><?php echo number_format($ratesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($ratesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($ratesTwoRs[0]['CT2_VALOR']-$ratesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($ratesOneRs[0]['CT2_VALOR'] > 0 and $ratesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($ratesOneRs[0]['CT2_VALOR'] == 0 and $ratesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($ratesOneRs[0]['CT2_VALOR'] > 0 and $ratesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($ratesTwoRs[0]['CT2_VALOR']-$ratesOneRs[0]['CT2_VALOR'])/$ratesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($ratesOneRs[0]['CT2_VALOR'] == 0 and $ratesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Juros passivos</td>
                                <td><?php echo number_format($interestCostsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($interestCostsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($interestCostsTwoRs[0]['CT2_VALOR']-$interestCostsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($interestCostsOneRs[0]['CT2_VALOR'] > 0 and $interestCostsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($interestCostsOneRs[0]['CT2_VALOR'] == 0 and $interestCostsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($interestCostsOneRs[0]['CT2_VALOR'] > 0 and $interestCostsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($interestCostsTwoRs[0]['CT2_VALOR']-$interestCostsOneRs[0]['CT2_VALOR'])/$interestCostsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($interestCostsOneRs[0]['CT2_VALOR'] == 0 and $interestCostsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Descontos concedidos</td>
                                <td><?php echo number_format($discountsGivenOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($discountsGivenTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($discountsGivenTwoRs[0]['CT2_VALOR']-$discountsGivenOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($discountsGivenOneRs[0]['CT2_VALOR'] > 0 and $discountsGivenTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($discountsGivenOneRs[0]['CT2_VALOR'] == 0 and $discountsGivenTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($discountsGivenOneRs[0]['CT2_VALOR'] > 0 and $discountsGivenTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($discountsGivenTwoRs[0]['CT2_VALOR']-$discountsGivenOneRs[0]['CT2_VALOR'])/$discountsGivenOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($discountsGivenOneRs[0]['CT2_VALOR'] == 0 and $discountsGivenTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Despesas bancarias</td>
                                <td><?php echo number_format($bankExpensesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($bankExpensesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($bankExpensesTwoRs[0]['CT2_VALOR']-$bankExpensesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($bankExpensesOneRs[0]['CT2_VALOR'] > 0 and $bankExpensesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($bankExpensesOneRs[0]['CT2_VALOR'] == 0 and $bankExpensesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($bankExpensesOneRs[0]['CT2_VALOR'] > 0 and $bankExpensesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($bankExpensesTwoRs[0]['CT2_VALOR']-$bankExpensesOneRs[0]['CT2_VALOR'])/$bankExpensesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($bankExpensesOneRs[0]['CT2_VALOR'] == 0 and $bankExpensesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Multas</td>
                                <td><?php echo number_format($finesFinancialOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($finesFinancialTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($finesFinancialTwoRs[0]['CT2_VALOR']-$finesFinancialOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($finesFinancialOneRs[0]['CT2_VALOR'] > 0 and $finesFinancialTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($finesFinancialOneRs[0]['CT2_VALOR'] == 0 and $finesFinancialTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($finesFinancialOneRs[0]['CT2_VALOR'] > 0 and $finesFinancialTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($finesFinancialTwoRs[0]['CT2_VALOR']-$finesFinancialOneRs[0]['CT2_VALOR'])/$finesFinancialOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($finesFinancialOneRs[0]['CT2_VALOR'] == 0 and $finesFinancialTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>IOF</td>
                                <td><?php echo number_format($iofOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iofTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iofTwoRs[0]['CT2_VALOR']-$iofOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($iofOneRs[0]['CT2_VALOR'] > 0 and $iofTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($iofOneRs[0]['CT2_VALOR'] == 0 and $iofTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($iofOneRs[0]['CT2_VALOR'] > 0 and $iofTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($iofTwoRs[0]['CT2_VALOR']-$iofOneRs[0]['CT2_VALOR'])/$iofOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($iofOneRs[0]['CT2_VALOR'] == 0 and $iofTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>IOC</td>
                                <td><?php echo number_format($iocOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iocTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iocTwoRs[0]['CT2_VALOR']-$iocOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($iocOneRs[0]['CT2_VALOR'] > 0 and $iocTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($iocOneRs[0]['CT2_VALOR'] == 0 and $iocTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($iocOneRs[0]['CT2_VALOR'] > 0 and $iocTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($iocTwoRs[0]['CT2_VALOR']-$iocOneRs[0]['CT2_VALOR'])/$iocOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($iocOneRs[0]['CT2_VALOR'] == 0 and $iocTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Juros Bancarios</td>
                                <td><?php echo number_format($bankInterestRateOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($bankInterestRateTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($bankInterestRateTwoRs[0]['CT2_VALOR']-$bankInterestRateOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($bankInterestRateOneRs[0]['CT2_VALOR'] > 0 and $bankInterestRateTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($bankInterestRateOneRs[0]['CT2_VALOR'] == 0 and $bankInterestRateTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($bankInterestRateOneRs[0]['CT2_VALOR'] > 0 and $bankInterestRateTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($bankInterestRateTwoRs[0]['CT2_VALOR']-$bankInterestRateOneRs[0]['CT2_VALOR'])/$bankInterestRateOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($bankInterestRateOneRs[0]['CT2_VALOR'] == 0 and $bankInterestRateTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Encargos Financeiros</td>
                                <td><?php echo number_format($financialChargesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($financialChargesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($financialChargesTwoRs[0]['CT2_VALOR']-$financialChargesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($financialChargesOneRs[0]['CT2_VALOR'] > 0 and $financialChargesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($financialChargesOneRs[0]['CT2_VALOR'] == 0 and $financialChargesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($financialChargesOneRs[0]['CT2_VALOR'] > 0 and $financialChargesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($financialChargesTwoRs[0]['CT2_VALOR']-$financialChargesOneRs[0]['CT2_VALOR'])/$financialChargesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($financialChargesOneRs[0]['CT2_VALOR'] == 0 and $financialChargesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>IRS</td>
                                <td><?php echo number_format($irsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($irsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($irsTwoRs[0]['CT2_VALOR']-$irsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($irsOneRs[0]['CT2_VALOR'] > 0 and $irsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($irsOneRs[0]['CT2_VALOR'] == 0 and $irsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($irsOneRs[0]['CT2_VALOR'] > 0 and $irsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($irsTwoRs[0]['CT2_VALOR']-$irsOneRs[0]['CT2_VALOR'])/$irsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($irsOneRs[0]['CT2_VALOR'] == 0 and $irsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM --> 

                            <!-- INVESTIMENTOS INI -->
                            <!-- INVESTIMENTOS INI -->
                            <!-- INVESTIMENTOS INI -->
                            <tr style="background-color:#EEE5DE">
                                <td><b>Despesas com investimentos:</b></td>
                                <td><?php echo number_format($totalInvestOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalInvestTwo,0,',','.') ?></td>
                                <td><?php echo number_format($totalInvestTwo-$totalInvestOne,0,',','.') ?></td>
                                <?php 
                                    if($totalInvestOne > 0 and $totalInvestTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalInvestOne == 0 and $totalInvestTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalInvestOne > 0 and $totalInvestTwo > 0){ ?>
                                        <td><?php echo number_format(($totalInvestTwo-$totalInvestOne)/$totalInvestOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalInvestOne == 0 and $totalInvestTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Moveis e utensilhos</td>
                                <td><?php echo number_format($furnitureAndUtensilsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($furnitureAndUtensilsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($furnitureAndUtensilsTwoRs[0]['CT2_VALOR']-$furnitureAndUtensilsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($furnitureAndUtensilsOneRs[0]['CT2_VALOR'] > 0 and $furnitureAndUtensilsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($furnitureAndUtensilsOneRs[0]['CT2_VALOR'] == 0 and $furnitureAndUtensilsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($furnitureAndUtensilsOneRs[0]['CT2_VALOR'] > 0 and $furnitureAndUtensilsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($furnitureAndUtensilsTwoRs[0]['CT2_VALOR']-$furnitureAndUtensilsOneRs[0]['CT2_VALOR'])/$furnitureAndUtensilsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($furnitureAndUtensilsOneRs[0]['CT2_VALOR'] == 0 and $furnitureAndUtensilsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Maquinas e equipamentos</td>
                                <td><?php echo number_format($machinesAndEquipmentOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($machinesAndEquipmentTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($machinesAndEquipmentTwoRs[0]['CT2_VALOR']-$machinesAndEquipmentOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($machinesAndEquipmentOneRs[0]['CT2_VALOR'] > 0 and $machinesAndEquipmentTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($machinesAndEquipmentOneRs[0]['CT2_VALOR'] == 0 and $machinesAndEquipmentTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($machinesAndEquipmentOneRs[0]['CT2_VALOR'] > 0 and $machinesAndEquipmentTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($machinesAndEquipmentTwoRs[0]['CT2_VALOR']-$machinesAndEquipmentOneRs[0]['CT2_VALOR'])/$machinesAndEquipmentOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($machinesAndEquipmentOneRs[0]['CT2_VALOR'] == 0 and $machinesAndEquipmentTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>Veiculos</td>
                                <td><?php echo number_format($vehiclesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($vehiclesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($vehiclesTwoRs[0]['CT2_VALOR']-$vehiclesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($vehiclesOneRs[0]['CT2_VALOR'] > 0 and $vehiclesTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($vehiclesOneRs[0]['CT2_VALOR'] == 0 and $vehiclesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($vehiclesOneRs[0]['CT2_VALOR'] > 0 and $vehiclesTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($vehiclesTwoRs[0]['CT2_VALOR']-$vehiclesOneRs[0]['CT2_VALOR'])/$vehiclesOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($vehiclesOneRs[0]['CT2_VALOR'] == 0 and $vehiclesTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- INVESTIMENTOS FIM -->
                            <!-- INVESTIMENTOS FIM -->
                            <!-- INVESTIMENTOS FIM --> 
                            
                            <!-- TRIBUTOS INI -->
                            <!-- TRIBUTOS INI -->
                            <!-- TRIBUTOS INI -->
                            <tr style="background-color:#EEE5DE">
                                <td><b>Despesas com tributações:</b></td>
                                <td><b><?php echo number_format($totalTributosOne,0,',','.') ?></b></td>
                                <td><b><?php echo number_format($totalTributosTwo,0,',','.') ?></b></td>
                                <td><b><?php echo number_format($totalTributosTwo-$totalTributosOne,0,',','.') ?></b></td>
                                <?php 
                                    if($totalTributosOne > 0 and $totalTributosTwo == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalTributosOne == 0 and $totalTributosTwo > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalTributosOne > 0 and $totalTributosTwo > 0){ ?>
                                        <td><?php echo number_format(($totalTributosTwo-$totalTributosOne)/$totalTributosOne * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($totalTributosOne == 0 and $totalTributosTwo == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>ICMS</td>
                                <td><?php echo number_format($icmsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($icmsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td>
                                    <?php echo number_format($icmsTwoRs[0]['CT2_VALOR']-$icmsOneRs[0]['CT2_VALOR'],0,',','.') ?>
                                </td>
                                <?php 
                                    if($icmsOneRs[0]['CT2_VALOR'] > 0 and $icmsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($icmsOneRs[0]['CT2_VALOR'] == 0 and $icmsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($icmsOneRs[0]['CT2_VALOR'] > 0 and $icmsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($icmsTwoRs[0]['CT2_VALOR']-$icmsOneRs[0]['CT2_VALOR'])/$icmsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($icmsOneRs[0]['CT2_VALOR'] == 0 and $icmsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>ISS</td>
                                <td><?php echo number_format($issOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($issTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($issTwoRs[0]['CT2_VALOR']-$issOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($issOneRs[0]['CT2_VALOR'] > 0 and $issTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($issOneRs[0]['CT2_VALOR'] == 0 and $issTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($issOneRs[0]['CT2_VALOR'] > 0 and $issTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($issTwoRs[0]['CT2_VALOR']-$issOneRs[0]['CT2_VALOR'])/$issOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($issOneRs[0]['CT2_VALOR'] == 0 and $issTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>COFINS  </td>
                                <td><?php echo number_format($cofinsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($cofinsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td>
                                    <?php echo number_format($cofinsTwoRs[0]['CT2_VALOR']-$cofinsOneRs[0]['CT2_VALOR'],0,',','.') ?>
                                </td>
                                <?php 
                                    if($cofinsOneRs[0]['CT2_VALOR'] > 0 and $cofinsTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($cofinsOneRs[0]['CT2_VALOR'] == 0 and $cofinsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($cofinsOneRs[0]['CT2_VALOR'] > 0 and $cofinsTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($cofinsTwoRs[0]['CT2_VALOR']-$cofinsOneRs[0]['CT2_VALOR'])/$cofinsOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($cofinsOneRs[0]['CT2_VALOR'] == 0 and $cofinsTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>PIS</td>
                                <td><?php echo number_format($pisOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($pisTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($pisTwoRs[0]['CT2_VALOR']-$pisOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($pisOneRs[0]['CT2_VALOR'] > 0 and $pisTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($pisOneRs[0]['CT2_VALOR'] == 0 and $pisTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($pisOneRs[0]['CT2_VALOR'] > 0 and $pisTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($pisTwoRs[0]['CT2_VALOR']-$pisOneRs[0]['CT2_VALOR'])/$pisOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($pisOneRs[0]['CT2_VALOR'] == 0 and $pisTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>IRPJ</td>
                                <td><?php echo number_format($irpjOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($irpjTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($irpjTwoRs[0]['CT2_VALOR']-$irpjOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($irpjOneRs[0]['CT2_VALOR'] > 0 and $irpjTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($irpjOneRs[0]['CT2_VALOR'] == 0 and $irpjTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($irpjOneRs[0]['CT2_VALOR'] > 0 and $irpjTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($irpjTwoRs[0]['CT2_VALOR']-$irpjOneRs[0]['CT2_VALOR'])/$irpjOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($irpjOneRs[0]['CT2_VALOR'] == 0 and $irpjTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>CSLL</td>
                                <td><?php echo number_format($csllOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($csllTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($csllTwoRs[0]['CT2_VALOR']-$csllOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($csllOneRs[0]['CT2_VALOR'] > 0 and $csllTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($csllOneRs[0]['CT2_VALOR'] == 0 and $csllTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($csllOneRs[0]['CT2_VALOR'] > 0 and $csllTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($csllTwoRs[0]['CT2_VALOR']-$csllOneRs[0]['CT2_VALOR'])/$csllOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($csllOneRs[0]['CT2_VALOR'] == 0 and $csllTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>IPVA</td>
                                <td><?php echo number_format($ipvaOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($ipvaTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($ipvaTwoRs[0]['CT2_VALOR']-$ipvaOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($ipvaOneRs[0]['CT2_VALOR'] > 0 and $ipvaTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($ipvaOneRs[0]['CT2_VALOR'] == 0 and $ipvaTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($ipvaOneRs[0]['CT2_VALOR'] > 0 and $ipvaTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($ipvaTwoRs[0]['CT2_VALOR']-$ipvaOneRs[0]['CT2_VALOR'])/$ipvaOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($ipvaOneRs[0]['CT2_VALOR'] == 0 and $ipvaTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>IPTU</td>
                                <td><?php echo number_format($iptuOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iptuTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iptuTwoRs[0]['CT2_VALOR']-$iptuOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($iptuOneRs[0]['CT2_VALOR'] > 0 and $iptuTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($iptuOneRs[0]['CT2_VALOR'] == 0 and $iptuTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($iptuOneRs[0]['CT2_VALOR'] > 0 and $iptuTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($iptuTwoRs[0]['CT2_VALOR']-$iptuOneRs[0]['CT2_VALOR'])/$iptuOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($iptuOneRs[0]['CT2_VALOR'] == 0 and $iptuTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>ITBI</td>
                                <td><?php echo number_format($itbiOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($itbiTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($itbiTwoRs[0]['CT2_VALOR']-$itbiOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($itbiOneRs[0]['CT2_VALOR'] > 0 and $itbiTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($itbiOneRs[0]['CT2_VALOR'] == 0 and $itbiTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($itbiOneRs[0]['CT2_VALOR'] > 0 and $itbiTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($itbiTwoRs[0]['CT2_VALOR']-$itbiOneRs[0]['CT2_VALOR'])/$itbiOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($itbiOneRs[0]['CT2_VALOR'] == 0 and $itbiTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td>FECOEP</td>
                                <td><?php echo number_format($fecoepOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($fecoepTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($fecoepTwoRs[0]['CT2_VALOR']-$fecoepOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <?php 
                                    if($fecoepOneRs[0]['CT2_VALOR'] > 0 and $fecoepTwoRs[0]['CT2_VALOR'] == 0){ ?>
                                        <td><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($fecoepOneRs[0]['CT2_VALOR'] == 0 and $fecoepTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($fecoepOneRs[0]['CT2_VALOR'] > 0 and $fecoepTwoRs[0]['CT2_VALOR'] > 0){ ?>
                                        <td><?php echo number_format(($fecoepTwoRs[0]['CT2_VALOR']-$fecoepOneRs[0]['CT2_VALOR'])/$fecoepOneRs[0]['CT2_VALOR'] * 100,1,',','.') . ' %'; ?></td>
                                <?php
                                    }elseif($fecoepOneRs[0]['CT2_VALOR'] == 0 and $fecoepTwoRs[0]['CT2_VALOR'] == 0){ 
                                ?>
                                        <td><?php echo '-'; ?></td>
                                <?php } ?>
                            </tr>
                            <!-- TRIBUTOS FIM -->
                            <!-- TRIBUTOS FIM -->
                            <!-- TRIBUTOS FIM --> 

                            <tr>
                                <td style="color:#FFFFFF" colspan="5"><?php echo 'a ' ?></td>
                            </tr>

                            <!-- APURACAO INI -->
                            <!-- APURACAO INI -->
                            <!-- APURACAO INI -->

                            <tr align="center" style="background-color:#72a1d8">
                                <td colspan="5"><b>Apuração dos resultados:</b></td>
                            </tr>

                            <tr style="background-color:#72a1d8">
                                <td rowspan=2><b>Descrições das naturezas:</b></td>
                                <td align="center" colspan="2"><b>Período:</b></td>
                                <td align="center" colspan="2"><b>Variação:</b></td>
                            </tr>
                            <tr style="background-color:#72a1d8" >
                                <td ><?php echo $yearOne;  ?></b></td>
                                <td ><?php echo $yearTwo;  ?></td>
                                <td> R$:</td>
                                <td> %:</td>
                            </tr>

                            <tr>
                                <td>Receita:</td>
                                <td><?php echo number_format($totalRevenuesOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalRevenuesTwo,0,',','.') ?></td>
                                <?php if ($totalRevenuesTwo-$totalRevenuesOne > 0){ ?>
                                    <td style="background-color:#66FF99">
                                        <?php echo number_format($totalRevenuesTwo-$totalRevenuesOne,0,',','.') ?>
                                    </td>
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666">
                                        <?php echo number_format($totalRevenuesTwo-$totalRevenuesOne,0,',','.') ?>
                                    </td>
                                <?php } ?>    
                                
                                <?php 
                                    if($totalRevenuesOne > 0 and $totalRevenuesTwo == 0){ ?>
                                        <td style="background-color:#FF6666"><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalRevenuesOne == 0 and $totalRevenuesTwo > 0){ ?>
                                        <td style="background-color:#66FF99"><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalRevenuesOne > 0 and $totalRevenuesTwo > 0){ ?>
                                        <?php if ($totalRevenuesTwo-$totalRevenuesOne > 0){ ?>
                                            <td style="background-color:#66FF99"><?php echo number_format(($totalRevenuesTwo-$totalRevenuesOne)/$totalRevenuesOne * 100,1,',','.') . ' %'; ?></td>
                                        <?php }else{ ?>
                                            <td style="background-color:#FF6666"><?php echo number_format(($totalRevenuesTwo-$totalRevenuesOne)/$totalRevenuesOne * 100,1,',','.') . ' %'; ?></td>
                                        <?php } ?>  
                                <?php
                                    }elseif($totalRevenuesOne == 0 and $totalRevenuesTwo == 0){ 
                                ?>
                                        <td style="background-color:#FF6666"><?php echo '-'; ?></td>
                                <?php } ?>

                            </tr>
                            <tr>
                                <td>Despesa:</td>
                                <td><?php echo number_format($totalDespesasOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalDespesasTwo,0,',','.') ?></td>
                                <?php if ($totalDespesasTwo-$totalDespesasOne < 0){ ?>
                                    <td style="background-color:#66FF99">
                                        <?php echo number_format($totalDespesasTwo-$totalDespesasOne,0,',','.') ?>
                                    </td>
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666">
                                        <?php echo number_format($totalDespesasTwo-$totalDespesasOne,0,',','.') ?>
                                    </td>
                                <?php } ?>

                                <?php 
                                    if($totalDespesasOne > 0 and $totalDespesasTwo == 0){ ?>
                                        <td style="background-color:#66FF99"><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalDespesasOne == 0 and $totalDespesasTwo > 0){ ?>
                                        <td style="background-color:#FF6666"><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalDespesasOne > 0 and $totalDespesasTwo > 0){ ?>
                                        <?php if ($totalDespesasTwo-$totalDespesasOne < 0){ ?>
                                            <td style="background-color:#66FF99"><?php echo number_format(($totalDespesasTwo-$totalDespesasOne)/$totalDespesasOne * 100,1,',','.') . ' %'; ?></td>
                                        <?php }else{ ?>
                                            <td style="background-color:#FF6666"><?php echo number_format(($totalDespesasTwo-$totalDespesasOne)/$totalDespesasOne * 100,1,',','.') . ' %'; ?></td>
                                        <?php } ?>  
                                <?php
                                    }elseif($totalDespesasOne == 0 and $totalDespesasTwo == 0){ 
                                ?>
                                        <td style="background-color:#FF6666"><?php echo '-'; ?></td>
                                <?php } ?>
                                

                            </tr>
                            <tr>
                                <td>Lucro Bruto:</td>
                                <td>
                                    <?php echo number_format($totalRevenuesOne-$totalDespesasOne,0,',','.') ?>
                                </td>
                                <td>
                                    <?php echo number_format($totalRevenuesTwo-$totalDespesasTwo,0,',','.') ?>
                                </td>

                                <?php

                                $lucroAnoUm = $totalRevenuesOne-$totalDespesasOne;
                                $lucroAnoDois = $totalRevenuesTwo-$totalDespesasTwo;
                                $resultado = 0;

                                if ($lucroAnoUm < 0 and $lucroAnoDois >0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm);
                                }elseif ($lucroAnoUm > 0 and $lucroAnoDois >0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm);
                                }elseif ($lucroAnoUm > 0 and $lucroAnoDois == 0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm);
                                }elseif ($lucroAnoUm == 0 and $lucroAnoDois > 0){
                                    $resultado = $lucroAnoDois;
                                }

                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>

                                <?php

                                $lucroAnoUm = $totalRevenuesOne-$totalDespesasOne;
                                $lucroAnoDois = $totalRevenuesTwo-$totalDespesasTwo;
                                $resultado = 0;
                                if($lucroAnoUm < 0 and $lucroAnoDois >0){
                                    $resultado = ($lucroAnoUm - $lucroAnoDois) / $lucroAnoUm * 100;
                                }else{
                                    $resultado = ($lucroAnoDois - $lucroAnoUm) / $lucroAnoUm * 100;
                                }

                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>

                            </tr>

                            <tr>
                                <td>Lucro Bruto Per Capito:</td>
                                <td>
                                    <?php 
                                        if($staffPerMonthOneRs[0]['CONT'] > 0){
                                            echo number_format((($totalRevenuesOne-$totalDespesasOne)/$staffPerMonthOneRs[0]['CONT']),0,',','.'); 
                                        }else{
                                            echo 'Sem Quadro.';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($staffPerMonthTwoRs[0]['CONT'] > 0){
                                            echo number_format((($totalRevenuesTwo-$totalDespesasTwo)/$staffPerMonthTwoRs[0]['CONT']),0,',','.');
                                        }else{
                                            echo 'Sem Quadro.';
                                        }
                                    ?>
                                </td>

                                <?php

                                $resultado = 0;

                                if($staffPerMonthOneRs[0]['CONT'] > 0 and $staffPerMonthTwoRs[0]['CONT'] > 0){
                                    $lucroAnoUm = ($totalRevenuesOne-$totalDespesasOne)/$staffPerMonthOneRs[0]['CONT'];
                                    $lucroAnoDois = ($totalRevenuesTwo-$totalDespesasTwo)/$staffPerMonthTwoRs[0]['CONT'];
                                    
                                    if($lucroAnoUm < 0 and $lucroAnoDois >0){
                                        $resultado = ($lucroAnoDois - $lucroAnoUm);
                                    }else{
                                        $resultado = ($lucroAnoDois - $lucroAnoUm);
                                    }
                                }else{
                                    $resultado = "Sem Quadro.";
                                }


                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>

                                <?php

                                $resultado = 0;

                                if($staffPerMonthOneRs[0]['CONT'] > 0  and $staffPerMonthTwoRs[0]['CONT'] > 0){

                                    $lucroAnoUm = ($totalRevenuesOne-$totalDespesasOne)/$staffPerMonthOneRs[0]['CONT'];
                                    $lucroAnoDois = ($totalRevenuesTwo-$totalDespesasTwo)/$staffPerMonthTwoRs[0]['CONT'];
                                
                                    if($lucroAnoUm < 0 and $lucroAnoDois >0){
                                        $resultado = ($lucroAnoUm - $lucroAnoDois) / $lucroAnoUm * 100;
                                    }else{
                                        $resultado = ($lucroAnoDois - $lucroAnoUm) / $lucroAnoUm * 100;
                                    }

                                }else{
                                    $resultado = "Sem Quadro.";
                                }

                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>
                            </tr>

                            <tr>
                                <td>Receita retida na fonte:</td>
                                <td><?php echo number_format($totalRevenuesRetOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalRevenuesRetTwo,0,',','.') ?></td>
                                
                                <?php if ($totalRevenuesRetTwo-$totalRevenuesRetOne < 0){ ?>
                                    <td style="background-color:#66FF99">
                                        <?php echo number_format($totalRevenuesRetTwo-$totalRevenuesRetOne,0,',','.') ?>
                                    </td>
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666">
                                        <?php echo number_format($totalRevenuesRetTwo-$totalRevenuesRetOne,0,',','.') ?>
                                    </td>
                                <?php } ?>

                                <?php 
                                    if($totalRevenuesRetOne > 0 and $totalRevenuesRetTwo == 0){ ?>
                                        <td style="background-color:#66FF99"><?php echo '-100%'; ?></td>
                                <?php 
                                    }elseif($totalRevenuesRetOne == 0 and $totalRevenuesRetTwo > 0){ ?>
                                        <td style="background-color:#FF6666"><?php echo '100%'; ?></td>
                                <?php 
                                    }elseif($totalRevenuesRetOne > 0 and $totalRevenuesRetTwo > 0){ ?>
                                        <?php if ($totalRevenuesRetTwo-$totalRevenuesRetOne < 0){ ?>
                                            <td style="background-color:#66FF99"><?php echo number_format(($totalRevenuesRetTwo-$totalRevenuesRetOne)/$totalRevenuesRetOne * 100,1,',','.') . ' %'; ?></td>
                                        <?php }else{ ?>
                                            <td style="background-color:#FF6666"><?php echo number_format(($totalRevenuesRetTwo-$totalRevenuesRetOne)/$totalRevenuesRetOne * 100,1,',','.') . ' %'; ?></td>
                                        <?php } ?>
                                <?php
                                    }elseif($totalRevenuesRetOne == 0 and $totalRevenuesRetTwo == 0){ 
                                ?>
                                        <td style="background-color:#FF6666"><?php echo '-'; ?></td>
                                <?php } ?>
                                
                            </tr>
                            <tr>
                                <td>Lucro líquido:</td>
                                <td>
                                    <?php echo number_format($totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne),0,',','.') ?>
                                </td>
                                <td>
                                    <?php echo number_format($totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo),0,',','.') ?>
                                </td>

                                <?php

                                $lucroAnoUm = $totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne);
                                $lucroAnoDois = $totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo);
                                $resultado = 0;

                                if ($lucroAnoUm < 0 and $lucroAnoDois >0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm);
                                }elseif ($lucroAnoUm > 0 and $lucroAnoDois >0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm);
                                }elseif ($lucroAnoUm > 0 and $lucroAnoDois == 0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm);
                                }elseif ($lucroAnoUm == 0 and $lucroAnoDois > 0){
                                    $resultado = $lucroAnoDois;
                                }

                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>

                                <?php
                                
                                $lucroAnoUm = $totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne);
                                $lucroAnoDois = $totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo);
                                $resultado = 0;

                                if ($lucroAnoUm < 0 and $lucroAnoDois > 0){
                                    $resultado = ($lucroAnoUm - $lucroAnoDois) / $lucroAnoUm * 100;
                                }elseif ($lucroAnoUm > 0 and $lucroAnoDois > 0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm) / $lucroAnoUm * 100;
                                }elseif ($lucroAnoUm > 0 and $lucroAnoDois == 0){
                                    $resultado = ($lucroAnoDois - $lucroAnoUm) / $lucroAnoUm * 100;;
                                }elseif ($lucroAnoUm == 0 and $lucroAnoDois > 0){
                                    $resultado = $lucroAnoDois;
                                }
                                
                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>                                
                                
                            </tr>

                            <tr>
                                <td>Lucro líquido Per Capito:</td>
                                <td>
                                    <?php 
                                        if($staffPerMonthOneRs[0]['CONT']){ 
                                            echo number_format(($totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne))/$staffPerMonthOneRs[0]['CONT'],0,',','.'); 
                                        }else{
                                            echo 'Sem Quadro.';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($staffPerMonthTwoRs[0]['CONT']){ 
                                            echo number_format(($totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo))/$staffPerMonthTwoRs[0]['CONT'],0,',','.');
                                        }else{
                                            echo 'Sem Quadro.';
                                        } ?>
                                </td>

                                <?php

                                $resultado = 0;

                                if($staffPerMonthOneRs[0]['CONT'] > 0 and $staffPerMonthTwoRs[0]['CONT'] > 0){
                                    $lucroAnoUm = ($totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne))/$staffPerMonthOneRs[0]['CONT'];
                                    $lucroAnoDois = ($totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo))/$staffPerMonthTwoRs[0]['CONT'];
                                    
                                    if($lucroAnoUm < 0 and $lucroAnoDois >0){
                                        $resultado = ($lucroAnoDois - $lucroAnoUm);
                                    }else{
                                        $resultado = ($lucroAnoDois - $lucroAnoUm);
                                    }
                                }

                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>

                                <?php

                                $resultado = 0;
                                if($staffPerMonthOneRs[0]['CONT'] > 0 and $staffPerMonthTwoRs[0]['CONT'] > 0){
                                    $lucroAnoUm = ($totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne))/$staffPerMonthOneRs[0]['CONT'];
                                    $lucroAnoDois = ($totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo))/$staffPerMonthTwoRs[0]['CONT'];
                                    
                                    if($lucroAnoUm < 0 and $lucroAnoDois >0){
                                        $resultado = ($lucroAnoUm - $lucroAnoDois) / $lucroAnoUm * 100;
                                    }else{
                                        $resultado = ($lucroAnoDois - $lucroAnoUm) / $lucroAnoUm * 100;
                                    }
                                }

                                ?>

                                <?php if($resultado > 0){ ?>
                                    <td style="background-color:#66FF99">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>  
                                <?php }elseif($resultado < 0){ ?>  
                                    <td style="background-color:#FF6666">
                                            <?php echo number_format($resultado,0,',','.') . ' %' ?>
                                    </td>   
                                <?php }else{ ?>
                                    <td style="background-color:#FF6666"> - </td>
                                <?php } ?>
                                
                            </tr>
                            <!-- APURACAO FIM -->
                            <!-- APURACAO FIM -->
                            <!-- APURACAO FIM --> 
                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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
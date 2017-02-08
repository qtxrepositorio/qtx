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

                        </thead>

                        <tbody>

                            <tr style="background-color:#87CEFA" >
                                <td>Receitas:</td>
                                <td><?php echo $yearOne;  ?></td>
                                <td><?php echo $yearTwo; ?></td>
                                <td>Variação R$:</td>
                                <td>Variação %:</td>
                            </tr>

                            <tr>
                                <td>Vendas de serviços:</td>
                                <td><?php echo number_format($valueRevenuesOneService,0,',','.'); ?></td>
                                <td><?php echo number_format($valueRevenuesTwoService,0,',','.'); ?></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr >
                                <td>Vendas de produtos:</td>
                                <td><?php echo number_format($valueRevenuesOneProduct,0,',','.'); ?></td>
                                <td><?php echo number_format($valueRevenuesTwoProduct,0,',','.'); ?></td>
                                <td></td>    
                                <td></td>
                            </tr>

                            <tr style="background-color:#D3D3D3" >
                                <td>Receita Bruta:</td>
                                <td><?php echo number_format($totalRevenuesOne,0,',','.'); ?></td>
                                <td><?php echo number_format($totalRevenuesTwo,0,',','.'); ?></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr style="background-color:#D3D3D3" >
                                <td>Despesas Gerais:</td>
                                <td><?php echo number_format($totalDespesasOne,0,',','.'); ?></td>
                                <td><?php echo number_format($totalDespesasTwo,0,',','.'); ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>

                            <!-- PESSOAL INI -->
                            <!-- PESSOAL INI -->
                            <!-- PESSOAL INI -->
                            <tr style="background-color:#87CEFA">
                                <td align="left">Despesas com pessoal:</td>
                                <td><?php echo number_format($totalRHOne,0,',','.'); ?></td>
                                <td><?php echo number_format($totalRHTwo,0,',','.'); ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Proventos</td>
                                <td><?php echo number_format($earningsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($earningsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Pro-Labore</td>
                                <td><?php echo number_format($prolaboreOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($prolaboreTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Hora Extra</td>
                                <td><?php echo number_format($extraHourOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($extraHourTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Bolsa Estágio</td>
                                <td><?php echo number_format($internshipBagOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($internshipBagTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Premios e Gratificações</td>
                                <td><?php echo number_format($prizesAndGratuitiesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($prizesAndGratuitiesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Encargos Sociais</td>
                                <td><?php echo number_format($socialChargesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($socialChargesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Alimentação</td>
                                <td><?php echo number_format($feedingOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($feedingTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Transporte de pessoal</td>
                                <td><?php echo number_format($transportOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($transportTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Assistência Médica</td>
                                <td><?php echo number_format($medicalOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($medicalTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Materiais de Segurança</td>
                                <td><?php echo number_format($safetyEquipmentOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($safetyEquipmentTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Cursos e Treinamentos</td>
                                <td><?php echo number_format($coursesAndTrainingOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($coursesAndTrainingTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Outras</td>
                                <td><?php echo number_format($othersRHOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersRHTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <!-- PESSOAL FIM -->
                            <!-- PESSOAL FIM -->
                            <!-- PESSOAL FIM -->

                            <!-- OPERACIONAL INI -->
                            <!-- OPERACIONAL INI -->
                            <!-- OPERACIONAL INI -->
                            <tr style="background-color:#87CEFA">
                                <td >Despesas com operacional:</td>
                                <td><?php echo number_format($totalOprOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalOprTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Manuntenções</td>
                                <td><?php echo number_format($maintenanceOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($maintenanceTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Multas de trânsito</td>
                                <td><?php echo number_format($finesOfCarsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($finesOfCarsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Pseus (novos e renovados)</td>
                                <td><?php echo number_format($tiresOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($tiresTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Combustíveis e lubrificantes</td>
                                <td><?php echo number_format($fuelAndLubricantsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($fuelAndLubricantsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Alugueis</td>
                                <td><?php echo number_format($rentsOprOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($rentsOprTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Frete, pedagios e correios</td>
                                <td><?php echo number_format($freightOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($freightTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Materiais</td>
                                <td><?php echo number_format($materialsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($materialsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Outras</td>
                                <td><?php echo number_format($othersOPROneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersOPRTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <!-- OPERACIONAL FIM -->
                            <!-- OPERACIONAL FIM -->
                            <!-- OPERACIONAL FIM -->

                            <!-- ADMINISTRATIVAS INI -->
                            <!-- ADMINISTRATIVAS INI -->
                            <!-- ADMINISTRATIVAS INI -->
                            <tr style="background-color:#87CEFA">
                                <td >Despesas com administrativo:</td>
                                <td><?php echo number_format($totalAdminOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalAdminTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Alugueis</td>
                                <td><?php echo number_format($rentAdmOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($rentAdmTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Telefone e Internet</td>
                                <td><?php echo number_format($phoneAndInternetOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($phoneAndInternetTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Energia eletrica</td>
                                <td><?php echo number_format($electricityOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($electricityTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Agua e esgoto</td>
                                <td><?php echo number_format($waterAndSewageOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($waterAndSewageTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Material de escritório</td>
                                <td><?php echo number_format($officeSuppliesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($officeSuppliesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Material de limpeza</td>
                                <td><?php echo number_format($cleaningSuppliesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($cleaningSuppliesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Outras</td>
                                <td><?php echo number_format($othersAdmOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($othersAdmTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM --> 
                            
                            <!-- FINANCEIRA INI -->
                            <!-- FINANCEIRA INI -->
                            <!-- FINANCEIRA INI -->
                            <tr style="background-color:#87CEFA">
                                <td >Despesas com financeiro:</td>
                                <td><?php echo number_format($totalFinancialOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalFinancialTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Taxas e tarifas</td>
                                <td><?php echo number_format($ratesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($ratesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Juros passivos</td>
                                <td><?php echo number_format($interestCostsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($interestCostsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Descontos concedidos</td>
                                <td><?php echo number_format($discountsGivenOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($discountsGivenTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Despesas bancarias</td>
                                <td><?php echo number_format($bankExpensesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($bankExpensesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Multas</td>
                                <td><?php echo number_format($finesFinancialOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($finesFinancialTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>IOF</td>
                                <td><?php echo number_format($iofOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iofTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>IOC</td>
                                <td><?php echo number_format($iocOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iocTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Juros Bancarios</td>
                                <td><?php echo number_format($bankInterestRateOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($bankInterestRateTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Encargos Financeiros</td>
                                <td><?php echo number_format($financialChargesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($financialChargesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>IRS</td>
                                <td><?php echo number_format($irsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($irsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM -->
                            <!-- ADMINISTRATIVAS FIM --> 

                            <!-- INVESTIMENTOS INI -->
                            <!-- INVESTIMENTOS INI -->
                            <!-- INVESTIMENTOS INI -->
                            <tr style="background-color:#87CEFA">
                                <td >Despesas com investimentos:</td>
                                <td><?php echo number_format($totalInvestOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalInvestTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Moveis e utensilhos</td>
                                <td><?php echo number_format($furnitureAndUtensilsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($furnitureAndUtensilsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Maquinas e equipamentos</td>
                                <td><?php echo number_format($machinesAndEquipmentOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($machinesAndEquipmentTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>Veiculos</td>
                                <td><?php echo number_format($vehiclesOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($vehiclesTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <!-- INVESTIMENTOS FIM -->
                            <!-- INVESTIMENTOS FIM -->
                            <!-- INVESTIMENTOS FIM --> 
                            
                            <!-- TRIBUTOS INI -->
                            <!-- TRIBUTOS INI -->
                            <!-- TRIBUTOS INI -->
                            <tr style="background-color:#87CEFA">
                                <td >Despesas com tributações:</td>
                                <td><?php echo number_format($totalTributosOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalTributosTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>ICMS</td>
                                <td><?php echo number_format($icmsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($icmsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>ISS</td>
                                <td><?php echo number_format($issOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($issTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>COFINS  </td>
                                <td><?php echo number_format($cofinsOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($cofinsTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>PIS</td>
                                <td><?php echo number_format($pisOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($pisTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>IRPJ</td>
                                <td><?php echo number_format($irpjOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($irpjTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>CSLL</td>
                                <td><?php echo number_format($csllOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($csllTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>IPVA</td>
                                <td><?php echo number_format($ipvaOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($ipvaTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>IPTU</td>
                                <td><?php echo number_format($iptuOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($iptuTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>ITBI</td>
                                <td><?php echo number_format($itbiOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($itbiTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td>FECOEP</td>
                                <td><?php echo number_format($fecoepOneRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo number_format($fecoepTwoRs[0]['CT2_VALOR'],0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <!-- TRIBUTOS FIM -->
                            <!-- TRIBUTOS FIM -->
                            <!-- TRIBUTOS FIM --> 

                            <!-- APURACAO INI -->
                            <!-- APURACAO INI -->
                            <!-- APURACAO INI -->
                            <tr style="background-color:#D3D3D3">
                                <td colspan="5">Apuração dos resultados:</td>
                            </tr>
                            <tr>
                                <td style="background-color:#87CEFA">Receita:</td>
                                <td><?php echo number_format($totalRevenuesOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalRevenuesTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td style="background-color:#87CEFA">Despesa:</td>
                                <td><?php echo number_format($totalDespesasOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalDespesasTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td style="background-color:#D3D3D3">Lucro Bruto:</td>
                                <td>
                                    <?php echo number_format($totalRevenuesOne-$totalDespesasOne,0,',','.') ?>
                                </td>
                                <td>
                                    <?php echo number_format($totalRevenuesTwo-$totalDespesasTwo,0,',','.') ?>
                                </td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td style="background-color:#87CEFA">Receita retida na fonte:</td>
                                <td><?php echo number_format($totalRevenuesRetOne,0,',','.') ?></td>
                                <td><?php echo number_format($totalRevenuesRetTwo,0,',','.') ?></td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
                            </tr>
                            <tr>
                                <td style="background-color:#D3D3D3">Lucro líquido:</td>
                                <td>
                                    <?php echo number_format($totalRevenuesOne-($totalDespesasOne+$totalRevenuesRetOne),0,',','.') ?>
                                </td>
                                <td>
                                    <?php echo number_format($totalRevenuesTwo-($totalDespesasTwo+$totalRevenuesRetTwo),0,',','.') ?>
                                </td>
                                <td><?php echo '' ?></td>
                                <td><?php echo '' ?></td>
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
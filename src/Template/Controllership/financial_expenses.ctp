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

$naturezas = ['Taxas e tarifas','Juros passivos','Descontos concedidos','Despesas bancárias'
                ,'Multas','IOF','IOC','Juros Bancarios','Encargos Financeiros','IRS'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$totalAnual = 0;

$ratesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($rates as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $ratesMonths[] = $valor;
endforeach;
$ratesMonths[] = $valorTotal;

$interestCostsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($interestCosts as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $interestCostsMonths[] = $valor;
endforeach;
$interestCostsMonths[] = $valorTotal;

$discountsGivenMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($discountsGiven as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $discountsGivenMonths[] = $valor;
endforeach;
$discountsGivenMonths[] = $valorTotal;

$bankExpensesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($bankExpenses as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $bankExpensesMonths[] = $valor;
endforeach;
$bankExpensesMonths[] = $valorTotal;

$finesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($fines as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $finesMonths[] = $valor;
endforeach;
$finesMonths[] = $valorTotal;

$iofMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($iof as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $iofMonths[] = $valor;
endforeach;
$iofMonths[] = $valorTotal;

$iocMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($ioc as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $iocMonths[] = $valor;
endforeach;
$iocMonths[] = $valorTotal;

$bankInterestRateMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($bankInterestRate as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $bankInterestRateMonths[] = $valor;
endforeach;
$bankInterestRateMonths[] = $valorTotal;

$financialChargesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($financialCharges as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $financialChargesMonths[] = $valor;
endforeach;
$financialChargesMonths[] = $valorTotal;

$irsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($irs as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $irsMonths[] = $valor;
endforeach;
$irsMonths[] = $valorTotal;

?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Despesas com Financeiro</small>
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'FinancialExpenses']]);
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'FinancialExpensesPdf']]);
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
                    <h3 class="box-title">Despesas Com Financeiro:</h3>
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
                            <a class="btn btn-primary" download="somedata.xls" href="#" onclick="return ExcellentExport.excel(this, 'example1', 'Sheet Name Here');">Exportar para Excel</a>
                        </div>
                    
                    <table id="example1" class="table table-bordered table-hover">
                        
                        <thead>
                            <tr>           
                                <th>Naturezas</th>
                                <?php foreach ($monthsLabels as $key => $value): ?>
                                    <th><?php echo $value; ?></th>
                                <?php endforeach ?>  
                                <th>Total</th>
                            </tr>                            
                        </thead>
                        
                        <tbody>
                            
                            <tr>
                                <th><?php echo $naturezas[0]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($ratesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($ratesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[1]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($interestCostsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($interestCostsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[2]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($discountsGivenMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($discountsGivenMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[3]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($bankExpensesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($bankExpensesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[4]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($finesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($finesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[5]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($iofMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($iofMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[6]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($iocMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($iocMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[7]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($bankInterestRateMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($bankInterestRateMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[8]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($financialChargesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($financialChargesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[9]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($irsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($irsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format($ratesMonths[$i] + $interestCostsMonths[$i] + $discountsGivenMonths[$i] +
                                                                    $bankExpensesMonths[$i] + $finesMonths[$i] + $iofMonths[$i] +
                                                                        $iocMonths[$i] + $bankInterestRateMonths[$i] + $financialChargesMonths[$i]+ $irsMonths[$i] ,0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($ratesMonths[12] + $interestCostsMonths[12] + $discountsGivenMonths[12] +
                                                                    $bankExpensesMonths[12] + $finesMonths[12] + $iofMonths[12] +
                                                                        $iocMonths[12] + $bankInterestRateMonths[$i] + $financialChargesMonths[$i]+ $irsMonths[$i],0,',','.'); ?></th>                                
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
          
        var rates = JSON.parse( '<?php echo json_encode($rates) ?>' );
        var interestCosts = JSON.parse( '<?php echo json_encode($interestCosts) ?>' );
        var discountsGiven = JSON.parse( '<?php echo json_encode($discountsGiven) ?>' );
        var bankExpenses = JSON.parse( '<?php echo json_encode($bankExpenses) ?>' );
        var fines = JSON.parse( '<?php echo json_encode($fines) ?>' );
        var iof = JSON.parse( '<?php echo json_encode($iof) ?>' );
        var ioc = JSON.parse( '<?php echo json_encode($ioc) ?>' );
        var bankInterestRate = JSON.parse( '<?php echo json_encode($bankInterestRate) ?>' );
        var financialCharges = JSON.parse( '<?php echo json_encode($financialCharges) ?>' );
        var irs = JSON.parse( '<?php echo json_encode($irs) ?>' );
                
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;        
        var cc = document.getElementById('cc').value;
        
        ratesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < rates.length; x++){
                    if (monthsNumbers[i] === rates[x].CT2_DATA && rates[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(rates[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                ratesMonths.push(valor);
            }else{
                for(var x = 0; x < rates.length; x++){
                if (monthsNumbers[i] === rates[x].CT2_DATA){
                    var aux = parseFloat(rates[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                ratesMonths.push(valor);
            }
        }
        ratesMonths.push(valorTotal);
        
        interestCostsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < interestCosts.length; x++){
                    if (monthsNumbers[i] === interestCosts[x].CT2_DATA && interestCosts[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(interestCosts[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                interestCostsMonths.push(valor);
            }else{
                for(var x = 0; x < interestCosts.length; x++){
                if (monthsNumbers[i] === interestCosts[x].CT2_DATA){
                    var aux = parseFloat(interestCosts[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                interestCostsMonths.push(valor);
            }
        }
        interestCostsMonths.push(valorTotal);
        
        discountsGivenMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < discountsGiven.length; x++){
                    if (monthsNumbers[i] === discountsGiven[x].CT2_DATA && discountsGiven[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(discountsGiven[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                discountsGivenMonths.push(valor);
            }else{
                for(var x = 0; x < discountsGiven.length; x++){
                if (monthsNumbers[i] === discountsGiven[x].CT2_DATA){
                    var aux = parseFloat(discountsGiven[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                discountsGivenMonths.push(valor);
            }
        }
        discountsGivenMonths.push(valorTotal);
        
        bankExpensesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < bankExpenses.length; x++){
                    if (monthsNumbers[i] === bankExpenses[x].CT2_DATA && bankExpenses[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(bankExpenses[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                bankExpensesMonths.push(valor);
            }else{
                for(var x = 0; x < bankExpenses.length; x++){
                if (monthsNumbers[i] === bankExpenses[x].CT2_DATA){
                    var aux = parseFloat(bankExpenses[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                bankExpensesMonths.push(valor);
            }
        }
        bankExpensesMonths.push(valorTotal);
        
        finesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < fines.length; x++){
                    if (monthsNumbers[i] === fines[x].CT2_DATA && fines[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(fines[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                finesMonths.push(valor);
            }else{
                for(var x = 0; x < fines.length; x++){
                if (monthsNumbers[i] === fines[x].CT2_DATA){
                    var aux = parseFloat(fines[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                finesMonths.push(valor);
            }
        }
        finesMonths.push(valorTotal);
        
        
        iofMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < iof.length; x++){
                    if (monthsNumbers[i] === iof[x].CT2_DATA && iof[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(iof[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                iofMonths.push(valor);
            }else{
                for(var x = 0; x < iof.length; x++){
                if (monthsNumbers[i] === iof[x].CT2_DATA){
                    var aux = parseFloat(iof[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                iofMonths.push(valor);
            }
        }
        iofMonths.push(valorTotal);
        
        iocMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < ioc.length; x++){
                    if (monthsNumbers[i] === ioc[x].CT2_DATA && ioc[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(ioc[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                iocMonths.push(valor);
            }else{
                for(var x = 0; x < ioc.length; x++){
                if (monthsNumbers[i] === ioc[x].CT2_DATA){
                    var aux = parseFloat(ioc[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                iocMonths.push(valor);
            }
        }
        iocMonths.push(valorTotal);
        
        bankInterestRateMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < bankInterestRate.length; x++){
                    if (monthsNumbers[i] === bankInterestRate[x].CT2_DATA && bankInterestRate[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(bankInterestRate[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                bankInterestRateMonths.push(valor);
            }else{
                for(var x = 0; x < bankInterestRate.length; x++){
                if (monthsNumbers[i] === bankInterestRate[x].CT2_DATA){
                    var aux = parseFloat(bankInterestRate[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                bankInterestRateMonths.push(valor);
            }
        }
        bankInterestRateMonths.push(valorTotal);
        
        financialChargesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < financialCharges.length; x++){
                    if (monthsNumbers[i] === financialCharges[x].CT2_DATA && financialCharges[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(financialCharges[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                financialChargesMonths.push(valor);
            }else{
                for(var x = 0; x < financialCharges.length; x++){
                if (monthsNumbers[i] === financialCharges[x].CT2_DATA){
                    var aux = parseFloat(financialCharges[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                financialChargesMonths.push(valor);
            }
        }
        financialChargesMonths.push(valorTotal);
        
        irsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < irs.length; x++){
                    if (monthsNumbers[i] === irs[x].CT2_DATA && irs[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(irs[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                irsMonths.push(valor);
            }else{
                for(var x = 0; x < irs.length; x++){
                if (monthsNumbers[i] === irs[x].CT2_DATA){
                    var aux = parseFloat(irs[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                irsMonths.push(valor);
            }
        }
        irsMonths.push(valorTotal);
        
        
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
        for(var x = 0; x < ratesMonths.length -1; x++){
             html += '<td>'+ ratesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+ratesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < interestCostsMonths.length -1; x++){
             html += '<td>'+ interestCostsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+interestCostsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < discountsGivenMonths.length -1; x++){
             html += '<td>'+ discountsGivenMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+discountsGivenMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';    
        
        html += '<tr>';
        html += '<th>'+naturezas[3]+'</th>';
        for(var x = 0; x < bankExpensesMonths.length -1; x++){
             html += '<td>'+ bankExpensesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+bankExpensesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';  
        
        html += '<tr>';
        html += '<th>'+naturezas[4]+'</th>';
        for(var x = 0; x < finesMonths.length -1; x++){
             html += '<td>'+ finesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+finesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[5]+'</th>';
        for(var x = 0; x < iofMonths.length -1; x++){
             html += '<td>'+ iofMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+iofMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[6]+'</th>';
        for(var x = 0; x < iocMonths.length -1; x++){
             html += '<td>'+ iocMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+iocMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[7]+'</th>';
        for(var x = 0; x < bankInterestRateMonths.length -1; x++){
             html += '<td>'+ bankInterestRateMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+bankInterestRateMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[8]+'</th>';
        for(var x = 0; x < financialChargesMonths.length -1; x++){
             html += '<td>'+ financialChargesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+financialChargesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>'; 
        
        html += '<tr>';
        html += '<th>'+naturezas[9]+'</th>';
        for(var x = 0; x < irsMonths.length -1; x++){
             html += '<td>'+ irsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+irsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = ratesMonths[i] + interestCostsMonths[i] + discountsGivenMonths[i] +
                            bankExpensesMonths[i] + finesMonths[i] + iofMonths[i] + iocMonths[i] +
                                bankInterestRateMonths[i] + financialChargesMonths[12] + irsMonths[12];
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = ratesMonths[12] + interestCostsMonths[12] + discountsGivenMonths[12] +
                            bankExpensesMonths[12] + finesMonths[12] + iofMonths[12] + iocMonths[i] +
                                bankInterestRateMonths[12] + financialChargesMonths[12] + irsMonths[12];
        html += '<th>'+valorAnual.formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
               
        html += '</tbody>';
        html += '</table>';
        document.getElementById("example1").innerHTML = html;
        
    });
</script>
<?php $this->end(); ?>


<?php $this->Html->script(['AdminLTE./plugins/excellentexport/excellentexport.min.js',], ['block' => 'script']); ?>


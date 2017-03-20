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

$naturezas = ['ICMS','ISS','COFINS','PIS','IRPJ','CSLL','IPVA','IPTU','ITBI','FECOEP'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Mai', 'Abr', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$totalAnual = 0;

$icmsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($icms as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $icmsMonths[] = $valor;
endforeach;
$icmsMonths[] = $valorTotal;

$issMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($iss as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $issMonths[] = $valor;
endforeach;
$issMonths[] = $valorTotal;

$cofinsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($cofins as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $cofinsMonths[] = $valor;
endforeach;
$cofinsMonths[] = $valorTotal;

$pisMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($pis as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $pisMonths[] = $valor;
endforeach;
$pisMonths[] = $valorTotal;

$irpjMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($irpj as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $irpjMonths[] = $valor;
endforeach;
$irpjMonths[] = $valorTotal;

$csllMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($csll as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $csllMonths[] = $valor;
endforeach;
$csllMonths[] = $valorTotal;

$ipvaMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($ipva as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $ipvaMonths[] = $valor;
endforeach;
$ipvaMonths[] = $valorTotal;

$iptuMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($iptu as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $iptuMonths[] = $valor;
endforeach;
$iptuMonths[] = $valorTotal;

$itbiMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($itbi as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $itbiMonths[] = $valor;
endforeach;
$itbiMonths[] = $valorTotal;

$fecoepMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($fecoep as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $fecoepMonths[] = $valor;
endforeach;
$fecoepMonths[] = $valorTotal;

?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Despesas com tributação</small>
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'TaxedExpensesFilter']]);
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'TaxedExpensesPdf']]);
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
                    <h3 class="box-title">Despesas tributarias:</h3>
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
                                <a id="btnExport" onclick="fnExcelReport()" class="btn btn-primary" type=""><?php echo __('Exportar para Excel'); ?></a>
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
                                    <td> <?php echo number_format($icmsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($icmsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[1]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($issMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($issMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[2]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($cofinsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($cofinsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[3]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($pisMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($pisMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[4]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($irpjMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($irpjMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[5]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($csllMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($csllMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[6]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($ipvaMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($ipvaMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[7]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($iptuMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($iptuMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[8]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($itbiMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($itbiMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[9]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($fecoepMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($fecoepMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format($icmsMonths[$i] + $issMonths[$i] + $cofinsMonths[$i] +
                                                                    $pisMonths[$i] + $irpjMonths[$i] + $csllMonths[$i] +
                                                                        $ipvaMonths[$i] + $iptuMonths[$i] + $itbiMonths[$i] + $fecoepMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($icmsMonths[12] + $issMonths[12] + $cofinsMonths[12] +
                                                                    $pisMonths[12] + $irpjMonths[12] + $csllMonths[12] +
                                                                        $ipvaMonths[12] + $iptuMonths[$i] + $itbiMonths[$i] + $fecoepMonths[$i],0,',','.'); ?></th>                                
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
          
        var icms = JSON.parse( '<?php echo json_encode($icms) ?>' );
        var iss = JSON.parse( '<?php echo json_encode($iss) ?>' );
        var cofins = JSON.parse( '<?php echo json_encode($cofins) ?>' );
        var pis = JSON.parse( '<?php echo json_encode($pis) ?>' );
        var irpj = JSON.parse( '<?php echo json_encode($irpj) ?>' );
        var csll = JSON.parse( '<?php echo json_encode($csll) ?>' );
        var ipva = JSON.parse( '<?php echo json_encode($ipva) ?>' );
        var iptu = JSON.parse( '<?php echo json_encode($iptu) ?>' );
        var itbi = JSON.parse( '<?php echo json_encode($itbi) ?>' );
        var fecoep = JSON.parse( '<?php echo json_encode($fecoep) ?>' );
                
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;        
        var cc = document.getElementById('cc').value;
        
        icmsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < icms.length; x++){
                    if (monthsNumbers[i] === icms[x].CT2_DATA && icms[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(icms[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                icmsMonths.push(valor);
            }else{
                for(var x = 0; x < icms.length; x++){
                if (monthsNumbers[i] === icms[x].CT2_DATA){
                    var aux = parseFloat(icms[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                icmsMonths.push(valor);
            }
        }
        icmsMonths.push(valorTotal);
        
        issMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < iss.length; x++){
                    if (monthsNumbers[i] === iss[x].CT2_DATA && iss[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(iss[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                issMonths.push(valor);
            }else{
                for(var x = 0; x < iss.length; x++){
                if (monthsNumbers[i] === iss[x].CT2_DATA){
                    var aux = parseFloat(iss[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                issMonths.push(valor);
            }
        }
        issMonths.push(valorTotal);
        
        cofinsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < cofins.length; x++){
                    if (monthsNumbers[i] === cofins[x].CT2_DATA && cofins[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(cofins[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                cofinsMonths.push(valor);
            }else{
                for(var x = 0; x < cofins.length; x++){
                if (monthsNumbers[i] === cofins[x].CT2_DATA){
                    var aux = parseFloat(cofins[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                cofinsMonths.push(valor);
            }
        }
        cofinsMonths.push(valorTotal);
        
        pisMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < pis.length; x++){
                    if (monthsNumbers[i] === pis[x].CT2_DATA && pis[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(pis[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                pisMonths.push(valor);
            }else{
                for(var x = 0; x < pis.length; x++){
                if (monthsNumbers[i] === pis[x].CT2_DATA){
                    var aux = parseFloat(pis[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                pisMonths.push(valor);
            }
        }
        pisMonths.push(valorTotal);
        
        irpjMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < irpj.length; x++){
                    if (monthsNumbers[i] === irpj[x].CT2_DATA && irpj[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(irpj[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                irpjMonths.push(valor);
            }else{
                for(var x = 0; x < irpj.length; x++){
                if (monthsNumbers[i] === irpj[x].CT2_DATA){
                    var aux = parseFloat(irpj[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                irpjMonths.push(valor);
            }
        }
        irpjMonths.push(valorTotal);
        
        
        csllMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < csll.length; x++){
                    if (monthsNumbers[i] === csll[x].CT2_DATA && csll[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(csll[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                csllMonths.push(valor);
            }else{
                for(var x = 0; x < csll.length; x++){
                if (monthsNumbers[i] === csll[x].CT2_DATA){
                    var aux = parseFloat(csll[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                csllMonths.push(valor);
            }
        }
        csllMonths.push(valorTotal);
        
        ipvaMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < ipva.length; x++){
                    if (monthsNumbers[i] === ipva[x].CT2_DATA && ipva[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(ipva[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                ipvaMonths.push(valor);
            }else{
                for(var x = 0; x < ipva.length; x++){
                if (monthsNumbers[i] === ipva[x].CT2_DATA){
                    var aux = parseFloat(ipva[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                ipvaMonths.push(valor);
            }
        }
        ipvaMonths.push(valorTotal);
        
        iptuMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < iptu.length; x++){
                    if (monthsNumbers[i] === iptu[x].CT2_DATA && iptu[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(iptu[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                iptuMonths.push(valor);
            }else{
                for(var x = 0; x < iptu.length; x++){
                if (monthsNumbers[i] === iptu[x].CT2_DATA){
                    var aux = parseFloat(iptu[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                iptuMonths.push(valor);
            }
        }
        iptuMonths.push(valorTotal);
        
        itbiMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < itbi.length; x++){
                    if (monthsNumbers[i] === itbi[x].CT2_DATA && itbi[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(itbi[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                itbiMonths.push(valor);
            }else{
                for(var x = 0; x < itbi.length; x++){
                if (monthsNumbers[i] === itbi[x].CT2_DATA){
                    var aux = parseFloat(itbi[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                itbiMonths.push(valor);
            }
        }
        itbiMonths.push(valorTotal);
        
        fecoepMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < fecoep.length; x++){
                    if (monthsNumbers[i] === fecoep[x].CT2_DATA && fecoep[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(fecoep[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                fecoepMonths.push(valor);
            }else{
                for(var x = 0; x < fecoep.length; x++){
                if (monthsNumbers[i] === fecoep[x].CT2_DATA){
                    var aux = parseFloat(fecoep[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                fecoepMonths.push(valor);
            }
        }
        fecoepMonths.push(valorTotal);
        
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
        for(var x = 0; x < icmsMonths.length -1; x++){
             html += '<td>'+ icmsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+icmsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < issMonths.length -1; x++){
             html += '<td>'+ issMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+issMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < cofinsMonths.length -1; x++){
             html += '<td>'+ cofinsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+cofinsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[3]+'</th>';
        for(var x = 0; x < pisMonths.length -1; x++){
             html += '<td>'+ pisMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+pisMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';    
        
        html += '<tr>';
        html += '<th>'+naturezas[4]+'</th>';
        for(var x = 0; x < irpjMonths.length -1; x++){
             html += '<td>'+ irpjMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+irpjMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';  
        
        html += '<tr>';
        html += '<th>'+naturezas[5]+'</th>';
        for(var x = 0; x < csllMonths.length -1; x++){
             html += '<td>'+ csllMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+csllMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[6]+'</th>';
        for(var x = 0; x < ipvaMonths.length -1; x++){
             html += '<td>'+ ipvaMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+ipvaMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[7]+'</th>';
        for(var x = 0; x < iptuMonths.length -1; x++){
             html += '<td>'+ iptuMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+iptuMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[8]+'</th>';
        for(var x = 0; x < itbiMonths.length -1; x++){
             html += '<td>'+ itbiMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+itbiMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[9]+'</th>';
        for(var x = 0; x < fecoepMonths.length -1; x++){
             html += '<td>'+ fecoepMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+fecoepMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = icmsMonths[i] + issMonths[i] + cofinsMonths[i] +
                            pisMonths[i] + irpjMonths[i] + csllMonths[i] +
                                ipvaMonths[i] + iptuMonths[i] + itbiMonths[i] + fecoepMonths[i];
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = icmsMonths[12] + issMonths[12] + cofinsMonths[12] +
                            pisMonths[12] + irpjMonths[12] + csllMonths[12] +
                                ipvaMonths[12] + iptuMonths[12] + itbiMonths[12] + fecoepMonths[12];
        html += '<th>'+valorAnual.formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
               
        html += '</tbody>';
        html += '</table>';
        document.getElementById("example1").innerHTML = html;
        
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

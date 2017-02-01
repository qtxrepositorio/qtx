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

$naturezas = ['Aluguel','Telefone e Internet','Energia eletrica'
                ,'Agua e esgoto','Material de escritório','Material de limpeza'
                ,'Outras diversas'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Mai', 'Abr', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$totalAnual = 0;

$rentMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($rent as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $rentMonths[] = $valor;
endforeach;
$rentMonths[] = $valorTotal;

$phoneAndInternetMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($phoneAndInternet as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $phoneAndInternetMonths[] = $valor;
endforeach;
$phoneAndInternetMonths[] = $valorTotal;

$electricityMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($electricity as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $electricityMonths[] = $valor;
endforeach;
$electricityMonths[] = $valorTotal;

$waterAndSewageMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($waterAndSewage as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $waterAndSewageMonths[] = $valor;
endforeach;
$waterAndSewageMonths[] = $valorTotal;

$officeSuppliesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($officeSupplies as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $officeSuppliesMonths[] = $valor;
endforeach;
$officeSuppliesMonths[] = $valorTotal;

$cleaningSuppliesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($cleaningSupplies as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $cleaningSuppliesMonths[] = $valor;
endforeach;
$cleaningSuppliesMonths[] = $valorTotal;

$othersMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($others as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $othersMonths[] = $valor;
endforeach;
$othersMonths[] = $valorTotal;

?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Despesas com administrativo</small>
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'AdministrativeExpensesFilter']]);
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'AdministrativeExpensesPdf']]);
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
                    <h3 class="box-title">Despesas administrativas:</h3>
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
                                    <td> <?php echo number_format($rentMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($rentMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[1]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($phoneAndInternetMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($phoneAndInternetMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[2]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($electricityMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($electricityMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[3]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($waterAndSewageMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($waterAndSewageMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[4]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($officeSuppliesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($officeSuppliesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[5]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($cleaningSuppliesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($cleaningSuppliesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[6]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($othersMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($othersMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format($rentMonths[$i] + $phoneAndInternetMonths[$i] + $electricityMonths[$i] +
                                                                    $waterAndSewageMonths[$i] + $officeSuppliesMonths[$i] + $cleaningSuppliesMonths[$i] +
                                                                        $othersMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($rentMonths[12] + $phoneAndInternetMonths[12] + $electricityMonths[12] +
                                                                    $waterAndSewageMonths[12] + $officeSuppliesMonths[12] + $cleaningSuppliesMonths[12] +
                                                                        $othersMonths[12],0,',','.'); ?></th>                                
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
          
        var rent = JSON.parse( '<?php echo json_encode($rent) ?>' );
        var phoneAndInternet = JSON.parse( '<?php echo json_encode($phoneAndInternet) ?>' );
        var electricity = JSON.parse( '<?php echo json_encode($electricity) ?>' );
        var waterAndSewage = JSON.parse( '<?php echo json_encode($waterAndSewage) ?>' );
        var officeSupplies = JSON.parse( '<?php echo json_encode($officeSupplies) ?>' );
        var cleaningSupplies = JSON.parse( '<?php echo json_encode($cleaningSupplies) ?>' );
        var others = JSON.parse( '<?php echo json_encode($others) ?>' );
                
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;        
        var cc = document.getElementById('cc').value;
        
        rentMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < rent.length; x++){
                    if (monthsNumbers[i] === rent[x].CT2_DATA && rent[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(rent[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                rentMonths.push(valor);
            }else{
                for(var x = 0; x < rent.length; x++){
                if (monthsNumbers[i] === rent[x].CT2_DATA){
                    var aux = parseFloat(rent[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                rentMonths.push(valor);
            }
        }
        rentMonths.push(valorTotal);
        
        phoneAndInternetMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < phoneAndInternet.length; x++){
                    if (monthsNumbers[i] === phoneAndInternet[x].CT2_DATA && phoneAndInternet[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(phoneAndInternet[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                phoneAndInternetMonths.push(valor);
            }else{
                for(var x = 0; x < phoneAndInternet.length; x++){
                if (monthsNumbers[i] === phoneAndInternet[x].CT2_DATA){
                    var aux = parseFloat(phoneAndInternet[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                phoneAndInternetMonths.push(valor);
            }
        }
        phoneAndInternetMonths.push(valorTotal);
        
        electricityMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < electricity.length; x++){
                    if (monthsNumbers[i] === electricity[x].CT2_DATA && electricity[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(electricity[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                electricityMonths.push(valor);
            }else{
                for(var x = 0; x < electricity.length; x++){
                if (monthsNumbers[i] === electricity[x].CT2_DATA){
                    var aux = parseFloat(electricity[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                electricityMonths.push(valor);
            }
        }
        electricityMonths.push(valorTotal);
        
        waterAndSewageMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < waterAndSewage.length; x++){
                    if (monthsNumbers[i] === waterAndSewage[x].CT2_DATA && waterAndSewage[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(waterAndSewage[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                waterAndSewageMonths.push(valor);
            }else{
                for(var x = 0; x < electricity.length; x++){
                if (monthsNumbers[i] === electricity[x].CT2_DATA){
                    var aux = parseFloat(electricity[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                waterAndSewageMonths.push(valor);
            }
        }
        waterAndSewageMonths.push(valorTotal);
        
        officeSuppliesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < officeSupplies.length; x++){
                    if (monthsNumbers[i] === officeSupplies[x].CT2_DATA && officeSupplies[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(officeSupplies[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                officeSuppliesMonths.push(valor);
            }else{
                for(var x = 0; x < officeSupplies.length; x++){
                if (monthsNumbers[i] === officeSupplies[x].CT2_DATA){
                    var aux = parseFloat(officeSupplies[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                officeSuppliesMonths.push(valor);
            }
        }
        officeSuppliesMonths.push(valorTotal);
        
        
        cleaningSuppliesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < cleaningSupplies.length; x++){
                    if (monthsNumbers[i] === cleaningSupplies[x].CT2_DATA && cleaningSupplies[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(cleaningSupplies[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                cleaningSuppliesMonths.push(valor);
            }else{
                for(var x = 0; x < cleaningSupplies.length; x++){
                if (monthsNumbers[i] === cleaningSupplies[x].CT2_DATA){
                    var aux = parseFloat(cleaningSupplies[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                cleaningSuppliesMonths.push(valor);
            }
        }
        cleaningSuppliesMonths.push(valorTotal);
        
        othersMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < others.length; x++){
                    if (monthsNumbers[i] === others[x].CT2_DATA && others[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(others[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                othersMonths.push(valor);
            }else{
                for(var x = 0; x < others.length; x++){
                if (monthsNumbers[i] === others[x].CT2_DATA){
                    var aux = parseFloat(others[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                othersMonths.push(valor);
            }
        }
        othersMonths.push(valorTotal);
        
        
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
        for(var x = 0; x < rentMonths.length -1; x++){
             html += '<td>'+ rentMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+rentMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < phoneAndInternetMonths.length -1; x++){
             html += '<td>'+ phoneAndInternetMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+phoneAndInternetMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < waterAndSewageMonths.length -1; x++){
             html += '<td>'+ waterAndSewageMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+waterAndSewageMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';    
        
        html += '<tr>';
        html += '<th>'+naturezas[3]+'</th>';
        for(var x = 0; x < officeSuppliesMonths.length -1; x++){
             html += '<td>'+ officeSuppliesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+officeSuppliesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';  
        
        html += '<tr>';
        html += '<th>'+naturezas[4]+'</th>';
        for(var x = 0; x < cleaningSuppliesMonths.length -1; x++){
             html += '<td>'+ cleaningSuppliesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+cleaningSuppliesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[5]+'</th>';
        for(var x = 0; x < othersMonths.length -1; x++){
             html += '<td>'+ othersMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+othersMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
         html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = rentMonths[i] + phoneAndInternetMonths[i] + electricityMonths[i] +
                            waterAndSewageMonths[i] + officeSuppliesMonths[i] + cleaningSuppliesMonths[i] +
                                othersMonths[i];
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = rentMonths[12] + phoneAndInternetMonths[12] + electricityMonths[12] +
                            waterAndSewageMonths[12] + officeSuppliesMonths[12] + cleaningSuppliesMonths[12] +
                                othersMonths[12];
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

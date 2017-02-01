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

$naturezas = ['Manuntenções','Multas de trânsito','Pseus (novos e renovados)'
                ,'Combustíveis e lubrificantes','Alugueis','Frete, pedagios e correios'
                ,'Materiais', 'Despesas diversas'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Mai', 'Abr', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$totalAnual = 0;

$maintenanceMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($maintenance as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $maintenanceMonths[] = $valor;
endforeach;
$maintenanceMonths[] = $valorTotal;        

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

$tiresMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($tires as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $tiresMonths[] = $valor;
    endforeach;
$tiresMonths[] = $valorTotal;

$fuelAndLubricantsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($fuelAndLubricants as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $fuelAndLubricantsMonths[] = $valor;
endforeach;
$fuelAndLubricantsMonths[] = $valorTotal;

$rentsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($rents as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $rentsMonths[] = $valor;
endforeach;
$rentsMonths[] = $valorTotal;

$freightMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($freight as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $freightMonths[] = $valor;
endforeach;
$freightMonths[] = $valorTotal;

$materialsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($materials as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $materialsMonths[] = $valor;
endforeach;
$materialsMonths[] = $valorTotal;

$variousMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($various as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $variousMonths[] = $valor;
endforeach;
$variousMonths[] = $valorTotal;


?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Despesas com operacional</small>
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'OperationalExpensesFilter']]);
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'OperationalExpensesPdf']]);
                                            echo $this->Form->input('yearPdf', ['default' => $year ,'disabled' => FALSE,'label'=>'Informe o ano desejado:']);
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
                    <h3 class="box-title">Despesas operacionais:</h3>
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
                                    <td> <?php echo number_format($maintenanceMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($maintenanceMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[1]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($finesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($finesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[2]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($tiresMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($tiresMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[3]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($fuelAndLubricantsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($fuelAndLubricantsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[4]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($rentsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($rentsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[5]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($freightMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($freightMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[6]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($materialsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($materialsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[7]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($variousMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($variousMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format($maintenanceMonths[$i] + $finesMonths[$i] + $tiresMonths[$i] +
                                                                    $fuelAndLubricantsMonths[$i] + $rentsMonths[$i] + $freightMonths[$i] +
                                                                        $materialsMonths[$i] + $variousMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($maintenanceMonths[12] + $finesMonths[12] + $tiresMonths[12] +
                                                                    $fuelAndLubricantsMonths[12] + $rentsMonths[12] + $freightMonths[12] +
                                                                        $materialsMonths[12] + $variousMonths[12],0,',','.'); ?></th>                                
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
          
        var maintenance = JSON.parse( '<?php echo json_encode($maintenance) ?>' );
        var fines = JSON.parse( '<?php echo json_encode($fines) ?>' );
        var tires = JSON.parse( '<?php echo json_encode($tires) ?>' );
        var fuelAndLubricants = JSON.parse( '<?php echo json_encode($fuelAndLubricants) ?>' );
        var rents = JSON.parse( '<?php echo json_encode($rents) ?>' );
        var freight = JSON.parse( '<?php echo json_encode($freight) ?>' );
        var materials = JSON.parse( '<?php echo json_encode($materials) ?>' );
        var various = JSON.parse( '<?php echo json_encode($various) ?>' );
        
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;        
        var cc = document.getElementById('cc').value;
        
        maintenanceMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < maintenance.length; x++){
                    if (monthsNumbers[i] === maintenance[x].CT2_DATA && maintenance[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(maintenance[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                maintenanceMonths.push(valor);
            }else{
                for(var x = 0; x < maintenance.length; x++){
                if (monthsNumbers[i] === maintenance[x].CT2_DATA){
                    var aux = parseFloat(maintenance[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                maintenanceMonths.push(valor);
            }
        }
        maintenanceMonths.push(valorTotal);
        
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
        
        tiresMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < tires.length; x++){
                    if (monthsNumbers[i] === tires[x].CT2_DATA && tires[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(tires[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                tiresMonths.push(valor);
            }else{
                for(var x = 0; x < tires.length; x++){
                if (monthsNumbers[i] === tires[x].CT2_DATA){
                    var aux = parseFloat(tires[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                tiresMonths.push(valor);
            }
        }
        tiresMonths.push(valorTotal);
        
        fuelAndLubricantsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < fuelAndLubricants.length; x++){
                    if (monthsNumbers[i] === fuelAndLubricants[x].CT2_DATA && fuelAndLubricants[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(fuelAndLubricants[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                fuelAndLubricantsMonths.push(valor);
            }else{
                for(var x = 0; x < fuelAndLubricants.length; x++){
                if (monthsNumbers[i] === fuelAndLubricants[x].CT2_DATA){
                    var aux = parseFloat(fuelAndLubricants[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                fuelAndLubricantsMonths.push(valor);
            }
        }
        fuelAndLubricantsMonths.push(valorTotal);
        
        rentsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < rents.length; x++){
                    if (monthsNumbers[i] === rents[x].CT2_DATA && rents[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(rents[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                rentsMonths.push(valor);
            }else{
                for(var x = 0; x < rents.length; x++){
                if (monthsNumbers[i] === rents[x].CT2_DATA){
                    var aux = parseFloat(rents[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                rentsMonths.push(valor);
            }
        }
        rentsMonths.push(valorTotal);
        
        freightMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < freight.length; x++){
                    if (monthsNumbers[i] === freight[x].CT2_DATA && freight[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(freight[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                freightMonths.push(valor);
            }else{
                for(var x = 0; x < freight.length; x++){
                if (monthsNumbers[i] === freight[x].CT2_DATA){
                    var aux = parseFloat(freight[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                freightMonths.push(valor);
            }
        }
        freightMonths.push(valorTotal);
        
        materialsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < materials.length; x++){
                    if (monthsNumbers[i] === materials[x].CT2_DATA && materials[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(materials[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                materialsMonths.push(valor);
            }else{
                for(var x = 0; x < materials.length; x++){
                if (monthsNumbers[i] === materials[x].CT2_DATA){
                    var aux = parseFloat(materials[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                materialsMonths.push(valor);
            }
        }
        materialsMonths.push(valorTotal);
        
        variousMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < various.length; x++){
                    if (monthsNumbers[i] === various[x].CT2_DATA && various[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(various[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                variousMonths.push(valor);
            }else{
                for(var x = 0; x < various.length; x++){
                if (monthsNumbers[i] === various[x].CT2_DATA){
                    var aux = parseFloat(various[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                variousMonths.push(valor);
            }
        }
        variousMonths.push(valorTotal); 
        
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
        for(var x = 0; x < maintenanceMonths.length -1; x++){
             html += '<td>'+ maintenanceMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+maintenanceMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < finesMonths.length -1; x++){
             html += '<td>'+ finesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+finesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < tiresMonths.length -1; x++){
             html += '<td>'+ tiresMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+tiresMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[3]+'</th>';
        for(var x = 0; x < fuelAndLubricantsMonths.length -1; x++){
             html += '<td>'+ fuelAndLubricantsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+fuelAndLubricantsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';     
        
        html += '<tr>';
        html += '<th>'+naturezas[4]+'</th>';
        for(var x = 0; x < rentsMonths.length -1; x++){
             html += '<td>'+ rentsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+rentsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';   
        
        html += '<tr>';
        html += '<th>'+naturezas[5]+'</th>';
        for(var x = 0; x < freightMonths.length -1; x++){
             html += '<td>'+ freightMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+freightMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>'; 
        
        html += '<tr>';
        html += '<th>'+naturezas[6]+'</th>';
        for(var x = 0; x < materialsMonths.length -1; x++){
             html += '<td>'+ materialsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+materialsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';  
        
        html += '<tr>';
        html += '<th>'+naturezas[7]+'</th>';
        for(var x = 0; x < variousMonths.length -1; x++){
             html += '<td>'+ variousMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+variousMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>'; 
        
        html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = maintenanceMonths[i] + finesMonths[i] + tiresMonths[i] +
                            fuelAndLubricantsMonths[i] + rentsMonths[i] + freightMonths[i] +
                                materialsMonths[i] + variousMonths[i];
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = maintenanceMonths[12] + finesMonths[12] + tiresMonths[12] +
                        fuelAndLubricantsMonths[12] + rentsMonths[12] + freightMonths[12] +
                            materialsMonths[12] + variousMonths[12];
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

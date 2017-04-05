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

$naturezas = ['Moveis e utensilhos','Maquinas e equipamentos','Veículos'];

$monthsLabels = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
$monthsNumbers = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

$totalAnual = 0;

$furnitureAndUtensilsMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($furnitureAndUtensils as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $furnitureAndUtensilsMonths[] = $valor;
endforeach;
$furnitureAndUtensilsMonths[] = $valorTotal;

$machinesAndEquipmentMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($machinesAndEquipment as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $machinesAndEquipmentMonths[] = $valor;
endforeach;
$machinesAndEquipmentMonths[] = $valorTotal;

$vehiclesMonths = [];
$valorTotal = 0;
foreach($monthsNumbers as $key):
    $valor = 0;
    foreach($vehicles as $x => $value):
        if ($key == $value['CT2_DATA'])
            $valor += $value['CT2_VALOR'];  
            $totalAnual += $valor;
    endforeach;
    $valorTotal += $valor;
    $vehiclesMonths[] = $valor;
endforeach;
$vehiclesMonths[] = $valorTotal;

?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Despesas com investimentos</small>
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'InvestmentExpensesFilter']]);
                                            echo $this->Form->input('year', ['default' => $year ,'disabled' => FALSE,'label'=>' ']);
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
                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'InvestmentExpensesPdf']]);
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
                    <h3 class="box-title">Despesas Com investimentos:</h3>
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
                                    <td> <?php echo number_format($furnitureAndUtensilsMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($furnitureAndUtensilsMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[1]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($machinesAndEquipmentMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($machinesAndEquipmentMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo $naturezas[2]; ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){ ?>
                                    <td> <?php echo number_format($vehiclesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($vehiclesMonths[12],0,',','.');; ?></th>
                            </tr>
                            
                            <tr>
                                <th><?php echo 'Total' ?></th>
                                <?php for ($i = 0; $i <= 11; $i++){  ?>
                                    <td> <?php echo number_format($furnitureAndUtensilsMonths[$i] + $machinesAndEquipmentMonths[$i] + $vehiclesMonths[$i],0,',','.'); ?> </td>
                                <?php } ?>
                                <th><?php echo number_format($furnitureAndUtensilsMonths[12] + $machinesAndEquipmentMonths[12] + $vehiclesMonths[12],0,',','.'); ?></th>                                
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
          
        var furnitureAndUtensils = JSON.parse( '<?php echo json_encode($furnitureAndUtensils) ?>' );
        var machinesAndEquipment = JSON.parse( '<?php echo json_encode($machinesAndEquipment) ?>' );
        var vehicles = JSON.parse( '<?php echo json_encode($vehicles) ?>' );
                        
        var naturezas = JSON.parse( '<?php echo json_encode($naturezas) ?>' );
        
        var monthsNumbers = JSON.parse( '<?php echo json_encode($monthsNumbers) ?>' );
        var monthsLabels = JSON.parse( '<?php echo json_encode($monthsLabels) ?>' );
        
        var totalAnual = 0;        
        var cc = document.getElementById('cc').value;
        
        furnitureAndUtensilsMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < furnitureAndUtensils.length; x++){
                    if (monthsNumbers[i] === furnitureAndUtensils[x].CT2_DATA && furnitureAndUtensils[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(furnitureAndUtensils[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                furnitureAndUtensilsMonths.push(valor);
            }else{
                for(var x = 0; x < furnitureAndUtensils.length; x++){
                if (monthsNumbers[i] === furnitureAndUtensils[x].CT2_DATA){
                    var aux = parseFloat(furnitureAndUtensils[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                furnitureAndUtensilsMonths.push(valor);
            }
        }
        furnitureAndUtensilsMonths.push(valorTotal);
        
        machinesAndEquipmentMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < machinesAndEquipment.length; x++){
                    if (monthsNumbers[i] === machinesAndEquipment[x].CT2_DATA && machinesAndEquipment[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(machinesAndEquipment[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                machinesAndEquipmentMonths.push(valor);
            }else{
                for(var x = 0; x < machinesAndEquipment.length; x++){
                if (monthsNumbers[i] === machinesAndEquipment[x].CT2_DATA){
                    var aux = parseFloat(machinesAndEquipment[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                machinesAndEquipmentMonths.push(valor);
            }
        }
        machinesAndEquipmentMonths.push(valorTotal);
        
        vehiclesMonths = [];
        valorTotal = 0; 
        for(var i = 0; i < monthsNumbers.length; i++){ 
            valor = 0;
            if(cc != 'TODOS'){
                for(var x = 0; x < vehicles.length; x++){
                    if (monthsNumbers[i] === vehicles[x].CT2_DATA && vehicles[x].CT2_CCD.substring(0,2) === cc.substring(0,2)){
                        var aux = parseFloat(vehicles[x].CT2_VALOR);
                        valor += aux;
                    }
                    totalAnual += valor;
                }
                valorTotal += valor;
                vehiclesMonths.push(valor);
            }else{
                for(var x = 0; x < vehicles.length; x++){
                if (monthsNumbers[i] === vehicles[x].CT2_DATA){
                    var aux = parseFloat(vehicles[x].CT2_VALOR);
                    valor += aux;
                }
                totalAnual += valor;
                }
                valorTotal += valor;
                vehiclesMonths.push(valor);
            }
        }
        vehiclesMonths.push(valorTotal);
        
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
        for(var x = 0; x < furnitureAndUtensilsMonths.length -1; x++){
             html += '<td>'+ furnitureAndUtensilsMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+furnitureAndUtensilsMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[1]+'</th>';
        for(var x = 0; x < machinesAndEquipmentMonths.length -1; x++){
             html += '<td>'+ machinesAndEquipmentMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+machinesAndEquipmentMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
        
        html += '<tr>';
        html += '<th>'+naturezas[2]+'</th>';
        for(var x = 0; x < vehiclesMonths.length -1; x++){
             html += '<td>'+ vehiclesMonths[x].formatMoney(0, ',', '.'); +'</td>';
        }
        html += '<th>'+vehiclesMonths[12].formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';    
        
      
        html += '<tr>';
        html += '<th>Total</th>';
        for (i = 0; i <= 11; i++){
            valorMensal = furnitureAndUtensilsMonths[i] + machinesAndEquipmentMonths[i] + vehiclesMonths[i];
            html += '<th>'+valorMensal.formatMoney(0, ',', '.')+'</th>';
        }
        valorAnual = furnitureAndUtensilsMonths[12] + machinesAndEquipmentMonths[12] + vehiclesMonths[12];
        html += '<th>'+valorAnual.formatMoney(0, ',', '.')+'</th>';
        html += '</tr>';
               
        html += '</tbody>';
        html += '</table>';
        document.getElementById("example1").innerHTML = html;
        
    });
</script>
<?php $this->end(); ?>



<?php $this->Html->script(['AdminLTE./plugins/excellentexport/excellentexport.min.js',], ['block' => 'script']); ?>


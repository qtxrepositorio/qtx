<?php

$months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']; 

$costCentersNamesFinish['TODOS'] = 'TODOS';
for ($i = 0; $i < count($costCentersNames); $i++) {
    
    if (!in_array($costCentersNames[$i]['CENTRO_DE_CUSTO'], $costCentersNamesFinish)) {
        $costCentersNamesFinish[$costCentersNames[$i]['CENTRO_DE_CUSTO']] = $costCentersNames[$i]['CENTRO_DE_CUSTO'];
    }
}

?>

<section class="content-header">
    <h1>
        Painel
        <small>Controroladoria - Receitas</small>
    </h1>      
</section> 

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de Receitas</h3>
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
                        <div class="col-md-3">
                        </div>
                        <div align="center" class="col-md-6">
                            
                            <div class="col-md-6">
                                <?php
                                    $yearOne = null;
                                    echo $this->Form->create($yearOne,['url' => ['controller'=>'Controllership','action' => 'RevenueTableFilter']]);
                                    echo $this->Form->input('yearOne', ['id'=>'yearOne','label'=>'Ano tabela 1 (Maior):']); 
                                ?>
                            </div>

                             <div class="col-md-6">
                                <?php                                                             
                                    echo $this->Form->input('yearTwo', ['id'=>'yearTwo','label'=>'Ano tabela 2 (Menor):']);
                                ?>
                            </div>
                            
                            <button class="btn btn-success" type="submit"><?php echo __('Refinar Tabelas'); ?>
                            </button>
                                <?php echo $this->Form->end();   ?>

                        </div>

                        <div class="col-md-3">
                        </div>
                    </div>

                    <hr  width="100%">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div align="center" class="col-md-6">
                                <h4>Tabela 1</h4>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('', ['label'=>'Centro de custo:', 'id' => 'filtroAtual', 'options' => $costCentersNamesFinish]);
                                    ?>                        
                                </div>
                                <table id="example1" class="table table-bordered table-hover">
                                    <?php
                                        $month01 = 0;
                                        $month02 = 0;
                                        $month03 = 0;
                                        $month04 = 0;
                                        $month05 = 0;
                                        $month06 = 0;
                                        $month07 = 0;
                                        $month08 = 0;
                                        $month09 = 0;
                                        $month10 = 0;
                                        $month11 = 0;
                                        $month12 = 0;     
                                        foreach ($revenueYearCurrent as $key => $value) {
                                            if ($value['MES'] == 'Janeiro') {
                                                $month01 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Fevereiro') {
                                                $month02 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Março') {
                                                $month03 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Abril') {
                                                $month04 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Maio') {
                                                $month05 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Junho') {
                                                $month06 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Julho') {
                                                $month07 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Agosto') {
                                                $month08 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Setembro') {
                                                $month09 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Outubro') {
                                                $month10 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Novembro') {
                                                $month11 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Dezembro') {
                                                $month12 += $value['VALOR'];
                                            }                                    
                                        }
                                        $allMonths = [$month01, $month02, $month03, $month04,
                                                 $month05, $month06, $month07, $month08,
                                                 $month09, $month10, $month11, $month12];
                                    ?>
                                    <thead>
                                        <tr>                                
                                            <th>Mês</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>                             
                                        <?php
                                            $sum = 0;
                                            for ($i=0; $i < 12; $i++) {  
                                            ?>
                                                <tr>
                                                    <th><?php echo $months[$i] ?></th>
                                                    <td><?php echo 'R$ '. number_format($allMonths[$i], 2, ',', '.'); ?></td>
                                                </tr>
                                        <?php
                                            $sum += $allMonths[$i];   
                                            }
                                        ?>

                                        <tr>
                                            <th><?php echo 'Total Anual' ?></th>
                                            <td><?php echo 'R$ '. number_format($sum, 2, ',', '.'); ?>
                                            </td>
                                        </tr> 

                                    </tbody> 
                                </table>                                
                            </div>
                            <div align="center" class="col-md-6">
                                <h4>Tabela 2</h4>
                                <div class="col-md-6">                                    
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('', ['label'=>'Centro de custo:','id' => 'filtroAnterior', 'options' => $costCentersNamesFinish]);
                                    ?>                        
                                </div>
                                <table id="example2" class="table table-bordered table-hover">
                                    <?php
                                        $month01 = 0;
                                        $month02 = 0;
                                        $month03 = 0;
                                        $month04 = 0;
                                        $month05 = 0;
                                        $month06 = 0;
                                        $month07 = 0;
                                        $month08 = 0;
                                        $month09 = 0;
                                        $month10 = 0;
                                        $month11 = 0;
                                        $month12 = 0;                              
                                        foreach ($revenueYearLast as $key => $value) {
                                            if ($value['MES'] == 'Janeiro') {
                                                $month01 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Fevereiro') {
                                                $month02 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Março') {
                                                $month03 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Abril') {
                                                $month04 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Maio') {
                                                $month05 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Junho') {
                                                $month06 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Julho') {
                                                $month07 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Agosto') {
                                                $month08 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Setembro') {
                                                $month09 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Outubro') {
                                                $month10 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Novembro') {
                                                $month11 += $value['VALOR'];
                                            }else if ($value['MES'] == 'Dezembro') {
                                                $month12 += $value['VALOR'];
                                            }                                    
                                        }
                                        $allMonths = [$month01, $month02, $month03, $month04,
                                                 $month05, $month06, $month07, $month08,
                                                 $month09, $month10, $month11, $month12];  
                                    ?>
                                    <thead>
                                        <tr>                                
                                            <th>Mês</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>                             
                                        <?php
                                            $sum = 0;
                                            for ($i=0; $i < 12; $i++) { 
                                            ?>
                                                <tr>
                                                    <th><?php echo $months[$i] ?></th>
                                                    <td><?php echo 'R$ '. number_format($allMonths[$i], 2, ',', '.'); ?></td>
                                                </tr>
                                        <?php   
                                            $sum += $allMonths[$i];   
                                            }
                                        ?>  
                                        <tr>
                                            <th><?php echo 'Total Anual' ?></th>
                                            <td><?php echo 'R$ '. number_format($sum, 2, ',', '.'); ?>
                                            </td>
                                        </tr> 

                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>        
    </div>
</section> 

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
?> 

<?php $this->start('scriptBotton'); ?>
<script>


$(function() {

    var oneYear = JSON.parse( '<?php echo json_encode($oneYear) ?>' );
    var twoYear = JSON.parse( '<?php echo json_encode($twoYear) ?>' );    

    document.getElementById("yearOne").value = oneYear;
    document.getElementById("yearTwo").value = twoYear;
    
    $("#filtroAtual").change(function() { 
        var revenueYearCurrent = JSON.parse( '<?php echo json_encode($revenueYearCurrent) ?>' );
        var months = JSON.parse( '<?php echo json_encode($months) ?>' );
        var cc = document.getElementById('filtroAtual').value; 
        month01 = 0;
        month02 = 0;
        month03 = 0;
        month04 = 0;
        month05 = 0;
        month06 = 0;
        month07 = 0;
        month08 = 0;
        month09 = 0;
        month10 = 0;
        month11 = 0;
        month12 = 0;
        for (var x = 0; x < revenueYearCurrent.length; x++) {
            if (cc == 'TODOS') {
                if (revenueYearCurrent[x].MES == 'Janeiro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month01 += aux;
                }else if (revenueYearCurrent[x].MES == 'Fevereiro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month02 += aux;
                }else if (revenueYearCurrent[x].MES == 'Março') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month03 += aux;
                }else if (revenueYearCurrent[x].MES == 'Abril') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month04 += aux;
                }else if (revenueYearCurrent[x].MES == 'Maio') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month05 += aux;
                }else if (revenueYearCurrent[x].MES == 'Junho') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month06 += aux;
                }else if (revenueYearCurrent[x].MES == 'Julho') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month07 += aux;  
                }else if (revenueYearCurrent[x].MES == 'Agosto') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month08 += aux;
                }else if (revenueYearCurrent[x].MES == 'Setembro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month09 += aux;
                }else if (revenueYearCurrent[x].MES == 'Outubro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month10 += aux;
                }else if (revenueYearCurrent[x].MES == 'Novembro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month11 += aux;
                }else if (revenueYearCurrent[x].MES == 'Dezembro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month12 += aux;
                }    
            }else if (cc == revenueYearCurrent[x].CENTRO_DE_CUSTO) {
                if (revenueYearCurrent[x].MES == 'Janeiro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month01 += aux;
                }else if (revenueYearCurrent[x].MES == 'Fevereiro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month02 += aux;
                }else if (revenueYearCurrent[x].MES == 'Março') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month03 += aux;
                }else if (revenueYearCurrent[x].MES == 'Abril') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month04 += aux;
                }else if (revenueYearCurrent[x].MES == 'Maio') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month05 += aux;
                }else if (revenueYearCurrent[x].MES == 'Junho') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month06 += aux;
                }else if (revenueYearCurrent[x].MES == 'Julho') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month07 += aux;  
                }else if (revenueYearCurrent[x].MES == 'Agosto') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month08 += aux;
                }else if (revenueYearCurrent[x].MES == 'Setembro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month09 += aux;
                }else if (revenueYearCurrent[x].MES == 'Outubro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month10 += aux;
                }else if (revenueYearCurrent[x].MES == 'Novembro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month11 += aux;
                }else if (revenueYearCurrent[x].MES == 'Dezembro') {
                    var aux = parseFloat(revenueYearCurrent[x].VALOR);
                    month12 += aux;
                }  
            }      
        }
        var allMonthsCurrent = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var table = '<table id="example2" class="table table-bordered table-hover">';

        /// cabeçalho
        var thead = '<thead>';
        thead += '<tr>'
                    +'<th>Mês</th>'
                    +'<th>Valor</th>'
                +'</tr>';
        thead += '</thead>';
        table += thead;        
        
        var sum = 0;
        /// corpo
        var tbody = '<tbody>';
        for (i=0; i < 12; i++) { 
                                
            tbody += '<tr>'
                        +'<th>' + months[i] + '</th>'
                        +'<td>' + allMonthsCurrent[i].toLocaleString("pt-br",{style:"currency", currency:"BRL"}); + '</td>'
                    +'<tr>';

            sum += allMonthsCurrent[i];

        }

        tbody +='<tr>'
                    +'<th>Total Anual</th>'
                    +'<td>' + sum.toLocaleString("pt-br",{style:"currency", currency:"BRL"}); + '</td>'
                +'<tr>';

        tbody += '</tbody>';
                            
        table += tbody;

        table += '</table>';

        var container = document.getElementById("example1");
        container.innerHTML = table;

    })

    $("#filtroAnterior").change(function() { 
        var revenueYearLast = JSON.parse( '<?php echo json_encode($revenueYearLast) ?>' );
        var months = JSON.parse( '<?php echo json_encode($months) ?>' );
        var cc = document.getElementById('filtroAnterior').value; 
        month01 = 0;
        month02 = 0;
        month03 = 0;
        month04 = 0;
        month05 = 0;
        month06 = 0;
        month07 = 0;
        month08 = 0;
        month09 = 0;
        month10 = 0;
        month11 = 0;
        month12 = 0;
        for (var x = 0; x < revenueYearLast.length; x++) {
            if (cc == 'TODOS') {
                if (revenueYearLast[x].MES == 'Janeiro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month01 += aux;
                }else if (revenueYearLast[x].MES == 'Fevereiro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month02 += aux;
                }else if (revenueYearLast[x].MES == 'Março') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month03 += aux;
                }else if (revenueYearLast[x].MES == 'Abril') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month04 += aux;
                }else if (revenueYearLast[x].MES == 'Maio') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month05 += aux;
                }else if (revenueYearLast[x].MES == 'Junho') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month06 += aux;
                }else if (revenueYearLast[x].MES == 'Julho') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month07 += aux;  
                }else if (revenueYearLast[x].MES == 'Agosto') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month08 += aux;
                }else if (revenueYearLast[x].MES == 'Setembro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month09 += aux;
                }else if (revenueYearLast[x].MES == 'Outubro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month10 += aux;
                }else if (revenueYearLast[x].MES == 'Novembro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month11 += aux;
                }else if (revenueYearLast[x].MES == 'Dezembro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month12 += aux;
                }    
            }else if (cc == revenueYearLast[x].CENTRO_DE_CUSTO) {
                if (revenueYearLast[x].MES == 'Janeiro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month01 += aux;
                }else if (revenueYearLast[x].MES == 'Fevereiro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month02 += aux;
                }else if (revenueYearLast[x].MES == 'Março') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month03 += aux;
                }else if (revenueYearLast[x].MES == 'Abril') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month04 += aux;
                }else if (revenueYearLast[x].MES == 'Maio') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month05 += aux;
                }else if (revenueYearLast[x].MES == 'Junho') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month06 += aux;
                }else if (revenueYearLast[x].MES == 'Julho') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month07 += aux;  
                }else if (revenueYearLast[x].MES == 'Agosto') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month08 += aux;
                }else if (revenueYearLast[x].MES == 'Setembro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month09 += aux;
                }else if (revenueYearLast[x].MES == 'Outubro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month10 += aux;
                }else if (revenueYearLast[x].MES == 'Novembro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month11 += aux;
                }else if (revenueYearLast[x].MES == 'Dezembro') {
                    var aux = parseFloat(revenueYearLast[x].VALOR);
                    month12 += aux;
                }  
            }      
        }
        var allMonthsLast = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var table = '<table id="example2" class="table table-bordered table-hover">';

        var sum = 0;
        /// cabeçalho
        var thead = '<thead>';
        thead += '<tr>'
                    +'<th>Mês</th>'
                    +'<th>Valor</th>'
                +'</tr>';
        thead += '</thead>';
        table += thead;

        /// corpo
        var tbody = '<tbody>';
        for (i=0; i < 12; i++) { 
                                
            tbody += '<tr>'
                        +'<th>' + months[i] + '</th>'
                        +'<td>' + allMonthsLast[i].toLocaleString("pt-br",{style:"currency", currency:"BRL"}); + '</td>'
                    +'<tr>';

             sum += allMonthsCurrent[i];

        }

        tbody +='<tr>'
                    +'<th>Total Anual</th>'
                    +'<td>' + sum.toLocaleString("pt-br",{style:"currency", currency:"BRL"}); + '</td>'
                +'<tr>';

        tbody += '</tbody>';
                            
        table += tbody;

        table += '</table>';

        var container = document.getElementById("example2");
        container.innerHTML = table;

    })
});

</script>
<?php $this->end(); ?>


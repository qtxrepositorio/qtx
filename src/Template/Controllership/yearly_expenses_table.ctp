<?php 

$months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']; 

$month01One = 0;
$month02One = 0;
$month03One = 0;
$month04One = 0;
$month05One = 0;
$month06One = 0;
$month07One = 0;
$month08One = 0;
$month09One = 0;
$month10One = 0;
$month11One = 0;
$month12One = 0;     
foreach ($existRefOne as $key => $value) {
    if ($value['MES'] == 1) {
        $month01One += $value['TOTAL'];
    }else if ($value['MES'] == 2) {
        $month02One += $value['TOTAL'];
    }else if ($value['MES'] == 3) {
        $month03One += $value['TOTAL'];
    }else if ($value['MES'] == 4) {
        $month04One += $value['TOTAL'];
    }else if ($value['MES'] == 5) {
        $month05One += $value['TOTAL'];
    }else if ($value['MES'] == 6) {
        $month06One += $value['TOTAL'];
    }else if ($value['MES'] == 7) {
        $month07One += $value['TOTAL'];
    }else if ($value['MES'] == 8) {
        $month08One += $value['TOTAL'];
    }else if ($value['MES'] == 9) {
        $month09One += $value['TOTAL'];
    }else if ($value['MES'] == 10) {
        $month10One += $value['TOTAL'];
    }else if ($value['MES'] == 11) {
        $month11One += $value['TOTAL'];
    }else if ($value['MES'] == 12) {
        $month12One += $value['TOTAL'];
    }                                    
}

$allMonthsOne = [$month01One, $month02One, $month03One, $month04One,
         $month05One, $month06One, $month07One, $month08One,
         $month09One, $month10One, $month11One, $month12One];

$month01Two = 0;
$month02Two = 0;
$month03Two = 0;
$month04Two = 0;
$month05Two = 0;
$month06Two = 0;
$month07Two = 0;
$month08Two = 0;
$month09Two = 0;
$month10Two = 0;
$month11Two = 0;
$month12Two = 0;     
foreach ($existRefTwo as $key => $value) {
    if ($value['MES'] == 1) {
        $month01Two += $value['TOTAL'];
    }else if ($value['MES'] == 2) {
        $month02Two += $value['TOTAL'];
    }else if ($value['MES'] == 3) {
        $month03Two += $value['TOTAL'];
    }else if ($value['MES'] == 4) {
        $month04Two += $value['TOTAL'];
    }else if ($value['MES'] == 5) {
        $month05Two += $value['TOTAL'];
    }else if ($value['MES'] == 6) {
        $month06Two += $value['TOTAL'];
    }else if ($value['MES'] == 7) {
        $month07Two += $value['TOTAL'];
    }else if ($value['MES'] == 8) {
        $month08Two += $value['TOTAL'];
    }else if ($value['MES'] == 9) {
        $month09Two += $value['TOTAL'];
    }else if ($value['MES'] == 10) {
        $month10Two += $value['TOTAL'];
    }else if ($value['MES'] == 11) {
        $month11Two += $value['TOTAL'];
    }else if ($value['MES'] == 12) {
        $month12Two += $value['TOTAL'];
    }                                    
}

$allMonthsTwo = [$month01Two, $month02Two, $month03Two, $month04Two,
         $month05Two, $month06Two, $month07Two, $month08Two,
         $month09Two, $month10Two, $month11Two, $month12Two];

?> 

<section class="content-header">
    <h1>
        Painel
        <small>Controroladoria - Despesas</small>
    </h1>      
</section> 

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de despesas</h3>
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

                        <?php
                            $x=0;
                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'YearlyExpensesTableFilter']]);
                        ?>
                		<div class="col-md-3">
						</div>
	                	<div class="col-md-6">
                            <div class="col-md-4">
                                <?php

                                    echo $this->Form->input('cc', ['id'=>'cc','label'=>'Centro de custo: *']);   
                                ?>
                            </div>
	                		<div class="col-md-4">
	                			<?php

                                	echo $this->Form->input('yearOne', ['id'=>'yearOne','label'=>'Ano 1 (Maior):']); 

                                ?>
	                		</div>
	                		<div class="col-md-4">
	                			<?php
	                				  
                                	echo $this->Form->input('yearTwo', ['id'=>'yearTwo','label'=>'Ano 2 (Menor):']);

                                ?>
	                		</div>
	                		
	                		<div class="col-md-12" align="center">	
                                <h5>
                                    * Use o centro de custo vazio no caso de querer todos.
                                </h5> 
	                			<button class="btn btn-success" type="submit"><?php echo __('Refinar Tabelas'); ?>
                                </button>
                                <?php echo $this->Form->end();   ?>
	                		</div>
	                    </div>
	                    <div class="col-md-3">
						</div>
	                </div>

                    <hr  width="100%">

    	            <div align="center" class="row"> 

                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">

                                <thead>
                                    <tr align="center">
                                        <td>Mês</td>
                                        <td>Valor Ano 1</td>
                                        <td>Valor Ano 2</td>
                                        <td>Diferença </td>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                    <?php 
                                        $totalOne = 0;
                                        $totalTwo = 0;
                                        $difference = 0;
                                        $x = 0; 
                                    ?>
                                    <?php foreach ($months as $key => $value):?>
                                        <tr align="center">

                                            <td class="default"><?php echo($value); ?></td>
                                            
                                            <td class="success">
                                                <?php 
                                                    if ($allMonthsOne[$x] != 0) 
                                                        echo(number_format($allMonthsOne[$x],2,',','.')); 
                                                    else
                                                        echo("Mês não apurado!");                           
                                                ?>
                                            </td>

                                            <td class="warning">
                                                <?php 
                                                    echo(number_format($allMonthsTwo[$x],2,',', '.')); 
                                                ?>
                                            </td>

                                            <td class="info">
                                                <?php 
                                                    if ($allMonthsOne[$x] != 0) 
                                                        echo(number_format($allMonthsOne[$x] - $allMonthsTwo[$x],2,',','.')); 
                                                    else
                                                        echo("Não existe diferença.");
                                                ?>
                                            </td>

                                        </tr>  
                                    <?php 
                                        $totalOne += $allMonthsOne[$x];
                                        $totalTwo += $allMonthsTwo[$x];
                                        $difference += $allMonthsOne[$x] - $allMonthsTwo[$x];
                                        $x++;
                                    ?> 
                                    <?php endforeach ?> 

                                    <td align="center" class="default"><?php echo("Total Anual"); ?></td>
                                    <td align="center" class="success">
                                        <?php 
                                            echo(number_format($totalOne,2,',', '.')); 
                                        ?>
                                    </td>
                                    <td align="center" class="warning">
                                        <?php 
                                            echo(number_format($totalTwo,2,',', '.')); 
                                        ?>
                                    </td>
                                    <td align="center" class="info">
                                        <?php 
                                            echo(number_format($difference,2,',', '.')); 
                                        ?>
                                    </td>                          
                                </tbody>    
                            </table>
                        </div>                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 

<?php $this->start('scriptBotton'); ?>
<script>

var date = new Date();
var month = date.getMonth();
var year = date.getFullYear();
document.getElementById("yearOne").value = year;
document.getElementById("yearTwo").value = year-1;
document.getElementById("cc").value = "01";

$(document).ready(function(){
	
   /* $('#example2').DataTable({    	
    	"language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
        		"sNext": "Próximo",
        		"sPrevious": "Anterior"
      		}
        }
    });

    $('#example1').DataTable({
    	"language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
        		"sNext": "Próximo",
        		"sPrevious": "Anterior"
      		}
        }
    }); */

});

</script>
<?php $this->end(); ?>


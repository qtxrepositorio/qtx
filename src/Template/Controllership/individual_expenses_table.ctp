<?php 

$totalForPercentageOne = $expensesTableOne[0]['TOTAL'];
$totalForPercentageTwo = $expensesTableTwo[0]['TOTAL'];

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

                		<div class="col-md-3">
						</div>
	                	<div class="col-md-6">
	                		<div class="col-md-6">
	                			<?php
                                    $x=0;
                                    echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'individualExpensesTableFilter']]);

                                	echo $this->Form->input('dayInitial', ['id'=>'dayInitial','label'=>'Dia inicial:']);

                                	echo $this->Form->input('dayEnd', ['id'=>'dayEnd','label'=>'Dia final:']);

                                	echo $this->Form->input('month', ['id'=>'month','label'=>'Mês:']);
                                ?>
	                		</div>
	                		<div class="col-md-6">
	                			<?php
	                				echo $this->Form->input('yearOne', ['id'=>'yearOne','label'=>'Ano tabela 1:']);     

                                	echo $this->Form->input('yearTwo', ['id'=>'yearTwo','label'=>'Ano tabela 2:']);

                                	echo $this->Form->input('cc', ['id'=>'cc','label'=>'Centro de custo: *']);
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

	                <div class="row">


	                	<div class="box-body">
	            
		                	<div align="center" class="col-md-6">
		                		<h4 class="box-title">Tabela 1</h4>
		                		<table id="example1" class="table table-bordered table-hover">
		                			<thead>
			                            <tr>                                
			                                <th>DESCRIÇÃO</th>
			                                <th>VALOR</th>
                                            <th>%</th>
			                            </tr>
	                        		</thead>
	                        		<tbody>                             
			                        	
			                        	<?php foreach ($expensesTableOne as $key => $value): ?>

			                        		<tr>
                                        		<th><?php echo $value['Descricao'] ?></th>
                                        		
                                        		<td><?php echo number_format($value['TOTAL'], 2); ?></td>

                                                <td><?php echo number_format((($value['TOTAL'] * 100) / $totalForPercentageOne),2) . ' %' ?></td>
                                    		</tr>
			                        			                                	
										<?php endforeach ?>		                                
			                            			                              
			                        </tbody> 
		                		</table>
		                    </div>

		                	<div align="center" class="col-md-6">
		                		<h4 class="box-title">Tabela 2</h4>
		                		<table id="example2" class="table table-bordered table-hover">
		                			<thead>
			                            <tr>                                
			                                <th>DESCRIÇÃO</th>
			                                <th>VALOR</th>
                                            <th>%</th>
			                            </tr>
	                        		</thead>
	                        		<tbody>                             
			                        	
			                        	<?php foreach ($expensesTableTwo as $key => $value): ?>

			                        		<tr>
                                        		<th><?php echo $value['Descricao'] ?></th>
                                        		
                                        		<td><?php echo number_format($value['TOTAL'], 2); ?></td>

                                                <td><?php echo number_format((($value['TOTAL'] * 100) / $totalForPercentageTwo),2) . ' %' ?></td>
                                    		</tr>
			                        			                                	
										<?php endforeach ?>		                                
			                            			                              
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

document.getElementById("dayInitial").value = '01';
document.getElementById("dayEnd").value = '31'; 
var date = new Date();
var month = date.getMonth();
var year = date.getFullYear();
document.getElementById("month").value = month+1;
document.getElementById("yearOne").value = year;
document.getElementById("yearTwo").value = year-1;
document.getElementById("cc").value = "01";

$(document).ready(function(){
	
    $('#example2').DataTable({    	
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
    });

});
</script>
<?php $this->end(); ?>


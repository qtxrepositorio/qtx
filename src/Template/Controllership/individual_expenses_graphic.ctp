<?php //debug($expensesTableTwo); ?>

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
                                    echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'individualExpensesGraphicFilter']]);

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
	                			<button class="btn btn-success" type="submit"><?php echo __('Refinar Gráficos'); ?>
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

	                		<div align="right">
                        		<button class="btn btn-success" id="save-btn-01">Gerar imagem</button>
                    		</div>
                    		<div class="chart">          
                        		<canvas id="lineChart" height="110"></canvas>    
                    		</div>

                    		<hr  width="100%">

                    		<div align="right">
                        		<button class="btn btn-success" id="save-btn-01">Gerar imagem</button>
                    		</div>
                    		<div class="chart">          
                        		<canvas id="barChart" height="110"></canvas>    
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

var expensesTableOne = JSON.parse( '<?php echo json_encode($expensesTableOne) ?>' );
var expensesTableTwo = JSON.parse( '<?php echo json_encode($expensesTableTwo) ?>' );

var yearTableOne = JSON.parse( '<?php echo json_encode($yearTableOne) ?>' );
var yearTableTwo = JSON.parse( '<?php echo json_encode($yearTableTwo) ?>' );

expensesTableOneValue = [];
for (var i = 0; i < expensesTableOne.length; i++) {
	expensesTableOneValue.push(expensesTableOne[i].TOTAL);
};

expensesTableTwoValue = [];
for (var i = 0; i < expensesTableTwo.length; i++) {
	expensesTableTwoValue.push(expensesTableTwo[i].TOTAL);
};





ctx = document.getElementById("lineChart");
    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['PESSOAL', 'ADMINISTRATIVA', 'OPERACIONAL', 'IMPOSTOS E ENCARGOS', 'FINANCEIRA', 'INVESTIMENTOS', 'DESPESAS TRANSPORTE CARRETAS'],
            datasets: [
                {
                    label: yearTableOne,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: expensesTableOneValue,
                    spanGaps: false                    
                },
                {
                    label: yearTableTwo,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(9, 49, 234, 0.4)",
                    borderColor: "rgba(9, 49, 234, 1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(9, 49, 234, 1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(9, 49, 234, 1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: expensesTableTwoValue,
                    spanGaps: false                    
                }
            ]
        },
        options: {
            tooltips: {
                callbacks: {      
                    label: function(tooltipItem, data) {
                        var aux = parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
                        return aux.toLocaleString("pt-br",{style:"currency", currency:"BRL"});
                    }
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
            }

        }
    });


    ctx2 = document.getElementById("barChart");
    myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['PESSOAL', 'ADMINISTRATIVA', 'OPERACIONAL', 'IMPOSTOS E ENCARGOS', 'FINANCEIRA', 'INVESTIMENTOS', 'DESPESAS TRANSPORTE CARRETAS'],
            datasets: [
                {
                    label: yearTableOne,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: expensesTableOneValue,
                    spanGaps: false                    
                },
                {
                    label: yearTableTwo,
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(9, 49, 234, 0.4)",
                    borderColor: "rgba(9, 49, 234, 1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(9, 49, 234, 1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(9, 49, 234, 1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: expensesTableTwoValue,
                    spanGaps: false                    
                }
            ]
        },
        options: {
            tooltips: {
                callbacks: {      
                    label: function(tooltipItem, data) {
                        var aux = parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
                        return aux.toLocaleString("pt-br",{style:"currency", currency:"BRL"});
                    }
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
            }

        }
    });

</script>
<?php $this->end(); ?>


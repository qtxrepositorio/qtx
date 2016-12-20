<?php
//debug($existRefOne);
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
                    <h3 class="box-title">Gráficos de Despesas</h3>
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
		                    echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'YearlyExpensesGraphicFilter']]);
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
			                	<button class="btn btn-success" type="submit"><?php echo __('Refinar Gráficos'); ?></button>
		                        <?php echo $this->Form->end();   ?>
			               </div>
			            </div>
			            <div class="col-md-3">
						</div>
					</div>

					
                    <hr  width="100%">
                    

                    <div align="right">
                        <button class="btn btn-success" id="save-btn-01">Gerar imagem</button>
                    </div>
                    <div class="chart">          
                        <canvas id="lineChart" height="110"></canvas>    
                    </div>

                    <br><br>
                    <hr  width="100%">
                    <br><br>

                    <div align="right">
                        <button class="btn btn-success" id="save-btn-02">Gerar imagem</button>
                    </div>
                    <div class="chart">          
                        <canvas id="barChart" height="110"></canvas>    
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

var date = new Date();
var month = date.getMonth();
var year = date.getFullYear();
document.getElementById("yearOne").value = year;
document.getElementById("yearTwo").value = year-1;
document.getElementById("cc").value = "01";

months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']; 

var existRefOne = JSON.parse( '<?php echo json_encode($existRefOne) ?>' );

var month01One = 0;
var month02One = 0;
var month03One = 0;
var month04One = 0;
var month05One = 0;
var month06One = 0;
var month07One = 0;
var month08One = 0;
var month09One = 0;
var month10One = 0;
var month11One = 0;
var month12One = 0;  

for (var x = 0; x < existRefOne.length; x++) {
    if (existRefOne[x].MES == 1) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month01One += aux;
    }else if (existRefOne[x].MES == 2) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month02One += aux;
    }else if (existRefOne[x].MES == 3) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month03One += aux;
    }else if (existRefOne[x].MES == 4) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month04One += aux;
    }else if (existRefOne[x].MES == 5) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month05One += aux;
    }else if (existRefOne[x].MES == 6) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month06One += aux;
    }else if (existRefOne[x].MES == 7) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month07One += aux;
    }else if (existRefOne[x].MES == 8) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month08One += aux;
    }else if (existRefOne[x].MES == 9) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month09One += aux;
    }else if (existRefOne[x].MES == 10) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month10One += aux;
    }else if (existRefOne[x].MES == 11) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month11One += aux;
    }else if (existRefOne[x].MES == 12) {
    	var aux = parseFloat(existRefOne[x].TOTAL);
        month12One += aux;
    }                                    
}

var allMonthsOne = [month01One, month02One, month03One, month04One,
         month05One, month06One, month07One, month08One,
         month09One, month10One, month11One, month12One];

var existRefTwo = JSON.parse( '<?php echo json_encode($existRefTwo) ?>' );

var month01Two = 0;
var month02Two = 0;
var month03Two = 0;
var month04Two = 0;
var month05Two = 0;
var month06Two = 0;
var month07Two = 0;
var month08Two = 0;
var month09Two = 0;
var month10Two = 0;
var month11Two = 0;
var month12Two = 0;  

for (var x = 0; x < existRefTwo.length; x++) {
    if (existRefTwo[x].MES == 1) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month01Two += aux;
    }else if (existRefTwo[x].MES == 2) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month02Two += aux;
    }else if (existRefTwo[x].MES == 3) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month03Two += aux;
    }else if (existRefTwo[x].MES == 4) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month04Two += aux;
    }else if (existRefTwo[x].MES == 5) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month05Two += aux;
    }else if (existRefTwo[x].MES == 6) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month06Two += aux;
    }else if (existRefTwo[x].MES == 7) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month07Two += aux;
    }else if (existRefTwo[x].MES == 8) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month08Two += aux;
    }else if (existRefTwo[x].MES == 9) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month09Two += aux;
    }else if (existRefTwo[x].MES == 10) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month10Two += aux;
    }else if (existRefTwo[x].MES == 11) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month11Two += aux;
    }else if (existRefTwo[x].MES == 12) {
    	var aux = parseFloat(existRefTwo[x].TOTAL);
        month12Two += aux;
    }                                    
}

var allMonthsTwo = [month01Two, month02Two, month03Two, month04Two,
         month05Two, month06Two, month07Two, month08Two,
         month09Two, month10Two, month11Two, month12Two];

ctx = document.getElementById("lineChart");
    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: year,
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
                    data: allMonthsOne,
                    spanGaps: false                    
                },
                {
                    label: year - 1,
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
                    data: allMonthsTwo,
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
            labels: months,
            datasets: [
                {
                    label: year,
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
                    data: allMonthsOne,
                    spanGaps: false                    
                },
                {
                    label: year - 1,
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
                    data: allMonthsTwo,
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



 //         ----------------------------------------------------------- //
    // --------------------inicio inicio inicio de botões de gerar imagens---------------- //
    //         ----------------------------------------------------------- //

    $("#save-btn-01").click(function() {
        $("#lineChart").get(0).toBlob(function(blob) {
            saveAs(blob, "despesas-linha.png");
        });
    });

    $("#save-btn-02").click(function() {
        $("#barChart").get(0).toBlob(function(blob) {
            saveAs(blob, "despesas-barra.png");
        });
    })

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //


</script>
<?php $this->end(); ?>




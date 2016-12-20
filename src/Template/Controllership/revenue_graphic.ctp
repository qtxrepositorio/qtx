<?php
$costCentersNames1['TODOS'] = 'TODOS';
for ($i = 0; $i < count($costCentersNames); $i++) {
    if (!in_array($costCentersNames[$i]['CENTRO_DE_CUSTO'], $costCentersNames1)) {
        $costCentersNames1[$costCentersNames[$i]['CENTRO_DE_CUSTO']] = $costCentersNames[$i]['CENTRO_DE_CUSTO'];
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
                    <h3 class="box-title">Gráfico de receitas</h3>
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
                    <div align="right">
                        <h5 id="title-01"></h5>
                        <button class="btn btn-success" id="save-btn-01">Gerar imagem</button>
                        <a id="modal-01" href="#modal-container-01" role="submit" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="lineChart" height="110"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico de receitas</h3>
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
                    <div align="right">
                        <h5 id="title-02"></h5>
                        <button class="btn btn-success" id="save-btn-02">Gerar imagem</button>
                        <a id="modal-02" href="#modal-container-02" role="submit" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="barChart" height="110"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="modal-container-01" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">                           
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Informe os dados solicitados:
                            </h4>
                        </div>
                        <div class="modal-body">                            

                            <?php
                            echo $this->Form->input('receitas', ['id' => 'receitas', 'options' => $costCentersNames1, 'label' => 'Selecione o centro de custo:']);
                            ?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="receita" type="submit" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="modal-container-02" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">                           
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Informe os dados solicitados:
                            </h4>
                        </div>
                        <div class="modal-body">                            

                            <?php
                            echo $this->Form->input('receitas', ['id' => 'receitas2', 'options' => $costCentersNames1, 'label' => 'Selecione o centro de custo:']);
                            ?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="receita2" type="submit" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
?> 

<?php $this->start('scriptBotton'); ?>
<script>

    var revenueYearCurrent = JSON.parse( '<?php echo json_encode($revenueYearCurrent) ?>' );

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
    };

    allMonthsCurrent = [ month01, month02, month03, month04,
        month05, month06, month07, month08,
        month09, month10, month11, month12 ];

    var allMonthsCurrentFinish = []
    var date = new Date()
    for (var i = 0; i <= date.getMonth(); i++) {
        //if(allMonthsCurrent[i] != 0)
            allMonthsCurrentFinish.push(allMonthsCurrent[i].toFixed(2));
    }

    var revenueYearLast = JSON.parse( '<?php echo json_encode($revenueYearLast) ?>' );

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
    };

    allMonthsLast = [ month01, month02, month03, month04,
        month05, month06, month07, month08,
        month09, month10, month11, month12 ];

    //alert(month01.toLocaleString("pt-br",{style:"currency", currency:"BRL"}));

    var allMonthsLastFinish = []
    for (var i = 0; i < 12; i++) {
        //if(allMonthsLast[i] != 0)
            allMonthsLastFinish.push(allMonthsLast[i].toFixed(2));
    }

    ctx = document.getElementById("lineChart");
    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [
                {
                    label: 'Ano atual',
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
                    data: allMonthsCurrentFinish,
                    spanGaps: false                    
                },
                {
                    label: 'Ano anterior',
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
                    data: allMonthsLastFinish,
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
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [
                {
                    label: 'Ano atual',
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
                    data: allMonthsCurrentFinish,
                    spanGaps: false                    
                },
                {
                    label: 'Ano anterior',
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
                    data: allMonthsLastFinish,
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

    document.getElementById("title-01").innerHTML = "Cento de custo selecionado: TODOS";
    document.getElementById("title-02").innerHTML = "Cento de custo selecionado: TODOS";

	

    $("#receita").click(function() { 

        var revenueYearCurrent = JSON.parse( '<?php echo json_encode($revenueYearCurrent) ?>' );

        var cc = document.getElementById('receitas').value; 

        $('#modal-container-01').modal('hide');

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
		       		
        };

        var allMonthsCurrent = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var allMonthsCurrentFinish = []
        var date = new Date()
        for (var i = 0; i <= date.getMonth(); i++) {
            //if(allMonthsCurrent[i] != 0)
                allMonthsCurrentFinish.push(allMonthsCurrent[i].toFixed(2));
        }

        var revenueYearLast = JSON.parse( '<?php echo json_encode($revenueYearLast) ?>' );

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
        };

        var allMonthsLast = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var allMonthsLastFinish = []
        for (var i = 0; i < 12; i++) {
            //if(allMonthsLast[i] != 0)
                allMonthsLastFinish.push(allMonthsLast[i]);
        }

        myChart.destroy();

        ctx = document.getElementById("lineChart");
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                datasets: [
                    {
                        label: 'Ano atual',
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
                        data: allMonthsCurrentFinish,
                        spanGaps: false                    
                    },
                    {
                        label: 'Ano anterior',
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
                        data: allMonthsLastFinish,
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

        document.getElementById("title-01").innerHTML = "Cento de custo selecionado: " + cc;

    });

$("#receita2").click(function() { 

        var revenueYearCurrent = JSON.parse( '<?php echo json_encode($revenueYearCurrent) ?>' );

        var cc = document.getElementById('receitas2').value; 

        $('#modal-container-02').modal('hide');

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
                    
        };

        var allMonthsCurrent = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var allMonthsCurrentFinish = []
        var date = new Date()
        for (var i = 0; i <= date.getMonth(); i++) {
            //if(allMonthsCurrent[i] != 0)
                allMonthsCurrentFinish.push(allMonthsCurrent[i].toFixed(2));
        }

        var revenueYearLast = JSON.parse( '<?php echo json_encode($revenueYearLast) ?>' );

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
        };

        var allMonthsLast = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var allMonthsLastFinish = []
        for (var i = 0; i < 12; i++) {
            //if(allMonthsLast[i] != 0)
                allMonthsLastFinish.push(allMonthsLast[i]);
        }

        myChart2.destroy();

        ctx2 = document.getElementById("barChart");
        myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                datasets: [
                    {
                        label: 'Ano atual',
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
                        data: allMonthsCurrentFinish,
                        spanGaps: false                    
                    },
                    {
                        label: 'Ano anterior',
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
                        data: allMonthsLastFinish,
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

        document.getElementById("title-02").innerHTML = "Cento de custo selecionado: " + cc;

    });

    //         ----------------------------------------------------------- //
    // --------------------inicio inicio inicio de botões de gerar imagens---------------- //
    //         ----------------------------------------------------------- //

    $("#save-btn-01").click(function() {
        $("#lineChart").get(0).toBlob(function(blob) {
            saveAs(blob, "receitas.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //

</script>
<?php $this->end(); ?>




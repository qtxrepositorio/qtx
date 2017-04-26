<?php
$costCentersNames['TODOS'] = 'TODOS';
for ($i = 0; $i < count($salary); $i++) {
    if (!in_array($salary[$i]['CTT_DESC01'], $costCentersNames)) {
        $costCentersNames[$salary[$i]['CTT_DESC01']] = $salary[$i]['CTT_DESC01'];
    }
}
?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Hora extra x salário</small>
    </h1>      
</section> 


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Percentual de horas extras x salário</h3>
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
                        <button class="btn btn-success" id="save-btn-02">Gerar imagem</button>
                        <a id="modal-02" href="#modal-container-02" role="submit" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="lineChart" height="70"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico de horas extras x salário</h3>
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
                    <!--
                    <div align="left">                        
                        <h4>Custo geral:</h4>                        
                        <table>
                            <tr>
                                <th>
                                    <ul>
                                        <li>
                                            <font color="#78c1f2">
                                                <h4 id="salario">
                                            </font> 
                                            </h4>
                                        </li>
                                    </ul>
                                </th>
                                <th>
                                    <ul>
                                        <li>
                                            <font color="#ffdc86">
                                                <h4 id="horaExtra">
                                            </font>
                                            </h4>
                                        </li>
                                    </ul>
                                </th>
                                <th>
                                    <ul>
                                        <li>
                                            <font color="#48ff48">
                                                <h4 id="total">
                                            </font>
                                            </h4>
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                        </table>
                    </div>
                    -->
                    <div align="right">
                        <h5 id="title-02"></h5>
                        <button class="btn btn-success" id="save-btn-01">Gerar imagem</button>
                        <a id="modal-01" href="#modal-container-01" role="submit" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="barChart" height="100"></canvas>    
                    </div>
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
echo $this->Form->input('CustoDeHorasExtraPorCentroDeCustoCCS', ['id' => 'extrasXsalarioValue', 'options' => $costCentersNames, 'label' => 'Selecione o centro de custo:']);
?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="extrasXsalario" type="submit" class="btn btn-primary">
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
echo $this->Form->input('CustoDeHorasExtraPorCentroDeCustoCCS', ['id' => 'percentualextrasXsalarioValue', 'options' => $costCentersNames, 'label' => 'Selecione o centro de custo:']);
?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="PercentualextrasXsalario" type="submit" class="btn btn-primary">
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

    //---------------      Gráfico de horas extras x salário    ---------//
    //------------------------------INICIO INICIO INICIO---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    var salary = JSON.parse( '<?php echo json_encode($salary) ?>' );
    var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );

    var labels = [];
    for (var i = 0; i < salary.length; i++) {
        if (labels.indexOf(salary[i].RD_DATARQ) == -1 )  {
            labels.push(salary[i].RD_DATARQ);
        }
    }

    var salarys = [];
    var aux = 0;
    for (var i = 0; i < labels.length; i++) {
        aux = 0;
        for (var x = 0; x < salary.length; x++) {
            if (labels[i] === salary[x].RD_DATARQ ) {
                aux += parseFloat(salary[x].SUM);
            }		  	
        }
        salarys.push(aux.toFixed(2));
    }

    var extraHours = [];
    var aux = 0;
    for (var i = 0; i < labels.length; i++) {
        aux = 0;
        for (var x = 0; x < extraHour.length; x++) {			
            if (labels[i] === extraHour[x].RD_DATARQ ) {
                aux += parseFloat(extraHour[x].SUM);
            }		  	
        }	
        extraHours.push(aux.toFixed(2));
    }

    var totais = [];
    var aux = 0;
    for (var i = 0; i < salarys.length; i++) {
        aux = parseFloat(extraHours[i]) + parseFloat(salarys[i]);
        totais.push(aux); 
    };

    ctx = document.getElementById("barChart");
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Salário',
                    data: salarys,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Hora Extra',
                    data: extraHours,
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)' 
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Total',
                    data: totais,
                    backgroundColor: [
                        'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                        'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                        'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                        'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                    ],
                    borderColor: [
                        'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)',
                        'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)',
                        'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)',
                        'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)' 
                    ],
                    borderWidth: 1
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

    var totalSalario = 0;
    for (var i = 0; i < salarys.length; i++) {
        totalSalario += parseFloat(salarys[i]);
    };

    var totalhoraExtra = 0;
    for (var i = 0; i < extraHours.length; i++) {
        totalhoraExtra += parseFloat(extraHours[i]);
    };

    var totalFinal = 0;
    for (var i = 0; i < totais.length; i++) {
        totalFinal += parseFloat(totais[i]);
    };

    //document.getElementById("salario").innerHTML = "Salário R$: " + totalSalario.toFixed(2);
    //document.getElementById("horaExtra").innerHTML = "Hora Extra R$: " + totalhoraExtra.toFixed(2);
    //document.getElementById("total").innerHTML = "Total R$: " + totalFinal.toFixed(2);

    document.getElementById("title-01").innerHTML = "Cento de custo selecionado: TODOS";


    //---------------      Gráfico de horas extras x salário    ---------//
    //------------------------------FIM FIM FIM FIM---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    //---------------      grafico de linha percentual de horas extras    ---------//
    //------------------------------INICIO INICIO INICIO---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    percentages = [];
    for (var i = 0; i < labels.length; i++) {
        percentage = (parseFloat(extraHours[i]) * 100) / (parseFloat(salarys[i]) + parseFloat(extraHours[i])) ;
        //alert(percentage);
        percentages.push(percentage.toFixed(2));
    };

    ctx2 = document.getElementById("lineChart");
    myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Percentual',
                    data: percentages,
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
            }
        }
    });

    document.getElementById("title-02").innerHTML = "Cento de custo selecionado: TODOS";
    //---------------      grafico de linha percentual de horas extras    ---------//
    //------------------------------FIM FIM FIM FIM FIM FIM FIM---------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    // --------------------------- //
    // --------------------------- //
    // ---------INICIO DOS BTOES DE REFINAMENTO-------- //
    // --------------------------- //
    // --------------------------- //

    //---------------       Percentual de horas extras x salário     ---------//
    //------------------------------inicio inicio inicio----------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    $("#PercentualextrasXsalario").click(function() {

        var cc = document.getElementById('percentualextrasXsalarioValue').value; 
   
        $('#modal-container-02').modal('hide');

        var salary = JSON.parse( '<?php echo json_encode($salary) ?>' );
        var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );

        var labels = [];
        for (var i = 0; i < salary.length; i++) {
            if (labels.indexOf(salary[i].RD_DATARQ) == -1 )  {
                labels.push(salary[i].RD_DATARQ);
            }
        }

        var salarys = [];
        var aux = 0;
        for (var i = 0; i < labels.length; i++) {
            aux = 0;
            for (var x = 0; x < salary.length; x++) {
                if (cc === 'TODOS') {
                    if (labels[i] === salary[x].RD_DATARQ ) {
                        aux += parseFloat(salary[x].SUM);
                    }  
                }else if (labels[i] === salary[x].RD_DATARQ && salary[x].CTT_DESC01 == cc ) {
                    aux += parseFloat(salary[x].SUM);
                }        
            }
            salarys.push(aux.toFixed(2));
        }

        var extraHours = [];
        var aux = 0;
        for (var i = 0; i < labels.length; i++) {
            aux = 0;
            for (var x = 0; x < extraHour.length; x++) { 
                if (cc === 'TODOS') {
                    if (labels[i] === extraHour[x].RD_DATARQ ) {
                        aux += parseFloat(extraHour[x].SUM);
                    }  
                }else if (labels[i] === extraHour[x].RD_DATARQ && extraHour[x].CTT_DESC01 == cc ) {
                    aux += parseFloat(extraHour[x].SUM);
                }         
            }   
            extraHours.push(aux.toFixed(2));
        }

        var totais = [];
        var aux = 0;
        for (var i = 0; i < salarys.length; i++) {
            aux = parseFloat(extraHours[i]) + parseFloat(salarys[i]);
            totais.push(aux); 
        };

        percentages = [];
        for (var i = 0; i < labels.length; i++) {
            percentage = (parseFloat(extraHours[i]) * 100) / (parseFloat(salarys[i]) + parseFloat(extraHours[i])) ;
            //alert(percentage);
            percentages.push(percentage.toFixed(2));
        };

        myChart2.destroy();
        ctx2 = document.getElementById("lineChart");
        myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Percentual',
                        data: percentages,
                    }
                ]
            },
            options: {
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
    })

    //---------------       Percentual de horas extras x salário     ---------//
    //------------------------------FIM FIM FIM FIM FIM  ---------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

   
    //---------------       Gráfico de horas extras x salário     ---------//
    //------------------------------inicio inicio inicio----------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    $("#extrasXsalario").click(function() { 

        var cc = document.getElementById('extrasXsalarioValue').value; 
   
        $('#modal-container-01').modal('hide');

        var salary = JSON.parse( '<?php echo json_encode($salary) ?>' );
        var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );

        var labels = [];
        for (var i = 0; i < salary.length; i++) {
            if (labels.indexOf(salary[i].RD_DATARQ) == -1 )  {
                labels.push(salary[i].RD_DATARQ);
            }
        }

        var salarys = [];
        var aux = 0;
        for (var i = 0; i < labels.length; i++) {
            aux = 0;
            for (var x = 0; x < salary.length; x++) {
                if (cc === 'TODOS') {
                    if (labels[i] === salary[x].RD_DATARQ ) {
                        aux += parseFloat(salary[x].SUM);
                    }  
                }else if (labels[i] === salary[x].RD_DATARQ && salary[x].CTT_DESC01 == cc ) {
                    aux += parseFloat(salary[x].SUM);
                }        
            }
            salarys.push(aux.toFixed(2));
        }

        var extraHours = [];
        var aux = 0;
        for (var i = 0; i < labels.length; i++) {
            aux = 0;
            for (var x = 0; x < extraHour.length; x++) { 
                if (cc === 'TODOS') {
                    if (labels[i] === extraHour[x].RD_DATARQ ) {
                        aux += parseFloat(extraHour[x].SUM);
                    }  
                }else if (labels[i] === extraHour[x].RD_DATARQ && extraHour[x].CTT_DESC01 == cc ) {
                    aux += parseFloat(extraHour[x].SUM);
                }         
            }   
            extraHours.push(aux.toFixed(2));
        }

        var totais = [];
        var aux = 0;
        for (var i = 0; i < salarys.length; i++) {
            aux = parseFloat(extraHours[i]) + parseFloat(salarys[i]);
            totais.push(aux.toFixed(2)); 
        };

        myChart.destroy();

        ctx = document.getElementById("barChart");
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Salário',
                        data: salarys,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)',
                            'rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)','rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)','rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Hora Extra',
                        data: extraHours,
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)' 
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Total',
                        data: totais,
                        backgroundColor: [
                            'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                            'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                            'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                            'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)', 'rgba(0, 255, 0, 0.2)',
                        ],
                        borderColor: [
                            'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)',
                            'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)',
                            'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)',
                            'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)' 
                        ],
                        borderWidth: 1
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

    var totalSalario = 0;
    for (var i = 0; i < salarys.length; i++) {
        totalSalario += parseFloat(salarys[i]);
    };
    totalSalario = totalSalario.toFixed(2);

    var totalhoraExtra = 0;
    for (var i = 0; i < extraHours.length; i++) {
        totalhoraExtra += parseFloat(extraHours[i]);
    };
    totalhoraExtra = totalhoraExtra.toFixed(2);

    var totalFinal = 0;
    for (var i = 0; i < totais.length; i++) {
        totalFinal += parseFloat(totais[i]);
    };
    totalFinal = totalFinal.toFixed(2);

    //document.getElementById("salario").innerHTML = "Salário R$: " + totalSalario;
    //document.getElementById("horaExtra").innerHTML = "Hora Extra R$: " + totalhoraExtra;
    //document.getElementById("total").innerHTML = "Total R$: " + totalFinal;

    //alert('lol');
    document.getElementById("title-02").innerHTML = "Cento de custo: " + cc;

    })

    //---------------       Gráfico de horas extras x salário     ---------//
    //------------------------------fim fim fim---------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    // --------------------------- //
    // --------------------------- //
    // ---------FIM DOS BTOES DE REFINAMENTO-------- //
    // --------------------------- //
    // --------------------------- //

    //         ----------------------------------------------------------- //
    // --------------------inicio inicio inicio de botões de gerar imagens---------------- //
    //         ----------------------------------------------------------- //

    $("#save-btn-01").click(function() {
        $("#barChart").get(0).toBlob(function(blob) {
            saveAs(blob, "hora_extra_no_salario.png");
        });
    });

    $("#save-btn-02").click(function() {
        $("#lineChart").get(0).toBlob(function(blob) {
            saveAs(blob, "percentual_de_hora_extra_no_salario.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //

</script>
<?php $this->end(); ?>



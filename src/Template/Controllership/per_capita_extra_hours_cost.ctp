<?php
$costCenters['TODOS'] = 'TODOS';
for ($i = 0; $i < count($staffPerMonth); $i++) {
    if (!in_array($staffPerMonth[$i]['RD_CC'], $costCenters)) {
        $costCenters[$staffPerMonth[$i]['RD_CC']] = $staffPerMonth[$i]['RD_CC'];
    }
}

$costCentersNames['TODOS'] = 'TODOS';
for ($i = 0; $i < count($staffPerMonth); $i++) {
    if (!in_array($staffPerMonth[$i]['CTT_DESC01'], $costCentersNames)) {
        $costCentersNames[$staffPerMonth[$i]['CTT_DESC01']] = $staffPerMonth[$i]['CTT_DESC01'];
    }
}

$months = [];
foreach ($staffPerMonth as $key => $value) {
    $months[$value['RD_DATARQ']] = $value['RD_DATARQ'];
}
?> 

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
?>  

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Custo de hora extra per capita</small>
    </h1>      
</section> 

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Custo de hora extra per capita</h3>
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
                            <button id="percapita" type="submit" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>                      

<?php $this->start('scriptBotton'); ?>
<script>

    var staffPerMonth = JSON.parse( '<?php echo json_encode($staffPerMonth) ?>' );

    //buscando os meses que já tem contabilizado a hora extra
    var labels =[];
    for (var i = 0; i < staffPerMonth.length; i++) {
        if (labels.indexOf(staffPerMonth[i].RD_DATARQ) == -1 )  {
            labels.push(staffPerMonth[i].RD_DATARQ);
        }
    }

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

    for (var x = 0; x < staffPerMonth.length; x++) {
        if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '01') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month01 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '02') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month02 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '03') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month03 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '04') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month04 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '05') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month05 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '06') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month06 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '07') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month07 += aux;  
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '08') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month08 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '09') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month09 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '10') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month10 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '11') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month11 += aux;
        }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '12') {
            var aux = parseFloat(staffPerMonth[x].CONT);
            month12 += aux;
        }          
    }
    
    allMonths = [ month01, month02, month03, month04,
        month05, month06, month07, month08,
        month09, month10, month11, month12 ];

    var allMonthsFinish = []
    for (var i = 0; i < labels.length; i++) {
        allMonthsFinish.push(allMonths[i]);
    }

    var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );

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

    var perCapita = []; 
    for (var i = 0; i < extraHours.length; i++) {
        var aux = extraHours[i] / allMonths[i];
        aux = aux.toFixed(2);
        perCapita.push(aux);
    }   

    ctx = document.getElementById("barChart");
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Custo de hora extra per capita',
                    data: perCapita,
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

    $("#percapita").click(function() { 

        var cc = document.getElementById('extrasXsalarioValue').value; 

        $('#modal-container-01').modal('hide');

        var staffPerMonth = JSON.parse( '<?php echo json_encode($staffPerMonth) ?>' );

        //buscando os meses que já tem contabilizado a hora extra
        var labels =[];
        for (var i = 0; i < staffPerMonth.length; i++) {
            if (labels.indexOf(staffPerMonth[i].RD_DATARQ) == -1 )  {
                labels.push(staffPerMonth[i].RD_DATARQ);
            }
        }

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

        for (var x = 0; x < staffPerMonth.length; x++) {
            if (cc == 'TODOS') {
                if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month01 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month02 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month03 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month04 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month05 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month06 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month07 += aux;  
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month08 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month09 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month10 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month11 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month12 += aux;
                }
            }else if (cc === staffPerMonth[x].CTT_DESC01){
                if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month01 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month02 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month03 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month04 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month05 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month06 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month07 += aux;  
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month08 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month09 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month10 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month11 += aux;
                }else if (staffPerMonth[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(staffPerMonth[x].CONT);
                    month12 += aux;
                }
            }          
        }
    
        allMonths = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var allMonthsFinish = []
        for (var i = 0; i < labels.length; i++) {
            allMonthsFinish.push(allMonths[i]);
        }

        var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );

        var extraHours = [];
        var aux = 0;
        for (var i = 0; i < labels.length; i++) {
            aux = 0;
            for (var x = 0; x < extraHour.length; x++) {            
                if ( labels[i] === extraHour[x].RD_DATARQ && cc === extraHour[x].CTT_DESC01 ) {
                    aux += parseFloat(extraHour[x].SUM);
                }           
            }   
            extraHours.push(aux.toFixed(2));
        }

        var perCapita = []; 
        for (var i = 0; i < extraHours.length; i++) {
            var aux = extraHours[i] / allMonths[i];
            aux = aux.toFixed(2);
            perCapita.push(aux);
            alert(allMonths[i]);
        }   

        myChart.destroy();

        ctx = document.getElementById("barChart");
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Custo de hora extra per capita',
                        data: perCapita,
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


    })

    //         ----------------------------------------------------------- //
    // --------------------inicio inicio inicio de botões de gerar imagens---------------- //
    //         ----------------------------------------------------------- //

    $("#save-btn-01").click(function() {
        $("#barChart").get(0).toBlob(function(blob) {
            saveAs(blob, "custo_de_hora_extra_per_capita.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //

</script>
<?php $this->end(); ?>

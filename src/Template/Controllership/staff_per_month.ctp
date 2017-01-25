<?php
$costCenters['TODOS'] = 'TODOS';
$x = 1;

for ($i = 0; $i < count($staffPerMonth); $i++) {
    if (!in_array($staffPerMonth[$i]['RD_CC'], $costCenters)) {
        $costCenters[$staffPerMonth[$i]['RD_CC']] = $staffPerMonth[$i]['RD_CC'];
    }
    $x++;
}

$costCentersNames['TODOS'] = 'TODOS';
$x = 1;

for ($i = 0; $i < count($staffPerMonth); $i++) {
    if (!in_array($staffPerMonth[$i]['CTT_DESC01'], $costCentersNames)) {
        $costCentersNames[$staffPerMonth[$i]['CTT_DESC01']] = $staffPerMonth[$i]['CTT_DESC01'];
    }
    $x++;
}

$months = [];
foreach ($staffPerMonth as $key => $value) {
    $months[$value['RD_DATARQ']] = $value['RD_DATARQ'];
}
?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Quadro de pessoas</small>
    </h1>      
</section>

<!----------- INICIO DO GRAFICO Quadro de pessoal -------------------->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico do quadro de pessoal mensal</h3>
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
                        <h5 id="title-chartPessoal"></h5>
                        <button class="btn btn-success" id="save-btn-01">Gerar imagem</button>
                        <a id="modal-01" href="#modal-container-01" role="submit" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="barChart" height="80"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela do quadro de pessoal mensal / centro de custo</h3>
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
                            <table id="example1" class="table table-bordered table-hover">
                                
                                <div align="right">
                                    <a id="btnExport" onclick="fnExcelReport()" class="btn btn-primary" type=""><?php echo __('Gerar Excel'); ?></a>
                                </div>
                                
                                <br>
                                
                                <thead>
                                    <tr>                                
                                        <th>Mês/Ano </th>
                                        <?php
                                        foreach ($costCenters as $key => $value) {
                                            if ($value != 'TODOS') {
                                                ?>
                                                <th><?php echo $value; ?></th>
                                            <?php
                                            }
                                        }
                                        ?>
                                        <th class="active info">Total</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    foreach ($months as $month) {
                                        $cc01 = 0;
                                        $cc02 = 0;
                                        $cc03 = 0;
                                        $cc06 = 0;
                                        $cc07 = 0;
                                        $cc08 = 0;
                                        $cc09 = 0;
                                        $cc11 = 0;
                                        $cc12 = 0;
                                        $cc13 = 0;
                                        $cc14 = 0;
                                        $cc15 = 0;
                                        $cc16 = 0;
                                        $cc18 = 0;
                                        $cc20 = 0;
                                        $cc21 = 0;
                                        $cc22 = 0;
                                        $cc23 = 0;
                                        $cc28 = 0;
                                        $cc31 = 0;
                                        $cc32 = 0;
                                        foreach ($staffPerMonth as $key => $value) {
                                            if ($value['RD_DATARQ'] == $month) {
                                                if (substr($value['RD_CC'], 0, 2) == '01') {
                                                    $cc01 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '02') {
                                                    $cc02 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '03') {
                                                    $cc03 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '06') {
                                                    $cc06 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '07') {
                                                    $cc07 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '08') {
                                                    $cc08 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '09') {
                                                    $cc09 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '11') {
                                                    $cc11 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '12') {
                                                    $cc12 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '13') {
                                                    $cc13 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '14') {
                                                    $cc14 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '15') {
                                                    $cc15 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '16') {
                                                    $cc16 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '18') {
                                                    $cc18 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '20') {
                                                    $cc20 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '21') {
                                                    $cc21 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '22') {
                                                    $cc22 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '23') {
                                                    $cc23 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '28') {
                                                    $cc28 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '31') {
                                                    $cc31 = $value['CONT'];
                                                } else if (substr($value['RD_CC'], 0, 2) == '32') {
                                                    $cc32 = $value['CONT'];
                                                }
                                                $total = $cc01 + $cc02 + $cc03 +
                                                        $cc06 + $cc07 + $cc08 +
                                                        $cc09 + $cc11 + $cc12 +
                                                        $cc13 + $cc14 + $cc15 +
                                                        $cc16 + $cc18 + $cc20 +
                                                        $cc21 + $cc22 + $cc23 +
                                                        $cc28 + $cc31 + $cc32;
                                            }
                                        }
                                        ?>                                       

                                        <tr>
                                            <th> <?php echo substr($month, 4, 6) . '/' . substr($month, 0, 4) ?> </th>
                                            <td> <?php echo $cc01; ?> </td>
                                            <td> <?php echo $cc02; ?> </td>
                                            <td> <?php echo $cc03; ?> </td>
                                            <td> <?php echo $cc06; ?> </td>
                                            <td> <?php echo $cc07; ?> </td>
                                            <td> <?php echo $cc08; ?> </td>
                                            <td> <?php echo $cc09; ?> </td>
                                            <td> <?php echo $cc11; ?> </td>
                                            <td> <?php echo $cc12; ?> </td>
                                            <td> <?php echo $cc13; ?> </td>
                                            <td> <?php echo $cc14; ?> </td>
                                            <td> <?php echo $cc15; ?> </td>
                                            <td> <?php echo $cc16; ?> </td>
                                            <td> <?php echo $cc18; ?> </td>
                                            <td> <?php echo $cc20; ?> </td>
                                            <td> <?php echo $cc21; ?> </td>
                                            <td> <?php echo $cc22; ?> </td>
                                            <td> <?php echo $cc23; ?> </td>
                                            <td> <?php echo $cc28; ?> </td>
                                            <td> <?php echo $cc31; ?> </td>
                                            <td> <?php echo $cc32; ?> </td>
                                            <td class="active info"> <?php echo $total; ?> </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>                                     

                                </tbody>
                            </table>
                        </div>
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
                            echo $this->Form->input('CustoDeHorasExtraPorCentroDeCustoCCS', ['id' => 'CustoDeHorasExtraPorCentroDeCustoCCS', 'options' => $costCentersNames, 'label' => 'Selecione o centro de custo:']);
                            ?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="quadroDePessoalMensal" type="submit" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>
<!-----------------FIM DO GRAFICO Quadro de pessoal-------------------->





<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
?>


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

    ctx = document.getElementById("barChart");
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Quantitativo',
                    data: allMonthsFinish,
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
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
            }
        }
    });

    document.getElementById("title-chartPessoal").innerHTML = "Cento de custo selecionado: TODOS";

    

    // --------------------------- //
    // --------------------------- //
    // ---------INICIO DOS BTOES DE REFINAMENTO-------- //
    // --------------------------- //
    // --------------------------- //

   
    //---------------       Custo de horas extra por verba     ---------//
    //------------------------------inicio inicio inicio---------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    $("#quadroDePessoalMensal").click(function() { 

        var cc = document.getElementById('CustoDeHorasExtraPorCentroDeCustoCCS').value; 

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
            }else{
                if (staffPerMonth[x].CTT_DESC01 == cc){
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
        }
    

        allMonths = [ month01, month02, month03, month04,
            month05, month06, month07, month08,
            month09, month10, month11, month12 ];

        var allMonthsFinish = []
        for (var i = 0; i < labels.length; i++) {
            allMonthsFinish.push(allMonths[i]);
        }

        myChart.destroy();

        ctx = document.getElementById("barChart");
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Quantitativo',
                        data: allMonthsFinish,
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
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                }
            }
        });
        document.getElementById("title-chartPessoal").innerHTML = "Cento de custo selecionado: " + cc;
    });
    //---------------       Custo de horas extra por verba     ---------//
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
            saveAs(blob, "custo_de_horas_extra_por_verba.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //

</script>

<script type="text/javascript">
    
function fnExcelReport(){
       var htmltable= document.getElementById('example1');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}

</script>
<?php $this->end(); ?>

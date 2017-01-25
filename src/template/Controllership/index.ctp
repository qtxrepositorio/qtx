<?php 

$costCenters['Todos'] = 'Todos';
$x = 1;

for ($i=0; $i < count($extraHour); $i++) { 
    if (!in_array($extraHour[$i]['RD_CC'], $costCenters)) {
        $costCenters[$extraHour[$i]['RD_CC']] = $extraHour[$i]['RD_CC'];        
    }
    $x++;   
}

?>

<section class="content-header">
  <h1>
    Painel
    <small>Controladoria</small>
  </h1>      
</section> 


<!----------- INICIO DO GRAFICO Custo de horas extra por centro de custo -------------------->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Custo de horas extra por centro de custo:</h3>
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
                        <button class="btn btn-success" id="save-btn">Gerar imagem</button>
                        <a id="modal-548648" href="#modal-container-548648" role="button" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="barChart" style="height:300px"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="modal-container-548648" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                echo $this->Form->input('line', ['multiple' => true,'options' => $costCenters, 'label' => 'Selecione o centro de custo:']);
                            ?>

                        </div>
                        <div class="modal-footer">
                             
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button type="button" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>
<!-----------------FIM DO GRAFICO Custo de horas extra por centro de custo-------------------->

<?php

$this->Html->script(['FileSaver./fileSaver/FileSaver.js',],['block' => 'script']);
$this->Html->script(['CanvasToBlob./canvasToBlob/canvas-toBlob.js',],['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/chartjs/Chart.js',],['block' => 'script']);

?>


<?php $this->start('scriptBotton'); ?>

<script>


$("#save-btn").click(function() {
        $("#barChart").get(0).toBlob(function(blob) {
            saveAs(blob, "chart_1.png");
        });
});

$(function () {

    var extraHour = JSON.parse( '<?php echo json_encode($extraHour) ?>' );
    
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //----------------------------  INICIO  ----------------------------------------//
    //----------------------------- BAR CHART --------------------------------------//
    //---------------       Custo de horas extra por centro de custo       ---------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    //buscando os meses que já tem contabilizado a hora extra
    var labels =[];
    for (var i = 0; i < extraHour.length; i++) {
        if (labels.indexOf(extraHour[i].RD_DATARQ) == -1 )  {
            labels.push(extraHour[i].RD_DATARQ);
        }
    }
    
    var values109 = [];
    var values117 = [];
    var values118 = [];
    var values123 = [];
    var values157 = [];
    var values229 = [];

    var month01109 = 0;
    var month02109 = 0;
    var month03109 = 0;
    var month04109 = 0;
    var month05109 = 0;
    var month06109 = 0;
    var month07109 = 0;
    var month08109 = 0;
    var month09109 = 0;
    var month10109 = 0;
    var month11109 = 0;
    var month12109 = 0;

    var month01117 = 0;
    var month02117 = 0;
    var month03117 = 0;
    var month04117 = 0;
    var month05117 = 0;
    var month06117 = 0;
    var month07117 = 0;
    var month08117 = 0;
    var month09117 = 0;
    var month10117 = 0;
    var month11117 = 0;
    var month12117 = 0;

    var month01118 = 0;
    var month02118 = 0;
    var month03118 = 0;
    var month04118 = 0;
    var month05118 = 0;
    var month06118 = 0;
    var month07118 = 0;
    var month08118 = 0;
    var month09118 = 0;
    var month10118 = 0;
    var month11118 = 0;
    var month12118 = 0;

    var month01123 = 0;
    var month02123 = 0;
    var month03123 = 0;
    var month04123 = 0;
    var month05123 = 0;
    var month06123 = 0;
    var month07123 = 0;
    var month08123 = 0;
    var month09123 = 0;
    var month10123 = 0;
    var month11123 = 0;
    var month12123 = 0;

    var month01157 = 0;
    var month02157 = 0;
    var month03157 = 0;
    var month04157 = 0;
    var month05157 = 0;
    var month06157 = 0;
    var month07157 = 0;
    var month08157 = 0;
    var month09157 = 0;
    var month10157 = 0;
    var month11157 = 0;
    var month12157 = 0;

    var month01229 = 0;
    var month02229 = 0;
    var month03229 = 0;
    var month04229 = 0;
    var month05229 = 0;
    var month06229 = 0;
    var month07229 = 0;
    var month08229 = 0;
    var month09229 = 0;
    var month10229 = 0;
    var month11229 = 0;
    var month12229 = 0;

    //populando o grafico
    for (var i = 0; i < labels.length; i++) {
        for (var x = 0; x < extraHour.length; x++) {
            if (extraHour[x].RD_PD === '109' && extraHour[x].RD_DATARQ === labels[i]) {
                if (extraHour[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month01109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month02109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month03109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month04109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month05109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month06109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month07109 += parseFloat(aux);  
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month08109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month09109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month10109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month11109 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month12109 += parseFloat(aux);
                }                       
            }else if (extraHour[x].RD_PD === '117' && extraHour[x].RD_DATARQ === labels[i]) {
                if (extraHour[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month01117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month02117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month03117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month04117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month05117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month06117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month07117 += parseFloat(aux);  
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month08117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month09117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month10117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month11117 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month12117 += parseFloat(aux);
                }                       
            }else if (extraHour[x].RD_PD === '118' && extraHour[x].RD_DATARQ === labels[i]) {
                if (extraHour[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month01118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month02118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month03118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month04118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month05118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month06118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month07118 += parseFloat(aux);  
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month08118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month09118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month10118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month11118 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month12118 += parseFloat(aux);
                }                       
            }else if (extraHour[x].RD_PD === '123' && extraHour[x].RD_DATARQ === labels[i]) {
                if (extraHour[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month01123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month02123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month03123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month04123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month05123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month06123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month07123 += parseFloat(aux);  
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month08123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month09123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month10123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month11123 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month12123 += parseFloat(aux);
                }                       
            }else if (extraHour[x].RD_PD === '157' && extraHour[x].RD_DATARQ === labels[i]) {
                if (extraHour[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month01157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month02157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month03157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month04157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month05157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month06157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month07157 += parseFloat(aux);  
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month08157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month09157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month10157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month11157 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month12157 += parseFloat(aux);
                }                       
            }else if (extraHour[x].RD_PD === '229' && extraHour[x].RD_DATARQ === labels[i]) {
                if (extraHour[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month01229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month02229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month03229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month04229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month05229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month06229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month07229 += parseFloat(aux);  
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month08229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month09229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month10229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month11229 += parseFloat(aux);
                }else if (extraHour[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHour[x].SOMA).toFixed(2);
                    month12229 += parseFloat(aux);
                }                       
            }
        }
    }
    
    var months109 = [ month01109, month02109, month03109, month04109, month05109,
                        month06109, month07109, month08109, month09109, month10109,
                            month11109, month12109 ];

    for (var i = 0; i < labels.length; i++) {
        values109.push(months109[i]);
    }

    var months117 = [ month01117, month02117, month03117, month04117, month05117,
                        month06117, month07117, month08117, month09117, month10117,
                            month11117, month12117 ];

    for (var i = 0; i < labels.length; i++) {
        values117.push(months117[i]);
    }

    var months118 = [ month01118, month02118, month03118, month04118, month05118,
                        month06118, month07118, month08118, month09118, month10118,
                            month11118, month12118 ];

    for (var i = 0; i < labels.length; i++) {
        values118.push(months118[i]);
    }

    var months123 = [ month01123, month02123, month03123, month04123, month05123,
                        month06123, month07123, month08123, month09123, month10123,
                            month11123, month12123 ];

    for (var i = 0; i < labels.length; i++) {
        values123.push(months123[i]);
    }

    var months157 = [ month01157, month02157, month03157, month04157, month05157,
                        month06157, month07157, month08157, month09157, month10157,
                            month11157, month12157 ];

    for (var i = 0; i < labels.length; i++) {
        values157.push(months157[i]);
    }

    var months229 = [ month01229, month02229, month03229, month04229, month05229,
                        month06229, month07229, month08229, month09229, month10229,
                            month11229, month12229 ];

    for (var i = 0; i < labels.length; i++) {
        values229.push(months229[i]);
    }    

    var barChartData = {
        type: 'bar',
        labels: labels,
        datasets: [
        {
            label: 'HE - 109 ',
            fillColor: "#4374a7",
            strokeColor: "#4374a7",
            pointColor: "#4374a7",
            pointStrokeColor: "#c1c7d1",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#4374a7",
            data: values109
        },
        {
            label: 'HE - 117 ',
            fillColor: "#a54942",
            strokeColor:  "#a54942",
            pointColor: "#3b8bba",
            pointStrokeColor:  "#a54942",
            pointHighlightFill: "#fff",
            pointHighlightStroke:  "#a54942",
            data: values117
        },
        {
            label: 'HE - 118 ',
            fillColor: "#89a550",
            strokeColor: "#89a550",
            pointColor: "#3b8bba",
            pointStrokeColor: "#89a550",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#89a550",
            data: values118
        },
        {
            label: 'HE - 123 ',
            fillColor: "#715b8a",
            strokeColor: "#715b8a",
            pointColor: "#3b8bba",
            pointStrokeColor: "#715b8a",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#715b8a",
            data: values123
        },
        {
            label: 'HE - 157 ',
            fillColor: "#4299ae",
            strokeColor: "#4299ae",
            pointColor: "#3b8bba",
            pointStrokeColor: "#4299ae",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#4299ae",
            data: values157
        },
        {
            label: 'HE - 229 ',
            fillColor: "#d7883b",
            strokeColor: "#d7883b",
            pointColor: "#3b8bba",
            pointStrokeColor: "#d7883b",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "#d7883b",
            data: values229
        }

      ]
    };

    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
  

    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);

    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------  FIM FIM FIM FIM -----------------------------------//
    //----------------------------- BAR CHART --------------------------------------//
    //---------------       Custo de horas extra por centro de custo       ---------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

  });
</script>
<?php  $this->end(); ?>

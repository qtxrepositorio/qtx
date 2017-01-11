<?php
$costCenters['TODOS'] = 'TODOS';
$x = 1;

for ($i = 0; $i < count($extraHourYearCurrent); $i++) {
    if (!in_array($extraHourYearCurrent[$i]['CTT_DESC01'], $costCenters)) {
        $costCenters[$extraHourYearCurrent[$i]['CTT_DESC01']] = $extraHourYearCurrent[$i]['CTT_DESC01'];
    }
    $x++;
}
?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Custo de horas extra</small>
    </h1>      
</section> 


<!----------- INICIO DO GRAFICO Custo de horas extra por verba -------------------->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Custo de horas extra por verba</h3>
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
                        <h5 id="title-chartVerba"></h5>
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
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Custo de horas extra X Meta</h3>
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
                        <h5 id="title-chartMeta"></h5>
                        <button class="btn btn-success" id="save-btn-02">Gerar imagem</button>
                        <a id="modal-02" href="#modal-container-02" role="submit" class="btn btn-primary" data-toggle="modal">Refinar gráfico</a>
                    </div>
                    <div class="chart">          
                        <canvas id="barChart02" height="100"></canvas>    
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
                            echo $this->Form->input('CustoDeHorasExtraPorCentroDeCustoCCS', ['id' => 'CustoDeHorasExtraPorCentroDeCustoCCS', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']);
                            ?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="CustoDeHorasExtraPorCentroDeCusto" type="submit" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>
<!-----------------FIM DO GRAFICO Custo de horas extra por verba -------------------->


<!-----------------INICIO DO GRAFICO Custo de horas extra X META -------------------->

 
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
                            echo $this->Form->input('CustoDeHorasExtraXMETA', ['id' => 'CustoDeHorasExtraXMETA', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']);
                            ?>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <button id="CustoDeHorasExtraXMetaBtn" type="submit" class="btn btn-primary">
                                Refinar o gráfico
                            </button>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>
<!-----------------FIM DO GRAFICO Custo de horas extra X META -------------------->

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
?>


<?php $this->start('scriptBotton'); ?>

<script>

    var extraHourYearCurrent = JSON.parse( '<?php echo json_encode($extraHourYearCurrent) ?>' );
    var extraHourLastSixMonths = JSON.parse( '<?php echo json_encode($extraHourLastSixMonths) ?>' );
    
    
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //----------------------------  INICIO  ----------------------------------------//
    //----------------------------- BAR CHART --------------------------------------//
    //---------------       Custo de horas extra por verba       ---------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    //buscando os meses que já tem contabilizado a hora extra
    var labels =[];
    for (var i = 0; i < extraHourYearCurrent.length; i++) {
        if (labels.indexOf(extraHourYearCurrent[i].RD_DATARQ) == -1 && labels.length < 12)  { //&& labels.length < 12
            labels.push(extraHourYearCurrent[i].RD_DATARQ);
            //alert(extraHourYearCurrent[i].RD_DATARQ);
        }
    }
    
    values109 = [];
    values117 = [];
    values118 = [];
    values123 = [];
    values157 = [];
    values229 = [];

    month01109 = 0;
    month02109 = 0;
    month03109 = 0;
    month04109 = 0;
    month05109 = 0;
    month06109 = 0;
    month07109 = 0;
    month08109 = 0;
    month09109 = 0;
    month10109 = 0;
    month11109 = 0;
    month12109 = 0;

    month01117 = 0;
    month02117 = 0;
    month03117 = 0;
    month04117 = 0;
    month05117 = 0;
    month06117 = 0;
    month07117 = 0;
    month08117 = 0;
    month09117 = 0;
    month10117 = 0;
    month11117 = 0;
    month12117 = 0;

    month01118 = 0;
    month02118 = 0;
    month03118 = 0;
    month04118 = 0;
    month05118 = 0;
    month06118 = 0;
    month07118 = 0;
    month08118 = 0;
    month09118 = 0;
    month10118 = 0;
    month11118 = 0;
    month12118 = 0;

    month01123 = 0;
    month02123 = 0;
    month03123 = 0;
    month04123 = 0;
    month05123 = 0;
    month06123 = 0;
    month07123 = 0;
    month08123 = 0;
    month09123 = 0;
    month10123 = 0;
    month11123 = 0;
    month12123 = 0;

    month01157 = 0;
    month02157 = 0;
    month03157 = 0;
    month04157 = 0;
    month05157 = 0;
    month06157 = 0;
    month07157 = 0;
    month08157 = 0;
    month09157 = 0;
    month10157 = 0;
    month11157 = 0;
    month12157 = 0;

    month01229 = 0;
    month02229 = 0;
    month03229 = 0;
    month04229 = 0;
    month05229 = 0;
    month06229 = 0;
    month07229 = 0;
    month08229 = 0;
    month09229 = 0;
    month10229 = 0;
    month11229 = 0;
    month12229 = 0;

    //populando o grafico
    for (var i = 0; i < labels.length; i++) {
        for (var x = 0; x < extraHourYearCurrent.length; x++) {
            if (extraHourYearCurrent[x].RD_PD === '109' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month01109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month02109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month03109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month04109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month05109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month06109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month07109 += aux;  
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month08109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month09109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month10109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month11109 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month12109 += aux;
                }                       
            }else if (extraHourYearCurrent[x].RD_PD === '117' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month01117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month02117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month03117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month04117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month05117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month06117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month07117 += aux;  
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month08117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month09117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month10117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month11117 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month12117 += aux;
                }                       
            }else if (extraHourYearCurrent[x].RD_PD === '118' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month01118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month02118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month03118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month04118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month05118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month06118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month07118 += aux;  
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month08118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month09118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month10118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month11118 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month12118 += aux;
                }                       
            }else if (extraHourYearCurrent[x].RD_PD === '123' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month01123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month02123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month03123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month04123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month05123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month06123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month07123 += aux;  
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month08123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month09123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month10123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month11123 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month12123 += aux;
                }                       
            }else if (extraHourYearCurrent[x].RD_PD === '157' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month01157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month02157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month03157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month04157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month05157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month06157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month07157 += aux;  
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month08157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month09157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month10157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month11157 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month12157 += aux;
                }                       
            }else if (extraHourYearCurrent[x].RD_PD === '229' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month01229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month02229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month03229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month04229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month05229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month06229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month07229 += aux;  
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month08229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month09229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month10229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month11229 += aux;
                }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                    var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                    month12229 += aux;
                }                       
            }
        }
    }
    
    var months109 = [ month01109.toFixed(2), month02109.toFixed(2), month03109.toFixed(2)
        , month04109.toFixed(2), month05109.toFixed(2), month06109.toFixed(2)
        , month07109.toFixed(2), month08109.toFixed(2), month09109.toFixed(2)
        , month10109.toFixed(2), month11109.toFixed(2), month12109.toFixed(2) ];

    for (var i = 0; i < labels.length; i++) {
        values109.push(months109[i]);
    }

    var months117 = [ month01117.toFixed(2), month02117.toFixed(2), month03117.toFixed(2)
        , month04117.toFixed(2), month05117.toFixed(2), month06117.toFixed(2)
        , month07117.toFixed(2), month08117.toFixed(2), month09117.toFixed(2)
        , month10117.toFixed(2), month11117.toFixed(2), month12117.toFixed(2) ];

    for (var i = 0; i < labels.length; i++) {
        values117.push(months117[i]);
    }

    var months118 = [ month01118.toFixed(2), month02118.toFixed(2), month03118.toFixed(2)
        , month04118.toFixed(2), month05118.toFixed(2), month06118.toFixed(2)
        , month07118.toFixed(2), month08118.toFixed(2), month09118.toFixed(2)
        , month10118.toFixed(2), month11118.toFixed(2), month12118.toFixed(2) ];

    for (var i = 0; i < labels.length; i++) {
        values118.push(months118[i]);
    }

    var months123 = [ month01123.toFixed(2), month02123.toFixed(2), month03123.toFixed(2)
        , month04123.toFixed(2), month05123.toFixed(2), month06123.toFixed(2)
        , month07123.toFixed(2), month08123.toFixed(2), month09123.toFixed(2)
        , month10123.toFixed(2), month11123.toFixed(2), month12123.toFixed(2) ];

    for (var i = 0; i < labels.length; i++) {
        values123.push(months123[i]);
    }

    var months157 = [ month01157.toFixed(2), month02157.toFixed(2), month03157.toFixed(2)
        , month04157.toFixed(2), month05157.toFixed(2), month06157.toFixed(2)
        , month07157.toFixed(2), month08157.toFixed(2), month09157.toFixed(2)
        , month10157.toFixed(2), month11157.toFixed(2), month12157.toFixed(2) ];

    for (var i = 0; i < labels.length; i++) {
        values157.push(months157[i]);
    }

    var months229 = [ month01229.toFixed(2), month02229.toFixed(2), month03229.toFixed(2)
        , month04229.toFixed(2), month05229.toFixed(2), month06229.toFixed(2)
        , month07229.toFixed(2), month08229.toFixed(2), month09229.toFixed(2)
        , month10229.toFixed(2), month11229.toFixed(2), month12229.toFixed(2) ];

    for (var i = 0; i < labels.length; i++) {
        values229.push(months229[i]);
    }    
  

    var ctx = document.getElementById("barChart");
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Verba - 109 ',
                    data: values109,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)',
                        'rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 1)',  'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Verba - 117 ',
                    data: values117,
                    backgroundColor: [
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: 'Verba - 118 ',
                    data: values118,
                    backgroundColor: [
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)'                        
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)', 'rgba(255, 206, 86, 1)' 
                    ],
                    borderWidth: 1
                },{
                    label: 'Verba - 123 ',
                    data: values123,
                    backgroundColor: [
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)',
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)',
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)',
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)',
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)',
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)',
                        'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)', 'rgba(175, 192, 192, 0.6)'
                    ],
                    borderWidth: 1
                },{
                    label: 'Verba - 157 ',
                    data: values157,
                    backgroundColor: [
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)'
                        
                    ],
                    borderColor: [
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                        'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                },{
                    label: 'Verba - 229 ',
                    data: values229,
                    backgroundColor: [
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                        'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)'
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
    document.getElementById("title-chartVerba").innerHTML = "Cento de custo selecionado: " + "TODOS";
    

    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------  FIM FIM FIM FIM FIM FIM FIM -----------------------//
    //----------------------------- BAR CHART --------------------------------------//
    //---------------       Custo de horas extra por verba       ---------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//


    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------  inicio inicio inicio  -----------------------//
    //----------------------------- BAR CHART --------------------------------------//
    //---------------       Custo de horas extra X META    ---------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    var costLastSixMonths = 0;
    for (var x = 0; x < extraHourLastSixMonths.length; x++) {
        var aux = parseFloat(extraHourLastSixMonths[x].SOMA);
        costLastSixMonths += aux;   
        //alert(aux);
    }

    alert(costLastSixMonths);

    costLastSixMonths /= 6;
    
    alert(costLastSixMonths);
    
    costLastSixMonths = costLastSixMonths - (costLastSixMonths * 0.05)

    costLastSixMonths = costLastSixMonths.toFixed(2);

    allMonths01 = 0;
    allMonths02 = 0;
    allMonths03 = 0;
    allMonths04 = 0;
    allMonths05 = 0;
    allMonths06 = 0;
    allMonths07 = 0;
    allMonths08 = 0;
    allMonths09 = 0;
    allMonths10 = 0;
    allMonths11 = 0;
    allMonths12 = 0;

    allMonths01 = month01109 + month01117 + month01118 + month01123 + month01157 + month01229;
    allMonths02 = month02109 + month02117 + month02118 + month02123 + month02157 + month02229;
    allMonths03 = month03109 + month03117 + month03118 + month03123 + month03157 + month03229;
    allMonths04 = month04109 + month04117 + month04118 + month04123 + month04157 + month04229;
    allMonths05 = month05109 + month05117 + month05118 + month05123 + month05157 + month05229;
    allMonths06 = month06109 + month06117 + month06118 + month06123 + month06157 + month06229;
    allMonths07 = month07109 + month07117 + month07118 + month07123 + month07157 + month07229;
    allMonths08 = month08109 + month08117 + month08118 + month08123 + month08157 + month08229;
    allMonths09 = month09109 + month09117 + month09118 + month09123 + month09157 + month09229;
    allMonths10 = month10109 + month10117 + month10118 + month10123 + month10157 + month10229;
    allMonths11 = month11109 + month11117 + month11118 + month11123 + month11157 + month11229;
    allMonths12 = month12109 + month12117 + month12118 + month12123 + month12157 + month12229;

    allMonths = [allMonths01, allMonths02, allMonths03, allMonths04, allMonths05, allMonths06,
        allMonths07, allMonths08, allMonths09, allMonths10, allMonths11, allMonths12];

    allMonthsFinish = [];
    for (var i = 0; i < labels.length; i++) {
        allMonthsFinish.push(allMonths[i].toFixed(2));
     }

    averageCostLastSixMonths = [];
    for (var i = 0; i < labels.length; i++) {
        averageCostLastSixMonths[i] = costLastSixMonths;   
    };

    ctx02 = document.getElementById("barChart02");
    myChart02 = new Chart(ctx02, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    type: 'line',
                    label: 'Meta ',
                    data: averageCostLastSixMonths
                    
                }
                ,{
                    type: 'bar',
                    label: 'Valor total de HE ',
                    data: allMonthsFinish,
                    backgroundColor: [
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)'
                    ],
                    borderColor: [
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                        'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)'
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


    document.getElementById("title-chartMeta").innerHTML = "Cento de custo selecionado: " + "TODOS";

    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------  FIM FIM FIM FIM FIM FIM FIM  -----------------------//
    //----------------------------- BAR CHART --------------------------------------//
    //---------------       Custo de horas extra X META    ---------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

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


    $("#CustoDeHorasExtraPorCentroDeCusto").click(function() {    

        var cc = document.getElementById('CustoDeHorasExtraPorCentroDeCustoCCS').value; 

        $('#modal-container-01').modal('hide');

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
            for (var x = 0; x < extraHourYearCurrent.length; x++) {
                if (cc == 'TODOS') {
                    if (extraHourYearCurrent[x].RD_PD === '109' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07109 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12109 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '117' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07117 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12117 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '118' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07118 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12118 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '123' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07123 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12123 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '157' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07157 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12157 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '229' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07229 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12229 += aux;
                        }                       
                    }
                }else{
                    if (extraHourYearCurrent[x].CTT_DESC01 == cc){
                        if (extraHourYearCurrent[x].RD_PD === '109' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07109 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12109 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '117' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07117 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12117 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '118' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07118 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12118 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '123' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07123 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12123 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '157' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07157 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12157 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '229' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07229 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12229 += aux;
                            }                       
                        }
                    }
                }
            }
        }
    
        var months109 = [ month01109.toFixed(2), month02109.toFixed(2), month03109.toFixed(2)
            , month04109.toFixed(2), month05109.toFixed(2), month06109.toFixed(2)
            , month07109.toFixed(2), month08109.toFixed(2), month09109.toFixed(2)
            , month10109.toFixed(2), month11109.toFixed(2), month12109.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values109.push(months109[i]);
        }

        var months117 = [ month01117.toFixed(2), month02117.toFixed(2), month03117.toFixed(2)
            , month04117.toFixed(2), month05117.toFixed(2), month06117.toFixed(2)
            , month07117.toFixed(2), month08117.toFixed(2), month09117.toFixed(2)
            , month10117.toFixed(2), month11117.toFixed(2), month12117.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values117.push(months117[i]);
        }

        var months118 = [ month01118.toFixed(2), month02118.toFixed(2), month03118.toFixed(2)
            , month04118.toFixed(2), month05118.toFixed(2), month06118.toFixed(2)
            , month07118.toFixed(2), month08118.toFixed(2), month09118.toFixed(2)
            , month10118.toFixed(2), month11118.toFixed(2), month12118.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values118.push(months118[i]);
        }

        var months123 = [ month01123.toFixed(2), month02123.toFixed(2), month03123.toFixed(2)
            , month04123.toFixed(2), month05123.toFixed(2), month06123.toFixed(2)
            , month07123.toFixed(2), month08123.toFixed(2), month09123.toFixed(2)
            , month10123.toFixed(2), month11123.toFixed(2), month12123.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values123.push(months123[i]);
        }

        var months157 = [ month01157.toFixed(2), month02157.toFixed(2), month03157.toFixed(2)
            , month04157.toFixed(2), month05157.toFixed(2), month06157.toFixed(2)
            , month07157.toFixed(2), month08157.toFixed(2), month09157.toFixed(2)
            , month10157.toFixed(2), month11157.toFixed(2), month12157.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values157.push(months157[i]);
        }

        var months229 = [ month01229.toFixed(2), month02229.toFixed(2), month03229.toFixed(2)
            , month04229.toFixed(2), month05229.toFixed(2), month06229.toFixed(2)
            , month07229.toFixed(2), month08229.toFixed(2), month09229.toFixed(2)
            , month10229.toFixed(2), month11229.toFixed(2), month12229.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values229.push(months229[i]);
        }    
  

        myChart.destroy();

        ctx = document.getElementById("barChart");
        myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Verba - 109 ',
                        data: values109,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Verba - 117 ',
                        data: values117,
                        backgroundColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Verba - 118 ',
                        data: values118,
                        backgroundColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Verba - 123 ',
                        data: values123,
                        backgroundColor: [
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)'
                        ],
                        borderColor: [
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)',
                            'rgba(175, 192, 192, 0.6)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Verba - 157 ',
                        data: values157,
                        backgroundColor: [
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)'
                        
                        ],
                        borderColor: [
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)',
                            'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)', 'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    },{
                        label: 'Verba - 229 ',
                        data: values229,
                        backgroundColor: [
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)',
                            'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)', 'rgba(255, 0, 255, 1)'
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
        document.getElementById("title-chartVerba").innerHTML = "Cento de custo selecionado: " + cc;
    });

    

    //---------------       Custo de horas extra por verba     ---------//
    //------------------------------FIM FIM FIM FIM FIM---------------------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    //---------------       Custo de horas extra X META     ---------//
    //------------------------------INICIO INICIO INICIO INICIO---------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//

    $("#CustoDeHorasExtraXMetaBtn").click(function() {    

        var cc = document.getElementById('CustoDeHorasExtraXMETA').value; 

        $('#modal-container-02').modal('hide');

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
            for (var x = 0; x < extraHourYearCurrent.length; x++) {
                if (cc == 'TODOS') {
                    if (extraHourYearCurrent[x].RD_PD === '109' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07109 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11109 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12109 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '117' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07117 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11117 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12117 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '118' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07118 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11118 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12118 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '123' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07123 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11123 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12123 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '157' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07157 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11157 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12157 += aux;
                        }                       
                    }else if (extraHourYearCurrent[x].RD_PD === '229' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                        if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month01229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month02229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month03229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month04229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month05229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month06229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month07229 += aux;  
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month08229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month09229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month10229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month11229 += aux;
                        }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                            var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                            month12229 += aux;
                        }                       
                    }
                }else{
                    if (extraHourYearCurrent[x].CTT_DESC01 == cc){
                        if (extraHourYearCurrent[x].RD_PD === '109' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07109 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11109 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12109 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '117' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07117 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11117 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12117 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '118' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07118 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11118 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12118 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '123' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07123 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11123 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12123 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '157' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07157 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11157 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12157 += aux;
                            }                       
                        }else if (extraHourYearCurrent[x].RD_PD === '229' && extraHourYearCurrent[x].RD_DATARQ === labels[i]) {
                            if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '01') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month01229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '02') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month02229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '03') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month03229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '04') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month04229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '05') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month05229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '06') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month06229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '07') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month07229 += aux;  
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '08') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month08229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '09') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month09229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '10') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month10229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '11') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month11229 += aux;
                            }else if (extraHourYearCurrent[x].RD_DATARQ.substring(4,6) == '12') {
                                var aux = parseFloat(extraHourYearCurrent[x].SOMA);
                                month12229 += aux;
                            }                       
                        }
                    }
                }
            }
        }
    
        var months109 = [ month01109.toFixed(2), month02109.toFixed(2), month03109.toFixed(2)
            , month04109.toFixed(2), month05109.toFixed(2), month06109.toFixed(2)
            , month07109.toFixed(2), month08109.toFixed(2), month09109.toFixed(2)
            , month10109.toFixed(2), month11109.toFixed(2), month12109.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values109.push(months109[i]);
        }

        var months117 = [ month01117.toFixed(2), month02117.toFixed(2), month03117.toFixed(2)
            , month04117.toFixed(2), month05117.toFixed(2), month06117.toFixed(2)
            , month07117.toFixed(2), month08117.toFixed(2), month09117.toFixed(2)
            , month10117.toFixed(2), month11117.toFixed(2), month12117.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values117.push(months117[i]);
        }

        var months118 = [ month01118.toFixed(2), month02118.toFixed(2), month03118.toFixed(2)
            , month04118.toFixed(2), month05118.toFixed(2), month06118.toFixed(2)
            , month07118.toFixed(2), month08118.toFixed(2), month09118.toFixed(2)
            , month10118.toFixed(2), month11118.toFixed(2), month12118.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values118.push(months118[i]);
        }

        var months123 = [ month01123.toFixed(2), month02123.toFixed(2), month03123.toFixed(2)
            , month04123.toFixed(2), month05123.toFixed(2), month06123.toFixed(2)
            , month07123.toFixed(2), month08123.toFixed(2), month09123.toFixed(2)
            , month10123.toFixed(2), month11123.toFixed(2), month12123.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values123.push(months123[i]);
        }

        var months157 = [ month01157.toFixed(2), month02157.toFixed(2), month03157.toFixed(2)
            , month04157.toFixed(2), month05157.toFixed(2), month06157.toFixed(2)
            , month07157.toFixed(2), month08157.toFixed(2), month09157.toFixed(2)
            , month10157.toFixed(2), month11157.toFixed(2), month12157.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values157.push(months157[i]);
        }

        var months229 = [ month01229.toFixed(2), month02229.toFixed(2), month03229.toFixed(2)
            , month04229.toFixed(2), month05229.toFixed(2), month06229.toFixed(2)
            , month07229.toFixed(2), month08229.toFixed(2), month09229.toFixed(2)
            , month10229.toFixed(2), month11229.toFixed(2), month12229.toFixed(2) ];

        for (var i = 0; i < labels.length; i++) {
            values229.push(months229[i]);
        }    
 
        myChart02.destroy();

        var costLastSixMonths = 0;
        for (var x = 0; x < extraHourLastSixMonths.length; x++) {
            if (cc == 'TODOS') {
                var aux = parseFloat(extraHourLastSixMonths[x].SOMA);
                costLastSixMonths += aux; 
            }else if (extraHourLastSixMonths[x].CTT_DESC01 == cc){
                var aux = parseFloat(extraHourLastSixMonths[x].SOMA);
                costLastSixMonths += aux;
                //alert(cc);
            }        
        }
        
        //alert(costLastSixMonths);

        costLastSixMonths /= 6;

        //alert(costLastSixMonths);

        costLastSixMonths = costLastSixMonths - (costLastSixMonths * 0.05);

        //alert(costLastSixMonths);

        costLastSixMonths = costLastSixMonths.toFixed(2);

        var allMonths01 = 0;
        var allMonths02 = 0;
        var allMonths03 = 0;
        var allMonths04 = 0;
        var allMonths05 = 0;
        var allMonths06 = 0;
        var allMonths07 = 0;
        var allMonths08 = 0;
        var allMonths09 = 0;
        var allMonths10 = 0;
        var allMonths11 = 0;
        var allMonths12 = 0;

        allMonths01 = month01109 + month01117 + month01118 + month01123 + month01157 + month01229;
        allMonths02 = month02109 + month02117 + month02118 + month02123 + month02157 + month02229;
        allMonths03 = month03109 + month03117 + month03118 + month03123 + month03157 + month03229;
        allMonths04 = month04109 + month04117 + month04118 + month04123 + month04157 + month04229;
        allMonths05 = month05109 + month05117 + month05118 + month05123 + month05157 + month05229;
        allMonths06 = month06109 + month06117 + month06118 + month06123 + month06157 + month06229;
        allMonths07 = month07109 + month07117 + month07118 + month07123 + month07157 + month07229;
        allMonths08 = month08109 + month08117 + month08118 + month08123 + month08157 + month08229;
        allMonths09 = month09109 + month09117 + month09118 + month09123 + month09157 + month09229;
        allMonths10 = month10109 + month10117 + month10118 + month10123 + month10157 + month10229;
        allMonths11 = month11109 + month11117 + month11118 + month11123 + month11157 + month11229;
        allMonths12 = month12109 + month12117 + month12118 + month12123 + month12157 + month12229;

        var allMonths = [allMonths01, allMonths02, allMonths03, allMonths04, allMonths05, allMonths06,
            allMonths07, allMonths08, allMonths09, allMonths10, allMonths11, allMonths12]

        var allMonthsFinish = [];
        for (var i = 0; i < labels.length; i++) {
            allMonthsFinish.push(allMonths[i]);
        }

        var averageCostLastSixMonths = [];
        for (var i = 0; i < labels.length; i++) {
            averageCostLastSixMonths[i] = costLastSixMonths;           
        };
    

        ctx02 = document.getElementById("barChart02");
        myChart02 = new Chart(ctx02, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        type: 'line',
                        label: 'Meta ',
                        data: averageCostLastSixMonths                    
                    }
                    ,{
                        type: 'bar',
                        label: 'Valor total de HE ',
                        data: allMonthsFinish,
                        backgroundColor: [
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)'
                        ],
                        borderColor: [
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)',
                            'rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)','rgba(92, 159, 255, 0.9)'
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
        document.getElementById("title-chartMeta").innerHTML = "Cento de custo selecionado: " + cc;
    });



    //---------------       Custo de horas extra X META     ---------//
    //------------------------------FIM FIM FIM FIM---------------------//
    //------------------------------------------------------------------------------//
    //-------------------------(     refinamento  )---------------------------------//
    //------------------------------------------------------------------------------//
    //------------------------------------------------------------------------------//


    // --------------------------- //
    // --------------------------- //
    // ---------FIM FIM FIM DOS BTOES DE REFINAMENTO-------- //
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

    $("#save-btn-02").click(function() {
        $("#barChart02").get(0).toBlob(function(blob) {
            saveAs(blob, "custo_de_horas_extra_x_meta.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //

</script>
<?php $this->end(); ?>

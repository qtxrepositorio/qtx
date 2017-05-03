<?php
$date = getdate();

$labels_category = [];
$count_category = [];
foreach ($quantByCategory as $key => $value) {
  # code...
  $labels_category[] = $value['NAME'];
  $count_category[] = $value['COUNT'];
}

$labels_tech = [];
$count_tech = [];
foreach ($quantByTech as $key => $value) {
  # code...
  $labels_tech[] = $value['NAME'];
  $count_tech[] = $value['COUNT'];
}



?> 

<section class="content-header">

    <legend><?= __('Painel de indicadores:') ?></legend> 

</section>

<section class="content">

    <div class="row">

        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Configurar ano de referência:</b></h3>
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
                            <div class="">
                                <fieldset>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <?php
                                        $x = null;
                                        echo $this->Form->create($x, ['url' => ['controller' => '', 'action' => '']]);
                                        echo $this->Form->input('year', ['default' => $date['year'], 'disabled' => FALSE, 'label' => 'Informe o ano:']);
                                        ?>
                                    </div> 
                                    <div class="col-md-2"></div>
                                </fieldset>  
                                <div align="center">
                                    <?= $this->Form->button(__('Refinar')) ?>
                                </div>

                                <?php echo $this->Form->end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>

    <div class="row">
      <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Técnicos mais acionadas:</h3>
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

                    </div>
                    <div class="chart">          
                        <canvas id="barChart2" ></canvas>    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Categorias mais acionadas:</h3>
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

                    </div>
                    <div class="chart">          
                        <canvas id="barChart"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<section class="content"></section>

<?php $this->start('scriptBotton'); ?>
<script>

    var labels_category = JSON.parse( '<?php echo json_encode($labels_category) ?>' );
    var count_category = JSON.parse( '<?php echo json_encode($count_category) ?>' );

    ctx = document.getElementById("barChart");
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels_category,
            datasets: [
                {
                    label: 'Categorias mais acionadas',
                    data: count_category,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        var aux = 'Quantidade: ' + parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
                        return aux.toLocaleString();
                    }
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });

    var labels_tech = JSON.parse( '<?php echo json_encode($labels_tech) ?>' );
    var count_tech = JSON.parse( '<?php echo json_encode($count_tech) ?>' );

    ctx = document.getElementById("barChart2");
    myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels_tech,
            datasets: [
                {
                    label: 'Técnicos mais acionados',
                    data: count_tech,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }
            ]
        },
        options: {
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, data) {
                        var aux = 'Quantidade: ' + parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
                        return aux.toLocaleString();
                    }
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });



    //         ----------------------------------------------------------- //
    // --------------------inicio inicio inicio de botões de gerar imagens---------------- //
    //         ----------------------------------------------------------- //

    $("#save-btn-01").click(function () {
        $("#barChart").get(0).toBlob(function (blob) {
            saveAs(blob, "categoria_de_chamados_acionadas.png");
        });
    });

    $("#save-btn-02").click(function () {
        $("#barChart2").get(0).toBlob(function (blob) {
            saveAs(blob, "tecnicos_mais_acionados.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //

</script>
<?php $this->end(); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 

<script>
    $(document).ready(function () {

        $('#example1').DataTable({
            "order": [[0, "desc"]],
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
            }, "lengthMenu": [5, 10, 15]
        });

    });
</script>


<?php
$centersNumbers = ['01', '03', '06', '07', '08', '11', '12', '13', '14', '15', '16', '18', '20', '22', '23', '28'];

$centersNames = ['ADMINISTRATIVO',
    'LABORATORIO QUALITEX',
    'LABORATORIO PETROBRAS - SE',
    'LABORATORIO PETROBRAS - BA',
    'TRANSPETRO - PE',
    'APOIO OPERACIONAL UCS - AL',
    'APOIO OPERACIONAL UPVC - AL',
    'BRASKEM UCS - BA',
    'BRASKEM UPVC - BA',
    'PARADA UCS - AL',
    'PARADA UPVC - AL',
    'BRASKEM CASA DE CELULA',
    'PETROBRAS - RN',
    'CAMINHAO',
    'SECADOR - AL',
    'LABORATORIO RN'];




$months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

$month01 = 0;
$month02 = 0;
$month03 = 0;
$month04 = 0;
$month05 = 0;
$month06 = 0;
$month07 = 0;
$month08 = 0;
$month09 = 0;
$month10 = 0;
$month11 = 0;
$month12 = 0;
foreach ($revenueYearCurrent as $key => $value) {
    if ($value['MES'] == 'Janeiro') {
        $month01 += $value['VALOR'];
    } else if ($value['MES'] == 'Fevereiro') {
        $month02 += $value['VALOR'];
    } else if ($value['MES'] == 'Março') {
        $month03 += $value['VALOR'];
    } else if ($value['MES'] == 'Abril') {
        $month04 += $value['VALOR'];
    } else if ($value['MES'] == 'Maio') {
        $month05 += $value['VALOR'];
    } else if ($value['MES'] == 'Junho') {
        $month06 += $value['VALOR'];
    } else if ($value['MES'] == 'Julho') {
        $month07 += $value['VALOR'];
    } else if ($value['MES'] == 'Agosto') {
        $month08 += $value['VALOR'];
    } else if ($value['MES'] == 'Setembro') {
        $month09 += $value['VALOR'];
    } else if ($value['MES'] == 'Outubro') {
        $month10 += $value['VALOR'];
    } else if ($value['MES'] == 'Novembro') {
        $month11 += $value['VALOR'];
    } else if ($value['MES'] == 'Dezembro') {
        $month12 += $value['VALOR'];
    }
}

$allMonths = [$month01, $month02, $month03, $month04,
    $month05, $month06, $month07, $month08,
    $month09, $month10, $month11, $month12];

$month01One = 0;
$month02One = 0;
$month03One = 0;
$month04One = 0;
$month05One = 0;
$month06One = 0;
$month07One = 0;
$month08One = 0;
$month09One = 0;
$month10One = 0;
$month11One = 0;
$month12One = 0;

foreach ($expensesOne as $key => $value) {
    if ($value['MES'] == 1) {
        $month01One += $value['TOTAL'];
    } else if ($value['MES'] == 2) {
        $month02One += $value['TOTAL'];
    } else if ($value['MES'] == 3) {
        $month03One += $value['TOTAL'];
    } else if ($value['MES'] == 4) {
        $month04One += $value['TOTAL'];
    } else if ($value['MES'] == 5) {
        $month05One += $value['TOTAL'];
    } else if ($value['MES'] == 6) {
        $month06One += $value['TOTAL'];
    } else if ($value['MES'] == 7) {
        $month07One += $value['TOTAL'];
    } else if ($value['MES'] == 8) {
        $month08One += $value['TOTAL'];
    } else if ($value['MES'] == 9) {
        $month09One += $value['TOTAL'];
    } else if ($value['MES'] == 10) {
        $month10One += $value['TOTAL'];
    } else if ($value['MES'] == 11) {
        $month11One += $value['TOTAL'];
    } else if ($value['MES'] == 12) {
        $month12One += $value['TOTAL'];
    }
}

$allMonthsOne = [$month01One, $month02One, $month03One, $month04One,
    $month05One, $month06One, $month07One, $month08One,
    $month09One, $month10One, $month11One, $month12One];
?>

<section class="content-header">
    <h1>
        Painel
        <small>Controroladoria - Despesas vs Receitas</small>
    </h1>      
</section>  


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Despesas</h3>
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

                            <?php
                            $x = 0;
                            echo $this->Form->create($x, ['url' => ['controller' => 'Controllership', 'action' => 'expensesVersusRecipesFilter']]);
                            ?>
                            <div class="col-md-3">

                            </div>

                            <div class="col-md-6">
                                <?php
                                echo $this->Form->input('yearOne', ['id' => 'yearOne', 'label' => 'Ano:']);


                                echo $this->Form->input('cc', ['id' => 'cc', 'label' => 'Centro de custo: *']);
                                ?>
                            </div>

                            <div class="col-md-3">

                            </div>

                            <div class="col-md-12" align="center">	
                                <h5>
                                    * Use o centro de custo vazio no caso de querer todos.
                                </h5>
                                <button class="btn btn-success" type="submit"><?php echo __('Refinar Informações'); ?>
                                </button>
                                <?php echo $this->Form->end(); ?>
                            </div>

                        </div>

                        <div class="col-md-3">

                        </div>

                    </div>

                    <hr  width="100%">

                    <div class="row">

                        <div class="box-body">

                            <div class="col-md-12">

                                <div class="box-body">
                                    <div align="right">
                                        <h5 id="title-02"></h5>
                                        <button class="btn btn-success" id="save-btn-02">Gerar imagem</button>
                                    </div>
                                    <div class="chart">          
                                        <canvas id="barChart" height="110"></canvas>    
                                    </div>
                                </div>                               


                            </div>

                        </div> 
                        
                        <br><br><br>

                        <div class="box-body">

                            <div class="col-md-12">

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>                                
                                            <th>Mês</th>
                                            <th>Despesa</th>
                                            <th>Receita</th>
                                            <th>Lucro</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        $totalExpenses = 0;
                                        $totalRecipes = 0;
                                        $diferenca[] = null;
                                        for ($i = 0; $i < 12; $i++) {
                                            ?>
                                            <tr>

                                                <?php
                                                $date = getdate();

                                                if ($yearOne == $date['year'] and $i + 1 == $date['mon']) {
                                                    ?>

                                                    <td class="warning"><?php echo $months[$i] . ' - Mês parcial.'; ?></td>
                                                    <td class="warning"><?php echo(number_format($allMonthsOne[$i], 2, ',', '.')); ?></td>
                                                    <td class="warning"><?php echo(number_format($allMonths[$i], 2, ',', '.')); ?></td>

                                                    <td class="warning"><?php echo number_format($allMonths[$i] - $allMonthsOne[$i], 2, ',', '.'); ?></td>

                                                    <?php
                                                } else {
                                                    ?>

                                                    <td ><?php echo $months[$i]; ?></td>
                                                    <td ><?php echo(number_format($allMonthsOne[$i], 2, ',', '.')); ?></td>
                                                    <td ><?php echo(number_format($allMonths[$i], 2, ',', '.')); ?></td>

                                                    <?php
                                                    if (($allMonths[$i] - $allMonthsOne[$i]) <= 0) {
                                                        ?>
                                                        <td class="danger"><?php echo number_format($allMonths[$i] - $allMonthsOne[$i], 2, ',', '.'); ?></td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td class="success"><?php echo number_format($allMonths[$i] - $allMonthsOne[$i], 2, ',', '.'); ?></td>
                                                        <?php
                                                    }
                                                }
                                                ?>



                                            </tr>
    <?php
    $diferenca[$i] = $allMonths[$i] - $allMonthsOne[$i];
    $totalExpenses += $allMonthsOne[$i];
    $totalRecipes += $allMonths[$i];
}
?>

                                        <tr>                                
                                            <td>Total Anual</td>
                                            <td><?php echo number_format($totalExpenses, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($totalRecipes, 2, ',', '.'); ?></td>
                                            <td><?php echo number_format($totalRecipes - $totalExpenses, 2, ',', '.'); ?></td>
                                        </tr>


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

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 


<?php $this->start('scriptBotton'); ?>
<script>

    var cc = JSON.parse( '<?php echo json_encode($cc) ?>' );
    var yearOne = JSON.parse( '<?php echo json_encode($yearOne) ?>' );

    var date = new Date();
    var year = date.getFullYear();
    document.getElementById("yearOne").value = yearOne;
    document.getElementById("cc").value = cc;

    var months = JSON.parse( '<?php echo json_encode($months) ?>' );
    var allMonths = JSON.parse( '<?php echo json_encode($allMonths) ?>' );
    var allMonthsOne = JSON.parse( '<?php echo json_encode($allMonthsOne) ?>' );
    var diferenca = JSON.parse( '<?php echo json_encode($diferenca) ?>' );
    
    
    ctx = document.getElementById("barChart");
    myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [
                {
                    
                    label: 'Despesas',
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
                    data: allMonthsOne,
                    spanGaps: false 
                                  
                },
                {
                    label: 'Receitas',
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
                    data: allMonths,
                    spanGaps: false                         
                },
                {                   
                    label: 'Lucro',
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "rgba(255,255,0, 0.4)",
                    borderColor: "rgba(255,255,0, 1)",
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(255,255,0, 1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(255,255,0, 1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: diferenca,
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
                    }],
                xAxes: [{
                        ticks: {
                            beginAtZero:false
                        }
                    }]
            }

        }
    });
    
    
    
    //         ----------------------------------------------------------- //
    // --------------------inicio inicio inicio de botões de gerar imagens---------------- //
    //         ----------------------------------------------------------- //

    $("#save-btn-02").click(function() {
        $("#barChart").get(0).toBlob(function(blob) {
            saveAs(blob, "receitasVersusDespesas.png");
        });
    });

    //         ----------------------------------------------------------- //
    // --------------------FIM FIM FIM de botões de gerar imagens------------------------ //
    //         ----------------------------------------------------------- //


</script>
<?php $this->end(); ?>


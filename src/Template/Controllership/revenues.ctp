<?php
$date = getdate();

$totalyear = 0;

$inss = 0;
$iss = 0;
$pis = 0;
$cofins = 0;
$csl = 0;
$ir = 0;
for ($i = 0; $i < count($revenuesCountDebitByCount); $i++) {
    if ($revenuesCountDebitByCount[$i]['CT2_DEBITO'] == '11204005            ') {
        $pis += $revenuesCountDebitByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountDebitByCount[$i]['CT2_DEBITO'] == '11204007            ') {
        $cofins += $revenuesCountDebitByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountDebitByCount[$i]['CT2_DEBITO'] == '11204008            ') {
        $iss += $revenuesCountDebitByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountDebitByCount[$i]['CT2_DEBITO'] == '11204009            ') {
        $ir += $revenuesCountDebitByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountDebitByCount[$i]['CT2_DEBITO'] == '11204010            ') {
        $csl += $revenuesCountDebitByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountDebitByCount[$i]['CT2_DEBITO'] == '11204011            ') {
        $inss += $revenuesCountDebitByCount[$i]['CT2_VALOR'];
    }
}
$totalRetido = $inss + $iss + $pis + $cofins + $csl + $ir;

$servDentro = 0;
$servFora = 0;
$prodDentro = 0;
$prodFora = 0;
for ($i = 0; $i < count($revenuesCountCreditByCount); $i++) {
    if ($revenuesCountCreditByCount[$i]['CT2_CREDIT'] == '31101001            ') {
        $servDentro += $revenuesCountCreditByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountCreditByCount[$i]['CT2_CREDIT'] == '31101002            ') {
        $servFora += $revenuesCountCreditByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountCreditByCount[$i]['CT2_CREDIT'] == '31102001            ') {
        $prodDentro += $revenuesCountCreditByCount[$i]['CT2_VALOR'];
    }else if ($revenuesCountCreditByCount[$i]['CT2_CREDIT'] == '31102002            ') {
        $prodFora += $revenuesCountCreditByCount[$i]['CT2_VALOR'];
    }   
}
$totalBruto = $servDentro + $servFora + $prodDentro + $prodFora;

$percentualRetido  = ($totalRetido * 100) / $totalBruto;

?>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
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
                            <div class="roles form large-9 medium-8 columns content">
                                <fieldset>
                                    <legend><?= __('Informar o ano desejado:') ?></legend>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <?php
                                            echo $this->Form->input('name', ['default' => '2017' ,'disabled' => FALSE,'label'=>' ']);
                                        ?>
                                    </div> 
                                    <div class="col-md-4""></div>
                                </fieldset>
                                <div align="center">
                                    <?= $this->Form->button(__('Carregar')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Relação de retenção e valor bruto. <b> Ano: <?php echo $date['year']?></b></h3>
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
                            <div class="chart">          
                                <canvas id="barChart" height="150"></canvas>    
                            </div>
                            <div>
                                <h4>Percentual retido: <?php echo number_format($percentualRetido,0,',','.') . '%'; ?></h4>
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
                    <h3 class="box-title">Tabela de receitas - Receita bruta/Conta . <b> Ano: <?php echo $date['year']?></b></h3>
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
                                
                                <thead>  
                                    <tr>           
                                       <th>Natureza</th>  
                                       <th>Valor</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <th> Receita bruta - venda de serviços </th>
                                        <td>*</td>
                                    </tr>
                                    <tr>
                                        <td> Vendas dentro do estado </td>
                                        <td><?php echo number_format($servDentro,0,',','.') ?></td>
                                    </tr>
                                    <tr>
                                        <td> Vendas fora do estado </td>
                                        <td><?php echo number_format($servFora,0,',','.') ?></td>
                                    </tr>
                                    <tr>
                                        <th> Receita bruta - venda de produtos </th>
                                        <td>*</td>
                                    </tr>                                                                            
                                    <tr>
                                        <td> Vendas dentro do estado </td>
                                        <td><?php echo number_format($prodDentro,0,',','.') ?></td>
                                    </tr>
                                    <tr>
                                        <td> Vendas fora do estado </td>
                                        <td><?php echo number_format($prodFora,0,',','.') ?></td>
                                    </tr> 
                                    <tr>
                                        <th> Total </th>
                                        <th><?php echo 'R$ ' . number_format($totalBruto,0,',','.') ?></th>
                                    </tr> 
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de receitas - Retenção na fonte. <b> Ano: <?php echo $date['year']?></b></h3>
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
                                
                                <thead>  
                                    <tr>           
                                        <th>Encargo</th>  
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <tr>           
                                        <th>INSS</th>  
                                        <td><?php echo number_format($inss,0,',','.') ?></td>
                                    </tr>
                                    <tr>           
                                        <th>ISS</th>  
                                        <td><?php echo number_format($iss,0,',','.') ?></td>
                                    </tr>
                                    <tr>           
                                        <th>PIS</th>  
                                        <td><?php echo number_format($pis,0,',','.') ?></td>
                                    </tr>
                                    <tr>           
                                        <th>COFINS</th>  
                                        <td><?php echo number_format($cofins,0,',','.') ?></td>
                                    </tr>
                                    <tr>           
                                        <th>CSL</th>  
                                        <td><?php echo number_format($csl,0,',','.') ?></td>
                                    </tr>   
                                    <tr>           
                                        <th>IR</th>  
                                        <td><?php echo number_format($ir,0,',','.') ?></td>
                                    </tr>
                                    <tr>
                                        <th> Total </th>
                                        <th><?php echo 'R$ ' . number_format($totalRetido,0,',','.') ?></th>
                                    </tr> 
                                </tbody>
                                
                            </table>
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
?>


<?php $this->start('scriptBotton'); ?>

<script>
    
var totalBruto = JSON.parse( '<?php echo json_encode($totalBruto) ?>' );
var totalRetido = JSON.parse( '<?php echo json_encode($totalRetido) ?>' );
    
var data = {
    labels: [
        "Bruto",
        "Retido"
    ],
    datasets: [
        {
            data: [totalBruto, totalRetido],
            backgroundColor: [
                "#36A2EB",
                "#FF6384"
            ],
            hoverBackgroundColor: [
                 "#36A2EB",
                "#FF6384"
            ]
        }]
};
// For a pie chart
var ctx = document.getElementById("barChart");
var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,
     options: {
                tooltips: {
                    callbacks: {      
                        label: function(tooltipItem, data) {
                        var aux = parseFloat(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
                        return aux.toLocaleString("pt-br",{style:"currency", currency:"BRL"});
                        }
                    }
                }
            }
        });
</script>

<?php $this->end(); ?>

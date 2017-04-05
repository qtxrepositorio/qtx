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


<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
?>


<?php $this->start('scriptBotton'); ?>
<script>

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

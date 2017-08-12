<br>
<section class="content">

    <div class="row">

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe os dados</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form large-9 medium-8 columns content">
                        <fieldset>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <?php
                                $x = null;
                                echo $this->Form->create();
                                echo $this->Form->input('year', ['default' => $year,'disabled' => FALSE,'label'=>'Ano:']);
                                echo $this->Form->input('month', ['default' => $month,'disabled' => FALSE,'label'=>'Mês:','options' => ['TODOS','01','02','03','04','05','06','07','08','09','10','11','12']])
                                ?>
                            </div>
                            <div class="col-md-4"></div>
                        </fieldset>

                        <div align="center">
                            <?= $this->Form->button(__('Refinar')) ?>
                        </div>

                        <?php echo $this->Form->end();   ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico dos técnicos + acionadas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="barChartForTech" style="height:250px"></canvas>
                </div>
            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Rank polar das 5 áreas + acionadas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="barChartForArea" style="height:250px"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Gráfico das 5 categorias + acionadas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="lineChartForCategories" style="height:250px"></canvas>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Tecnicos com + chamados solucionados</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="lineChartForTechFinished" style="height:250px"></canvas>
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

var forArea = JSON.parse( '<?php echo json_encode($forArea) ?>' );
var backgroundColor = ['rgba(0, 150, 255, 0.2)','rgba(0, 0, 255, 0.2)','rgba(247, 0, 43, 0.2)','rgba(0, 53, 255, 0.2)'];
var data = [];
var labels = [];

for (var i = 0; i < forArea.length; i++) {
    data.push(forArea[i]['count']);
    labels.push(forArea[i]['name']);
}

data = {
    datasets: [{
        data: data,
        backgroundColor: backgroundColor
    }],
    labels: labels
};

var ctx = document.getElementById("barChartForArea");
new Chart(ctx, {
    data: data,
    type: 'polarArea'
});


// ===========================

var forCategories = JSON.parse( '<?php echo json_encode($forCategories) ?>' );

var backgroundColor = ['rgba(105, 218, 110, 0.4)'];
var data = [];
var labels = [];

for (var i = 0; i < forCategories.length; i++) {
    data.push(forCategories[i]['count']);
    labels.push(forCategories[i]['calls_categories_name']);
}

data = {
    datasets: [{
        data: data,
        backgroundColor: backgroundColor
    }],
    labels: labels
};

var ctx = document.getElementById("lineChartForCategories");
new Chart(ctx, {
    data: data,
    type: 'line'
});

// ===========================

var forTech = JSON.parse( '<?php echo json_encode($forTech) ?>' );

var backgroundColor = ['rgba(17, 0, 255, 0.4)','rgba(0, 212, 255, 0.4)','rgba(17, 165, 44, 0.4)','rgba(247, 0, 43, 0.2)','rgba(0, 53, 255, 0.2)'];
var data = [];
var labels = [];

for (var i = 0; i < forTech.length; i++) {
    data.push(forTech[i]['count']);
    labels.push(forTech[i]['users_username']);
}

data = {
    datasets: [{
        data: data,
        backgroundColor: backgroundColor
    }],
    labels: labels
};

var ctx = document.getElementById("barChartForTech");
new Chart(ctx, {
    data: data,
    type: 'bar'
});

// ===========================

var quantStatusFinished = JSON.parse( '<?php echo json_encode($quantStatusFinished) ?>' );

var backgroundColor = ['rgba(17, 0, 255, 0.4)','rgba(0, 212, 255, 0.4)','rgba(17, 165, 44, 0.4)','rgba(247, 0, 43, 0.2)','rgba(0, 53, 255, 0.2)'];
var data = [];
var labels = [];

for (var i = 0; i < quantStatusFinished.length; i++) {
    data.push(quantStatusFinished[i]['count']);
    labels.push(quantStatusFinished[i]['users_username']);
}

data = {
    datasets: [{
        data: data,
        backgroundColor: backgroundColor
    }],
    labels: labels
};

var ctx = document.getElementById("lineChartForTechFinished");
new Chart(ctx, {
    data: data,
    type: 'line'
});

</script>
<?php $this->end(); ?>

<?php

$date = getdate();

$x = ['TODOS','01 - ADMINISTRATIVO', '03 - LABORATORIO QUALITEX', '06 - LABORATORIO PETROBRAS - SE',
                '07 - LABORATORIO PETROBRAS - BA', '08 - TRANSPETRO - PE', '11 - APOIO OPERACIONAL UCS - AL',
                '12 - APOIO OPERACIONAL UPVC - AL', '13 - BRASKEM UCS - BA', '14 - BRASKEM UPVC - BA',
                '15 - PARADA UCS - AL', '16 - PARADA UPVC - AL','18 - BRASKEM CASA DE CELULA',
                '20 - PETROBRAS - RN', '22 - CAMINHAO', '23 - SECADOR - AL', '28 - LABORATORIO RN', '29 - ETE QUALITEX AL',
                '32 - LANXES'];
$costCenters = [];
for($i = 0; $i < sizeof($x); $i++){
    $costCenters[$x[$i]] = $x[$i];
}

$x = ['JANEIRO','FEVEREIRO','MARÇO','ABRIL','MAIO','JUNHO','JULHO','AGOSTO','SETEMBRO','OUTUBRO','NOVEMBRO','DEZEMBRO'];
$months = [];
for($i = 0; $i < sizeof($x); $i++){
    $months[$x[$i]] = $x[$i];
}

$x = ['PRIMEIRO','SEGUNDO'];
$semesters = [];
for($i = 0; $i < sizeof($x); $i++){
    $semesters[$x[$i]] = $x[$i];
}

$x = ['PRIMEIRO','SEGUNDO','TERCEIRO','QUARTO'];
$quarters = [];
for($i = 0; $i < sizeof($x); $i++){
    $quarters[$x[$i]] = $x[$i];
}

$x = ['PRIMEIRO','SEGUNDO','TERCEIRO','QUARTO','QUINTO','SEXTO'];
$bimestres = [];
for($i = 0; $i < sizeof($x); $i++){
    $bimestres[$x[$i]] = $x[$i];
}

?>

<section class="content-header">
    <h1>
        Painel
        <small>Controladoria - Apuração de resultados</small>
    </h1>
</section>

<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="tabbable" id="tabs-229544">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#panel-01" data-toggle="tab">Comparativo anual</a>
                        </li>
                        <li>
                            <a href="#panel-02" data-toggle="tab">Comparativo semestral</a>
                        </li>
                        <li>
                            <a href="#panel-03" data-toggle="tab">Comparativo trimestral</a>
                        </li>
                        <li>
                            <a href="#panel-04" data-toggle="tab">Comparativo bimestral</a>
                        </li>
                        <li class="active">
                            <a href="#panel-05" data-toggle="tab">Comparativo mensal</a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane" id="panel-01">
                            <br><br>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Comparativo anual:</b></h3>
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
                                                        <?php
                                                            $x = null;
                                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => '']]);
                                                            echo $this->Form->input('yearOne', ['default' => $date['year'] - 1 ,'disabled' => FALSE,'label'=>'Informe ano 1:']);
                                                            echo $this->Form->input('yearTwo', ['default' => $date['year'] ,'disabled' => FALSE,'label'=>'Informe ano 2:']);

                                                        ?>
                                                    </fieldset>

                                                    <!--
                                                    <div align="center">
                                                        <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Comparar anos'); ?></button>
                                                    </div>
                                                    -->
                                                    <h5>Em desenvolvimento --- AGUARDE!</h5>
                                                    <?php echo $this->Form->end();   ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="tab-pane" id="panel-02">
                            <br><br>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Comparativo semestral:</b></h3>
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
                                                        <?php
                                                            $x = null;
                                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => '']]);
                                                            echo $this->Form->input('yearOne', ['default' => $date['year'] - 1,'disabled' => FALSE,'label'=>'Informe ano 1:']);
                                                            echo $this->Form->input('yearTwo', ['default' => $date['year'],'disabled' => FALSE,'label'=>'Informe ano 2:']);
                                                            echo $this->Form->input('semesters', ['id' => 'semesters', 'options' => $semesters, 'label' => 'Selecione o semestre:']);

                                                        ?>
                                                    </fieldset>

                                                    <!--
                                                    <div align="center">
                                                        <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Comparar semestres'); ?></button>
                                                    </div>
                                                    -->
                                                    <h5>Em desenvolvimento --- AGUARDE!</h5>
                                                <?php echo $this->Form->end();   ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="tab-pane" id="panel-03">
                            <br><br>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Comparativo trimestral:</b></h3>
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
                                                        <?php
                                                            $x = null;
                                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => '']]);
                                                            echo $this->Form->input('yearOne', ['default' => $date['year'] - 1,'disabled' => FALSE,'label'=>'Informe ano 1:']);
                                                            echo $this->Form->input('yearTwo', ['default' => $date['year'],'disabled' => FALSE,'label'=>'Informe ano 2:']);
                                                            echo $this->Form->input('quarters', ['id' => 'quarters', 'options' => $quarters, 'label' => 'Selecione o trimeste:']);

                                                        ?>
                                                    </fieldset>

                                                    <!--
                                                    <div align="center">
                                                        <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Comparar trimestes'); ?></button>
                                                    </div>
                                                    -->
                                                    <h5>Em desenvolvimento --- AGUARDE!</h5>
                                                    <?php echo $this->Form->end();   ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="tab-pane" id="panel-04">
                            <br><br>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Comparativo bimestral:</b></h3>
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
                                                        <?php
                                                            $x = null;
                                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => '']]);
                                                            echo $this->Form->input('yearOne', ['default' => $date['year'] - 1,'disabled' => FALSE,'label'=>'Informe ano 1:']);
                                                            echo $this->Form->input('yearTwo', ['default' => $date['year'],'disabled' => FALSE,'label'=>'Informe ano 2:']);
                                                            echo $this->Form->input('bimestre', ['id' => 'bimestre', 'options' => $bimestres, 'label' => 'Selecione o bimestre:']);

                                                        ?>
                                                    </fieldset>

                                                    <!--
                                                    <div align="center">
                                                        <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Comparar bimestre'); ?></button>
                                                    </div>
                                                    -->
                                                    <h5>Em desenvolvimento --- AGUARDE!</h5>
                                                    <?php echo $this->Form->end();   ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <div class="tab-pane active" id="panel-05">
                            <br><br>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Comparativo mensal:</b></h3>
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
                                                        <?php
                                                            $x = null;
                                                            echo $this->Form->create($x,['url' => ['controller'=>'Controllership','action' => 'DeterminationOfResultsMonthly']]);
                                                            echo $this->Form->input('yearOne', ['default' => $date['year'] - 1,'disabled' => FALSE,'label'=>'Informe ano 1:']);
                                                            echo $this->Form->input('yearTwo', ['default' => $date['year'],'disabled' => FALSE,'label'=>'Informe ano 2:']);
                                                            echo $this->Form->input('monthly', ['id' => 'monthly', 'options' => $months, 'label' => 'Selecione o mes:']);
                                                            echo $this->Form->input('cc', ['id' => 'cc', 'options' => $costCenters, 'label' => 'Selecione o centro de custo:']);

                                                        ?>
                                                    </fieldset>
                                                    <div align="center">
                                                        <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Comparar meses'); ?></button>
                                                    </div>
                                                    <?php echo $this->Form->end();   ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

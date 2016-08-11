<?php

$monthForPDF = null;
$months = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');

?>

<!-- Main content -->
<section class="content">
    
    <!-- ./Quadro Geral de avisos -->
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-90 medium-8 columns content">
                    <div align='right'>
                    <?= $this->Html->link(__('Ir para a central de avisos.'), ['controller'=>'Notices','action'=>'index'])?>
                    </div>
                    <legend><?= __('Quadro de avisos:') ?></legend>
                    <div class="box-body">
                        <legend><?= __('Últimos aviso(s) recebidos:') ?></legend>  
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>                                
                                    <th>Assunto:</th>
                                    <th>Criado em:</th>
                                    <th>Usuário criador:</th>
                                    <th align="center"  class="actions"><?= __('Ações:') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($noticesUsers as $noticesUser): ?>
                                <tr> 
                                    <?php 
                                        if (strlen($noticesUser->notices['subject']) > 45) 
                                        {
                                    ?>        <td><?= h(substr($noticesUser->notices['subject'],0,45).' [...]') ?></td>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>        <td><?= h($noticesUser->notices['subject']) ?></td>     
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        $dateConvertedForTable = explode("-", $noticesUser->notices['created']);
                                        $day = substr($dateConvertedForTable[2],0,2);
                                        $month = $dateConvertedForTable[1];
                                        $year = $dateConvertedForTable[0];
                                        $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                    ?>   
                                    <td><?= h($dateConvertedForTable) ?></td>
                                    <td><?= h($noticesUser->users['name']) ?></td>
                                    <td align="center" class="actions">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller'=> 'Notices','action' => 'view', $noticesUser->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                        <legend><?= __('Últimos aviso(s) recebidos em grupo:') ?></legend>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>                                
                                    <th>Assunto:</th>
                                    <th>Criado em:</th>
                                    <th>Usuário criador:</th>
                                    <th class="actions"><?= __('Ações:') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($noticesRoles as $noticesRole): ?>
                                <tr> 
                                    <?php 
                                        if (strlen($noticesRole['subject']) > 45) 
                                        {
                                    ?>        <td><?= h(substr($noticesRole['subject'],0,45).' [...]') ?></td>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>        <td><?= h($noticesRole['subject']) ?></td>     
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        $dateConvertedForTable = explode("-", $noticesRole['created']);
                                        $day = substr($dateConvertedForTable[2],0,2);
                                        $month = $dateConvertedForTable[1];
                                        $year = $dateConvertedForTable[0];
                                       $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                    ?> 
                                    <td><?= h($dateConvertedForTable) ?></td>
                                    <td><?= h($noticesRole['name']) ?></td>
                                    <td align="center" class="actions">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller'=> 'Notices','action' => 'view', $noticesRole['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>                        
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <div align='right'> <a id="modal-235086" href="#modal-container-235086" role="button" class="btn" data-toggle="modal">Ver lista completa</a> </div>
                    <legend><?= __('Aniversários:') ?></legend>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Dia:</th>
                                    <th>Nome:</th>
                                    <th>Centro de custo:</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                      <?php foreach ($birthdaysOfTheMonth as $key): ?>
                                      <?php 
                                        $dateBirthday = explode("/", $key['DataDeNascimento']);
                                        $dateCurrent = getdate();
                                        $dayCurrent = $dateCurrent['mday'];
                                        if($dateBirthday[0] == $dayCurrent)
                                        {
                                      ?>
                                <tr class="success">             
                                    <td><?= $dateBirthday[0] ?></td>  
                                    <td><?= $key['RA_NOME'] ?></td>
                                    <td><?= $key['CTT_DESC01'] ?></td>
                                </tr>
                                      <?php
                                      }
                                      else
                                      {                                
                                      ?>
                                <tr>               
                                    <td><?= $dateBirthday[0] ?></td>
                                    <td><?= $key['RA_NOME'] ?></td>
                                    <td><?= $key['CTT_DESC01'] ?></td>
                                </tr>
                                      <?php 
                                      } 
                                      ?>
                                      <?php endforeach; ?>
                        </table>
                        <h5 align="right"><b>* Aniversariantes recentes, margem de 2 dias antes e 2 dias depois da data atual.</b></h5>                              
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!-- modal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">      
                <div class="modal fade" id="modal-container-235086" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    ×
                                </button>
                                <h4 class="modal-title" id="myModalLabel">
                                    Informe o(s) parametro(s) para a busca:
                                </h4>
                            </div>
                            <div class="modal-body" align="center">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        <?php
                                            echo $this->Form->create($monthForPDF,['url' => ['controller'=>'BirthdaysOfTheMonth','action' => 'view_pdf']]);
                                            echo $this->Form->input('monthForPDF', ['options' => $months, 'label' => 'Mês desejado:']);
                                        ?>                                       

                                        <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Invite'); ?></button>
                                            
                                        <?php echo $this->Form->end();   ?>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
</section>
<!-- /.content -->
<?php
$this->Html->css([
    'AdminLTE./plugins/iCheck/flat/blue',
    'AdminLTE./plugins/morris/morris',
    'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min'
  ],
  ['block' => 'css']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
  'AdminLTE./plugins/morris/morris.min',
  'AdminLTE./plugins/sparkline/jquery.sparkline.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
  'AdminLTE./plugins/jvectormap/jquery-jvectormap-world-mill-en',
  'AdminLTE./plugins/knob/jquery.knob',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script type="text/javascript">

    $('#modal-container-235086').on(
        'submit', function() {
        $('#modal-container-235086').modal('hide');
    });

    var area = new Morris.Area({
        element: 'revenue-chart',
        resize: true,
        data: [
            {y: '2011 Q1', item1: 2666, item2: 2666},
            {y: '2011 Q2', item1: 2778, item2: 2294},
            {y: '2011 Q3', item1: 4912, item2: 1969},
            {y: '2011 Q4', item1: 3767, item2: 3597},
            {y: '2012 Q1', item1: 6810, item2: 1914},
            {y: '2012 Q2', item1: 5670, item2: 4293},
            {y: '2012 Q3', item1: 4820, item2: 3795},
            {y: '2012 Q4', item1: 15073, item2: 5967},
            {y: '2013 Q1', item1: 10687, item2: 4460},
            {y: '2013 Q2', item1: 8432, item2: 5713}
        ],
        xkey: 'y',
        ykeys: ['item1', 'item2'],
        labels: ['Item 1', 'Item 2'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        hideHover: 'auto'
    });
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
            {y: '2011 Q1', item1: 2666},
            {y: '2011 Q2', item1: 2778},
            {y: '2011 Q3', item1: 4912},
            {y: '2011 Q4', item1: 3767},
            {y: '2012 Q1', item1: 6810},
            {y: '2012 Q2', item1: 5670},
            {y: '2012 Q3', item1: 4820},
            {y: '2012 Q4', item1: 15073},
            {y: '2013 Q1', item1: 10687},
            {y: '2013 Q2', item1: 8432}
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        lineColors: ['#efefef'],
        lineWidth: 2,
        hideHover: 'auto',
        gridTextColor: "#fff",
        gridStrokeWidth: 0.4,
        pointSize: 4,
        pointStrokeColors: ["#efefef"],
        gridLineColor: "#efefef",
        gridTextFamily: "Open Sans",
        gridTextSize: 10
    });

    //Donut Chart
    var donut = new Morris.Donut({
        element: 'sales-chart',
        resize: true,
        colors: ["#3c8dbc", "#f56954", "#00a65a"],
        data: [
            {label: "Download Sales", value: 12},
            {label: "In-Store Sales", value: 30},
            {label: "Mail-Order Sales", value: 20}
        ],
        hideHover: 'auto'
    });

    //Fix for charts under tabs
    $('.box ul.nav a').on('shown.bs.tab', function () {
        area.redraw();
        donut.redraw();
        line.redraw();
    });

    //jvectormap data
    var visitorsData = {
        "US": 398, //USA
        "SA": 400, //Saudi Arabia
        "CA": 1000, //Canada
        "DE": 500, //Germany
        "FR": 760, //France
        "CN": 300, //China
        "AU": 700, //Australia
        "BR": 600, //Brazil
        "IN": 800, //India
        "GB": 320, //Great Britain
        "RU": 3000 //Russia
    };
    //World map by jvectormap
    $('#world-map').vectorMap({
        map: 'world_mill_en',
        backgroundColor: "transparent",
        regionStyle: {
            initial: {
                fill: '#e4e4e4',
                "fill-opacity": 1,
                stroke: 'none',
                "stroke-width": 0,
                "stroke-opacity": 1
            }
        },
        series: {
            regions: [{
                    values: visitorsData,
                    scale: ["#92c1dc", "#ebf4f9"],
                    normalizeFunction: 'polynomial'
                }]
        },
        onRegionLabelShow: function (e, el, code) {
            if (typeof visitorsData[code] != "undefined")
                el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
        }
    });

    /* jQueryKnob */
    $(".knob").knob();

    /* The todo list plugin */
    $(".todo-list").todolist({
        onCheck: function (ele) {
            window.console.log("The element has been checked");
            return ele;
        },
        onUncheck: function (ele) {
            window.console.log("The element has been unchecked");
            return ele;
        }
    });

    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

    $('.daterange').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function (start, end) {
        window.alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    //The Calender
    $("#calendar").datepicker();

    //SLIMSCROLL FOR CHAT WIDGET
    $('#chat-box').slimScroll({
        height: '250px'
    });

</script>
<?php  $this->end(); ?>

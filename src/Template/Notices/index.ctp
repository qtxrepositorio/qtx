<?php ?>

<section class="content-header">

    <legend><?= __('Central de avisos:') ?></legend> 

</section>


<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning">
                       <div class="box-body">

                    <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'NoticesUsers','action'=>'index'])?> </div>
                        <legend><?= __('Últimos aviso(s) recebidos:') ?></legend>  
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>                            
                                    <th>Assunto:</th>
                                    <th>Criado em:</th>
                                    <th>Usuário criador:</th>
                                    <th align="center" class="actions"><?= __('Ações:') ?></th>
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
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $noticesUser->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<div class="col-md-6">
            <div class="box box-warning">
                <div class="box-body">
                    <div align='right'> <?= $this->Html->link(__('Ver Todos'), ['controller'=>'NoticesRoles','action'=>'index'])?> </div>
                        <legend><?= __('Últimos aviso(s) recebidos  em grupo:') ?></legend>  

                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>                            
                                <th>Assunto:</th>
                                <th>Criado em:</th>
                                <th>Usuário criador:</th>
                                <th align="center" class="actions"><?= __('Ações:') ?></th>
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
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $noticesRole['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                    </td>
                                </tr>                        
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                        
                        
                    </div>
                </div>
            </div>


        </div>
    
</section>



<section class="content">    
    
    <div class="box box-info">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <div align='right'><?= $this->Html->link(__('Adicionar Aviso'),['controller'=>'Notices','action'=>'add'])?></div>
                        <legend><?= __('Aviso(s) criado(s) por mim:') ?></legend>
                        <div class="box-body" align="center">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                        <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                        <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                        <th align="center" class="actions"><?= __('Ações:') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notices as $notice): ?>
                                    <tr>

                                        <?php 
                                        if (strlen($notice->subject) > 45) 
                                        {
                                        ?>        <td><?= h(substr($notice->subject,0,45)). ' [...]' ?></td>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>        <td><?= h($notice->subject) ?></td>     
                                        <?php
                                            }
                                        ?>                                        

                                        <?php 
                                        if (strlen($notice->text) > 65) 
                                        {
                                        ?>        <td><?= h(substr($notice->text,0,65)). ' [...]' ?></td>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>        <td><?= h($notice->text) ?></td>     
                                        <?php
                                            }
                                        ?>
                                        
                                        <td><?= h($notice->created) ?></td>
                                        <td align="center" class="actions">
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $notice->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $notice->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $notice->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?',$notice->id))); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
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

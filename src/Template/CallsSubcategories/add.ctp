<?php
$callsAreasFull[0] = 'Selecione...';
foreach ($callsAreas as $key => $value) {
    # code...
    $callsAreasFull[$key] = $value;
}

$callsCategoriesFull[0] = 'Selecione...';

?>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="callsSubcategories form large-9 medium-8 columns content">
                        <?= $this->Form->create($callsSubcategory) ?>
                        <fieldset>
                            <legend><?= __('Adiconar Sub categoria') ?></legend>
                            <?php
                                echo $this->Form->input('name',['label'=>'Nome:']);
                                echo $this->Form->input('description',['label'=>'Descrição:', 'type' => 'textarea']);
                                echo $this->Form->input('sla');
                                echo $this->Form->input('area_id', ['class' => 'form-control', 'label' => 'Área:','id'=>'area_id', 'options' => $callsAreasFull]);
                                echo $this->Form->input('category_id', ['label'=>'Categoria:','options'=>$callsCategoriesFull, 'id'=>'category_id']);
                            ?>
                        </fieldset>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $this->Html->link(__('Voltar'), ['controller' => 'callsSubcategories', 'action' => 'index'], array('class' => 'btn btn-primary')) ?>
                                </div>
                                <div align="right" class="col-md-6">
                                    <?= $this->Form->button(__('Salvar'), ['align'=>'center','class' => 'form-group']) ?>

                                </div>
                            </div>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>
</section>


<script type="text/javascript">

    var area_id = document.getElementById('area_id');
    var category_id = document.getElementById('category_id');

    var callsCategoriesForJs = JSON.parse('<?php echo json_encode($callsCategoriesForJs) ?>');

    document.getElementById('area_id').onchange = function () {

        html = '<select name="category_id" id="category_id">';
        html += '<option value="0">Selecione...</option>';
        for (var i = 0; i < callsCategoriesForJs.length; i++) {
            if (area_id.value == callsCategoriesForJs[i]['area_id']) {
                html += '<option value="' + callsCategoriesForJs[i]['id'] + '">' + callsCategoriesForJs[i]['name'] + '</option>';
            }
        }
        html += '</select>';

        category_id.innerHTML = html;
        category_id.focus();
    }



</script>


<?php
$this->Html->css([
'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
'AdminLTE./plugins/iCheck/all',
'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
'AdminLTE./plugins/select2/select2.min',
    ], ['block' => 'css']);

$this->Html->script([
'AdminLTE./plugins/select2/select2.full.min',
'AdminLTE./plugins/input-mask/jquery.inputmask',
'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
'AdminLTE./plugins/daterangepicker/daterangepicker',
'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
'AdminLTE./plugins/iCheck/icheck.min',
    ], ['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
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
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
<?php $this->end(); ?>

<?php ?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="callsAreas form large-9 medium-8 columns content">
                        <?php $x=0; ?>
                        <?= $this->Form->create($x,['url'=>['action'=>'paycheckPdf']]) ?>
                        <fieldset>
                            <legend><?= __('Informe o período:') ?></legend>

                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->input('date_ini', ['required', 'label'=>'Data inicial: ', 'type'=>'text', 'class'=>'form-control pull-right', 'id'=>'datemask']);
                                    echo $this->Form->input('date_fin', ['required', 'label'=>'Data final: ', 'type'=>'text', 'class'=>'form-control pull-right', 'id'=>'datemask2']);
                                ?>
                            </div>

                        </fieldset>

                        <div class="container-fluid">
                            <br>
                            <button class="btn btn-success" type="submit" formtarget="_blank"><?php echo __('Gerar Relatório'); ?></button>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php
    $this->Html->css([
        'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
        'AdminLTE./plugins/iCheck/all',
        'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
        'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
        'AdminLTE./plugins/select2/select2.min',
    ],
    ['block' => 'css']);

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
    ],
    ['block' => 'script']);
    ?>
    <?php $this->start('scriptBotton'); ?>
    <script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("mm/yyyy", {"placeholder": "mm/aaaa"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/yyyy", {"placeholder": "mm/aaaa"});
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

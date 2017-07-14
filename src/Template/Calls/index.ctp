<?php


$callsAreasFull[0] = 'Todas...';
foreach ($callsAreas as $key => $value) {
    $callsAreasFull[$key] = $value;
}

?>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">

                <legend><?= __('Central de chamados:') ?></legend>

                <div class="box-body">

                    <div class="col-md-3">
                        <?php $x = 0; ?>
                        <?= $this->Form->create($x, ['id'=>'form']) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('area_id', ['label' => 'Filtro por área:', 'id' => 'area_id', 'options' => $callsAreasFull]);
                            ?>
                        </fieldset>
                        <?= $this->Form->end() ?>
                        <br>
                    </div>

                    <div align='right'>
                        <h3 class="box-title">
                            <?php echo $this->Html->link(__('<i>Adicionar Chamado</i>'), array('controller' => 'Calls','action' => 'add'), array('class' => 'btn btn-success btn-xs', 'escape' => false)); ?>
                        </h3>
                    </div>

                    <table id="example1" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Assunto</th>
                                <th>Sub Categoria</th>
                                <th>Urgência</th>
                                <th>Status</th>
                                <th>Criado em</th>
                                <th class="actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($calls as $call): // debug($call)?>
                            <tr>
                                <td><?= $this->Number->format($call['CALLS']['id']) ?></td>
                                <td><?= h($call['CALLS']['SUBJECT']) ?></td>
                                <td><?= h($call['CALLS_SUBCATEGORIES']['name']) ?></td>
                                <td><?= h($call['CALLS_URGENCY']['title']) ?></td>
                                <td><?= h($call['CALLS_STATUS']['title']) ?></td>
                                <td><?= h(substr($call['CALLS']['created'],0,16)) ?></td>

                                <td align="center" class="actions">

                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $call['CALLS']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>

                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $call['CALLS']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $call['CALLS']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $call['CALLS']['id']))); ?>

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
</section>

<section class="content">
</section>

<script type="text/javascript">

    document.getElementById('area_id').onchange = function () {

        $("#form").submit();

    }

</script>



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
            "order": [[ 0, "desc" ]],
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
            }, "lengthMenu": [5, 10, 25]
        });

    });
</script>

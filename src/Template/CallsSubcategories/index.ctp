<?php ?>

<section class="content">
    <div class="box box-success">
        <div class="box-body">
            <div class="callsSubcategories index large-9 medium-8 columns content">
                <div align='right'>
                    <?php echo $this->Html->link(__('<i>Adicionar sub categoria</i>'), array('action' => 'add'), array('class' => 'btn btn-success btn-xs', 'escape' => false)); ?>
                </div>  
                <legend><?= __('Lista das sub categorias:') ?></legend>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Sla</th>
                            <th>Categoraia</th>
                            <th>Criado em</th>
                            <th>Modificado em</th>
                            <th class="actions"><?= __('Ações') ?></th>
                        </tr>
                    </thead>
                    <tbody>
            <?php foreach ($callsSubcategories as $callsSubcategory): ?>
                        <tr>
                            <td><?= $this->Number->format($callsSubcategory->id) ?></td>
                            <td><?= h($callsSubcategory->name) ?></td>
                            <td><?= h($callsSubcategory->description) ?></td>
                            <td><?= h($callsSubcategory->sla) ?></td>
                            <td><?= $this->Number->format($callsSubcategory->category_id) ?></td>
                            <td><?= h($callsSubcategory->created) ?></td>
                            <td><?= h($callsSubcategory->modified) ?></td>
                            <td class="actions">


                                                         <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $callsSubcategory->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Visualizar')); ?>

                                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsSubcategory->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Editar')); ?>

                                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsSubcategory->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle' => 'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsSubcategory->id))); ?>
                    

                            </td>
                        </tr>
            <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</section>

<section class="content">
</section>

<section class="content">
</section>




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
        $('#example2').DataTable({
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
            }, "lengthMenu": [8, 10, 15]
        });
    });
</script>

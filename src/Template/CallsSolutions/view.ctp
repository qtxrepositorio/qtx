<?php $x=0; ?>

<section class="content">

    <div class="row">

        <div class="col-md-4" align="center">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a solução:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>ID: </b><?= $this->Number->format($callsSolution->id) ?></p>
                    <p><b>Titulo: </b><?= h($callsSolution->title) ?></p>
                    <p><b>Descrição: </b><?= h($callsSolution->description) ?></p>
                    <p>
                        <b>Sub categoria:</b>
                        <?= $callsSolution->has('calls_subcategory') ? $this->Html->link($callsSolution->calls_subcategory->name, ['controller' => 'CallsSubcategories', 'action' => 'view', $callsSolution->calls_subcategory->id]) : '' ?>
                    </p>
                    <p><b>Criado em: </b><?= h($callsSolution->created) ?></p>
                    <p><b>Modificado em: </b><?= h($callsSolution->modified) ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsSolution->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsSolution->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsSolution->id))); ?>
                    
                </div>
            </div>
        </div>

        <div class="col-md-8" align="">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Anexos da solução: </h3>
                </div>
                <div class="box-body">
                <div align="right">
                    <a id="modal-01" href="#modal-container-01" role="submit" class="btn btn-success" data-toggle="modal">Adicionar arquivo</a>
                </div>
                <div class="box-body">   

                    <table id="example" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Arquivo</th>
                            <th>Descrição</th>
                            <th class="actions">Ações</th>
                        </thead>
                        <tbody>
                            <?php foreach ($callsSolution['archives'] as $key): ?>
                                <tr>
                                    <td><?= $this->Number->format($key['id']) ?></td>
                                    <td><?php echo $key['archive']; ?></td>
                                    <td><?php echo $key['text'] ?></td>
                                    <td align="center" class="actions">

                                    <?php

                                    $local = '../../webroot/files/calls_files/' . strval($key['call_id']) .'/' . $key['archive'];

                                    ?>
                                        
                                        <a data-toggle="tooltip" title="Download" class="glyphicon glyphicon-download-alt btn btn-primary btn-xs" href="<?php echo $local; ?>" download></a>
                                        
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller'=>'SolutionsFiles','action' => 'edit', $key['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller'=>'SolutionsFiles','action' => 'delete', $key['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $key['id']))); ?>

                                    </td>
                                </tr>                            
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
    
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="modal-container-01" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">                           
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                ×
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                Informe os dados solicitados:
                            </h4>
                        </div>
                        <div class="modal-body">                            

                            <?= $this->Form->create($x, ['type' => 'file','url' => ['controller' => 'SolutionsFiles', 'action' => 'add']]) ?> 
                                <fieldset>
                                    <?php
                                        echo $this->Form->input('text', ['label'=>'Descrição:']);
                                        echo $this->Form->file('archive');
                                        echo $this->Form->input('solution_id', ['type'=>'hidden','default' => $callsSolution->id]);
                                    ?>
                                </fieldset>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Fechar
                            </button> 
                            <?= $this->Form->button(__('Salvar')) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>                  
                </div>              
            </div>          
        </div>
    </div>
</div>





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

        $('#example').DataTable({
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
            }, "lengthMenu": [5, 15, 25]
        });

    });
</script>


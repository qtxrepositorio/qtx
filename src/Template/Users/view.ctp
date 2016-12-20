<?php ?>

<br>

<section class="content">

    <div class="row">
        <div align="center" class="col-md-3">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre o usuário:</b></h3>
                </div>
                <div class="box-body">
                    <p><b>Nome: </b><?= h($user->name) ?></p> 
                    <p><b>CPF: </b><?= h($user->cpf) ?></p>
                    <p><b>Usuário: </b><?= h($user->username) ?></p> 
                    <p><b>Senha: </b>*****</p> 
                    <p><b>Id: </b><?= $this->Number->format($user->id) ?></p> 
                    <p><b>Criado em: </b><?= h($user->created) ?></p> 
                    <p><b>Modificado em: </b><?=  h($user->modified)  ?></p> 
                    <p><b>Ativado: </b><?= $user->status ? __('Sim') : __('Não'); ?></p>            
                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $user->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $user->id),array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?',$user->id))); ?> 
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Grupos relacionados:</b></h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('Id:') ?></th>
                                <th><?= __('Nome:') ?></th>
                                <th><?= __('Descrição:') ?></th>
                                <th align="center" class="actions"><?= __('Ações:') ?></th>
                            </tr>
                        </thead>    
                    <tbody>
                        <?php foreach ($user->roles as $roles): ?>
                            <tr>
                                <td><?= h($roles->id) ?></td>
                                <td><?= h($roles->name) ?></td>
                                <td><?= h($roles->description) ?></td>
                                <td align="center" class="actions">
                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Roles','action' => 'view', $roles->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'Roles','action' => 'edit', $roles->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'Roles', 'action' => 'delete', $roles->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $roles->id))); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Notícias relacionadas:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Assunto:') ?></th>
                        <th><?= __('Conteúdo:') ?></th>
                        <th><?= __('Criado em:') ?></th>
                        <th class="actions"><?= __('Ações:') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user->notices as $notices): ?>
                    <tr>
                        <td><?= h($notices->subject) ?></td>
                        <td><?= h($notices->text) ?></td>
                        <td><?= h($notices->created) ?></td>
                        <td align="center" class="actions">
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Notices', 'action' => 'view', $notices->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'Notices', 'action' => 'edit', $notices->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'Notices', 'action' => 'delete', $notices->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $notices->id))); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

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
$(document).ready(function(){
    $('#example1').DataTable({      
        "language": {
            "lengthMenu":  "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior"
            }
        },"lengthMenu": [ 5, 10, 15 ]
    });

    $('#example2').DataTable({      
        "language": {
            "lengthMenu":  "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior"
            }
        },"lengthMenu": [ 5, 10, 15 ]
    });
});
</script>
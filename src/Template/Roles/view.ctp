<?php ?>

<br>

<div class="col-md-3" align="center">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Informações sobre o grupo:</b></h3>
        </div>
        <div class="box-body">
            <p><b>Id do grupo: </b><?= $this->Number->format($role->id) ?></p> 
            <p><b>Nome: </b><?= h($role->name) ?></p> 
            <p><b>Descrição: </b><?= h($role->description) ?></p>
            
            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $role->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $role->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $role->id))); ?>

        </div>
    </div>
</div>

<div class="col-md-9">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Usuários relacionados:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Id:</th>
                    <th>Name:</th>
                    <th>Usuário:</th>
                    <th>Ativo:</th>
                    <th>Criado em:</th>
                    <th>Modificado em:</th>
                    <th>Ações:</th>
                </tr>
                </thead>
                <tbody>

                    <?php if (!empty($role->users)): ?>
                    
                        <?php foreach ($role->users as $users): ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->name) ?></td>
                            <td><?= h($users->username) ?></td>
                            <td><?= $users->status ? __('Sim') : __('Não'); ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            
                            <td align="center" class="actions">
                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Users','action' => 'view', $users->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'Users','action' => 'edit', $users->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $users->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?',$users->id))); ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Notícias relacionadas:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Id:') ?></th>
                        <th><?= __('Assunto:') ?></th>
                        <th><?= __('Conteúdo:') ?></th>
                        <th><?= __('Criado em:') ?></th>
                        <th><?= __('Modificado em:') ?></th>
                        <th class="actions"><?= __('Ações:') ?></th>
                    </tr>
                    <?php foreach ($role->notices as $notices): ?>
                    <tr>
                        <td><?= h($notices->id) ?></td>
                        <td><?= h($notices->subject) ?></td>
                        <td><?= h($notices->text) ?></td>
                        <td><?= h($notices->created) ?></td>
                        <td><?= h($notices->modified) ?></td>
                        <td align="center" class="actions">
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Notices', 'action' => 'view', $notices->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'Notices', 'action' => 'edit', $notices->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $notices->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $notices->id))); ?>
                    </tr>
                    <?php endforeach; ?>
                <thead>
            </table>
        </div>
    </div>
</div>
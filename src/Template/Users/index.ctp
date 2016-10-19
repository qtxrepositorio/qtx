<?php ?>
<br>

<section class="content">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <div align='right'> <?= $this->Html->link(__('Adicionar Usuário'), ['controller'=>'Users','action'=>'add'])?> </div>
                <legend><?= __('Lista de usuários:') ?></legend>
                <div class="box-body" align="center">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id', ['label'=>'Id:']) ?></th>
                                <th><?= $this->Paginator->sort('name', ['label'=>'Nome:']) ?></th>
                                <th><?= $this->Paginator->sort('cpf', ['label'=>'CPF:']) ?></th>
                                <th><?= $this->Paginator->sort('username', ['label'=>'Usuário:']) ?></th>
                                <th><?= $this->Paginator->sort('status', ['label'=>'Ativo:']) ?></th>                                
                                <th><?= $this->Paginator->sort('created', ['label'=>'Criado em:']) ?></th>
                                <th><?= $this->Paginator->sort('modified', ['label'=>'Modificado em:']) ?></th>
                                <th class="actions"><?= __('Ações:') ?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><?= h($user->name) ?></td>
                                <td><?= h($user->cpf) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= $user->status ? __('Sim') : __('Não'); ?></td>
                                <td><?= h($user->created) ?></td>
                                <td><?= h($user->modified) ?></td>
                                <td align="center" class="actions">
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $user->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                        <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $user->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>
                                        <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $user->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?',$user->id))); ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
    </div>  
</section>


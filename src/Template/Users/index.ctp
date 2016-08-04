<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<div class="col-md-12">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <div align='right'> <?= $this->Html->link(__('Adicionar Usuário'), ['controller'=>'Users','action'=>'add'])?> </div>
                <legend><?= __('Lista dos usuários:') ?></legend>
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
                                <th class="actions"><?= __('Ações') ?></th>
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
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?> -
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?> -
                                    <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $user->id)]) ?>
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
 </div>  



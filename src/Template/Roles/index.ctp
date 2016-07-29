<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<div class="col-md-12">
    <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                <div align='right'> <?= $this->Html->link(__('Adicionar Grupo'), ['controller'=>'Roles','action'=>'add'])?> </div>
                    <legend><?= __('Lista dos Grupos de usuários:') ?></legend>
                    <div class="box-body" align="center">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id',['label' => 'Id:']) ?></th>
                                    <th><?= $this->Paginator->sort('name',['label' => 'Nome:']) ?></th>
                                    <th><?= $this->Paginator->sort('description',['label' => 'Descrição:']) ?></th>
                                    <th class="actions"><?= __('Ações') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($roles as $role): ?>
                                <tr>               
                                    <td><?= $this->Number->format($role->id) ?></td>
                                    <td><?= h($role->name) ?></td>
                                    <td><?= h($role->description) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $role->id]) ?> -
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $role->id]) ?> -
                                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $role->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $role->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
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



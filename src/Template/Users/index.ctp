<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>


<div class="col-md-9">
    <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <legend><?= __('Lista dos usuários:') ?></legend>
                    <div class="box-body">
                        <div class="users index large-9 medium-8 columns content">
                            <table id="example2" class="table table-bordered table-hover">  
                                <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('id',['label' => 'Id:']) ?></th>
                                        <th><?= $this->Paginator->sort('username',['label' => 'Usuário:']) ?></th>
                                        <th><?= $this->Paginator->sort('password',['label' => 'Senha:']) ?></th>
                                        <th><?= $this->Paginator->sort('created',['label' => 'Criado em:']) ?></th>
                                        <th><?= $this->Paginator->sort('modified',['label' => 'Modificado em:']) ?></th>
                                        <th class="actions"><?= __('Ações') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $this->Number->format($user->id) ?></td>
                                        <td><?= h($user->username) ?></td>
                                        <td>*****</td>
                                        <td><?= h($user->created) ?></td>
                                        <td><?= h($user->modified) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="paginator">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                </ul>
                                <p><?= $this->Paginator->counter() ?></p>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
     </div>
 </div>   

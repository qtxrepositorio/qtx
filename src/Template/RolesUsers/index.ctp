<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Roles User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rolesUsers index large-9 medium-8 columns content">
    <h3><?= __('Roles Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('role_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rolesUsers as $rolesUser): ?>
            <tr>
                <td><?= $rolesUser->has('role') ? $this->Html->link($rolesUser->role->id, ['controller' => 'Roles', 'action' => 'view', $rolesUser->role->id]) : '' ?></td>
                <td><?= $rolesUser->has('user') ? $this->Html->link($rolesUser->user->id, ['controller' => 'Users', 'action' => 'view', $rolesUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rolesUser->role_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rolesUser->role_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rolesUser->role_id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $rolesUser->role_id)]) ?>
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

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notices Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="noticesRoles index large-9 medium-8 columns content">
    <h3><?= __('Notices Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('notice_id') ?></th>
                <th><?= $this->Paginator->sort('role_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticesRoles as $noticesRole): ?>
            <tr>
                <td><?= $noticesRole->has('notice') ? $this->Html->link($noticesRole->notice->id, ['controller' => 'Notices', 'action' => 'view', $noticesRole->notice->id]) : '' ?></td>
                <td><?= $noticesRole->has('role') ? $this->Html->link($noticesRole->role->name, ['controller' => 'Roles', 'action' => 'view', $noticesRole->role->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $noticesRole->notice_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $noticesRole->notice_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $noticesRole->notice_id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $noticesRole->notice_id)]) ?>
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

<?php ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notices User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="noticesUsers index large-9 medium-8 columns content">
    <h3><?= __('Notices Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('notice_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($noticesUsers as $noticesUser): ?>
            <tr>
                <td><?= $noticesUser->has('notice') ? $this->Html->link($noticesUser->notice->id, ['controller' => 'Notices', 'action' => 'view', $noticesUser->notice->id]) : '' ?></td>
                <td><?= $noticesUser->has('user') ? $this->Html->link($noticesUser->user->name, ['controller' => 'Users', 'action' => 'view', $noticesUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $noticesUser->notice_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $noticesUser->notice_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $noticesUser->notice_id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $noticesUser->notice_id)]) ?>
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

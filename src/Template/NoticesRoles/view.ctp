<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notices Role'), ['action' => 'edit', $noticesRole->notice_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notices Role'), ['action' => 'delete', $noticesRole->notice_id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $noticesRole->notice_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notices Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notices Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="noticesRoles view large-9 medium-8 columns content">
    <h3><?= h($noticesRole->notice_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Notice') ?></th>
            <td><?= $noticesRole->has('notice') ? $this->Html->link($noticesRole->notice->id, ['controller' => 'Notices', 'action' => 'view', $noticesRole->notice->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $noticesRole->has('role') ? $this->Html->link($noticesRole->role->name, ['controller' => 'Roles', 'action' => 'view', $noticesRole->role->id]) : '' ?></td>
        </tr>
    </table>
</div>

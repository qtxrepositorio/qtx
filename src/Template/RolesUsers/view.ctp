<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Roles User'), ['action' => 'edit', $rolesUser->role_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Roles User'), ['action' => 'delete', $rolesUser->role_id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $rolesUser->role_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Roles User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rolesUsers view large-9 medium-8 columns content">
    <h3><?= h($rolesUser->role_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= $rolesUser->has('role') ? $this->Html->link($rolesUser->role->name, ['controller' => 'Roles', 'action' => 'view', $rolesUser->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $rolesUser->has('user') ? $this->Html->link($rolesUser->user->name, ['controller' => 'Users', 'action' => 'view', $rolesUser->user->id]) : '' ?></td>
        </tr>
    </table>
</div>

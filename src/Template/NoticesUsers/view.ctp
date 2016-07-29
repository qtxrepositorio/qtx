<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notices User'), ['action' => 'edit', $noticesUser->notice_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notices User'), ['action' => 'delete', $noticesUser->notice_id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $noticesUser->notice_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notices Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notices User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="noticesUsers view large-9 medium-8 columns content">
    <h3><?= h($noticesUser->notice_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Notice') ?></th>
            <td><?= $noticesUser->has('notice') ? $this->Html->link($noticesUser->notice->id, ['controller' => 'Notices', 'action' => 'view', $noticesUser->notice->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $noticesUser->has('user') ? $this->Html->link($noticesUser->user->name, ['controller' => 'Users', 'action' => 'view', $noticesUser->user->id]) : '' ?></td>
        </tr>
    </table>
</div>

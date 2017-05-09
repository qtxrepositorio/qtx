<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls File'), ['action' => 'edit', $callsFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls File'), ['action' => 'delete', $callsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Files'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls'), ['controller' => 'Calls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Call'), ['controller' => 'Calls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsFiles view large-9 medium-8 columns content">
    <h3><?= h($callsFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($callsFile->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Files') ?></th>
            <td><?= h($callsFile->files) ?></td>
        </tr>
        <tr>
            <th><?= __('Call') ?></th>
            <td><?= $callsFile->has('call') ? $this->Html->link($callsFile->call->id, ['controller' => 'Calls', 'action' => 'view', $callsFile->call->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsFile->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsFile->created) ?></td>
        </tr>
    </table>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Response'), ['action' => 'edit', $callsResponse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Response'), ['action' => 'delete', $callsResponse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsResponse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Response'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls'), ['controller' => 'Calls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Call'), ['controller' => 'Calls', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsResponses view large-9 medium-8 columns content">
    <h3><?= h($callsResponse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($callsResponse->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Call') ?></th>
            <td><?= $callsResponse->has('call') ? $this->Html->link($callsResponse->call->id, ['controller' => 'Calls', 'action' => 'view', $callsResponse->call->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsResponse->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($callsResponse->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsResponse->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Visualized') ?></th>
            <td><?= $callsResponse->visualized ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

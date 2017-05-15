<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Urgency'), ['action' => 'edit', $callsUrgency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Urgency'), ['action' => 'delete', $callsUrgency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsUrgency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Urgency'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Urgency'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsUrgency view large-9 medium-8 columns content">
    <h3><?= h($callsUrgency->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($callsUrgency->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($callsUrgency->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsUrgency->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsUrgency->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($callsUrgency->modified) ?></td>
        </tr>
    </table>
</div>

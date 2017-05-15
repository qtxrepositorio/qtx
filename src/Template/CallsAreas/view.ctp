<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Area'), ['action' => 'edit', $callsArea->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Area'), ['action' => 'delete', $callsArea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsArea->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Areas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Area'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsAreas view large-9 medium-8 columns content">
    <h3><?= h($callsArea->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($callsArea->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($callsArea->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsArea->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsArea->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($callsArea->modified) ?></td>
        </tr>
    </table>
</div>

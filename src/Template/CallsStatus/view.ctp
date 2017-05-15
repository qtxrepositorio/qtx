<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Status'), ['action' => 'edit', $callsStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Status'), ['action' => 'delete', $callsStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Status'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Status'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsStatus view large-9 medium-8 columns content">
    <h3><?= h($callsStatus->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($callsStatus->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($callsStatus->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsStatus->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsStatus->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($callsStatus->modified) ?></td>
        </tr>
    </table>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit References Document'), ['action' => 'edit', $referencesDocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete References Document'), ['action' => 'delete', $referencesDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $referencesDocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List References Document'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New References Document'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="referencesDocument view large-9 medium-8 columns content">
    <h3><?= h($referencesDocument->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($referencesDocument->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($referencesDocument->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($referencesDocument->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($referencesDocument->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $referencesDocument->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

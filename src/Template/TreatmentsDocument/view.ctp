<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatments Document'), ['action' => 'edit', $treatmentsDocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatments Document'), ['action' => 'delete', $treatmentsDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentsDocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatments Document'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatments Document'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatmentsDocument view large-9 medium-8 columns content">
    <h3><?= h($treatmentsDocument->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($treatmentsDocument->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatmentsDocument->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($treatmentsDocument->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($treatmentsDocument->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $treatmentsDocument->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

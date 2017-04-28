<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Category'), ['action' => 'edit', $callsCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Category'), ['action' => 'delete', $callsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsCategories view large-9 medium-8 columns content">
    <h3><?= h($callsCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($callsCategory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Time') ?></th>
            <td><?= h($callsCategory->time) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsCategory->created) ?></td>
        </tr>
    </table>
</div>

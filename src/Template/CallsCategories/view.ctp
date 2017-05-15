<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Category'), ['action' => 'edit', $callsCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Category'), ['action' => 'delete', $callsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Areas'), ['controller' => 'CallsAreas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Area'), ['controller' => 'CallsAreas', 'action' => 'add']) ?> </li>
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
            <th><?= __('Description') ?></th>
            <td><?= h($callsCategory->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Area') ?></th>
            <td><?= $callsCategory->has('calls_area') ? $this->Html->link($callsCategory->calls_area->name, ['controller' => 'CallsAreas', 'action' => 'view', $callsCategory->calls_area->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsCategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($callsCategory->modified) ?></td>
        </tr>
    </table>
</div>

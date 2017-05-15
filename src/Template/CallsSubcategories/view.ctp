<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Subcategory'), ['action' => 'edit', $callsSubcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Subcategory'), ['action' => 'delete', $callsSubcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsSubcategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['controller' => 'CallsCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Category'), ['controller' => 'CallsCategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsSubcategories view large-9 medium-8 columns content">
    <h3><?= h($callsSubcategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($callsSubcategory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($callsSubcategory->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Category') ?></th>
            <td><?= $callsSubcategory->has('calls_category') ? $this->Html->link($callsSubcategory->calls_category->name, ['controller' => 'CallsCategories', 'action' => 'view', $callsSubcategory->calls_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsSubcategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sla') ?></th>
            <td><?= h($callsSubcategory->sla) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsSubcategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($callsSubcategory->modified) ?></td>
        </tr>
    </table>
</div>

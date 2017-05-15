<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calls Solution'), ['action' => 'edit', $callsSolution->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calls Solution'), ['action' => 'delete', $callsSolution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsSolution->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['controller' => 'CallsSubcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['controller' => 'CallsSubcategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="callsSolutions view large-9 medium-8 columns content">
    <h3><?= h($callsSolution->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($callsSolution->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($callsSolution->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Subcategory') ?></th>
            <td><?= $callsSolution->has('calls_subcategory') ? $this->Html->link($callsSolution->calls_subcategory->name, ['controller' => 'CallsSubcategories', 'action' => 'view', $callsSolution->calls_subcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($callsSolution->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($callsSolution->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($callsSolution->modified) ?></td>
        </tr>
    </table>
</div>

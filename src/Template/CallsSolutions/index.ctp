<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['controller' => 'CallsSubcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['controller' => 'CallsSubcategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsSolutions index large-9 medium-8 columns content">
    <h3><?= __('Calls Solutions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('subcategorie_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callsSolutions as $callsSolution): ?>
            <tr>
                <td><?= $this->Number->format($callsSolution->id) ?></td>
                <td><?= h($callsSolution->title) ?></td>
                <td><?= h($callsSolution->description) ?></td>
                <td><?= $callsSolution->has('calls_subcategory') ? $this->Html->link($callsSolution->calls_subcategory->name, ['controller' => 'CallsSubcategories', 'action' => 'view', $callsSolution->calls_subcategory->id]) : '' ?></td>
                <td><?= h($callsSolution->created) ?></td>
                <td><?= h($callsSolution->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsSolution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsSolution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsSolution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsSolution->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

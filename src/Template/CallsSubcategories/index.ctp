<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['controller' => 'CallsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Category'), ['controller' => 'CallsCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsSubcategories index large-9 medium-8 columns content">
    <h3><?= __('Calls Subcategories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('sla') ?></th>
                <th><?= $this->Paginator->sort('categorie_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callsSubcategories as $callsSubcategory): ?>
            <tr>
                <td><?= $this->Number->format($callsSubcategory->id) ?></td>
                <td><?= h($callsSubcategory->name) ?></td>
                <td><?= h($callsSubcategory->description) ?></td>
                <td><?= h($callsSubcategory->sla) ?></td>
                <td><?= $callsSubcategory->has('calls_category') ? $this->Html->link($callsSubcategory->calls_category->name, ['controller' => 'CallsCategories', 'action' => 'view', $callsSubcategory->calls_category->id]) : '' ?></td>
                <td><?= h($callsSubcategory->created) ?></td>
                <td><?= h($callsSubcategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsSubcategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsSubcategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsSubcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsSubcategory->id)]) ?>
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

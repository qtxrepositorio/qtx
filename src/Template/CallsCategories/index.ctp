<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Areas'), ['controller' => 'CallsAreas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Area'), ['controller' => 'CallsAreas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsCategories index large-9 medium-8 columns content">
    <h3><?= __('Calls Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('area_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callsCategories as $callsCategory): ?>
            <tr>
                <td><?= $this->Number->format($callsCategory->id) ?></td>
                <td><?= h($callsCategory->name) ?></td>
                <td><?= h($callsCategory->description) ?></td>
                <td><?= $callsCategory->has('calls_area') ? $this->Html->link($callsCategory->calls_area->name, ['controller' => 'CallsAreas', 'action' => 'view', $callsCategory->calls_area->id]) : '' ?></td>
                <td><?= h($callsCategory->created) ?></td>
                <td><?= h($callsCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsCategory->id)]) ?>
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

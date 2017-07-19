<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Locals Document'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="localsDocument index large-9 medium-8 columns content">
    <h3><?= __('Locals Document') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($localsDocument as $localsDocument): ?>
            <tr>
                <td><?= $this->Number->format($localsDocument->id) ?></td>
                <td><?= h($localsDocument->name) ?></td>
                <td><?= h($localsDocument->description) ?></td>
                <td><?= h($localsDocument->status) ?></td>
                <td><?= h($localsDocument->created) ?></td>
                <td><?= h($localsDocument->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $localsDocument->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $localsDocument->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $localsDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localsDocument->id)]) ?>
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

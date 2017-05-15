<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls Status'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsStatus index large-9 medium-8 columns content">
    <h3><?= __('Calls Status') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callsStatus as $callsStatus): ?>
            <tr>
                <td><?= $this->Number->format($callsStatus->id) ?></td>
                <td><?= h($callsStatus->title) ?></td>
                <td><?= h($callsStatus->description) ?></td>
                <td><?= h($callsStatus->created) ?></td>
                <td><?= h($callsStatus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsStatus->id)]) ?>
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

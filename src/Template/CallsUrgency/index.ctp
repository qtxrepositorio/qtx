<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls Urgency'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsUrgency index large-9 medium-8 columns content">
    <h3><?= __('Calls Urgency') ?></h3>
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
            <?php foreach ($callsUrgency as $callsUrgency): ?>
            <tr>
                <td><?= $this->Number->format($callsUrgency->id) ?></td>
                <td><?= h($callsUrgency->title) ?></td>
                <td><?= h($callsUrgency->description) ?></td>
                <td><?= h($callsUrgency->created) ?></td>
                <td><?= h($callsUrgency->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsUrgency->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsUrgency->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsUrgency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsUrgency->id)]) ?>
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

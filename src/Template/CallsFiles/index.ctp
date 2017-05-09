<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls'), ['controller' => 'Calls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Call'), ['controller' => 'Calls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsFiles index large-9 medium-8 columns content">
    <h3><?= __('Calls Files') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('text') ?></th>
                <th><?= $this->Paginator->sort('files') ?></th>
                <th><?= $this->Paginator->sort('call_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callsFiles as $callsFile): ?>
            <tr>
                <td><?= $this->Number->format($callsFile->id) ?></td>
                <td><?= h($callsFile->text) ?></td>
                <td><?= h($callsFile->files) ?></td>
                <td><?= $callsFile->has('call') ? $this->Html->link($callsFile->call->id, ['controller' => 'Calls', 'action' => 'view', $callsFile->call->id]) : '' ?></td>
                <td><?= h($callsFile->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsFile->id)]) ?>
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

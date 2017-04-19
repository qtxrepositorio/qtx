<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calls Response'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls'), ['controller' => 'Calls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Call'), ['controller' => 'Calls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsResponses index large-9 medium-8 columns content">
    <h3><?= __('Calls Responses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('text') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('call_id') ?></th>
                <th><?= $this->Paginator->sort('visualized') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($callsResponses as $callsResponse): ?>
            <tr>
                <td><?= $this->Number->format($callsResponse->id) ?></td>
                <td><?= h($callsResponse->text) ?></td>
                <td><?= $this->Number->format($callsResponse->created_by) ?></td>
                <td><?= $callsResponse->has('call') ? $this->Html->link($callsResponse->call->id, ['controller' => 'Calls', 'action' => 'view', $callsResponse->call->id]) : '' ?></td>
                <td><?= h($callsResponse->visualized) ?></td>
                <td><?= h($callsResponse->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $callsResponse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $callsResponse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $callsResponse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsResponse->id)]) ?>
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

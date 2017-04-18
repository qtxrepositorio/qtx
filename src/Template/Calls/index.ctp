<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Call'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['controller' => 'CallsResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Response'), ['controller' => 'CallsResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calls index large-9 medium-8 columns content">
    <h3><?= __('Calls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('text') ?></th>
                <th><?= $this->Paginator->sort('urgency') ?></th>
                <th><?= $this->Paginator->sort('category') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('attributed_to') ?></th>
                <th><?= $this->Paginator->sort('visualized') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calls as $call): ?>
            <tr>
                <td><?= $this->Number->format($call->id) ?></td>
                <td><?= h($call->subject) ?></td>
                <td><?= h($call->text) ?></td>
                <td><?= h($call->urgency) ?></td>
                <td><?= h($call->category) ?></td>
                <td><?= h($call->status) ?></td>
                <td><?= $this->Number->format($call->created_by) ?></td>
                <td><?= $this->Number->format($call->attributed_to) ?></td>
                <td><?= h($call->visualized) ?></td>
                <td><?= h($call->created) ?></td>
                <td><?= h($call->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $call->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $call->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $call->id], ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]) ?>
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

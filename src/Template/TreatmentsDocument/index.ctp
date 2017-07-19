<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Treatments Document'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatmentsDocument index large-9 medium-8 columns content">
    <h3><?= __('Treatments Document') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($treatmentsDocument as $treatmentsDocument): ?>
            <tr>
                <td><?= $this->Number->format($treatmentsDocument->id) ?></td>
                <td><?= h($treatmentsDocument->description) ?></td>
                <td><?= h($treatmentsDocument->status) ?></td>
                <td><?= h($treatmentsDocument->created) ?></td>
                <td><?= h($treatmentsDocument->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $treatmentsDocument->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $treatmentsDocument->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $treatmentsDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatmentsDocument->id)]) ?>
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

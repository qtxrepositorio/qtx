<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New External Document'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="externalDocuments index large-9 medium-8 columns content">
    <h3><?= __('External Documents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('number_document') ?></th>
                <th><?= $this->Paginator->sort('local') ?></th>
                <th><?= $this->Paginator->sort('client_id') ?></th>
                <th><?= $this->Paginator->sort('client_name') ?></th>
                <th><?= $this->Paginator->sort('client_contact') ?></th>
                <th><?= $this->Paginator->sort('treatment_id') ?></th>
                <th><?= $this->Paginator->sort('reference') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('user_function') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($externalDocuments as $externalDocument): ?>
            <tr>
                <td><?= $this->Number->format($externalDocument->id) ?></td>
                <td><?= h($externalDocument->number_document) ?></td>
                <td><?= h($externalDocument->local) ?></td>
                <td><?= $this->Number->format($externalDocument->client_id) ?></td>
                <td><?= h($externalDocument->client_name) ?></td>
                <td><?= h($externalDocument->client_contact) ?></td>
                <td><?= $externalDocument->has('treatment') ? $this->Html->link($externalDocument->treatment->id, ['controller' => 'Treatments', 'action' => 'view', $externalDocument->treatment->id]) : '' ?></td>
                <td><?= h($externalDocument->reference) ?></td>
                <td><?= h($externalDocument->subject) ?></td>
                <td><?= $externalDocument->has('user') ? $this->Html->link($externalDocument->user->name, ['controller' => 'Users', 'action' => 'view', $externalDocument->user->id]) : '' ?></td>
                <td><?= h($externalDocument->user_function) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $externalDocument->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $externalDocument->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $externalDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $externalDocument->id)]) ?>
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

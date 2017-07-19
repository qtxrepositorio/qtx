<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit External Document'), ['action' => 'edit', $externalDocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete External Document'), ['action' => 'delete', $externalDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $externalDocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List External Documents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New External Document'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['controller' => 'Treatments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['controller' => 'Treatments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="externalDocuments view large-9 medium-8 columns content">
    <h3><?= h($externalDocument->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Number Document') ?></th>
            <td><?= h($externalDocument->number_document) ?></td>
        </tr>
        <tr>
            <th><?= __('Local') ?></th>
            <td><?= h($externalDocument->local) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Name') ?></th>
            <td><?= h($externalDocument->client_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Contact') ?></th>
            <td><?= h($externalDocument->client_contact) ?></td>
        </tr>
        <tr>
            <th><?= __('Treatment') ?></th>
            <td><?= $externalDocument->has('treatment') ? $this->Html->link($externalDocument->treatment->id, ['controller' => 'Treatments', 'action' => 'view', $externalDocument->treatment->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Reference') ?></th>
            <td><?= h($externalDocument->reference) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($externalDocument->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $externalDocument->has('user') ? $this->Html->link($externalDocument->user->name, ['controller' => 'Users', 'action' => 'view', $externalDocument->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User Function') ?></th>
            <td><?= h($externalDocument->user_function) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($externalDocument->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Id') ?></th>
            <td><?= $this->Number->format($externalDocument->client_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($externalDocument->created) ?></td>
        </tr>
    </table>
</div>

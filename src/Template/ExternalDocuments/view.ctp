<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit External Document'), ['action' => 'edit', $externalDocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete External Document'), ['action' => 'delete', $externalDocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $externalDocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List External Documents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New External Document'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Treatments Document'), ['controller' => 'TreatmentsDocument', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatments Document'), ['controller' => 'TreatmentsDocument', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List References Document'), ['controller' => 'ReferencesDocument', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New References Document'), ['controller' => 'ReferencesDocument', 'action' => 'add']) ?> </li>
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
            <th><?= __('Client Name') ?></th>
            <td><?= h($externalDocument->client_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Contact') ?></th>
            <td><?= h($externalDocument->client_contact) ?></td>
        </tr>
        <tr>
            <th><?= __('Treatments Document') ?></th>
            <td><?= $externalDocument->has('treatments_document') ? $this->Html->link($externalDocument->treatments_document->id, ['controller' => 'TreatmentsDocument', 'action' => 'view', $externalDocument->treatments_document->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('References Document') ?></th>
            <td><?= $externalDocument->has('references_document') ? $this->Html->link($externalDocument->references_document->id, ['controller' => 'ReferencesDocument', 'action' => 'view', $externalDocument->references_document->id]) : '' ?></td>
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
            <th><?= __('Local Id') ?></th>
            <td><?= $this->Number->format($externalDocument->local_id) ?></td>
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

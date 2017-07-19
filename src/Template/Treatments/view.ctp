<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Treatment'), ['action' => 'edit', $treatment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Treatment'), ['action' => 'delete', $treatment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $treatment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Treatment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List External Documents'), ['controller' => 'ExternalDocuments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New External Document'), ['controller' => 'ExternalDocuments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="treatments view large-9 medium-8 columns content">
    <h3><?= h($treatment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($treatment->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($treatment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $treatment->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related External Documents') ?></h4>
        <?php if (!empty($treatment->external_documents)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Number Document') ?></th>
                <th><?= __('Local') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Client Name') ?></th>
                <th><?= __('Client Contact') ?></th>
                <th><?= __('Treatment Id') ?></th>
                <th><?= __('Reference') ?></th>
                <th><?= __('Subject') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('User Function') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($treatment->external_documents as $externalDocuments): ?>
            <tr>
                <td><?= h($externalDocuments->id) ?></td>
                <td><?= h($externalDocuments->number_document) ?></td>
                <td><?= h($externalDocuments->local) ?></td>
                <td><?= h($externalDocuments->client_id) ?></td>
                <td><?= h($externalDocuments->client_name) ?></td>
                <td><?= h($externalDocuments->client_contact) ?></td>
                <td><?= h($externalDocuments->treatment_id) ?></td>
                <td><?= h($externalDocuments->reference) ?></td>
                <td><?= h($externalDocuments->subject) ?></td>
                <td><?= h($externalDocuments->user_id) ?></td>
                <td><?= h($externalDocuments->user_function) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ExternalDocuments', 'action' => 'view', $externalDocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ExternalDocuments', 'action' => 'edit', $externalDocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ExternalDocuments', 'action' => 'delete', $externalDocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $externalDocuments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Call'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Areas'), ['controller' => 'CallsAreas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Area'), ['controller' => 'CallsAreas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['controller' => 'CallsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Category'), ['controller' => 'CallsCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['controller' => 'CallsSubcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['controller' => 'CallsSubcategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Status'), ['controller' => 'CallsStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Status'), ['controller' => 'CallsStatus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Urgency'), ['controller' => 'CallsUrgency', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Urgency'), ['controller' => 'CallsUrgency', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['controller' => 'CallsSolutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['controller' => 'CallsSolutions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Files'), ['controller' => 'CallsFiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls File'), ['controller' => 'CallsFiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['controller' => 'CallsResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Response'), ['controller' => 'CallsResponses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
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
                <th><?= $this->Paginator->sort('area_id') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('subcategory_id') ?></th>
                <th><?= $this->Paginator->sort('status_id') ?></th>
                <th><?= $this->Paginator->sort('urgency_id') ?></th>
                <th><?= $this->Paginator->sort('solution_id') ?></th>
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
                <td><?= $call->has('calls_area') ? $this->Html->link($call->calls_area->name, ['controller' => 'CallsAreas', 'action' => 'view', $call->calls_area->id]) : '' ?></td>
                <td><?= $call->has('calls_category') ? $this->Html->link($call->calls_category->name, ['controller' => 'CallsCategories', 'action' => 'view', $call->calls_category->id]) : '' ?></td>
                <td><?= $call->has('calls_subcategory') ? $this->Html->link($call->calls_subcategory->name, ['controller' => 'CallsSubcategories', 'action' => 'view', $call->calls_subcategory->id]) : '' ?></td>
                <td><?= $call->has('calls_status') ? $this->Html->link($call->calls_status->title, ['controller' => 'CallsStatus', 'action' => 'view', $call->calls_status->id]) : '' ?></td>
                <td><?= $call->has('calls_urgency') ? $this->Html->link($call->calls_urgency->title, ['controller' => 'CallsUrgency', 'action' => 'view', $call->calls_urgency->id]) : '' ?></td>
                <td><?= $call->has('calls_solution') ? $this->Html->link($call->calls_solution->title, ['controller' => 'CallsSolutions', 'action' => 'view', $call->calls_solution->id]) : '' ?></td>
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

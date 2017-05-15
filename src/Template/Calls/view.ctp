<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Call'), ['action' => 'edit', $call->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Call'), ['action' => 'delete', $call->id], ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Call'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Areas'), ['controller' => 'CallsAreas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Area'), ['controller' => 'CallsAreas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['controller' => 'CallsCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Category'), ['controller' => 'CallsCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['controller' => 'CallsSubcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['controller' => 'CallsSubcategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Status'), ['controller' => 'CallsStatus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Status'), ['controller' => 'CallsStatus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Urgency'), ['controller' => 'CallsUrgency', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Urgency'), ['controller' => 'CallsUrgency', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['controller' => 'CallsSolutions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['controller' => 'CallsSolutions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Files'), ['controller' => 'CallsFiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls File'), ['controller' => 'CallsFiles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['controller' => 'CallsResponses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Response'), ['controller' => 'CallsResponses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calls view large-9 medium-8 columns content">
    <h3><?= h($call->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($call->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($call->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Area') ?></th>
            <td><?= $call->has('calls_area') ? $this->Html->link($call->calls_area->name, ['controller' => 'CallsAreas', 'action' => 'view', $call->calls_area->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Category') ?></th>
            <td><?= $call->has('calls_category') ? $this->Html->link($call->calls_category->name, ['controller' => 'CallsCategories', 'action' => 'view', $call->calls_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Subcategory') ?></th>
            <td><?= $call->has('calls_subcategory') ? $this->Html->link($call->calls_subcategory->name, ['controller' => 'CallsSubcategories', 'action' => 'view', $call->calls_subcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Status') ?></th>
            <td><?= $call->has('calls_status') ? $this->Html->link($call->calls_status->title, ['controller' => 'CallsStatus', 'action' => 'view', $call->calls_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Urgency') ?></th>
            <td><?= $call->has('calls_urgency') ? $this->Html->link($call->calls_urgency->title, ['controller' => 'CallsUrgency', 'action' => 'view', $call->calls_urgency->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Calls Solution') ?></th>
            <td><?= $call->has('calls_solution') ? $this->Html->link($call->calls_solution->title, ['controller' => 'CallsSolutions', 'action' => 'view', $call->calls_solution->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($call->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($call->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Attributed To') ?></th>
            <td><?= $this->Number->format($call->attributed_to) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($call->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($call->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Visualized') ?></th>
            <td><?= $call->visualized ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Calls Files') ?></h4>
        <?php if (!empty($call->calls_files)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Text') ?></th>
                <th><?= __('Archive') ?></th>
                <th><?= __('Call Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($call->calls_files as $callsFiles): ?>
            <tr>
                <td><?= h($callsFiles->id) ?></td>
                <td><?= h($callsFiles->text) ?></td>
                <td><?= h($callsFiles->archive) ?></td>
                <td><?= h($callsFiles->call_id) ?></td>
                <td><?= h($callsFiles->created) ?></td>
                <td><?= h($callsFiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CallsFiles', 'action' => 'view', $callsFiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CallsFiles', 'action' => 'edit', $callsFiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CallsFiles', 'action' => 'delete', $callsFiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsFiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Calls Responses') ?></h4>
        <?php if (!empty($call->calls_responses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Text') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Call Id') ?></th>
                <th><?= __('Visualized') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($call->calls_responses as $callsResponses): ?>
            <tr>
                <td><?= h($callsResponses->id) ?></td>
                <td><?= h($callsResponses->text) ?></td>
                <td><?= h($callsResponses->created_by) ?></td>
                <td><?= h($callsResponses->call_id) ?></td>
                <td><?= h($callsResponses->visualized) ?></td>
                <td><?= h($callsResponses->created) ?></td>
                <td><?= h($callsResponses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CallsResponses', 'action' => 'view', $callsResponses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CallsResponses', 'action' => 'edit', $callsResponses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CallsResponses', 'action' => 'delete', $callsResponses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $callsResponses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($call->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Cpf') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Email') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($call->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->cpf) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->status) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

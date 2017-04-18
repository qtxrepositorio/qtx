<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Call'), ['action' => 'edit', $call->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Call'), ['action' => 'delete', $call->id], ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Call'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['controller' => 'CallsResponses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calls Response'), ['controller' => 'CallsResponses', 'action' => 'add']) ?> </li>
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
            <th><?= __('Urgency') ?></th>
            <td><?= h($call->urgency) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= h($call->category) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($call->status) ?></td>
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
</div>

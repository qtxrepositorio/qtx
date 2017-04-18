<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $call->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $call->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calls'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['controller' => 'CallsResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Response'), ['controller' => 'CallsResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calls form large-9 medium-8 columns content">
    <?= $this->Form->create($call) ?>
    <fieldset>
        <legend><?= __('Edit Call') ?></legend>
        <?php
            echo $this->Form->input('subject');
            echo $this->Form->input('text');
            echo $this->Form->input('urgency');
            echo $this->Form->input('category');
            echo $this->Form->input('status');
            echo $this->Form->input('created_by');
            echo $this->Form->input('attributed_to');
            echo $this->Form->input('visualized');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

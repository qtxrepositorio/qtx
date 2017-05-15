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
    </ul>
</nav>
<div class="calls form large-9 medium-8 columns content">
    <?= $this->Form->create($call) ?>
    <fieldset>
        <legend><?= __('Edit Call') ?></legend>
        <?php
            echo $this->Form->input('subject');
            echo $this->Form->input('text');
            echo $this->Form->input('area_id', ['options' => $callsAreas]);
            echo $this->Form->input('category_id', ['options' => $callsCategories]);
            echo $this->Form->input('subcategory_id', ['options' => $callsSubcategories]);
            echo $this->Form->input('status_id', ['options' => $callsStatus]);
            echo $this->Form->input('urgency_id', ['options' => $callsUrgency]);
            echo $this->Form->input('solution_id', ['options' => $callsSolutions]);
            echo $this->Form->input('created_by');
            echo $this->Form->input('attributed_to');
            echo $this->Form->input('visualized');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $callsResponse->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $callsResponse->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calls Responses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calls'), ['controller' => 'Calls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Call'), ['controller' => 'Calls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsResponses form large-9 medium-8 columns content">
    <?= $this->Form->create($callsResponse) ?>
    <fieldset>
        <legend><?= __('Edit Calls Response') ?></legend>
        <?php
            echo $this->Form->input('text');
            echo $this->Form->input('created_by');
            echo $this->Form->input('call_id', ['options' => $calls]);
            echo $this->Form->input('visualized');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

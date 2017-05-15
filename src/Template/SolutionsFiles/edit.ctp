<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $solutionsFile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $solutionsFile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Solutions Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['controller' => 'CallsSolutions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Solution'), ['controller' => 'CallsSolutions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutionsFiles form large-9 medium-8 columns content">
    <?= $this->Form->create($solutionsFile) ?>
    <fieldset>
        <legend><?= __('Edit Solutions File') ?></legend>
        <?php
            echo $this->Form->input('text');
            echo $this->Form->input('archive');
            echo $this->Form->input('solution_id', ['options' => $callsSolutions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

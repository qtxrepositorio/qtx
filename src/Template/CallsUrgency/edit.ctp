<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $callsUrgency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $callsUrgency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calls Urgency'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="callsUrgency form large-9 medium-8 columns content">
    <?= $this->Form->create($callsUrgency) ?>
    <fieldset>
        <legend><?= __('Edit Calls Urgency') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

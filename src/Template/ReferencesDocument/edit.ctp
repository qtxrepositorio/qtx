<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $referencesDocument->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $referencesDocument->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List References Document'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="referencesDocument form large-9 medium-8 columns content">
    <?= $this->Form->create($referencesDocument) ?>
    <fieldset>
        <legend><?= __('Edit References Document') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

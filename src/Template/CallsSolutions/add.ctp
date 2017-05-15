<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calls Solutions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['controller' => 'CallsSubcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Subcategory'), ['controller' => 'CallsSubcategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsSolutions form large-9 medium-8 columns content">
    <?= $this->Form->create($callsSolution) ?>
    <fieldset>
        <legend><?= __('Add Calls Solution') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('subcategorie_id', ['options' => $callsSubcategories]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

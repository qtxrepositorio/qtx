<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $callsSubcategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $callsSubcategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calls Subcategories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['controller' => 'CallsCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calls Category'), ['controller' => 'CallsCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="callsSubcategories form large-9 medium-8 columns content">
    <?= $this->Form->create($callsSubcategory) ?>
    <fieldset>
        <legend><?= __('Edit Calls Subcategory') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('sla');
            echo $this->Form->input('category_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

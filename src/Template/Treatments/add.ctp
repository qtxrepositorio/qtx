<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Treatments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List External Documents'), ['controller' => 'ExternalDocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New External Document'), ['controller' => 'ExternalDocuments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="treatments form large-9 medium-8 columns content">
    <?= $this->Form->create($treatment) ?>
    <fieldset>
        <legend><?= __('Add Treatment') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

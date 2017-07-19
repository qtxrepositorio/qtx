<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Treatments Document'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="treatmentsDocument form large-9 medium-8 columns content">
    <?= $this->Form->create($treatmentsDocument) ?>
    <fieldset>
        <legend><?= __('Add Treatments Document') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

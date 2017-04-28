<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calls Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="callsCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($callsCategory) ?>
    <fieldset>
        <legend><?= __('Add Calls Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('time', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

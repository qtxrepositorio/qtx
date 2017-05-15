<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calls Areas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="callsAreas form large-9 medium-8 columns content">
    <?= $this->Form->create($callsArea) ?>
    <fieldset>
        <legend><?= __('Add Calls Area') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

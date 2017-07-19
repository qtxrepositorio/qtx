<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Locals Document'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="localsDocument form large-9 medium-8 columns content">
    <?= $this->Form->create($localsDocument) ?>
    <fieldset>
        <legend><?= __('Add Locals Document') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

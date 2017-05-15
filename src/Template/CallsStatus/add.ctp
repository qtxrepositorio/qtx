<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Calls Status'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="callsStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($callsStatus) ?>
    <fieldset>
        <legend><?= __('Add Calls Status') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

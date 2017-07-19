<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List External Documents'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Treatments Document'), ['controller' => 'TreatmentsDocument', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Treatments Document'), ['controller' => 'TreatmentsDocument', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List References Document'), ['controller' => 'ReferencesDocument', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New References Document'), ['controller' => 'ReferencesDocument', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="externalDocuments form large-9 medium-8 columns content">
    <?= $this->Form->create($externalDocument) ?>
    <fieldset>
        <legend><?= __('Add External Document') ?></legend>
        <?php
            echo $this->Form->input('number_document');
            echo $this->Form->input('local_id');
            echo $this->Form->input('client_id');
            echo $this->Form->input('client_name');
            echo $this->Form->input('client_contact');
            echo $this->Form->input('treatment_id', ['options' => $treatmentsDocument]);
            echo $this->Form->input('reference_id', ['options' => $referencesDocument]);
            echo $this->Form->input('subject');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('user_function');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

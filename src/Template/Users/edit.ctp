<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<!-- Form Element sizes -->
<div class="col-md-7">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Editar Usuário') ?></legend>
                    <?php
                        echo $this->Form->input('username');
                        echo $this->Form->input('password');
                        echo $this->Form->input('roles._ids', ['options' => $roles]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    <!-- /.box-body -->
    </div>
</div>
<!-- /.box -->
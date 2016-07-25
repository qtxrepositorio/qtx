<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $role->id],
                ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $role->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<!-- Form Element sizes -->
<div class="col-md-7">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <?= $this->Form->create($role) ?>
                <fieldset>
                <legend><?= __('Editar Grupo:') ?></legend>
                <?php
                    echo $this->Form->input('name',['label' => 'Nome:']);
                    echo $this->Form->input('description',['label' => 'Descrição:']);
                    echo $this->Form->input('users._ids', ['label' => 'Usuários Relacionados (Opcional):','options' => $users]);
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
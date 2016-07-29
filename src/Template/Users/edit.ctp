<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Notices'), ['controller' => 'Notices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notice'), ['controller' => 'Notices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<div class="col-md-7">
    <div class="box box-success">
        <div class="roles form large-9 medium-8 columns content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Editar Usuário') ?></legend>
                <?php
                    echo $this->Form->input('name', ['label'=>'Nome:']);
                    echo $this->Form->input('cpf', ['label'=>'CPF:']);
                    echo $this->Form->input('status', ['label'=>'Ativo']);
                    echo $this->Form->input('username', ['label'=>'Usuário']);
                    echo $this->Form->input('password', ['label'=>'Senha:']);
                    echo $this->Form->input('roles._ids', ['options' => $roles, 'label'=>'Grupos Relacionados (Opcional):']);
                    echo $this->Form->input('notices._ids', ['options' => $notices, 'label'=>'Notícias Relacionadas (Opcional):']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


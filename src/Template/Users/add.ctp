<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
-->

<br>

<div class="col-md-7">
    <div class="box box-success">
            <div class="box-body">
                <div class="roles form large-9 medium-8 columns content">
                    <?= $this->Form->create($user) ?>
                        <fieldset>
                            <legend><?= __('Adicionar Usuário:') ?></legend>
                                <?php
                                    echo $this->Form->input('username',['label' => 'Usuário:']);
                                    echo $this->Form->input('password',['label' => 'Senha:']);
                                    echo $this->Form->input('roles._ids', ['label' => 'Grupos Relacionados (Opicional):','options' => $roles]);
                                ?>
                        </fieldset>
                    <?= $this->Form->button(__('Salvar')) ?>
                    <?= $this->Form->end() ?>
                </div>      
            </div>
    </div>
</div>

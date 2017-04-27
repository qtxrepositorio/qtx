<?php ?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="roles form large-9 medium-8 columns content">
                    <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __('Editar Usuário') ?></legend>
                        <?php
                            echo $this->Form->input('name', ['disabled' => TRUE,'label'=>'Nome:']);
                            echo $this->Form->input('cpf', ['disabled' => TRUE,'label'=>'CPF:']);
                            echo $this->Form->input('username', ['disabled' => TRUE,'label'=>'Usuário']);
                            echo $this->Form->input('email', ['disabled' => TRUE,'label'=>'Email:']);
                            echo $this->Form->input('password', ['value'=>'','label'=>'Senha:']);
                            //echo $this->Form->input('roles._ids', ['options' => $roles, 'label'=>'Grupos Relacionados (Opcional):']);
                            //echo $this->Form->input('notices._ids', ['options' => $notices, 'label'=>'Notícias Relacionadas (Opcional):']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Salvar')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>

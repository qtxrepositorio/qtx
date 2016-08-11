<?php ?>

<br>

<div class="col-md-7">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <?= $this->Form->create($notice) ?>
                <fieldset>
                    <legend><?= __('Adicionar Notícia:') ?></legend>
                    <?php
                        echo $this->Form->input('subject', ['label'=>'Assunto']);
                        echo $this->Form->input('text', ['label'=>'Conteúdo']);
                        echo $this->Form->input('user_id', ['label'=>'Usuário Criador']);
                        echo $this->Form->input('users._ids', ['options' => $users, 'label'=>'Usuários de destino (Opcional)']);
                        echo $this->Form->input('roles._ids', ['options' => $roles, 'label'=>'Grupos de destino (Opcional)']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Salvar')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


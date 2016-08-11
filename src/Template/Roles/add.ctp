<?php ?>

<br>

<div class="col-md-7">
    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <?= $this->Form->create($role) ?>
                <fieldset>
                    <legend><?= __('Adicionar Grupo:') ?></legend>
                    <?php
                        echo $this->Form->input('name',['label' => 'Nome:']);
                        echo $this->Form->input('description',['label' => 'Descrição:']);
                        echo $this->Form->input('users._ids', ['label' => 'Usuários Relacionados (Opcional):','options' => $users]);
                        echo $this->Form->input('notices._ids', ['label' => 'Notícias Relacionadas (Opcional):','options' => $notices]);
                    ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


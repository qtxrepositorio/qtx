<?php ?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
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
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Salvar')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>


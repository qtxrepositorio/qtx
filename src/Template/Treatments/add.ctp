<?php ?>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-body">
                    <div class="roles form large-9 medium-8 columns content">
                        <?= $this->Form->create($treatment) ?>
                        <fieldset>
                            <legend><?= __('Adicionar tratamento') ?></legend>
                            <?php
                            echo $this->Form->input('description', ['label'=>'Descrição:']);
                            echo $this->Form->input('status', ['label'=>'Ativo?']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

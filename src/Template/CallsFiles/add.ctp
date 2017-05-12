<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-body">
                    <div class="callsFiles form large-9 medium-8 columns content">
                        <?= $this->Form->create($callsFile, ['type' => 'file']) ?>
                        <fieldset>
                            <legend><?= __('Add Calls File') ?></legend>
                            <?php
                            echo $this->Form->input('text', ['label' => 'Descrição:']);
                            echo $this->Form->file('files', ['label' => 'Arquivo:']);
                            echo $this->Form->input('call_id', ['label' => 'Chamado:', 'options' => $calls]);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Salvar')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

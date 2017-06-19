<?php ?>
<section class="content">
    <div class="row">
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-body">
                    <div class="callsFiles form large-9 medium-8 columns content">
                        <?= $this->Form->create($callsFile) ?>
                        <fieldset>
                            <legend><?= __('Editar arquivo do chamado:') ?></legend>
                            <?php
                            echo $this->Form->input('text', ['label' => 'Descrição:']);
                            echo $this->Form->input('archive', ['label' => 'Arquivo:', 'disabled' => true]);
                            echo $this->Form->input('call_id', ['label' => 'Chamado:', 'disabled' => true, 'options' => $calls]);
                            ?>
                        </fieldset>

                        <div class="col-md-6">
                            <?= $this->Html->link(__('Voltar ao chamado'), ['controller' => 'calls', 'action' => 'view', $callsFile->call_id], array('class' => 'btn btn-primary')) ?>
                        </div>
                        <div align="right" class="col-md-6">
                            <?= $this->Form->button(__('Salvar')) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
